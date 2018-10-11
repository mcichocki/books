<?php

class DB {
    private static $_instance = null;
    private $_pdo;
    private $_query;
    private $_results;
    private $_error = false;
    private $_count = 0;

    public function __construct($host, $root, $pass, $port) {

        try {

        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
}