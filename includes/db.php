<?php

$host = "MYSQL-8.0";
$user = "root";
$pass = "";
$dbname = "guestbook";

$conn = new mysqli($host, $user, $pass, $dbname);

if($conn->connect_error) {
    echo "Подключиться к бд не удалось: $conn->connect_error";
} 