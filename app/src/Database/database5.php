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

//get list of all customers
$sql = "SELECT * FROM customers";
//$sql = "SELECT customer_id, firstName, lastName FROM customers";
$results = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($results)) {
    $customer_id = $row["customer_id"];
    $firstName = $row["firstName"];
    $lastName = $row["lastName"];
    $billingAddress = $row["billingAddress"];

    echo "Customer $customer_id: $firstName $lastName";
    //echo 'Customer ' . $customer_id . ': ' . $firstName . ' ' . $lastName . '<br />';
    //echo "Customer " . $customer_id . ": " . $firstName . " " . $lastName . "<br />";
}

//SELECT -> retrieval
//UPDATE -> update command
//INSERT -> add command
//DELETE -> removal command
//FROM -> what database/table are we acting upon
//WHERE -> how we filter results
//AND and OR are used to further filter results

//get customer #1
$sql = "SELECT * FROM customers WHERE customer_id=1";
$results = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($results)) {
    $customer_id = $row["customer_id"];
    $firstName = $row["firstName"];
    $lastName = $row["lastName"];
    $billingAddress = $row["billingAddress"];

    echo "<br /><br />$sql<br />Customer $customer_id: $firstName $lastName";
}

//get customers with lastName "you"
$sql = " SELECT * FROM customers WHERE lastName='you' ";
//$sql = ' SELECT * FROM customers WHERE lastName="you" ';
echo "<br /><br />$sql";
$results = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($results)) {
    $customer_id = $row["customer_id"];
    $firstName = $row["firstName"];
    $lastName = $row["lastName"];
    $billingAddress = $row["billingAddress"];

    echo "<br />Customer $customer_id: $firstName $lastName";
}

//get customers with lastName that start with "y"
$sql = " SELECT * FROM customers WHERE lastName LIKE 'y%' ";
echo "<br /><br />$sql";
$results = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($results)) {
    $customer_id = $row["customer_id"];
    $firstName = $row["firstName"];
    $lastName = $row["lastName"];
    $billingAddress = $row["billingAddress"];

    echo "<br />Customer $customer_id: $firstName $lastName";
}
//ALL columns used in any WHERE sequence NEED TO BE TURNED INTO AN INDEX WITHIN THE DATABASE (SLOW!!!)

//get all products with price > 7.00
$sql = " SELECT * FROM products WHERE productPrice > 7.00 ";
echo "<br /><br />$sql";
$results = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($results)) {
    $product_id = $row["product_id"];
    $productName = $row["productName"];
    $productPrice = $row["productPrice"];

    echo "<br />Product $product_id: $productName $productPrice";
}

//get all items, customers, products in order_lookup (messy)
$sql = " SELECT * FROM order_lookup ";
echo "<br /><br />$sql";
$results = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($results)) {
    $cart_id = $row["cart_id"];
    $product_id = $row["product_id"];
    $customer_id = $row["customer_id"];
    $quantity = $row["quantity"];

    //echo "<br />cart_id $cart_id: $product_id $customer_id x $quantity";

    $sql2 = " SELECT * FROM customers WHERE customer_id = $customer_id ";
    $results2 = mysqli_query($conn, $sql2);
    while ($row2 = mysqli_fetch_assoc($results2)) {
        $customer_id = $row2["customer_id"];
        $firstName = $row2["firstName"];
        $lastName = $row2["lastName"];
        //echo "<br />customer_id $customer_id: $firstName $lastName";
    }

    $sql2 = " SELECT * FROM products WHERE product_id = $product_id ";
    $results2 = mysqli_query($conn, $sql2);
    while ($row2 = mysqli_fetch_assoc($results2)) {
        $product_id = $row2["product_id"];
        $productName = $row2["productName"];
        $productPrice = $row2["productPrice"];
        //echo "<br />product_id $product_id: $productName $productPrice";
    }

    echo "<br />customer ($customer_id) $firstName $lastName ordered $quantity x $productName @ $productPrice";
}

//get all items, customers, products in order_lookup (efficient 1)
$sql = " SELECT
                cart_id, quantity, order_lookup.customer_id, firstName, lastName, order_lookup.product_id, productName, productPrice
            FROM
                order_lookup, customers, products
            WHERE
                order_lookup.customer_id = customers.customer_id
            AND
                order_lookup.product_id = products.product_id ";
echo "<br /><br />$sql";
$results = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($results)) {
    $product_id = $row["product_id"];
    $productName = $row["productName"];
    $productPrice = $row["productPrice"];
    $customer_id = $row["customer_id"];
    $firstName = $row["firstName"];
    $lastName = $row["lastName"];
    $quantity = $row["quantity"];
    $cart_id = $row["cart_id"];
    echo "<br />customer ($customer_id) $firstName $lastName ordered $quantity x $productName @ $productPrice";
}

//get all items, customers, products in order_lookup (efficient 2)
$sql = " SELECT
                cart_id, quantity, order_lookup.customer_id, firstName, lastName, order_lookup.product_id, productName, productPrice
            FROM
                order_lookup
            INNER JOIN customers ON order_lookup.customer_id = customers.customer_id
            INNER JOIN products ON order_lookup.product_id = products.product_id  ";
echo "<br /><br />$sql";
$results = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($results)) {
    $product_id = $row["product_id"];
    $productName = $row["productName"];
    $productPrice = $row["productPrice"];
    $customer_id = $row["customer_id"];
    $firstName = $row["firstName"];
    $lastName = $row["lastName"];
    $quantity = $row["quantity"];
    $cart_id = $row["cart_id"];
    echo "<br />customer ($customer_id) $firstName $lastName ordered $quantity x $productName @ $productPrice";
}

//update price for product 2
$sql = " UPDATE products SET productPrice = 15.88 WHERE product_id = 2 ";
$results = mysqli_query($conn, $sql);

//DELETE customer 2
$sql = " DELETE FROM customers WHERE customer_id = 2 "; //DELETE FROM customers WHERE 1=1; DROP TABLE customers;
$results = mysqli_query($conn, $sql);

mysqli_close($conn);
