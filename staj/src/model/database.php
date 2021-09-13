<?php

namespace SRC\model;
use PDO;
use PDOException;

class Database
{

    public $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=sorveyanitla', 'root', '');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}