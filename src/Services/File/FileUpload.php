<?php

namespace Service\File;

class FileUpload
{
    /*** @var array */
    private $files;

    public function __construct()
    {
        $this->files = $_FILES;
    }

    public function file($name)
    {
        return $this->files[$name];
    }
}