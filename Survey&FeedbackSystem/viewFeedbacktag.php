<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Management</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
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

        .alert-info {
            background-color: #007bff;
        }

        .btn-close {
            float: right;
            cursor: pointer;
        }
        .card {
            background-color: white;
            padding: 20px;
            margin: 10px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: center;
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
    <div class="dropdown">
        <a href="users.html">
            <img src="images/users.jpg" alt="Users">
            Users
        </a>
    </div>
    <div class="dropdown">
        <a href="survey.html">
            <img src="images/survey.png" alt="
            Survey">
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
</div><main>
    <h2>Feedback Tags
        <div class="search-engine">
            <input type="text" placeholder="Search...">
            <button type="submit">Search</button>
        </div>
        <button class="btn-print" onclick="printTable()">
            <i class="fas fa-print"></i> Print
        </button>
    </h2>
    <div class="container">
        <!-- PHP code to connect to the database and handle any alerts -->
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
        ?>
    </div>
    <br><br><br>
    <!-- Table for displaying feedback tags -->
    <table id="tagTable" class="table table-hover text-center">
        <tr>
            <th>Tag ID</th>
            <th>Tag Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php
        // Fetch data from the FeedbackTag table
        $sql = "SELECT * FROM FeedbackTag";
        $result = $conn->query($sql);

        // Output data of each row
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["TagID"] . "</td>";
                echo "<td>" . $row["TagName"] . "</td>";
                echo "<td>" . $row["Description"] . "</td>";
                echo "<td>"; // Actions column
                // Edit action
                echo "<a href='edit_tag.php?updateID=" . $row["TagID"] . "'><i class='fas fa-edit'></i></a>";
                // Delete action
                echo "<a href='delete_tag.php?deleteID=" . $row["TagID"] . "'><i class='fas fa-trash'></i></a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</main>
<div class="footer">
    &copy; 2024 Feedback Tag Management
</div>

<script>
function printTable() {
    var divToPrint = document.getElementById("tagTable");
    var newWin = window.open("");
    newWin.document.write('<html><head><title>Print Feedback Tag Records</title>');
    newWin.document.write('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">');
    newWin.document.write('<style>table { width: 100%; border-collapse: collapse; } th, td { padding: 10px; border-bottom: 1px solid #ddd; } th { background-color: #333; color: white; } tr:hover { background-color: #f5f5f5; }</style>');
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
