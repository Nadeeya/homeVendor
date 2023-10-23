-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2023 at 05:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homemadefood1`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `id` varchar(20) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`id`, `username`, `email`, `password`) VALUES
('', 'tester1', 'tester1@gmail.com', '1234'),
('', 'foodie', 'foodie@gmail.com', '12345678'),
('', 'user1', 'user1@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `mycart`
--

CREATE TABLE `mycart` (
  `product_id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `quantity` int(11) NOT NULL,
  `del_method` varchar(60) NOT NULL,
  `vendor` varchar(60) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mycart`
--

INSERT INTO `mycart` (`product_id`, `username`, `quantity`, `del_method`, `vendor`, `status`) VALUES
(1, 'user1', 5, 'pickup', 'loveCookies', '');

-- --------------------------------------------------------

--
-- Table structure for table `myfav`
--

CREATE TABLE `myfav` (
  `username` text NOT NULL,
  `prod_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myfav`
--

INSERT INTO `myfav` (`username`, `prod_id`) VALUES
('tester1', '1'),
('foodie', '2'),
('user1', '1'),
('user1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `prodName` text NOT NULL,
  `image` text NOT NULL,
  `uploadDate` date NOT NULL,
  `description` text NOT NULL,
  `category` text NOT NULL,
  `price` int(11) NOT NULL,
  `vendor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `prodName`, `image`, `uploadDate`, `description`, `category`, `price`, `vendor`) VALUES
(1, 'Chocolate chips cookies', 'photo_2023-08-29_16-55-07.jpg', '2023-08-29', '<p>Embark on a journey of flavor as you savor the rich, buttery goodness of our freshly baked chocolate chip cookies.</p>\r\n<p>With every bite, experience the perfect harmony of velvety, melt-in-your-mouth dough and the decadent allure of premium chocolate chips. Whether youre seeking a comforting treat or sharing moments of joy, our chocolate chip cookies are a delectable companion for every occasion. Join us in embracing the symphony of textures and tastes that only the finest ingredients and expert craftsmanship can deliver. Elevate your cookie experience today.</p>', 'dessert', 12, 'loveCookies'),
(2, 'Cheese cake', 'photo_2023-08-29_16-55-48.jpg', '2023-08-29', '<p>Welcome to a world of creamy decadence thats destined to captivate your senses &ndash; our exquisite cheesecakes. Each velvety slice is a masterpiece, meticulously handcrafted to redefine indulgence. As you delve into the delicate interplay of rich, tangy cream cheese and a buttery graham cracker crust, youll discover a symphony of flavors that tells a story of passion and precision. Our cheesecakes are more than desserts; theyre a manifestation of our dedication to crafting moments of pure delight. Whether youre savoring solitude or sharing laughter with friends, let our cheesecakes be your companions in crafting unforgettable memories. Elevate your taste experience with the epitome of confectionary artistry today.</p>', 'dessert', 24, 'loveCookies'),
(3, 'Brownies', 'photo_2023-08-29_16-55-53.jpg', '2023-08-29', '<p>Indulge in a world of deep, velvety indulgence with our artisanal brownies, where every moment is a journey into the heart of rich cocoa bliss.</p>\r\n<p>Baked to perfection, these luscious squares of heaven are a testament to our passion for creating the ultimate dessert experience. With a perfectly crisp top that gives way to a fudgy, melt-in-your-mouth center, our brownies are a celebration of contrasts that dance on your palate. Whether youre seeking solace in chocolate paradise or sharing smiles with loved ones, our brownies are your invitation to savor lifes sweetest moments.</p>\r\n<p>Elevate your cravings with the embodiment of cocoa enchantment today.</p>', 'dessert', 12, 'loveCookies'),
(4, 'Crispy Chicken Burger', 'photo_2023-08-29_16-55-50.jpg', '2023-08-29', '<p>Indulge in a mouthwatering symphony of taste and texture with our signature chicken burger, a culinary masterpiece thats a testament to our commitment to delivering a sensational dining experience. Immerse yourself in the succulent tenderness of perfectly grilled chicken, nestled within a fresh, toasted bun that cradles every bite with care. Complemented by a medley of crisp, garden-fresh vegetables and a harmonious blend of sauces that tantalize your palate, this burger isnt just a meal &ndash; its an adventure.</p>\r\n<p>Our dedication to sourcing the finest ingredients and crafting each burger with precision ensures that every moment spent savoring this creation is a moment to cherish. Whether youre seeking a flavorful escape or sharing laughter with friends, our chicken burger is your invitation to elevate ordinary moments into extraordinary memories. Embark on a gastronomic journey that promises satisfaction beyond compare.</p>', 'burger', 6, 'Savoury King'),
(5, 'Double Cheese Burger', 'photo_2023-08-29_16-55-51.jpg', '2023-08-29', '<p>Experience the epitome of burger indulgence with our handcrafted beef burger, meticulously prepared to redefine your perception of flavor. From the first succulent bite, youll be transported to a realm where culinary artistry meets unadulterated passion for taste.</p>\r\n<p>Our beef burger is a symphony of premium quality, featuring perfectly seasoned, flame-grilled beef patty nestled within a pillowy-soft bun that cradles every element in perfect harmony. Enhanced by the symphony of carefully selected toppings, crisp lettuce, ripe tomatoes, and a melody of sauces, each layer contributes to a culinary crescendo thats nothing short of extraordinary. Crafted with a commitment to excellence, our burger is a testament to our dedication to sourcing the finest ingredients and infusing each creation with a dash of heart and soul. Whether youre seeking an escape from the ordinary or creating cherished memories with loved ones, our beef burger is your gateway to a world of culinary delight. Elevate your taste experience and embark on a journey where every bite is an adventure in flavor.</p>', 'burger', 8, 'Savoury King'),
(6, 'Nasi Lemak', 'photo_2023-08-29_16-55-52.jpg', '2023-08-29', '<p>Embark on a gastronomic voyage to the heart of Southeast Asian flavors with our exquisite Nasi Lemak, a culinary masterpiece that captures the essence of tradition and innovation. Immerse yourself in the captivating aroma of coconut-infused rice, expertly cooked to a fragrant perfection thats the very foundation of this iconic dish. Each spoonful unfolds a tapestry of taste, as you savor the tender embrace of succulent chicken, the richness of spicy sambal, the crunch of perfectly fried anchovies, and the indulgent creaminess of a soft-boiled egg. Our Nasi Lemak is more than a meal; its a celebration of cultural heritage and a dedication to crafting every component with reverence. The symphony of flavors dances on your palate, a harmonious blend that pays homage to tradition while inviting you to explore new dimensions of taste. Whether youre seeking a nostalgic connection to authentic flavors or embarking on a culinary adventure, our Nasi Lemak promises a sensory experience that transcends boundaries. Join us in relishing a plateful of culinary artistry thats a tribute to the extraordinary richness of Southeast Asian cuisine.</p>', 'rice', 5, 'Savoury King'),
(7, 'Rabokki', 'photo_2023-08-29_17-39-11.jpg', '2023-08-29', '<p>Immerse yourself in a sensational journey through Korean street food culture with our irresistible Tteokbokki, a symphony of flavors and textures that embodies the soul of bustling marketplaces. Delight in the chewy delight of rice cakes, bathed in a rich and fiery gochujang sauce that awakens your taste buds with a harmonious blend of sweet, spicy, and savory notes. The medley of textures, from the soft rice cakes to the crunch of vegetables and the allure of fish cakes, creates a dance of contrasts thats a testament to the art of balance. Every bite is an invitation to explore the heart of Korean gastronomy, meticulously crafted to honor tradition while embracing contemporary twists. Our Tteokbokki isnt just a dish; its an experience that transports you to the vibrant streets of Korea, where flavors collide and memories are made. Whether youre a connoisseur of global cuisines or a curious palate seeking new horizons, our Tteokbokki promises an unforgettable journey that celebrates the brilliance of Korean culinary craftsmanship.</p>', 'noodles', 12, 'koreanFood.bn');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `shopName` text NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `image` text NOT NULL,
  `password` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `shopName`, `email`, `phone`, `image`, `password`, `description`) VALUES
(7, 'loveCookies', 'loveCookies@gmail.com', '010-5937-5764', '', '12', 'Discover exquisite joy in every bite with our artisanal, freshly baked cookies, crafted to perfection'),
(8, 'Savoury King', 'savouryKing@gmail.com', '010-5865-1338', '', '12', 'Experience the art of savory perfection with our handcrafted delights, where premium ingredients and culinary expertise converge to create a symphony of flavors that will enchant your taste buds'),
(9, 'koreanFood.bn', 'koreanFood.bn@gmail.com', '010-5937-5764', '', '12345678', 'Experience the essence of Korea through our diverse menu of authentic and modern Korean delights');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
