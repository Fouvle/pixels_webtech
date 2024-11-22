Drop DATABASE if EXISTS sustainify;
CREATE DATABASE sustainify;
USE sustainify;


CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    brand VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    rating DECIMAL(3, 2) NOT NULL CHECK (rating BETWEEN 0 AND 5),
    image_url VARCHAR(255) DEFAULT NULL,
    description TEXT DEFAULT NULL,
    category_id INT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);


CREATE TABLE features (
    id INT AUTO_INCREMENT PRIMARY KEY,
    icon VARCHAR(255) DEFAULT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE
);


CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    user_id INT NOT NULL,
    rating DECIMAL(3, 2) NOT NULL CHECK (rating BETWEEN 0 AND 5),
    comment TEXT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    userrole enum('regular','admin') DEFAULT 'regular'
);

CREATE TABLE sustainability_criteria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(255) NOT NULL,
    weight_percentage INT NOT NULL,
    description TEXT NOT NULL
);

INSERT INTO sustainability_criteria (category, weight_percentage, description)
VALUES 
('Ingredient Sourcing & Safety', 30, 'Evaluation based on biodegradability, sustainable sourcing, non-toxic properties, and organic certification.'),
('Packaging & Materials', 20, 'Assessment of recyclable content, compostability, minimal plastic usage, and refillable options.'),
('Manufacturing Process', 20, 'Focus on carbon emissions, energy usage, renewable energy adoption, and waste reduction.'),
('Water Management', 15, 'Evaluation of water conservation, pollution prevention, and wastewater management.'),
('Ethics & Fair Trade', 15, 'Ensures labor rights, ethical sourcing, and fair trade certifications.');

CREATE TABLE recognized_certifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);
INSERT INTO categories (name)
VALUES
    ('haircare'),
    ('skincare'),
    ('bodycare'),
    ('makeup');

INSERT INTO recognized_certifications (name)
VALUES 
('USDA Organic'),
('Leaping Bunny'),
('EcoCert'),
('B Corp');

SELECT *
FROM users AS admin
WHERE userrole = 'admin';
