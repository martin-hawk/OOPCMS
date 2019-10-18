<?php

class Photo extends Db_object
{

    protected static $db_table = "photos";

    protected static $db_table_fields = array(
        'title',
        'caption',
        'description',
        'filename',
        'alt_text',
        'type',
        'size'
    );

    public $id;

    public $title;

    public $caption;

    public $description;

    public $filename;

    public $alt_text;

    public $type;

    public $size;

    public $tmp_path;

    public $upload_directory = "images";

    public function picture_path()
    {
        return $this->upload_directory . DS . $this->filename;
    }

    public function save_file()
    {
        if ($this->id) {
            $this->update();
        } else {
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
                if ($this->create()) {
                    unset($this->tmp_path);
                    return TRUE;
                } else {
                    $this->errors[] = "Check the file directory permissions";
                    return FALSE;
                }
            }
        }
    }

    public function delete_photo()
    {
        if ($this->delete()) {
            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->picture_path();
            return unlink($target_path) ? TRUE : FALSE;
        } else {
            return FALSE;
        }
    }
}

?>