<?php

class Tweet extends User{
    protected $con;

    function __construct($con){
        $this->con = $con;
    }
    
}

?>