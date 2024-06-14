CREATE DATABASE sports_shop;
USE sports_shop;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    image VARCHAR(255)
);

CREATE TABLE cart (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) NOT NULL,
    product_id INT(11) NOT NULL,
    quantity INT(11) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);


INSERT INTO users (username, email, password) VALUES ('john_doe', 'john@example.com', 'securepassword');

INSERT INTO products (name, description, price, category) VALUES 
('Protein Powder', 'High-quality protein powder for muscle growth', 1, 'Спортивні добавки'),
('Treadmill', 'Advanced treadmill for home workouts', 1100, 'Тренажери'),
('Running Shoes', 'Comfortable running shoes for all terrains', 600, 'Спортивний одяг');

SELECT * FROM products WHERE category='Спортивні добавки';
SELECT * FROM products WHERE category='Тренажери';
SELECT * FROM products WHERE category='Спортивний одяг';

CREATE TABLE temp_products AS 
SELECT MIN(id) as id, name, description, price, category, created_at, image 
FROM products 
WHERE name = 'Protein Powder' 
GROUP BY name, description, price, category, created_at, image;

DELETE FROM products WHERE name = 'Protein Powder';

INSERT INTO products (id, name, description, price, category, created_at, image) 
SELECT id, name, description, price, category, created_at, image 
FROM temp_products;

DROP TABLE temp_products;
