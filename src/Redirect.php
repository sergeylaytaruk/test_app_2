<?php

class Redirect
{
    private $page;
    public function __construct($page)
    {
        $this->page = $page;
    }

    public function redirect()
    {
        $protocol = 'http://';
        $server = 'localhost';
        $port = '30000';
        $basePath =  $protocol.$server.":".$port;
        //header("Location: {$basePath}/{$this->page}.php");
        header("Location: {$this->page}.php");
        session_write_close();
        session_regenerate_id(true);
        exit();
    }
}