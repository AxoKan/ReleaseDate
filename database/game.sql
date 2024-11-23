-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2024 at 01:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `activity` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `user_id`, `activity`, `description`, `timestamp`) VALUES
(21, NULL, 'Login', 'User Has Log in.', '2024-11-23 11:34:24'),
(22, 1, 'Logout', 'User Has Logout.', '2024-11-23 11:35:28'),
(23, NULL, 'Login', 'User Has Log in.', '2024-11-23 11:38:59'),
(24, 1, 'Login', 'User Has Log in.', '2024-11-23 11:39:19'),
(25, 1, 'Login', 'User Has Log in.', '2024-11-23 11:40:01'),
(26, 1, 'Login', 'User Has Log in.', '2024-11-23 11:40:04'),
(27, 1, 'Login', 'User Has Log in.', '2024-11-23 11:40:09'),
(28, 1, 'View', 'User view Setting.', '2024-11-23 11:42:35'),
(29, 1, 'View', 'User view Setting.', '2024-11-23 11:42:49'),
(30, 1, 'View', 'User view Activity Log.', '2024-11-23 11:42:49'),
(31, 1, 'View', 'User view Setting.', '2024-11-23 11:43:23'),
(32, 1, 'View', 'User view Setting.', '2024-11-23 11:43:24'),
(33, 1, 'View', 'User view Activity Log.', '2024-11-23 11:43:25'),
(34, 1, 'View', 'User view Activity Log.', '2024-11-23 11:43:28'),
(35, 1, 'Logout', 'User Has Logout.', '2024-11-23 11:54:37'),
(36, NULL, 'Login', 'User Has Log in.', '2024-11-23 11:54:44'),
(37, 1, 'Logout', 'User Has Logout.', '2024-11-23 11:54:53'),
(38, NULL, 'Login', 'User Has Log in.', '2024-11-23 11:55:03'),
(39, 1, 'Game', 'User Has Finish Game.', '2024-11-23 12:14:17'),
(40, 1, 'Game', 'User Has Finish Game.', '2024-11-23 12:14:39'),
(41, 1, 'Game', 'User Has Finish Game.', '2024-11-23 12:14:44'),
(42, 1, 'Game', 'User Has Finish Game.', '2024-11-23 12:14:48'),
(43, NULL, 'Login', 'User Has Log in.', '2024-11-23 17:50:35'),
(44, 1, 'Game', 'User Has Finish Game.', '2024-11-23 17:50:37'),
(45, 1, 'Game', 'User Has Finish Game.', '2024-11-23 17:51:19'),
(46, 1, 'View', 'User view Setting.', '2024-11-23 17:51:25'),
(47, 1, 'Add', 'User Has Add Game', '2024-11-23 18:13:31'),
(48, 1, 'Add', 'User Has Add Game', '2024-11-23 18:14:19'),
(49, 1, 'Add', 'User Has Add Game', '2024-11-23 18:14:49'),
(50, 1, 'Add', 'User Has Add Game', '2024-11-23 18:16:21'),
(51, 1, 'Logout', 'User Has Logout.', '2024-11-23 18:16:40'),
(52, NULL, 'Login', 'User Has Log in.', '2024-11-23 18:18:36'),
(53, 1, 'Add', 'User Has Add Game', '2024-11-23 18:20:22'),
(54, 1, 'Logout', 'User Has Logout.', '2024-11-23 18:20:30'),
(55, NULL, 'Login', 'User Has Log in.', '2024-11-23 18:25:31'),
(56, 1, 'Add', 'User Has Add Game', '2024-11-23 18:26:36'),
(57, 1, 'Add', 'User Has Add Game', '2024-11-23 18:26:56'),
(58, 1, 'Add', 'User Has Add Game', '2024-11-23 18:29:11'),
(59, 1, 'Add', 'User Has Add Game', '2024-11-23 18:30:23'),
(60, 1, 'Add', 'User Has Add Game', '2024-11-23 18:31:01'),
(61, 1, 'Add', 'User Has Add Game', '2024-11-23 18:31:14'),
(62, 1, 'Add', 'User Has Add Game', '2024-11-23 18:31:23'),
(63, 1, 'Add', 'User Has Add Game', '2024-11-23 18:32:44'),
(64, 1, 'Add', 'User Has Add Game', '2024-11-23 18:33:06'),
(65, 1, 'Game', 'User Has Finish Game.', '2024-11-23 18:33:10'),
(66, 1, 'Logout', 'User Has Logout.', '2024-11-23 18:33:58'),
(67, NULL, 'Login', 'User Has Log in.', '2024-11-23 18:34:12'),
(68, 1, 'Add', 'User Has Add Game', '2024-11-23 19:03:14'),
(69, 1, 'Add', 'User Has Add Game', '2024-11-23 19:03:34'),
(70, 1, 'UPDATE', 'User has edited Game', '2024-11-23 19:04:48'),
(71, 1, 'UPDATE', 'User has edited Game', '2024-11-23 19:04:54'),
(72, 1, 'Logout', 'User Has Logout.', '2024-11-23 19:05:03'),
(73, NULL, 'Login', 'User Has Log in.', '2024-11-23 19:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `game_id` int(11) NOT NULL,
  `game` varchar(255) DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `foto_1` varchar(255) DEFAULT NULL,
  `foto_2` varchar(255) DEFAULT NULL,
  `foto_3` varchar(255) DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL,
  `describsi` text DEFAULT NULL,
  `selesai` enum('selesai','belum') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_id`, `game`, `tanggal_keluar`, `logo`, `foto_1`, `foto_2`, `foto_3`, `trailer`, `describsi`, `selesai`) VALUES
(1, 'The.Binding.of.Isaac.Rebirth', '2024-11-23', 'issac.jpg', 'issac1.jpg', 'issac2.jpg', 'issac3.jpg', 'issac_trailer.mp4', 'The Binding of Isaac: Rebirth is the ultimate of remakes with an all-new highly efficient game engine (expect 60fps on most PCs), all-new hand-drawn pixel style artwork, highly polished visual effects, all-new soundtrack and audio by the the sexy Ridiculon duo Matthias Bossi + Jon Evans. Oh yeah, and hundreds upon hundreds of designs, redesigns and re-tuned enhancements by series creator, Edmund McMillen. Did we mention the poop?', 'belum'),
(3, 'The.Binding.of.Isaac.Rebirth', '2024-11-23', 'issac.jpg', 'issac1.jpg', 'issac2.jpg', 'issac3.jpg', 'issac_trailer.mp4', 'The Binding of Isaac: Rebirth is the ultimate of remakes with an all-new highly efficient game engine (expect 60fps on most PCs), all-new hand-drawn pixel style artwork, highly polished visual effects, all-new soundtrack and audio by the the sexy Ridiculon duo Matthias Bossi + Jon Evans. Oh yeah, and hundreds upon hundreds of designs, redesigns and re-tuned enhancements by series creator, Edmund McMillen. Did we mention the poop?', 'selesai'),
(5, 'Dead Cells', '2024-11-24', 'dead.jpg', 'dead1.jpg', 'dead2.jpg', 'dead3.jpg', 'deadtrailer.mp4', 'Dead Cells is a roguelite, metroidvania inspired, action-platformer. You\'ll explore a sprawling, ever-changing castle... assuming you’re able to fight your way past its keepers in 2D souls-lite combat. No checkpoints. Kill, die, learn, repeat.', 'belum'),
(8, 'Dead Cell', '2024-11-29', 'dead.jpg', 'deadtrailer.mp4', 'dead2.jpg', 'dead3.jpg', 'deadtrailer.mp4', 'Dead Cells is a roguelite, metroidvania inspired, action-platformer. You\'ll explore a sprawling, ever-changing castle... assuming you’re able to fight your way past its keepers in 2D souls-lite combat. No checkpoints. Kill, die, learn, repeat.', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id_logo` int(11) NOT NULL,
  `nama_Logo` varchar(255) DEFAULT NULL,
  `logos` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id_logo`, `nama_Logo`, `logos`, `icon`) VALUES
(1, 'Axo\'s Game', 'axogame.png', 'axogame.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `real` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `password` varchar(11) DEFAULT NULL,
  `Level` enum('admin','petugas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `real`, `user`, `password`, `Level`) VALUES
(1, 'admin', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id_logo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
