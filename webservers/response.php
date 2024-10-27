<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <script>
        function showError(errorMessage) {
            alert(errorMessage); // Alert with the specific error message
            window.location.href = "form.html";
        }
        function showSuccess() {
            alert("Connected successfully!"); // Show success message
        }
    </script>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse; /* For better visibility */
        }
        .error, .success {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Enter data base</h1>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $server = "localhost";
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $database = "Games";
    $conn = mysqli_connect($server, $username, $password, $database);

    if (!$conn) {
        $errorMessage = "Connection failed: " . mysqli_connect_error();
        echo "<script>showError('$errorMessage');</script>";
        exit(); // Stop further execution if the connection fails
    } else {
        echo "<script>showSuccess();</script>";
    }

    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $developer = filter_input(INPUT_POST, 'developer', FILTER_SANITIZE_STRING);
    $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT);

    $sql = "SELECT * FROM Games";
    $conditions = [];

    if (!empty($title)) {
        $conditions[] = "title='$title'";
    }
    if (!empty($developer)) {
        $conditions[] = "developer='$developer'";
    }
    if (!empty($year)) {
        $conditions[] = "year='$year'";
    }

    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Error executing query: " . mysqli_error($conn);
        exit(); // Stop if there is an error with the query
    }

    mysqli_close($conn);
    ?>
    <form action="" method="POST">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title"><br><br>

        <label for="developer">Developer:</label><br>
        <input type="text" id="developer" name="developer"><br><br>

        <label for="year">Year:</label><br>
        <input type="number" id="year" name="year"><br><br>

        <input type="submit" value="Submit">
    </form>
    <table style="width:50%">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Developer</th>
        </tr>
        <?php
        if ($result) {
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['title']}</td>";
                echo "<td>{$row['developer']}</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>
