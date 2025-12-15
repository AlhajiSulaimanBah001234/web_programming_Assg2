<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "football_agent_system";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed");
}
?>
