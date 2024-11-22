-- Create Makeup Brands Table
CREATE TABLE MakeupBrands (
    BrandID INT PRIMARY KEY AUTO_INCREMENT,
    BrandName VARCHAR(255),
    SustainabilityScore INT
);

-- Create Makeup Products Table
CREATE TABLE MakeupProducts (
    ProductID INT PRIMARY KEY AUTO_INCREMENT,
    ProductName VARCHAR(255),
    Description TEXT,
    BrandID INT,
    SustainabilityScore INT,
    FOREIGN KEY (BrandID) REFERENCES MakeupBrands(BrandID) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Populate Makeup Brands Table
INSERT INTO MakeupBrands (BrandName, SustainabilityScore) VALUES 
('MAC', 85), 
('Fenty', 90), 
('Rare Beauty', 88), 
('Pat McGrath Labs', 95);

-- Populate Makeup Products Table
INSERT INTO MakeupProducts (ProductName, Description, BrandID, SustainabilityScore) VALUES 
-- MAC Products
('MAC Lipstick', 'A long-lasting, vibrant lipstick available in multiple shades.', 1, 85),
('MAC Foundation', 'Buildable coverage foundation for a flawless look.', 1, 85),
('MAC Powder', 'Pressed powder for a smooth, matte finish.', 1, 85),
('MAC Highlighter', 'Illuminating highlighter for a radiant glow.', 1, 85),
('MAC Eyeshadow Palette', 'A versatile palette with a range of shades.', 1, 85),
('MAC Mascara', 'Volumizing mascara for fuller lashes.', 1, 85),
('MAC Eyeliner', 'Precision eyeliner for defining your eyes.', 1, 85),
('MAC Lip Gloss', 'Glossy finish lip gloss for everyday wear.', 1, 85),
('MAC Contour Kit', 'A contour palette for defining facial features.', 1, 85),
('MAC Blush', 'A soft, buildable blush for a natural look.', 1, 85),

-- Fenty Products
('Fenty Lip Gloss', 'High-shine lip gloss for a luscious look.', 2, 90),
('Fenty Foundation', 'Lightweight, long-wear foundation for all skin tones.', 2, 90),
('Fenty Concealer', 'Creamy concealer for a flawless finish.', 2, 90),
('Fenty Bronzer', 'Sun-kissed bronzer with a matte finish.', 2, 90),
('Fenty Highlighter', 'Ultra-pigmented highlighter for a radiant glow.', 2, 90),
('Fenty Lip Balm', 'Moisturizing lip balm with a hint of color.', 2, 90),
('Fenty Setting Spray', 'Long-lasting setting spray for makeup.', 2, 90),
('Fenty Eye Primer', 'Eyeshadow primer for extended wear.', 2, 90),
('Fenty Compact Powder', 'Compact powder for a smooth finish.', 2, 90),
('Fenty Brow Pencil', 'Precision eyebrow pencil for natural looks.', 2, 90),

-- Rare Beauty Products
('Rare Beauty Blush', 'Liquid blush for a natural, flushed look.', 3, 88),
('Rare Beauty Lip Balm', 'Hydrating lip balm with a tint of color.', 3, 88),
('Rare Beauty Foundation', 'Lightweight foundation with medium coverage.', 3, 88),
('Rare Beauty Mascara', 'Lengthening and volumizing mascara.', 3, 88),
('Rare Beauty Eyeliner', 'Easy-glide eyeliner for precise application.', 3, 88),
('Rare Beauty Primer', 'Silicone-free primer for a smooth base.', 3, 88),
('Rare Beauty Lipstick', 'Matte lipstick for bold, beautiful lips.', 3, 88),
('Rare Beauty Setting Powder', 'Loose powder for a soft, airbrushed finish.', 3, 88),
('Rare Beauty Concealer', 'Concealer that blurs imperfections.', 3, 88),
('Rare Beauty Eyeshadow Palette', 'Multi-shade palette for versatile looks.', 3, 88),

-- Pat McGrath Labs Products
('Pat McGrath Lipstick', 'Luxurious lipstick with rich pigmentation.', 4, 95),
('Pat McGrath Mascara', 'Dramatic mascara for extreme volume.', 4, 95),
('Pat McGrath Eyeshadow Palette', 'High-performance eyeshadow for bold looks.', 4, 95),
('Pat McGrath Foundation', 'Perfecting foundation for radiant skin.', 4, 95),
('Pat McGrath Blush', 'Silky blush for a soft, diffused glow.', 4, 95),
('Pat McGrath Highlighter', 'Shimmering highlighter for ultimate radiance.', 4, 95),
('Pat McGrath Lip Gloss', 'Glossy lip gloss with brilliant shine.', 4, 95),
('Pat McGrath Contour Kit', 'Professional contour palette for sculpted features.', 4, 95),
('Pat McGrath Eyeliner', 'Long-wear eyeliner for precision and drama.', 4, 95),
('Pat McGrath Lip Balm', 'Nourishing lip balm for soft, supple lips.', 4, 95);

SELECT ProductName, Description, SustainabilityScore 
FROM MakeupProducts 
WHERE BrandID = 2;

SELECT ProductName, Description, BrandID, SustainabilityScore 
FROM MakeupProducts 
WHERE SustainabilityScore > 85;

SELECT MP.ProductName, MP.Description, MB.BrandName, MP.SustainabilityScore 
FROM MakeupProducts MP
JOIN MakeupBrands MB ON MP.BrandID = MB.BrandID;
