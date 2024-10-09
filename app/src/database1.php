<?php
$db_host = "db";
$db_user = "root";
$db_pass = "super_secret123?";
$db_name = "courses";

$conn = mysqli_connect($db_host, $db_user, $db_pass);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

mysqli_close($conn);

?>
