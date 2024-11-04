<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $code = htmlspecialchars($_POST["programCode"]);
    $program = htmlspecialchars($_POST["programTitle"]);

    // Validate that the inputs are not empty and meet any other criteria
    if (!empty($code) && !empty($program) && preg_match('/^[A-Z]{4}$/', $code)) {
        // Create a new database connection
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare statement and bind parameters
        $stmt = $conn->prepare("INSERT INTO Program (Code, Title) VALUES (?, ?)");
        if ($stmt) {
            $stmt->bind_param("ss", $code, $program);

            // Execute the statement and check the result
            if ($stmt->execute()) {
                echo "<h1>Success</h1>";
            } else {
                echo "<h1>Error! Unable to insert program!</h1>";
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "<h1>Error! Unable to prepare statement!</h1>";
        }

        // Close the connection
        $conn->close();
    } else {
        echo "<h1 style='text-align: center;'>Error! Invalid input!</h1>";
    }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
?>