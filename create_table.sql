delimiter $$

CREATE TABLE `cliente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cliente_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci$$

delimiter $$

CREATE TABLE `pedido` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci$$

delimiter $$

CREATE TABLE `chamado` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `observacao` text COLLATE utf8_unicode_ci NOT NULL,
  `clienteid` int(10) unsigned NOT NULL,
  `pedidoid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `chamado_clienteid_foreign` (`clienteid`),
  KEY `chamado_pedidoid_foreign` (`pedidoid`),
  CONSTRAINT `chamado_pedidoid_foreign` FOREIGN KEY (`pedidoid`) REFERENCES `pedido` (`id`),
  CONSTRAINT `chamado_clienteid_foreign` FOREIGN KEY (`clienteid`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci$$




