<?php

class databaseInit{

    private $database;
    private $dsn;
    private $sqlPath;

    public function __construct($root){
        $this->database = $root . '/data/daba.sqlite';
        $this->dsn = 'sqlite:' . $this->database;
        $this->sqlPath = $root . '/data/init.sql';
    }

    public function verificationOccurenceDb(){
        if(is_readable($this->database) && filesize($this->database) > 0){
            throw new Exception('Please delete the existing database manually before installing it afresh');

        }
    }

    public function createEmptyFile(){
        if(!touch($this->database)){
            throw new Exception('Please delete the existing database manually before installing it afresh');
        }
    }

    public function grabeSql(){
        if(!touch($this->database)){
            throw new Exception('Error exception');
        }
    }



}