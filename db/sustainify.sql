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
    category ENUM('skincare', 'makeup', 'bodycare', 'haircare') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category) REFERENCES categories(name) ON DELETE SET NULL
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
CREATE TABLE sections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    icon VARCHAR(255) DEFAULT NULL
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
FROM users
WHERE userrole = 'admin';

-- Haircare Products
INSERT INTO products (name, brand, price, rating, image_url, description, category)
VALUES
    ("Rosemary Mint Scalp & Hair Strengthening Oil", "Mielle Cosmetics", 9.99, 3.5, "images/RMHairMasque-Front_600x.png",
    "Our Rosemary Mint Scalp and Hair Oil is a nutrient-rich, intensive formula meant to help you address your hair concerns. 
    From nourishing hair follicles, smoothing split ends and help with dry scalp, this hair oil uses essential oils to provide the care your hair deserves. 
    Use it on protective styles, including braids and weaves, and enjoy its fresh, invigorating scent during your next hot oil treatment.", 'haircare'),
    ("The Homecurl Curl-Defining Cream", "Fenty Beauty", 33.60, 3.6, "images/UM25_T2PRODUCT_ECOMM_HOMECURL_OPEN_1200X1500_72DPI_1.jpg", "A silicone-free gel-cream that shapes, defines + enhances curls in one step.", 'haircare'),
    ("Reconstructing Treatment Mask", "Cécred", 42.00, 3.7, "images/ReconstructingMask.jpg", "Hair repair in a jar. Powered by our patent-pending Bioactive Keratin Ferment, this treatment is clinically tested to reduce damage, increase visible strength, and improve shine after 1 use.", 'haircare'),
    ("blue tansy treatment serum", "Adwoa Beauty", 36.00, 4.0, "images/Blue_Tansy_Treatment_Serum.jpg", 
     "the blue tansy treatment serum is silicone free and helps to smooth and promote shine without leaving hair feeling greasy or weighed down. 
     the serum will help to reduce breakage and protect hair from heat damage during thermal styling. it is also frizz and humidity resistant.", 'haircare'),
    ("ENU - Black Soap Shampoo", "Eya Naturals", 11.99, 4.3, "images/black_soap_shampoo.png", 
     "This natural shampoo is formulated with the time-honored African black soap that has pure shea butter & coconut oil to hydrate and condition your precious hair and scalp, while you shampoo. 
    It's enriched with peppermint essential oil for a rejuvenating wash day experience.
    This is a hair-to-toe product and may be used as a body wash as well.", 'haircare');


-- Skincare Products
INSERT INTO products (name, brand, price, rating, image_url, description, category) VALUES
('Fat Water Niacinamide Pore-Refining Toner Serum with Barbados Cherry', 'Fenty Beauty', 34.99, 4.5, 'fenty toner.jpg', 'Intense moisture for all skin types with natural ingredients', 'skincare'),
('NIACINAMIDE 10%+TXA 4% Serum', 'Anua', 24.99, 4.3, 'Anua SERUM.jpg', 'Mild serum with organic botanical extracts', 'skincare'),
('Toleriane Purifying Foaming Face Wash', 'La Roche Posay', 45.50, 4.7, 'la Roche.jpg', 'Brightening serum to even skin tone and boost collagen', 'skincare'),
('Neutrogena® Hydro Boost Night Cream', 'Neutrogena', 39.99, 4.4, 'Neutrogena.jpg', 'Overnight regenerative cream with plant-based peptides', 'skincare'),
('Natural Moisturizing Factors + HA', 'The Ordinary', 32.50, 4.6, 'the-ordinary.jpg', 'Intense hydration with multi-molecular hyaluronic acid', 'skincare');

-- Makeup Products
INSERT INTO products (name, brand, price, rating, image_url, description, category) VALUES
("Pro Filtr Soft Matte Longwear Foundation, 'Fenty Beauty', 42.00, 4.6, 'images/mineral-foundation.jpg', 'Zero-waste powder foundation with natural minerals', 'makeup'),
('Tinted Moisturizer', 'Vegan Glam', 36.99, 4.5, 'images/tinted-moisturizer.jpg', 'Lightweight coverage with SPF protection', 'makeup'),
('Organic Lipstick', 'Eco Chic', 24.50, 4.4, 'images/organic-lipstick.jpg', 'Long-lasting color with natural plant-based ingredients', 'makeup'),
('Cream Blush', 'Natural Glow', 29.99, 4.3, 'images/cream-blush.jpg', 'Smooth, buildable cheek color with sustainable packaging', 'makeup'),
('Eyeshadow Palette', 'Green Cosmetics', 48.00, 4.7, 'images/eyeshadow-palette.jpg', 'Versatile palette with highly pigmented, cruelty-free shades', 'makeup');

INSERT INTO sections (title, content, icon) VALUES
('Our Mission', 'We believe that beauty shouldn\'t come at the cost of our planet. Our mission is to...', 'path-to-mission-icon'),
('Sustainability Tracking', 'We meticulously evaluate beauty products across multiple sustainability criteria...', 'path-to-tracking-icon'),
('Brand Spotlight', 'Discover carefully vetted brands that prioritize sustainability...', 'path-to-spotlight-icon');


    
