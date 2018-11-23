<?php

class Request
{
    public $url;

    public function __construct()
    {
        $this->url = str_replace($_SERVER['SCRIPT_NAME'], "", $_SERVER["REQUEST_URI"]);
    }
}