<?php
$conn->select_db("cseDB");
$sql_create_table = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
)";
if ($conn->query($sql_create_table) === TRUE) {
    echo "Table 'users' created successfully<br>";
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