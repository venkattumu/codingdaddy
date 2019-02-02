<?php

class Follow extends User{
    protected $pdo;

    function __construct($pdo){
        $this->con = $pdo;
    }
    
}

?>