<?php

namespace OpenClassrooms\P5\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=project_oc_p5;charset=utf8', 'root', '');
        return $db;
    }
}