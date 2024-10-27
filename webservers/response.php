<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Capture username and password from form submission
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $database = "Games"; // Change to your actual database name
    $server = "localhost";

    // Check if username and password are provided
    if (empty($username) || empty($password)) {
        die("Username or password cannot be empty");
    }

    // Store credentials in session variables
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;

    // Connect to the database
    $conn = mysqli_connect($server, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo "Connected successfully as user: " . htmlspecialchars($username) . "<br>";
    }
} else {
    // Use stored session variables to connect again if they exist
    if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $database = "Games"; // Your database name
        $server = "localhost";

        // Connect to the database using session variables
        $conn = mysqli_connect($server, $username, $password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    } else {
        // Redirect back to the login form if no session found
        header("Location: form.html");
        exit();
    }
}

// Initialize variables for filtering data
$title = $_POST['title'] ?? '';
$developer = $_POST['developer'] ?? '';
$year = $_POST['year'] ?? '';

// Start building the SQL query
$sql = "SELECT * FROM Games WHERE 1=1"; // Always true condition for building dynamically

if (!empty($title)) {
    $sql .= " AND title='$title'";
}
if (!empty($developer)) {
    $sql .= " AND developer='$developer'";
}
if (!empty($year)) {
    $sql .= " AND year='$year'";
}

echo "SQL Query: " . htmlspecialchars($sql) . "<br>"; // Debugging

// Execute the query
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Query failed: " . mysqli_error($conn)); // Print error message
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Result</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Data from Database</h1>
    
    <!-- Login Form -->
    <?php if (!isset($_SESSION['username'])): ?>
        <form action="" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br><br>
            
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            
            <input type="submit" name="login" value="Login">
        </form>
    <?php else: ?>
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
            // Check if there are results and display them
            if (isset($result) && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['title']}</td>";
                    echo "<td>{$row['developer']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No results found</td></tr>";
            }
            ?>
        </table>
    <?php endif; ?>
</body>
</html>
