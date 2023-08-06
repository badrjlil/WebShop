-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2023 at 07:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `IGA_STORE`
--

-- --------------------------------------------------------

--
-- Table structure for table `Adresses`
--

CREATE TABLE `Adresses` (
  `id` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `prenom` varchar(10) NOT NULL,
  `nom` varchar(10) NOT NULL,
  `telephone` int(9) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `region` varchar(20) NOT NULL,
  `zip` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `Adresses`
--

INSERT INTO `Adresses` (`id`, `idClient`, `prenom`, `nom`, `telephone`, `adresse`, `ville`, `region`, `zip`) VALUES
(80, 1, 'Badr', 'Jlil', 641845649, 'N 158 Lot El Menzeh 2, Boufekrane', 'GrandCasa', 'Boufekrane', 50302),
(81, 23, 'Yassir', 'Mzak', 666018879, '11122222', 'Ouerzazate', 'Casablanca', 20123),
(82, 24, 'test', 'test', 8888, 'test', 'test', 'test', 22222),
(83, 24, 'test', 'test', 1111, 'test', 'test', 'test', 1111),
(84, 25, 'Badr', 'Jlil', 61234567, 'Casablanca, bouskoura', 'GrandCasa', 'Casa', 43333);

-- --------------------------------------------------------

--
-- Table structure for table `Articles`
--

CREATE TABLE `Articles` (
  `noArticle` int(11) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `quantite` int(4) NOT NULL,
  `prix` float NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `idCategorie` int(11) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Articles`
--

INSERT INTO `Articles` (`noArticle`, `designation`, `quantite`, `prix`, `photo`, `idCategorie`, `description`, `date`, `status`) VALUES
(75, 'iPhone 14 Pro ( 256GB, 6Gb RAM ) - Deep Purple', 4, 18500, NULL, 1, 'L\'iPhone 14 Pro est livrÃ© avec un Ã©cran OLED ProMotion de 6,1 pouces avec des taux de rafraÃ®chissement adaptatifs de 1 Ã  120 Hz, Dolby Vision et un Ã®lot dynamique Face ID qui permet Ã  Apple d\'utiliser une fonction d\'affichage permanent, qui attÃ©nue l\'Ã©cran de verrouillage de la mÃªme maniÃ¨re qu\'un Montre Apple.', '2023-02-12 17:19:42', 'active'),
(76, 'MacBook Pro 2021 (13.3\", 8GB RAM, 256GB SSD)', 2, 26000, NULL, 5, 'L\'Apple MacBook Pro 2021 (14 pouces) est toujours un ordinateur portable important. Et ce n\'est pas seulement Ã  cause de ce qu\'il a mais aussi de ce qu\'il efface. Les fonctionnalitÃ©s phares commencent par la puce M1 Pro, une mise Ã  niveau sÃ©rieusement surchargÃ©e par rapport aux puces M1 qui a augmentÃ© les vitesses et la durÃ©e de vie de la batterie l\'annÃ©e derniÃ¨re.\r\n\r\nEnsuite, il y a l\'Ã©cran Liquid Retina XDR, qui offre un contraste et des taux de rafraÃ®chissement amÃ©liorÃ©s. Apple a Ã©galement ramenÃ© la charge MagSafe - un moyen plus sÃ»r de faire le plein - sur le MacBook Pro.', '2023-02-12 17:26:49', 'active'),
(77, 'Watch Series 8 [GPS + Cellular 41mm] - Midnight', 1, 6490, NULL, 13, 'Apple Watch Series 8 dispose d\'un nouveau capteur innovant qui suit votre tempÃ©rature pendant que vous dormez, afin que vous puissiez voir les changements au fil du temps. Cycle Tracking utilise ces donnÃ©es pour fournir une estimation rÃ©trospective du moment oÃ¹ vous avez probablement ovulÃ©, ce qui peut Ãªtre utile pour la planification familiale.', '2023-02-12 17:41:41', 'active'),
(78, 'Mac Mini Apple M1 (256Go, 8 CPUs) ', 2, 12950, NULL, 19, 'M2 est la prochaine gÃ©nÃ©ration de silicium Apple. Son processeur Ã  8 cÅ“urs vous permet de rÃ©aliser des tÃ¢ches quotidiennes telles que la crÃ©ation de documents ou d\'effectuer des tÃ¢ches plus intensives telles que l\'Ã©dition de photos personnelles.\r\n\r\nLe M2 dispose d\'un GPU Ã  10 cÅ“urs, ce qui amÃ©liore considÃ©rablement les performances graphiques par rapport au M1. Et son moteur multimÃ©dia vous permet de lire et d\'Ã©diter plusieurs flux de vidÃ©o 4K et 8K ProRes.\r\n\r\nMac mini avec M2 prend en charge jusqu\'Ã  deux Ã©crans.', '2023-02-12 17:46:17', 'active'),
(79, 'iPad 2022 (10th Generation, 10,9', 1, 9950, NULL, 15, 'Avec un grand Ã©cran Liquid Retina de 10,9 pouces, une puissante puce A14 Bionic, une toute premiÃ¨re camÃ©ra frontale paysage, une connectivitÃ© sans fil rapide, USB-C et la prise en charge d\'accessoires incroyables comme le nouveau Magic Keyboard Folio, le nouvel iPad offre plus de valeur, plus de polyvalence - et c\'est tout simplement plus amusant.', '2023-02-12 17:49:20', 'active'),
(80, 'iPhone 14 Pro ( 128GB, 6Gb RAM ) - Silver', 5, 18250, NULL, 1, 'L\'iPhone 14 Pro est livrÃ© avec un Ã©cran OLED ProMotion de 6,1 pouces avec des taux de rafraÃ®chissement adaptatifs de 1 Ã  120 Hz, Dolby Vision et un Ã®lot dynamique Face ID qui permet Ã  Apple d\'utiliser une fonction d\'affichage permanent, qui attÃ©nue l\'Ã©cran de verrouillage de la mÃªme maniÃ¨re qu\'un Montre Apple.', '2023-02-12 17:52:35', 'active'),
(81, 'iPhone 14 Pro ( 512GB, 6Gb RAM ) - Gold', 3, 17800, NULL, 1, 'L\'iPhone 14 Pro est livrÃ© avec un Ã©cran OLED ProMotion de 6,1 pouces avec des taux de rafraÃ®chissement adaptatifs de 1 Ã  120 Hz, Dolby Vision et un Ã®lot dynamique Face ID qui permet Ã  Apple d\'utiliser une fonction d\'affichage permanent, qui attÃ©nue l\'Ã©cran de verrouillage de la mÃªme maniÃ¨re qu\'un Montre Apple.', '2023-02-12 17:53:21', 'active'),
(82, 'iPad 2022 (10th Generation, 10,9) - Pink', 5, 8540, NULL, 15, 'Avec un grand Ã©cran Liquid Retina de 10,9 pouces, une puissante puce A14 Bionic, une toute premiÃ¨re camÃ©ra frontale paysage, une connectivitÃ© sans fil rapide, USB-C et la prise en charge d\'accessoires incroyables comme le nouveau Magic Keyboard Folio, le nouvel iPad offre plus de valeur, plus de polyvalence - et c\'est tout simplement plus amusant.', '2023-02-12 17:56:07', 'active'),
(83, '13-inch MacBook Air: Apple M2 chip with 8-core CPU and 10-core GPU, 512GB - Silver', 1, 29500, NULL, 7, 'Le MacBook Pro 14 pouces 2023 (Ã  partir de 1 999 $) est conÃ§u pour Ãªtre l\'ordinateur portable le plus rapide que vous puissiez emporter partout, avec l\'autonomie de la batterie pour le sauvegarder. Et sur la base de nos rÃ©sultats de tests approfondis, ce systÃ¨me est une bÃªte absolue pour les professionnels de la crÃ©ation.\r\n\r\nOui, vous obtenez tout ce que nous avons aimÃ© du modÃ¨le MacBook Pro 14 pouces 2021, y compris l\'Ã©blouissant Ã©cran mini-LED, une sÃ©lection de ports gÃ©nÃ©reuse et un appareil photo 1080p net. Mais il s\'agit vraiment des nouvelles puces M2 Pro et M2 Max. Le nouveau M2 Pro promet des performances CPU 20% plus rapides et des performances GPU 30% plus rapides que M1 Pro. Si vous en avez les moyens, le M2 Max embarque un Ã©norme GPU Ã  38 cÅ“urs.', '2023-02-12 18:04:22', 'active'),
(84, 'iPhone 14 Pro ( 512GB, 6Gb RAM ) - Space Black', 5, 21540, NULL, 1, 'L\'iPhone 14 Pro est livrÃ© avec un Ã©cran OLED ProMotion de 6,1 pouces avec des taux de rafraÃ®chissement adaptatifs de 1 Ã  120 Hz, Dolby Vision et un Ã®lot dynamique Face ID qui permet Ã  Apple d\'utiliser une fonction d\'affichage permanent, qui attÃ©nue l\'Ã©cran de verrouillage de la mÃªme maniÃ¨re qu\'un Montre Apple.', '2023-02-12 18:07:17', 'active'),
(85, 'MacBook Pro 2021 (13.3', 3, 36950, NULL, 5, 'Le nouveau MacBook Pro offre des performances rÃ©volutionnaires aux utilisateurs professionnels. Avec le puissant M1 Pro pour booster les flux de travail de niveau professionnel tout en obtenant une autonomie incroyable. Et avec un Ã©cran Liquid Retina XDR immersif de 14 pouces et une gamme de ports professionnels, vous pouvez faire plus que jamais avec MacBook Pro.', '2023-02-12 18:09:40', 'active'),
(86, 'Watch Series 8 [GPS + Cellular 41mm] - Red', 5, 6850, NULL, 13, 'Apple Watch Series 8 dispose d\'un nouveau capteur innovant qui suit votre tempÃ©rature pendant que vous dormez, afin que vous puissiez voir les changements au fil du temps. Cycle Tracking utilise ces donnÃ©es pour fournir une estimation rÃ©trospective du moment oÃ¹ vous avez probablement ovulÃ©, ce qui peut Ãªtre utile pour la planification familiale.', '2023-02-12 18:11:12', 'active'),
(87, 'iPad 2022 (10th Generation, 10,9)', 5, 8250, NULL, 15, 'ttest', '2023-02-12 18:13:49', 'active'),
(99, 'test', 5, 33444, NULL, 6, 'Test', '2023-03-02 17:37:22', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`idCategorie`, `nomCategorie`) VALUES
(5, 'Ipad'),
(1, 'Iphone'),
(3, 'Mac Mini'),
(2, 'MacBook'),
(4, 'Watch');

-- --------------------------------------------------------

--
-- Table structure for table `Clients`
--

CREATE TABLE `Clients` (
  `idClient` int(11) NOT NULL,
  `prenom` varchar(10) NOT NULL,
  `nom` varchar(10) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(15) NOT NULL DEFAULT 'Utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `Clients`
--

INSERT INTO `Clients` (`idClient`, `prenom`, `nom`, `email`, `password`, `type`) VALUES
(1, 'Badr', 'IGA', 'admin@admin.com', 'admin', 'Administrateur'),
(23, 'yassir', 'mzak', 'test@test.com', 'yasuo123', 'Utilisateur'),
(24, 'test', 'test', 'test', 'test', 'Utilisateur'),
(25, 'Badr', 'JLIL', 'test@test.net', 'test', 'Utilisateur');

-- --------------------------------------------------------

--
-- Table structure for table `Commandes`
--

CREATE TABLE `Commandes` (
  `num` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'En attente',
  `adresse_id` int(11) NOT NULL,
  `prix_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `Commandes`
--

INSERT INTO `Commandes` (`num`, `idClient`, `date`, `status`, `adresse_id`, `prix_total`) VALUES
(89, 1, '2023-02-24 12:40:22', 'Expedie', 80, 26000),
(90, 23, '2023-03-02 15:17:38', 'En attente', 81, 147770),
(91, 24, '2023-03-02 15:21:44', 'En attente', 82, 17800),
(92, 24, '2023-03-02 15:25:29', 'En attente', 83, 36950),
(93, 25, '2023-03-02 16:34:18', 'En attente', 84, 78000);

-- --------------------------------------------------------

--
-- Table structure for table `Commande_details`
--

CREATE TABLE `Commande_details` (
  `id_commande_details` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `noArticle` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `Commande_details`
--

INSERT INTO `Commande_details` (`id_commande_details`, `num`, `noArticle`, `quantite`) VALUES
(79, 89, 76, 1),
(80, 90, 79, 4),
(81, 90, 77, 3),
(82, 90, 83, 3),
(83, 91, 81, 1),
(84, 92, 85, 1),
(85, 93, 76, 3);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `statut` varchar(10) NOT NULL DEFAULT 'Unread',
  `prenom` varchar(15) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(100) NOT NULL,
  `telephone` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `statut`, `prenom`, `nom`, `date`, `email`, `telephone`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Unread', 'Karim', 'Ali', '2023-03-02 15:24:07', 'karim.ali@gmail.com', 666019977),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'read', 'Samira', 'Alouch', '2023-03-02 15:24:22', 'samira.alouch@gmail.com', 666558888),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'read', 'Imrane', 'Sahli', '2023-02-22 16:57:53', 'imrane.sahli@gmail.com', 666019977),
(4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Unread', 'Oussama', 'Aouni', '2023-02-22 16:58:02', 'oussama.aouni@gmail.com', 666558888);

-- --------------------------------------------------------

--
-- Table structure for table `Panier`
--

CREATE TABLE `Panier` (
  `id` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `noArticle` int(11) NOT NULL,
  `qts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `Panier`
--

INSERT INTO `Panier` (`id`, `idClient`, `noArticle`, `qts`) VALUES
(121, 1, 79, 4),
(122, 1, 75, 1),
(126, 23, 77, 1),
(127, 23, 86, 1),
(128, 23, 85, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Photos`
--

CREATE TABLE `Photos` (
  `noArticle` int(11) NOT NULL,
  `photo1` varchar(100) DEFAULT NULL,
  `photo2` varchar(100) DEFAULT NULL,
  `photo3` varchar(100) DEFAULT NULL,
  `photo4` varchar(100) DEFAULT NULL,
  `photo5` varchar(100) DEFAULT NULL,
  `photo6` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `Photos`
--

INSERT INTO `Photos` (`noArticle`, `photo1`, `photo2`, `photo3`, `photo4`, `photo5`, `photo6`) VALUES
(75, 'produits/00075-1-63e9119e75f2c1.28200154.jpg', 'produits/00075-2-63e9119e77e525.11442746.jpg', 'produits/00075-3-63e9119e79db23.74073496.jpg', 'produits/00075-4-63e9119e7bc962.78301122.jpg', 'produits/00075-5-63e9119e7dbb98.51667273.jpg', 'produits/00075-6-63e91278b628e3.71686000.jpg'),
(76, 'produits/00076-1-63e913497950f0.41289824.jpg', 'produits/00076-2-63e913497f0f82.68523287.jpg', 'produits/00076-3-63e91349811512.19012942.jpg', 'produits/00076-4-63e913498316c8.08271921.jpg', 'produits/00076-5-63e913498529d2.74815479.jpg', 'produits/00076-6-63e91349873138.87454535.jpg'),
(77, 'produits/00077-1-63e916c5dde645.13384391.jpg', 'produits/00077-2-63e916c5df49a4.71042438.jpg', 'produits/00077-3-63e916c5e0a093.80887958.jpg', 'produits/00077-4-63e916c5e1f7b9.53054882.jpg', 'produits/00077-5-63e916c5e35a71.60614509.jpg', 'produits/00077-6-63e916c5e4b3b0.75870247.jpg'),
(78, 'produits/00078-1-63e94f846af9c5.11581440.png', 'produits/00078-2-63e94f846c5ba6.66966635.png', 'produits/00078-3-63e94f846dc0b7.77230058.png', 'produits/00078-4-63e94f846f19e4.95839722.png', 'produits/00078-5-63e9539c0f0ef1.96769371.png', NULL),
(79, 'produits/00079-1-63e91890911659.91648565.jpg', 'produits/00079-2-63e91890952e32.16126240.jpg', 'produits/00079-3-63e91890969344.17337674.jpg', 'produits/00079-4-63e9189097f562.53030949.jpg', 'produits/00079-5-63e91890994a38.78607657.jpg', 'produits/00079-6-63e918909aabd6.33603537.jpg'),
(80, 'produits/00080-1-63e91953294dd6.78326723.jpg', 'produits/00080-2-63e919532d6dc4.93627736.jpg', 'produits/00080-3-63e919532ece41.57630084.jpg', 'produits/00080-4-63e919533019b4.42195835.jpg', 'produits/00080-5-63e919533170f7.27709871.jpg', 'produits/00080-6-63e9195332c328.94384748.jpg'),
(81, 'produits/00081-1-63e91981b09fe1.09987432.jpg', 'produits/00081-2-63e91981b4f696.57337233.jpg', 'produits/00081-3-63e91981b66fb1.62873844.jpg', 'produits/00081-4-63e91981b7ea28.69982311.jpg', 'produits/00081-5-63e91981b95fa7.60865048.jpg', 'produits/00081-6-63e91981bacfb9.90608831.jpg'),
(82, 'produits/00082-1-63e91a279eff37.20477134.jpg', 'produits/00082-2-63e91a27a30250.96934216.jpg', 'produits/00082-3-63e91a27a44f52.30306113.jpg', 'produits/00082-4-63e91a27a5adc0.60131103.jpg', 'produits/00082-5-63e91a27a70017.41705722.jpg', 'produits/00082-6-63e91a27a850e9.15335087.jpg'),
(83, 'produits/00083-1-63e91c162a2286.11191381.jpeg', 'produits/00083-2-63e91c162e74c0.51127234.jpeg', 'produits/00083-3-63e91c162fdc10.77839587.jpeg', 'produits/00083-4-63e91c16313287.40189835.jpeg', 'produits/00083-5-63e91c16328942.06528928.jpeg', 'produits/00083-6-63e91c1633e183.10168529.jpeg'),
(84, 'produits/00084-1-63e91cc5b19ef9.63162107.jpg', 'produits/00084-2-63e91cc5b4a510.24990840.jpg', 'produits/00084-3-63e91cc5b60869.97504758.jpg', 'produits/00084-4-63e91cc5b76958.45344453.jpg', 'produits/00084-5-63e91cc5b8da20.21868035.jpg', 'produits/00084-6-63e91cc5ba3834.22888423.jpg'),
(85, 'produits/00085-1-63e91d54c07138.47793067.jpg', 'produits/00085-2-63e91d54c485d8.25588274.jpg', 'produits/00085-3-63e91d54c5f294.66752273.jpg', 'produits/00085-4-63e91d54c74cb1.07821831.jpg', 'produits/00085-5-63e91d54c8bf28.60345880.jpg', 'produits/00085-6-63e91d54ca1e01.30443388.jpg'),
(86, 'produits/00086-1-63e91db08a0857.28199330.jpg', 'produits/00086-2-63e91db08e01c1.09645389.jpg', 'produits/00086-3-63e91db08f5ec8.27136918.jpg', 'produits/00086-4-63e91db090ba45.03389855.jpg', NULL, NULL),
(87, 'produits/00087-1-63e91e4d505608.81342460.jpg', 'produits/00087-2-63e91e4d546c43.75937520.jpg', 'produits/00087-3-63e91e4d55d0e7.56810194.jpg', 'produits/00087-4-63e91e4d572c47.95379647.jpg', 'produits/00087-5-63e91e4d588e14.80902318.jpg', 'produits/00087-6-63e91e4d59ee86.60180064.jpg'),
(99, 'produits/00099-1-6400d0c2a072d8.05258333.jpeg', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SubCategories`
--

CREATE TABLE `SubCategories` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(30) NOT NULL,
  `categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `SubCategories`
--

INSERT INTO `SubCategories` (`idCategorie`, `nomCategorie`, `categorie`) VALUES
(1, 'Iphone 14', 1),
(2, 'Iphone 13', 1),
(3, 'Iphone 12', 1),
(4, 'Iphone 10', 1),
(5, 'MacBook Pro 2021', 2),
(6, 'MacBook Pro 2022', 2),
(7, 'MacBook Pro 2023', 2),
(8, 'Watch Series 7', 4),
(9, 'Watch Series 3', 4),
(10, 'Watch Ultra', 4),
(11, 'Watch SE', 4),
(12, 'Watch SE (2022)', 4),
(13, 'Watch Series 8', 4),
(14, 'Ipad (2021)', 5),
(15, 'Ipad (2022)', 5),
(16, 'Ipad Pro (2022)', 5),
(17, 'Ipad Air (2022)', 5),
(18, 'Mac Mini (Intel, 2018)', 3),
(19, 'Mac Mini (M1, 2020)', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Adresses`
--
ALTER TABLE `Adresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idClient` (`idClient`);

--
-- Indexes for table `Articles`
--
ALTER TABLE `Articles`
  ADD PRIMARY KEY (`noArticle`),
  ADD KEY `article_ibfk_1` (`idCategorie`);

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`idCategorie`),
  ADD KEY `nomCategorie` (`nomCategorie`);

--
-- Indexes for table `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`idClient`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `Commandes`
--
ALTER TABLE `Commandes`
  ADD PRIMARY KEY (`num`),
  ADD KEY `client` (`idClient`);

--
-- Indexes for table `Commande_details`
--
ALTER TABLE `Commande_details`
  ADD PRIMARY KEY (`id_commande_details`),
  ADD KEY `produit_id` (`noArticle`),
  ADD KEY `commande_id` (`num`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Panier`
--
ALTER TABLE `Panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `noArticle` (`noArticle`),
  ADD KEY `client_id` (`idClient`);

--
-- Indexes for table `Photos`
--
ALTER TABLE `Photos`
  ADD PRIMARY KEY (`noArticle`);

--
-- Indexes for table `SubCategories`
--
ALTER TABLE `SubCategories`
  ADD PRIMARY KEY (`idCategorie`),
  ADD KEY `categorie` (`categorie`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Adresses`
--
ALTER TABLE `Adresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `Articles`
--
ALTER TABLE `Articles`
  MODIFY `noArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Clients`
--
ALTER TABLE `Clients`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `Commandes`
--
ALTER TABLE `Commandes`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `Commande_details`
--
ALTER TABLE `Commande_details`
  MODIFY `id_commande_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Panier`
--
ALTER TABLE `Panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `SubCategories`
--
ALTER TABLE `SubCategories`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Adresses`
--
ALTER TABLE `Adresses`
  ADD CONSTRAINT `cl_id` FOREIGN KEY (`idClient`) REFERENCES `Clients` (`idClient`);

--
-- Constraints for table `Articles`
--
ALTER TABLE `Articles`
  ADD CONSTRAINT `Articles_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `SubCategories` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Commandes`
--
ALTER TABLE `Commandes`
  ADD CONSTRAINT `client` FOREIGN KEY (`idClient`) REFERENCES `Clients` (`idClient`);

--
-- Constraints for table `Commande_details`
--
ALTER TABLE `Commande_details`
  ADD CONSTRAINT `commande_id` FOREIGN KEY (`num`) REFERENCES `Commandes` (`num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produit_id` FOREIGN KEY (`noArticle`) REFERENCES `Articles` (`noArticle`);

--
-- Constraints for table `Panier`
--
ALTER TABLE `Panier`
  ADD CONSTRAINT `client_id` FOREIGN KEY (`idClient`) REFERENCES `Clients` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prod_id` FOREIGN KEY (`noArticle`) REFERENCES `Articles` (`noArticle`);

--
-- Constraints for table `Photos`
--
ALTER TABLE `Photos`
  ADD CONSTRAINT `Articles_photos` FOREIGN KEY (`noArticle`) REFERENCES `Articles` (`noArticle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `SubCategories`
--
ALTER TABLE `SubCategories`
  ADD CONSTRAINT `cat` FOREIGN KEY (`categorie`) REFERENCES `Categories` (`idCategorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
