-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Client: 127.8.5.2:3306
-- Généré le: Ven 15 Janvier 2016 à 07:40
-- Version du serveur: 5.5.45
-- Version de PHP: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `mymovies`
--

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text COLLATE utf8_unicode_ci NOT NULL,
  `pass_md5` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id`, `login`, `pass_md5`) VALUES
(1, 'julien', '12'),
(2, 'jb', '55');

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `mov_id` int(11) NOT NULL AUTO_INCREMENT,
  `mov_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mov_description_short` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `mov_description_long` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `mov_director` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `mov_year` int(11) NOT NULL,
  `mov_image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`mov_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `movie`
--

INSERT INTO `movie` (`mov_id`, `mov_title`, `mov_description_short`, `mov_description_long`, `mov_director`, `mov_year`, `mov_image`) VALUES
(1, 'Le Transporteur 1', 'Le Transporteur est un film franco-américain réalisé par Louis Leterrier et Corey Yuen, sorti en 2002. ', 'Pour les livraisons à haut risque, Frank est toujours là. Dans sa partie, il est le meilleur. Comme les autres, il obéit aux trois règles d''or: ne poser aucune question, ne pas ouvrir les colis et ne pas enfreindre les deux premières au risque d''y trouver la mort. Pourtant, cette fois-ci Frank a ouvert le sac posé dans son coffre et a découvert une jeune femme, Lai. pas question de fermer les yeux cette fois: Frank décide d''aider son colis.', 'Louis Leterrier, Corey Yuen', 2002, 'images/transporteur.jpg'),
(2, 'Le Transporteur 2', 'Le Transporteur 2 est un film franco-américain réalisé par Louis Leterrier, sorti en 2005.', 'À Miami, Frank s\\''occupe de conduire le petit Jack Billing à l\\''école pendant un mois pour dépanner ses parents. Mais son père, riche politicien, est fortement impliqué dans la lutte anti-drogue et n\\''a pas que des amis. Un mercenaire à la solde du cartel colombien va inoculer au jeune enfant un virus mortel et terriblement contagieux. Frank a fait la promesse à l\\''enfant de ne jamais laisser personne lui faire du mal et il entend bien tenir cette promesse.', 'Louis Leterrier', 2005, 'images/Le-Transporteur-2-1.jpeg'),
(3, 'Le Transporteur 3', 'Le Transporteur 3 est un film franco-américano-britannique réalisé par Olivier Megaton, sorti en 2008. ', 'Sous la contrainte d\\''un bracelet explosif est fixé à son poignet, Frank Martin, un convoyeur réputé, doit transporter deux sacs et accompagner une jeune Ukrainienne de Marseille à Odessa. Si Frank ignore tout de l’identité de la fille et du contenu des sacs, il est certain d’être impliqué dans un voyage à haut risque dont il va petit à petit découvrir les enjeux…', 'Olivier Megaton', 2008, 'images/Le_transporteur_3_grande-2.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
