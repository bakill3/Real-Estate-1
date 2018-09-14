-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Set-2018 às 19:53
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imobiliaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `culturas`
--

CREATE TABLE `culturas` (
  `id_cultura` int(6) NOT NULL,
  `id_propriedade` int(6) NOT NULL,
  `titulo_cult` varchar(255) NOT NULL,
  `shortdescription_cult` varchar(300) NOT NULL,
  `description_cult` varchar(255) NOT NULL,
  `lang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `culturas`
--

INSERT INTO `culturas` (`id_cultura`, `id_propriedade`, `titulo_cult`, `shortdescription_cult`, `description_cult`, `lang`) VALUES
(1, 1, 'Townhouse in Alvor with 2 bedrooms and swimming pool', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in ', 'en-GB'),
(2, 1, 'Maison de ville avec 2 chambres et piscine à Alvor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor d', 'fr-FR'),
(3, 2, 'Apartment T3 in Lagos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in ', 'en-GB'),
(4, 2, '1 chambre appartement à Vilamoura', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor d', 'fr-FR'),
(5, 3, 'Villa with 4 bedrooms and pool', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in ', 'en-GB'),
(6, 3, 'Villa avec 4 chambres et la piscine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor d', 'fr-FR'),
(7, 4, 'Apartment T3 in the center of Portimão', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in ', 'en-GB'),
(8, 4, 'Appartement T3 dans le centre de Portimão', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor d', 'fr-FR'),
(9, 5, 'Vivenda Margarida', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in ', 'en-GB'),
(10, 5, 'Vivenda Margarida', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor d', 'fr-FR'),
(11, 6, '3 bedroom apartment in sagres with sea views', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in ', 'en-GB'),
(12, 6, '1 chambre appartement à Vilamoura', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor d', 'fr-FR'),
(13, 7, 'Luxury villa with 4 bedrooms and pool in Vale do Lobo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in ', 'en-GB'),
(14, 7, 'Villa de luxe avec 4 chambres et piscine à Vale do Lobo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor d', 'fr-FR'),
(15, 8, 'Apartment T3 in the center of Portimão', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in ', 'en-GB'),
(16, 8, 'Appartement T3 dans le centre de Portimão', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor d', 'fr-FR'),
(17, 9, '1 bedroom apartment in Vilamoura', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in ', 'en-GB'),
(18, 9, '1 chambre appartement à Vilamoura', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor d', 'fr-FR'),
(19, 1, 'Townhouse in Alvor with 2 bedrooms and swimming pool', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in ', 'en-GB'),
(20, 1, 'Maison de ville avec 2 chambres et piscine à Alvor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor d', 'fr-FR'),
(21, 2, 'Apartment T3 in Lagos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in ', 'en-GB'),
(22, 2, '1 chambre appartement à Vilamoura', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor d', 'fr-FR'),
(23, 3, 'Villa with 4 bedrooms and pool', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in ', 'en-GB'),
(24, 3, 'Villa avec 4 chambres et la piscine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor d', 'fr-FR'),
(25, 4, 'Apartment T3 in the center of Portimão', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in ', 'en-GB'),
(26, 4, 'Appartement T3 dans le centre de Portimão', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor d', 'fr-FR'),
(27, 5, 'Vivenda Margarida', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in ', 'en-GB'),
(28, 5, 'Vivenda Margarida', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor d', 'fr-FR'),
(29, 6, '3 bedroom apartment in sagres with sea views', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in ', 'en-GB'),
(30, 6, '1 chambre appartement à Vilamoura', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor d', 'fr-FR'),
(31, 7, 'Luxury villa with 4 bedrooms and pool in Vale do Lobo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in ', 'en-GB'),
(32, 7, 'Villa de luxe avec 4 chambres et piscine à Vale do Lobo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor d', 'fr-FR'),
(33, 8, 'Apartment T3 in the center of Portimão', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in ', 'en-GB'),
(34, 8, 'Appartement T3 dans le centre de Portimão', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor d', 'fr-FR'),
(35, 9, '1 bedroom apartment in Vilamoura', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in ', 'en-GB'),
(36, 9, '1 chambre appartement à Vilamoura', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, de sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor d', 'fr-FR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `id_favorito` int(6) NOT NULL,
  `id_user` int(6) NOT NULL,
  `id_propriedade` int(6) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `favoritos`
--

INSERT INTO `favoritos` (`id_favorito`, `id_user`, `id_propriedade`, `data`) VALUES
(1, 5, 1, '2018-08-18 17:59:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `feature`
--

CREATE TABLE `feature` (
  `id_feature` int(6) NOT NULL,
  `feature_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `feature`
--

INSERT INTO `feature` (`id_feature`, `feature_type`) VALUES
(1, 'Swimming pool'),
(2, 'Furnished'),
(3, 'Balcony'),
(8, 'teste'),
(9, 'tutu'),
(10, 'tte'),
(11, 'lolitos'),
(12, 'cagalhao'),
(13, 'andre_gay'),
(14, 'testing');

-- --------------------------------------------------------

--
-- Estrutura da tabela `feature_con`
--

CREATE TABLE `feature_con` (
  `id_feature` int(6) NOT NULL,
  `id_propriedade` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `feature_con`
--

INSERT INTO `feature_con` (`id_feature`, `id_propriedade`) VALUES
(1, 1),
(10, 1),
(11, 1),
(12, 1),
(14, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria`
--

CREATE TABLE `galeria` (
  `id_foto` int(6) NOT NULL,
  `id_propriedade` int(6) NOT NULL,
  `foto_url` varchar(260) NOT NULL,
  `foto_descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `galeria`
--

INSERT INTO `galeria` (`id_foto`, `id_propriedade`, `foto_url`, `foto_descricao`) VALUES
(1, 1, 'https://bo.moonshapes.pt/PropertyPhotos/296/62976/ING_19034_00071.jpg', ''),
(2, 1, 'https://bo.moonshapes.pt/PropertyPhotos/296/62976/ING_19034_00073.jpg', ''),
(3, 1, 'https://bo.moonshapes.pt/PropertyPhotos/296/62976/ISS_7200_04519.jpg', ''),
(4, 2, 'https://bo.moonshapes.pt/PropertyPhotos/296/62977/ISS_7200_04519.jpg', ''),
(5, 2, 'https://bo.moonshapes.pt/PropertyPhotos/296/62977/11.jpg', ''),
(6, 2, 'https://bo.moonshapes.pt/PropertyPhotos/296/62977/ING_19034_00071.jpg', ''),
(7, 3, 'https://bo.moonshapes.pt/PropertyPhotos/296/62978/03B94742.jpg', ''),
(8, 3, 'https://bo.moonshapes.pt/PropertyPhotos/296/62978/ING_17215_09290.jpg', ''),
(9, 3, 'https://bo.moonshapes.pt/PropertyPhotos/296/62978/03C00043.jpg', ''),
(10, 4, 'https://bo.moonshapes.pt/PropertyPhotos/296/62979/02E86901.jpg', ''),
(11, 4, 'https://bo.moonshapes.pt/PropertyPhotos/296/62979/ING_19034_00073.jpg', ''),
(12, 4, 'https://bo.moonshapes.pt/PropertyPhotos/296/62979/03B97826.jpg', ''),
(13, 5, 'https://bo.moonshapes.pt/PropertyPhotos/296/62981/03C06110.jpg', ''),
(14, 5, 'https://bo.moonshapes.pt/PropertyPhotos/296/62981/03C06112.jpg', ''),
(15, 5, 'https://bo.moonshapes.pt/PropertyPhotos/296/62981/03C06211.jpg', ''),
(16, 6, 'https://bo.moonshapes.pt/PropertyPhotos/296/62982/02H78603.jpg', ''),
(17, 6, 'https://bo.moonshapes.pt/PropertyPhotos/296/62982/ING_17215_09290.jpg', ''),
(18, 6, 'https://bo.moonshapes.pt/PropertyPhotos/296/62982/03E26217.jpg', ''),
(19, 7, 'https://bo.moonshapes.pt/PropertyPhotos/296/62983/03C06391.jpg', ''),
(20, 7, 'https://bo.moonshapes.pt/PropertyPhotos/296/62983/03F32241.jpg', ''),
(21, 7, 'https://bo.moonshapes.pt/PropertyPhotos/296/62983/ING_19034_00079.jpg', ''),
(22, 8, 'https://bo.moonshapes.pt/PropertyPhotos/296/62980/15.jpg', ''),
(23, 8, 'https://bo.moonshapes.pt/PropertyPhotos/296/62980/13.jpg', ''),
(24, 9, 'https://bo.moonshapes.pt/PropertyPhotos/296/62984/03E26217.jpg', ''),
(25, 9, 'https://bo.moonshapes.pt/PropertyPhotos/296/62984/03C06391.jpg', ''),
(26, 10, 'imoveis/11.png', ''),
(31, 10, 'imoveis/30572169_1444124692359449_3511878221777839966_n.jpg', ''),
(32, 10, 'imoveis/31416861_2038911746137639_7327296369700372480_n.jpg', ''),
(33, 10, 'imoveis/32599621_1756546701050920_6831872871359315968_n.png', ''),
(34, 10, 'imoveis/32739207_1756543824384541_4482843227249967104_n.jpg', ''),
(35, 10, 'imoveis/32792366_204387956952737_2625107732419575808_n.jpg', ''),
(36, 10, 'imoveis/30572169_1444124692359449_3511878221777839966_n.jpg', ''),
(37, 1, 'imoveis/73.jpg', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `keywords`
--

CREATE TABLE `keywords` (
  `keyword_id` int(6) NOT NULL,
  `id_propriedade` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `keywords`
--

INSERT INTO `keywords` (`keyword_id`, `id_propriedade`) VALUES
(2, 2),
(1, 1),
(2, 1),
(8, 1),
(9, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `keyword_text`
--

CREATE TABLE `keyword_text` (
  `keyword_id` int(6) NOT NULL,
  `keyword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `keyword_text`
--

INSERT INTO `keyword_text` (`keyword_id`, `keyword`) VALUES
(1, 'Piscina'),
(2, 'Lareira'),
(3, 'Jardim'),
(4, 'Terraço'),
(5, 'T1'),
(6, 'T2'),
(7, 'T3'),
(8, 'T4'),
(9, 'T5');

-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacao`
--

CREATE TABLE `localizacao` (
  `id_localizacao` int(6) NOT NULL,
  `id_propriedade` int(6) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `distrito` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `zona` varchar(30) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `localizacao`
--

INSERT INTO `localizacao` (`id_localizacao`, `id_propriedade`, `pais`, `distrito`, `cidade`, `zona`, `latitude`, `longitude`) VALUES
(1, 1, 'Portugal', 'Algarve', 'Lagos', 'Ameijeira', 0, 0),
(2, 2, 'Portugal', 'Algarve', 'Lagos', 'Ameijeira', 0, 0),
(3, 3, 'Portugal', 'Algarve', 'Lagos', 'Ameijeira', 0, 0),
(4, 4, 'Portugal', 'Algarve', 'Lagos', 'Ameijeira', 0, 0),
(5, 5, 'Portugal', 'Algarve', 'Lagos', 'Ameijeira', 37.1362, -8.53769),
(6, 6, 'Portugal', 'Algarve', 'Lagos', 'Ameijeira', 0, 0),
(7, 7, 'Portugal', 'Algarve', 'Lagos', 'Ameijeira', 0, 0),
(8, 8, 'Portugal', 'Algarve', 'Lagos', 'Ameijeira', 0, 0),
(9, 9, 'Portugal', 'Algarve', 'Lagos', 'Ameijeira', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(6) NOT NULL,
  `perfil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `perfil`) VALUES
(1, 'Cliente'),
(2, 'Agente'),
(3, 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `property_status`
--

CREATE TABLE `property_status` (
  `id_p_status` int(6) NOT NULL,
  `id_propriedade` int(6) NOT NULL,
  `onfocus` varchar(50) NOT NULL,
  `opurtunidade` varchar(50) NOT NULL,
  `featured` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `property_status`
--

INSERT INTO `property_status` (`id_p_status`, `id_propriedade`, `onfocus`, `opurtunidade`, `featured`) VALUES
(1, 1, 'false', 'false', 'false'),
(2, 2, 'false', 'false', 'false'),
(3, 3, 'false', 'false', 'false'),
(4, 4, 'false', 'false', 'false'),
(5, 5, 'true', 'false', 'false'),
(6, 6, 'true', 'false', 'false'),
(7, 7, 'true', 'false', 'false'),
(8, 8, 'false', 'false', 'false'),
(9, 9, 'true', 'false', 'false');

-- --------------------------------------------------------

--
-- Estrutura da tabela `propriedades`
--

CREATE TABLE `propriedades` (
  `id_propriedade` int(6) NOT NULL,
  `referencia` varchar(10) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `preco` float NOT NULL,
  `preco_usd` float NOT NULL,
  `moeda` varchar(3) NOT NULL,
  `tipo_propriedade` varchar(15) NOT NULL,
  `tipo_negocio` varchar(15) NOT NULL,
  `descricao_negocio` varchar(120) NOT NULL,
  `n_quartos` int(2) NOT NULL,
  `n_casas_de_banho` int(2) NOT NULL,
  `area_da_casa` float NOT NULL,
  `area_total` float NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(450) NOT NULL,
  `destaque` int(5) NOT NULL,
  `views` int(8) NOT NULL,
  `ano_contrucao` varchar(30) NOT NULL,
  `last_update` varchar(10) NOT NULL,
  `plantas` varchar(100) NOT NULL,
  `internal_id` varchar(12) NOT NULL,
  `condicao_propriedade` varchar(50) NOT NULL,
  `plot_area` int(50) NOT NULL,
  `plot_area_SQF` int(50) NOT NULL,
  `id_user` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `propriedades`
--

INSERT INTO `propriedades` (`id_propriedade`, `referencia`, `estado`, `preco`, `preco_usd`, `moeda`, `tipo_propriedade`, `tipo_negocio`, `descricao_negocio`, `n_quartos`, `n_casas_de_banho`, `area_da_casa`, `area_total`, `titulo`, `descricao`, `destaque`, `views`, `ano_contrucao`, `last_update`, `plantas`, `internal_id`, `condicao_propriedade`, `plot_area`, `plot_area_SQF`, `id_user`) VALUES
(1, 'DV004', '', 249987, 341675, 'EUR', 'Villa', '2', 'For sale', 2, 2, 0, 0, 'Townhouse in Alvor with 2 bedrooms and swimming pool', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in reprehenderit in voluptate cillum dolore fugiat this dictum nulla pariatur I. Excepteur sint occaecat cupidatat non proident, sunt qui officia deserunt mollitas fault in anim id est laborum. - RE', 0, 0, '2012', '', '', '62976', '', 37, 9, 5),
(2, 'DA003', '', 175000, 239172, 'EUR', 'Villa', '2', 'For sale', 3, 3, 0, 0, 'Apartment T3 in Lago', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in reprehenderit in voluptate cillum dolore fugiat this dictum nulla pariatur I. Excepteur sint occaecat cupidatat non proident, sunt qui officia deserunt mollitas fault in anim id est laborum. - RE', 0, 0, '2013', '', '', '62977', '', 0, 0, 5),
(3, 'DV002', '', 320000, 437344, 'EUR', 'Villa', '2', 'For sale', -4, 4, 0, 0, 'Villa with 4 bedrooms and pool', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in reprehenderit in voluptate cillum dolore fugiat this dictum nulla pariatur I. Excepteur sint occaecat cupidatat non proident, sunt qui officia deserunt mollitas fault in anim id est laborum. - RE', 0, 0, '2012', '', '', '62978', '', 0, 0, 0),
(4, 'DA004', '', 140000, 191338, 'EUR', 'Apartment', '2', 'For sale', 3, 2, 0, 0, 'Apartment T3 in the center of Portimão', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in reprehenderit in voluptate cillum dolore fugiat this dictum nulla pariatur I. Excepteur sint occaecat cupidatat non proident, sunt qui officia deserunt mollitas fault in anim id est laborum. - RE', 0, 0, '2012', '', '', '62979', '', 0, 0, 0),
(5, 'DV005', '', 280000, 382676, 'EUR', 'Villa', '2', 'For sale', 3, 2, 0, 0, 'Vivenda Margarida', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in reprehenderit in voluptate cillum dolore fugiat this dictum nulla pariatur I. Excepteur sint occaecat cupidatat non proident, sunt qui officia deserunt mollitas fault in anim id est laborum. - RE', 1, 0, '2012', '', '', '62981', '', 0, 0, 0),
(6, 'DA002', '', 260000, 355342, 'EUR', 'Villa', '2', 'For sale', 3, 3, 0, 0, '3 bedroom apartment in sagres with sea views', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in reprehenderit in voluptate cillum dolore fugiat this dictum nulla pariatur I. Excepteur sint occaecat cupidatat non proident, sunt qui officia deserunt mollitas fault in anim id est laborum. - RE', 1, 0, '2013', '', '', '62982', '', 0, 0, 0),
(7, 'DV003', '', 1450000, 1981720, 'EUR', 'Villa', '2', 'For sale', 4, 4, 0, 0, 'Luxury villa with 4 bedrooms and pool in Vale do Lobo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in reprehenderit in voluptate cillum dolore fugiat this dictum nulla pariatur I. Excepteur sint occaecat cupidatat non proident, sunt qui officia deserunt mollitas fault in anim id est laborum. - RE', 1, 0, '2015', '', '', '62983', '', 0, 0, 0),
(8, 'DAr001', '', 340, 465, 'EUR', 'Villa', '6', 'For sale', 2, 2, 0, 0, 'Apartment T3 in the center of Portimão', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in reprehenderit in voluptate cillum dolore fugiat this dictum nulla pariatur I. Excepteur sint occaecat cupidatat non proident, sunt qui officia deserunt mollitas fault in anim id est laborum. - RE', 0, 0, '2012', '', '', '62980', '', 0, 0, 0),
(9, 'DA001', '', 18000, 246006, 'EUR', 'Villa', '2', 'For sale', 1, 1, 0, 0, '1 bedroom apartment in Vilamoura', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labores et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. DUIs aute irure dolor in reprehenderit in voluptate cillum dolore fugiat this dictum nulla pariatur I. Excepteur sint occaecat cupidatat non proident, sunt qui officia deserunt mollitas fault in anim id est laborum. - RE', 1, 0, '2011', '', '', '62984', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id_user` int(6) NOT NULL,
  `nome` text NOT NULL,
  `sobrenome` text NOT NULL,
  `genero` text NOT NULL,
  `telemovel` int(9) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_pais` int(6) NOT NULL,
  `id_perfil` int(6) NOT NULL DEFAULT '1',
  `descricao_agente` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL DEFAULT 'imoveis/perfil/avatar.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id_user`, `nome`, `sobrenome`, `genero`, `telemovel`, `email`, `password`, `id_pais`, `id_perfil`, `descricao_agente`, `imagem`) VALUES
(5, 'Maria', 'Leal', 'Masculino', 123456789, 'admin@gmail.com', '$2y$10$/4niA8Rg3ea5PJ.aXwnfre/KcDRFpxmfEkfWWliiqokNOzB3rFfeq', 0, 3, 'Esta descrição sobre mim encontra-se na db', 'imoveis/perfil/admin@gmail.com/agent_3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `culturas`
--
ALTER TABLE `culturas`
  ADD PRIMARY KEY (`id_cultura`);

--
-- Indexes for table `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id_favorito`),
  ADD KEY `id_user_fav` (`id_user`),
  ADD KEY `id_propriedade_fav` (`id_propriedade`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`id_feature`);

--
-- Indexes for table `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_prop_galeria` (`id_propriedade`) USING BTREE;

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD KEY `keyword_id` (`keyword_id`) USING BTREE;

--
-- Indexes for table `keyword_text`
--
ALTER TABLE `keyword_text`
  ADD PRIMARY KEY (`keyword_id`);

--
-- Indexes for table `localizacao`
--
ALTER TABLE `localizacao`
  ADD PRIMARY KEY (`id_localizacao`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indexes for table `property_status`
--
ALTER TABLE `property_status`
  ADD PRIMARY KEY (`id_p_status`);

--
-- Indexes for table `propriedades`
--
ALTER TABLE `propriedades`
  ADD PRIMARY KEY (`id_propriedade`),
  ADD KEY `id_user_adicionado` (`id_user`);

--
-- Indexes for table `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_pais` (`id_pais`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `culturas`
--
ALTER TABLE `culturas`
  MODIFY `id_cultura` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id_favorito` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `id_feature` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id_foto` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `keyword_text`
--
ALTER TABLE `keyword_text`
  MODIFY `keyword_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `localizacao`
--
ALTER TABLE `localizacao`
  MODIFY `id_localizacao` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `property_status`
--
ALTER TABLE `property_status`
  MODIFY `id_p_status` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `propriedades`
--
ALTER TABLE `propriedades`
  MODIFY `id_propriedade` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD CONSTRAINT `id_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
