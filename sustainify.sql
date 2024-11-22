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


INSERT INTO products (name, brand, price, image_url, description, category_id, created_at)
VALUES
    ("Rosemary Mint Scalp & Hair Strengthening Oil",
    "Mielle Cosmetics",
    9.99,
    "https://mielleorganics.com/cdn/shop/files/RMHairMasque-Front_600x.png?v=1682608395",
    "Our Rosemary Mint Scalp and Hair Oil is a nutrient-rich, intensive formula meant to help you address your hair concerns. From nourishing hair follicles, smoothing split ends and help with dry scalp, this hair oil uses essential oils to provide the care your hair deserves. Use it on protective styles, including braids and weaves, and enjoy its fresh, invigorating scent during your next hot oil treatment.",
    1,
    NOW()),
    ("Rosemary Mint Strengthening Hair Masque", 
     "Mielle Cosmetics", 
     9.99, 
     "https://mielleorganics.com/cdn/shop/files/RMHairMasque-Front_600x.png?v=1682608395", 
     "Does your hair deserve a little extra love? Add Mielle's Rosemary Mint Strengthening Hair Masque to your routine! This nutrient-rich formula is made to offer deep moisture and healthy strength. With ingredients such as rosemary, sesame seed oil, honey, and coconut oil, this hair masque offers the hydration and nourishment your hair has been craving.", 
     1, 
     NOW()),

    ("Rosemary Mint Strengthening Shampoo", 
     "Mielle Cosmetics", 
     9.99, 
     "https://mielleorganics.com/cdn/shop/files/20230613-Mielle_RM-Render_Conditioner-C_1_600x.jpg?v=1686778586", 
     "Mielle's Rosemary Mint Strengthening Shampoo was developed to gently cleanse your hair while providing key nutrients. With hair strengthening biotin and ingredients such as coconut and babassu seed oil, you can bring weak or brittle hair back from the brink. Not only does this strengthening shampoo feels and smells great, but it also provides intense moisture for all hair types along with unrivaled slip. A little goes a long way with this hair strengthening shampoo, which works great in concert with our Rosemary Mint Strengthening Hair Masque!", 
     1, 
     NOW()),

    ("Rosemary Mint Daily Styling Créme", 
     "Mielle Cosmetics", 
     9.99, 
     "https://mielleorganics.com/cdn/shop/files/20230613-Mielle_RM-Render_StylingCreme-A_600x.jpg?v=1686773870", 
     "Mielle’s Rosemary Mint Daily Styling Creme is a double-duty gel cream made to help you achieve flawless styles and healthier hair! It also offers frizz protection and great hold for all your favorite styles! And if that’s not enough, it also smells amazing. Give your hair the nourishment it deserves everyday with our Rosemary Mint Daily Styling Creme today!", 
     1, 
     NOW()),

    ("Rosemary Mint Strengthening Leave-In Conditioner", 
     "Mielle Cosmetics", 
     9.99, 
     "https://mielleorganics.com/cdn/shop/files/Rosemary_Mint_LeaveIn_PDP_600x.jpg?v=1730920564", 
     "The Rosemary Mint Strengthening Leave-In Conditioner was developed to meet your hair's needs. Infused with Biotin and Rosemary, this leave-in hydrates while protecting and moisturizing.", 
     1, 
     NOW()),

    ("Rosemary Mint Hair Strengthening Edge Gel", 
     "Mielle Cosmetics", 
     6.99, 
     "https://mielleorganics.com/cdn/shop/files/RM-Edge-Gel-04-23-v2copy_600x.jpg?v=1682608214", 
     "Your edges can be delicate. Shape and smooth them how you like while infusing them with strength and important nutrients with Mielle Organics’ Rosemary Mint Strengthening Edge Gel! With biotin and ingredients such as coconut and babassu seed oil, this edge gel offers you the hold you need along with the nourishment your hair has been craving. You’ll love how it feels – and the great rosemary mint scent – and your hair will love you back for using an edge gel with healthy hold in mind.", 
     1, 
     NOW());

INSERT INTO products (name, brand, price, image_url, description, category_id, created_at)
VALUES
    ("The Homecurl Curl-Defining Cream", 
     "Fenty Beauty", 
     33.60, 
     "https://cdn.shopify.com/s/files/1/0341/3458/9485/files/SUM25_T2PRODUCT_ECOMM_HOMECURL_OPEN_1200X1500_72DPI_1.jpg?v=1717735532", 
     "A silicone-free gel-cream that shapes, defines + enhances curls in one step.", 
     1, 
     NOW()),

    ("The Comeback Kid Instant Damage Repair Treatment Bond Builder", 
     "Fenty Beauty", 
     43.20, 
     "https://cdn.shopify.com/s/files/1/0341/3458/9485/files/FH661950-FENTY-HAIR_LAUNCH_PDP_COMEBACK-KID_SILO_1200x1500_a50dd33e-7ad4-4694-bb4e-0664b2b4d59d.jpg?v=1717732259", 
     "A professional-grade bond-building hair treatment that penetrates deep into the cortex to provide instant inside-out repair, up to 75% improvement in damage* + up to 72% stronger hair*", 
     1, 
     NOW()),

    ("The Protective Type 5-in-1 Heat Protectant Styler", 
     "Fenty Beauty", 
     33.60, 
     "https://cdn.shopify.com/s/files/1/0341/3458/9485/files/SUM25_T2PRODUCT_ECOMM_PROTECTIVETYPE_1200X1500_72DPI_d935485f-069a-490d-8691-1c88ca833a30.jpg?v=1717733984", 
     "A 5-in-1 heat protectant cream that also hydrates, smooths, defrizzes and detangles.", 
     1, 
     NOW()),

    ("The Richer One Moisture Repair Deep Conditioner", 
     "Fenty Beauty", 
     34.80, 
     "https://cdn.shopify.com/s/files/1/0341/3458/9485/files/SUM24_T2PRODUCT_ECOMM_RICHERONE_DEEP-CONDITIONER_OPEN_1200X1500_72DPI.jpg?v=1717733601", 
     "An ultra-hydrating deep conditioner that makes hair softer, reduces breakage + repairs split ends. Looking for lighter moisture? Check out The Rich One Moisture Repair Conditioner.", 
     1, 
     NOW()),

    ("The Rich One Moisture Repair Shampoo", 
     "Fenty Beauty", 
     34.80, 
     "https://cdn.shopify.com/s/files/1/0341/3458/9485/files/FH661950-FENTY-HAIR_LAUNCH_PDP_RICHONE-SHAMPOO_SILO_1200x1500_03ac2553-c89f-429f-a25f-58602c70d002.jpg?v=1717732802", 
     "A hydrating, reparative shampoo that gently cleanses all hair types.", 
     1, 
     NOW());

INSERT INTO products (name, brand, price, image_url, description, category_id, created_at)
VALUES
    ("Reconstructing Treatment Mask", 
     "Cécred", 
     42, 
     "https://cecred.com/cdn/shop/files/20230301_KIRBY_INGREDIENTS_LA_SergiyBarchuk_ReconstructingMask.jpg?v=1717027051", 
     "Hair repair in a jar. Powered by our patent-pending Bioactive Keratin Ferment, this treatment is clinically tested to reduce damage, increase visible strength, and improve shine after 1 use.*", 
     1, 
     NOW()),

    ("Nourishing Hair Oil", 
     "Cécred", 
     44, 
     "https://cecred.com/cdn/shop/files/20230301_KIRBY_INGREDIENTS_LA_SergiyBarchuk_HairOil_000029.jpg?v=1721451873", 
     "This blend of 13 oils and plant-based extracts seals in moisture and adds a soft, natural shine—all without silicone fillers.", 
     1, 
     NOW()),

    ("Clarifying Shampoo & Scalp Scrub", 
     "Cécred", 
     38, 
     "https://cecred.com/cdn/shop/files/20230228_KIRBY_INGREDIENTS_LA_SergiyBarchuk_ClarifyingShampooScalpScrub_000065.jpg?v=1701846427", 
     "Like skincare for your scalp. This Clarifying Shampoo & Scalp Scrub combines a balance of exfoliants, fermented purple willow bark, and tea tree oil to remove buildup and residue from your hair and scalp for a game-changing deep clean. ", 
     1, 
     NOW()),

    ("Moisture Sealing Lotion", 
     "Cécred", 
     38, 
     "https://cecred.com/cdn/shop/files/20230301_KIRBY_INGREDIENTS_LA_SergiyBarchuk_MoistureSealingLotion_000063_1.jpg?v=1701847171", 
     "This multitasker does it all: seals, smooths, and styles with a light hold.", 
     1, 
     NOW()),

    ("Moisturizing Deep Conditioner", 
     "Cécred", 
     38, 
     "https://cecred.com/cdn/shop/files/20230301_KIRBY_INGREDIENTS_LA_SergiyBarchuk_DeepConditioner_000070_1.jpg?v=1701847334", 
     "Bring dehydrated and dull hair back to life. This ultra-rich formula is infused with our African oil blend and shea butter to moisturize, soften, and improve manageability.", 
     1, 
     NOW()),

    ("Hydrating Shampoo", 
     "Cécred", 
     30, 
     "https://cecred.com/cdn/shop/files/20230301_KIRBY_INGREDIENTS_LA_SergiyBarchuk_HydratingShampoo_000033.jpg?v=1702414035", 
     "This luxurious, hyaluronic acid-infused shampoo goes deep on hydration, leaving your hair visibly nourished, manageable, and strong. ", 
     1, 
     NOW()),

    ("Fermented Rice & Rose Protein Ritual", 
     "Cécred", 
     52, 
     "https://cecred.com/cdn/shop/files/PDP_FERMENTED-RICE-AND-ROSE-PROTEIN-RITUAL-BUNDLE.png?v=1717026343", 
     "A luxe ritual made easy. This 2-step ritual begins with a Fermented Rice & Rose Protein Powder that instantly transforms into a water-activated, fortifying hair rinse treatment followed by a conditioning Silk Rinse to balance softness and shine.", 
     1, 
     NOW());
