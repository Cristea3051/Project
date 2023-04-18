-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3306
-- Timp de generare: mart. 25, 2023 la 10:21 AM
-- Versiune server: 8.0.30
-- Versiune PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `cms`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `categories`
--

CREATE TABLE `categories` (
  `cat_id` int NOT NULL,
  `cat_title` varchar(266) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(5, 'Proba');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL,
  `comment_post_id` int NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `posts`
--

CREATE TABLE `posts` (
  `post_id` int NOT NULL,
  `post_tags` varchar(266) NOT NULL,
  `post_comment_count` int NOT NULL,
  `post_status` varchar(266) NOT NULL DEFAULT 'draft',
  `post_category_id` int NOT NULL,
  `post_title` varchar(266) NOT NULL,
  `post_author` varchar(266) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` varchar(266) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `post_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `posts`
--

INSERT INTO `posts` (`post_id`, `post_tags`, `post_comment_count`, `post_status`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`) VALUES
(8, 'Red Dead Redemption, Times New Man, Arthur Morgan, RDR2', 0, 'published', 5, 'Arthur Morgan - un destin tragic ', 'Times new Roman', '2023-03-23', '286800601_798279264890322_8181765275036896640_n.jpg', 'Arthur Morgan was born circa 1863 to Beatrice and Lyle Morgan in the northern US. As a child, his mother died of unknown causes, while his father was a petty criminal and outlaw. In 1874, when Arthur was 11 years old, his father was arrested for larceny. Morgan later witnessed his death and, despite a strained relationship with him, still donned his hat and kept a picture of him.\r\nwell as one of the founding members of the Van der Linde gang.'),
(9, 'Red Dead Redemption, Times New Man, Arthur Morgan, RDR2', 0, 'published', 5, 'Arthur Morgan - un destin tragic ', 'Victor', '2023-03-23', 'FB_IMG_1612242569928.jpg', 'dsjnvdkfv\r\ndkcsvkjdfjkv dfv\r\ndfvh dfknvjhdfvhj f\r\nfsdjv jdvkjdnfkjv d\r\nfdsjvbfjvndbvkjd\r\nsdjvbsjhvjkfsnvknsfv');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_first_name`, `user_last_name`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(1, 'VictorC', '1052', 'Victor', 'Cristea', 'cristeavictor4@gmail.com', '49465020_517394828781766_1584812691359268864_n.jpg', 'admin', ''),
(8, 'Alexei', 'Alex123', 'Alexei', 'Cristea', 'cristeavictor27@gmail.com', '286800601_798279264890322_8181765275036896640_n.jpg', 'admin', '0');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexuri pentru tabele `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexuri pentru tabele `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pentru tabele `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
