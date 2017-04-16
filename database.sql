CREATE TABLE `banner_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(55) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `view_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `page_url` varchar(255) NOT NULL,
  `views_count` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
