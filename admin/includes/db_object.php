<?php

class Db_object
{

    public $errors = array();

    public $upload_errors = array(
        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the max_file_size directive",
        UPLOAD_ERR_PARTIAL => "The file was partially uploaded",
        UPLOAD_ERR_NO_FILE => "No file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
        UPLOAD_ERR_CANT_WRITE => "Failed to write the file to the disk",
        UPLOAD_ERR_EXTENSION => "A php extension stopped the file upload"
    );

    // The argument $_FILES['uploaded_file'] is passed to the method
    public function set_file($file)
    {
        if (empty($file) || ! $file || ! is_array($file)) {
            $this->errors[] = "There was no file uploaded";
            return FALSE;
        } elseif ($file['error'] != 0) {
            $this->errors[] = $this->upload_errors[$file['error']];
            return FALSE;
        } else {
            $this->filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }

    public static function find_all()
    {
        // global $database;
        // $result_set = $database->query("SELECT * FROM users");
        // return $result_set;
        return static::find_query("SELECT * FROM " . static::$db_table);
    }

    public static function find_by_id($id)
    {
        // global $database;
        // $result_set = $database->query("SELECT * FROM users WHERE id=$user_id");
        // $found_user = $result_set->fetch_array();
        // return $found_user;
        $result_array = static::find_query("SELECT * FROM " . static::$db_table . " WHERE id=$id LIMIT 1");
        // if (!empty($result_array)) {
        // $first_item= array_shift($result_array);
        // return $first_item;
        // } else {
        // return FALSE;
        // }
        return ! empty($result_array) ? array_shift($result_array) : FALSE;
    }

    public static function find_query($sql)
    {
        global $database;
        $result_set = $database->query($sql);
        $object_array = array();
        while ($row = $result_set->fetch_array()) {
            $object_array[] = static::instantiation($row);
        }
        return $object_array;
    }

    public static function instantiation($record)
    {
        $calling_class = get_called_class();

        $object = new $calling_class();
        // $object->id = $found_user['id'];
        // $object->username = $found_user['username'];
        // $object->first_name = $found_user['first_name'];
        // $object->last_name = $found_user['last_name'];

        foreach ($record as $attribute => $value) {
            if ($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }

        return $object;
    }

    private function has_attribute($attribute)
    {
        $object_properties = get_object_vars($this);
        return array_key_exists($attribute, $object_properties);
    }

    protected function properties()
    {
        // return get_object_vars($this);
        $properties = array();

        foreach (static::$db_table_fields as $db_field) {
            if (property_exists($this, $db_field)) {
                $properties[$db_field] = $this->$db_field;
            }
        }

        return $properties;
    }

    protected function clean_properties()
    {
        global $database;

        $clean_properties = array();

        foreach ($this->properties() as $key => $value) {
            $clean_properties[$key] = $database->escape_string($value);
        }

        return $clean_properties;
    }

    // Save method
    public function save()
    {
        return isset($this->id) ? $this->update() : $this->create();
    }

    // Create method
    public function create()
    {
        global $database;

        $properties = $this->properties();

        $sql = "INSERT INTO " . static::$db_table . " (" . implode(",", array_keys($properties)) . ") ";
        $sql .= "VALUES ('" . implode("','", array_values($properties)) . "')";

        if ($database->query($sql)) {
            $this->id = $database->insert_id();
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // Update method
    public function update()
    {
        global $database;

        $properties = $this->properties();

        $properties_pairs = array();

        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$db_table . " SET ";
        $sql .= implode(", ", $properties_pairs);
        $sql .= " WHERE id = " . $database->escape_string($this->id);

        $database->query($sql);

        return ($database->connection->affected_rows == 1) ? TRUE : FALSE; // mysqli_affected_rows($database->connection) == 1
    }

    // Delete method
    public function delete()
    {
        global $database;

        $sql = "DELETE FROM " . static::$db_table . " WHERE id = " . $database->escape_string($this->id) . " LIMIT 1";

        $database->query($sql);

        return ($database->connection->affected_rows == 1) ? TRUE : FALSE;
    }

    public static function count_all()
    {
        global $database;

        $sql = "SELECT COUNT(*) FROM " . static::$db_table;
        $result_set = $database->query($sql);
        $row = $result_set->fetch_array();

        return array_shift($row);
    }
}
?>