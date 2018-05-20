-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-05-20 17:56:26
-- 服务器版本： 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediatheque`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `idArticle` int(50) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `datePublication` date NOT NULL,
  `photo` varchar(255) NOT NULL,
  `fraisEmprunt` int(50) NOT NULL,
  `caution` int(50) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`idArticle`, `titre`, `auteur`, `datePublication`, `photo`, `fraisEmprunt`, `caution`, `description`, `type`) VALUES
(0, '', '', '0000-00-00', '', 0, 0, '', ''),
(1, 'Une fille comme elle', 'Marc Levy', '2018-05-18', 'https://static.fnac-static.com/multimedia/Images/FR/NR/c0/85/90/9471424/1507-1/tsp20180413155915/Une-Fille-comme-elle.jpg', 2, 20, '« Quelle distance nous sépare, un océan et deux continents ou huit étages ? — Ne soyez pas blessant, vous croyez qu’une fille comme moi… — Je n’ai jamais rencontré une femme comme vous. — Vous disiez me connaître à peine. — Il y a tellement de gens qui se ratent pour de mauvaises raisons. Quel risque y a-t-il à voler un peu de bonheur ? » New York, sur la 5e Avenue, s’élève un petit immeuble pas tout à fait comme les autres… Ses habitants sont très attachés à leur liftier, Deepak, chargé de faire fonctionner l’ascenseur mécanique, une véritable antiquité. Mais la vie de la joyeuse communauté se trouve chamboulée lorsque son collègue de nuit tombe dans l’escalier. Quand Sanji, le mystérieux neveu de Deepak, débarque en sauveur et endosse le costume de liftier, personne ne peut imaginer qu’il est à la tête d’une immense fortune à Bombay… Et encore moins Chloé, l’habitante du dernier étage. Entrez au N°12, Cinquième Avenue, traversez le hall, montez à bord de son antique ascenseur et demandez au liftier de vous embarquer… dans la plus délicieuse des comédies new-yorkaises !', 'livre'),
(2, 'Le Seigneur des Anneaux', 'Peter Jackson', '2011-06-11', 'https://static.fnac-static.com/multimedia/Images/FR/NR/e2/23/32/3285986/1540-1/tsp20171101234009/Le-Seigneur-des-Anneaux-Coffret-de-la-Trilogie-Edition-Fnac-Version-Longue-Blu-Ray.jpg', 2, 20, 'Douze heures de spectacle, de romance, d\'humour, d\'effroi et de batailles homériques pour la plus belle des sagas d\'Heroic Fantasy jamais portées à l\'écran.Inclus : La masterclass de Peter Jackson.', 'livre');

-- --------------------------------------------------------

--
-- 表的结构 `emprunt`
--

CREATE TABLE `emprunt` (
  `idEmprunt` int(50) NOT NULL,
  `idUtilisateur` int(50) NOT NULL,
  `idExemplaire` int(50) NOT NULL,
  `dateEmprunt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `exemplaire`
--

CREATE TABLE `exemplaire` (
  `idExemplaire` int(50) NOT NULL,
  `idArticle` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `exemplaire`
--

INSERT INTO `exemplaire` (`idExemplaire`, `idArticle`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2);

-- --------------------------------------------------------

--
-- 表的结构 `personne`
--

CREATE TABLE `personne` (
  `idPersonne` int(50) NOT NULL,
  `mdp` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `estValide` tinyint(1) NOT NULL,
  `type` varchar(50) NOT NULL,
  `caution` int(50) NOT NULL,
  `finance` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `personne`
--

INSERT INTO `personne` (`idPersonne`, `mdp`, `email`, `prenom`, `nom`, `estValide`, `type`, `caution`, `finance`) VALUES
(1, 123456, 'shuangyi2015@gmail.com', 'Shuangyi', 'ZHAO', 1, 'gestionnaire', 20, 100),
(2, 123456, 'zhang.juexiao@gmail.com', 'Juexiao', 'ZHANG', 1, 'utilisateur', 20, 100);

-- --------------------------------------------------------

--
-- 表的结构 `reservation`
--

CREATE TABLE `reservation` (
  `idReservation` int(50) NOT NULL,
  `dateReservation` date NOT NULL,
  `idUtilisateur` int(50) NOT NULL,
  `idExemplaire` int(50) NOT NULL,
  `disponible` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArticle`) USING BTREE;

--
-- Indexes for table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD PRIMARY KEY (`idExemplaire`),
  ADD KEY `cleArticle` (`idArticle`);

--
-- Indexes for table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`idPersonne`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idReservation`),
  ADD KEY `cleExemplaire` (`idExemplaire`),
  ADD KEY `clePersonne` (`idUtilisateur`);

--
-- 限制导出的表
--

--
-- 限制表 `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD CONSTRAINT `cleArticle` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`);

--
-- 限制表 `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `cleExemplaire` FOREIGN KEY (`idExemplaire`) REFERENCES `exemplaire` (`idExemplaire`),
  ADD CONSTRAINT `clePersonne` FOREIGN KEY (`idUtilisateur`) REFERENCES `personne` (`idPersonne`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
