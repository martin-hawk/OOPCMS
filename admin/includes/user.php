<?php

class User extends Db_object
{

    protected static $db_table = "users";

    protected static $db_table_fields = array(
        'username',
        'password',
        'first_name',
        'last_name',
        'filename'
    );

    public $id;

    public $username;

    public $password;

    public $first_name;

    public $last_name;

    public $filename;

    public $upload_directory = "images";

    public $image_placeholder = "https://via.placeholder.com/400x400&text=image";

    public static function verify_user($user, $pass)
    {
        global $database;

        $username = $database->escape_string($user);
        $password = $database->escape_string($pass);

        $sql = "SELECT * FROM users WHERE ";
        $sql .= "username = '{$username}' AND ";
        $sql .= "password = '{$password}' ";
        $sql .= "LIMIT 1";

        $result_array = self::find_query($sql);
        return ! empty($result_array) ? array_shift($result_array) : FALSE;
    }

    public function image_path_placeholder()
    {
        return empty($this->filename) ? $this->image_placeholder : $this->upload_directory . DS . $this->filename;
    }

    public function upload_photo()
    {
        if (! empty($this->errors)) {
            return FALSE;
        }

        if (empty($this->filename) || empty($this->tmp_path)) {
            $this->errors[] = "The file was not available";
            return FALSE;
        }

        $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;

        if (file_exists($target_path)) {
            $this->errors[] = "The file  {$this->filename} already exists";
            return FALSE;
        }

        if (move_uploaded_file($this->tmp_path, $target_path)) {

            unset($this->tmp_path);
            return TRUE;
        } else {
            $this->errors[] = "Check the file directory permissions";
            return FALSE;
        }
    }
    
    public function delete_photo()
    {
        if ($this->delete()) {
            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;
            return unlink($target_path) ? TRUE : FALSE;
        } else {
            return FALSE;
        }
    }

    public function ajax_change_image($user_image, $user_id)
    {
        // $this->filename = $user_image;
        // $this->id = $user_id;

        // $this->save();
        global $database;

        $this->id = $database->escape_string($user_id);
        ;
        $this->filename = $database->escape_string($user_image);

        $sql = "UPDATE " . self::$db_table . " SET filename = '{$this->filename}' ";
        $sql .= "WHERE id = {$this->id}";

        $update_filename = $database->query($sql);

        echo $this->image_path_placeholder();
    }
}

?>