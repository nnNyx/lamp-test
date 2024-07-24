<?php
$name = $_POST['name'];
$email = $_POST['email'];

$host = getenv('OPENSHIFT_MYSQL_DB_HOST');
$db = getenv(OPENSHIFT_MYSQL_DB);
$user = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$password = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');

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
