<?php
include "../dbinfo.php";

//establish a DB connection
$conn = mysqli_connect($db_host, $db_user, $db_pass);

//check for valid connecton
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

mysqli_close($conn);
?>
