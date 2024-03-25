<?php
$servername = "localhost";
$username = "root";
$password = "123";
$database = "cseDB";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    
    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                header("location: http://localhost/php/r.html");
                exit();
            } else {
                header("location: http://localhost/php/invalid.html");
            }
        } else {
            header("location: http://localhost/php/invalid.html");
        }
    } 
}
?>
