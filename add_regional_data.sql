-- Add missing region-specific categories and products
-- This populates the regional shop variants (US, EU, UK, India, Premium)

USE smartdrugsx_admin;

-- Add region-specific categories
INSERT INTO `categories` (`id`, `name`, `url`, `status`, `removed`) VALUES
(9, 'US Domestic', 'us-domestic', 0, 0),
(11, 'UK Domestic', 'uk-domestic', 0, 0),
(12, 'EU Domestic', 'eu-domestic', 0, 0),
(14, 'India Domestic', 'india-domestic', 0, 0),
(15, 'Premium Products', 'premium', 0, 0);

-- Add sample products for each region
INSERT INTO `products` (`title`, `category`, `main_image`, `url`, `canonical`, `seo_title`, `seo_description`, `status`, `removed`) VALUES
('Sample US Nootropic', 9, '/assets/products/sample-us.jpg', 'sample-us-nootropic', 'us-domestic/sample-us-nootropic', 'Sample US Nootropic | SmartDrugsX', 'US domestic shipping - cognitive enhancement supplement', 0, 0),
('Sample UK Nootropic', 11, '/assets/products/sample-uk.jpg', 'sample-uk-nootropic', 'uk-domestic/sample-uk-nootropic', 'Sample UK Nootropic | SmartDrugsX', 'UK domestic shipping - cognitive enhancement supplement', 0, 0),
('Sample EU Nootropic', 12, '/assets/products/sample-eu.jpg', 'sample-eu-nootropic', 'eu-domestic/sample-eu-nootropic', 'Sample EU Nootropic | SmartDrugsX', 'EU domestic shipping - cognitive enhancement supplement', 0, 0),
('Sample India Nootropic', 14, '/assets/products/sample-in.jpg', 'sample-india-nootropic', 'india-domestic/sample-india-nootropic', 'Sample India Nootropic | SmartDrugsX', 'India domestic shipping - cognitive enhancement supplement', 0, 0),
('Premium Nootropic Stack', 15, '/assets/products/sample-premium.jpg', 'premium-nootropic-stack', 'premium/premium-nootropic-stack', 'Premium Nootropic Stack | SmartDrugsX', 'Premium quality cognitive enhancement stack', 0, 0);

-- Add product packages for regional products
-- Product 2 (US)
INSERT INTO `product_package` (`product_id`, `name`, `price`, `status`) VALUES
(2, '30 Capsules', 34.99, 0),
(2, '60 Capsules', 59.99, 0),
(2, '90 Capsules', 79.99, 0);

-- Product 3 (UK)
INSERT INTO `product_package` (`product_id`, `name`, `price`, `status`) VALUES
(3, '30 Capsules', 29.99, 0),
(3, '60 Capsules', 49.99, 0),
(3, '90 Capsules', 69.99, 0);

-- Product 4 (EU)
INSERT INTO `product_package` (`product_id`, `name`, `price`, `status`) VALUES
(4, '30 Capsules', 32.99, 0),
(4, '60 Capsules', 54.99, 0),
(4, '90 Capsules', 74.99, 0);

-- Product 5 (India)
INSERT INTO `product_package` (`product_id`, `name`, `price`, `status`) VALUES
(5, '30 Capsules', 24.99, 0),
(5, '60 Capsules', 39.99, 0),
(5, '90 Capsules', 54.99, 0);

-- Product 6 (Premium)
INSERT INTO `product_package` (`product_id`, `name`, `price`, `status`) VALUES
(6, '30 Capsules', 49.99, 0),
(6, '60 Capsules', 89.99, 0),
(6, '90 Capsules', 119.99, 0);

-- Add product descriptions
INSERT INTO `product_description` (`product_id`, `description`) VALUES
(2, '<h2>About This Product</h2><p>US domestic shipping - fast delivery within the United States.</p>'),
(3, '<h2>About This Product</h2><p>UK domestic shipping - fast delivery within the United Kingdom.</p>'),
(4, '<h2>About This Product</h2><p>EU domestic shipping - fast delivery within the European Union.</p>'),
(5, '<h2>About This Product</h2><p>India domestic shipping - fast delivery within India.</p>'),
(6, '<h2>About This Product</h2><p>Premium quality nootropic stack for advanced users.</p>');
