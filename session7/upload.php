<?php

class File
{
    public $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function prd()
    {
        echo "<pre>";
        print_r($this->file);
    }

    public function name()
    {
        return $this->file['name'];
    }

    public function type()
    {
        return $this->file['type'];
    }

    public function extension()
    {
        $temp = explode('/', $this->file['type']);
        return $temp[1];
    }

    public function temp()
    {
        return $this->file['tmp_name'];
    }

    public function errorCode()
    {
        return $this->file['error'];
    }

    public function saveAs($location)
    {
        if (move_uploaded_file($this->temp(), $location)) {
            return true;
        }

        return false;
    }

    public function size($as = 'kb')
    {
        if ($as == 'gb') {
            return $this->file['size'] / 1000000000;
        } elseif ($as == 'mb') {
            return $this->file['size'] / 1000000;
        } elseif ($as == 'kb') {
            return $this->file['size'] / 1000;
        } else {
            return $this->file['size'];
        }
    }
}

if (isset($_FILES['file'])) {
    $fileObj = new File($_FILES['file']);

    if ($fileObj->type() == 'application/x-php') {
        echo "Wrong file type!";
    } elseif ($fileObj->size('kb') > 100) {
        echo "File is too large(Max:100KB)!";
    } else {
        $location = './uploads/'.$fileObj->name();

        if ($fileObj->saveAs($location)) {
            echo 'Successfully uploaded!';
        } else {
            echo 'Operation failed!';
        }
    }
}
