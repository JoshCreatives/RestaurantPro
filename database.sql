CREATE TABLE menu_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  price DECIMAL(10,2)
);

CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  customer_name VARCHAR(100),
  item_id INT,
  quantity INT,
  order_time DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO menu_items (name, price) VALUES
('Burger', 5.99),
('Pizza', 7.99),
('Pasta', 6.49),
('Salad', 4.50),
('Steak', 12.99),
('Sushi', 9.99);