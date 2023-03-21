-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3306
-- Timp de generare: mart. 19, 2023 la 08:12 PM
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
(1, 'bootstap'),
(2, 'php'),
(3, 'java'),
(4, 'javascript');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `comment_post_id` int NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(3, 1, 'Vcitpr', 'cdkjfvdfmmlmcf', 'dfvmndkjcvkdv', 'sdknsvkjnfdnv', '2023-03-19');

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
(1, 'Victor php, javascript', 4, 'draft', 1, 'Primul meu CMS Blog', 'Victor', '2023-03-18', 'image_1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fermentum et sollicitudin ac orci phasellus egestas tellus rutrum. Aliquam vestibulum morbi blandit cursus risus at ultrices. Tellus mauris a diam maecenas sed. Mauris pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Quis blandit turpis cursus in hac habitasse platea dictumst. Eget mi proin sed libero enim sed. A scelerisque purus semper eget duis at tellus at urna. Pharetra diam sit amet nisl suscipit adipiscing bibendum est ultricies. Leo duis ut diam quam nulla porttitor massa. Vulputate odio ut enim blandit volutpat maecenas volutpat blandit aliquam. A diam sollicitudin tempor id.\r\n\r\nNullam non nisi est sit amet facilisis magna etiam. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper eget. Risus ultricies tristique nulla aliquet enim tortor. Massa massa ultricies mi quis hendrerit dolor magna. Ultricies tristique nulla aliquet enim tortor. Viverra tellus in hac habitasse. Pulvinar mattis nunc sed blandit libero volutpat sed. Lorem mollis aliquam ut porttitor leo a. Netus et malesuada fames ac turpis egestas. Risus quis varius quam quisque id diam vel.\r\n\r\nEgestas congue quisque egestas diam in arcu cursus. Pharetra sit amet aliquam id. Sagittis purus sit amet volutpat consequat mauris. Eu tincidunt tortor aliquam nulla. Metus dictum at tempor commodo ullamcorper a. Amet consectetur adipiscing elit duis. Ac feugiat sed lectus vestibulum mattis ullamcorper velit sed. Tincidunt lobortis feugiat vivamus at augue eget arcu dictum. Ut sem nulla pharetra diam sit. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar.\r\n\r\nFeugiat vivamus at augue eget arcu dictum. At volutpat diam ut venenatis tellus. Sit amet facilisis magna etiam tempor. Donec massa sapien faucibus et molestie ac. Tincidunt eget nullam non nisi est sit amet. Placerat vestibulum lectus mauris ultrices eros in. Suspendisse faucibus interdum posuere lorem ipsum. Congue eu consequat ac felis. Tortor condimentum lacinia quis vel. Tempus quam pellentesque nec nam aliquam sem et. Egestas pretium aenean pharetra magna ac placerat vestibulum lectus mauris. Nunc sed id semper risus in hendrerit gravida rutrum quisque. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Cras semper auctor neque vitae. Pharetra pharetra massa massa ultricies mi quis hendrerit dolor magna. Ac turpis egestas integer eget aliquet nibh praesent tristique. Neque vitae tempus quam pellentesque nec nam aliquam sem et.\r\n\r\nConsectetur adipiscing elit pellentesque habitant morbi tristique. Ut placerat orci nulla pellentesque dignissim enim sit amet venenatis. Ullamcorper morbi tincidunt ornare massa eget. Diam in arcu cursus euismod quis viverra nibh cras pulvinar. Sed risus ultricies tristique nulla. Nibh praesent tristique magna sit amet. Accumsan sit amet nulla facilisi. Tincidunt dui ut ornare lectus sit amet est placerat. Suspendisse faucibus interdum posuere lorem ipsum dolor sit amet consectetur. A erat nam at lectus urna duis convallis. Bibendum enim facilisis gravida neque convallis a cras semper auctor. A arcu cursus vitae congue mauris rhoncus. Pellentesque nec nam aliquam sem et tortor consequat. Faucibus ornare suspendisse sed nisi. Id semper risus in hendrerit gravida. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Libero nunc consequat interdum varius sit amet mattis vulputate. Eu nisl nunc mi ipsum faucibus vitae aliquet nec. Aenean euismod elementum nisi quis eleifend quam.'),
(2, 'javascript Victor', 4, 'draft', 4, 'Javascript post', 'Victor', '2023-03-18', 'image_3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fermentum et sollicitudin ac orci phasellus egestas tellus rutrum. Aliquam vestibulum morbi blandit cursus risus at ultrices. Tellus mauris a diam maecenas sed. Mauris pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Quis blandit turpis cursus in hac habitasse platea dictumst. Eget mi proin sed libero enim sed. A scelerisque purus semper eget duis at tellus at urna. Pharetra diam sit amet nisl suscipit adipiscing bibendum est ultricies. Leo duis ut diam quam nulla porttitor massa. Vulputate odio ut enim blandit volutpat maecenas volutpat blandit aliquam. A diam sollicitudin tempor id.\r\n\r\nNullam non nisi est sit amet facilisis magna etiam. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper eget. Risus ultricies tristique nulla aliquet enim tortor. Massa massa ultricies mi quis hendrerit dolor magna. Ultricies tristique nulla aliquet enim tortor. Viverra tellus in hac habitasse. Pulvinar mattis nunc sed blandit libero volutpat sed. Lorem mollis aliquam ut porttitor leo a. Netus et malesuada fames ac turpis egestas. Risus quis varius quam quisque id diam vel.\r\n\r\nEgestas congue quisque egestas diam in arcu cursus. Pharetra sit amet aliquam id. Sagittis purus sit amet volutpat consequat mauris. Eu tincidunt tortor aliquam nulla. Metus dictum at tempor commodo ullamcorper a. Amet consectetur adipiscing elit duis. Ac feugiat sed lectus vestibulum mattis ullamcorper velit sed. Tincidunt lobortis feugiat vivamus at augue eget arcu dictum. Ut sem nulla pharetra diam sit. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar.\r\n\r\nFeugiat vivamus at augue eget arcu dictum. At volutpat diam ut venenatis tellus. Sit amet facilisis magna etiam tempor. Donec massa sapien faucibus et molestie ac. Tincidunt eget nullam non nisi est sit amet. Placerat vestibulum lectus mauris ultrices eros in. Suspendisse faucibus interdum posuere lorem ipsum. Congue eu consequat ac felis. Tortor condimentum lacinia quis vel. Tempus quam pellentesque nec nam aliquam sem et. Egestas pretium aenean pharetra magna ac placerat vestibulum lectus mauris. Nunc sed id semper risus in hendrerit gravida rutrum quisque. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Cras semper auctor neque vitae. Pharetra pharetra massa massa ultricies mi quis hendrerit dolor magna. Ac turpis egestas integer eget aliquet nibh praesent tristique. Neque vitae tempus quam pellentesque nec nam aliquam sem et.\r\n\r\nConsectetur adipiscing elit pellentesque habitant morbi tristique. Ut placerat orci nulla pellentesque dignissim enim sit amet venenatis. Ullamcorper morbi tincidunt ornare massa eget. Diam in arcu cursus euismod quis viverra nibh cras pulvinar. Sed risus ultricies tristique nulla. Nibh praesent tristique magna sit amet. Accumsan sit amet nulla facilisi. Tincidunt dui ut ornare lectus sit amet est placerat. Suspendisse faucibus interdum posuere lorem ipsum dolor sit amet consectetur. A erat nam at lectus urna duis convallis. Bibendum enim facilisis gravida neque convallis a cras semper auctor. A arcu cursus vitae congue mauris rhoncus. Pellentesque nec nam aliquam sem et tortor consequat. Faucibus ornare suspendisse sed nisi. Id semper risus in hendrerit gravida. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Libero nunc consequat interdum varius sit amet mattis vulputate. Eu nisl nunc mi ipsum faucibus vitae aliquet nec. Aenean euismod elementum nisi quis eleifend quam.');

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
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pentru tabele `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
