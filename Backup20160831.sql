CREATE DATABASE  IF NOT EXISTS `longevo` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `longevo`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: longevo
-- ------------------------------------------------------
-- Server version	5.5.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `chamado`
--

DROP TABLE IF EXISTS `chamado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chamado`
--

LOCK TABLES `chamado` WRITE;
/*!40000 ALTER TABLE `chamado` DISABLE KEYS */;
INSERT INTO `chamado` VALUES (1,'Primeiro Chamado','Observação do Primeiro Chamado',1,1),(2,'Segundo Chamado','Observação do Segundo Chamado',2,2),(3,'Terceiro Chamado','Observação do Terceira Chamado',3,1),(4,'Quarto Chamado','Observação do Quarta Chamado',4,4),(5,'Quinto  Chamado','Observação do Quinta Chamado',5,4),(6,'Sexto  Chamado','Observação do Sexto Chamado',6,1),(7,'Sétimo  Chamado','Observação do Sétima Chamado',7,5),(8,'Oitavo  Chamado','Observação do Oitavo Chamado',8,6),(9,'Nono Chamado','Observação do Nono Chamado',9,6),(10,'Décima Chamado','Observação do Décimo Chamado',10,6),(11,'Décima primeira','Observação do Décimo primeira Chamado',16,1);
/*!40000 ALTER TABLE `chamado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cliente_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'B6x70tp4wx','qPGYsDLX1e@gmail.com'),(2,'yGVrLuXoBl','G2LzjBYSv6@gmail.com'),(3,'ciF08ihfrG','r2pbeawTy5@gmail.com'),(4,'vVex8PJnLg','KRJPUsB5nm@gmail.com'),(5,'z19cbnGCXS','QvN5uYziI1@gmail.com'),(6,'drinSRU8qP','QCb0AbvsNO@gmail.com'),(7,'jEfKgt8tSl','ackeZkdYil@gmail.com'),(8,'xI3UOKAXNQ','2dQaiQroCJ@gmail.com'),(9,'7XVJLVsL8T','2M97o1WC08@gmail.com'),(10,'nnjeAzyL1v','NO4vYuAhvU@gmail.com'),(11,'JMfhIOsqWm','w03WuZFGPt@gmail.com'),(16,'Chamado','chamado@chamado.com.br');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (1,'Hj2S79H3Wd'),(2,'KDlFnmtl9c'),(3,'P8kpyfo1ol'),(4,'O8k7jpVa6O'),(5,'yzkMJjgZJy'),(6,'QiWG3jYV51'),(7,'W872zaMmcC'),(8,'aRmshFVHjf'),(9,'2euf0s2qUN'),(10,'UJgD04nWyy'),(11,'g6cQfcnx4x');
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-31 22:47:39
