<?php
$servername = "localhost";
$username = "root"; // змініть на ваше ім'я користувача БД
$password = "maksim55"; // змініть на ваш пароль БД
$dbname = "sports_shop";

// Створення підключення
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка підключення
if ($conn->connect_error) {
    die("Підключення не вдалося: " . $conn->connect_error);
}
?>

