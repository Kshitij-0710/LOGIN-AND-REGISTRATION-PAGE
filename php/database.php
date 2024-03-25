<?php
$servername = "localhost";
$username = "root";
$password = "123"; 
$database = "my_database"; 
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully<br>";
$sql_create_database = "CREATE DATABASE IF NOT EXISTS cseDB";
if ($conn->query($sql_create_database) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->select_db("cseDB");
$sql_create_table = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    pass VARCHAR(255) NOT NULL
)";
if ($conn->query($sql_create_table) === TRUE) {
    echo "Table 'users' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$id = 1;
$username = "kshitij";
$password = "helloworld";

$sql_insert_record = "INSERT INTO users (id, username, password) VALUES ('$id', '$username', '$password')";
if ($conn->query($sql_insert_record) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Error inserting record: " . $conn->error;
}

$conn->close();
?>