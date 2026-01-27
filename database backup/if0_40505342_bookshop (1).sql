-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql304.infinityfree.com
-- Generation Time: Jan 27, 2026 at 01:02 PM
-- Server version: 11.4.9-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_40505342_bookshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `price`, `genre`, `description`, `created_at`, `image`) VALUES
(10, 'Life of Pi', 'Yann Martel', '18.00', 'Novel', 'Life of Pi follows a young boy named Pi Patel who survives a shipwreck. He becomes stranded on a lifeboat in the Pacific Ocean with a Bengal tiger named Richard Parker. The story blends adventure, survival, and spirituality. Pi faces hunger, fear, and loneliness while forming an unlikely bond with the tiger. The novel explores faith, imagination, and the power of storytelling.', '2025-12-05 11:15:20', 'uploads/life of pi.jpg'),
(11, 'Vendor of sweets', 'R. K. Narayan', '15.99', 'Novel', 'The Vendor of Sweets tells the story of Jagan, a traditional sweet-maker in the town of Malgudi. He lives a simple, disciplined life based on Gandhian principles. His world begins to change when his modern, business-minded son Mali returns from abroad. The clash between Jaganâ€™s values and Maliâ€™s ambitions creates tension and emotional conflict. The novel explores themes of family, tradition, and the struggle between old and new ways of life.', '2025-12-05 11:19:15', 'uploads/vendor of sweets1.jpg'),
(12, 'House of Hades', 'Rick Riordan', '25.00', 'Fiction', 'The House of Hades follows Percy and Annabeth as they journey through Tartarus, fighting to reach the Doors of Death. Meanwhile, their friends on the Argo II race across Greece to seal the doors from the mortal world. The heroes face new monsters, gods, and challenges that test their courage and unity. Their parallel quests reveal deep friendships and personal growth. The story blends mythology, adventure, and teamwork as they fight to stop the rise of the giants.', '2025-12-05 11:22:06', 'uploads/house of hades.jpg'),
(13, 'The song of Achilles', 'Madeline Miller', '27.00', 'Novel', 'The Song of Achilles retells the Greek myth of Achilles through the eyes of Patroclus. It follows their deep bond as they grow from childhood companions to devoted partners. When the Trojan War begins, both are drawn into a world of heroes, prophecy, and tragedy. The novel blends love, destiny, and mythology with emotional depth. It ultimately portrays the enduring power of loyalty and sacrifice.', '2025-12-05 11:25:01', 'uploads/song of achilles.jpg'),
(14, 'Twighlight', 'Stephanie Meyer', '18.75', 'Fiction', 'Twilight follows Bella Swan, a teenager who moves to the small town of Forks. There she meets Edward Cullen, a mysterious boy who turns out to be a vampire. Despite the danger, Bella and Edward fall into an intense and complicated romance. Their relationship draws Bella into a world of supernatural threats and rivalries. The novel explores love, risk, and the pull between human and immortal worlds.', '2025-12-05 11:28:01', 'uploads/twighlight.jpg'),
(15, 'Dune', 'Frank Herbert', '26.00', 'Sci-Fi', 'Dune is set on the desert planet Arrakis, the only source of a powerful substance called â€œspice.â€ The story follows Paul Atreides, whose noble family is given control of the planet. When betrayal strikes, Paul is forced to survive among the native Fremen people. As he learns their ways, he discovers his destiny tied to prophecy and power. The novel explores politics, religion, ecology, and the rise of a reluctant hero.', '2025-12-05 11:30:44', 'uploads/dune.jpg'),
(16, 'Hunger Games', 'Suzanne Collins', '35.00', 'Sci-Fi', 'The Hunger Games takes place in Panem, a dystopian society where the Capitol forces children to fight to the death in a yearly televised event. Sixteen-year-old Katniss Everdeen volunteers to take her sisterâ€™s place in the deadly games. Inside the arena, she must rely on her survival skills, instincts, and alliances. Her defiance begins to challenge the Capitolâ€™s control and sparks hope among the oppressed districts. The story explores power, sacrifice, and the fight for freedom.', '2025-12-05 11:35:31', 'uploads/Hunger games.jpg'),
(17, 'The Maze Runner', 'James Dashner', '18.00', 'Sci-Fi', 'The Maze Runner follows Thomas, who wakes up in a mysterious place called the Glade with no memory of his past. The Glade is surrounded by a massive, ever-changing maze filled with deadly creatures. Thomas joins the other boys trapped there as they search for a way out. His arrival triggers strange events that hint at a larger purpose behind their situation. The story blends mystery, survival, and suspense as they fight to escape the maze.', '2025-12-05 11:38:52', 'uploads/the maze runner.jpg'),
(18, 'Sapiens', 'Yuval Noah Harari', '14.99', 'History', 'Sapiens explores the history of humans from the emergence of Homo sapiens in Africa to the modern age.\r\nIt examines how cognitive, agricultural, and scientific revolutions shaped societies and civilizations.\r\nYuval Noah Harari highlights the development of culture, religion, politics, and economics.\r\nThe book discusses both the achievements and the destructive impacts of humanity.\r\nOverall, it provides a thought-provoking look at what it means to be human and how we got here.', '2025-12-05 11:42:44', 'uploads/the sapiens.jpg'),
(19, 'Nectar in a Sieve', 'Kamala Markandaya', '25.00', 'Novel', 'Nectar in a Sieve tells the story of Rukmani, a poor Indian village woman, and her struggles with poverty and change.\r\nShe marries Nathan, a tenant farmer, and together they try to make a life despite hardship.\r\nThe novel explores the impact of modernization, natural disasters, and social challenges on rural life.\r\nRukmani faces loss, resilience, and the strength of family bonds throughout her journey.\r\nThe story highlights perseverance, hope, and the human spirit in the face of adversity.', '2025-12-05 11:51:56', 'uploads/nectar in a seive.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
