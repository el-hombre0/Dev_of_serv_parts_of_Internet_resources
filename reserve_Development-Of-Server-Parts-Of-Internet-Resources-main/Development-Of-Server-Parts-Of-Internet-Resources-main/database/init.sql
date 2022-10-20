CREATE DATABASE IF NOT EXISTS main_database;

CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT ALL ON main_database.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE main_database;
CREATE TABLE IF NOT EXISTS users (
    id INT(10) NOT NULL AUTO_INCREMENT,
    login VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(80) NOT NULL,
    roles VARCHAR(10),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS products (
    id INT(10) NOT NULL AUTO_INCREMENT,
    name_of_product VARCHAR(60) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description VARCHAR(100),
    PRIMARY KEY (id)
);

INSERT IGNORE INTO users
SET id = 1,
login = 'Mikhail',
password = '$2y$10$zg8.a61TAaVe.IbijfV/9OcCK2mqWruVU9ZPDCt3LaV0kyfjIgj4K',
roles = 'admin';



INSERT INTO products (name_of_product, price)
VALUES
    ('Дверь входная', 17490),
    ('Светильник светодиодный', 749),
    ('Шпаклевка полимерная', 632),
    ('Мембрана звукоизоляционная', 1719);