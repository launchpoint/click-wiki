
CREATE TABLE IF NOT EXISTS `wikis` (
  `id` int(11) NOT NULL auto_increment,
  `path` varchar(500) NOT NULL,
  `current_version_id` int(11) NOT NULL COMMENT 'wiki_versions',
  PRIMARY KEY  (`id`),
  KEY `path` (`path`,`current_version_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;




CREATE TABLE IF NOT EXISTS `wiki_versions` (
  `id` int(11) NOT NULL auto_increment,
  `created_at` datetime NOT NULL,
  title varchar(500) not null,
  `body` longtext NOT NULL,
  `author_id` int(11) NOT NULL COMMENT 'users',
  PRIMARY KEY  (`id`),
  KEY `created_at` (`created_at`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

