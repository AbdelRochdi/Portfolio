-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 28 août 2020 à 22:21
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start` date NOT NULL,
  `finish` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `experience`
--

INSERT INTO `experience` (`id`, `title`, `description`, `start`, `finish`) VALUES
(1, 'UM6P', 'My first intenship in Web Developement in which I worked on real projects in HTML5, CSS3, Javascript and PHP,  and on the wordpress website of the university\'s research network, PhoresNet.', '2020-05-15', '2020-11-15'),
(2, 'Facebook', 'This is just a filler, to make my portfolio look good.', '2020-04-28', '2020-05-29'),
(3, 'Google', 'this is another filler, maybe one day, who knows.', '2020-02-06', '2020-03-22');

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`id`, `category`, `title`, `image`, `description`, `link`) VALUES
(1, 'Web Developement', 'Covid Test Clone', 'Sans-titre-3.jpg', 'In this project we were asked to make a clone of a Covid-19 test web app using HTML5, CSS3 and JavaScript', 'https://abdelrochdi.github.io/C2N3_C3N3/'),
(2, 'Web Developement', 'BackEnd Website', 'Sans-titre-1.jpg', 'In this project, we were given a bootstrap front end of an ecommerce website, and we had to make its backend using PHP', 'https://github.com/AbdelRochdi/back-end-site-web'),
(3, 'Web Developement', 'Cooperative Website', 'Sans-titre-2.jpg', 'In this project, we made the front of a cooperative ecommerce website, we used HTML5, CSS3 and JavaScript to achieve it, we made it from desing to code.', 'https://abdelrochdi.github.io/Olivia/');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `about`, `image`) VALUES
(0, 'Rochdi Abdelghafour', 'rochdi@gmail.fr', '$2y$10$0akuaJiqi86yFU3BTZicw.t4tULdjz.mDNUfIHOIA44C/694Q974u', 'I’m a web developement student, before I got into web developement I was an economist, I got a masters degree in supply chain management, but then I decided to follow my passion and get into programming by joining Youcode, now I’m a first year student in Youcode, and I’m working hard to be an expert programmer.', 'Sans-titre-4.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
