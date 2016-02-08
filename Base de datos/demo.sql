-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: localhost    Database: mda
-- ------------------------------------------------------
-- Server version	5.6.27

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
-- Table structure for table `Actividad`
--

DROP TABLE IF EXISTS `Actividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Actividad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `lugar` varchar(45) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `evento` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT 'activa',
  `imagen` varchar(45) DEFAULT 'assets/img/actividad.png',
  PRIMARY KEY (`id`),
  KEY `fk_Actividad_Evento1_idx` (`evento`),
  CONSTRAINT `fk_Actividad_Evento1` FOREIGN KEY (`evento`) REFERENCES `Evento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Actividad`
--

LOCK TABLES `Actividad` WRITE;
/*!40000 ALTER TABLE `Actividad` DISABLE KEYS */;
INSERT INTO `Actividad` VALUES (1,'Comida en la plaza','Paella en la plaza del pueblo','2015-12-20 00:00:00','Plaza del pueblo',0,12,'0','assets/img/actividad.png');
/*!40000 ALTER TABLE `Actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Comentario`
--

DROP TABLE IF EXISTS `Comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text NOT NULL,
  `nombre` varchar(45) NOT NULL DEFAULT 'Anonimo',
  `fecha` datetime NOT NULL,
  `actividad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Comentario_Actividad1_idx` (`actividad`),
  CONSTRAINT `fk_Comentario_Actividad1` FOREIGN KEY (`actividad`) REFERENCES `Actividad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Comentario`
--

LOCK TABLES `Comentario` WRITE;
/*!40000 ALTER TABLE `Comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `Comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cuenta`
--

DROP TABLE IF EXISTS `Cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cuenta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concepto` varchar(45) NOT NULL,
  `importe` float NOT NULL,
  `descripcion` text,
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `evento` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Inversion_Evento1_idx` (`evento`),
  CONSTRAINT `fk_Inversion_Evento1` FOREIGN KEY (`evento`) REFERENCES `Evento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cuenta`
--

LOCK TABLES `Cuenta` WRITE;
/*!40000 ALTER TABLE `Cuenta` DISABLE KEYS */;
INSERT INTO `Cuenta` VALUES (1,'Orquesta Badabadum',6500,'Orquesta',1,12,0,'2015-11-26 00:00:00'),(2,'Charanga Kualalula',2000,'Charanga',1,12,0,'2015-11-28 00:00:00'),(3,'Barra en la plaza',8000,'Barra',1,12,1,'2015-11-28 00:00:00'),(4,'Sudaderas',3500,'Sudaderas',1,12,0,'2015-11-29 00:00:00'),(7,'Orquesta',500,'Orquesta',1,1,0,'2016-02-07 13:00:08'),(8,'FinanciaciÃ³n Inicial',1000,'FinanciaciÃ³n',1,1,0,'2016-02-07 13:03:18'),(9,'FinanciaciÃ³n Inicial',1000,'F',1,1,1,'2016-02-07 13:04:37'),(11,'Camisetas',100,'C',1,1,0,'2016-02-07 13:15:20'),(12,'Orquesta2',1000,'C',1,1,1,'2016-02-07 13:29:55'),(13,'Abanicos',0,'Abanicos',100,1,1,'2016-02-07 13:33:07'),(14,'Coca Cola',5,'Camisetas',100,1,1,'2016-02-07 13:49:18'),(15,'Cervezas Alhambra',500,'Barriles',3,1,1,'2016-02-07 13:51:03'),(16,'Cervezas Alhambra',500,'Barriles',3,1,1,'2016-02-07 13:51:38'),(17,'FinanciaciÃ³n inicial',100000,'PequeÃ±a financiaciÃ³n inicial del evento',1,3,1,'2016-02-08 11:58:01'),(18,'Publicidad',1000,'Publicidad para el evento',1,3,0,'2016-02-08 12:01:52'),(19,'Coca Cola',0,'Coca Cola regala 10 barriles de Coca Cola',10,3,1,'2016-02-08 12:03:24'),(20,'Orquesta Ciudad de Granada',4000,'ContrataciÃ³n de la orquesta Ciudad de Granada',1,3,0,'2016-02-08 12:06:45'),(21,'Comercios locales',10000,'AportaciÃ³n de los comercios locales al evento',1,3,1,'2016-02-08 12:08:12');
/*!40000 ALTER TABLE `Cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Evento`
--

DROP TABLE IF EXISTS `Evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `lugar` varchar(45) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `imagen` varchar(45) DEFAULT 'assets/img/evento.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Evento`
--

LOCK TABLES `Evento` WRITE;
/*!40000 ALTER TABLE `Evento` DISABLE KEYS */;
INSERT INTO `Evento` VALUES (1,'Fiestas Lobras 2016','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent lobortis sagittis interdum. Pellentesque eleifend in nunc eget elementum. Ut efficitur dictum purus, ut suscipit lectus consequat a. Nunc ut risus venenatis, bibendum tortor ut, imperdiet dui. Ut consectetur diam nec leo viverra, vitae consectetur velit cursus. Phasellus eget ligula mattis, semper justo eu, venenatis enim.','Lobras (Granada)','2016-08-20','2016-08-29','assets/img/lobras.jpg'),(2,'Fiestas Carataunas 2016','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent lobortis sagittis interdum. Pellentesque eleifend in nunc eget elementum. Ut efficitur dictum purus, ut suscipit lectus consequat a. Nunc ut risus venenatis, bibendum tortor ut, imperdiet dui. Ut consectetur diam nec leo viverra, vitae consectetur velit cursus. Phasellus eget ligula mattis, semper justo eu, venenatis enim.','Carataunas (Granada)','2016-08-01','2016-08-08','assets/img/carataunas.jpg'),(3,'Fiestas Corpus 2016','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent lobortis sagittis interdum. Pellentesque eleifend in nunc eget elementum. Ut efficitur dictum purus, ut suscipit lectus consequat a. Nunc ut risus venenatis, bibendum tortor ut, imperdiet dui. Ut consectetur diam nec leo viverra, vitae consectetur velit cursus. Phasellus eget ligula mattis, semper justo eu, venenatis enim.','Granada','2016-05-21','2016-05-28','assets/img/corpus.jpg'),(12,'Feria de Sevilla 2016','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent lobortis sagittis interdum. Pellentesque eleifend in nunc eget elementum. Ut efficitur dictum purus, ut suscipit lectus consequat a. Nunc ut risus venenatis, bibendum tortor ut, imperdiet dui. Ut consectetur diam nec leo viverra, vitae consectetur velit cursus. Phasellus eget ligula mattis, semper justo eu, venenatis enim.','Sevilla','2016-04-12','2016-04-17','assets/img/sevilla.jpg'),(19,'Feria de AlmerÃ­a 2016','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent lobortis sagittis interdum. Pellentesque eleifend in nunc eget elementum. Ut efficitur dictum purus, ut suscipit lectus consequat a. Nunc ut risus venenatis, bibendum tortor ut, imperdiet dui. Ut consectetur diam nec leo viverra, vitae consectetur velit cursus. Phasellus eget ligula mattis, semper justo eu, venenatis enim.','AlmerÃ­a','2016-08-20','2016-08-27','assets/img/almeria.jpg'),(20,'Carnavales 2016','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent lobortis sagittis interdum. Pellentesque eleifend in nunc eget elementum. Ut efficitur dictum purus, ut suscipit lectus consequat a. Nunc ut risus venenatis, bibendum tortor ut, imperdiet dui. Ut consectetur diam nec leo viverra, vitae consectetur velit cursus. Phasellus eget ligula mattis, semper justo eu, venenatis enim.','Sierra Nevada (Granada)','2016-02-06','2016-02-14','assets/img/sierra_nevada.jpg');
/*!40000 ALTER TABLE `Evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Organizador`
--

DROP TABLE IF EXISTS `Organizador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Organizador` (
  `usuario` int(11) NOT NULL,
  `evento` int(11) NOT NULL,
  PRIMARY KEY (`usuario`,`evento`),
  KEY `fk_Usuario_has_Evento_Evento1_idx` (`evento`),
  KEY `fk_Usuario_has_Evento_Usuario_idx` (`usuario`),
  CONSTRAINT `fk_Usuario_has_Evento_Evento1` FOREIGN KEY (`evento`) REFERENCES `Evento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_has_Evento_Usuario` FOREIGN KEY (`usuario`) REFERENCES `Usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Organizador`
--

LOCK TABLES `Organizador` WRITE;
/*!40000 ALTER TABLE `Organizador` DISABLE KEYS */;
INSERT INTO `Organizador` VALUES (3,1),(3,2),(3,3),(196,3),(3,12),(199,20);
/*!40000 ALTER TABLE `Organizador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Patrocinador`
--

DROP TABLE IF EXISTS `Patrocinador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Patrocinador` (
  `idPatrocinador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `idEvento` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPatrocinador`),
  KEY `idEvento_idx` (`idEvento`),
  CONSTRAINT `idEvento` FOREIGN KEY (`idEvento`) REFERENCES `Evento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Patrocinador`
--

LOCK TABLES `Patrocinador` WRITE;
/*!40000 ALTER TABLE `Patrocinador` DISABLE KEYS */;
INSERT INTO `Patrocinador` VALUES (1,'Coca Cola',1),(2,'Cervezas Alhambra',1),(3,'Coca Cola',3);
/*!40000 ALTER TABLE `Patrocinador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Producto`
--

DROP TABLE IF EXISTS `Producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `precioCompra` float NOT NULL,
  `precioVenta` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `evento` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Producto_Evento1_idx` (`evento`),
  CONSTRAINT `fk_Producto_Evento1` FOREIGN KEY (`evento`) REFERENCES `Evento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Producto`
--

LOCK TABLES `Producto` WRITE;
/*!40000 ALTER TABLE `Producto` DISABLE KEYS */;
INSERT INTO `Producto` VALUES (1,'Sudaderas',10,20,200,12),(2,'Barril de cerveza',20,50,3,12),(5,'Camisetas',10,20,10,1),(6,'Abanicos',0,1,100,1),(7,'Camisetas..Coca Cola',0,5,100,1),(8,'Coca Cola..Coca Cola',0,100,10,3),(9,'Orquesta Ciudad de Granada',4000,8000,1,3);
/*!40000 ALTER TABLE `Producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `localizacion` varchar(45) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `imagen` varchar(45) DEFAULT 'assets/img/usuario.png',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  UNIQUE KEY `correo_UNIQUE` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuario`
--

LOCK TABLES `Usuario` WRITE;
/*!40000 ALTER TABLE `Usuario` DISABLE KEYS */;
INSERT INTO `Usuario` VALUES (3,'louri91','louri@correo.ugr.es','e10adc3949ba59abbe56e057f20f883e','Amanda','FernÃ¡ndez Piedra','Calle Mirlo','689909090','Granada','1991-02-19','assets/img/usuario.png'),(195,'Pedro','pedrito@gmail.com','14c9d9645bf3170f8f6252523f124cce','Pedro','Gómez','','','','0000-00-00','assets/img/usuario.png'),(196,'Alejandro','pedrito2@gmail.com','14c9d9645bf3170f8f6252523f124cce','Alejandro','Valverde','','','','0000-00-00','assets/img/usuario.png'),(197,'Carlos','benito@gmail.com','40eeeb8d51a50472130f58ac6698e142','Carlos','López','','','','0000-00-00','assets/img/usuario.png'),(198,'Carmen','camela@gmail.com','f9becb1f339bf74477b88a7373cebf1a','Carmen','','','','','0000-00-00','assets/img/usuario.png'),(199,'Maria','louri91@gmail.com','47e8ce3fe1245476051a1c81820e30fe','Louri','Fernandez','Calle Benito','612345678','Granada','0000-00-00','assets/img/usuario.png'),(200,'Pepe','pepito@gmail.com','e10adc3949ba59abbe56e057f20f883e','','','','','','0000-00-00','assets/img/usuario.png'),(201,'Jose','donpepito@gmail.com','e10adc3949ba59abbe56e057f20f883e','','','','','','0000-00-00','assets/img/usuario.png');
/*!40000 ALTER TABLE `Usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Voto`
--

DROP TABLE IF EXISTS `Voto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Voto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `puntuacion` int(11) NOT NULL,
  `actividad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Voto_Actividad1_idx` (`actividad`),
  CONSTRAINT `fk_Voto_Actividad1` FOREIGN KEY (`actividad`) REFERENCES `Actividad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Voto`
--

LOCK TABLES `Voto` WRITE;
/*!40000 ALTER TABLE `Voto` DISABLE KEYS */;
/*!40000 ALTER TABLE `Voto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-08 12:11:17
