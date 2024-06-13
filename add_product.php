<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Додати продукт</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="container">
        <h2>Додати продукт</h2>
        <form action="upload_product.php" method="post" enctype="multipart/form-data">
            <label for="name">Назва продукту:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="description">Опис:</label>
            <textarea id="description" name="description" required></textarea><br>

            <label for="price">Ціна:</label>
            <input type="text" id="price" name="price" required><br>

            <label for="category">Категорія:</label>
            <select id="category" name="category">
                <option value="Спортивні добавки">Спортивні добавки</option>
                <option value="Тренажери">Тренажери</option>
                <option value="Спортивний одяг">Спортивний одяг</option>
            </select><br>

            <label for="image">Зображення:</label>
            <input type="file" id="image" name="image" required><br>

            <input type="submit" value="Додати продукт">
        </form>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
