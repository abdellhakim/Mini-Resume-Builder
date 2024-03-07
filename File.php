<?php

class File
{
    private $filePath;
    private $mode;
    private $file;

    public function __construct($filePath, $mode)
    {
        $this->filePath = $filePath;
        $this->mode = $mode;

        $this->file = fopen($filePath, $mode);
    }

    public function read()
    {
        return fread($this->file, filesize($this->filePath));
    }

    public function write($data)
    {
        fwrite($this->file, $data);
    }


    public function writeJson($data)
    {
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);
        fwrite($this->file, $jsonData);
    }

    public function readJson()
    {
        $jsonData = file_get_contents($this->filePath);
        return json_decode($jsonData, true);
    }



    public function __destruct()
    {
        fclose($this->file);
    }
}
