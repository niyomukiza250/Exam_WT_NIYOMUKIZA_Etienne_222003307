<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
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
        main {
            margin-left: 220px;
            padding: 20px;
            text-align: center;
        }
        .btn-success {
            padding: 8px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-success:hover {
            background-color: #45a049;
        }
        .search-engine {
    display: inline-flex;
    align-items: center;
}

.search-engine input[type="text"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px 0 0 5px;
    outline: none;
}

.search-engine button[type="submit"] {
    padding: 8px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    outline: none;
}

.search-engine button[type="submit"]:hover {
    background-color: #0056b3;
}

        .btn-success {
            padding: 8px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-success:hover {
            background-color: #45a049;
        }

        .btn-print {
            padding: 8px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }

        h2 {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-print:hover {
            background-color: #0056b3;
        }

        .btn-print i {
            margin-right: 5px;
        }
        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .alert-success {
            background-color: #4CAF50;
        }
        .btn-close {
            float: right;
            cursor: pointer;
        }
        .container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin: 20px;
        }
        .card {
            background-color: white;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: left;
            display: flex;
            align-items: center;
        }
        .card img {
            height: 100px;
            margin-right: 20px;
            border-radius: 50%;
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
        @media print {
            .header, .sidebar, .btn-print, .footer {
                display: none;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header">
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
    </header>
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
    <main>
    <h2>Users
    <div class="search-engine">
        <input type="text" placeholder="Search...">
        <button type="submit">Search</button>
    </div>
    <button class="btn-print" onclick="printTable()">
        <i class="fas fa-print"></i> Print
    </button>
</h2>
        <div class="container" id="userContainer">
            <?php
            // Database connection parameters
            $servername = "localhost";
            $username = "root";
            $password = ""; // Your database password
            $dbname = "surveys_db"; // Replace "surveys_db" with your actual database name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if(isset($_GET['msg'])){
                $msg = $_GET['msg'];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">' . $msg . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }

            // Fetch data from the User table
            $sql = "SELECT UserID, Username, Email, FirstName, LastName, Role FROM User";
            $result = $conn->query($sql);

            // Output data of each row
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='card'>";
                    echo "<img src='images/avatar.png' alt='Avatar'>";
                    echo "<div>";
                    echo "<p><strong>Name:</strong> " . $row["FirstName"] . " " . $row["LastName"] . "</p>";
                    echo "<p><strong>Role:</strong> " . $row["Role"] . "</p>";
                    echo "<p><strong>Username:</strong> " . $row["Username"] . "</p>";
                    echo "<p><strong>Email:</strong> " . $row["Email"] . "</p>";
                    echo "<div class='actions'>"; // Actions container
                    // Edit action
                    echo "<a href='edit_user.php?updateID=" . $row["UserID"] . "'><i class='fas fa-edit'></i></a>";
                    // Delete action
                    echo "<a href='delete_user.php?deleteID=" . $row["UserID"] . "'><i class='fas fa-trash'></i></a>";
                    echo "</div>"; // End of actions container
                    echo "</div>"; // End of card text container
                    echo "</div>"; // End of card container
                }
            } else {
                echo "<div class='container'><p>No data found</p></div>";
            }

            $conn->close();
            ?>
        </div>
    </main>
    <div class="footer">
        &copy; 2024 Survey And Feedback System
    </div>
    <script>
        function printTable() {
            var divToPrint = document.getElementById("userContainer");
            var newWin = window.open("");
            newWin.document.write('<html><head><title>Print User Records</title>');
            newWin.document.write('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">');
            newWin.document.write('<style>.card { background-color: white; padding: 20px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); border-radius: 5px; text-align: left; display: flex; align-items: center; } .card img { height: 100px; margin-right: 20px; border-radius: 50%; }</style>');
            newWin.document.write('</head><body>');
            newWin.document.write(divToPrint.outerHTML);
            newWin.document.write('</body></html>');
            newWin.document.close();
            newWin.print();
            newWin.close();
        }
    </script>
</body>
</html>
