<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $conn = new mysqli($db_host,$db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare statement and bind
    $stmt = $conn->prepare("INSERT INTO ProgramInfo (programCode, programTitle) VALUES (?, ?)");
    $stmt->bind_param("ss", $programCode, $programTitle);

    $stmt->execute();

    $conn->close();

    echo '<p><a href="addProgram.php">Add another program</a></p>';
} else {
    echo "<p>Program added successfully</p>";
}
?>