-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 09:19 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yummy`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `description_1` text DEFAULT NULL,
  `check_text_1` text DEFAULT NULL,
  `check_text_2` text DEFAULT NULL,
  `check_text_3` text DEFAULT NULL,
  `description_2` text DEFAULT NULL,
  `background` varchar(250) NOT NULL,
  `url` varchar(250) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `photo`, `title`, `phone`, `description_1`, `check_text_1`, `check_text_2`, `check_text_3`, `description_2`, `background`, `url`, `active`, `created_at`) VALUES
(1, 'uploads/about_us/imTIuWQEen6mujCUX42Pf3u1W1LGgedKp0cTLrzd.jpg', 'Book a Title', '09991122', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Duis aute irure dolor in reprehenderit in voluptate velit.', 'Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.', 'Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident', 'uploads/about_us/Bhq0dQOHFObNoMgkoBrexNQUZQMcenuZEv98OQww.jpg', 'https://youtu.be/LXb3EKWsInQ', 1, '2022-12-23 15:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `book_a_table`
--

CREATE TABLE `book_a_table` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `people` varchar(100) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `active`, `created_at`) VALUES
(1, 'Starters', 'starters', 1, '2022-12-19 11:18:34'),
(2, 'Web', NULL, 0, '2022-12-19 11:19:37'),
(3, 'Lunch', 'lunch', 1, '2022-12-19 11:19:53'),
(4, 'Breakfast', 'breakfast', 1, '2023-01-05 14:24:51'),
(5, 'Dinner', 'dinner', 1, '2023-01-05 14:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `chefs`
--

CREATE TABLE `chefs` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `twitter` varchar(150) DEFAULT NULL,
  `facebook` varchar(150) DEFAULT NULL,
  `instagram` varchar(150) DEFAULT NULL,
  `linkin` varchar(150) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chefs`
--

INSERT INTO `chefs` (`id`, `photo`, `name`, `position`, `description`, `twitter`, `facebook`, `instagram`, `linkin`, `active`, `created_at`) VALUES
(1, 'uploads/chef/ZHK2qXOONla8jZI17Tid0Mm7saAj0M7u3szfgZJq.jpg', 'Walter White', 'Master Chef', 'Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut. Ipsum exercitationem iure minima enim corporis et voluptate.', 'https://www.w3schools.com/java/java_arrays_multi.asp', NULL, NULL, NULL, 1, '2022-12-29 15:27:42'),
(2, 'uploads/chef/3hVWUWvFs048MTxIuNoWCouxiOsdZj7spu2E8SHx.jpg', 'Sarah Jhonson', 'Patissier', 'Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil minima suscipit corporis. Voluptate sed quas reiciendis animi neque sapiente.', 'https://laracasts.com/discuss/channels/laravel/missing-required-parameters-for-route-adminedit-uri-admineditid', NULL, NULL, NULL, 1, '2022-12-29 15:54:33'),
(3, 'uploads/chef/TqrDuthDzxdVCgcBOmUm73tZNls7sZ8GfNQM7jaB.jpg', 'William', 'Cook', 'Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae deserunt. Voluptates enim aut architecto porro aspernatur molestiae modi.', 'https://laracasts.com/discuss/channels/laravel/missing-required-parameters-for-route-adminedit-uri-admineditid', NULL, NULL, NULL, 1, '2022-12-29 16:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  `sequence` int(11) NOT NULL DEFAULT 1,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `description`, `name`, `position`, `profile`, `sequence`, `active`, `created_at`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, autem.', 'Saul Goodman', 'Ceo & Founder', 'uploads/client/HJSbHqTgfDh4PZKLVR3mecByhCbqXzgPHno3r0gW.jpg', 1, 1, '2023-01-05 16:27:39'),
(3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, autem.', 'SaraWilson', 'Designer', 'uploads/client/rHzABkxp4wcyikQdksGUfFBc7u9fciZC8g9tfOy0.jpg', 2, 1, '2023-01-06 15:06:10'),
(4, 'Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.', 'Jena Karlis', 'Store Owner', 'uploads/client/IB6C8ZY72NVNwuiwAMbZVZ439Wno0odtgW5rduTf.jpg', 3, 1, '2023-01-08 14:40:25'),
(5, 'Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.', 'John Larson', 'Entrepreneur', 'uploads/client/8dsfFpcnNJo0mrdNkgM2miQAzfTS4OPqtgUPSxpi.jpg', 5, 1, '2023-01-08 14:41:23'),
(6, 'Discover New Place With Us, Adventure Awaits', 'Marani', 'Developer fullstack', 'uploads/client/teZPuozWzOQrf27jAoyaFbzfe7TXPvl0qIh4Civi.jpg', 4, 1, '2023-05-02 16:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `hours` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `url` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `title`, `description`, `logo`, `address`, `phone`, `hours`, `email`, `url`) VALUES
(1, 'Rupp .COM', 'Enjoy Your Healthy Delicious Food', 'Sed autem laudantium dolores. Voluptatem itaque ea consequatur eveniet. Eum quas beatae cumque eum quaerat.', 'uploads/company/8OkM3fDWPsZyB5a3RWFROqZOP8F97vpEkhsOh7GN.png', 'A108 Phnom Penh Street Cambodia, NY 535022 - PP', '0967162577', 'Mon-Sat: 11AM - 23PM', 'Developer@gmail.com', 'https://www.youtube.com/watch?v=LXb3EKWsInQ');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `icon`, `title`, `description`, `url`, `active`, `created_at`) VALUES
(1, 'bi bi-gem', 'Corporis voluptates officia eiusmod', 'Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip', NULL, 1, '2022-12-30 16:12:57'),
(2, 'bi bi-inboxes', 'Gift', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt', NULL, 1, '2023-01-01 14:23:05'),
(3, 'bi bi-clipboard-data', 'Labore consequatur incidid dolore', 'Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere', NULL, 1, '2023-01-08 02:48:36'),
(4, NULL, 'Why Choose Yummy?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.', 'https://image.intervention.io/v3/modifying/text-fonts', 0, '2023-01-08 03:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `sequence` int(11) NOT NULL DEFAULT 1,
  `url` varchar(255) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `photo`, `sequence`, `url`, `active`, `created_at`) VALUES
(1, 'uploads/gallery/7FlXWzNlHZ4OKqV9DEdJdokTRIXfNpX3H7ZQEM8F.jpg', 1, 'https://www.w3schools.com/', 1, '2022-12-29 14:34:48'),
(2, 'uploads/gallery/XsWDyRl0ec6tstDQ6PTssB6cLEN2Ygt7zM27k6yF.jpg', 2, NULL, 1, '2022-12-29 14:36:44'),
(3, 'uploads/gallery/8Tz0rJg2x8C6dW2OADjxixonnbD3e4ohGKV2LPwG.jpg', 3, NULL, 1, '2023-01-07 17:04:42'),
(4, 'uploads/gallery/G3dyjFSyOrVkIp2ZOMfFv73QWQhBUtuH0hoFaMw6.jpg', 4, NULL, 1, '2023-01-07 17:05:02'),
(5, 'uploads/gallery/TwSaQ1azG8FollOCpDTILSKjJKElioEkLSIjeDMi.jpg', 5, NULL, 1, '2023-01-10 14:57:54'),
(6, 'uploads/gallery/KUWjAFH1jAGWC2HLl9w6fcxLxPlTn365BPQVLq1A.jpg', 6, NULL, 1, '2023-01-10 14:58:15'),
(7, 'uploads/gallery/hLAKDW3Ms6FS9VU09DEwbz3LMNt3cnws5OHs99f0.jpg', 7, NULL, 1, '2023-01-10 14:59:03'),
(8, 'uploads/gallery/9YpRx1Mrh8vVfR2wgJCypxyOQuVmnjO35p5JMhaL.jpg', 8, NULL, 1, '2023-01-10 14:59:16'),
(9, 'uploads/gallery/GwZ0UuBTUadJB8OuD05ngRkxiqhpmzG1qkqkqHvy.jpg', 9, NULL, 0, '2023-01-10 15:03:37'),
(10, 'uploads/gallery/6CznRnjBMNR2gu0DwGQj5KMgzHWBRCITbzN8nSPR.png', 9, NULL, 1, '2023-01-10 15:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `url` text DEFAULT NULL,
  `category_id` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `image`, `title`, `description`, `price`, `url`, `category_id`, `active`, `created_at`) VALUES
(1, 'uploads/menu/RwhGd9qNSjAXUpWsuTfB7teS44ycMbs4kw24cE6y.png', 'Magnam Tiste', 'Lorem, deren, trataro, filede, nerada', 5.59, 'https://image.intervention.io/v3/modifying/text-fonts', '1', 1, '2023-01-04 14:57:00'),
(2, 'uploads/menu/RW4ZrJoK5awWqZcfeM5Mxn7ya3iKsdLjNOvvqbsV.png', 'Aut Luia', 'Lorem, deren, trataro, filede, nerada', 14.95, NULL, '3', 1, '2023-01-04 16:49:52'),
(3, 'uploads/menu/rwcaDqntG9oMkXc1KhLTDtaz1MuyXILpFDyT8sZL.png', 'Est Eligendi', 'Lorem, deren, trataro, filede, nerada', 22.99, NULL, '5', 1, '2023-01-05 14:26:38'),
(4, 'uploads/menu/5dateXjZgTQb6hklu9GBdTldPPvyqB5Gjt3K1P9n.png', 'Eos Luibusdam', 'Lorem, deren, trataro, filede, nerada', 12.95, NULL, '5', 1, '2023-01-08 15:03:35'),
(5, 'uploads/menu/wq24RgBMJpxbpey0nlh8b0kS5gFJ0P8Bqznvy6Lp.png', 'Rost Beefstack', 'Lorem, deren, trataro, filede, nerada', 11, NULL, '3', 1, '2023-01-08 15:06:46'),
(6, 'uploads/menu/6EZuA7DTTCMmWUBkmL1noIfYvNUIk7IRNtxZeRN2.png', 'Susie Ohio', 'Lorem, deren, trataro, filede, nerada', 9.99, NULL, '5', 1, '2023-01-09 16:41:36'),
(7, 'uploads/menu/aJaEevfXhkVO1uFzI3Frxzqw5FXPu10vC62paZ9k.jpg', 'T-Shirt', 'Lorem, deren, trataro, filede, nerada', 100, NULL, '1', 1, '2023-05-02 16:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_info`
--

CREATE TABLE `page_info` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page_info`
--

INSERT INTO `page_info` (`id`, `title`, `description`, `slug`, `active`, `created_at`) VALUES
(1, 'ABOUT US', 'Learn More About Us', 'about_page', 1, '2023-01-01 14:48:29'),
(3, 'OUR MENU', 'Check Our Yummy Menu', 'menu_page', 1, '2023-01-01 14:50:36'),
(4, 'TESTIMONIALS', 'What Are They Saying About Us', 'testimonial_page', 1, '2023-01-01 14:51:31'),
(5, 'EVENTS', 'Share Your Moments In Our Restaurant', 'event_page', 1, '2023-01-01 14:52:20'),
(6, 'CHEFS', 'Our Proffesional Chefs', 'chef_page', 1, '2023-01-01 14:52:49'),
(7, 'BOOK A TABLE', 'Book Your Stay With Us', 'book_page', 1, '2023-01-01 14:54:03'),
(8, 'GALLERY', 'Check Our Gallery', 'gallery_page', 1, '2023-01-01 14:54:41'),
(9, 'CONTACT', 'Need Help? Contact Us', 'contact_page', 1, '2023-01-01 14:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slide_event`
--

CREATE TABLE `slide_event` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `sequence` int(11) NOT NULL DEFAULT 1,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slide_event`
--

INSERT INTO `slide_event` (`id`, `photo`, `title`, `price`, `detail`, `sequence`, `active`, `created_at`) VALUES
(1, 'uploads/event/eR9IbqraCQsfKOQEDwAxHuTifc6WuabmIMd07nXG.jpg', 'Custome Parties', 29, 'Laborum aperiam atque omnis minus omnis est qui assumenda quos. Quis id sit quibusdam. Esse quisquam ducimus officia ipsum ut quibusdam maxime. Non enim perspiciatis.', 1, 1, '2022-12-27 16:34:42'),
(2, 'uploads/event/6bwWRjHxTwov68oeuDOfv6UK3xhhpiimHR684Tuc.jpg', 'Private Parties', 288, 'Laborum aperiam atque omnis minus omnis est qui assumenda quos. Quis id sit quibusdam. Esse quisquam ducimus officia ipsum ut quibusdam maxime. Non enim perspiciatis.', 2, 1, '2022-12-28 15:28:02'),
(3, 'uploads/event/ufvBIAAba6j3hTqfLrf9M17Q2hZTtEPsTHCz7lkK.jpg', 'Birthday Parties', 499, 'Laborum aperiam atque omnis minus omnis est qui assumenda quos. Quis id sit quibusdam. Esse quisquam ducimus officia ipsum ut quibusdam maxime. Non enim perspiciatis.', 3, 1, '2023-01-08 13:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `name`, `icon`, `url`, `active`, `created_at`) VALUES
(1, 'Laravels', 'facebook', 'https://www.w3schools.com/', 1, '2022-12-19 15:54:25'),
(2, 'PHP', 'twitter', 'https://www.twitter.com/', 1, '2022-12-20 16:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `images` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `images`) VALUES
(1, 'Ratanak', 'Ratanak123@gmail.com', NULL, '$2y$10$VGnuHL8ODtiCqdCNZ5//XOv0.HHx5qAyf8MPNpNbdGSocw3RoseTa', NULL, '2022-12-04 08:53:49', '2022-12-04 08:53:49', 'uploads/users/jJXCGJzoJnjQT0tpSU3RaMz1vLkUDvDC7Zz9kJn2.png'),
(2, 'Admin', 'Admin@gmail.com', NULL, '$2y$10$ETApR3yMZUvVy9icm1OzQuR2SdWI/5w/eauCyXPtQ6aGE345lOhn6', 'PNtCKeAUbSUM8VqMJ9HECyP3q6lJJxbAuroLTlv840ypzHZFNdIobqlLQ6bf', '2022-12-05 07:28:38', '2022-12-05 07:28:38', 'uploads/users/e1NNAB11q4ah6SsRIt0PFMnDRe8rorOxznTvNlE4.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_a_table`
--
ALTER TABLE `book_a_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chefs`
--
ALTER TABLE `chefs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_info`
--
ALTER TABLE `page_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `slide_event`
--
ALTER TABLE `slide_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_email` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `book_a_table`
--
ALTER TABLE `book_a_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chefs`
--
ALTER TABLE `chefs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_info`
--
ALTER TABLE `page_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slide_event`
--
ALTER TABLE `slide_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
