<?php
include '../includes/db.php';
include '../includes/header.php';

$category = 'Тренажери';
$sql = "SELECT * FROM products WHERE category='$category'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product'>";
        echo "<img src='/sports_shop/" . $row["image"] . "' alt='" . $row["name"] . "' style='width:200px;height:auto;'><br>";
        echo "<div>";
        echo "<h3>" . $row["name"] . "</h3>";
        echo "<p>" . $row["description"] . "</p>";
        echo "<p>Ціна: $" . $row["price"] . "</p>";
        echo "<button onclick=\"addToCart(" . $row["id"] . ")\">Купити</button>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "No products found.";
}

include '../includes/footer.php';
?>

