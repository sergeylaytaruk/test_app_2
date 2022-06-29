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
        header("Location: {$this->page}.php");
        session_write_close();
        session_regenerate_id(true);
        exit();
    }
}