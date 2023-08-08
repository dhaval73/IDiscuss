-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 06:06 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categary`
--

CREATE TABLE `categary` (
  `categary_id` int(11) NOT NULL,
  `categary_name` varchar(255) NOT NULL,
  `categary_discription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categary`
--

INSERT INTO `categary` (`categary_id`, `categary_name`, `categary_discription`) VALUES
(1, 'Php', 'PHP (Hypertext Preprocessor) is a widely-used scripting language designed for creating dynamic web pages and applications. Executed on the server, it generates content to be sent to the user\'s browser, enabling the creation of interactive websites. PHP is embedded within HTML using <?php and ?> tags, making it easy to mix dynamic and static content. It\'s a popular choice for web development due to its extensive database integration (e.g., MySQL), rich built-in functions, and support for object-oriented programming. With an active community, PHP offers various resources and is used in popular content management systems (CMS). However, security practices are crucial to prevent vulnerabilities. Cross-platform and versatile, PHP is an essential tool for developing feature-rich, dynamic web applications.'),
(2, 'Python', 'Python is a high-level programming language known for its readability and versatility. It supports multiple programming paradigms and is widely used in web development, data analysis, artificial intelligence, and more.'),
(3, 'Java', 'Java is a widely-used object-oriented programming language. It is known for its platform independence, strong community support, and extensive libraries. Java is used in various applications, including web development, mobile apps, and enterprise software.'),
(4, 'JavaScript', 'JavaScript is a scripting language used primarily for adding interactivity to web pages. It runs in web browsers and enables dynamic content, user interaction, and AJAX-based communication.'),
(5, 'C++', 'C++ is an extension of the C programming language. It is popular for systems programming, game development, and performance-critical applications. C++ supports both procedural and object-oriented programming.'),
(6, 'Ruby', 'Ruby is a dynamic, reflective, and object-oriented programming language. It is known for its elegant syntax and is commonly used in web development, particularly with the Ruby on Rails framework.'),
(7, 'Swift', 'Swift is a programming language developed by Apple for iOS, macOS, watchOS, and tvOS app development. It is designed to be safe, fast, and expressive.'),
(8, 'Go', 'Go, also known as Golang, is a statically typed, compiled language designed for efficiency and simplicity. It is used for building scalable and performant applications, especially in distributed systems.'),
(9, 'Rust', 'Rust is a systems programming language focused on safety and performance. It aims to provide memory safety without sacrificing performance and is used for projects requiring low-level control.'),
(10, 'Kotlin', 'Kotlin is a modern programming language that runs on the Java Virtual Machine (JVM). It is concise, expressive, and interoperable with Java, making it a popular choice for Android app development.'),
(11, 'C#', 'C# (C Sharp) is a programming language developed by Microsoft. It is commonly used for Windows application development, game development using Unity, and web development using ASP.NET.');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `thread_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_desc` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `thread_id`, `user_id`, `comment_desc`, `timestamp`) VALUES
(1, 1, 1, 'i can help you', '2023-08-08 08:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_no` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(11) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_decs` text DEFAULT NULL,
  `thread_cat_id` int(11) DEFAULT NULL,
  `thread_user_id` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_decs`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'database connection problem', 'I need help i want to connect database to php project', 1, 1, '2023-08-08 07:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'Dhaval', 'ddd@ddd.ddd', '$2y$10$KNFUycP/Nn7aw./Lg0OGh.TfNAMolL977jWXQipmnplFK1oBOMuiO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categary`
--
ALTER TABLE `categary`
  ADD PRIMARY KEY (`categary_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `thread_id` (`thread_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`),
  ADD KEY `thread_cat_id` (`thread_cat_id`),
  ADD KEY `thread_user_id` (`thread_user_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_search_index` (`thread_title`,`thread_decs`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categary`
--
ALTER TABLE `categary`
  MODIFY `categary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`thread_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `threads_ibfk_1` FOREIGN KEY (`thread_cat_id`) REFERENCES `categary` (`categary_id`),
  ADD CONSTRAINT `threads_ibfk_2` FOREIGN KEY (`thread_user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
