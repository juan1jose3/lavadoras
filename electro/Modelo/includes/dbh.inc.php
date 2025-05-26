<?php
$dsn = "mysql:host=localhost;dbname=mydb";
$dbUsername = "root";
$password = "";

try{
    $pdo = new PDO($dsn,$dbUsername,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOexception $e){
    echo "Connection failed: ".  $e->getMessage();
}