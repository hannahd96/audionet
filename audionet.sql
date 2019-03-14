-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2019 at 01:06 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `audionet`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `song_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_04_141753_create_songs_table', 2),
(4, '2019_01_08_124622_create_userstory_table', 3),
(5, '2019_01_15_172854_create_songs_table', 4),
(6, '2019_01_26_185748_create_likes_table', 5),
(7, '2019_01_26_191949_add_likes_and_dislikes_to_song', 6),
(8, '2019_02_13_122602_add_song_link', 7),
(9, '2019_02_26_174246_add_fave_artist', 8),
(10, '2019_03_10_193344_create_song_rating_table', 9),
(11, '2019_03_11_093435_create_song_ratings_table', 10);

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
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `post` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `album` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `song_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `album`, `genre`, `year`, `created_at`, `updated_at`, `song_link`) VALUES
(1, 'One Dance', 'Drake', 'Views', 'Hip Hop', 2016, NULL, NULL, '/audionet_songs/OneDance.mp3'),
(2, 'Pillowtalk', 'Zayn', 'Mind of Mine', 'Pop', 2016, NULL, NULL, '/audionet_songs/Pillowtalk.mp3'),
(3, 'Cheap Thrills', 'Sia', 'This Is Acting', 'Pop', 2016, NULL, NULL, '/audionet_songs/CheapThrills.mp3'),
(4, 'All The Stars', 'Kendrick Lamar, SZA', 'Black Panthar (Soundtrack)', 'Hip Hop', 2015, NULL, NULL, '/audionet_songs/AllTheStars.mp3'),
(5, 'Pictures of You', 'The Cure', 'Disintegration', 'Alternative', 1989, NULL, NULL, '/audionet_songs/PicturesOfYou.mp3'),
(6, 'Ordinary World', 'Duran Duran', 'Duran Duran', 'Rock', 1993, NULL, NULL, '/audionet_songs/OrdinaryWorld.mp3'),
(7, 'Love Yourself', 'Justin Bieber', 'Purpose', 'Pop', 2015, NULL, NULL, '/audionet_songs/LoveYourself.mp3'),
(8, 'Cry Me a River', 'Michael Bublé', 'Crazy Love', 'Jazz', 2009, NULL, NULL, '/audionet_songs/CryMeARiver.mp3'),
(9, 'Good for You', 'Selena Gomez', 'Revival', 'Pop', 2015, NULL, NULL, '/audionet_songs/GoodForYou.mp3'),
(10, 'Midnight City', 'M83', 'Hurry Up, We\'re Dreaming', 'Synth-Pop', 2011, NULL, NULL, '/audionet_songs/MidnightCity.mp3'),
(11, 'Summer', 'Calvin Harris', 'Summer', 'Electronic', 2014, NULL, NULL, '/audionet_songs/Summer.mp3'),
(12, 'I Feel You', 'Depeche Mode', 'Songs of Faith and Devotion', 'Synth-Pop', 1992, NULL, NULL, '/audionet_songs/IFeelYou.mp3'),
(13, 'Hey Now', 'London Grammar', 'If You Wait', 'Indie', 2013, NULL, NULL, '/audionet_songs/HeyNow.mp3'),
(15, 'When You Were Young', 'The Killers', 'Sam\'s Town', 'Indie', 2009, NULL, NULL, '/audionet_songs/WhenWeWereYoung.mp3'),
(16, 'Can\'t Feel My Face', 'The Weeknd', 'Beauty Behind the Madness', 'Pop', 2015, NULL, NULL, '/audionet_songs/CantFeelMyFace.mp3'),
(17, 'Lean On', 'DJ Snake', 'Peace Is The Mission', 'Electronic', 2015, NULL, NULL, '/audionet_songs/LeanOn.mp3'),
(19, 'The Hills', 'The Weeknd', 'Beauty Behind the Madness', 'Pop', 2015, NULL, NULL, '/audionet_songs/TheHills.mp3'),
(20, 'See You Again', 'Wiz Khalifa', 'Furious 7: Original Motion Picture Soundtrack', 'Hip Hop', 2015, NULL, NULL, '/audionet_songs/SeeYouAgain.mp3'),
(21, 'Trap Queen', 'Fetty Wap', 'Fetty Wap', 'Hip Hop', 2015, NULL, NULL, '/audionet_songs/TrapQueen.mp3'),
(22, 'Love Me Like You Do', 'Ellie Goulding', 'Fifty Shade of Grey (Original Motion Picture Soundtrack)', 'Electropop', 2015, NULL, NULL, '/audionet_songs/LoveMeLikeYouDo.mp3'),
(23, 'Want to Want Me', 'Jason Derulo', 'Everything Is 4', 'Electronic', 2015, NULL, NULL, '/audionet_songs/WantToWantMe.mp3'),
(24, 'Earned It', 'The Weeknd', 'Fifty Shade of Grey (Original Motion Picture Soundtrack)', 'Pop', 2015, NULL, NULL, '/audionet_songs/EarnedIt.mp3'),
(25, 'What Do You Mean?', 'Justin Bieber', 'Purpose', 'Pop', 2015, NULL, NULL, '/audionet_songs/WhatDoYouMean.mp3'),
(26, 'Hey Mama', 'David Guetta', 'Listen', 'Electronic', 2015, NULL, NULL, '/audionet_songs/HeyMama.mp3'),
(27, 'Stitches', 'Shawn Mendes', 'Handwritten', 'Pop', 2015, NULL, NULL, '/audionet_songs/Stitches.mp3'),
(29, 'Worth It', 'Fifth Harmony', 'Reflection', 'Pop', 2015, NULL, NULL, '/audionet_songs/WorthIt.mp3'),
(30, 'Marvin Gaye', 'Charlie Puth', 'Some Type of Love', 'Pop', 2015, NULL, NULL, '/audionet_songs/MarvinGaye.mp3'),
(31, 'Drag Me Down', 'One Direction ', 'Made in the A.M', 'Pop', 2015, NULL, NULL, '/audionet_songs/DragMeDown.mp3'),
(32, 'Ayo', 'Tyga', 'Fan of a Fan', 'Hip Hop', 2015, NULL, NULL, '/audionet_songs/Ayo.mp3'),
(33, 'Like I\'m Gonna Lose You', 'Meghan Trainor', 'Title', 'Pop', 2015, NULL, NULL, '/audionet_songs/LikeImGonnaLoseYou.mp3'),
(34, 'Hello', 'Adele', '25', 'Pop', 2015, NULL, NULL, '/audionet_songs/Hello.mp3'),
(35, 'Dear Future Husband', 'Meghan Trainor', 'Title', 'Pop', 2015, NULL, NULL, '/audionet_songs/DearFutureHusband.mp3'),
(36, 'Sorry', 'Justin Bieber', 'Sorry', 'Pop', 2015, NULL, NULL, '/audionet_songs/Sorry.mp3'),
(37, 'Cool for the Summer', 'Demi Lovato', 'Confident', 'Pop', 2015, NULL, NULL, '/audionet_songs/CoolForTheSummer.mp3'),
(38, 'Girls Like You', 'Maroon 5', 'LOVE', 'Pop', 2018, NULL, NULL, '/audionet_songs/GirlsLikeYou.mp3'),
(39, 'I Like It', 'Cardi B', 'Invasion of Privacy', 'Hip Hop', 2018, NULL, NULL, '/audionet_songs/ILikeIt.mp3'),
(40, 'SICKO MODE', 'Travis Scott', 'Astroworld', 'Hip Hop', 2018, NULL, NULL, '/audionet_songs/SickoMode.mp3'),
(41, 'In My Feelings', 'Drake', 'Scorpion', 'Hip Hop', 2018, NULL, NULL, '/audionet_songs/InMyFeelings.mp3'),
(42, 'Better Now', 'Post Malone', 'Beerbongs & Bentleys', 'Hip Hop', 2018, NULL, NULL, '/audionet_songs/BetterNow.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `song_ratings`
--

CREATE TABLE `song_ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `song_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `song_ratings`
--

INSERT INTO `song_ratings` (`id`, `user_id`, `song_id`, `rating`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', '2019-03-12 17:47:38', '2019-03-12 17:47:38'),
(2, '1', '2', '8', '2019-03-12 17:48:13', '2019-03-12 17:48:13'),
(3, '54', '12', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(4, '15', '42', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(5, '33', '2', '1', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(6, '4', '19', '8', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(7, '6', '33', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(8, '5', '8', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(9, '50', '21', '6', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(10, '7', '11', '10', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(11, '36', '2', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(12, '46', '3', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(13, '28', '13', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(14, '41', '13', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(15, '35', '12', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(16, '42', '32', '1', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(17, '18', '12', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(18, '51', '37', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(19, '20', '30', '6', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(20, '25', '25', '1', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(21, '28', '3', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(22, '20', '27', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(23, '28', '32', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(24, '37', '5', '1', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(25, '45', '31', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(26, '54', '23', '8', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(27, '24', '39', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(28, '34', '39', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(29, '7', '22', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(30, '51', '30', '10', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(31, '48', '9', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(32, '22', '1', '10', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(33, '46', '15', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(34, '3', '42', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(35, '1', '34', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(36, '5', '19', '8', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(37, '52', '40', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(38, '22', '31', '10', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(39, '47', '1', '8', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(40, '37', '10', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(41, '15', '16', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(42, '26', '24', '8', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(43, '24', '21', '1', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(44, '41', '23', '6', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(45, '21', '21', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(46, '44', '31', '1', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(47, '42', '20', '10', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(48, '3', '12', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(49, '36', '32', '8', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(50, '13', '4', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(51, '27', '22', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(52, '30', '17', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(53, '15', '36', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(54, '37', '36', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(55, '30', '6', '1', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(56, '50', '41', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(57, '31', '27', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(58, '41', '5', '10', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(59, '14', '38', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(60, '17', '42', '10', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(61, '45', '12', '10', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(62, '51', '32', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(63, '50', '33', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(64, '1', '10', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(65, '18', '33', '10', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(66, '14', '30', '8', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(67, '32', '41', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(68, '16', '12', '6', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(69, '2', '2', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(70, '24', '30', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(71, '24', '40', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(72, '18', '17', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(73, '22', '20', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(74, '42', '42', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(75, '35', '3', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(76, '26', '1', '6', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(77, '43', '38', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(78, '39', '7', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(79, '11', '25', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(80, '53', '9', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(81, '10', '42', '1', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(82, '28', '34', '1', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(83, '22', '9', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(84, '19', '36', '1', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(85, '29', '10', '8', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(86, '40', '31', '8', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(87, '36', '15', '1', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(88, '15', '30', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(89, '8', '19', '10', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(90, '6', '41', '6', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(91, '45', '11', '8', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(92, '32', '39', '1', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(93, '11', '40', '6', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(94, '3', '26', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(95, '5', '35', '8', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(96, '6', '42', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(97, '40', '41', '6', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(98, '15', '32', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(99, '49', '6', '1', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(100, '53', '25', '1', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(101, '20', '38', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(102, '52', '42', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(103, '8', '38', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(104, '46', '20', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(105, '22', '30', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(106, '54', '21', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(107, '34', '27', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(108, '51', '42', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(109, '18', '31', '10', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(110, '42', '10', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(111, '28', '40', '6', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(112, '18', '8', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(113, '26', '37', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(114, '28', '39', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(115, '30', '19', '6', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(116, '50', '2', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(117, '47', '39', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(118, '22', '33', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(119, '36', '33', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(120, '20', '4', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(121, '7', '42', '8', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(122, '54', '35', '6', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(123, '16', '29', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(124, '14', '39', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(125, '43', '30', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(126, '48', '38', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(127, '1', '26', '8', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(128, '31', '12', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(129, '52', '10', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(130, '24', '29', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(131, '38', '32', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(132, '36', '20', '10', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(133, '48', '3', '8', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(134, '49', '21', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(135, '16', '19', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(136, '53', '39', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(137, '48', '16', '8', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(138, '31', '29', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(139, '11', '5', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(140, '29', '1', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(141, '37', '13', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(142, '10', '17', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(143, '32', '15', '8', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(144, '41', '35', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(145, '26', '38', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(146, '3', '40', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(147, '26', '30', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(148, '14', '34', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(149, '14', '15', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(150, '13', '42', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(151, '12', '40', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(152, '41', '33', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(153, '21', '29', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(154, '12', '37', '10', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(155, '24', '38', '1', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(156, '42', '38', '10', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(157, '14', '36', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(158, '37', '7', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(159, '5', '30', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(160, '23', '20', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(161, '25', '41', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(162, '17', '35', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(163, '21', '40', '10', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(164, '41', '17', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(165, '11', '26', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(166, '40', '26', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(167, '46', '12', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(168, '53', '36', '1', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(169, '9', '7', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(170, '30', '37', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(171, '31', '15', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(172, '17', '33', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(173, '6', '12', '10', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(174, '48', '42', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(175, '36', '31', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(176, '32', '21', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(177, '46', '40', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(178, '28', '20', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(179, '1', '11', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(180, '49', '26', '1', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(181, '48', '17', '10', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(182, '28', '11', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(183, '30', '23', '10', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(184, '53', '24', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(185, '5', '33', '1', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(186, '19', '13', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(187, '1', '22', '8', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(188, '25', '30', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(189, '45', '1', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(190, '53', '13', '6', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(191, '14', '2', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(192, '23', '1', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(193, '41', '6', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(194, '18', '35', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(195, '50', '23', '6', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(196, '43', '41', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(197, '46', '4', '1', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(198, '9', '2', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(199, '39', '21', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(200, '14', '12', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(201, '4', '41', '10', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(202, '41', '12', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(203, '25', '5', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(204, '54', '41', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(205, '22', '38', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(206, '31', '5', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(207, '9', '35', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(208, '3', '37', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(209, '2', '11', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(210, '43', '36', '6', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(211, '33', '8', '8', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(212, '35', '22', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(213, '39', '38', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(214, '22', '17', '6', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(215, '21', '11', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(216, '41', '7', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(217, '40', '22', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(218, '30', '3', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(219, '39', '32', '10', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(220, '18', '26', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(221, '41', '25', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(222, '27', '23', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(223, '19', '23', '7', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(224, '17', '11', '8', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(225, '44', '30', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(226, '31', '26', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(227, '30', '12', '6', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(228, '37', '34', '2', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(229, '14', '42', '9', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(230, '30', '5', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(231, '6', '2', '3', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(232, '50', '15', '6', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(233, '52', '36', '6', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(234, '52', '27', '4', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(235, '10', '33', '8', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(236, '25', '13', '5', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(237, '33', '25', '1', '2019-03-12 18:19:48', '2019-03-12 18:19:48'),
(238, '55', '1', '6', '2019-03-13 12:00:30', '2019-03-13 12:00:30'),
(239, '1', '1', '9', '2019-03-14 11:21:12', '2019-03-14 11:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `song_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `user_id`, `song_id`, `created_at`, `updated_at`) VALUES
(3, '2', '2', '2019-02-14 00:00:00', '2019-02-14 00:00:00'),
(5, '3', '3', '2019-02-14 00:00:00', '2019-02-14 00:00:00'),
(6, '4', '1', '2019-02-14 00:00:00', '2019-02-14 00:00:00'),
(7, '1', '12', '2019-03-06 17:54:04', '2019-03-06 17:54:04'),
(12, '2', '11', NULL, NULL),
(13, '1', '1', '2019-03-12 15:29:14', '2019-03-12 15:29:14'),
(14, '1', '37', '2019-03-14 11:20:23', '2019-03-14 11:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'johndoe@gmail.com', '1546609791.jpg', NULL, '$2y$10$toQbc.vDksf5Nhh.Lvfg2uk4t8kCKTBCQh62OE/YUdWsT2ZkVMVDm', 'IpjuSxqAq78eM5eE5CmB8sJVMBIxvdqmUenkrw4QmJ8XCLsrsHRDa6DXiDlj', '2019-01-03 19:08:41', '2019-01-04 13:49:51'),
(2, 'John Smith', 'jsmith@gmail.com', '1546548321.jpg', NULL, '$2y$10$b5kX/BHbPkDCPBs5Mp2d2el2Vh68TJZO/I704.4joceqsqmKmYtky', NULL, '2019-01-03 20:41:07', '2019-01-03 20:45:22'),
(3, 'Bobby', 'bobby@gmail.com', 'default.jpg', NULL, '$2y$10$K/X297kGmnDOAVupeheYg.zt52DiMyH66bAUMK3abp6eSTb0PHywS', 'ezN5fEgaAZC527EPOBydcWiLaK3vFn6F3fbcNjVsqcyPATv9VFy9WQciBtLc', '2019-01-15 19:55:29', '2019-01-15 19:55:29'),
(4, 'joely murphy', 'jjmurph@gmail.com', 'default.jpg', NULL, '$2y$10$cr3MqH26bzjX/VKq5SpD1.663ZnY2dsolhR8r9Y1XkHgw5Yw8Xu1m', NULL, '2019-02-08 20:30:49', '2019-02-08 20:30:49'),
(5, 'Consuelo Gutmann', 'awunsch@gmail.com', 'default.jpg', NULL, '$2y$10$nvmSovqqPE/DHAZy7DoD4uGcFmFXnMHhNcEK2bgMmMlmeW.oyULGO', NULL, '2019-03-12 18:10:20', '2019-03-12 18:10:20'),
(6, 'Prof. Brenna Abbott IV', 'cory.bayer@schneider.biz', 'default.jpg', NULL, '$2y$10$wcmNzoFG7g4mKCXH7QqaZOjtAVUp/1pZQl2cps63.jGmL3F0M3s6q', NULL, '2019-03-12 18:10:20', '2019-03-12 18:10:20'),
(7, 'Prof. Eldred Orn', 'yhoeger@gmail.com', 'default.jpg', NULL, '$2y$10$lul7PupRLVokY4YBFnC30ede5d/PyMIuBVwmK5ct3ISKSfkMtO/7i', NULL, '2019-03-12 18:10:21', '2019-03-12 18:10:21'),
(8, 'Mrs. Emmy Ledner V', 'ward.brionna@gmail.com', 'default.jpg', NULL, '$2y$10$AUupHLhYn4IYXG7ysaSoquOVvgDh0bxKTjg/lfc44T9N4kc.ppcGG', NULL, '2019-03-12 18:10:21', '2019-03-12 18:10:21'),
(9, 'Bryon Bernhard', 'kfriesen@considine.com', 'default.jpg', NULL, '$2y$10$sm0Ajp9.xAAbkv4nhPm2i.gZcInr70QYR7Hc2gTwBefImri/Eve76', NULL, '2019-03-12 18:10:21', '2019-03-12 18:10:21'),
(10, 'Mr. Isadore Sipes', 'metz.gladyce@hotmail.com', 'default.jpg', NULL, '$2y$10$6gPPeZibsnQ3YtjQnNenTeIeGMdKiaFQDSwoXF8l0vUL8tZh1JFbO', NULL, '2019-03-12 18:10:21', '2019-03-12 18:10:21'),
(11, 'Prof. Leonor Goldner', 'nbeer@gmail.com', 'default.jpg', NULL, '$2y$10$vd1xabQb2ZiRuotnPkoDB.0pfU.p95SfuCee4mHwNk.ws0bUnFLr.', NULL, '2019-03-12 18:10:21', '2019-03-12 18:10:21'),
(12, 'Virginie Schneider', 'macie69@crooks.com', 'default.jpg', NULL, '$2y$10$i6CFZATOUrAF/PzYAK9gj.veiNupVs75Mhowpjz866OqjF9cWZGLO', NULL, '2019-03-12 18:10:21', '2019-03-12 18:10:21'),
(13, 'Joelle Vandervort III', 'pacocha.guadalupe@hermiston.biz', 'default.jpg', NULL, '$2y$10$G0xHqrWqk4DzSyg66uYF8Oonhyv4bTAjRuZySz6TSe6ziQZAXO0YK', NULL, '2019-03-12 18:10:21', '2019-03-12 18:10:21'),
(14, 'Martina McLaughlin PhD', 'langosh.rashad@welch.info', 'default.jpg', NULL, '$2y$10$.bAl79Vpw7nkUjjpex5r8.dXQt1tVh2SbccLL9NOCom89nOJMG0U2', NULL, '2019-03-12 18:10:21', '2019-03-12 18:10:21'),
(15, 'Jakayla VonRueden', 'solon.hermann@hermann.com', 'default.jpg', NULL, '$2y$10$8XQ1QKBZel0ea4z.aKrE3uCMElauUhylhjBtHX6Kb9X0CeRGApB2O', NULL, '2019-03-12 18:10:21', '2019-03-12 18:10:21'),
(16, 'Geoffrey Batz', 'powlowski.ila@toy.com', 'default.jpg', NULL, '$2y$10$3DwvfD5w0j9VWrCu1DLCTe5WsAAowsRdtqQlggP17op89PWv9bQ3.', NULL, '2019-03-12 18:10:21', '2019-03-12 18:10:21'),
(17, 'Dr. Karine Kunze', 'waelchi.frederick@yahoo.com', 'default.jpg', NULL, '$2y$10$CBF5zU0fjS/DV4pfHU5UsuPbgZPEnw3yGZjdxOTrr3caN1x40DYhe', NULL, '2019-03-12 18:10:21', '2019-03-12 18:10:21'),
(18, 'Emmie Carter', 'lwunsch@welch.com', 'default.jpg', NULL, '$2y$10$LbFpkSMKv9gdsSMfPcGx/eTdaiJwhneZXEcLAmUPZk5.Zun7Bnfyq', NULL, '2019-03-12 18:10:21', '2019-03-12 18:10:21'),
(19, 'Eugene Runolfsson', 'zoe.ondricka@prohaska.com', 'default.jpg', NULL, '$2y$10$3VAO/uFygjFHssf7vg5PA.uNmENZrPc7Nj167K3bQukaWhvGUQs1y', NULL, '2019-03-12 18:10:22', '2019-03-12 18:10:22'),
(20, 'Kadin Robel', 'pasquale.bartell@gmail.com', 'default.jpg', NULL, '$2y$10$4GO8abSe3gcqnclX/btI2uTtomHHUL/s5yfBJ2nCG6s9cErAfGLMS', NULL, '2019-03-12 18:10:22', '2019-03-12 18:10:22'),
(21, 'Dr. Lula Jones', 'trinity37@wehner.info', 'default.jpg', NULL, '$2y$10$hrS8ROq816oqARYlIazSSO/rzMwGytyA4gqSEjPkq6Ar2hpdzSitC', NULL, '2019-03-12 18:10:22', '2019-03-12 18:10:22'),
(22, 'Mr. Devante Larkin', 'lori.paucek@gmail.com', 'default.jpg', NULL, '$2y$10$F1mSRkWCDEywqHgvgGu2wuzStUCMWZxBAf9db5mkLRz0l5OuRIn1q', NULL, '2019-03-12 18:10:22', '2019-03-12 18:10:22'),
(23, 'Isac Block', 'timmy.goldner@gmail.com', 'default.jpg', NULL, '$2y$10$OV7JGC5c9BLgn2A/Hok5CeB.GfgxOLIWqt2Lpg57zawC4zH.qIF4O', NULL, '2019-03-12 18:10:22', '2019-03-12 18:10:22'),
(24, 'Jeanette Mante', 'rosalee34@pouros.com', 'default.jpg', NULL, '$2y$10$tBTdXC/gp7lSvhhT3HatU.s/b94hWatRtwNMBsk9rjuHGuL9pYDma', NULL, '2019-03-12 18:10:22', '2019-03-12 18:10:22'),
(25, 'Idella Wiegand', 'wehner.raymond@bins.biz', 'default.jpg', NULL, '$2y$10$aQTcHSxu6Qyg6AOJdmi5yueQithgfWvHLqYBiyoI1kQFOLGPMPTqG', NULL, '2019-03-12 18:10:22', '2019-03-12 18:10:22'),
(26, 'Shayne Lindgren', 'vgutkowski@waelchi.biz', 'default.jpg', NULL, '$2y$10$nnlfuiuMSZpJkm8rX8rd1OQT5rOM4ZYa.TBEovnlGrstBNXPSnQOa', NULL, '2019-03-12 18:10:22', '2019-03-12 18:10:22'),
(27, 'Kieran Mosciski', 'tomas27@yahoo.com', 'default.jpg', NULL, '$2y$10$JEMw8ZSIxX7fs2Xui4gAAuXwv2loFsCSxzBrJ/DEtsjRRm63Bhh.e', NULL, '2019-03-12 18:10:22', '2019-03-12 18:10:22'),
(28, 'Prof. Shemar Bahringer', 'kklein@hotmail.com', 'default.jpg', NULL, '$2y$10$4HEYhSa5ikuJXA/o5j9fUO5aJ0.NqRqls91IpN4gFVBpCMcnlA4N6', NULL, '2019-03-12 18:10:22', '2019-03-12 18:10:22'),
(29, 'Gabe Wilderman', 'vivian.glover@hilpert.com', 'default.jpg', NULL, '$2y$10$DDw9pWYYWMh5p58EF6RIHuIUObfZvfBQsdp7sq2OC3t7wXnKCllOO', NULL, '2019-03-12 18:10:22', '2019-03-12 18:10:22'),
(30, 'Prof. Dawn Moen I', 'abbott.novella@hettinger.org', 'default.jpg', NULL, '$2y$10$f/2hdOKRq6rJxwNpHP/VZOF09ilcDiDlVSiTEmX6JNyihzvhINaFm', NULL, '2019-03-12 18:10:22', '2019-03-12 18:10:22'),
(31, 'Bernardo Fadel', 'howell.dawson@hotmail.com', 'default.jpg', NULL, '$2y$10$2Nry0lmgmTtcSNUoa9PO.ObCd8hiLcjv3mqXQGX.yVND6g.pMzZJ6', NULL, '2019-03-12 18:10:22', '2019-03-12 18:10:22'),
(32, 'Jeramy Ondricka', 'nitzsche.lucio@yahoo.com', 'default.jpg', NULL, '$2y$10$x9vCGeGNyyPx.8wQzKB98e2YLeuVH7fyM2nc5mD20flefLILhgWFm', NULL, '2019-03-12 18:10:23', '2019-03-12 18:10:23'),
(33, 'Freeman Kris', 'russ20@gmail.com', 'default.jpg', NULL, '$2y$10$HQNrEh3bjyRCTIj6NbWpPO4zH/eBHuxml1u3ONSynm405GzusF5Ti', NULL, '2019-03-12 18:10:23', '2019-03-12 18:10:23'),
(34, 'Dr. Percival Morissette IV', 'camryn.kertzmann@gmail.com', 'default.jpg', NULL, '$2y$10$0S4ZnW8kEpbnay7lsdTHNuCSbTXEKnPk8XNwFKS6JrzF1Fs0db8iu', NULL, '2019-03-12 18:10:23', '2019-03-12 18:10:23'),
(35, 'Devan McClure', 'ophelia73@yahoo.com', 'default.jpg', NULL, '$2y$10$siOS7PDdDQS8aQSU6K599.8QcqaVQvDWprbCP3UR3feFRLFa8vOey', NULL, '2019-03-12 18:10:23', '2019-03-12 18:10:23'),
(36, 'Dr. Trystan Bartoletti', 'mbatz@yahoo.com', 'default.jpg', NULL, '$2y$10$/ZJlwFeTKCuvth/ZXhs9c.I8NmvkOp1uoPY4ZWS.Nn4fiHK2weXbC', NULL, '2019-03-12 18:10:23', '2019-03-12 18:10:23'),
(37, 'Paris Keeling', 'ardith.dare@yahoo.com', 'default.jpg', NULL, '$2y$10$ZD1dd3lMGoXBMgYPqKEREuTMAcK91rdXOo3Xte6l72U9kJ/2yeq3i', NULL, '2019-03-12 18:10:23', '2019-03-12 18:10:23'),
(38, 'Rico Lind', 'mfeil@gmail.com', 'default.jpg', NULL, '$2y$10$nSM4QTFaPCLzeytDm0IUa.r1KMHXNlxiMXBtty9VOh9Cog1UT5VXe', NULL, '2019-03-12 18:10:23', '2019-03-12 18:10:23'),
(39, 'Prof. Eddie Pacocha Jr.', 'rmoore@gmail.com', 'default.jpg', NULL, '$2y$10$YkGb9a2op7Mj9IfW1NS4vOw4sDe3x3wsrGVHezTOb8WB1gKPAp./e', NULL, '2019-03-12 18:10:23', '2019-03-12 18:10:23'),
(40, 'Tressie Romaguera', 'elizabeth.von@hotmail.com', 'default.jpg', NULL, '$2y$10$Zmt8xYMVcSx2Fk9bmADVGOh3pYoszu92/KHXKq2v7spmQlgCi/nT.', NULL, '2019-03-12 18:10:23', '2019-03-12 18:10:23'),
(41, 'Gayle Borer', 'watson79@gmail.com', 'default.jpg', NULL, '$2y$10$ppGVa1lmzwqQcJPqaETkxOhDOzWDBaH8.uAkA8usKH5ky7tG1RUk6', NULL, '2019-03-12 18:10:23', '2019-03-12 18:10:23'),
(42, 'Krista Fahey Sr.', 'alan70@yahoo.com', 'default.jpg', NULL, '$2y$10$KJatuTERaAYKOYUQYHMqPOpHhsYr9Ikk8yh5fUjRx8GrkFJt8VCr2', NULL, '2019-03-12 18:10:23', '2019-03-12 18:10:23'),
(43, 'Mrs. Carolina Oberbrunner', 'ismael.fahey@hickle.net', 'default.jpg', NULL, '$2y$10$QFJn66DuHt8OkYgpIBTX3OYDGHc.9YHBaeGSEKb/dyLx26DnVBJE.', NULL, '2019-03-12 18:10:23', '2019-03-12 18:10:23'),
(44, 'Miss Shania Bins IV', 'kbalistreri@hotmail.com', 'default.jpg', NULL, '$2y$10$F3jxinZih7d32v8cpBL1LuMRSY6CUUxYW78Djo6ssleQC5uJM3T7K', NULL, '2019-03-12 18:10:24', '2019-03-12 18:10:24'),
(45, 'Elinor Heller', 'antonietta.ryan@yahoo.com', 'default.jpg', NULL, '$2y$10$PxXMCS6v4Z5K7i9GSybjgui2xg9MVpqjRQNIODrcrgCfdqwSfInqu', NULL, '2019-03-12 18:10:24', '2019-03-12 18:10:24'),
(46, 'Lionel Breitenberg IV', 'christina.nicolas@cartwright.net', 'default.jpg', NULL, '$2y$10$FnKorYB47fUaq9UUBgutQelAg2f0t4GmKmGxvqdMx4k82jnhm9Jtu', NULL, '2019-03-12 18:10:24', '2019-03-12 18:10:24'),
(47, 'Lauren Effertz DVM', 'ierdman@hotmail.com', 'default.jpg', NULL, '$2y$10$bqnAyrTigmaQPKWdcGosP.qNUaNfHVEG13t/u2BKfl1wEmv0eulkG', NULL, '2019-03-12 18:10:24', '2019-03-12 18:10:24'),
(48, 'Kallie Reichel DVM', 'scarter@hotmail.com', 'default.jpg', NULL, '$2y$10$gMHBxWOgdgoK/37ogWEBQeNI/FT3GQeLgfp9AheI6AzVPNqn39u4O', NULL, '2019-03-12 18:10:24', '2019-03-12 18:10:24'),
(49, 'Aidan Veum', 'maryse.eichmann@gmail.com', 'default.jpg', NULL, '$2y$10$nSdfRHOt98VTJZH0Ciu05.capAmj.neNmW8tfY8w4rkHr5rwEzj7K', NULL, '2019-03-12 18:10:24', '2019-03-12 18:10:24'),
(50, 'Mazie Weber', 'ansel25@koss.com', 'default.jpg', NULL, '$2y$10$0o4r3iSxr4bS4.PUjJXbpO/yAlW.kiXLsBI2gKa.e2HmjjxlYES8y', NULL, '2019-03-12 18:10:24', '2019-03-12 18:10:24'),
(51, 'Irwin Labadie', 'tomasa.windler@casper.biz', 'default.jpg', NULL, '$2y$10$/u5AXREozlP0dMJQKM10QOGprCxJv3b6jBI9.kDhisbkCsng2Wqlq', NULL, '2019-03-12 18:10:24', '2019-03-12 18:10:24'),
(52, 'Guiseppe Douglas', 'betty74@stanton.com', 'default.jpg', NULL, '$2y$10$PKX0RDi4HqO0nKMStzuyn.J.xPBGnfek43j2425p4NYRiNe1m/r8W', NULL, '2019-03-12 18:10:24', '2019-03-12 18:10:24'),
(53, 'Wallace Hackett', 'onitzsche@yahoo.com', 'default.jpg', NULL, '$2y$10$1cKBP39KJUHXZyEvMe2HOu7NUlk13flly41SCWodg25TVau5CepN2', NULL, '2019-03-12 18:10:24', '2019-03-12 18:10:24'),
(54, 'Madelyn Parker', 'xromaguera@yahoo.com', 'default.jpg', NULL, '$2y$10$HzyAffj9SAi7lzVVLkZvM.pTeX6hup.jPJUnGyTjxeioRXRC5DUCC', NULL, '2019-03-12 18:10:24', '2019-03-12 18:10:24'),
(55, 'Hannah', 'hannah@example.com', '1552478278.jpg', NULL, '$2y$10$UnmARgbobfAPi7lasi4ocurzaqpDCyJx5hIFLt/0n199yzyBKcuS.', 'XJCcSJIv3roWEjRaBwftrIVfPTql3KnJZBfGVLgIbUKcDet2CuCie4PBbgsw', '2019-03-13 11:52:02', '2019-03-13 11:57:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
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
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `song_ratings`
--
ALTER TABLE `song_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `song_ratings`
--
ALTER TABLE `song_ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
