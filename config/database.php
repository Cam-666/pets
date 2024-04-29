<?php
    //Database configuration 
    $host     = 'localhost' ; //=>127.0.0.1
    $dbname   = 'Pets';
    $username = 'postgres';
    $password = 'unicesmag';
    $port     = '5432';

    $conn = pg_connect("host= $host   dbname= $dbname     user =$username   password= $password port=$port");

    if(!$conn){
        die("Connection Error"  . pg_last_error());
    }else{
        echo "Success !!!!";
    }
?>