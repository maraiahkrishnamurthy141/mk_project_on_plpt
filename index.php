<?php
session_start();

$host = "localhost";
$username = "root";
$password = "Murthy@0252009";
$database = "college_3";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

echo "DATABASE CONNECTED SUCCESSFULLY!";
?>
