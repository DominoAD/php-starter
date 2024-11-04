<?php
$db_host = 'db';
$db_user = 'root';
$db_pass = 'super_secret123?';
$db_name = 'mydatabase';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);


if ($conn->connect_error) {
    die("<h1 style='text-align: center;'>Connection failed: <h1>" . $conn->connect_error);
}
echo "<h1 style='text-align: center;'>Connected successfully<h1>";
?>