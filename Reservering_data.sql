
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- Database: `Reservering_data`
CREATE DATABASE IF NOT EXISTS `Reservering_data` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Reservering_data`;


-- Table structure for table `albums`

DROP TABLE IF EXISTS `reserveringen`;
CREATE TABLE `reserveringen` (
                          `id` int(11) UNSIGNED NOT NULL,
                          `firstName` varchar(50) NOT NULL,
                          `lastName` varchar(80) NOT NULL,
                          `mail` varchar(50) NOT NULL,
                          `date` varchar(50) NOT NULL,
                          `time` varchar(20) NOT NULL,
                          `persons` smallint(6) UNSIGNED NOT NULL,
                          `number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `firstName`,`lastName`, `mail`, `date`, `time`, `persons`, `number`) VALUES
    (1, 'Ceren', 'Akkaya' '123@gmail.com', '29-11-2022', 17:00, 4, +31 612345678),
(2, 'Mitchel', 'Pieter', '123@gmail.com', '29-11-2022', 17:45, 2, +31 612345678),
(3, 'Susan', 'Pieter', '123@gmail.com', '29-11-2022', 18:00, 3, +31 612345678),
(4, 'Pieter', 'Pieter', '123@gmail.com', '29-11-2022', 18:00, 2, +31 612345678),
(5, 'Mees', 'Pieter', '123@gmail.com', '29-11-2022', 18:00, 4, +31 612345678),
(6, 'Sam', 'Pieter', '123@gmail.com', '30-11-2022', 18:30, 5, +31 612345678),
(7, 'Mehmet', 'Pieter', '123@gmail.com', '30-11-2022', 18:30, 1, +31 612345678),
(8, 'Duman', 'Pieter', '123@gmail.com', '30-11-2022', 18:30, 3, +31 612345678),
(9, 'Kees', 'Pieter', '123@gmail.com', '30-11-2022', 19:00, 2, +31 612345678),
(10, 'Richard', 'Pieter', '123@gmail.com', '29-11-2022', 19:00, 6, +31 612345678);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reserveringen`
--
ALTER TABLE `reserveringen`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
