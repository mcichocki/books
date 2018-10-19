<?php

class DB {
    private static $_instance = null;
    private $_pdo;
    private $_query;
    private $_results;
    private $_error = false;
    private $_count = 0;

    /*
       methods:
        construct() - connecting to Database
        getInstance() - creating new instance of class
        query() -
        action() -
        select() -
        delete() -
        insert() -
        update() -
        results() -
        first() -
        count() -
        error() -

     */


    public function __construct() {

        try {
            $this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance() {
        if(!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function create() {
       // $sql = "INSERT INTO table_name VALUES ";
    }

    public function select() {
       // $sql = "SELECT * FROM table_name ";
    }

    public function update() {

    }

    public function delete() {

    }

    public function count() {
        return $this->_count;
    }

    public function query($sql, $params = array()) {
        $this->_error = false;
        $this->_query = $this->_pdo->prepare($sql);

        if($this->_query) {

            if(count($params)) {

                $x = 1;

                foreach($params as $param) {
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }

            if($this->_query->execute()) {
                echo 'Success';
                //$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                //$this->_count = $this->_query->rowCount();
            } else {
                //$this->_error = true;
            }


        }
    }
}