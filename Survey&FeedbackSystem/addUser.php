
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
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
    flex-direction: column; /* Keep sidebar items vertical */
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

.sidebar .dropdown-content {
    display: none;
    background-color: #333;
    position: absolute;
    width: 160px;
    z-index: 1;
}

.sidebar .dropdown-content a {
    padding: 10px;
    display: block;
}

.sidebar .dropdown-content a:hover {
    background-color: #575757;
}

.sidebar .dropdown:hover .dropdown-content {
    display: block;
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
.form-group input[type="email"],
.form-group input[type="password"] {
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

/* Specific Styles */
.menu-item {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin: 10px;
    text-align: center;
    width: 200px;
    padding: 20px;
    cursor: pointer;
    transition: transform 0.3s;
}

.menu-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.menu-item img {
    width: 50px;
    height: 50px;
    margin-bottom: 10px;
}

.menu-item h3 {
    margin: 10px 0 0;
    font-size: 18px;
}

.button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 5px 20px;
    cursor: pointer;
    margin: 5px;
    transition: background-color 0.3s;
}

.button:hover {
    background-color: #0056b3;
}

.button img {
    width: 20px;
    height: 20px;
    margin-right: 5px;
}

.card {
    background-color: white;
    padding: 20px;
    margin: 10px 0;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    text-align: center; /* Center align content */
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
            <a href="feedback
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
        <h2>Add New User</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="">Select Role</option>
                    <option value="survey_creator">Survey Creator</option>
                    <option value="respondent">Respondent</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Add User">
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

// Insert user data into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $role = $_POST['role'];

    $sql = "INSERT INTO User (Username, Email, Password, FirstName, LastName, Role)
    VALUES ('$username', '$email', '$password', '$firstName', '$lastName', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('User added successfully!'); window.location.href='viewUser.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
    <div class="footer">
        &copy; 2024 Survey And Feedback System
    </div>
    <script>
        window.onload = function() {
            var urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('success')) {
                alert('User added successfully!');
            }
        };
    </script>
</body>
</html>
