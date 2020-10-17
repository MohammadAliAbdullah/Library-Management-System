-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2019 at 11:56 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `is_super`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohammad Ali Abdulla', 'mdalibd511@gmail.com', '$2y$10$tchulqXKBqmB0B9G5GV9i.Rsu8KdCfkH7wxbssC4H8BWbTP5tTLMu', 0, NULL, '2019-03-29 00:06:27', '2019-03-29 00:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `authorname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `authorname`, `created_at`, `updated_at`) VALUES
(1, 'abul Khayer', '2019-04-13 02:15:26', '2019-04-13 02:15:26'),
(2, 'Nurul Amin Khalashi', '2019-04-13 02:15:50', '2019-04-13 02:15:50'),
(3, 'mono ronjon dey', '2019-04-13 02:16:42', '2019-04-13 02:16:42'),
(4, 'abul Kalam', '2019-04-13 02:17:07', '2019-04-19 05:39:53'),
(5, 'Yeasin Mia', '2019-04-16 11:24:04', '2019-04-16 11:24:04'),
(6, 'Mohammad Ullah', '2019-04-16 11:24:23', '2019-04-16 11:24:23'),
(7, 'Robayet Hosson', '2019-04-16 11:24:42', '2019-04-16 11:24:42'),
(8, 'Abdullah Al Noman', '2019-04-16 11:25:11', '2019-04-16 11:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `StudentName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL,
  `author_id` int(10) UNSIGNED DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `StudentName`, `department_id`, `author_id`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Microeconomics', 5, 1, '850', '2019-04-15 18:00:00', NULL, NULL),
(21, 'Population and Health Economics', 5, 2, '1200', '2019-04-16 11:19:05', '2019-04-16 11:19:05', NULL),
(22, 'International culture', 2, 4, '800', '2019-04-16 11:20:30', '2019-04-16 11:20:30', NULL),
(23, 'Good chicken book', 14, 3, '250', '2019-04-16 11:21:33', '2019-04-16 11:21:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `departmentName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `departmentName`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'politics', NULL, NULL, NULL),
(3, 'Bangla', NULL, NULL, NULL),
(4, 'English', NULL, NULL, NULL),
(5, 'Economics', NULL, NULL, NULL),
(6, 'politics', NULL, NULL, NULL),
(7, 'Bangla', NULL, NULL, NULL),
(10, 'chamestry', NULL, NULL, NULL),
(12, 'Accounting', NULL, NULL, NULL),
(14, 'Home science', NULL, NULL, NULL),
(16, 'science', NULL, '2019-04-05 11:34:42', '2019-04-16 09:56:23'),
(19, 'economics', NULL, '2019-04-05 11:56:25', '2019-04-05 11:56:25'),
(37, 'social science', NULL, '2019-04-16 09:55:57', '2019-04-16 11:23:18'),
(38, 'Botanic', NULL, '2019-04-18 13:17:54', '2019-04-18 13:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'Rom Event', '2019-04-03', '2019-04-05', '2019-04-02 11:25:10', '2019-04-02 11:25:10'),
(2, 'Coyala Event', '2017-05-11', '2017-05-16', '2019-04-02 11:25:10', '2019-04-02 11:25:10'),
(3, 'Lara Event', '2017-05-16', '2017-05-22', '2019-04-02 11:25:10', '2019-04-02 11:25:10'),
(4, 'Rom Event', '2017-05-10', '2017-05-15', '2019-04-02 11:25:53', '2019-04-02 11:25:53'),
(5, 'Coyala Event', '2017-05-11', '2017-05-16', '2019-04-02 11:25:53', '2019-04-02 11:25:53'),
(6, 'Lara Event', '2017-05-16', '2017-05-22', '2019-04-02 11:25:53', '2019-04-02 11:25:53'),
(7, 'Rom Event', '2019-04-10', '2019-05-15', '2019-04-02 11:42:29', '2019-04-02 11:42:29'),
(8, 'Coyala Event', '2019-04-11', '2019-05-16', '2019-04-02 11:42:29', '2019-04-02 11:42:29'),
(9, 'Lara Event', '2019-04-06', '2019-05-22', '2019-04-02 11:42:29', '2019-04-02 11:42:29'),
(10, 'Rom Event', '2019-04-10', '2019-05-15', '2019-04-02 11:42:34', '2019-04-02 11:42:34'),
(11, 'Coyala Event', '2019-04-11', '2019-05-16', '2019-04-02 11:42:34', '2019-04-02 11:42:34'),
(12, 'Lara Event', '2019-04-06', '2019-05-22', '2019-04-02 11:42:34', '2019-04-02 11:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `id` int(10) UNSIGNED NOT NULL,
  `studentName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registerNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `phoneNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `returnBook` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`id`, `studentName`, `registerNo`, `department_id`, `book_id`, `author_id`, `phoneNo`, `returnBook`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mohammad Ali ', '1278424', 5, 1, 1, '0184754248', '2019-04-28 00:00:00', '2019-04-15 18:00:00', NULL, NULL),
(2, 'Mohammad Liton', '1245784', 6, 22, 4, '0178542412', '2019-04-26 00:00:00', '2019-04-15 18:00:00', NULL, NULL),
(3, 'Mohammad Ali ', '1278424', 5, 1, 1, '0184754248', '2019-04-28 00:00:00', '2019-04-15 18:00:00', NULL, NULL),
(4, 'Mohammad Liton', '1245784', 6, 22, 4, '0178542412', '2019-04-26 00:00:00', '2019-04-15 18:00:00', NULL, NULL),
(5, 'Nurul Amin Khalashi', '124578', 5, 1, 2, '0172542445', '2019-04-30 00:00:00', '2019-04-24 14:35:46', '2019-04-24 14:35:46', NULL),
(6, 'nice', '12345634', 5, 21, 2, '45678978778', '2019-04-26 00:00:00', '2019-04-24 15:12:26', '2019-04-24 15:12:26', NULL),
(7, 'Nurul Amin Khalashi', '214587', 5, 21, 4, '0175487542', '2019-04-19 00:00:00', '2019-04-24 22:33:39', '2019-04-24 22:33:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `libraries`
--

CREATE TABLE `libraries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `establish` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`id`, `name`, `description`, `establish`, `website`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka University central library', 'Dhaka university Dhaka University central library Dhaka University central library Dhaka University central library', '1921', 'www.dhcl.com', NULL, NULL),
(4, 'Dhaka Collage library', 'Dhaka Collage library Dhaka Collage library Dhaka Collage library.Dhaka Collage library Dhaka Collage library Dhaka Collage library', '1841', 'www.dkl.com', '2019-04-18 04:04:33', '2019-04-18 04:04:33'),
(5, 'City Collage library', 'Dhaka Collage library Dhaka Collage library  Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library.', '1969', 'www/cityli.com', NULL, NULL),
(6, 'Eden Collage library', 'Dhaka Collage library Dhaka Collage library  Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library.', '1940', 'www/edenli.com', NULL, NULL),
(7, 'Noakhali Collage library', 'Dhaka Collage library Dhaka Collage library  Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library.', '1968', 'www/Noakhali.com', NULL, NULL),
(8, 'Feni Collage library', 'Dhaka Collage library Dhaka Collage library  Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library.', '1975', 'www/feni.com', NULL, NULL),
(9, 'Luxshipur Collage library', 'Dhaka Collage library Dhaka Collage library  Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library.', '1975', 'www/Luxshipur.com', NULL, NULL),
(10, 'Bogura Collage library', 'Dhaka Collage library Dhaka Collage library  Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library.', '1960', 'www/brotg.com', NULL, NULL),
(11, 'Chittrogram Collage library', 'Dhaka Collage library Dhaka Collage library  Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library.', '1899', 'www/chtradk.com', NULL, NULL),
(12, 'Senbag Collage library', 'Dhaka Collage library Dhaka Collage library  Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library.', '1980', 'www/Senbag.com', NULL, NULL),
(13, 'Chadpur Collage library', 'Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library.', '1980', 'www/chadpur.com', NULL, NULL),
(14, 'Commilla Collage library', 'Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library Dhaka Collage library.', '1990', 'www/commilla.com', NULL, NULL);

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
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_02_24_124854_create_admins_table', 1),
(8, '2019_03_29_055515_create_departmets_table', 2),
(10, '2019_03_29_104333_create_departments_table', 3),
(11, '2019_03_30_192721_create_authors_table', 4),
(12, '2019_04_02_170756_create_events_table', 5),
(13, '2019_04_02_184654_create_products_table', 6),
(14, '2019_04_03_061322_create_posts_table', 7),
(15, '2019_04_03_120919_create_ratings_table', 8),
(16, '2019_04_03_121738_create_rat_posts_table', 9),
(18, '2019_03_29_055339_create_students_table', 10),
(19, '2019_04_05_204741_create_authors_table', 10),
(21, '2019_03_30_194304_create_issue_books_table', 12),
(22, '2019_04_18_084419_create_libraries_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(2, 'Few days ago, i was working on my new project', 'Few days ago, i was working on my new project and project was migrate project php into laravel. I need to migrate apis, So in old php application it returns response as text and i have to keep same response in laravel 5.4 application. So i thought how we can do it, finally i got it, we can do it using response().', NULL, NULL),
(3, 'Few days ago, i was working on my new project', 'Few days ago, i was working on my new project and project was migrate project php into laravel. I need to migrate apis, So in old php application it returns response as text and i have to keep same response in laravel 5.4 application. So i thought how we can do it, finally i got it, we can do it using response().', NULL, NULL),
(4, 'Few days ago, i was working on my new project', 'Few days ago, i was working on my new project and project was migrate project php into laravel. I need to migrate apis, So in old php application it returns response as text and i have to keep same response in laravel 5.4 application. So i thought how we can do it, finally i got it, we can do it using response().', NULL, NULL),
(5, 'Few days ago, i was working on my new project', 'Few days ago, i was working on my new project and project was migrate project php into laravel. I need to migrate apis, So in old php application it returns response as text and i have to keep same response in laravel 5.4 application. So i thought how we can do it, finally i got it, we can do it using response().', NULL, NULL),
(6, 'Few days ago, i was working on my new project', 'Few days ago, i was working on my new project and project was migrate project php into laravel. I need to migrate apis, So in old php application it returns response as text and i have to keep same response in laravel 5.4 application. So i thought how we can do it, finally i got it, we can do it using response().', NULL, NULL),
(7, 'Few days ago, i was working on my new project', 'Few days ago, i was working on my new project and project was migrate project php into laravel. I need to migrate apis, So in old php application it returns response as text and i have to keep same response in laravel 5.4 application. So i thought how we can do it, finally i got it, we can do it using response().', NULL, NULL),
(8, 'Few days ago, i was working on my new project', 'Few days ago, i was working on my new project and project was migrate project php into laravel. I need to migrate apis, So in old php application it returns response as text and i have to keep same response in laravel 5.4 application. So i thought how we can do it, finally i got it, we can do it using response().', NULL, NULL),
(9, 'Few days ago, i was working on my new project', 'Few days ago, i was working on my new project and project was migrate project php into laravel. I need to migrate apis, So in old php application it returns response as text and i have to keep same response in laravel 5.4 application. So i thought how we can do it, finally i got it, we can do it using response().', NULL, NULL),
(10, 'Few days ago, i was working on my new project', 'Few days ago, i was working on my new project and project was migrate project php into laravel. I need to migrate apis, So in old php application it returns response as text and i have to keep same response in laravel 5.4 application. So i thought how we can do it, finally i got it, we can do it using response().', NULL, NULL),
(11, 'Few days ago, i was working on my new project', 'Few days ago, i was working on my new project and project was migrate project php into laravel. I need to migrate apis, So in old php application it returns response as text and i have to keep same response in laravel 5.4 application. So i thought how we can do it, finally i got it, we can do it using response().', NULL, NULL),
(12, 'Lorem Ipsum', 'aaaaa', '2019-04-03 05:52:23', '2019-04-03 05:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'Mohammad Ali Abdulla', 'huygukhj', '2019-04-02 13:04:28', '2019-04-02 13:04:28'),
(2, 'Mohammad Abdul Khalil', 'hfajkfalk', '2019-04-02 13:05:24', '2019-04-02 13:05:24'),
(3, 'Mohammad Abdul Khalil', 'jkal;fjkakjf', '2019-04-02 13:05:38', '2019-04-02 13:05:38'),
(4, 'Mohammad Ali Abdulla', 'kjfajhfalkjh', '2019-04-02 13:05:55', '2019-04-02 13:05:55'),
(6, 'gadsa', 'dfga', '2019-04-02 13:06:13', '2019-04-02 13:06:13'),
(8, 'Mohammad Ali Abdulla', 'cvzczxgvdf', '2019-04-02 13:06:38', '2019-04-02 13:06:38'),
(12, 'Mohammad Ali Abdullah511', 'hdfghs50', '2019-04-02 22:22:31', '2019-04-02 23:08:51');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `rateable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rateable_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rat_posts`
--

CREATE TABLE `rat_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rat_posts`
--

INSERT INTO `rat_posts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'composer require willvincent/laravel-rateable', NULL, NULL),
(2, 'composer require willvincent/laravel-rateable', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL,
  `registerNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rollNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `department_id`, `registerNo`, `rollNo`, `phoneNo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mofiz', 3, '420420', '120120', '12356422', '2019-04-06 23:20:58', '2019-04-16 11:04:19', '2019-04-16 11:04:19'),
(6, 'বাংলাদেশের দাপুটে সিরিজ জয়', 12, '885685', '575757', '7575757', '2019-04-07 00:34:58', '2019-04-16 11:02:51', '2019-04-16 11:02:51'),
(7, 'mehedi hasan22', 16, '54454545', '454545454', '54545454', '2019-04-07 00:42:02', '2019-04-16 11:03:05', '2019-04-16 11:03:05'),
(8, 'mohammad Ali Abdullah', 4, '12345875', '1247851', '12457245', '2019-04-13 01:52:57', '2019-04-16 11:07:30', '2019-04-16 11:07:30'),
(9, 'Adnan Al Ansari', 4, '12434952', '1247854', '01849378521', '2019-04-16 10:47:24', '2019-04-16 11:08:53', '2019-04-16 11:08:53'),
(10, 'Mohammad Ali Abdullah', 4, '124578', '7845123', '01849378611', '2019-04-16 11:10:33', '2019-04-16 11:10:33', NULL),
(11, 'Mohammad Ali Abdullah', 4, '124578', '7845123', '01849378611', '2019-04-16 11:10:34', '2019-04-16 11:11:51', '2019-04-16 11:11:51'),
(12, 'Mohammad Yeasin Mia', 10, '326598', '986532', '01875641235', '2019-04-16 11:11:38', '2019-04-16 11:11:38', NULL),
(13, 'Nurul Amin Khalashi', 5, '254213', '1213213', '015178545', '2019-04-16 14:45:50', '2019-04-16 14:45:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohammad Ali Abdulla', 'mdalibd511@gmail.com', NULL, '$2y$10$s.MZ4vBXQxvn0aeuKHAF1eBC6LhoYlNoBM5yhqvYhoJIq/WfCK6n.', 'ahDNZlJqRuWA1n3CdpzFEe6w71FYtaAnGHs5oWePcgHnzpd4TU0cArFsWH4u', '2019-04-03 06:47:42', '2019-04-03 06:47:42'),
(2, 'Mohammad Ali', 'msujonbd91@gmail.com', NULL, '$2y$10$tu64fmjgkS94obA6DxM5I.Gdh9Bpmzi81DIXSEEjy0HAuz.dKFPXu', NULL, '2019-04-20 15:23:49', '2019-04-20 15:23:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_department_id_foreign` (`department_id`),
  ADD KEY `books_author_id_foreign` (`author_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issue_books_department_id_foreign` (`department_id`),
  ADD KEY `issue_books_book_id_foreign` (`book_id`),
  ADD KEY `issue_books_author_id_foreign` (`author_id`);

--
-- Indexes for table `libraries`
--
ALTER TABLE `libraries`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_rateable_type_rateable_id_index` (`rateable_type`,`rateable_id`),
  ADD KEY `ratings_rateable_id_index` (`rateable_id`),
  ADD KEY `ratings_rateable_type_index` (`rateable_type`),
  ADD KEY `ratings_user_id_index` (`user_id`);

--
-- Indexes for table `rat_posts`
--
ALTER TABLE `rat_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_department_id_foreign` (`department_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rat_posts`
--
ALTER TABLE `rat_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `books_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD CONSTRAINT `issue_books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `issue_books_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `issue_books_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
