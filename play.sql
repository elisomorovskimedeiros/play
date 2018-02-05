-- MySQL dump 10.16  Distrib 10.1.28-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: play
-- ------------------------------------------------------
-- Server version	10.1.28-MariaDB

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
-- Table structure for table `brinquedo`
--

DROP TABLE IF EXISTS `brinquedo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brinquedo` (
  `id_brinquedo` int(11) NOT NULL AUTO_INCREMENT,
  `nome_brinquedo` varchar(45) DEFAULT NULL,
  `valor_brinquedo` float NOT NULL DEFAULT '0',
  `quantidade` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_brinquedo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brinquedo`
--

LOCK TABLES `brinquedo` WRITE;
/*!40000 ALTER TABLE `brinquedo` DISABLE KEYS */;
INSERT INTO `brinquedo` VALUES (1,'Cama ElÃ¡stica 2,5m',130,3);
/*!40000 ALTER TABLE `brinquedo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `CPF` varchar(45) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='Tabela com dados dos clientes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Silvia Maria','111.111.111-00','Rua das verdes Ã¡guas, 52','','(51)988557744'),(2,'Silvia Maria','111.111.111-00','Rua das verdes Ã¡guas, 52','','(51)988557744'),(3,'Silvia Maria','111.111.111-00','Rua das verdes Ã¡guas, 52','','(51)988557744'),(4,'Silvia Maria','111.111.111-00','Rua das verdes Ã¡guas, 52','','(51)988557744'),(5,'Silvia Maria','000.111.111-00','Rua das verdes Ã¡guas, 52','','(51)988557744'),(6,'Silvia Maria','222.111.111-00','Rua das verdes Ã¡guas, 52','','(51)988557744'),(7,'Silvia Maria','222.111.111-00','Rua das verdes Ã¡guas, 52','','(51)988557744'),(8,'Silvia Maria','222.111.111-00','Rua das verdes Ã¡guas, 52','','(51)988557744'),(9,'Silvia Maria','222.111.111-00','Rua das verdes Ã¡guas, 52','','(51)988557744'),(10,'Silvia Maria','222.111.111-00','Rua das verdes Ã¡guas, 52','','(51)988557744'),(11,'Silvia Maria','333.111.111-00','Rua das verdes Ã¡guas, 52','','(51)988557744'),(12,'Silvia Maria','444.111.111-00','Rua das verdes Ã¡guas, 52','','(51)988557744');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `cliente_id_cliente` int(11) NOT NULL,
  `valor_total` double DEFAULT NULL,
  `valor_desconto` double DEFAULT NULL,
  `valor_sinal` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_evento`,`cliente_id_cliente`),
  KEY `fk_evento_cliente1_idx` (`cliente_id_cliente`),
  CONSTRAINT `fk_evento_cliente1` FOREIGN KEY (`cliente_id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES (1,'2018-02-16 00:00:00','Rua Equador, 165','CapÃ£o da Canoa',12,200,0,'30'),(2,'2018-02-16 00:00:00','Rua Equador, 165','CapÃ£o da Canoa',6,200,0,'30');
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento_contem_brinquedo`
--

DROP TABLE IF EXISTS `evento_contem_brinquedo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento_contem_brinquedo` (
  `id_evento` int(11) NOT NULL,
  `id_brinquedo` int(11) DEFAULT NULL,
  KEY `fk_evento` (`id_evento`),
  KEY `fk_brinquedo` (`id_brinquedo`),
  CONSTRAINT `fk_brinquedo` FOREIGN KEY (`id_brinquedo`) REFERENCES `brinquedo` (`id_brinquedo`),
  CONSTRAINT `fk_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento_contem_brinquedo`
--

LOCK TABLES `evento_contem_brinquedo` WRITE;
/*!40000 ALTER TABLE `evento_contem_brinquedo` DISABLE KEYS */;
INSERT INTO `evento_contem_brinquedo` VALUES (1,1);
/*!40000 ALTER TABLE `evento_contem_brinquedo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-05 19:06:12
