<!DOCTYPE html>
<html>
    <head>
        <title>Result</title>
    <script>

            function showError() {
            alert("Invalid Username or Password"); // Alert for invalid credentials
            window.location.href = "form.html";
        }

        function showSuccess() {
            alert("Connected successfully!"); // Show success message
        }
    </script>

    <?php
        $server = "localhost";
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $database = "Games";
        $conn = mysqli_connect($server, $username, $password, $database);

        if (!$conn) {
            // Connection failed, output error message
            $errorMessage = "Connection failed: " . mysqli_connect_error(); // Get the error message
            echo "<script>showError($errorMessage);</script>"; // Pass error message to JavaScript
        } else {
            // Connection successful, show success and redirect
            echo "<script>showSuccess();</script>";
        }

        // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare to insert the data into the database
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $developer = filter_input(INPUT_POST, 'developer', FILTER_SANITIZE_STRING);
        $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT);

        // Insert data into the database (replace 'your_table_name' with actual table)
        $query = "INSERT INTO your_table_name (title, developer, year) VALUES ('$title', '$developer', $year)";
        if (mysqli_query($conn, $query)) {
            echo "<p>Data submitted successfully!</p>";
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }
    }

    // Fetch and display data from the database
    $result = mysqli_query($conn, "SELECT id, title, developer FROM your_table_name"); // Replace with actual table name
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<h2>Results:</h2>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>Id: {$row['id']} | Title: {$row['title']} | Developer: {$row['developer']}</p>";
        }
    } else {
        echo "<p>No results found.</p>";
    }
    ?>
    <h1>
        Enter data base
    </h1>
    </head>
    <body>
        <form action="" method="POST">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" >
            <br>
            <br>

            <label for="developer">Developer:</label><br>
            <input type="text" id="developer" name="developer" >
            <br>
            <br>

            <label for="year">Year:</label><br>
            <input type="int" id="year" name="year" >
            <br>
            <br>
            <input type="submit" value="Submit">
        </form>

        
        

    </body>
</html>