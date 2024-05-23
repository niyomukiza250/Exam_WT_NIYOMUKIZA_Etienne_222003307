<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Surveys_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $email = $_POST['email'];
    $newUsername = $_POST['new_username'];

    // Prepare and execute SQL statement to update username
    $stmt = $conn->prepare("UPDATE User SET Username = ? WHERE Email = ?");
    $stmt->bind_param("ss", $newUsername, $email);

    if ($stmt->execute()) {
        echo "<script>alert('Username updated successfully!');window.location.href = 'loginPage.php';</script>";
    } else {
        echo "<script>alert('Error updating username: " . $conn->error . "');</script>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
