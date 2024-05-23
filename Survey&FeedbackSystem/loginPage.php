<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huye Sports Login</title>
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
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #c1e0e5;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #000;
            text-align: center;
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
            margin-top: 20px;
        }

        .create-account a {
            color: #007bff;
            text-decoration: none;
        }

        .create-account a:hover {
            text-decoration: underline;
        }

        .forgot-password a {
            color: #007bff;
            text-decoration: none;
        }

        .forgot-password a:hover {
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
    <header class="header"> 
        <h1> Survey & Feedback </h1>
    </header>
    <main>
    <h2>Login</h2>
        <div class="container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="username">Username or Email</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
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
                <input type="submit" value="Sign In" class="btn">
            </form>
            <div class="forgot-password">
                <a href="updateUsername.html">Forgot username?</a> or <a href="updatePassword.html">Forgot password?</a>
            </div>
            <div class="create-account">
                <p>Not Yet Registered? <a href="registration.php">Register here.</a></p>
            </div>
        </div>
    </main>

    <script>
        // Client-side form validation using JavaScript
        function validateForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var role = document.getElementById("role").value;

            // Check if any field is empty
            if (username === "" || password === "" || role === "") {
                alert("All fields are required.");
                return false;
            }

            return true; // Form is valid
        }
    </script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "Surveys_db";

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $stmt = $conn->prepare("SELECT Password FROM User WHERE (Username=? OR Email=?) AND Role=?");
        $stmt->bind_param("sss", $username, $username, $role);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($hashed_password);

        if ($stmt->num_rows > 0) {
            $stmt->fetch();
            if (password_verify($password, $hashed_password)) {
                if ($role == "administrator") {
                    echo "<script>window.location.href = 'dashboard.html';</script>";
                    exit();
                } else {
                    echo "<script>window.location.href = 'home.html';</script>";
                    exit();
                }
            } else {
                echo "<script>alert('Invalid password.'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Invalid username or email.'); window.history.back();</script>";
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
