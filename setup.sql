CREATE DATABASE IF NOT EXISTS food_ordering;
USE food_ordering;

CREATE TABLE IF NOT EXISTS menu_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL
);

INSERT INTO menu_items (name, description, price) VALUES
('Margherita Pizza', 'Classic pizza with tomato sauce and mozzarella', 9.99),
('Cheeseburger', 'Juicy beef patty with cheese, lettuce, and tomato', 7.99),
('Caesar Salad', 'Crisp romaine lettuce with Caesar dressing and croutons', 6.99),
('Spaghetti Bolognese', 'Spaghetti pasta with rich meat sauce', 11.99);