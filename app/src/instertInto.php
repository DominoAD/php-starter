<?php
include('conn.php')

if $_SERVER['REQUEST_METHOD'] == 'POST' {
    $conn = new mysqli($host, $user, $pass, $mydatabase);

if ($conn -> connect_error){
    die("Connection failed: " . $conn -> connect_error);
}

//prepare satement and bind

?>