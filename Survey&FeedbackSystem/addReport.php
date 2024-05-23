<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Report</title>
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
    display: flex;
    flex-direction: column; /* Ensure vertical alignment */
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
.form-group input[type="datetime-local"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

.form-group textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
    resize: vertical;
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
        <div class="dropdown">
            <a href="users.html">
                <img src="images/users.jpg" alt="Users">
                Users
            </a>
        </div>
        <div class="dropdown">
            <a href="survey.html">
                <img src="images/survey.png" alt="Survey">
                Survey
            </a>
        </div>
        <div class="dropdown">
            <a href="feedback.html">
                <img src="images/feedback.png" alt="Feedback">
                Feedback
            </a>
        </div>
        <a href="reports.html">
            <img src="images/reports.png" alt="Survey Reports">
            Reports
        </a>
    </div>
    <div class="container">
        <h2>Add New Report</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="reportName">Report Name:</label>
                <input type="text" id="reportName" name="reportName" required>
            </div>
            <div class="form-group">
                <label for="reportDescription">Report Description:</label>
                <textarea id="reportDescription" name="reportDescription" rows="4" required></textarea>
            </div><div class="form-group">
                <label for="creatorID">Creator Name:</label>
                <select id="creatorID" name="creatorID" required>
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

                    // Fetch creator names
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
                <label for="creationDate">Creation Date:</label>
                <input type="datetime-local" id="creationDate" name="creationDate" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Add Report">
                <input type="reset" value="Cancel">
            </div>
        </form>
    </div>
    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "surveys_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert report data into the database
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $reportName = $_POST['reportName'];
        $reportDescription = $_POST['reportDescription'];
        $creatorID = $_POST['creatorID'];
        $creationDate = $_POST['creationDate'];

        $sql = "INSERT INTO Reports (ReportName, ReportDescription, CreatorID, CreationDate)
        VALUES ('$reportName', '$reportDescription', '$creatorID', '$creationDate')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Report added successfully!'); window.location.href='viewReport';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>
    <div class="footer">
        &copy; 2024 Survey And Feedback System
    </div>
</body>
</html>
