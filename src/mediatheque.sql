-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 22 mai 2018 à 23:39
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mediatheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
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
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idArticle`, `titre`, `auteur`, `datePublication`, `photo`, `fraisEmprunt`, `caution`, `description`, `type`) VALUES
(1, 'Une fille comme elle', 'Marc Levy', '2018-05-18', 'https://static.fnac-static.com/multimedia/Images/FR/NR/c0/85/90/9471424/1507-1/tsp20180413155915/Une-Fille-comme-elle.jpg', 2, 20, '« Quelle distance nous sépare, un océan et deux continents ou huit étages ? — Ne soyez pas blessant, vous croyez qu’une fille comme moi… — Je n’ai jamais rencontré une femme comme vous. — Vous disiez me connaître à peine. — Il y a tellement de gens qui se ratent pour de mauvaises raisons. Quel risque y a-t-il à voler un peu de bonheur ? » New York, sur la 5e Avenue, s’élève un petit immeuble pas tout à fait comme les autres… Ses habitants sont très attachés à leur liftier, Deepak, chargé de faire fonctionner l’ascenseur mécanique, une véritable antiquité. Mais la vie de la joyeuse communauté se trouve chamboulée lorsque son collègue de nuit tombe dans l’escalier. Quand Sanji, le mystérieux neveu de Deepak, débarque en sauveur et endosse le costume de liftier, personne ne peut imaginer qu’il est à la tête d’une immense fortune à Bombay… Et encore moins Chloé, l’habitante du dernier étage. Entrez au N°12, Cinquième Avenue, traversez le hall, montez à bord de son antique ascenseur et demandez au liftier de vous embarquer… dans la plus délicieuse des comédies new-yorkaises !', 'livre'),
(2, 'Le Seigneur des Anneaux', 'Peter Jackson', '2011-06-11', 'https://static.fnac-static.com/multimedia/Images/FR/NR/e2/23/32/3285986/1540-1/tsp20171101234009/Le-Seigneur-des-Anneaux-Coffret-de-la-Trilogie-Edition-Fnac-Version-Longue-Blu-Ray.jpg', 3, 20, 'Douze heures de spectacle, de romance, d\'humour, d\'effroi et de batailles homériques pour la plus belle des sagas d\'Heroic Fantasy jamais portées à l\'écran.Inclus : La masterclass de Peter Jackson.', 'livre'),
(3, 'titretest1', 'auteurtest1', '2018-05-01', 'https://static.fnac-static.com/multimedia/Images/FR/NR/df/57/90/9459679/1507-1/tsp20180222082724/Le-manuscrit-inacheve.jpg', 2, 20, 'Un manuscrit sans fin, une enquête sans corps, une défunte sans visage...\r\nAux alentours de Grenoble, un jeune a fini sa trajectoire dans un ravin après une course-poursuite avec la douane. Dans son coffre, le corps d\'une femme, les orbites vides, les mains coupées et rassemblées dans un sac. À la station-service où a été vue la voiture pour la dernière fois, la vidéosurveillance est claire : l\'homme qui conduisait n\'était pas le propriétaire du véhicule et encore moins le coupable.\r\n\r\nLéane Morgan et Enaël Miraure sont une seule et même personne. L\'institutrice reconvertie en reine du thriller a toujours tenu sa vie privée secrète. En pleine promo pour son nouveau roman dans un café parisien, elle résiste à la pression d\'un journaliste : elle ne donnera pas à ce vautour ce qu\'il attend, à savoir un papier sur un auteur à succès subissant dans sa vie l\'horreur racontée dans ses livres. Car sa vie, c\'est un mariage dont il ne reste rien sauf un lieu, L\'inspirante, villa posée au bord des dunes de la Côte d\'Opale où est resté son mari depuis la disparition de leur fille. Mais un appel lui annonçant son hospitalisation à la suite d\'une agression va faire resurgir le pire des quatre dernières années écoulées. Il a perdu la mémoire. Elle est seule.\r\nDans le vent, le sable et le brouillard, une question se posera : faut-il faire de cette vie-là un manuscrit inachevé, et en commencer un autre ?', 'livre'),
(4, 'aa', 'vv', '2018-05-01', 'https://static.fnac-static.com/multimedia/Images/FR/NR/df/57/90/9459679/1507-1/tsp20180222082724/Le-manuscrit-inacheve.jpg', 2, 20, 'Un manuscrit sans fin, une enquÃªte sans corps, une dÃ©funte sans visage...\r\nAux alentours de Grenoble, un jeune a fini sa trajectoire dans un ravin aprÃ¨s une course-poursuite avec la douane. Dans son coffre, le corps d\'une femme, les orbites vides, les mains coupÃ©es et rassemblÃ©es dans un sac. Ã€ la station-service oÃ¹ a Ã©tÃ© vue la voiture pour la derniÃ¨re fois, la vidÃ©osurveillance est claire : l\'homme qui conduisait n\'Ã©tait pas le propriÃ©taire du vÃ©hicule et encore moins le coupable.\r\n\r\nLÃ©ane Morgan et EnaÃ«l Miraure sont une seule et mÃªme personne. L\'institutrice reconvertie en reine du thriller a toujours tenu sa vie privÃ©e secrÃ¨te. En pleine promo pour son nouveau roman dans un cafÃ© parisien, elle rÃ©siste Ã  la pression d\'un journaliste : elle ne donnera pas Ã  ce vautour ce qu\'il attend, Ã  savoir un papier sur un auteur Ã  succÃ¨s subissant dans sa vie l\'horreur racontÃ©e dans ses livres. Car sa vie, c\'est un mariage dont il ne reste rien sauf un lieu, L\'inspirante, villa posÃ©e au bord des dunes de la CÃ´te d\'Opale oÃ¹ est restÃ© son mari depuis la disparition de leur fille. Mais un appel lui annonÃ§ant son hospitalisation Ã  la suite d\'une agression va faire resurgir le pire des quatre derniÃ¨res annÃ©es Ã©coulÃ©es. Il a perdu la mÃ©moire. Elle est seule.\r\nDans le vent, le sable et le brouillard, une question se posera : faut-il faire de cette vie-lÃ  un manuscrit inachevÃ©, et en commencer un autre ?', 'livre');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `idEmprunt` int(50) NOT NULL,
  `idUtilisateur` int(50) NOT NULL,
  `idExemplaire` int(50) NOT NULL,
  `dateEmprunt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`idEmprunt`, `idUtilisateur`, `idExemplaire`, `dateEmprunt`) VALUES
(1, 2, 1, '2018-05-22'),
(2, 4, 4, '2018-05-01'),
(3, 3, 2, '2018-05-14'),
(4, 1, 11, '2018-05-22'),
(5, 2, 9, '2018-05-22'),
(6, 2, 14, '2018-05-22'),
(7, 2, 15, '2018-05-22'),
(8, 2, 16, '2018-05-22'),
(9, 2, 19, '2018-05-22'),
(10, 2, 3, '2018-05-22'),
(11, 2, 10, '2018-05-22'),
(12, 22, 22, '2018-05-22'),
(13, 2, 18, '2018-05-22');

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire`
--

CREATE TABLE `exemplaire` (
  `idExemplaire` int(50) NOT NULL,
  `idArticle` int(50) NOT NULL,
  `empDispo` tinyint(1) NOT NULL DEFAULT '1',
  `dansListRsv` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `exemplaire`
--

INSERT INTO `exemplaire` (`idExemplaire`, `idArticle`, `empDispo`, `dansListRsv`) VALUES
(1, 1, 0, 0),
(2, 1, 0, 0),
(3, 2, 0, 0),
(4, 2, 0, 0),
(9, 1, 0, 1),
(10, 2, 0, 1),
(14, 1, 0, 1),
(15, 1, 0, 0),
(16, 1, 0, 0),
(17, 1, 0, 0),
(18, 1, 0, 0),
(19, 1, 0, 0),
(20, 1, 1, 0),
(21, 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `idPersonne` int(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `estValide` tinyint(1) NOT NULL,
  `type` varchar(50) NOT NULL,
  `caution` int(50) NOT NULL,
  `finance` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`idPersonne`, `mdp`, `email`, `prenom`, `nom`, `estValide`, `type`, `caution`, `finance`) VALUES
(1, '123456', 'shuangyi2015@gmail.com', 'Shuangyi', 'ZHAO', 1, 'gestionnaire', 20, 100),
(2, '123456', 'zhang.juexiao@gmail.com', 'Juexiao', 'ZHANG', 1, 'utilisateur', 20, 40),
(3, '123456', 'aaaa@bb.com', 'aaprenom', 'bbnom', 0, 'utilisateur', 0, 0),
(4, 'abc', 'aaaa@p.com', 'pre', 'n', 0, 'utilisateur', 0, 0),
(5, 'abcd', 'hehe@hah.fr', 'pretest', 'heihei', 0, 'utilisateur', 0, 0),
(6, '1234', 'bb@g.com', 'oo', 'aaa', 0, 'utilisateur', 0, 0),
(7, '123456', 'email', 'prenom7', 'test7', 0, 'utilisateur', 0, 0),
(8, '123456', 'kzla', 'oo', 'haha', 0, 'utilisateur', 0, 0),
(9, '123456', 'aaa@oo.com', 'dnzakj', 'dnajkd', 0, 'utilisateur', 0, 0),
(10, '123456', 'dnajk@aa.com', 'nb', 'aaa', 0, 'utilisateur', 0, 0),
(11, '123456', 'aaa@bb.com', 'nicks', 'ndjkf', 0, 'utilisateur', 0, 0),
(12, '123456', 'aaa@aa.com', 'dank', 'd na', 0, 'utilisateur', 0, 0),
(13, '123456', 'aa@gg.com', 'bbb', 'aaa', 1, 'utilisateur', 0, 0),
(14, '123456', 'test14@tt.com', 'prenom14', 'test14', 1, 'utilisateur', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idReservation` int(50) NOT NULL,
  `dateReservation` date NOT NULL,
  `idUtilisateur` int(50) NOT NULL,
  `idArticle` int(50) NOT NULL,
  `disponible` tinyint(1) NOT NULL DEFAULT '0',
  `nbExDisponible` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idReservation`, `dateReservation`, `idUtilisateur`, `idArticle`, `disponible`, `nbExDisponible`) VALUES
(2, '2018-05-07', 2, 1, 1, 1),
(3, '2018-05-02', 4, 1, 1, 1),
(4, '2018-05-22', 2, 3, 0, 0),
(5, '2018-05-22', 2, 4, 0, 0),
(6, '2018-05-22', 2, 6, 0, 0),
(7, '2018-05-22', 2, 2, 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArticle`) USING BTREE;

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`idEmprunt`),
  ADD UNIQUE KEY `idEmprunt` (`idEmprunt`);

--
-- Index pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD PRIMARY KEY (`idExemplaire`),
  ADD KEY `cleArticle` (`idArticle`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`idPersonne`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `idPersonne` (`idPersonne`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idReservation`),
  ADD KEY `clePersonne` (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `idArticle` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `idEmprunt` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  MODIFY `idExemplaire` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `idPersonne` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD CONSTRAINT `cleArticle` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `clePersonne` FOREIGN KEY (`idUtilisateur`) REFERENCES `personne` (`idPersonne`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
