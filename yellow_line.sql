-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2024 at 05:17 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yellow_line`
--

-- --------------------------------------------------------

--
-- Table structure for table `afc_card_requests`
--

CREATE TABLE `afc_card_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `your_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentMethod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `board_members`
--

CREATE TABLE `board_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `board_members`
--

INSERT INTO `board_members` (`id`, `name`, `designation`, `department`, `location`, `description`, `file`, `featured`, `created_at`, `updated_at`) VALUES
(1, 'Barister Mr Murtaza Wahab', 'Member/Co-Chairman', 'Mayor/Administrator', 'Karachi', '<div>Test Description</div>', '1729583798.png', 1, NULL, NULL),
(2, 'Mr Shakib Ul Hassan', 'Vice Chairman', 'Infrastructure', 'Karachi', '<div>This is a test description</div>', '1729583893.png', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age_limit` varchar(132) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_date_apply` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `title`, `location`, `age_limit`, `qualification`, `job_description`, `last_date_apply`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'CORRIGENMDUM - Change in Walk in Test Date for Junior Executive (Karachi) (Contractual)', 'Karachi', '35', 'HSSC (Intermediate)', '<div><div class=\"career-description mt-4\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; list-style: none; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-family: Poppins, sans-serif; color: rgb(50, 50, 50); font-weight: 600; font-size: 16px; line-height: 30.4px;\">Professional Experience:<div>Bachelors/ Master Degree in copmuter Science and related field</div></div><div class=\"career-skills mt-4\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; list-style: none; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-family: Poppins, sans-serif; color: rgb(50, 50, 50); font-weight: 600; font-size: 16px; line-height: 30.4px;\">Skills &amp; Competencies:<ul class=\"with-bullets\" style=\"padding: 0px 0px 0px 2rem; margin: 0px 0px 1rem; list-style: none; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\"><li style=\"padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: 400; font-size: 15px; line-height: 24.75px; color: rgb(0, 0, 0); list-style: disc !important;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text industry. Lorem Ipsum has been the industry\'s standard .</li><li style=\"padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: 400; font-size: 15px; line-height: 24.75px; color: rgb(0, 0, 0); list-style: disc !important;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li><li style=\"padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: 400; font-size: 15px; line-height: 24.75px; color: rgb(0, 0, 0); list-style: disc !important;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li><li style=\"padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: 400; font-size: 15px; line-height: 24.75px; color: rgb(0, 0, 0); list-style: disc !important;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li><li style=\"padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: 400; font-size: 15px; line-height: 24.75px; color: rgb(0, 0, 0); list-style: disc !important;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li></ul></div><div class=\"educational-bg mt-4\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; list-style: none; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-family: Poppins, sans-serif; color: rgb(50, 50, 50); font-weight: 600; font-size: 16px; line-height: 30.4px;\">Educational Background:<div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text industry. Lorem Ipsum has been the industry\'s standard .</div></div><div class=\"job-loc mt-4\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; list-style: none; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-family: Poppins, sans-serif; color: rgb(50, 50, 50); font-weight: 600; font-size: 16px; line-height: 30.4px;\">Job Location:&nbsp;<span style=\"padding: 0px; margin: 0px; list-style: none; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: 400; font-size: 15px; line-height: 28.5px;\">Karachi</span></div><div class=\"career-terms mt-4\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; list-style: none; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-family: Poppins, sans-serif; color: rgb(50, 50, 50); font-weight: 600; font-size: 16px; line-height: 30.4px;\">Terms &amp; Conditions<ol class=\"with-numbers\" type=\"1\" style=\"padding: 0px 0px 0px 2rem; margin-right: 0px; margin-left: 0px; list-style: outside none; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\"><li style=\"padding: 0px 0px 0px 10px; margin-top: 0px; margin-bottom: 0px; list-style: numbers; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: 400; font-size: 15px; line-height: 24.75px; color: rgb(0, 0, 0);\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text eve industry. Lorem Ipsum has been the industry\'s standard .</li><li style=\"padding: 0px 0px 0px 10px; margin-top: 0px; margin-bottom: 0px; list-style: numbers; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: 400; font-size: 15px; line-height: 24.75px; color: rgb(0, 0, 0);\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li><li style=\"padding: 0px 0px 0px 10px; margin-top: 0px; margin-bottom: 0px; list-style: numbers; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: 400; font-size: 15px; line-height: 24.75px; color: rgb(0, 0, 0);\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li><li style=\"padding: 0px 0px 0px 10px; margin-top: 0px; margin-bottom: 0px; list-style: numbers; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: 400; font-size: 15px; line-height: 24.75px; color: rgb(0, 0, 0);\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li><li style=\"padding: 0px 0px 0px 10px; margin-top: 0px; margin-bottom: 0px; list-style: numbers; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: 400; font-size: 15px; line-height: 24.75px; color: rgb(0, 0, 0);\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li><li style=\"padding: 0px 0px 0px 10px; margin-top: 0px; margin-bottom: 0px; list-style: numbers; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: 400; font-size: 15px; line-height: 24.75px; color: rgb(0, 0, 0);\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li><li style=\"padding: 0px 0px 0px 10px; margin-top: 0px; margin-bottom: 0px; list-style: numbers; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: 400; font-size: 15px; line-height: 24.75px; color: rgb(0, 0, 0);\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li><li style=\"padding: 0px 0px 0px 10px; margin-top: 0px; margin-bottom: 0px; list-style: numbers; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: 400; font-size: 15px; line-height: 24.75px; color: rgb(0, 0, 0);\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li></ol></div></div>', '2024-11-16', 1, 'corrigenmdum-change-in-walk-in-test-date-for-junior-executive-karachi-contractual', '2024-10-20 06:43:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `career_meta`
--

CREATE TABLE `career_meta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jobID` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentID` bigint(20) UNSIGNED DEFAULT NULL,
  `postType` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parentID`, `postType`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Press Release', NULL, 'posts', 'press-release', 1, '2024-10-21 02:45:36', NULL),
(10, 'Advertisements', NULL, 'posts', 'advertisements', 1, '2024-10-21 07:14:51', NULL),
(11, 'Downloads', NULL, 'posts', 'downloads', 1, '2024-10-21 07:14:55', NULL),
(13, 'Notifications', NULL, 'posts', 'notifications', 1, '2024-10-21 07:18:19', NULL),
(14, 'Financial Reports', NULL, 'posts', 'financial-reports', 1, '2024-10-21 07:18:31', NULL),
(15, 'Social and Resettlement Reports', NULL, 'posts', 'social-and-resettlement-reports', 1, '2024-10-21 07:19:45', NULL),
(16, 'Gender action plan Reports', NULL, 'posts', 'gender-action-plan-reports', 1, '2024-10-21 07:20:22', NULL),
(20, 'All SMTA Prohect News', NULL, 'news', 'all-smta-prohect-news', 1, '2024-10-24 03:17:49', NULL),
(21, 'Featured News', NULL, 'news', 'featured-news', 1, '2024-10-24 03:18:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `postID` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `response` int(11) NOT NULL,
  `type` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `postID`, `author`, `content`, `response`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Usman Khan', 'this is a test comment', 0, '', 1, '2024-10-21 06:29:05', NULL),
(2, 1, 'Usman Khan', 'this is a test comment', 0, '', 1, '2024-10-21 06:29:42', NULL),
(3, 1, 'Usman Khan', 'this is a test comment', 0, '', 1, '2024-10-21 06:29:53', NULL),
(4, 1, 'Usman Khan', 'this is a test comment', 0, '', 1, '2024-10-21 06:30:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_requests`
--

CREATE TABLE `contact_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `shares` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` date NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `content`, `featured_image`, `views`, `shares`, `venue`, `status`, `slug`, `event_date`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'It is a long-established fact that reader will be distracted by the readable content of a page when looking at its layout', '<div>Test event</div>', '1729799478.png', 0, 0, 'SMTA Office', 1, 'it-is-a-long-established-fact-that-reader-will-be-distracted-by-the-readable-content-of-a-page-when-looking-at-its-layout', '2024-10-31', '', '2024-10-23 19:00:00', '2024-10-27 17:53:40'),
(2, 'It is a long-established fact that reader will be distracted by the readable content of a page when looking at its layout', '<div>Another Test Event</div>', '1729801472.png', 0, 0, 'SMTA Office', 1, 'it-is-a-long-established-fact-that-reader-will-be-distracted-by-the-readable-content-of-a-page-when-looking-at-its-layout-1', '2024-11-07', '', '2024-10-23 19:00:00', '2024-10-27 04:41:39'),
(3, 'It is a long-established fact that reader will be distracted by the readable content of a page when looking at its layout', '<div>Another test event</div>', '1729801684.png', 0, 0, 'Expo Center Karachi', 1, 'it-is-a-long-established-fact-that-reader-will-be-distracted-by-the-readable-content-of-a-page-when-looking-at-its-layout-2', '2024-10-30', '', '2024-10-23 19:00:00', '2024-10-27 04:41:49'),
(4, 'This is a final test event to check', '<div>TEsting</div>', '1729801724.png', 0, 0, 'SMTA Office', 1, 'this-is-a-final-test-event-to-check', '2024-11-04', '', '2024-10-23 19:00:00', '2024-10-27 04:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `event_gallery`
--

CREATE TABLE `event_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eventID` int(11) NOT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_gallery`
--

INSERT INTO `event_gallery` (`id`, `eventID`, `thumbnail`, `filename`, `type`, `created_at`, `updated_at`) VALUES
(9, 1, '1730069620-0.png', 'N/A', 'image', NULL, NULL),
(10, 1, '1730069620-1.png', 'N/A', 'image', NULL, NULL),
(11, 1, '1730069620-2.png', 'N/A', 'image', NULL, NULL),
(12, 1, '1730069620-3.png', 'N/A', 'image', NULL, NULL),
(13, 1, '1730069620-4.png', 'N/A', 'image', NULL, NULL),
(14, 1, '1730069620-5.png', 'N/A', 'image', NULL, NULL),
(15, 1, '1730069620-6.png', 'N/A', 'image', NULL, NULL),
(16, 1, '1730069620-7.png', 'N/A', 'image', NULL, NULL);

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
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(2, 'This is a test question?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id euismod orci. Maecenas tincidunt ante vitae orci dignissim, a congue massa lobortis. Nulla neque justo, laoreet eget libero vel, pulvinar dapibus ante. Orci varius natoque penatibus et', 1, NULL, NULL),
(3, 'Another test question', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id euismod orci. Maecenas tincidunt ante vitae orci dignissim, a congue massa lobortis. Nulla neque justo, laoreet eget libero vel, pulvinar dapibus ante. Orci varius natoque penatibus et', 1, NULL, NULL),
(4, 'Website is working fine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id euismod orci. Maecenas tincidunt ante vitae orci dignissim, a congue massa lobortis. Nulla neque justo, laoreet eget libero vel, pulvinar dapibus ante. Orci varius natoque penatibus et', 1, NULL, NULL),
(5, 'Website needs improvements', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id euismod orci. Maecenas tincidunt ante vitae orci dignissim, a congue massa lobortis. Nulla neque justo, laoreet eget libero vel, pulvinar dapibus ante. Orci varius natoque penatibus et', 1, NULL, NULL),
(6, 'What is brt service?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id euismod orci. Maecenas tincidunt ante vitae orci dignissim, a congue massa lobortis. Nulla neque justo, laoreet eget libero vel, pulvinar dapibus ante. Orci varius natoque penatibus et', 1, NULL, NULL),
(7, 'How can we contact', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id euismod orci. Maecenas tincidunt ante vitae orci dignissim, a congue massa lobortis. Nulla neque justo, laoreet eget libero vel, pulvinar dapibus ante. Orci varius natoque penatibus et', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fares`
--

CREATE TABLE `fares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fares`
--

INSERT INTO `fares` (`id`, `from`, `to`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Abdullah Chowk', 'KDA Flats', '15.00', NULL, NULL),
(2, 'Abdullah Chowk', 'Karimi Chowrangi', '15.00', NULL, NULL),
(3, 'Abdullah Chowk', 'Surjani Chowrangi (4K)', '20.00', NULL, NULL),
(4, 'Abdullah Chowk', '2 Minute Chowrangi', '20.00', NULL, NULL),
(5, 'Abdullah Chowk', 'Road 2400 (Aisha Complex)', '20.00', NULL, NULL),
(6, 'Abdullah Chowk', 'Power House Chowrangi', '25.00', NULL, NULL),
(7, 'Abdullah Chowk', 'Road 4200 (Saleem Center)', '25.00', NULL, NULL),
(8, 'Abdullah Chowk', 'U.P Morr', '25.00', NULL, NULL),
(9, 'Abdullah Chowk', 'Nagan Chowrangi', '30.00', NULL, NULL),
(10, 'Abdullah Chowk', 'Erum Shopping (Shadman No:2)', '30.00', NULL, NULL),
(11, 'Abdullah Chowk', 'Jummah Bazar (Bayani Center)', '35.00', NULL, NULL),
(12, 'Abdullah Chowk', 'Five Star Chowrangi', '35.00', NULL, NULL),
(13, 'Abdullah Chowk', 'Hyderi', '40.00', NULL, NULL),
(14, 'Abdullah Chowk', 'Board Office', '40.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `featured_image`, `filename`, `type`, `created_at`, `updated_at`) VALUES
(1, '<strong>LOREM IPSUM</strong>, SOMETIMES REFFERED TO', '1729743586.png', NULL, 'photo', '2024-10-22 19:00:00', NULL),
(2, 'LOREM IPSUM, SOMETIMES <strong>REFFERED TO</strong>', '1729743688.png', NULL, 'photo', '2024-10-22 19:00:00', NULL),
(3, 'LOREM IPSUM, <strong>SOMETIMES</strong> REFFERED TO', '1729743762.png', NULL, 'photo', '2024-10-26 19:00:00', NULL),
(4, '<strong>LOREM IPSUM</strong>, SOMETIMES REFFERED TO', '1729743586.png', NULL, 'photo', '2024-10-22 19:00:00', NULL),
(5, 'LOREM IPSUM, SOMETIMES <strong>REFFERED TO</strong>', '1729743688.png', NULL, 'photo', '2024-10-22 19:00:00', NULL),
(6, 'LOREM IPSUM, <strong>SOMETIMES</strong> REFFERED TO', '1729743762.png', NULL, 'photo', '2024-10-26 19:00:00', NULL),
(7, '<strong>LOREM IPSUM</strong>, SOMETIMES REFFERED TO', '1729744082.png', '1729744082.mp4', 'video', '2024-10-21 19:00:00', NULL),
(8, 'LOREM IPSUM, SOMETIMES <strong>REFFERED TO</strong>', '1729744109.png', '1729744109.mp4', 'video', '2024-10-18 19:00:00', NULL),
(9, 'LOREM IPSUM, <strong>SOMETIMES</strong> REFFERED TO', '1729744134.png', '1729744134.mp4', 'video', '2024-10-20 19:00:00', NULL),
(10, '<strong>LOREM IPSUM</strong>, SOMETIMES REFFERED TO', '1729744082.png', '1729744082.mp4', 'video', '2024-10-21 19:00:00', NULL),
(11, 'LOREM IPSUM, SOMETIMES <strong>REFFERED TO</strong>', '1729744109.png', '1729744109.mp4', 'video', '2024-10-18 19:00:00', NULL),
(12, 'LOREM IPSUM, <strong>SOMETIMES</strong> REFFERED TO', '1729744134.png', '1729744134.mp4', 'video', '2024-10-20 19:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jobID` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `jobID`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 1, NULL, NULL),
(3, 1, 1, NULL, NULL),
(4, 1, 1, NULL, NULL),
(5, 1, 1, NULL, NULL),
(6, 1, 1, NULL, NULL),
(7, 1, 1, NULL, NULL),
(8, 1, 1, NULL, NULL),
(9, 1, 1, NULL, NULL),
(10, 1, 1, NULL, NULL),
(11, 1, 1, NULL, NULL),
(12, 1, 1, NULL, NULL),
(13, 1, 1, NULL, NULL),
(14, 1, 1, NULL, NULL),
(15, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_application_meta`
--

CREATE TABLE `job_application_meta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicationID` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_application_meta`
--

INSERT INTO `job_application_meta` (`id`, `applicationID`, `meta_key`, `meta_value`, `category`, `created_at`, `updated_at`) VALUES
(36, 6, 'first_name', 'Usman', '', NULL, NULL),
(37, 6, 'last_name', 'Khan', '', NULL, NULL),
(38, 6, 'date_of_birth', '2022-12-19', '', NULL, NULL),
(39, 6, 'age', '12', '', NULL, NULL),
(40, 6, 'email', 'bluevisionary3@gmail.com', '', NULL, NULL),
(41, 6, 'phone', '03313088018', '', NULL, NULL),
(42, 6, 'address', 'House A-494 Gulistan e Johar Block 7', '', NULL, NULL),
(43, 6, 'city', 'Karachi', '', NULL, NULL),
(44, 6, 'province', 'sindh', '', NULL, NULL),
(45, 6, 'zipcode', '75290', '', NULL, NULL),
(46, 6, 'country', 'Pakistan', '', NULL, NULL),
(51, 6, 'education[0][degree_certificate]', 'PhD', '', NULL, NULL),
(52, 6, 'education[0][descipline]', 'asd', '', NULL, NULL),
(53, 6, 'education[0][grade]', 'a', '', NULL, NULL),
(54, 6, 'education[0][institute]', 'sindh boardd', '', NULL, NULL),
(55, 6, 'education[1][degree_certificate]', 'Masters', '', NULL, NULL),
(56, 6, 'education[1][discipline]', 'asd', '', NULL, NULL),
(57, 6, 'education[1][grade]', 'xc vd', '', NULL, NULL),
(58, 6, 'education[1][institute]', 'v xvcxcvxcv', '', NULL, NULL),
(59, 7, 'first_name', 'Usman', '', NULL, NULL),
(60, 7, 'last_name', 'Khan', '', NULL, NULL),
(61, 7, 'date_of_birth', '2022-12-19', '', NULL, NULL),
(62, 7, 'age', '12', '', NULL, NULL),
(63, 7, 'email', 'bluevisionary3@gmail.com', '', NULL, NULL),
(64, 7, 'phone', '03313088018', '', NULL, NULL),
(65, 7, 'address', 'House A-494 Gulistan e Johar Block 7', '', NULL, NULL),
(66, 7, 'city', 'Karachi', '', NULL, NULL),
(67, 7, 'province', 'sindh', '', NULL, NULL),
(68, 7, 'zipcode', '75290', '', NULL, NULL),
(69, 7, 'country', 'Pakistan', '', NULL, NULL),
(103, 8, 'first_name', 'Usman', '', NULL, NULL),
(104, 8, 'last_name', 'Khan', '', NULL, NULL),
(105, 8, 'date_of_birth', '1', '', NULL, NULL),
(106, 8, 'age', '12', '', NULL, NULL),
(107, 8, 'email', 'bluevisionary3@gmail.com', '', NULL, NULL),
(108, 8, 'phone', '03313088018', '', NULL, NULL),
(109, 8, 'address', 'House A-494 Gulistan e Johar Block 7', '', NULL, NULL),
(110, 8, 'city', 'Karachi', '', NULL, NULL),
(111, 8, 'province', 'sindh', '', NULL, NULL),
(112, 8, 'zipcode', '75290', '', NULL, NULL),
(113, 8, 'country', 'Pakistan', '', NULL, NULL),
(114, 8, 'education[0][degree_certificate]', 'M. Phil', '', NULL, NULL),
(115, 8, 'education[0][discipline]', 'Mastering Engineering', '', NULL, NULL),
(116, 8, 'education[0][grade]', 'A+', '', NULL, NULL),
(117, 8, 'education[0][institute]', 'Sindh Board', '', NULL, NULL),
(118, 8, 'education[1][degree_certificate]', 'Masters', '', NULL, NULL),
(119, 8, 'education[1][descipline]', 'engineering', '', NULL, NULL),
(120, 8, 'education[1][grade]', 'B', '', NULL, NULL),
(121, 8, 'education[1][institute]', 'dddd', '', NULL, NULL),
(122, 8, 'experience[0][designation_position]', 'sad', '', NULL, NULL),
(123, 8, 'experience[0][company_organization]', 'asdasd', '', NULL, NULL),
(124, 8, 'experience[0][start_date]', '2024-01-01', '', NULL, NULL),
(125, 8, 'experience[0][end_date]', '2024-01-01', '', NULL, NULL),
(126, 8, 'experience[0][description]', 'asdsadsa', '', NULL, NULL),
(127, 8, 'current_benefits', 'dasd asd asd asdas', '', NULL, NULL),
(128, 8, 'employementStatus', 'Unemployed', '', NULL, NULL),
(129, 8, 'current_salary', '350000', '', NULL, NULL),
(130, 8, 'expected_salary', '450000', '', NULL, NULL),
(131, 8, 'exp_years', '1', '', NULL, NULL),
(132, 8, 'exp_months', '6', '', NULL, NULL),
(133, 14, 'first_name', 'Usman', '', NULL, NULL),
(134, 14, 'last_name', 'Khan', '', NULL, NULL),
(135, 14, 'date_of_birth', '1995-12-02', '', NULL, NULL),
(136, 14, 'age', '15', '', NULL, NULL),
(137, 14, 'email', 'bluevisionary3@gmail.com', '', NULL, NULL),
(138, 14, 'phone', '03313088018', '', NULL, NULL),
(139, 14, 'address', 'House A-494 Gulistan e Johar Block 7', '', NULL, NULL),
(140, 14, 'city', 'Karachi', '', NULL, NULL),
(182, 15, 'created_at', '2024-01-01', '', NULL, NULL),
(183, 15, 'coverLetter', 'a:1:{i:0;s:15:\"1730018143.jpeg\";}', '', NULL, NULL),
(184, 15, 'resume', 'a:1:{i:0;s:15:\"1730018147.jpeg\";}', '', NULL, NULL),
(185, 15, 'documents', 'a:1:{i:0;s:15:\"1730018151.jpeg\";}', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manage_buses`
--

CREATE TABLE `manage_buses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manage_buses`
--

INSERT INTO `manage_buses` (`id`, `title`, `file`, `theme`, `description`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'People Bus Service PBS', '', 'red', 'o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its', 'people-bus-service-pbs', NULL, NULL),
(2, 'Yellow Line BRT (kmp)', '', 'yellow', 'o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its', 'yellow-line-brt-kmp', NULL, NULL),
(3, 'Red Line BRT', '', 'red', 'o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its', 'red-line-brt', NULL, NULL),
(4, 'Green Line BRT', '', 'green', 'o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its', 'green-line-brt', NULL, NULL),
(5, 'Orange Line BRT', '', 'orrange', 'o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its', 'orange-line-brt', NULL, NULL),
(6, 'Pink Bus', '', 'pink', 'o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its', 'pink-bus', NULL, NULL),
(7, 'Electric Vehicle (EV) Bus', '', 'black', 'o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its', 'electric-vehicle-ev-bus', NULL, NULL);

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
(129, '2014_10_12_000000_create_users_table', 1),
(130, '2014_10_12_100000_create_password_resets_table', 1),
(131, '2019_08_19_000000_create_failed_jobs_table', 1),
(132, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(133, '2023_02_04_163014_users', 1),
(134, '2023_02_04_165327_users', 1),
(135, '2023_02_04_172121_users', 1),
(136, '2024_10_18_170522_create_categories_table', 1),
(137, '2024_10_18_170707_create_posts_table', 1),
(138, '2024_10_18_170727_create_comments_table', 1),
(139, '2024_10_18_184128_create_post_meta_table', 1),
(140, '2024_10_19_010836_create_careers_table', 1),
(141, '2024_10_19_010908_create_career_meta_table', 1),
(142, '2024_10_19_011114_create_job_applications_table', 1),
(143, '2024_10_19_011140_create_job_application_meta_table', 1),
(144, '2024_10_19_015159_create_faq_table', 2),
(145, '2024_10_19_033604_create_gallery_table', 3),
(146, '2024_10_19_034439_create_public_message_table', 4),
(147, '2024_10_19_042440_create_team_categories_table', 5),
(148, '2024_10_19_042531_create_team_members_table', 5),
(149, '2024_10_19_042613_create_board_members_table', 5),
(150, '2024_10_19_093538_create_settings_meta_table', 6),
(151, '2024_10_19_203649_create_manage_buses_table', 7),
(152, '2024_10_19_205035_create_operating_routes_table', 8),
(153, '2024_10_19_205457_create_operating_routes_stops_table', 8),
(154, '2024_10_22_153941_create_afc_card_requests_table', 9),
(155, '2024_10_23_132117_create_contact_requests_table', 10),
(156, '2024_10_24_060049_create_post_news_categories_table', 11),
(157, '2024_10_24_060054_create_post_news_table', 11),
(158, '2024_10_24_060723_create_post_news_comments_table', 11),
(159, '2024_10_24_194617_create_events_table', 11),
(160, '2024_10_24_213510_create_post_gallery_table', 12),
(161, '2024_10_24_213752_create_event_gallery_table', 12),
(162, '2024_10_28_080110_create_support_complains_table', 13),
(164, '2024_10_28_083239_create_procurement_categories_table', 14),
(165, '2024_10_28_090809_create_procurement_table', 14),
(166, '2024_10_28_090827_create_procurement_files_table', 14),
(167, '2024_11_01_164236_create_operating_routes_categories_table', 15),
(168, '2024_11_02_135723_create_projects_table', 16),
(169, '2024_11_02_135735_create_projects_meta_table', 16),
(170, '2024_11_02_135745_create_projects_faq_table', 16),
(171, '2024_11_03_020516_create_fares_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `operating_routes`
--

CREATE TABLE `operating_routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cityID` int(11) NOT NULL DEFAULT 0,
  `busID` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distance` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operating_routes`
--

INSERT INTO `operating_routes` (`id`, `cityID`, `busID`, `name`, `description`, `distance`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 'Route-1', 'Khokharapar 04 To Dock yard', 0, NULL, NULL),
(4, 0, 2, 'YL Trunk 01', 'Dawood Chowrangi - Numaish', 0, NULL, NULL),
(5, 0, 2, 'YL Trunk 02 Express', 'Dawood Chowrangi - Numaish', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `operating_routes_categories`
--

CREATE TABLE `operating_routes_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `busID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operating_routes_categories`
--

INSERT INTO `operating_routes_categories` (`id`, `busID`, `name`, `file`, `created_at`, `updated_at`) VALUES
(1, 1, 'Karachi Routes', '', NULL, NULL),
(2, 1, 'Hyderabad Routes', '', NULL, NULL),
(4, 1, 'Larkana Routes', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `operating_routes_stops`
--

CREATE TABLE `operating_routes_stops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `RouteID` bigint(20) UNSIGNED NOT NULL,
  `busID` bigint(20) UNSIGNED NOT NULL,
  `stopName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operating_routes_stops`
--

INSERT INTO `operating_routes_stops` (`id`, `RouteID`, `busID`, `stopName`, `address`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(7, 3, 1, 'Malir Halt', 'Malir Halt', '24.8845290', '67.1745126', NULL, NULL),
(8, 3, 1, 'Colony Gate', 'Colony Gate', '51.3212308', '-0.6959483', NULL, NULL),
(9, 3, 1, 'Nata Khan Bridge', 'Nata Khan Bridge', '24.8835251', '67.1365798', NULL, NULL),
(10, 3, 1, 'Nursery', 'Nursery', '55.9504613', '-3.1805898', NULL, NULL),
(11, 3, 1, 'Regent Plaza', 'Regent Plaza', '18.5523251', '73.7931351', NULL, NULL),
(12, 3, 1, 'Metropole', 'Metropole', '39.3397951', '21.8369993', NULL, NULL),
(13, 3, 1, 'Art Council II Chundrigar Road', 'Art Council II Chundrigar Road', '39.3397951', '21.8369993', NULL, NULL),
(14, 3, 1, 'Tower', 'Tower', '47.4387201', '19.2570238', NULL, NULL),
(15, 4, 2, 'Malir Cantt', 'Malir Cantt', '24.9332329', '67.1854142', NULL, NULL),
(16, 4, 2, 'Safoora Chowrangi', 'Safoora Chowrangi', '24.9332329', '67.1854142', NULL, NULL),
(17, 4, 2, 'Karachi University', 'Karachi University', '24.9437348', '67.1206228', NULL, NULL),
(18, 4, 2, 'Labour Camp', 'Labour Camp', '25.0074004', '55.1372106', NULL, NULL),
(19, 5, 2, 'millennium mall', 'millennium mall', '47.9246858', '106.9503115', NULL, NULL),
(20, 5, 2, 'Johar Mor', 'Johar Mor', '24.9047289', '67.1136709', NULL, NULL),
(21, 5, 2, 'Nipa Chowrangi', 'Nipa Chowrangi', '24.9178220', '67.0971368', NULL, NULL);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoryID` bigint(20) UNSIGNED NOT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `shares` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` date NOT NULL,
  `featured` int(11) NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `postType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `featured_image`, `categoryID`, `views`, `shares`, `status`, `slug`, `event_date`, `featured`, `no_of_days`, `postType`, `created_at`, `updated_at`) VALUES
(1, 'ENHANCING / IMPARTING DRIVING SKILLS OF WOMEN AND TRANSGENDER FOR OPERATION OF HTV SERVICES (BUSES, TRUCKS. TRAILERS, CRANES AND ANY TYPE OF HEAVY TRANSPORTS) UNDER CAPACITY BUILDING PROGRAM OF KARACHI MOBILITY PROJECT (BRTS YELLOW LINE)', 'It was at the end of the Saly seminar in May 1992, organized under the auspices of the World Bank and French Cooperation within the framework of the SSATP-Urban Transport program, that the process of reforming the urban transport sub-sector began, at the initiative of the State and according to a participatory approach integrating all the stakeholders concerned, public and private.\r\n\r\nIt was at the end of the&nbsp;<div><br></div><div>Saly seminar in May 1992, organized under the auspices of the World Bank and French Cooperation within the framework of the SSATP-Urban Transport program, that the process of reforming the urban transport sub-sector began,</div>', NULL, 9, 0, 0, 1, 'enhancing-imparting-driving-skills-of-women-and-transgender-for-operation-of-htv-services-buses-trucks-trailers-cranes-and-any-type-of-heavy-transports-under-capacity-building-program-of-karachi-mobility-project-brts-yellow-line', '0000-00-00', 0, 0, 'posts', '2024-10-21 04:17:16', '2024-10-21 04:17:16'),
(2, 'AVIS DE RECRUTEMENT – CETUD : Cinq (5) postes à pourvoir dans le cadre du projet de Restructuration', 'It was at the end of the Saly seminar in May 1992, organized under the auspices of the World Bank and French Cooperation within the framework of the SSATP-Urban Transport program, that the process of reforming the urban transport sub-sector began, at the initiative of the State and according to a participatory approach integrating all the stakeholders concerned, public and private.&nbsp;<div><br></div><div>&nbsp;It was at the end of the Saly seminar in May 1992, organized under the auspices of the World Bank and French Cooperation within the framework of the SSATP-Urban Transport program, that the process of reforming the urban transport sub-sector began, at the initiative of the State and according to a participatory approach integrating all the stakeholders concerned, public and private.\r\n </div>', '1729759018.jpg', 20, 0, 0, 1, 'avis-de-recrutement-cetud-cinq-5-postes-a-pourvoir-dans-le-cadre-du-projet-de-restructuration', '0000-00-00', 0, 0, 'news', '2024-10-24 03:36:58', '2024-10-24 03:36:58');
INSERT INTO `posts` (`id`, `title`, `content`, `featured_image`, `categoryID`, `views`, `shares`, `status`, `slug`, `event_date`, `featured`, `no_of_days`, `postType`, `created_at`, `updated_at`) VALUES
(3, 'AVIS DE RECRUTEMENT – CETUD : Cinq (5) Test News', 'It was at the end of the Saly seminar in May 1992, organized under the auspices of the World Bank and French Cooperation within the framework of the SSATP-Urban Transport program, that the process of reforming the urban transport sub-sector began, at the initiative of the State and according to a participatory approach integrating all the stakeholders concerned, public and private.<div><br></div><div><span data-metadata=\"<!--(figmeta)eyJmaWxlS2V5Ijoia1F6Mmo5dG9mT2ZCZFdFMFFxTjBGZyIsInBhc3RlSUQiOjE0NzgwMTI2MDMsImRhdGFUeXBlIjoic2NlbmUifQo=(/figmeta)-->\"></span><span data-buffer=\"<!--(figma)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(/figma)-->\"></span><span style=\"white-space-collapse: preserve;\">It was at the end of the Saly seminar in May 1992, organized under the auspices of the World Bank and French Cooperation within the framework of the SSATP-Urban Transport program, that the process of reforming the urban transport sub-sector began, at the initiative of the State and according to a participatory approach integrating all the stakeholders concerned, public and private.</span></div>', '1729759429.png', 20, 0, 0, 1, 'avis-de-recrutement-cetud-cinq-5-test-news', '0000-00-00', 0, 0, 'news', '2024-10-22 19:00:00', '2024-10-24 04:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `post_gallery`
--

CREATE TABLE `post_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `postID` int(11) NOT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_meta`
--

CREATE TABLE `post_meta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `postID` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_meta`
--

INSERT INTO `post_meta` (`id`, `postID`, `meta_key`, `meta_value`, `created_at`, `updated_at`) VALUES
(1, 3, 'post_tags', 'a:7:{i:0;s:5:\"CETUD\";i:1;s:4:\"AFTU\";i:2;s:5:\"DAKAR\";i:3;s:7:\"DEMDIKK\";i:4;s:5:\"SETER\";i:5;s:13:\"DAKARMOBILITY\";i:6;s:23:\"GRANDSTRAINSDUSÉNÉGAL\";}', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_news`
--

CREATE TABLE `post_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoryID` bigint(20) UNSIGNED NOT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `shares` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` date NOT NULL,
  `featured` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `no_of_days` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_news_categories`
--

CREATE TABLE `post_news_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_news_comments`
--

CREATE TABLE `post_news_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `procurement`
--

CREATE TABLE `procurement` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryID` bigint(20) UNSIGNED NOT NULL,
  `proposalRequestID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_publication` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_closing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `shares` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `featured` int(11) NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `procurement`
--

INSERT INTO `procurement` (`id`, `title`, `categoryID`, `proposalRequestID`, `city`, `department`, `date_publication`, `date_closing`, `views`, `shares`, `featured`, `no_of_days`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'NOTICE OF OPEN DRP PUBLICATION: Maintenance work on the superstructures of the terminals of the Gare des baux maraichers', 3, 'T-DOP-3456', 'Karachi', 'KMP Sindh Mass Transit Authority', '2024-10-28', '2024-11-28', 0, 0, 1, 8, 'notice-of-open-drp-publication-maintenance-work-on-the-superstructures-of-the-terminals-of-the-gare-des-baux-maraichers', '2024-10-28 07:13:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `procurement_categories`
--

CREATE TABLE `procurement_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentID` bigint(20) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `procurement_categories`
--

INSERT INTO `procurement_categories` (`id`, `name`, `parentID`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Procurement of Civil Work', NULL, 'procurement-of-civil-work', 1, '2024-10-28 07:01:06', NULL),
(2, 'Procurement of consulting & non-consulting Goods & Service', NULL, 'procurement-of-consulting-non-consulting-goods-service', 1, '2024-10-28 07:01:15', NULL),
(3, 'Notice for Invitation (NIT) of Tenders / Bids', 1, 'notice-for-invitation-nit-of-tenders-bids', 1, '2024-10-28 07:01:42', NULL),
(4, 'Request for Bids (RFB) / Request for Proposal (RFP) Documents', 1, 'request-for-bids-rfb-request-for-proposal-rfp-documents', 1, '2024-10-28 07:01:52', NULL),
(5, 'Technical Evaluation Results', 1, 'technical-evaluation-results', 1, '2024-10-28 07:02:48', NULL),
(6, 'Request for Expression of Interest - REOI', 2, 'request-for-expression-of-interest-reoi', 1, '2024-10-28 07:02:54', NULL),
(7, 'Terms of References', 2, 'terms-of-references', 1, '2024-10-28 07:03:01', NULL),
(8, 'Short Listing of Expression of Interest (EOI)', 2, 'short-listing-of-expression-of-interest-eoi', 1, '2024-10-28 07:03:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `procurement_files`
--

CREATE TABLE `procurement_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `procurementID` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `downloads` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cta_heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cta_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `map_iframe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_css` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `content`, `video_file`, `thumbnail`, `cta_heading`, `cta_description`, `cta_file`, `banner_title`, `banner_description`, `map_iframe`, `custom_css`, `theme`, `slug`, `created_at`, `updated_at`) VALUES
(21, 'People Bus Service', '<div>The Sindh People\'s Bus Service Project is designed to improve public transportation options within Sindh, making it easier for residents to commute within Karachi and between districts. It aims to provide a cost-effective and environmentally friendly mode of transportation while reducing congestion and enhancing overall mobility in the region. SMTA plays a pivotal role in managing all aspects of this initiative, from bus procurement to daily operations and maintenance, to ensure its success.</div><div><br></div><div><br></div><div><br></div>', '67267bbe159c5.mp4', '67267bbe12718.png', 'Map of the Lines', 'The Map of the Bus Rapid Transit Orange Lines', 'N/A', 'DOWNLOAD  APPLICATION', 'For your travels, to have information on our network or to report an incident, you can now use our application For your travels, to have information on our network or to report an incident, you can now use our application', '<iframe \r\n                        src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d614958.4092089651!2d66.80449485499773!3d25.15261726193367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e06651d4bbf%3A0x9cf92f44555a0c23!2sKarachi%2C%20Karachi%20City%2C%20Sindh%2C%20Pakistan!5e0!3m2!1sen!2s!4v1729896244778!5m2!1sen!2s\" \r\n                        width=\"600px\" height=\"500px\" style=\"border:0;\" \r\n                        allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\">\r\n                    </iframe>', NULL, 'red', 'people-bus-service', '2024-11-02 14:21:34', '2024-11-02 14:21:34'),
(22, 'BRT Green Line', '<h2>Construction and operation of Green Line BRT Project</h2><div><br></div>', '67267edcdc5e2.mp4', '67267edcd8d74.png', 'Map of the Lines', 'The Map of the Bus Rapid Transit Orange Lines', 'N/A', 'DOWNLOAD  APPLICATION', 'For your travels, to have information on our network or to report an incident, you can now use our application For your travels, to have information on our network or to report an incident, you can now use our application', '<iframe \r\n                        src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d614958.4092089651!2d66.80449485499773!3d25.15261726193367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e06651d4bbf%3A0x9cf92f44555a0c23!2sKarachi%2C%20Karachi%20City%2C%20Sindh%2C%20Pakistan!5e0!3m2!1sen!2s!4v1729896244778!5m2!1sen!2s\" \r\n                        width=\"600px\" height=\"500px\" style=\"border:0;\" \r\n                        allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\">\r\n                    </iframe>', 'h2 {\r\n      font-size: 40px;\r\n}', 'green', 'brt-green-line', '2024-11-02 14:34:52', '2024-11-02 14:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `projects_faq`
--

CREATE TABLE `projects_faq` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `projectID` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects_faq`
--

INSERT INTO `projects_faq` (`id`, `projectID`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(41, 21, 'T.M.O Office Orangi Town Fatima Jinnah College', 'Route\r\nTerminus HLM Grand Yoff (Face Autoroute) ==> Scat Urbam ==> Liberté 6 ==> Derklé ==> Liberté 4 ==> Rond Point Jet d\'eau ==> Bourguiba ==> Grand Dakar ==> Fass Médina ==> Sham ==> Avenue Blaise Diagne ==> Terminus Lat Dior.\r\n Point de départ / arriv', 1, '2024-11-02 14:21:34', '2024-11-02 14:21:34'),
(42, 21, 'T.M.O Office Orangi Town Fatima Jinnah College', 'Route\r\nTerminus HLM Grand Yoff (Face Autoroute) ==> Scat Urbam ==> Liberté 6 ==> Derklé ==> Liberté 4 ==> Rond Point Jet d\'eau ==> Bourguiba ==> Grand Dakar ==> Fass Médina ==> Sham ==> Avenue Blaise Diagne ==> Terminus Lat Dior.\r\n Point de départ / arriv', 1, '2024-11-02 14:21:34', '2024-11-02 14:21:34'),
(43, 21, 'T.M.O Office Orangi Town Fatima Jinnah College', 'Route\r\nTerminus HLM Grand Yoff (Face Autoroute) ==> Scat Urbam ==> Liberté 6 ==> Derklé ==> Liberté 4 ==> Rond Point Jet d\'eau ==> Bourguiba ==> Grand Dakar ==> Fass Médina ==> Sham ==> Avenue Blaise Diagne ==> Terminus Lat Dior.\r\n Point de départ / arriv', 1, '2024-11-02 14:21:34', '2024-11-02 14:21:34'),
(44, 21, 'T.M.O Office Orangi Town Fatima Jinnah College', 'Route\r\nTerminus HLM Grand Yoff (Face Autoroute) ==> Scat Urbam ==> Liberté 6 ==> Derklé ==> Liberté 4 ==> Rond Point Jet d\'eau ==> Bourguiba ==> Grand Dakar ==> Fass Médina ==> Sham ==> Avenue Blaise Diagne ==> Terminus Lat Dior.\r\n Point de départ / arriv', 1, '2024-11-02 14:21:34', '2024-11-02 14:21:34'),
(45, 22, 'T.M.O Office Orangi Town Fatima Jinnah College', 'Route\r\nTerminus HLM Grand Yoff (Face Autoroute) ==> Scat Urbam ==> Liberté 6 ==> Derklé ==> Liberté 4 ==> Rond Point Jet d\'eau ==> Bourguiba ==> Grand Dakar ==> Fass Médina ==> Sham ==> Avenue Blaise Diagne ==> Terminus Lat Dior.\r\n Point de départ / arriv', 1, '2024-11-02 14:34:52', '2024-11-02 14:34:52'),
(46, 22, 'T.M.O Office Orangi Town Fatima Jinnah College', 'Route\r\nTerminus HLM Grand Yoff (Face Autoroute) ==> Scat Urbam ==> Liberté 6 ==> Derklé ==> Liberté 4 ==> Rond Point Jet d\'eau ==> Bourguiba ==> Grand Dakar ==> Fass Médina ==> Sham ==> Avenue Blaise Diagne ==> Terminus Lat Dior.\r\n Point de départ / arriv', 1, '2024-11-02 14:34:52', '2024-11-02 14:34:52'),
(47, 22, 'T.M.O Office Orangi Town Fatima Jinnah College', 'Route\r\nTerminus HLM Grand Yoff (Face Autoroute) ==> Scat Urbam ==> Liberté 6 ==> Derklé ==> Liberté 4 ==> Rond Point Jet d\'eau ==> Bourguiba ==> Grand Dakar ==> Fass Médina ==> Sham ==> Avenue Blaise Diagne ==> Terminus Lat Dior.\r\n Point de départ / arriv', 1, '2024-11-02 14:34:52', '2024-11-02 14:34:52'),
(48, 22, 'T.M.O Office Orangi Town Fatima Jinnah College', 'Route\r\nTerminus HLM Grand Yoff (Face Autoroute) ==> Scat Urbam ==> Liberté 6 ==> Derklé ==> Liberté 4 ==> Rond Point Jet d\'eau ==> Bourguiba ==> Grand Dakar ==> Fass Médina ==> Sham ==> Avenue Blaise Diagne ==> Terminus Lat Dior.\r\n Point de départ / arriv', 1, '2024-11-02 14:34:53', '2024-11-02 14:34:53'),
(49, 22, 'T.M.O Office Orangi Town Fatima Jinnah College', 'Route\r\nTerminus HLM Grand Yoff (Face Autoroute) ==> Scat Urbam ==> Liberté 6 ==> Derklé ==> Liberté 4 ==> Rond Point Jet d\'eau ==> Bourguiba ==> Grand Dakar ==> Fass Médina ==> Sham ==> Avenue Blaise Diagne ==> Terminus Lat Dior.\r\n Point de départ / arriv', 1, '2024-11-02 14:34:53', '2024-11-02 14:34:53'),
(50, 22, 'T.M.O Office Orangi Town Fatima Jinnah College', 'Route\r\nTerminus HLM Grand Yoff (Face Autoroute) ==> Scat Urbam ==> Liberté 6 ==> Derklé ==> Liberté 4 ==> Rond Point Jet d\'eau ==> Bourguiba ==> Grand Dakar ==> Fass Médina ==> Sham ==> Avenue Blaise Diagne ==> Terminus Lat Dior.\r\n Point de départ / arriv', 1, '2024-11-02 14:34:53', '2024-11-02 14:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `projects_meta`
--

CREATE TABLE `projects_meta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `projectID` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects_meta`
--

INSERT INTO `projects_meta` (`id`, `projectID`, `meta_key`, `meta_value`, `created_at`, `updated_at`) VALUES
(43, 21, 'project_gallery', 'a:4:{i:0;s:19:\"67267bbe3b47a-0.jpg\";i:1;s:19:\"67267bbe3b7bb-1.jpg\";i:2;s:20:\"67267bbe3ba19-2.webp\";i:3;s:20:\"67267bbe3bc8a-3.webp\";}', '2024-11-02 14:21:34', '2024-11-02 14:21:34'),
(44, 21, 'stations', '30', '2024-11-02 14:21:34', '2024-11-02 14:21:34'),
(45, 21, 'passengers_count', '30000', '2024-11-02 14:21:34', '2024-11-02 14:21:34'),
(46, 21, 'travel_time', '40', '2024-11-02 14:21:34', '2024-11-02 14:21:34'),
(47, 21, 'ios_app_url', '#', '2024-11-02 14:21:34', '2024-11-02 14:21:34'),
(48, 21, 'android_app_url', '#', '2024-11-02 14:21:34', '2024-11-02 14:21:34'),
(49, 21, 'cta_download_file', '67267bbe3f3c5.png', '2024-11-02 14:21:34', '2024-11-02 14:21:34'),
(50, 21, 'mobile_banner_background', '67267bbe3fee7.jpg', '2024-11-02 14:21:34', '2024-11-02 14:21:34'),
(51, 22, 'project_gallery', 'a:6:{i:0;s:19:\"67267edd26c94-0.jpg\";i:1;s:19:\"67267edd2777b-1.jpg\";i:2;s:19:\"67267edd286e0-2.jpg\";i:3;s:19:\"67267edd29308-3.jpg\";i:4;s:20:\"67267edd29c5f-4.jpeg\";i:5;s:20:\"67267edd2a521-5.jpeg\";}', '2024-11-02 14:34:53', '2024-11-02 14:34:53'),
(52, 22, 'stations', '30', '2024-11-02 14:34:53', '2024-11-02 14:34:53'),
(53, 22, 'passengers_count', '30000', '2024-11-02 14:34:53', '2024-11-02 14:34:53'),
(54, 22, 'travel_time', '45', '2024-11-02 14:34:53', '2024-11-02 14:34:53'),
(55, 22, 'ios_app_url', '#', '2024-11-02 14:34:53', '2024-11-02 14:34:53'),
(56, 22, 'android_app_url', '#', '2024-11-02 14:34:53', '2024-11-02 14:34:53'),
(57, 22, 'cta_download_file', '67267edd2ff0f.png', '2024-11-02 14:34:53', '2024-11-02 14:34:53'),
(58, 22, 'mobile_banner_background', '67267edd31189.jpg', '2024-11-02 14:34:53', '2024-11-02 14:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `public_message`
--

CREATE TABLE `public_message` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `public_message`
--

INSERT INTO `public_message` (`id`, `title`, `sub_title`, `featured_image`, `description`, `designation`, `department`, `location`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Sharjeel Imam Memon', 'Senior Minister Transport and mass Transit Department', '1729682266.png', '<div>o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its prerogatives extended to traffic and parking management. to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its prerogatives extended to traffic and parking management<br></div><div><br></div><div>o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its prerogatives extended to traffic and parking management. to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its prerogatives extended to traffic and parking management<br></div><div><br></div><div>o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its prerogatives extended to traffic and parking management. to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its prerogatives extended to traffic and parking management<br></div><div><br></div>', 'Senior Minister', 'Transport and Mass Transit', 'Government of Sindh', 'mr-sharjeel-imam-memon', NULL, NULL),
(2, 'Mr. Asad Zamin', 'Secretary Transport and mass Transit Department', '1729684727.png', '<div>o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its prerogatives extended to traffic and parking management. to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its prerogatives extended to traffic and parking management<br></div><div><br></div><div>o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its prerogatives extended to traffic and parking management. to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its prerogatives extended to traffic and parking management<br></div><div><br></div><div>o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its prerogatives extended to traffic and parking management. to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its prerogatives extended to traffic and parking management<br></div>', 'Secretary', 'Transport and Mass Transit', 'Government of Sindh', 'mr-asad-zamin', NULL, NULL),
(3, 'Mr. Kamal Dayo', 'MANAGING DIRECTOR SINDH MASS TRANSIT AUTHORITY', '1729684794.png', 'o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its prerogatives extended to traffic and parking management. to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its prerogatives extended to traffic and parking management<div><br></div><div>o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its prerogatives extended to traffic and parking management. to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its prerogatives extended to traffic and parking management<br></div><div><br></div><div>o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its prerogatives extended to traffic and parking management. to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its prerogatives extended to traffic and parking management<br></div>', 'Managing Director & Project Director KMP Yellow Line', 'Transport and Mass Transit', 'Government of Sindh', 'mr-kamal-dayo', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings_meta`
--

CREATE TABLE `settings_meta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `postID` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings_meta`
--

INSERT INTO `settings_meta` (`id`, `postID`, `meta_key`, `meta_value`, `created_at`, `updated_at`) VALUES
(52, 2, 'logo_size', 'medium', NULL, NULL),
(53, 2, 'header_contact_phone', '+1234 456 789', NULL, NULL),
(54, 2, 'header_contact_email', 'Info.smta@sindh.govt.pk', NULL, NULL),
(55, 2, 'header_logo', '1729423775.png', NULL, NULL),
(103, 3, 'newsletter_heading', 'NEWSLETTER', NULL, NULL),
(104, 3, 'newsletter_text', 'Stay connected! Subscribe to the newsletter to receive the essentials of CETUD\'s Major Projects and more...', NULL, NULL),
(105, 3, 'description', 'The Executive Council for Sustainable Urban Transport (CETUD). It is a consultation framework that brings together all the actors concerned by mobility to ensure better coordination of public transport policies, with the participation of the State and local authorities', NULL, NULL),
(106, 3, 'contact_email', 'Info.smta@sindh.govt.pk', NULL, NULL),
(107, 3, 'contact_address', 'D43, D43/1 Shahra-e-ghalib Clifton Block 2, Karachi', NULL, NULL),
(108, 3, 'contact_phone', '+1234 456 789', NULL, NULL),
(109, 3, 'google', 'N/A', NULL, NULL),
(110, 3, 'facebook', 'N/A', NULL, NULL),
(111, 3, 'twitter', 'N/A', NULL, NULL),
(112, 3, 'linkedin', 'N/A', NULL, NULL),
(113, 3, 'instagram', 'N/A', NULL, NULL),
(114, 3, 'youtube', 'N/A', NULL, NULL),
(115, 3, 'yelp', 'N/A', NULL, NULL),
(116, 3, 'review', 'N/A', NULL, NULL),
(117, 3, 'footer_text', 'Copyright © 2024 SMTA Karachi Mobility Project(KMP) Yellow Line BRT. All Rights Reserved', NULL, NULL),
(118, 3, 'footer_logo', '1729431229.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `support_complains`
--

CREATE TABLE `support_complains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_type` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `statement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_complains`
--

INSERT INTO `support_complains` (`id`, `name`, `father_name`, `email`, `phone`, `cnic`, `address`, `city`, `route`, `complain_type`, `project`, `attachments`, `statement`, `created_at`, `updated_at`) VALUES
(1, 'Usman Khan', 'Sadbar Khan', 'bluevisionary3@gmail.com', '03313088018', '374051234567891', 'House A-494 Gulistan e Johar Block 7', 'karachi', 'karachi', 'karachi', 'karachi', 'a:2:{i:0;s:14:\"1730102834.png\";i:1;s:14:\"1730102837.png\";}', 'this is a test complain', NULL, NULL),
(2, 'Usman Khan', 'Sadbar Khan', 'bluevisionary3@gmail.com', '03313088018', '12121131232132132132131231', 'House A-494 Gulistan e Johar Block 7', 'karachi', 'karachi', 'rawalpindi', 'lahore', 'a:2:{i:0;s:14:\"1730103002.png\";i:1;s:14:\"1730103004.png\";}', 'asdsadas dsad asdasd', NULL, NULL),
(3, 'Mark Alan', 'Sadbar Khan', 'bluevisionary3@gmail.com', '03313088018', '12121131232132132132131231', '234234', 'karachi', 'karachi', 'karachi', 'karachi', 'a:2:{i:0;s:14:\"1730103434.png\";i:1;s:14:\"1730103434.png\";}', 'sadsadasdasda', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team_categories`
--

CREATE TABLE `team_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_categories`
--

INSERT INTO `team_categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sindh Mass Transit Authority', 'sindh-mass-transit-authority', 1, '2024-10-21 10:19:17', '2024-10-21 10:23:50'),
(2, 'Karachi Mobility Project', 'karachi-mobility-project', 1, '2024-10-21 10:25:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryID` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 1,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `designation`, `department`, `location`, `categoryID`, `description`, `featured`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Mr Kamal Dayo', 'Director Procurement & Contracts', 'BRT', 'Hyderabad', 2, 'This is a test description for the team member to test the functionality', 1, '1729524490.jpg', NULL, NULL),
(2, 'Mr jamal Ahmed', 'Sindh Secetriate', 'BRT', 'Karachi', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sit amet ligula eu nibh laoreet pellentesque in luctus risus. Proin bibendum est ut ligula facilisis consequat. In in eleifend ipsum. Maecenas lobortis scelerisque justo ut aliquam. Curabitur sit amet elit sed enim suscipit mattis ac vel nibh. Praesent in purus fringilla, faucibus erat a, pulvinar sapien. Nunc pellentesque lacinia dui eget molestie. Curabitur vulputate efficitur odio et condimentum. Duis elementum gravida risus quis dignissim. Sed ac est elit. Nulla et nulla ac mauris facilisis tempor quis id mauris.', 1, '1729537564.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mark  Alan', 'admin', 'test@testmail.com', NULL, '$2y$10$GTAlLHnBvnj2FUFlKA/I7.g84TB.di6t4Wm5tulnf3tKewxwxPeBe', 'admin', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afc_card_requests`
--
ALTER TABLE `afc_card_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board_members`
--
ALTER TABLE `board_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `careers_slug_unique` (`slug`);

--
-- Indexes for table `career_meta`
--
ALTER TABLE `career_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `career_meta_jobid_foreign` (`jobID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parentid_foreign` (`parentID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_postid_foreign` (`postID`);

--
-- Indexes for table `contact_requests`
--
ALTER TABLE `contact_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `events_slug_unique` (`slug`);

--
-- Indexes for table `event_gallery`
--
ALTER TABLE `event_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fares`
--
ALTER TABLE `fares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_jobid_foreign` (`jobID`);

--
-- Indexes for table `job_application_meta`
--
ALTER TABLE `job_application_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_application_meta_applicationid_foreign` (`applicationID`);

--
-- Indexes for table `manage_buses`
--
ALTER TABLE `manage_buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operating_routes`
--
ALTER TABLE `operating_routes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operating_routes_busid_foreign` (`busID`);

--
-- Indexes for table `operating_routes_categories`
--
ALTER TABLE `operating_routes_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operating_routes_stops`
--
ALTER TABLE `operating_routes_stops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operating_routes_stops_routeid_foreign` (`RouteID`),
  ADD KEY `operating_routes_stops_busid_foreign` (`busID`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_categoryid_foreign` (`categoryID`);

--
-- Indexes for table `post_gallery`
--
ALTER TABLE `post_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_meta`
--
ALTER TABLE `post_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_meta_postid_foreign` (`postID`);

--
-- Indexes for table `post_news`
--
ALTER TABLE `post_news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_news_slug_unique` (`slug`),
  ADD KEY `post_news_categoryid_foreign` (`categoryID`);

--
-- Indexes for table `post_news_categories`
--
ALTER TABLE `post_news_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_news_categories_slug_unique` (`slug`);

--
-- Indexes for table `post_news_comments`
--
ALTER TABLE `post_news_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procurement`
--
ALTER TABLE `procurement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `procurement_categoryid_foreign` (`categoryID`);

--
-- Indexes for table `procurement_categories`
--
ALTER TABLE `procurement_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `procurement_categories_slug_unique` (`slug`),
  ADD KEY `procurement_categories_parentid_foreign` (`parentID`);

--
-- Indexes for table `procurement_files`
--
ALTER TABLE `procurement_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `procurement_files_procurementid_foreign` (`procurementID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_slug_unique` (`slug`);

--
-- Indexes for table `projects_faq`
--
ALTER TABLE `projects_faq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_faq_projectid_foreign` (`projectID`);

--
-- Indexes for table `projects_meta`
--
ALTER TABLE `projects_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_meta_projectid_foreign` (`projectID`);

--
-- Indexes for table `public_message`
--
ALTER TABLE `public_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings_meta`
--
ALTER TABLE `settings_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_complains`
--
ALTER TABLE `support_complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_categories`
--
ALTER TABLE `team_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_categories_slug_unique` (`slug`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_members_categoryid_foreign` (`categoryID`);

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
-- AUTO_INCREMENT for table `afc_card_requests`
--
ALTER TABLE `afc_card_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `board_members`
--
ALTER TABLE `board_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `career_meta`
--
ALTER TABLE `career_meta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_requests`
--
ALTER TABLE `contact_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_gallery`
--
ALTER TABLE `event_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fares`
--
ALTER TABLE `fares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `job_application_meta`
--
ALTER TABLE `job_application_meta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `manage_buses`
--
ALTER TABLE `manage_buses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `operating_routes`
--
ALTER TABLE `operating_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `operating_routes_categories`
--
ALTER TABLE `operating_routes_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `operating_routes_stops`
--
ALTER TABLE `operating_routes_stops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post_gallery`
--
ALTER TABLE `post_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_meta`
--
ALTER TABLE `post_meta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_news`
--
ALTER TABLE `post_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_news_categories`
--
ALTER TABLE `post_news_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_news_comments`
--
ALTER TABLE `post_news_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `procurement`
--
ALTER TABLE `procurement`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `procurement_categories`
--
ALTER TABLE `procurement_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `procurement_files`
--
ALTER TABLE `procurement_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `projects_faq`
--
ALTER TABLE `projects_faq`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `projects_meta`
--
ALTER TABLE `projects_meta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `public_message`
--
ALTER TABLE `public_message`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings_meta`
--
ALTER TABLE `settings_meta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `support_complains`
--
ALTER TABLE `support_complains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team_categories`
--
ALTER TABLE `team_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `career_meta`
--
ALTER TABLE `career_meta`
  ADD CONSTRAINT `career_meta_jobid_foreign` FOREIGN KEY (`jobID`) REFERENCES `careers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parentid_foreign` FOREIGN KEY (`parentID`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_postid_foreign` FOREIGN KEY (`postID`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_jobid_foreign` FOREIGN KEY (`jobID`) REFERENCES `careers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_application_meta`
--
ALTER TABLE `job_application_meta`
  ADD CONSTRAINT `job_application_meta_applicationid_foreign` FOREIGN KEY (`applicationID`) REFERENCES `job_applications` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `operating_routes`
--
ALTER TABLE `operating_routes`
  ADD CONSTRAINT `operating_routes_busid_foreign` FOREIGN KEY (`busID`) REFERENCES `manage_buses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `operating_routes_stops`
--
ALTER TABLE `operating_routes_stops`
  ADD CONSTRAINT `operating_routes_stops_busid_foreign` FOREIGN KEY (`busID`) REFERENCES `manage_buses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `operating_routes_stops_routeid_foreign` FOREIGN KEY (`RouteID`) REFERENCES `operating_routes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_categoryid_foreign` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_meta`
--
ALTER TABLE `post_meta`
  ADD CONSTRAINT `post_meta_postid_foreign` FOREIGN KEY (`postID`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_news`
--
ALTER TABLE `post_news`
  ADD CONSTRAINT `post_news_categoryid_foreign` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `procurement`
--
ALTER TABLE `procurement`
  ADD CONSTRAINT `procurement_categoryid_foreign` FOREIGN KEY (`categoryID`) REFERENCES `procurement_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `procurement_categories`
--
ALTER TABLE `procurement_categories`
  ADD CONSTRAINT `procurement_categories_parentid_foreign` FOREIGN KEY (`parentID`) REFERENCES `procurement_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `procurement_files`
--
ALTER TABLE `procurement_files`
  ADD CONSTRAINT `procurement_files_procurementid_foreign` FOREIGN KEY (`procurementID`) REFERENCES `procurement` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects_faq`
--
ALTER TABLE `projects_faq`
  ADD CONSTRAINT `projects_faq_projectid_foreign` FOREIGN KEY (`projectID`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects_meta`
--
ALTER TABLE `projects_meta`
  ADD CONSTRAINT `projects_meta_projectid_foreign` FOREIGN KEY (`projectID`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_members`
--
ALTER TABLE `team_members`
  ADD CONSTRAINT `team_members_categoryid_foreign` FOREIGN KEY (`categoryID`) REFERENCES `team_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
