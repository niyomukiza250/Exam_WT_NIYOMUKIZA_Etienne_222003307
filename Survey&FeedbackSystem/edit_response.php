<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Response Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .btn-secondary {
            background-color: #ccc;
            color: #000;
        }

        .btn-secondary:hover {
            background-color: #999;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <main>
        <div class="container">
            <h2>Update Response Record</h2>
            <?php
            // Connection details
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
            $updateMessage = null; // Initialize update message variable

            // Check if ID is set and form is submitted
            if (isset($_GET['updateID']) && isset($_POST['submit'])) {
                $id = $_POST['id']; // Get ID from hidden input
                $respondentID = $_POST['respondentID'];
                $surveyID = $_POST['surveyID'];
                $questionID = $_POST['questionID'];
                $answer = $_POST['answer'];
                $responseDate = date('Y-m-d H:i:s');

                // Prepare and execute the UPDATE statement
                $stmt = $conn->prepare("UPDATE Responses SET RespondentID=?, SurveyID=?, QuestionID=?, Answer=?, ResponseDate=? WHERE ResponseID=?");
                $stmt->bind_param("iiissi", $respondentID, $surveyID, $questionID, $answer, $responseDate, $id);

                try {
                    if ($stmt->execute()) {
                        $updateMessage = "Record updated successfully"; // Set update message
                        echo "<script>
                                if(confirm('$updateMessage')) {
                                    window.location.href = 'viewResponse.php';
                                }
                              </script>";
                    } else {
                        $updateMessage = "Error updating record: " . $stmt->error; // Set error message
                        echo "<script>
                                alert('$updateMessage');
                                window.location.href = 'viewResponse.php';
                              </script>";
                    }
                } catch (Exception $e) {
                    // Handle error gracefully
                    echo "<script>
                            alert('Cannot update response record. Please check associated records and try again later.');
                            window.location.href = 'viewResponse.php';
                          </script>";
                }

                $stmt->close();
            }

            // Fetch existing data for the selected ID
            if (isset($_GET['updateID'])) {
                $id = $_GET['updateID'];
                $sql_select = "SELECT * FROM Responses WHERE ResponseID=?";
                $stmt_select = $conn->prepare($sql_select);
                $stmt_select->bind_param("i", $id);
                $stmt_select->execute();
                $result = $stmt_select->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                } else {
                    $updateMessage = "No record found for ID: $id"; // Set message if no record found
                }

                $stmt_select->close();
            }
            ?>

            <?php
            // Display update message if set
            if (!empty($updateMessage)) {
                echo '<div class="alert alert-success" role="alert">' . $updateMessage . '</div>';
            }
            ?>

            <form method="POST" action="edit_response.php?updateID=<?php echo $id; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="respondentID">Respondent ID:</label>
                    <input type="number" id="respondentID" name="respondentID" value="<?php echo isset($row['RespondentID']) ? $row['RespondentID'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="surveyID">Survey ID:</label>
                    <input type="number" id="surveyID" name="surveyID" value="<?php echo isset($row['SurveyID']) ? $row['SurveyID'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="questionID">Question ID:</label>
                    <input type="number" id="questionID" name="questionID" value="<?php echo isset($row['QuestionID']) ? $row['QuestionID'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="answer">Answer:</label>
                    <textarea id="answer" name="answer" rows="4" required><?php echo isset($row['Answer']) ? htmlspecialchars($row['Answer']) : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Update" class="btn btn-primary">
                    <a href="viewResponse.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
