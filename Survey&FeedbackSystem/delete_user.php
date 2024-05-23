<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; // Change this if you have set a password for your MySQL root user
$dbname = "Surveys_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize ID variable
$id = null;
$deleteMessage = null; // Initialize delete message variable

// Check if ID is set and deletion request is made
if (isset($_GET['deleteID'])) {
    $id = $_GET['deleteID'];

    // Prepare and execute the DELETE statement
    $stmt = $conn->prepare("DELETE FROM User WHERE UserID=?");
    $stmt->bind_param("i", $id);

    try {
        if ($stmt->execute()) {
            $deleteMessage = "Record deleted successfully"; // Set delete message
        } else {
            $deleteMessage = "Error deleting record: " . $stmt->error; // Set error message
        }
    } catch (Exception $e) {
        // Handle error gracefully
        $deleteMessage = "Cannot delete user record. Please delete associated records in the referencing table.";
    }

    $stmt->close();
}

// Close database connection
$conn->close();

// Redirect user after processing
echo "<script>
        alert('$deleteMessage');
        window.location.href = 'viewUser.php';
      </script>";
?>
