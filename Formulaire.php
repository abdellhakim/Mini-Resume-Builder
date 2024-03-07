<?php

class Formulaire
{
    private $method;
    private $action;
    private $name;

    public function __construct($method, $action, $name)
    {
        $this->method = $method;
        $this->action = $action;
        $this->name = $name;

        echo "<form name='$name' action='$action' method='$method' style='margin: 20px;'>";
    }

    public function createLabel($content)
    {
        echo "<label style='display: block; margin-bottom: 5px;'>$content</label>";
    }

    public function genericInput($placeholder, $name, $type)
    {
        echo "<input type='$type' name='$name' placeholder='$placeholder' style='margin-bottom: 10px;'><br>";
    }

    public function createTextArea1($name, $content)
    {
        echo "<textarea name='$name' style='margin-bottom: 10px;'>$content</textarea><br>";
    }

    public function createTextArea($name, $content)
    {
        echo "<textarea name='$name' rows='10' cols='50' style='margin-bottom: 10px;'>$content</textarea><br>";
    }

    public function createSubmitBtn($content)
    {
        echo "<button type='submit' style='background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;'>$content</button><br>";
    }

    public function generichiddenInput($name, $value)
    {
        echo "<input type='hidden' name='$name' value='$value'><br>";
    }

    public function __destruct()
    {
        echo "</form>";
    }
}
