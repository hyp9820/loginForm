<?php

    $connection;
    function connect(){
        global $connection;
        $connection = mysqli_connect('localhost','root','','product_catalog');  //To make the connection to database

        if(!$connection){
            die("Database connection failed!");
        }
    }

?>