-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2025 at 07:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mikexam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fullname`) VALUES
(1, '123', '$2y$10$Xs.N62O3fVVt1mG2RGVWLe6mOAAmqXXmjlkwe3Qk2GQgBMaQh4Dja', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `participant_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `id` int(11) NOT NULL,
  `participant_id` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`id`, `participant_id`, `password`, `fullname`) VALUES
(1, 'user1', 'user1', 'user1'),
(2, 'user2', 'user2', 'user2'),
(3, 'user3', 'user3', 'user3');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question` text DEFAULT NULL,
  `correct_answer` varchar(50) DEFAULT NULL,
  `is_active` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `correct_answer`, `is_active`) VALUES
(1, 'Unlike the reporter, the news anchor delivers the news to the public while inside the studio.', 'd', 1),
(2, 'As one of the vital people behind the camera, solely supervises and instructs the performers and hosts on how to act according to the script provided by the scriptwriter.', 'a', 0),
(3, 'Introduced motion pictures to storytelling, it has the power to evoke emotions.', 'a', 0),
(4, 'It was the 2nd key components of MIL (skills that you should have)', 'd', 0),
(5, 'The ability to read, analyze, evaluate and produce communication in a variety of contexts.', 'c', 0),
(6, '____ is a fascinating art form that involves applying dyes or paints to fabric.', 'd', 0),
(7, 'It opened up a world of information and creativity, allowing anyone to share their voice and connect with others globally.', 'd', 0),
(8, 'It is a KNOWLEDGE obtained and organized structured facts.', 'd', 0),
(9, 'It was the 5th key components of MIL (skills that you should have)', 'b', 0),
(10, 'In this era, it made books affordable and accessible, promoting literacy and the spread of ideas.', 'b', 0),
(11, 'UNESCO defined ___ ability to identify, understand, interpret, create, communicate, and compute, using printed and written materials associated with varying contexts.', 'c', 0),
(12, 'The ability to recognize facts to locate, evaluate, effectively use and communicate facts in its various formats.', 'b', 0),
(13, 'In general terms, you may come to understand literacy to be equivalent to ________.', 'a', 0),
(14, 'Refers to the nature of message, whether it is relayed using text, audio, video, graphics, animation or combination of any of these things.', 'b', 0),
(15, 'The ability to use digital technology, communication tools or networks to locate, use, and create information.', 'a', 0),
(16, 'In our previous discussion, what are the question that ask you the important components of MIL except;', 'd', 0),
(17, 'These early artworks were not just decoration; they were a way to tell stories and communicate ideas, laying the groundwork for all future media.', 'a', 0),
(18, 'MIL stands for?', 'b', 0),
(19, 'One of the function of communication is to ____.', 'c', 0),
(20, 'It was the 1st key components of MIL (skills that you should have)', 'a', 0),
(21, 'Rule __ : Share expert knowledge.', 'd', 0),
(22, 'Rule __ : Respect other people’s time and bandwidth', 'd', 0),
(23, 'Rule __ : Make yourself look good online.', 'a', 0),
(24, 'These are people responsible for capturing images to accompany written text or visually represent a concept or idea. ', 'b', 0),
(25, 'The personel is in charge of financing the show or movie.', 'b', 0),
(26, 'the means of interactions among people in which they create, share, and/or exchange information and ideas in virtual communities and networks.', 'c', 0),
(27, 'Rule __ : Remember the human.', 'c', 0),
(28, 'Rule __ : Know where you are in cyberspace.', 'b', 0),
(29, 'is the process that implies creating articles, photos, and other forms of content and publishing them on a website.', 'b', 0),
(30, 'It was the 4th key components of MIL (skills that you should have)', 'd', 0),
(31, 'Rule __: Help keep flame wars under control.', 'c', 0),
(32, 'It was the 3rd key components of MIL (skills that you should have)', 'c', 0),
(33, 'Rule __ : Adhere to same standards of behavior online that you follow in real life.', 'd', 0),
(34, 'This text serves as a link which allows access to various electronic documents.', 'd', 0),
(35, 'Rule __ : Do not abuse your power.', 'a', 0),
(36, 'Rule __ : Be forgiving of other people’s mistakes', 'a', 0),
(37, 'The people who work in the media and the members of the press.', 'a', 0),
(38, 'They are responsible in checking and looking over the writer’s work before it is sent for publishing. ', 'b', 0),
(39, 'Similar to the journalist, is tasked to report on the news in the field where the event has happened. ', 'c', 0),
(40, 'One of the most well-known sources of text information.', 'a', 0),
(41, 'Refer to newspapers that has large pages.', 'b', 0),
(42, 'Refer to newspapers as a half-size newspaper that is convenient to hold.', 'c', 0),
(43, 'Mostly non-profit, as its specialization is mainly academic content. Some of the publications that they produce include scholarly journals, textbooks, and references for student use.', 'a', 0),
(44, 'Rule __ : Respect other people’s privacy.', 'c', 0),
(45, 'An insidious type of malware that encrypts, or locks, valuable digital files and demands a ransom to release them.', 'c', 0),
(46, '1st logo.', 'c', 0),
(47, '2nd logo.', 'd', 0),
(48, '3rd logo.', 'b', 0),
(49, '4th logo.', 'b', 0),
(50, '5th logo.', 'a', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
