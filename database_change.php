<!DOCTYPE html>
<html>
<head>
    <title>Database Update Form</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $databaseName = $_POST['databaseName'];
            $tableNames = $_POST['tableNames'];
            $changeDateTime = $_POST['changeDateTime'];

            // Upload file
            $uploadedFile = $_FILES["uploadedData"]["tmp_name"];

            // Read the file contents
            $fileContent = file_get_contents($uploadedFile);

            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "data_base_change";

            $conn = new mysqli($servername, $username, $password, $dbname);
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Insert data into the verification table
            $sql = "INSERT INTO change_request (database_name, table_names, change_date_time, uploaded_file) VALUES (?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssb", $databaseName, $tableNames, $changeDateTime, $fileContent);

            if ($stmt->execute()) {
                echo "Change request and file submitted for verification!";
            } else {
                echo "Error submitting change request: " . $conn->error;
            }

            $stmt->close();
            $conn->close();
        }
    ?>
    <h1>Database Change</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>a. Name of the database to be changed:</td>
                <td><input type="text" name="databaseName" required></td>
            </tr>
            <tr>
                <td>b. Name(s) of the table(s) to be updated:</td>
                <td><input type="text" name="tableNames" required></td>
            </tr>
            <tr>
                <td>c. Upload the data received from IGCAR / System Engineer:</td>
                <td><input type="file" name="uploadedData" required></td>
            </tr>
            <tr>
                <td>d. Changes carried out on:</td>
                <td><input type="datetime-local" name="changeDateTime" max="<?php echo date('Y-m-d\TH:i'); ?>" required></td>
            </tr>
        </table>
        <p><input type="submit" value="Submit"></p>
    </form>
</body>
</html>
