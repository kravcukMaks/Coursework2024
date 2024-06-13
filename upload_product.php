<?php
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $category = $_POST["category"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO products (name, description, price, category, image) VALUES ('$name', '$description', '$price', '$category', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo "Новий продукт успішно додано!";
        } else {
            echo "Помилка: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Помилка завантаження файлу.";
    }
}

$conn->close();
?>
