<?php

namespace Library\Classes;

use Medoo\Medoo;

class Model
{
    private $_db;
    protected $table = '';


    public function __construct($_db){
        $this->_db = $_db;
    }
    public function __call($method, $args)
    {
        //load model function
        array_unshift($args, $this->table);
        if (method_exists($this->_db, $method)) {
            return call_user_func_array(array($this->_db, $method), $args);
        }

    }



}
