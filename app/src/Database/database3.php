<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

include "../dbinfo.php";

//establish a DB connection to a specific database
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

//check for valid connecton
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$firstName = "Me";
$lastName = "you";
$billingAddress = "1240 Grand Lake Road";
$billingCity = "Sydney";
$billingProvince = "Nova Scotia";
$billingCountry = "Canada";
$billingPostal = "B1P 1L2";

$sameAsBilling = 1;

$sql = "INSERT INTO customers (
        firstName, lastName, billingAddress, billingCity, billingProvince, billingCountry, billingPostal,
        sameAsBilling
    ) VALUES (
        '$firstName', '$lastName', '$billingAddress', '$billingCity', '$billingProvince', '$billingCountry',
        '$billingPostal', $sameAsBilling
    )";
mysqli_query($conn, $sql);

$sameAsBilling = 1;
$shippingAddress = "123 Electric Ave";
$shippingCity = "Toronto";
$shippingProvince = "Ontario";
$shippingCountry = "Canada";
$shippingPostal = "L0L 0L0";

$sql = "INSERT INTO customers (
        firstName, lastName, billingAddress, billingCity, billingProvince, billingCountry, billingPostal,
        sameAsBilling, shippingAddress, shippingCity, shippingProvince, shippingCountry, shippingPostal
    ) VALUES (
        '$firstName', '$lastName', '$billingAddress', '$billingCity', '$billingProvince', '$billingCountry',
        '$billingPostal', $sameAsBilling, '$shippingAddress', '$shippingCity', '$shippingProvince',
        '$shippingCountry', '$shippingPostal'
    )";
mysqli_query($conn, $sql);

$shippingAddress = "Lucky's Street";
$shippingAddress = mysqli_real_escape_string($conn, $shippingAddress); //you should escape ALL values collected from forms
$sql = "INSERT INTO customers (
        firstName, lastName, billingAddress, billingCity, billingProvince, billingCountry, billingPostal,
        sameAsBilling, shippingAddress, shippingCity, shippingProvince, shippingCountry, shippingPostal
    ) VALUES (
        '$firstName', '$lastName', '$billingAddress', '$billingCity', '$billingProvince', '$billingCountry',
        '$billingPostal', $sameAsBilling, '$shippingAddress', '$shippingCity', '$shippingProvince',
        '$shippingCountry', '$shippingPostal'
    )";
if (!mysqli_query($conn, $sql)) {
    echo "Error description: " . mysqli_error($conn);
}

$sql =
    "INSERT INTO products (productName, productPrice) VALUES ('widget 1', 6.99), ('widget 2', 7.99)";
if (!mysqli_query($conn, $sql)) {
    echo "Error description: " . mysqli_error($conn);
}

$sql =
    "INSERT INTO order_lookup (customer_id, product_id, quantity) VALUES (1, 1, 5), (1, 2, 3)";
if (!mysqli_query($conn, $sql)) {
    echo "Error description: " . mysqli_error($conn);
}

mysqli_close($conn);
