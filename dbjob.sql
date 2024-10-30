

--
-- Base de données :  `dbjob`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidature`
--

CREATE TABLE `candidature` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `candidat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8mb4_unicode_ci,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` datetime NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `job`
--

INSERT INTO `job` (`id`, `type`, `company`, `description`, `expires_at`, `email`, `image`) VALUES
(1, 'Webmaster', 'OffShoreBox', 'J2EE et FullStack ', '2020-05-01 17:01:39', 'haykel@gmail.com', ''),
(2, 'Developpeur', 'OffShoreBox', 'J2EE et FullStack ', '2020-05-01 17:02:42', 'haykel@gmail.com', ''),
(3, 'Developpeur', 'OffShoreBox', 'J2EE et FullStack ', '2020-05-12 17:19:30', 'haykel@gmail.com', ''),
(4, 'Chef de projet', 'Vermag', 'Expérimentée', '2020-06-01 00:00:00', 'Tunipages@gmail.com', '');

-- --------------------------------------------------------

-- Index pour les tables déchargées
--

--
-- Index pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E33BD3B8BE04EA9` (`job_id`);

--
-- Index pour la table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidature`
--
ALTER TABLE `candidature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidature`
--
-- Déchargement des données de la table `candidature`
--

INSERT INTO `candidature` (`id`, `job_id`, `candidat`, `contenu`, `date`) VALUES
(1, 3, 'Rhaiem Chouchane', 'formation J2EE', '2020-05-12 00:00:00'),
(2, 1, 'Ben Hassine Mourad', 'Symfony, PHP5', '2020-06-15 00:00:00'),
(3, 3, 'Ben Hassan', 'J2EE, Angular', '2020-06-17 00:00:00');
--
ALTER TABLE `candidature`
  ADD CONSTRAINT `FK_E33BD3B8BE04EA9` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`);
