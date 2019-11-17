-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 17 nov. 2019 à 20:46
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `kaamelottse`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sous_titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci,
  `priorite` int(11) NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `nom_lien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_lien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_creator` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_user_creator_foreign` (`user_creator`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `sous_titre`, `image`, `contenu`, `priorite`, `visible`, `nom_lien`, `adresse_lien`, `user_creator`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Une soirée effroyable', 'Vendredi 29 novembre', NULL, 'Une nuit de pleine lune, un quartier désert, un chien qui hurle au loin … Mais qui peut bien frapper à la porte ?', 2, 1, 'Participer', NULL, 1, NULL, '2019-11-11 09:14:53', '2019-11-11 09:16:42'),
(2, 'La Liste Kaamelot\'Tse', NULL, 'http://kaamelottse/images/affiche.jpg', 'Avec la congrégation des saints chevaliers, vous aurez accès aux banquets avec potion de toute puissance à volonté, fruit du pécher, tournois chevalresques ou danse de la promise !\r\nPartez à la quête du Sainté Graal et vous avez la certitude de fêtes réussies', 50, 1, 'Découvrir La Table ronde', 'http://kaamelottse/tableRonde', 1, NULL, '2019-11-11 09:18:55', '2019-11-11 09:19:00'),
(3, 'Soirée détente', 'Lundi 7 décembre', NULL, 'Les cours se succèdent, les projets avancent... Autant de bonnes raisons de marquer une pause pour prendre le temps d’un moment convivial\r\nNous vous attendons nombreux !', 0, 1, 'Je suis intéressé', NULL, 1, NULL, '2019-11-11 09:19:33', '2019-11-11 09:19:33'),
(4, 'Nouveau canapé à tester', 'jeudi 9 décembre', NULL, 'Lâché seul dans la ville, enfin la belle vie Apéros, soirées, et refaire le monde entre barbares Pour tester le nouveau canapé Portes-ouvertes et pizzas à volonté !', 0, 1, 'Je suis intéressé', NULL, 1, NULL, '2019-11-11 09:19:57', '2019-11-11 09:19:57'),
(5, 'Barathon', NULL, NULL, 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 0, 1, NULL, NULL, 1, NULL, '2019-11-11 09:20:11', '2019-11-11 09:20:17'),
(6, 'Soirée Poker', NULL, NULL, 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 0, 1, 'Plus d\'infos', NULL, 1, NULL, '2019-11-11 09:20:48', '2019-11-11 09:20:48');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
