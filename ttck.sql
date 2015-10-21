-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 13 Avril 2015 à 20:50
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ttck`
--
CREATE DATABASE IF NOT EXISTS `ttck` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ttck`;

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE IF NOT EXISTS `actualite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uploadeur` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `cheminphoto` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `texte` varchar(10000) NOT NULL,
  `photo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `actualite`
--

INSERT INTO `actualite` (`id`, `uploadeur`, `titre`, `cheminphoto`, `date`, `texte`, `photo`) VALUES
(1, 2, 'TITRE', 'tEmsxBGXW5AkhRV.jpg', 1428936430, ' - ', 1),
(9, 2, 'Renseignement: Valls balaie les &quot;fantasmes&quot; et des &quot;critiques absurdes&quot;', '9hJf3wIWikMdqPa.jpg', 1428945763, 'Le Premier ministre a d&eacute;fendu en personne le texte du proje4t de loi sur le renseignement, &agrave; l''Assembl&eacute;e nationale, lundi &agrave; l''ouverture de son examen par les d&eacute;put&eacute;s. Manuel Valls a insist&eacute; sur le fait que le texte n''avait pas &eacute;t&eacute; pr&eacute;par&eacute; en urgence et a r&eacute;affirm&eacute; qu''il s''agissait d''une avanc&eacute;e &quot;d&eacute;mocratique&quot; et en rien d''un texte &quot;liberticide&quot;.\r\n\r\nD&eacute;nonc&eacute; par des associations comme un texte liberticide et objet de r&eacute;ticences dans la sph&egrave;re politique, le projet de loi destin&eacute; &agrave; renforcer les pouvoirs des services de renseignement sur Internet est arriv&eacute; lundi en d&eacute;bat &agrave; l''Assembl&eacute;e nationale.\r\n\r\nSigne de l''importance que lui accorde l''ex&eacute;cutif, apr&egrave;s les attentats meurtriers de janvier dernier, c''est Manuel Valls lui-m&ecirc;me qui a pr&eacute;sent&eacute; le projet, lundi apr&egrave;s-midi dans l''h&eacute;micycle. &quot;D&eacute;sormais toute op&eacute;ration de surveillance r&eacute;galienne, men&eacute;e en n''importe quel point du territoire national dans le cadre d''une mission de renseignent, fera l''objet d''une autorisation hi&eacute;rarchique ext&eacute;rieure aux services et d''un contr&ocirc;le approfondi par une autorit&eacute; ind&eacute;pendante&quot;, a-t-il r&eacute;sum&eacute;.', 1),
(11, 2, 'zd', '', 1428946582, 'zd', 0);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(55) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=234 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `pseudo`, `message`, `date`) VALUES
(1, 'Admin', 'Bienvenue admin', 25),
(2, 'System', 'Merci de votre visite', 2),
(22, 'rzu59210', 'fdfsfds', 1427228990),
(23, 'rzu59210', 'Bonsoir', 1427229007),
(24, 'rzu59210', 'Bonsoir', 1427229156),
(25, 'rzu59210', '', 1427230825),
(26, 'rzu59210', '', 1427230831),
(27, 'rzu59210', 'Je suis un beau goss', 1427230882),
(28, 'rzu59210', 'Je suis un beau goss 1', 1427230975),
(29, 'rzu59210', 'Je suis un beau goss 2\n', 1427231011),
(30, 'rzu59210', 'Je suis un beau goss 3\n\n', 1427231097),
(31, 'rzu59210', 'allo ?\n\n', 1427231262),
(32, 'rzu59210', 'Je suis ici\n', 1427231363),
(33, 'rzu59210', 'Je suis ici\n', 1427231432),
(34, 'rzu59210', 'Moi je t''aile\n', 1427231614),
(35, 'rzu59210', 'allo ?\n\n', 1427231635),
(36, 'rzu59210', 'allo ?\n\n', 1427231641),
(37, 'rzu59210', 'allo ?\n\n', 1427231715),
(38, 'rzu59210', 'Coucou', 1427231804),
(39, 'rzu59210', 'Coucou\n\n', 1427231842),
(40, 'rzu59210', 'Salut\n', 1427283070),
(41, 'Admin', 'dfdsf dsfsdff\n', 1427283171),
(42, 'Admin', 'dfdsf dsfsdff\n', 1427283499),
(43, 'Admin', 'sdsqdqs', 1427284792),
(44, 'rzu59210', 'fsdfdsfs', 1427297419),
(45, 'rzu59210', 'fgdfg', 1427297444),
(46, 'rzu59210', 'Dieu is belong us\n', 1427297537),
(47, 'rzu59210', 'Dieu is belong us 2 \n', 1427297598),
(48, 'rzu59210', 'Coucou', 1427297851),
(49, 'rzu59210', 'yo\n', 1427298079),
(50, 'Admin', 'Coucou\n', 1427298131),
(51, 'rzu59210', 'Sa va ?', 1427298145),
(52, 'Admin', 'Niquel et toi ?\n', 1427298155),
(53, 'rzu59210', 'Prout', 1427298165),
(54, 'Admin', 'fdcdsfsqf', 1427298173),
(55, 'rzu59210', 'dsfsdqf', 1427298175),
(56, 'rzu59210', 'dsfsqfdsf', 1427298176),
(57, 'Admin', 'dsfdsfsd', 1427298179),
(58, 'rzu59210', 'fdsfsdf', 1427298429),
(59, 'rzu59210', 'pd', 1427298438),
(60, 'rzu59210', 'dsfsf ', 1427298749),
(61, 'rzu59210', 'fdsfsdf', 1427298795),
(62, 'rzu59210', 'erzer', 1427298803),
(63, 'rzu59210', 'sqdqsd', 1427298825),
(64, 'Admin', 'fgdsq fdjgfkdsjgdqjfgjkdfgjdjg  gjqeijg idfjgi fdigffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 1427301183),
(65, 'rzu59210', 'dfgfdgfd ezr', 1427301781),
(66, 'rzu59210', 'ezrezrzre dfdsf', 1427301785),
(67, 'rzu59210', 'ererezr', 1427301789),
(68, 'rzu59210', 'dsfdsfdsds', 1427301790),
(69, 'rzu59210', 'dsfsdfdsfdsf', 1427301793),
(70, 'rzu59210', 'dfdsf', 1427301891),
(71, 'rzu59210', 'dsfsf', 1427301893),
(72, 'rzu59210', 'dsfdsf', 1427301895),
(73, 'rzu59210', 'dfdsf', 1427301897),
(74, 'rzu59210', 'dsfds', 1427301898),
(75, 'rzu59210', 'dsfdsf', 1427301899),
(76, 'rzu59210', 'dfsf', 1427301900),
(77, 'rzu59210', 'dsf', 1427301900),
(78, 'rzu59210', 'dfsdf', 1427301902),
(79, 'rzu59210', 'dsfds', 1427301903),
(80, 'rzu59210', 'd', 1427301904),
(81, 'rzu59210', '', 1427301905),
(82, 'rzu59210', '', 1427301905),
(83, 'rzu59210', '', 1427301905),
(84, 'rzu59210', '', 1427301906),
(85, 'rzu59210', '', 1427301906),
(86, 'rzu59210', '', 1427301906),
(87, 'rzu59210', '', 1427301906),
(88, 'rzu59210', '', 1427301906),
(89, 'rzu59210', '', 1427301906),
(90, 'rzu59210', '', 1427301907),
(91, 'rzu59210', '', 1427301907),
(92, 'rzu59210', 'sdsd', 1427301943),
(93, 'rzu59210', 'sdsd', 1427301946),
(94, 'rzu59210', 's', 1427301949),
(95, 'rzu59210', 'f', 1427301953),
(96, 'rzu59210', 'f', 1427301955),
(97, 'rzu59210', 'f', 1427301958),
(98, 'rzu59210', 'f', 1427301960),
(99, 'rzu59210', 'f', 1427301962),
(100, 'rzu59210', 'f', 1427301965),
(101, 'rzu59210', 'f', 1427301966),
(102, 'rzu59210', 'dfdf', 1427302043),
(103, 'rzu59210', 'd', 1427302046),
(104, 'rzu59210', 'd', 1427302047),
(105, 'rzu59210', 's', 1427302049),
(106, 'rzu59210', 'f', 1427302052),
(107, 'rzu59210', 'd', 1427302054),
(108, 'rzu59210', 'a', 1427302056),
(109, 'rzu59210', 'e', 1427302058),
(110, 'rzu59210', 'f', 1427302060),
(111, 'rzu59210', 'a', 1427302063),
(112, 'rzu59210', 'f', 1427302065),
(113, 'rzu59210', 'dfdf', 1427302170),
(114, 'rzu59210', 'dfs', 1427302196),
(115, 'rzu59210', 'dfdf', 1427302248),
(116, 'rzu59210', 'fdfd', 1427302250),
(117, 'rzu59210', 'dfdf', 1427302252),
(118, 'rzu59210', 'fdfd', 1427302255),
(119, 'rzu59210', 'dsfdsf', 1427302268),
(120, 'rzu59210', 'dsfdsf', 1427302270),
(121, 'rzu59210', 'azaeae', 1427302272),
(122, 'rzu59210', 'zeze', 1427302274),
(123, 'rzu59210', 'ezezaea', 1427302276),
(124, 'rzu59210', 'zaezae', 1427302278),
(125, 'rzu59210', '', 1427302278),
(126, 'rzu59210', 'zaezaedf', 1427302280),
(127, 'rzu59210', 'dfdsf', 1427302282),
(128, 'rzu59210', 'dfsfd', 1427302283),
(129, 'rzu59210', 'dsffd', 1427302285),
(130, 'rzu59210', 'Ã©"Ã©"Ã©&"', 1427302331),
(131, 'rzu59210', '^$Ã¹k"("Ã©''(''"(-', 1427302338),
(132, 'rzu59210', 'dsffdsdf', 1427306632),
(133, 'Admin', 'salut', 1427632397),
(134, 'Admin', '3\n', 1427633236),
(135, 'Admin', '3', 1427633237),
(136, 'Admin', '3', 1427633238),
(137, 'Admin', '3', 1427633239),
(138, 'Admin', '3', 1427633240),
(139, 'Admin', '3', 1427633241),
(140, 'Admin', '3', 1427633242),
(141, 'Admin', '3', 1427633243),
(142, 'Admin', '3', 1427633243),
(143, 'Admin', '3', 1427633244),
(144, 'Admin', '3', 1427633245),
(145, 'Admin', '3', 1427633246),
(146, 'Admin', '', 1427633247),
(147, 'Admin', 'zd', 1427633321),
(148, 'Admin', 'zd', 1427633321),
(149, 'Admin', 'zd', 1427633322),
(150, 'Admin', 'zd', 1427633323),
(151, 'Admin', 'zd', 1427633324),
(152, 'Admin', 'zd', 1427633325),
(153, 'Admin', 'zd', 1427633326),
(154, 'Admin', 'zd', 1427633327),
(155, 'Admin', 'zd', 1427633328),
(156, 'Admin', 'zd', 1427633328),
(157, 'Admin', 'zd', 1427633330),
(158, 'Admin', 'zd', 1427633330),
(159, 'Admin', 'zd', 1427633331),
(160, 'Admin', 'zd', 1427633332),
(161, 'Admin', 'zd', 1427633333),
(162, 'Admin', 'dz', 1427633334),
(163, 'Admin', 'zd', 1427633335),
(164, 'Admin', 'm^Ã¹\n', 1427633407),
(165, 'Admin', 'Ã¹Ã¹Ã¹', 1427633409),
(166, 'Admin', 'lll', 1427633410),
(167, 'Admin', 'lll', 1427633411),
(168, 'Admin', 'llll', 1427633413),
(169, 'Admin', 'lll', 1427633414),
(170, 'Admin', 'lll', 1427633415),
(171, 'Admin', 'lll', 1427633416),
(172, 'Admin', 'lll', 1427633417),
(173, 'Admin', 'lll', 1427633418),
(174, 'Admin', 'lll', 1427633419),
(175, 'Admin', 'lll', 1427633420),
(176, 'Admin', 'zdzd\n\n', 1427633610),
(177, 'Admin', '\n272', 1427633613),
(178, 'Admin', '222', 1427633614),
(179, 'Admin', '222', 1427633615),
(180, 'Admin', '222', 1427633616),
(181, 'Admin', '222', 1427633617),
(182, 'Admin', '222', 1427633618),
(183, 'Admin', '222', 1427633618),
(184, 'Admin', '222', 1427633619),
(185, 'Admin', '222', 1427633620),
(186, 'Admin', '222', 1427633621),
(187, 'Admin', '222', 1427633622),
(188, 'Admin', '22', 1427633623),
(189, 'Admin', '222', 1427633624),
(190, 'Admin', '222', 1427633625),
(191, 'Admin', '222', 1427633626),
(192, 'Admin', '222', 1427633627),
(193, 'Admin', 'zdazdazd', 1427662729),
(194, 'Admin', 'test', 1427662830),
(195, 'Admin', 'j''aime parler', 1427662834),
(196, 'Admin', 'xD', 1427662837),
(197, 'Admin', 'asa', 1427662934),
(198, 'Admin', 'zd', 1427662970),
(199, 'Admin', 'zd', 1427662983),
(200, 'Admin', 'ad', 1427662993),
(201, 'Admin', 'comment ca va?', 1427662998),
(202, 'Admin', 'test', 1427663000),
(203, 'Admin', 'zad', 1427663121),
(204, 'Admin', 'salut', 1427663810),
(205, 'Admin', 'comm', 1427663813),
(206, 'Admin', 'dzd', 1427663813),
(207, 'Admin', 'zd', 1427663814),
(208, 'Admin', 'd', 1427663814),
(209, 'Admin', 'zd', 1427663814),
(210, 'Admin', 'zd', 1427663814),
(211, 'Admin', 'zd', 1427663815),
(212, 'Admin', '', 1427663815),
(213, 'Admin', 'z', 1427663815),
(214, 'Admin', 'dzd', 1427663815),
(215, 'Admin', 'zd', 1427663824),
(216, 'Admin', 'z', 1427663824),
(217, 'Admin', 'zd', 1427663824),
(218, 'Admin', '', 1427663825),
(219, 'Admin', 'ah allal', 1427737292),
(220, 'Admin', 'kzpeza', 1427737293),
(221, 'Admin', 'ezdez', 1427890457),
(222, 'Admin', ':lk;l', 1427890466),
(223, 'Admin', 'l;k,;k;', 1427890468),
(224, 'Admin', 'l,k,jnj', 1427890469),
(225, 'Admin', 'lolol', 1427890470),
(226, 'Admin', 'll;k;k', 1427890472),
(227, 'Admin', 'iki', 1427892738),
(228, 'Admin', '', 1427892754),
(229, 'Admin', '', 1428957709),
(230, 'Admin', 'zd', 1428957713),
(231, 'Admin', 'zd', 1428957883),
(232, 'Admin', 'zd', 1428957911),
(233, 'Admin', 'lol', 1428958113);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uploadeur` int(11) NOT NULL,
  `cheminphoto` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `tournoi` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`id`, `uploadeur`, `cheminphoto`, `titre`, `date`, `tournoi`) VALUES
(19, 2, 'KjXx6gREYSeVshM.jpg', 'ff', 1428498103, 1),
(22, 2, 'J8SvLAP6MD3cZEo.jpg', '', 1428501461, 1),
(28, 2, '9KtuW3yPHcBmF7E.jpg', '', 1428946354, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `age` int(3) NOT NULL,
  `classement` int(10) NOT NULL,
  `Sid` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `mdp`, `ville`, `age`, `classement`, `Sid`, `expiration`, `admin`, `nom`, `prenom`) VALUES
(1, 'rzu59210', '9b6c1a3a1e24e5e9bf8a0cf8eea927b1', '0', 0, 0, '7cef14a8e730bca8afd201f5bd2e14e6', 1427308260, 0, 'ARABRA', 'rachid'),
(2, 'Admin', 'f6fdffe48c908deb0f4c3bd36c032e72', '0', 0, 285, 'bfd4faef7159a92fd4c4c33dee0f0483', 1429044651, 1, 'DUPONT2', 'paulzd'),
(5, 'quetong', 'bec864011f22b0ced27a25440d578a6d', '0', 0, 888, '', 0, 0, 'BOUCHARD', 'gerard'),
(8, 'WALT', 'b180920bed1228086fc48ee9300c091a', 'WALT', 10, 0, '', 0, 0, 'WALT', 'WALT');

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uploadeur` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `video`
--

INSERT INTO `video` (`id`, `uploadeur`, `link`, `titre`, `date`) VALUES
(4, 2, 'https://www.youtube.com/embed/21t-DhakAtc', 'J''SUISPASCONTENT', 1428925113),
(6, 2, 'https://www.youtube.com/embed/SIdzJ1KZBlc', 'PAS CONTENT!', 1428928710),
(7, 2, 'http://www.dailymotion.com/embed/video/x2iz4ox', 'PAS CONTENT!', 1428928844);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
