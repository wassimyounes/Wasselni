-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 01:07 PM /by wassim
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wasselni_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `is_available` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `firstname`, `lastname`, `email`, `phonenumber`, `password`, `is_confirmed`, `is_available`) VALUES
(1, 'Una', 'Juryk', 'ujurzyk0@google.pl', '70783660', '$2a$04$.hVuLvYwTRneWezJuBncf.UUmGuGqll6l4QdhEJ8OgLOwKYlI8eR.', 0, 0),
(2, 'Yovonnda', 'Darrow', 'ydarrow1@ebay.co.uk', '03113125', '$2a$04$vsecN11aENHGRJVuubJTM.CITu8bQmmKGS12DfwZ5aEu8AjrQ64WG', 0, 0),
(3, 'Carolin', 'Tunnock', 'ctunnock2@parallels.com', '76932722', '$2a$04$0.kvFdgRB20PP/VoaEBWGe9fhsNQxv.GZG10HJCS9e6lKCK9OivyW', 0, 0),
(4, 'Austine', 'Attaway', 'austine@gmail.com', '03523746', '$2a$04$GY60KUrOc.z6jfFYUc7.BuM1AWd9fa82eC8nlb1SEg2M4d.E5sBEC', 0, 0),
(5, 'Jacklin', 'Koppe', 'jkoppe4@sbwire.com', '81179428', '$2a$04$u78EFoW9uEW/yaEzH1Pzi.r4maOopHHa6.9q4Ph5bHE60oA1pMZX6', 1, 0),
(6, 'Ozzy', 'Feathersby', 'ofeathersby5@geocities.com', '03611420', '$2a$04$Dal3dQCIGlh7rrSnyoFOcufPQv8TVgBicXIy02QDFzwndYejbCDJ6', 0, 0),
(7, 'Elvis', 'Jouannot', 'ejouannot6@tmall.com', '70064728', '$2a$04$HjdgpDJCht16jTGAN3KMgOwUvA4T.EmqAzoGAK4JLpD2aSVKzVzKu', 1, 0),
(8, 'Shelagh', 'Athowe', 'sathowe7@eepurl.com', '71024903', '$2a$04$ustWZRUU4AuZ3uLOiN2lpu1CkJq4Lz.YR7WDLKJPxQ4a754fF7cCa', 0, 0),
(9, 'Bartie', 'Harverson', 'bharverson8@amazon.co.uk', '70702796', '$2a$04$z6H4CMuIPCd2JKoU895CV.hcC1p8lv80lCE.EfStRwhbglCVwcxJi', 1, 0),
(10, 'Bibi', 'Minguet', 'bminguet9@csmonitor.com', '79432938', '$2a$04$XD385TTILYB0ETs6xhWs5uoqzcBVaacEV6jqpORjt.T0q0uymynii', 1, 0),
(11, 'austine', 'james', 'wass.younes@gmail.com', '03215858', '$2y$10$/SwPP5B3mrJO7v.dxRuaJOuL4thKnU.Ty.SRMCI00Jl5wrvEhuEX6', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `ride_id` int(11) NOT NULL,
  `score` decimal(3,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rides`
--

CREATE TABLE `rides` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `start_location` varchar(100) NOT NULL,
  `end_location` varchar(100) NOT NULL,
  `started_at` timestamp NULL DEFAULT NULL,
  `ended_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rides`
--

INSERT INTO `rides` (`id`, `driver_id`, `user_id`, `start_location`, `end_location`, `started_at`, `ended_at`, `status`) VALUES
(1, NULL, 9, '33.56065, 35.37148', '33.898838, 35.501558', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'pending'),
(22, 11, 24, '33.5618345, 35.3780338', '33.88922645, 35.502558528952', '2024-01-07 11:29:37', '2024-01-07 11:29:45', 'ended');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phonenumber`, `password`) VALUES
(1, 'Mead', '03676174', '$2a$04$JkpXHOKkPx6uaNJGqmJ.GuZXLuE7vj6Qw865E7BaASEndTpwuSGQm'),
(2, 'Michele', '03123456', '$2a$04$klHcgdNLZ7bbfpJi860iEu9522CBsRmdzggu2iSPJLGDONwLIrih6'),
(3, 'Jeana', '70477772', '$2a$04$b04gLrV0WL4OuMaYjW2C1eAd.eSNIJNYU.LOEpY55yKk.yMOC0t26'),
(4, 'Free', '70965497', '$2a$04$rHK/CRpojqeE47hgnxlH7.uWHrhD.LPbHRJp9iNP9ky85KE2stnAS'),
(5, 'Wyatan', '71348253', '$2a$04$qAfJwaz4edPjI9SiHhvQoefEFSLF3UBlJF1sGl40hgrk/APJl3Cfm'),
(6, 'Pavel', '71874451', '$2a$04$r4s3zxHu60N481Tyodwb/uM7sa64gs3LTbV31UJBZ6OT6791Uy9au'),
(7, 'Harwilll', '81289075', '$2a$04$t8ydSVRpnWRTJlqywN3YZ.U0rEGfP9LlO7UPAyXvR1LK6pbImYvy.'),
(8, 'Laurens', '03440975', '$2a$04$.WlLuXxkYdsokFhS35CFHOMwIzS5z7PwHIKtmrDVfthxOPciConRW'),
(9, 'Jolene', '03112744', '$2a$04$P4PdkMbltVQNKAujZbcwA.gBxGaATSevICLU08Rh/UbxKFCUHWbKi'),
(10, 'Peter', '70671347', '$2a$04$wNh2xlWZVzWYn1r3SAQfVO4yfnk7IWNa3FJAipwMEOipaAY9tr49q'),
(11, 'Pace', '70839434', '$2a$04$fCpKpZDnLVkShN8p7eAVIemXZ3mZ8mC4ZeSYjgy6WXR6os0xwGuT6'),
(12, 'Rubina', '718653401', '$2a$04$J6lUgy8p9gDZI.pXDPYCW.HxrsL1tvE1sqsw0adZyafoYCSQ8pMu2'),
(13, 'Wynny', '71660766', '$2a$04$t/AoADrVCnp9pf6/939Ei.BoVgdRdBKPC/8UZH5/kK1LvVXKo0YiW'),
(14, 'Evangelina', '03997123', '$2a$04$B7pGWqH9VSszcPSq8qp3.eahzceiNVJCIfyfs47NQON.3Cvd0EDgy'),
(15, 'Zacharie', '03125303', '$2a$04$F8gJNgriWj8YHbWIbFNc1uFOW/Fh4Ge.g5sqWxq5foKi4HFw1TrpS'),
(16, 'Valery', '03491149', '$2a$04$MYHWCOprRhSTsKVxOsDo0OVOOiZp0FrmkMzmARYmdIXW1PAH7NNZu'),
(17, 'Federico', '03006072', '$2a$04$PEdyTSX6HMCU6lWmxNsLauABf1zdYnGsz.Nyj1p4wXMWDLXgWqiP.'),
(18, 'Ayn', '03715904', '$2a$04$MVCg.oNx9vFORsxNbIq8v.lHSCHMOIO1WPVTyjOu9L4b0c85lwguu'),
(19, 'Aveline', '70318876', '$2a$04$qR5XEmzuRyoAesqEqTaGEePVN0kImVmJBCeBILMb8PkrxyjRmcMmq'),
(20, 'Toby', '71394690', '$2a$04$dY54PjKGqfWlx/pYe59MC.BI/gd.FeOyhTAN4WvcgTqE2qgS/3BYu'),
(24, 'wassim', '70276067', '$2y$10$LIvYQYFkrLHsMFCSjmNJP.bxgQ1t1CtUtEE8ihteIIObTzbJarSV.');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_info`
--

CREATE TABLE `vehicle_info` (
  `driver_id` int(11) NOT NULL,
  `vehicle_type` varchar(100) NOT NULL,
  `vehicle_make` varchar(100) NOT NULL DEFAULT 'none',
  `year` year(4) NOT NULL,
  `license_plate` varchar(100) NOT NULL,
  `rating` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_info`
--

INSERT INTO `vehicle_info` (`driver_id`, `vehicle_type`, `vehicle_make`, `year`, `license_plate`, `rating`) VALUES
(1, 'sedan', 'Ford', '2016', 'S787689', 0.00),
(2, 'hatchback', 'Mercedes-Benz', '2008', 'B079262', 0.00),
(3, 'jeep', 'Mitsubishi', '2020', 'B385096', 0.00),
(4, 'sedan', 'Lincoln', '2016', 'B468948', 0.00),
(5, 'sedan', 'Mazda', '2015', 'S961054', 0.00),
(6, 'sedan', 'Ford', '2015', 'O115798', 0.00),
(7, 'sedan', 'Cadillac', '2018', 'N536433', 0.00),
(8, 'hatchback', 'Mercedes-Benz', '2020', 'S703806', 0.00),
(9, 'sedan', 'Toyota', '2016', 'B297335', 0.00),
(10, 'sedan', 'Mitsubishi', '2016', 'B612859', 0.00),
(11, 'Sedan', 'kia', '2018', 'S215410', 0.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk-driver` (`driver_id`),
  ADD UNIQUE KEY `fk-ride` (`ride_id`);

--
-- Indexes for table `rides`
--
ALTER TABLE `rides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-users` (`user_id`) USING BTREE,
  ADD KEY `fk-drivers` (`driver_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  ADD UNIQUE KEY `driver_id` (`driver_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rides`
--
ALTER TABLE `rides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`ride_id`) REFERENCES `rides` (`id`);

--
-- Constraints for table `rides`
--
ALTER TABLE `rides`
  ADD CONSTRAINT `rides_ibfk_2` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`),
  ADD CONSTRAINT `rides_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  ADD CONSTRAINT `vehicle_info_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
