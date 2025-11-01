-- SmartDrugsX Database Schema
-- Generated from code analysis of Sophia framework application
-- Database: smartdrugsx_admin

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '0=active, 1=inactive',
  `removed` tinyint(1) DEFAULT 0 COMMENT '0=not removed, 1=removed',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `url` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `canonical` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keywords` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '0=active, 1=inactive',
  `removed` tinyint(1) DEFAULT 0 COMMENT '0=not removed, 1=removed',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `status` (`status`),
  KEY `canonical` (`canonical`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_package`
--

CREATE TABLE `product_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_description`
--

CREATE TABLE `product_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quantity_discount`
--

CREATE TABLE `quantity_discount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` decimal(5,2) NOT NULL COMMENT 'Discount percentage or amount',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `quantity` (`quantity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rating` tinyint(1) DEFAULT NULL COMMENT '1-5 stars',
  `comment` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '0=pending, 1=approved, 2=rejected',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `type` varchar(20) DEFAULT 'percentage' COMMENT 'percentage or fixed',
  `status` tinyint(1) DEFAULT 0 COMMENT '0=active, 1=inactive',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `expires_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `used_promo`
--

CREATE TABLE `used_promo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(45) NOT NULL,
  `code` varchar(50) NOT NULL,
  `used_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `ip` (`ip`),
  KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `apartment` varchar(100) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '0=pending, 1=processing, 2=shipped, 3=completed, 4=cancelled',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `hash` (`hash`),
  KEY `email` (`email`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `checkout_cart`
--

CREATE TABLE `checkout_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checkout_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL COMMENT 'References product_package.id',
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `checkout_id` (`checkout_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coinpayments`
--

CREATE TABLE `coinpayments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `txn_id` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` decimal(20,8) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `txn_id` (`txn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT 'References checkout.id',
  `stripe_payment_id` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency` varchar(10) DEFAULT 'USD',
  `status` varchar(50) DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `stripe_payment_id` (`stripe_payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_timeline`
--

CREATE TABLE `order_timeline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checkout_id` int(11) NOT NULL,
  `event` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `checkout_id` (`checkout_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `subscribed_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Sample data for testing
--

-- Insert a sample category
INSERT INTO `categories` (`id`, `name`, `url`, `status`, `removed`) VALUES
(1, 'Nootropics', 'nootropics', 0, 0),
(2, 'Cognitive Enhancers', 'cognitive-enhancers', 0, 0);

-- Insert a sample product
INSERT INTO `products` (`id`, `title`, `category`, `main_image`, `url`, `canonical`, `seo_title`, `seo_description`, `status`, `removed`) VALUES
(1, 'Sample Nootropic Product', 1, '/assets/products/sample.jpg', 'sample-nootropic-product', 'nootropics/sample-nootropic-product', 'Sample Nootropic Product | SmartDrugsX', 'High quality nootropic supplement for cognitive enhancement', 0, 0);

-- Insert sample product package
INSERT INTO `product_package` (`id`, `product_id`, `name`, `price`, `status`) VALUES
(1, 1, '30 Capsules', 29.99, 0),
(2, 1, '60 Capsules', 49.99, 0),
(3, 1, '90 Capsules', 69.99, 0);

-- Insert sample product description
INSERT INTO `product_description` (`product_id`, `description`) VALUES
(1, '<h2>About This Product</h2><p>This is a sample nootropic product for testing purposes.</p>');

-- Insert sample promo code
INSERT INTO `promo_codes` (`code`, `discount`, `type`, `status`) VALUES
('WELCOME10', 10.00, 'percentage', 0),
('SAVE20', 20.00, 'fixed', 0);

-- --------------------------------------------------------

-- Add foreign key constraints for referential integrity
-- (Uncomment if you want strict foreign key enforcement)

-- ALTER TABLE `products`
--   ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

-- ALTER TABLE `product_package`
--   ADD CONSTRAINT `fk_package_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

-- ALTER TABLE `product_images`
--   ADD CONSTRAINT `fk_images_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

-- ALTER TABLE `product_description`
--   ADD CONSTRAINT `fk_description_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

-- ALTER TABLE `quantity_discount`
--   ADD CONSTRAINT `fk_discount_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

-- ALTER TABLE `reviews`
--   ADD CONSTRAINT `fk_reviews_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

-- ALTER TABLE `checkout_cart`
--   ADD CONSTRAINT `fk_cart_checkout` FOREIGN KEY (`checkout_id`) REFERENCES `checkout` (`id`) ON DELETE CASCADE;

-- ALTER TABLE `coinpayments`
--   ADD CONSTRAINT `fk_coinpayments_order` FOREIGN KEY (`order_id`) REFERENCES `checkout` (`id`) ON DELETE CASCADE;

-- ALTER TABLE `payments`
--   ADD CONSTRAINT `fk_payments_checkout` FOREIGN KEY (`user_id`) REFERENCES `checkout` (`id`) ON DELETE CASCADE;

-- ALTER TABLE `order_timeline`
--   ADD CONSTRAINT `fk_timeline_checkout` FOREIGN KEY (`checkout_id`) REFERENCES `checkout` (`id`) ON DELETE CASCADE;
