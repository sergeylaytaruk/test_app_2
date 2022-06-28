<?php

namespace components;

use db\MyDb;

class Articles
{
    public function __construct()
    {
        //
    }

    public function getLastItems()
    {
        return (new MyDb())->getLastIArticles();
    }

    public function getAllItems()
    {
        return (new MyDb())->getAllArticles();
    }

    public function addItem($title, $text, $idUser)
    {
        $title = strip_tags(trim($title));
        $text = strip_tags(trim($text));
        (new MyDb())->addItem($title, $text, $idUser);
    }

    public function search($search)
    {
        $search = strip_tags(trim($search));
        return (new MyDb())->search($search);
    }
}