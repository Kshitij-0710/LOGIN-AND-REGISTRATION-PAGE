<?php
$servername = "localhost";
$username = "root";
$password = "123"; 
$database = "cseDB";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['pass']; 
$id = mysqli_real_escape_string($conn, $id);
$username = mysqli_real_escape_string($conn, $username);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO users (id, username, password) VALUES ('$id', '$username', '$hashed_password')";
if ($conn->query($sql) === TRUE) {
    echo "New record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
