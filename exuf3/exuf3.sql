--
-- Database: `exUF3`
--
CREATE DATABASE IF NOT EXISTS `exUF3` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `exUF3`;


-- --------------------------------------------------------


--
-- Estructura de la taula `rols`
--


DROP TABLE IF EXISTS `rols`;
CREATE TABLE IF NOT EXISTS `rols` (
`idrols` int(11) NOT NULL,
  `description` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


--
-- Bolcant dades de la taula `rols`
--


INSERT INTO `rols` (`idrols`, `description`) VALUES
(1, 'guest'),
(2, 'user'),
(3, 'admin');


-- --------------------------------------------------------


--
-- Estructura de la taula `sessions`
--


DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
`idsessions` int(11) NOT NULL,
  `sessid` varchar(45) NOT NULL,
  `created` varchar(45) NOT NULL,
  `users_idusers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------


--
-- Estructura de la taula `users`
--


DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`idusers` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` varchar(128) DEFAULT NULL,
  `rol` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


--
-- Bolcant dades de la taula `users`
--


INSERT INTO `users` (`idusers`, `name`, `email`, `pass`, `rol`) VALUES
(1, 'admin', 'admin@sys.com', '12345', 3);


--
-- Indexes for dumped tables
--


--
-- Indexes for table `rols`
--
ALTER TABLE `rols`
 ADD PRIMARY KEY (`idrols`);


--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
 ADD PRIMARY KEY (`idsessions`), ADD KEY `fk_sessions_users1_idx` (`users_idusers`);


--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`idusers`), ADD KEY `fk_users_rols1_idx` (`rol`);


--
-- AUTO_INCREMENT for dumped tables
--


--
-- AUTO_INCREMENT for table `rols`
--
ALTER TABLE `rols`
MODIFY `idrols` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
MODIFY `idsessions` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restriccions per taules bolcades
--


--
-- Restriccions per la taula `sessions`
--
ALTER TABLE `sessions`
ADD CONSTRAINT `fk_sessions_users1` FOREIGN KEY (`users_idusers`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;