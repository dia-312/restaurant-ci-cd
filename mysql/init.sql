CREATE DATABASE IF NOT EXISTS restaurant_db;
USE restaurant_db;

CREATE TABLE IF NOT EXISTS restaurants (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  meal VARCHAR(50),
  rating FLOAT
);

INSERT INTO restaurants (name, meal, rating) VALUES
('Pizza Palace', 'pizza', 4.6),
('Burger Hub', 'burger', 4.4),
('Shawarma King', 'shawarma', 4.8),
('Sushi Spot', 'sushi', 4.7),
('Pasta Corner', 'pasta', 4.5);
('falafel Corner', 'falafel', 4.5);

