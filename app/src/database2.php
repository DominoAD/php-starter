<?php
    include ("dbinfo.php");
    
    //establish a DB connection to a specific database
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    //check for valid connecton
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";

    //Create a database table
    $sql = "CREATE TABLE IF NOT EXISTS customers (
        customer_id int(11) NOT NULL AUTO_INCREMENT,
        firstName varchar(100) NOT NULL, 
        lastName varchar(100) NOT NULL, 
        billingAddress varchar(255) NOT NULL, 
        billingCity varchar(100) NOT NULL, 
        billingProvince varchar(100) NOT NULL, 
        billingCountry varchar(100) NOT NULL, 
        billingPostal varchar(100) NOT NULL, 
        shippingAddress varchar(255) NOT NULL, 
        shippingCity varchar(100) NOT NULL, 
        shippingProvince varchar(100) NOT NULL, 
        shippingCountry varchar(100) NOT NULL, 
        shippingPostal varchar(20) NOT NULL, 
        PRIMARY KEY (customer_id)) CHARSET=utf8mb4";
    mysqli_query($conn, $sql);

    $sql = "CREATE TABLE IF NOT EXISTS products (
        product_id int(11) NOT NULL AUTO_INCREMENT,
        productName varchar(255) NOT NULL, 
        productPrice DECIMAL(10,2) NOT NULL, 
        PRIMARY KEY (product_id)) CHARSET=utf8mb4";
    mysqli_query($conn, $sql);

    $sql = "CREATE TABLE IF NOT EXISTS order_lookup (
        cart_id int(11) NOT NULL AUTO_INCREMENT,
        customer_id int(10) NOT NULL,
        product_id int(10) NOT NULL, 
        quantity int NOT NULL, 
        PRIMARY KEY (cart_id)) CHARSET=utf8mb4";
    mysqli_query($conn, $sql);

    //$sql = "ALTER TABLE customers ADD sameAsBilling TINYINT NULL AFTER billingPostal";
    //mysqli_query($conn, $sql);

    $sql = "ALTER TABLE customers CHANGE shippingAddress shippingAddress varchar(255) DEFAULT NULL";
    mysqli_query($conn, $sql);

    $sql = "ALTER TABLE customers CHANGE shippingCity shippingCity varchar(100) DEFAULT NULL";
    mysqli_query($conn, $sql);

    $sql = "ALTER TABLE customers CHANGE shippingProvince shippingProvince varchar(100) DEFAULT NULL";
    mysqli_query($conn, $sql);

    $sql = "ALTER TABLE customers CHANGE shippingCountry shippingCountry varchar(100) DEFAULT NULL";
    mysqli_query($conn, $sql);

    $sql = "ALTER TABLE customers CHANGE shippingPostal shippingPostal varchar(20) DEFAULT NULL";
    mysqli_query($conn, $sql);

    //close connection 
    mysqli_close($conn);