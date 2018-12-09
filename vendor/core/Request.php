<?php

class Request
{
    public $url;

    public function __construct()
    {
//        ?$this->url = str_replace($_SERVER['SCRIPT_NAME'], "", $_SERVER["REQUEST_URI"]);
        $this->url = strip_tags(trim(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)));
    }
}