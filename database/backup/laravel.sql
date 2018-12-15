-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2018 at 03:51 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Javascript', '2018-10-19 00:25:40', '2018-10-19 00:25:40'),
(5, 'Technology', '2018-10-19 00:31:06', '2018-10-19 00:31:06'),
(6, 'Articles', '2018-10-22 08:37:53', '2018-10-22 08:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 3, 11, 'nice post', '2018-10-19 06:04:00', '2018-10-19 06:04:00'),
(5, 3, 11, 'kjgkjfgvb', '2018-10-19 07:12:28', '2018-10-19 07:12:28'),
(6, 4, 1, 'gfhdfhhdg', '2018-10-19 11:52:36', '2018-10-19 11:52:36'),
(7, 5, 1, 'Nice post', '2018-10-21 00:59:55', '2018-10-21 00:59:55'),
(8, 5, 1, 'fsdfsdf', '2018-10-21 08:17:04', '2018-10-21 08:17:04'),
(9, 5, 1, '546546546', '2018-10-21 08:23:39', '2018-10-21 08:23:39'),
(10, 5, 1, '555555555555555555', '2018-10-21 09:30:37', '2018-10-21 09:30:37'),
(11, 5, 1, 'nfghfgh', '2018-10-21 09:30:44', '2018-10-21 09:30:44'),
(12, 5, 1, 'sdfsdfsd', '2018-10-21 09:31:11', '2018-10-21 09:31:11'),
(13, 5, 1, 'sdfsdfdsf', '2018-10-21 09:31:49', '2018-10-21 09:31:49'),
(14, 5, 1, 'fgdsfdsf', '2018-10-21 09:33:21', '2018-10-21 09:33:21'),
(15, 13, 1, 'Nice post', '2018-10-22 08:49:37', '2018-10-22 08:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `name`, `email`, `password`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(11, 'Wordpress', 'abc@gmail.com', '123456', '123456', 'Lahore, Pakistan 123', '2018-10-22 02:31:17', '2018-10-22 02:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `groceries`
--

CREATE TABLE `groceries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `pic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groceries`
--

INSERT INTO `groceries` (`id`, `name`, `type`, `price`, `pic`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Wordpress', 'dfgfd', 43534, 'C:\\fakepath\\0.jpg', 3487, '2018-10-21 06:31:46', '2018-10-21 06:31:46'),
(2, 'Shahzad', 'dfgfd', 43534, 'C:\\fakepath\\0.jpg', 1, '2018-10-21 06:35:39', '2018-10-21 06:35:39'),
(3, 'Articles', 'dfgfd', 43534, 'C:\\fakepath\\0.jpg', 1, '2018-10-21 06:37:19', '2018-10-21 06:37:19'),
(4, 'Laravel', 'sdf', 43534, 'C:\\fakepath\\0.jpg', 1, '2018-10-21 07:01:22', '2018-10-21 07:01:22'),
(5, 'Wordpress', 'dfgfd', 43534, 'C:\\fakepath\\0.jpg', 1, '2018-10-21 07:02:09', '2018-10-21 07:02:09'),
(6, 'Wordpress', 'dfgfd', 43534, 'C:\\fakepath\\0.jpg', 1, '2018-10-21 07:03:40', '2018-10-21 07:03:40'),
(7, 'Wordpress', 'dfgfd', 43534, 'C:\\fakepath\\0.jpg', 1, '2018-10-21 07:39:46', '2018-10-21 07:39:46'),
(8, 'sdfsdf', 'dsfsdf', 43534, 'C:\\fakepath\\0.jpg', 1, '2018-10-21 07:40:28', '2018-10-21 07:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2018_10_11_055529_create_posts_table', 1),
(12, '2018_10_11_055555_create_categories_table', 1),
(13, '2018_10_14_131421_create_tags_table', 1),
(14, '2018_10_14_131737_create_post_tag_table', 1),
(15, '2018_10_15_114923_create_profiles_table', 1),
(16, '2018_10_18_113704_create_settings_table', 1),
(17, '2018_10_19_103207_create_comments_table', 2),
(18, '2018_10_21_104318_create_groceries_table', 3),
(19, '2018_10_21_112637_create_groceries_table', 4),
(20, '2018_10_21_113047_create_groceries_table', 5),
(21, '2018_10_21_164520_create_tests_table', 6),
(22, '2018_10_22_060629_create_forms_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('shahzad@gmail.com', '$2y$10$nWO4EKOHBSQRR2LwVqnb2e71bj3oA1hagJWp/Xs1rc2N825FpHp4a', '2018-10-19 08:12:41'),
('usman.dev@gmail.com', '$2y$10$H9UpqPmx93IFg4VknnEtce4igjma3/BHquQ2AwHeFv0gEPb4xCX.S', '2018-10-19 08:14:03'),
('abc@gmail.com', '$2y$10$FHwjlZ57LTBgl1dijoseruTXxnv76hJT2Lvcb/WZZF1v6Fixms4Ba', '2018-10-19 08:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `featured` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `category_id`, `featured`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 'Why Node.js?', 'why-nodejs', '<div class=\"w3-panel w3-note\" style=\"box-sizing: inherit; padding: 0.01em 16px; margin-top: 16px; margin-bottom: 16px; border-left: 6px solid rgb(255, 235, 59); font-family: Verdana, sans-serif; font-size: 15px;\"><p style=\"background-color: rgb(255, 255, 204); box-sizing: inherit;\"><strong style=\"box-sizing: inherit;\">Node.js uses asynchronous programming!</strong></p><p style=\"box-sizing: inherit;\"><strong style=\"background-color: rgb(255, 255, 204); box-sizing: inherit;\"><br></strong>A common task for a web server can be to open a file on the server and return the content to the client.</p><p style=\"box-sizing: inherit;\">Here is how PHP or ASP handles a file request:</p><ol style=\"box-sizing: inherit;\"><li style=\"box-sizing: inherit;\">Sends the task to the computer\'s file system.</li><li style=\"box-sizing: inherit;\">Waits while the file system opens and reads the file.</li><li style=\"box-sizing: inherit;\">Returns the content to the client.</li><li style=\"box-sizing: inherit;\">Ready to handle the next request.<br style=\"box-sizing: inherit;\"></li></ol><p style=\"box-sizing: inherit;\">Here is how Node.js handles a file request:</p><ol style=\"box-sizing: inherit;\"><li style=\"box-sizing: inherit;\">Sends the task to the computer\'s file system.</li><li style=\"box-sizing: inherit;\">Ready to handle the next request.</li><li style=\"box-sizing: inherit;\">When the file system has opened and read the file, the server returns the content to the client.</li></ol><p style=\"box-sizing: inherit;\">Node.js eliminates the waiting, and simply continues with the next request.</p><p style=\"box-sizing: inherit;\">Node.js runs single-threaded, non-blocking, asynchronously programming, which is very memory efficient.</p></div>', 3, 'uploads/posts/1539927019nodejs.jpeg', 1, NULL, '2018-10-19 00:30:19', '2018-10-19 00:30:19'),
(5, 'Laravel Philosophy', 'laravel-philosophy', '<p style=\"line-height: 1.9; margin-top: 10px; margin-bottom: 20px; font-size: 13px; color: rgb(82, 82, 82); font-family: &quot;Whitney SSm A&quot;, &quot;Whitney SSm B&quot;, sans-serif;\">Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.</p><p style=\"line-height: 1.9; margin-top: 10px; margin-bottom: 20px; font-size: 13px; color: rgb(82, 82, 82); font-family: &quot;Whitney SSm A&quot;, &quot;Whitney SSm B&quot;, sans-serif;\">Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we\'ve attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.</p><p style=\"line-height: 1.9; margin-top: 10px; margin-bottom: 20px; font-size: 13px; color: rgb(82, 82, 82); font-family: &quot;Whitney SSm A&quot;, &quot;Whitney SSm B&quot;, sans-serif;\">Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.</p>', 5, 'uploads/posts/1539955647laravel.jpg', 1, NULL, '2018-10-19 08:27:27', '2018-10-21 12:04:25'),
(13, 'What is Lorem Ipsum?', 'what-is-lorem-ipsum', '<p><span style=\"color: rgb(99, 107, 111); font-size: 18px; background-color: rgb(247, 249, 249);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', 6, 'uploads/posts/15402157470.jpg', 1, NULL, '2018-10-22 08:42:27', '2018-10-22 08:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 4, NULL, NULL),
(3, 3, 2, NULL, NULL),
(4, 3, 3, NULL, NULL),
(5, 4, 1, NULL, NULL),
(6, 4, 2, NULL, NULL),
(9, 6, 2, NULL, NULL),
(10, 6, 3, NULL, NULL),
(12, 8, 2, NULL, NULL),
(13, 8, 3, NULL, NULL),
(14, 4, 1, NULL, NULL),
(15, 5, 4, NULL, NULL),
(16, 6, 4, NULL, NULL),
(18, 8, 4, NULL, NULL),
(21, 10, 1, NULL, NULL),
(22, 11, 1, NULL, NULL),
(24, 6, 1, NULL, NULL),
(25, 6, 11, NULL, NULL),
(26, 7, 11, NULL, NULL),
(27, 8, 11, NULL, NULL),
(28, 9, 11, NULL, NULL),
(29, 10, 11, NULL, NULL),
(30, 11, 11, NULL, NULL),
(31, 12, 11, NULL, NULL),
(32, 13, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `avatar`, `user_id`, `about`, `facebook`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'uploads/avatars/1539930061user.png', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'facebook.com', 'youtube.com', '2018-10-19 00:22:15', '2018-10-19 01:21:01'),
(2, 'uploads/avatars/1.png', 2, NULL, NULL, NULL, '2018-10-19 00:46:15', '2018-10-19 00:46:15'),
(4, 'uploads/avatars/1.png', 4, NULL, NULL, NULL, '2018-10-19 01:06:05', '2018-10-19 01:06:05'),
(5, 'uploads/avatars/1.png', 5, NULL, NULL, NULL, '2018-10-19 01:09:15', '2018-10-19 01:09:15'),
(6, 'uploads/avatars/1.png', 6, NULL, NULL, NULL, '2018-10-19 01:11:43', '2018-10-19 01:11:43'),
(7, 'uploads/avatars/1.png', 7, NULL, NULL, NULL, '2018-10-19 01:12:30', '2018-10-19 01:12:30'),
(8, 'uploads/avatars/1.png', 8, NULL, NULL, NULL, '2018-10-19 01:14:28', '2018-10-19 01:14:28'),
(9, 'uploads/avatars/1.png', 9, NULL, NULL, NULL, '2018-10-19 01:15:12', '2018-10-19 01:15:12'),
(10, 'uploads/avatars/1.png', 10, NULL, NULL, NULL, '2018-10-19 01:18:32', '2018-10-19 01:18:32'),
(12, 'uploads/avatars/1.png', 12, NULL, NULL, NULL, '2018-10-19 02:48:58', '2018-10-19 02:48:58'),
(14, 'uploads/avatars/1.png', 14, NULL, NULL, NULL, '2018-10-22 02:36:16', '2018-10-22 02:36:16'),
(15, 'uploads/avatars/1.png', 15, NULL, NULL, NULL, '2018-10-22 02:38:54', '2018-10-22 02:38:54'),
(16, 'uploads/avatars/1.png', 16, NULL, NULL, NULL, '2018-10-22 02:57:06', '2018-10-22 02:57:06'),
(17, 'uploads/avatars/1.png', 17, NULL, NULL, NULL, '2018-10-22 02:57:19', '2018-10-22 02:57:19'),
(18, 'uploads/avatars/1.png', 18, NULL, NULL, NULL, '2018-10-22 02:57:39', '2018-10-22 02:57:39'),
(23, 'uploads/avatars/1.png', 23, NULL, NULL, NULL, '2018-10-22 03:06:55', '2018-10-22 03:06:55'),
(24, 'uploads/avatars/1.png', 24, NULL, NULL, NULL, '2018-10-22 03:12:35', '2018-10-22 03:12:35'),
(25, 'uploads/avatars/1.png', 12, NULL, NULL, NULL, '2018-10-22 06:37:24', '2018-10-22 06:37:24'),
(26, 'uploads/avatars/1.png', 13, NULL, NULL, NULL, '2018-10-22 06:40:50', '2018-10-22 06:40:50'),
(32, 'uploads/avatars/1.png', 67, NULL, NULL, NULL, '2018-10-22 07:09:15', '2018-10-22 07:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_hours` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `contact_number`, `contact_email`, `address`, `sub_address`, `about`, `working_hours`, `created_at`, `updated_at`) VALUES
(1, 'PostKar', '0 900 78 601', 'itsgardezi@gmail.com', 'Lahore, Pakistan', 'VU Software House', 'This is my very first project in laravel.', '9am to 10pm, Tuesday-Saturday', '2018-10-19 00:22:15', '2018-10-19 00:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`, `created_at`, `updated_at`) VALUES
(2, 'html', '2018-10-19 00:24:58', '2018-10-19 00:24:58'),
(3, 'css', '2018-10-19 00:25:02', '2018-10-19 00:25:02'),
(4, 'laravel', '2018-10-19 00:25:06', '2018-10-19 00:25:06'),
(11, 'Ajax', '2018-10-22 08:16:14', '2018-10-22 08:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hassan', 'abc@gmail.com', '$2y$10$m.aPO00QM8huRYbJS2AI7ukoXLrj83K1blcsVX2deSzuKPG1/1OCG', 1, '15RlCYu3fRxtCnQFnu2PmEO4ZxHJhtTAkaWLl0WhUj72sOi8sJdVeCIIid28', '2018-10-19 00:22:15', '2018-10-19 08:25:03'),
(67, 'Shahzad', 'shahzad@gmail.com', '$2y$10$Xiy1MuChyMUmgedrnrYJIeYzkEeoC8.wvAtRsFx1so2hqx16ajLDO', 1, NULL, '2018-10-22 07:09:15', '2018-10-22 08:50:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groceries`
--
ALTER TABLE `groceries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `groceries`
--
ALTER TABLE `groceries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
