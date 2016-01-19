-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Client: 127.8.5.2:3306
-- Généré le: Ven 15 Janvier 2016 à 16:10
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Contenu de la table `movie`
--

INSERT INTO `movie` (`mov_id`, `mov_title`, `mov_description_short`, `mov_description_long`, `mov_director`, `mov_year`, `mov_image`) VALUES
(1, 'Le Transporteur 1', 'Le Transporteur est un film franco-américain réalisé par Louis Leterrier et Corey Yuen, sorti en 2002. ', 'Pour les livraisons à haut risque, Frank est toujours là. Dans sa partie, il est le meilleur. Comme les autres, il obéit aux trois règles d''or: ne poser aucune question, ne pas ouvrir les colis et ne pas enfreindre les deux premières au risque d''y trouver la mort. Pourtant, cette fois-ci Frank a ouvert le sac posé dans son coffre et a découvert une jeune femme, Lai. pas question de fermer les yeux cette fois: Frank décide d''aider son colis.', 'Louis Leterrier, Corey Yuen', 2002, 'images/transporteur.jpg'),
(2, 'Le Transporteur 2', 'Le Transporteur 2 est un film franco-américain réalisé par Louis Leterrier, sorti en 2005.', 'À Miami, Frank s\\''occupe de conduire le petit Jack Billing à l\\''école pendant un mois pour dépanner ses parents. Mais son père, riche politicien, est fortement impliqué dans la lutte anti-drogue et n\\''a pas que des amis. Un mercenaire à la solde du cartel colombien va inoculer au jeune enfant un virus mortel et terriblement contagieux. Frank a fait la promesse à l\\''enfant de ne jamais laisser personne lui faire du mal et il entend bien tenir cette promesse.', 'Louis Leterrier', 2005, 'images/Le-Transporteur-2-1.jpeg'),
(3, 'Le Transporteur 3', 'Le Transporteur 3 est un film franco-américano-britannique réalisé par Olivier Megaton, sorti en 2008. ', 'Sous la contrainte d\\''un bracelet explosif est fixé à son poignet, Frank Martin, un convoyeur réputé, doit transporter deux sacs et accompagner une jeune Ukrainienne de Marseille à Odessa. Si Frank ignore tout de l’identité de la fille et du contenu des sacs, il est certain d’être impliqué dans un voyage à haut risque dont il va petit à petit découvrir les enjeux…', 'Olivier Megaton', 2008, 'images/Le_transporteur_3_grande-2.jpg'),
(4, 'We Are Your Friends ', 'We Are Your Friends est un film américain, réalisé par Max Joseph, sorti en 2015.', 'Cole, un DJ de 23 ans vit dans le milieu de l’électro et des nuits californiennes. La journée, il traîne avec ses amis d’enfance. La nuit il mixe, dans l’espoir de composer le son qui fera danser le monde entier. Son rêve semble alors possible lorsqu’il fait la connaissance de James, un DJ expérimenté, qui décide de le prendre sous son aile… ', 'Max Joseph', 2015, 'images/We are your friends.jpg'),
(5, 'Le Cinquième Élément', 'Le Cinquième Élément est un film français de science-fiction réalisé par Luc Besson, sorti en 1997.', 'Au XXIII siècle, dans un univers étrange et coloré, où tout espoir de survie est impossible sans la découverte du cinquième élément, un héros affronte le mal pour sauver l''humanité.', 'Luc Besson', 1997, 'images/Le Cinquième Élément.jpg'),
(6, 'Pulp Fiction', 'Pulp Fiction est un film de gangsters américain réalisé par Quentin Tarantino et sorti en 1994.', 'L''odyssée sanglante, burlesque et cocasse de petits malfrats dans la jungle de Hollywood à travers trois histoires qui s''entremêlent.', 'Quentin Tarantino', 1994, 'images/Pulp Fiction.jpg'),
(7, 'The Rocky Horror Picture Show', 'The Rocky Horror Picture Show est un film musical américain de Jim Sharman, sorti en 1975', 'Une nuit d''orage, la voiture de Janet et Brad, un couple coincé qui vient de se fiancer, tombe en panne. Obligés de se réfugier dans un mystérieux château, ils vont faire la rencontre de ses occupants pour le moins bizarres, qui se livrent à de bien étranges expériences. ', 'Jim Sharman', 1975, 'images/The Rocky Horror Picture Show.jpg'),
(8, 'Maman j''ai raté l''avion', 'Maman, j''ai raté l''avion est une comédie familiale américaine réalisée par Chris Columbus, sortie en 1990.', 'La famille McCallister a decidé de passer les fêtes de Noel à Paris. Seulement Kate et Peter McCallister s''aperçoivent dans l''avion qu''il leur manque le plus jeune de leurs enfants, Kevin, âgé de 9 ans. D''abord désespéré, Kevin reprend vite les choses en main et s''organise pour vivre le mieux possible. Quand deux cambrioleurs choisissent sa maison pour commettre leurs méfaits. ', 'Chris Columbus', 1990, 'images/Maman j''ai raté l''avion.jpg'),
(9, 'Maman, j''ai encore raté l''avion ', 'Maman, j''ai encore raté l''avion est une comédie familiale américaine réalisée par Chris Columbus, sortie en 1992.', 'Après Paris, c''est à Miami que la tribu McCallister décide de passer les fêtes de Noël. A l''aube du jour J, toute la famille est sur le pied de guerre et file a l''aéroport en prenant bien garde de ne pas oublier Kevin. Mais celui-ci s''éclipse pour acheter des piles pour son walkman, il ne retrouve plus les siens et s''embarque par mégarde pour New York... ', 'Chris Columbus', 1992, 'images/Maman, j''ai encore raté l''avion.jpg'),
(10, 'Un amour de sorcière', 'Un amour de sorcière est un film français réalisé par René Manozr, sorti en 1997.', 'Morgane, fort jolie sorcière facétieuse, s''est prise de passion pour un naïf inventeur américain, Michael. A peine arrive en France, Michael est envouté par Morgane. Il va être pris en otage dans la lutte sans merci que se mènent les sorciers du bien et les sorciers du mal. ', 'René Manozr', 1997, 'images/Un amour de sorcière.jpeg'),
(11, 'Profession profiler ', 'Profession profiler est un film américain réalisé par Renny Harlin, sorti en 2004.', 'Afin de valider leurs acquis, sept jeunes profilers sont envoyés par leur instructeur sur une île pour y simuler une véritable enquête. Seulement, un véritable tueur se cache sur l''île en question, et le simulacre d''enquête tourne très vite au massacre', 'Renny Harlin', 2004, 'images/Profession profiler.jpg'),
(12, 'Conjuring : Les Dossiers Warren', 'Conjuring : Les Dossiers Warren est un film d''horreur américain réalisé par James Wan, sorti en 2013.', 'Conjuring : Les dossiers Warren, raconte l''histoire horrible, mais vraie, d''Ed et Lorraine Warren, enquêteurs paranormaux réputés dans le monde entier, venus en aide à une famille terrorisée par une présence inquiétante dans leur ferme isolée… Contraints d''affronter une créature démoniaque d''une force redoutable, les Warren se retrouvent face à l''affaire la plus terrifiante de leur carrière…', 'James Wan', 2013, 'images/Conjuring  Les Dossiers Warren.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
