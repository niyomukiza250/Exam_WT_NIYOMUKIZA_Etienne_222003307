<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey And Feedback System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            padding: 20px 0;
            background-color: #007bff;
            color: #fff;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #c1e0e5;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #000;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .left-side, .right-side {
            width: 45%;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: black;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .create-account {
            text-align: center;
            margin-top: 20px;
        }

        .create-account a {
            color: #007bff;
            text-decoration: none;
        }

        .create-account a:hover {
            text-decoration: underline;
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
<body>
<div class="header">
    <h1>Survey And Feedback System</h1>
</div>
<h2>User Registration</h2>
<div class="container">
    <div class="left-side">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" name="firstname" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" name="lastname" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
    </div>
    <div class="right-side">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required autocomplete="new-password">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="">Select Role</option>
                    <option value="administrator">Administrator</option>
                    <option value="survey_creator">Survey Creator</option>
                    <option value="respondent">Respondent</option>
                </select>
            </div>
            <input type="submit" value="Create Account" class="btn">
        </form>
        <div class="create-account">
            <p>Already have an account? <a href="loginPage.php">Sign In</a></p>
        </div>
    </div>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost"; // Adjust if necessary
    $dbusername = "root"; // Your database username
    $dbpassword = ""; // Your database password
    $dbname = "Surveys_db"; // Your database name

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        $stmt = $conn->prepare("INSERT INTO User (FirstName, LastName, Email, Username, Password, Role) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $firstname, $lastname, $email, $username, $hashed_password, $role);

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if ($stmt->execute()) {
            echo "<script>alert('Account created successfully! Redirecting to login page...'); window.location.href = 'loginPage.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } catch (mysqli_sql_exception $e) {
        echo "Error: Unable to connect to the database. " . $e->getMessage();
    }
}
?>

<script>
    function validateForm() {
        var firstname = document.getElementById("firstname").value;
        var lastname = document.getElementById("lastname").value;
        var email = document.getElementById("email").value;
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var role = document.getElementById("role").value;

        if (firstname === "" || lastname === "" || email === "" || username === "" || password === "" || role === "") {
            alert("All fields are required.");
            return false;
        }

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert("Invalid email address.");
            return false;
        }

        return true;
    }
</script>
<div class="footer">
    &copy; 2024 Survey And Feedback System
</div>
</body>
</html>
