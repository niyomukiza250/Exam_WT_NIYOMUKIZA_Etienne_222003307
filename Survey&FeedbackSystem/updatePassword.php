
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "Surveys_db";

        // Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $email = $_POST['email'];
        $new_password = $_POST['new_password'];

        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Prepare and execute the update query
        $stmt = $conn->prepare("UPDATE User SET Password=? WHERE Email=?");
        $stmt->bind_param("ss", $hashed_password, $email);

        if ($stmt->execute()) {
            echo "<script>alert('Password updated successfully!'); window.location.href = 'loginPage.php';</script>";
        } else {
            echo "<script>alert('Error updating password: " . $stmt->error . "');</script>";
        }

        $stmt->close();
        $conn->close();
    }
    ?>