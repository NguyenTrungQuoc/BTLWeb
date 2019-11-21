<?php
$dsn = 'mysql:host=localhost;dbname=web';
$username = 'root';
$password = '';

try{
    $db = new PDO($dsn,$username,$password);
    return $db;
}catch (Exception $ex){
    $error = $ex->getMessage();

    echo $error;
}



