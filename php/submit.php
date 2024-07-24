<?php
$name = $_POST['name'];
$email = $_POST['email'];

$host = getenv('MYSQL_DB_HOST');
$db = getenv('MYSQL_DB_NAME');
$user = getenv('MYSQL_DB_USER');
$password = getenv('MYSQL_DB_PWD');

$conn = new mysqli($host, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the 'users' table (adjust table name as needed)
$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
