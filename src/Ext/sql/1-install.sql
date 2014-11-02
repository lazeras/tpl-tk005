

-- --------------------------------------------------------
--
-- Table structure for table `session`
--
DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
   `id` VARCHAR(127) NOT NULL,
   `data` LONGTEXT,
   `modified` DATETIME NOT NULL,
   `created` DATETIME NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB;


-- --------------------------------------------------------
--
-- Table structure for table `config`
--
DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `group` VARCHAR(64) NOT NULL DEFAULT '',
  `key` VARCHAR(64) NOT NULL DEFAULT '',
  `value` TEXT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`),
  KEY `group` (`group`)
) ENGINE=InnoDB;

INSERT INTO `config` (`group`, `key`, `value`) VALUES
('system', 'system.site.title', 'Tk004'),
('system', 'system.site.email', 'email@example.com'),
('system', 'system.site.description', ''),
('system', 'system.site.keywords', ''),
('system', 'mail.sig', '\nThank You!'),
('system', 'system.maintenanceMode', '0'),
('system', 'system.log.emailLevel', '\\Tk\\Log\\Log::EMAIL'),
('system', 'system.timezone', 'Australia/Victoria'),
('system', 'system.language', 'en_AU'),
('system', 'system.filesystem.ftpEnable', '0'),
('system', 'system.ftp.host', 'localhost'),
('system', 'system.ftp.user', ''),
('system', 'system.ftp.pass', ''),
('system', 'system.ftp.port', '21'),
('system', 'system.ftp.remotePath', ''),
('system', 'system.ftp.retries', '3'),
('system', 'system.ftp.ftpPasv', '0'),
('system', 'system.site.email.support', ''),
('system', 'system.site.email.dev', ''),
('system', 'system.google.apikey', ''),
('system', 'system.site.proxy', ''),
('system', 'system.enableSsl', ''),
('system', 'system.maintenance.enable', ''),
('system', 'system.maintenance.message', '<h2>Down For Maintenance.</h2><p>The site is currently offline for maintenance, please try again soon.</p>'),
('system', 'system.maintenance.access.ip', ''),
('system', 'system.maintenance.access.permission', 'admin');








