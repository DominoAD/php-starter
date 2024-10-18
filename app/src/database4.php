<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    include ("dbinfo.php");
    
    //establish a DB connection to a specific database
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    //check for valid connecton
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "TRUNCATE TABLE customers";
    mysqli_query($conn, $sql);

    $sql = "TRUNCATE TABLE products";
    mysqli_query($conn, $sql);

    $sql = "TRUNCATE TABLE order_lookup";
    mysqli_query($conn, $sql);

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO customers (
        firstName, lastName, billingAddress, billingCity, billingProvince, billingCountry, billingPostal,
        sameAsBilling
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssi", $firstName, $lastName, $billingAddress, $billingCity, $billingProvince, 
                                  $billingCountry, $billingPostal, $sameAsBilling);

    // set parameters and execute
    $firstName = "Me";
    $lastName = "you";
    $billingAddress = "1240 Grand Lake Road";
    $billingCity = "Sydney";
    $billingProvince = "Nova Scotia";
    $billingCountry = "Canada";
    $billingPostal = "B1P 1L2";
    $sameAsBilling = 1;
    $stmt->execute();

    $stmt = $conn->prepare("INSERT INTO customers (
        firstName, lastName, billingAddress, billingCity, billingProvince, billingCountry, billingPostal,
        sameAsBilling, shippingAddress, shippingCity, shippingProvince, shippingCountry, shippingPostal
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssisssss", $firstName, $lastName, $billingAddress, $billingCity, $billingProvince, 
                                       $billingCountry, $billingPostal, $sameAsBilling, $shippingAddress, 
                                       $shippingCity, $shippingProvince, $shippingCountry, $shippingPostal);

    $sameAsBilling = 0;
    $shippingAddress = "Lucky's Street";
    $shippingCity = "Toronto";
    $shippingProvince = "Ontario";
    $shippingCountry = "Canada";
    $shippingPostal = "L0L 0L0";
    $stmt->execute();                

    $stmt = $conn->prepare("INSERT INTO products (productName, productPrice) VALUES (?, ?)");
    $stmt->bind_param("sd", $productName, $productPrice);

    $productName = "widget 1";
    $productPrice = 5.99;
    $stmt->execute();  

    $productName = "widget 2";
    $productPrice = 7.99;
    $stmt->execute();  

    $stmt = $conn->prepare("INSERT INTO order_lookup (customer_id, product_id, quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $cID, $pID, $quantity);

    $cID = 1;
    $pID = 1;
    $quantity = 5;
    $stmt->execute();  

    $pID = 2;
    $quantity = 3;
    $stmt->execute();  
