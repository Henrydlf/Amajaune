-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 05 mai 2019 à 21:49
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `amajaune`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(255) COLLATE utf16_bin NOT NULL,
  `Categorie` varchar(255) COLLATE utf16_bin NOT NULL,
  `Prix` float NOT NULL,
  `Image` text COLLATE utf16_bin NOT NULL,
  `Nb_achat` int(11) NOT NULL,
  `Description` text COLLATE utf16_bin NOT NULL,
  `Sexe` varchar(255) COLLATE utf16_bin NOT NULL,
  `Couleur` varchar(255) COLLATE utf16_bin NOT NULL,
  `Taille` varchar(255) COLLATE utf16_bin NOT NULL,
  `Vendeur` varchar(255) COLLATE utf16_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`ID`, `Nom`, `Categorie`, `Prix`, `Image`, `Nb_achat`, `Description`, `Sexe`, `Couleur`, `Taille`, `Vendeur`) VALUES
(1001, 'Jean', 'vetements', 39.5, '9b89041613cb10215a51491b50833b77.jpg', 0, 'Jean classique bleu', 'Homme', 'Bleu', 'L', ''),
(1001, 'T-Shirt', 'vetements', 20.9, '61stebXBrKL._UX679_.jpg', 0, 'T-shirt blanc classique', 'Homme', 'Blanc', 'XS', ''),
(1001, 'Johny', 'musique', 15.9, '4387175-pochette-de-l-album-posthume-de-johnny-h-950x0-3.jpg', 0, 'Album de johny halliday', '', '', '', ''),
(1001, 'Balle de ping pong', 'sports et loisirs', 1.9, 'cornilleau-6-balles-pro-blanches.jpg', 0, 'Balle de ping pong Cornilleau', '', '', '', ''),
(1001, 'Drake-Scorpion', 'musique', 20.9, 'Drake-Scorpion-720x720.jpg', 0, 'Album Scorpion Drake', '', '', '', ''),
(1001, 'Polo', 'vetements', 13.9, 'lfv11385-8285-shift-polo-rouge_1.jpg', 0, 'Polo rouge homme', 'Homme', 'Rouge', 'L', ''),
(1001, 'Chaussettes de noÃªl', 'vetements', 5.9, 'lot-de-4-paires-de-chaussettes-noel-femme.jpg', 0, 'Chaussettes de noÃªl avec motifs', 'Enfant', 'Rouge', 'S', ''),
(1001, 'Ballon football', 'sports et loisirs', 19.99, 'SC3147_3WG_FA.jpg', 0, 'Ballon de foot nike blanc et noir', '', '', '', ''),
(1001, 'Asterix le Gaulois', 'livres', 11.5, 'ag.jpg', 0, 'Premier volet de la sÃ©rie AstÃ©rix', '', '', '', ''),
(1001, 'Asterix et Cleopatre', 'livres', 13.5, 'ac.jpg', 0, 'Les aventures des gaulois en Egypte', '', '', '', ''),
(1001, 'Booba Trone', 'musique', 20.5, 'bt.jpg', 0, 'Dernier album de Booba', '', '', '', ''),
(1001, 'Harry Potter 1', 'livres', 15.9, 'hp.jpg', 0, 'Premier harry potter de la celebre saga', '', '', '', ''),
(1001, 'Album Mickael Jackson', 'musique', 13.2, 'mj.jpg', 0, 'Album du roi de la pop', '', '', '', ''),
(1001, 'Tintin en Amerique', 'livres', 11.5, 'tt.jpg', 0, 'Les aventures de tintin en amerique ', '', '', '', ''),
(1001, 'Tintin et le temple du soleil', 'livres', 14, 'ts.jpg', 0, 'Tintin fait des grandes decouvertes dans le temple du soleil', '', '', '', ''),
(1001, 'Ballon de rugby', 'sports et loisirs', 16.5, 'x1004r_3.jpg', 0, 'Ballon de rugby equipe de France', '', '', '', ''),
(1001, 'Raquette de ping pong', 'sports et loisirs', 10, 'pp.jpg', 0, 'Raquette de ping pong de qualite superieur', '', '', '', ''),
(1001, 'Tintin en Amerique', 'livres', 15.9, 'tt.jpg', 0, 'azertyuiop', '', '', '', 'Bat'),
(1001, 'Rihanna', 'livres', 2.5, 'mus.jpg', 0, 'qsdfghjklm', '', '', '', 'Bat'),
(1001, 'Rihanna', 'musique', 15.9, 'mus.jpg', 0, 'qsdfghjklm', '', '', '', 'Bat'),
(1001, 'mj', 'livres', 11, 'mj.jpg', 0, 'trtgref', '', '', '', 'Bat');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `Identifiant` varchar(255) COLLATE utf16_bin NOT NULL,
  `Mdp` varchar(255) COLLATE utf16_bin NOT NULL,
  `Nom` varchar(255) COLLATE utf16_bin NOT NULL,
  `Prenom` varchar(255) COLLATE utf16_bin NOT NULL,
  `Mail` varchar(255) COLLATE utf16_bin NOT NULL,
  `Type` varchar(255) COLLATE utf16_bin NOT NULL,
  `num_carte` int(11) NOT NULL,
  `date_exp` int(11) NOT NULL,
  `cvv` int(11) NOT NULL,
  `type_carte` varchar(255) COLLATE utf16_bin NOT NULL,
  `nom_carte` varchar(255) COLLATE utf16_bin NOT NULL,
  `photo` varchar(255) COLLATE utf16_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`Identifiant`, `Mdp`, `Nom`, `Prenom`, `Mail`, `Type`, `num_carte`, `date_exp`, `cvv`, `type_carte`, `nom_carte`, `photo`) VALUES
('Roro', '1234', 'Macdonald', 'Ronald', 'donald@free.fr', 'Acheteur', 0, 0, 0, '', '', ''),
('Bat', 'azerty', 'Wayne', 'Bruce', 'batman@hotmail.com', 'Vendeur', 0, 0, 0, '', '', 'map-2562138_1920.jpg'),
('Admin', '', 'Administrateur', '', 'admin@edu.fr', 'Administrateur', 0, 0, 0, '', '', ''),
('Nothyrs', 'aaaa', 'delaf', 'Henry', 'hdelaf@outlook.com', 'Acheteur', 0, 0, 0, '', '', ''),
('Derma', 'zzzz', 'Mader', 'Jean-Baptiste', 'jbmader@free.fr', 'Vendeur', 0, 0, 0, '', '', ''),
('Galibalax', 'wxcv', 'Galibert', 'Louis', 'galibax@wanadoo.fr', 'Acheteur', 5421, 0, 531, '', 'M Loulou Galibalos', 'galibalax.jpg'),
('Admin', '', 'Administrateur', '', 'admin@edu.fr', 'Administrateur', 0, 0, 0, '', '', ''),
('Nothyrs', '789', 'de La FertÃ©', 'Henry', 'hdelaf@gmail.com', 'Acheteur', 0, 0, 0, '', '', ''),
('gdupont', '123', 'Dupont', 'Gerard', 'ge@gmail.com', 'Acheteur', 0, 0, 0, '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
