<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Feedback Rating</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header img {
            height: 40px;
        }
        .header .profile {
            display: flex;
            align-items: center;
        }
        .header .profile img {
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        
/* Dropdown styles */
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #93ede0;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #f8fafa;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropbtn {
    background-color: transparent;
    color: white;
    padding: 10px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

        .sidebar {
            width: 200px;
            background-color: #333;
            color: white;
            position: fixed;
            height: 100%;
            padding-top: 20px;
        }
        .sidebar a {
            padding: 10px;
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            margin: 10px 0;
        }
        .sidebar a img {
            height: 20px;
            width: 20px;
            margin-right: 10px;
        }
        .sidebar a:hover {
            background-color: #575757;
        }
        .container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .form-group input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body> <div class="header">
        <img src="images/logo.png" alt="Logo">
        <h1>Survey & Feedback System</h1>
        <div class="profile">
            <img src="images/profile.png" alt="Profile Picture">
            <div class="dropdown">
                <button class="dropbtn">Account</button>
                <div class="dropdown-content">
                    <a href="registration.php">Register</a>
                    <a href="loginPage.php">Sign In</a>
                    <a href="Index.html">Log Out</a>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="sidebar">
    <a href="home.html">
            <img src="images/home.png" alt="Home"> <!-- Home icon -->
            Home
        </a>
        <a href="users.html">
            <img src="images/users.jpg" alt="Users">
            Users
        </a>
        <a href="survey.html">
            <img src="images/survey.png" alt="Survey">
            Survey
        </a>
        <a href="feedback.html">
            <img src="images/feedback.png" alt="Feedback">
            Feedback
        </a>
        <a href="reports.html">
            <img src="images/reports.png" alt="Survey Reports">
            Reports
        </a>
    </div>
    <div class="container">
        <h2>Add Feedback Rating</h2>
        <form action="addRating.php" method="post">
            <div class="form-group">
                <label for="responseID">Response</label>
                <select id="responseID" name="responseID" required>
                    <?php
                    // Database connection parameters
                    $servername = "localhost";
                    $username = "root";
                    $password = ""; // Your database password
                    $dbname = "surveys_db"; // Replace with your actual database name

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch response IDs and answers
                    $sql = "SELECT ResponseID, Answer FROM Responses";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row["ResponseID"] . '">' . $row["Answer"] . '</option>';
                        }
                    } else {
                        echo '<option value="">No responses found</option>';
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="ratingValue">Rating Value:</label>
                <input type="number" id="ratingValue" name="ratingValue" min="1" max="5" required>
            </div>
            <div class="form-group">
                <label for="raterID">Rater Name:</label>
                <select id="raterID" name="raterID" required>
                    <?php
                    // Create connection (repeated for the sake of brevity)
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection (repeated for the sake of brevity)
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch user IDs and names
                    $sql = "SELECT UserID, UserName FROM User";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row["UserID"] . '">' . $row["UserName"] . '</option>';
                        }
                    } else {
                        echo '<option value="">No users found</option>';
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Add Rating">
                <input type="reset" value="Reset">
            </div>
        </form>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection parameters (repeated for the sake of brevity)
        $servername = "localhost";
        $username = "root";
        $password = ""; // Your database password
        $dbname = "surveys_db"; // Replace with your actual database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get form data
        $responseID = $_POST['responseID'];
        $ratingValue = $_POST['ratingValue'];
        $raterID = $_POST['raterID'];
        $ratingDate = date("Y-m-d H:i:s"); // Current date and time

        // Insert data into FeedbackRating table
        $sql = "INSERT INTO FeedbackRating (ResponseID, RatingValue, RatingDate, RaterID) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiii", $responseID, $ratingValue, $ratingDate, $raterID);

        if ($stmt->execute()) {
            echo "<div class='container'><p>New rating added successfully.</p></div>";
            echo "<script>
                alert('New rating added successfully');
                window.location.href='viewRating.php?msg=New rating added successfully';
                </script>";
        } else {
            echo "<div class='container'><p>Error: " . $sql . "<br>" . $conn->error . "</p></div>";
        }

        $stmt->close();
        $conn->close();
    }
    ?>
    <div class="footer">
        &copy; 2024 Survey And Feedback System
    </div>
</body>
</html>
