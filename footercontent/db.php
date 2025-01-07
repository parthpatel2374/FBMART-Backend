 <?php
$servername = "localhost"; // Database server
$username = "root"; // Your database username
$password = ''; // Your database password (if you have one)
$dbname = "fbmart"; // Your database name
$port = 3310; // Your MySQL port

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>