-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2025 at 07:05 PM
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
-- Database: `ebook_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ebooks`
--

CREATE TABLE `ebooks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL,
  `idpath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ebooks`
--

INSERT INTO `ebooks` (`id`, `title`, `author`, `description`, `file_path`, `upload_date`, `image`, `idpath`) VALUES
(1, 'The Psychology of Money', 'Morgan Housel', 'The Psychology of Money is a collection of short stories exploring the strange ways people think about money. The author presents related biases, flaws, behaviors, and attitudes that affect one\'s financial outcomes and shows how one\'s psychology can work for and against them.', 'C:/xampp/htdocs/pro/The Psychology of Money.pdf', '2025-01-17 09:19:05', '1.jpg', '1.html'),
(2, 'Ponniyin Selvan', 'Kalki\r\n', 'Ponniyin Selvan is a Tamil historical fiction novel written by Kalki based on real events. It narrates the story of Arulmozhivarman (later crowned as Rajaraja Chola I), one of the kings of the Chola Dynasty during the 10th and 11th centuries. This historic novel serialised for a period of three and a half years.Ponniyin Selvan: I dramatises the early life of Chola prince Arunmozhi Varman, who would become the renowned emperor Rajaraja I (947–1014). In the film, Vandiyathevan sets out to cross the Chola land to deliver a message from the crown prince Aditha Karikalan.', 'C:/xampp/htdocs/pro/images/example2.pdf', '2025-01-17 09:19:05', '2.jpg', '2.html'),
(3, 'Harry Potter Part-1', 'J. K. Rowling', 'Harry Potter is a series of seven fantasy novels written by British author J. K. Rowling. The novels chronicle the lives of a young wizard, Harry Potter, and his friends Hermione Granger and Ron Weasley, all of whom are students at Hogwarts School of Witchcraft and Wizardry', 'C:/xampp/htdocs/pro/Harry Potter And The Sorcerer\'s Stone.pdf', '2025-01-19 00:39:40', '3.jpg', '3.html'),
(4, 'Atomic Habits', 'James Clear', 'Atomic Habits is a self-help book offering practical strategies for building good habits, breaking bad ones, and mastering tiny behaviors that lead to remarkable results.', 'C:/xampp/htdocs/pro/Atomic Habits.pdf', '2025-01-20 18:00:00', '4.jpg', '4.html'),
(5, 'The Alchemist', 'Paulo Coelho', 'The Alchemist is a novel that tells the mystical story of Santiago, an Andalusian shepherd boy who yearns to travel in search of a worldly treasure.', 'C:/xampp/htdocs/pro/The Alchemist.pdf', '2025-01-20 18:30:00', '5.jpg', '5.html'),
(6, 'Rich Dad Poor Dad', 'Robert T. Kiyosaki', 'Rich Dad Poor Dad is a personal finance book that advocates financial independence through investing, real estate, and entrepreneurship.', 'C:/xampp/htdocs/pro/Rich Dad Poor Dad.pdf', '2025-01-20 19:00:00', '6.jpg', '6.html'),
(7, 'To Kill a Mockingbird', 'Harper Lee', 'A classic novel of the American South, To Kill a Mockingbird addresses themes of racial injustice and moral growth through the perspective of a young girl.', 'C:/xampp/htdocs/pro/To Kill a Mockingbird.pdf', '2025-01-20 19:30:00', '7.jpg', '7.html'),
(8, 'The Power of Now', 'Eckhart Tolle', 'A spiritual guide to living in the present moment.', 'C:/ebooks/ThePowerOfNow.pdf', '2025-01-21 18:00:00', '8.jpg', '8.html'),
(9, 'Man\'s Search for Meaning', 'Viktor E. Frankl', 'A profound memoir of surviving the Holocaust and finding meaning in life.', 'C:/ebooks/MansSearchForMeaning.pdf', '2025-01-21 18:00:00', '9.jpg', '9.html'),
(10, 'The Book Thief', 'Markus Zusak', 'A heart-wrenching tale set in Nazi Germany, narrated by Death.', 'C:/ebooks/TheBookThief.pdf', '2025-01-21 18:00:00', '10.jpg', '10.html'),
(11, 'Think and Grow Rich', 'Napoleon Hill', 'Timeless principles for achieving personal success and financial independence.', 'C:/ebooks/ThinkAndGrowRich.pdf', '2025-01-21 18:00:00', '11.jpg', '11.html'),
(12, 'Meditations', 'Marcus Aurelius', 'Philosophical reflections on life, leadership, and stoicism.', 'C:/ebooks/Meditations.pdf', '2025-01-21 18:00:00', '12.jpg', '12.html'),
(13, 'Dune', 'Frank Herbert', 'A groundbreaking sci-fi epic exploring politics, religion, and survival on the desert planet Arrakis.', 'C:/ebooks/Dune.pdf', '2025-01-21 18:00:00', '13.jpg', '13.html'),
(14, 'Pride and Prejudice', 'Jane Austen', 'A classic novel of manners, love, and society in Regency England.', 'C:/ebooks/PrideAndPrejudice.pdf', '2025-01-21 18:00:00', '14.jpg', '14.html'),
(15, 'Educated', 'Tara Westover', 'A memoir of overcoming a strict and abusive upbringing to achieve an education.', 'C:/ebooks/Educated.pdf', '2025-01-21 18:00:00', '15.jpg', '15.html'),
(16, 'The Catcher in the Rye', 'J.D. Salinger', 'A coming-of-age story about teenage rebellion and angst.', 'C:/ebooks/TheCatcherInTheRye.pdf', '2025-01-21 18:00:00', '16.jpg', '16.html'),
(17, 'The Road', 'Cormac McCarthy', 'A haunting post-apocalyptic tale of survival and the bond between father and son.', 'C:/ebooks/TheRoad.pdf', '2025-01-21 18:00:00', '17.jpg', '17.html'),
(18, 'The Great Gatsby', 'F. Scott Fitzgerald', 'A story of ambition, wealth, and love in the Roaring Twenties.', 'C:/ebooks/TheGreatGatsby.pdf', '2025-01-21 18:00:00', '18.jpg', '18.html'),
(19, 'The Art of War', 'Sun Tzu', 'Timeless strategies for warfare, leadership, and decision-making.', 'C:/ebooks/TheArtOfWar.pdf', '2025-01-21 18:00:00', '19.jpg', '19.html'),
(20, 'Where the Crawdads Sing', 'Delia Owens', 'A mystery and coming-of-age novel set in the marshlands of North Carolina.', 'C:/ebooks/WhereTheCrawdadsSing.pdf', '2025-01-21 18:00:00', '20.jpg', '20.html');

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE `login_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_logs`
--

INSERT INTO `login_logs` (`id`, `user_id`, `login_time`) VALUES
(1, 1, '2025-01-17 09:38:23'),
(2, 1, '2025-01-17 10:00:01'),
(3, 1, '2025-01-18 15:19:11'),
(4, 1, '2025-01-18 16:00:10'),
(5, 1, '2025-01-18 16:00:11'),
(6, 1, '2025-01-18 16:42:33'),
(7, 1, '2025-01-20 16:51:23'),
(8, 1, '2025-01-20 17:12:10'),
(9, 1, '2025-01-20 17:58:12'),
(10, 1, '2025-01-20 18:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'dharanesh', 'kdharanesh@gmail.com', '$2y$10$F8T7bhWV.KgxbTCzqSi2OuiPQM1UDP8q79EUOtUfmXIteHTkCkPIO', '2025-01-17 09:37:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebooks`
--
ALTER TABLE `ebooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ebooks`
--
ALTER TABLE `ebooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9119;

--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD CONSTRAINT `login_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
