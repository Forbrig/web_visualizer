-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 23-Nov-2018 às 20:59
-- Versão do servidor: 10.2.18-MariaDB
-- versão do PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_visualizer`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `type` enum('PDF','PNG','JPG') NOT NULL,
  `date_inserted` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `file`
--

INSERT INTO `file` (`id`, `id_user`, `name`, `type`, `date_inserted`) VALUES
(30, 23, 'teste', 'JPG', '2018-11-23 20:15:21'),
(31, 23, 'teste', 'JPG', '2018-11-23 20:15:33'),
(32, 23, 'teste', 'PNG', '2018-11-23 20:15:43'),
(33, 23, 'teste', 'PDF', '2018-11-23 20:15:57'),
(34, 23, 'teste', 'PDF', '2018-11-23 20:16:07'),
(35, 24, 'teste', 'PNG', '2018-11-23 20:24:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hash` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `password`, `hash`) VALUES
(23, 'vitorforbrig@gmail.com', 'VITOR', 'FORBRIG', '$2y$10$I.Dum2/Rti1weZMMaw/PNO/WslXDN1V5zniZbUmnlgIEvNQJSctnO', '01386bd6d8e091c2ab4c7c7de644d37b'),
(24, 'marceloacordi@gmail.com', 'Marcelo', 'Acordi', '$2y$10$SYdszLNqJy9cWDV5Kh9R/e06IE8pNvkcODe4AJbt9xKpev5em3jsK', '4734ba6f3de83d861c3176a6273cac6d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_iduser_file_id_users` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `fk_iduser_file_id_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
