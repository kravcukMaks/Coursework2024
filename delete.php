<?php
include 'includes/db.php';

// Створення тимчасової таблиці з унікальним записом
$sql_create_temp = "
CREATE TABLE temp_products AS 
SELECT MIN(id) as id, name, description, price, category, created_at, image 
FROM products 
WHERE name = 'Protein Powder' 
GROUP BY name, description, price, category, created_at, image;
";
if ($conn->query($sql_create_temp) === TRUE) {
    echo "Тимчасова таблиця створена успішно. ";
} else {
    echo "Помилка створення тимчасової таблиці: " . $conn->error;
}

// Видалення всіх записів з таблиці `products` для продукту "Protein Powder"
$sql_delete = "DELETE FROM products WHERE name = 'Protein Powder'";
if ($conn->query($sql_delete) === TRUE) {
    echo "Записи видалено успішно. ";
} else {
    echo "Помилка видалення записів: " . $conn->error;
}

// Перенесення збереженого запису назад в таблицю `products`
$sql_insert = "
INSERT INTO products (id, name, description, price, category, created_at, image) 
SELECT id, name, description, price, category, created_at, image 
FROM temp_products;
";
if ($conn->query($sql_insert) === TRUE) {
    echo "Записи перенесено успішно. ";
} else {
    echo "Помилка перенесення записів: " . $conn->error;
}

// Видалення тимчасової таблиці
$sql_drop_temp = "DROP TABLE temp_products";
if ($conn->query($sql_drop_temp) === TRUE) {
    echo "Тимчасова таблиця видалена успішно.";
} else {
    echo "Помилка видалення тимчасової таблиці: " . $conn->error;
}

$conn->close();
?>
