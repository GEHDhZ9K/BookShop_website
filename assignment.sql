-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 24, 2022 at 01:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_db`
--

CREATE TABLE `product_db` (
  `id` int(11) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Price` varchar(100) NOT NULL,
  `Description` varchar(5000) DEFAULT NULL,
  `Image` varchar(50) NOT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `Popularity` int(11) DEFAULT NULL,
  `Added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_db`
--

INSERT INTO `product_db` (`id`, `Author`, `Title`, `Price`, `Description`, `Image`, `Category`, `Popularity`, `Added`) VALUES
(1, 'Harper Lee', 'To Kill a Mockingbird', '900', 'The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it, To Kill A Mockingbird became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961 and was later made into an Academy Award-winning film, also a classic.\r\n\r\nCompassionate, dramatic, and deeply moving, To Kill A Mockingbird takes readers to the roots of human behavior - to innocence and experience, kindness and cruelty, love and hatred, humor and pathos. Now with over 18 million copies in print and translated into forty languages, this regional story by a young Alabama woman claims universal appeal. Harper Lee always considered her book to be a simple love story. Today it is regarded as a masterpiece of American literature.', 'To_Kill_a_Mockingbird.jpg', 'Southern Gothic fiction', 1, '2022-06-25 11:04:43'),
(2, 'William Golding', 'The Lord of the Flies', '800', 'At the dawn of the next world war, a plane crashes on an uncharted island, stranding a group of schoolboys. At first, with no adult supervision, their freedom is something to celebrate. This far from civilization they can do anything they want. Anything. But as order collapses, as strange howls echo in the night, as terror begins its reign, the hope of adventure seems as far removed from reality as the hope of being rescued.', 'Lord_of_the_flies.jpg', 'Young Adult Fiction', 2, '2008-06-25 09:15:48'),
(3, 'Cixin Liu', 'Three Body Probel', '920', 'Set against the backdrop of Chinas Cultural Revolution, a secret military project sends signals into space to establish contact with aliens. An alien civilization on the brink of destruction captures the signal and plans to invade Earth. Meanwhile, on Earth, different camps start forming, planning to either welcome the superior beings and help them take over a world seen as corrupt, or to fight against the invasion. The result is a science fiction masterpiece of enormous scope and vision.', 'The_Three_Body_Problem.jpg', 'Science Fiction', 3, '2022-07-21 18:37:33'),
(5, 'Cixin Liu', 'Deaths End', '960', 'With The Three-Body Problem, English-speaking readers got their first chance to read Chinas most beloved science fiction author, Cixin Liu. The Three-Body Problem was released to great acclaim including coverage in The New York Times and The Wall Street Journal and reading list picks by Barack Obama and Mark Zuckerberg. It was also won the Hugo and Nebula Awards, making it the first translated novel to win a major SF award.\r\n\r\nNow this epic trilogy concludes with Deaths End. Half a century after the Doomsday Battle, the uneasy balance of Dark Forest Deterrence keeps the Trisolaran invaders at bay. Earth enjoys unprecedented prosperity due to the infusion of Trisolaran knowledge. With human science advancing daily and the Trisolarans adopting Earth culture, it seems that the two civilizations will soon be able to co-exist peacefully as equals without the terrible threat of mutually assured annihilation. But the peace has also made humanity complacent.\r\n\r\nCheng Xin, an aerospace engineer from the early twenty-first century, awakens from hibernation in this new age. She brings with her knowledge of a long-forgotten program dating from the beginning of the Trisolar Crisis, and her very presence may upset the delicate balance between two worlds. Will humanity reach for the stars or die in its cradle?', 'Death_s_End.jpg', 'Science Fiction', 4, '2022-06-24 23:28:27'),
(6, 'Cixin Liu', 'The Dark Forest', '970', 'In The Dark Forest, Earth is reeling from the revelation of a coming alien invasion-in just four centuries time. The aliens human collaborators may have been defeated, but the presence of the sophons, the subatomic particles that allow Trisolaris instant access to all human information, means that Earths defense plans are totally exposed to the enemy. Only the human mind remains a secret. This is the motivation for the Wallfacer Project, a daring plan that grants four men enormous resources to design secret strategies, hidden through deceit and misdirection from Earth and Trisolaris alike. Three of the Wallfacers are influential statesmen and scientists, but the fourth is a total unknown. Luo Ji, an unambitious Chinese astronomer and sociologist, is baffled by his new status. All he knows is that hes the one Wallfacer that Trisolaris wants dead.', 'The_Dark_Forest.jpg', 'Science Fiction', 5, '2022-06-25 01:28:27'),
(7, 'George Orwell', '1984', '970', '“The Party told you to reject the evidence of your eyes and ears. It was their final, most essential command.”\r\n\r\nWinston Smith toes the Party line, rewriting history to satisfy the demands of the Ministry of Truth. With each lie he writes, Winston grows to hate the Party that seeks power for its own sake and persecutes those who dare to commit thoughtcrimes. But as he starts to think for himself, Winston can’t escape the fact that Big Brother is always watching...\r\n\r\nA startling and haunting novel, 1984 creates an imaginary world that is completely convincing from start to finish. No one can deny the novel’s hold on the imaginations of whole generations, or the power of its admonitions—a power that seems to grow, not lessen, with the passage of time.', '1984.jpg', 'Dystopian Fiction', 8, '2022-06-20 19:28:27'),
(8, 'George Orwell', 'Animal Farm', '870', '“All animals are equal, but some animals are more equal than others.”\r\n\r\nA farm is taken over by its overworked, mistreated animals. With flaming idealism and stirring slogans, they set out to create a paradise of progress, justice, and equality. Thus the stage is set for one of the most telling satiric fables ever penned—a razor-edged fairy tale for grown-ups that records the evolution from revolution against tyranny to a totalitarianism just as terrible.\r\n \r\nWhen Animal Farm was first published, Stalinist Russia was seen as its target. Today it is devastatingly clear that wherever and whenever freedom is attacked, under whatever banner, the cutting clarity and savage comedy of George Orwell’s masterpiece have a meaning and message still ferociously fresh.', 'Animal_farm.jpg', 'Dystopian Fiction', 7, '2022-06-25 11:00:41'),
(10, 'Ray Bradbury', 'Fahrenheit 451', '900', 'â€œGuy Montag is a fireman. His job is to destroy the most illegal of commodities, the printed book, along with the houses in which they are hidden. Montag never questions the destruction and ruin his actions produce, returning each day to his bland life and wife, Mildred, who spends all day with her television â€œfamily.â€ But when he meets an eccentric young neighbor, Clarisse, who introduces him to a past where people didnâ€™t live in fear and to a present where one sees the world through the ideas in books instead of the mindless chatter of television, Montag begins to question everything he has ever known.', 'Fahrenheit_451.jpg ', 'Dystopian Fiction', 6, '2022-07-08 04:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `Cart_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`Cart_id`, `Product_id`, `User_id`) VALUES
(1, 1, 1),
(2, 5, 1),
(64, 10, 1),
(65, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_db`
--

CREATE TABLE `user_db` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(40) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `UserName` varchar(40) NOT NULL,
  `Password` varchar(128) NOT NULL,
  `Mail` varchar(60) NOT NULL,
  `PhNumber` varchar(15) NOT NULL,
  `Admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_db`
--

INSERT INTO `user_db` (`id`, `FirstName`, `LastName`, `UserName`, `Password`, `Mail`, `PhNumber`, `Admin`) VALUES
(1, 'fname', 'lnam', 'uname', '1a1dc91c907325c69271ddf0c944bc72 ', 'email@gmail.com', '21312', 1),
(2, 'jared', 'leto', 'jeto', '5f4dcc3b5aa765d61d8327deb882cf99', 'john@smith.com', '9612312321', 0),
(3, 'test', 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@test.com', '981231231', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_review`
--

CREATE TABLE `user_review` (
  `review_id` int(11) NOT NULL,
  `UserId` int(10) NOT NULL,
  `ProductId` int(10) NOT NULL,
  `Comment` varchar(1000) NOT NULL,
  `Review_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_review`
--

INSERT INTO `user_review` (`review_id`, `UserId`, `ProductId`, `Comment`, `Review_date`) VALUES
(1, 1, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur blanditiis distinctio earum illo libero odio officia quaerat quas! Deserunt eaque laboriosam magni nobis perspiciatis praesentium quae reprehenderit sint sunt tenetur!', '2022-07-21 17:51:42'),
(2, 1, 1, 'test2', '2022-07-20 15:38:07'),
(4, 3, 10, 'good book', '2022-07-21 18:30:13'),
(5, 1, 8, 'test comment', '2022-07-24 10:02:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_db`
--
ALTER TABLE `product_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`Cart_id`);

--
-- Indexes for table `user_db`
--
ALTER TABLE `user_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_review`
--
ALTER TABLE `user_review`
  ADD PRIMARY KEY (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_db`
--
ALTER TABLE `product_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `Cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user_db`
--
ALTER TABLE `user_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_review`
--
ALTER TABLE `user_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
