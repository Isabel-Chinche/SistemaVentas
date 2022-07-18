/*
SQLyog Community v8.71 
MySQL - 5.5.5-10.4.24-MariaDB : Database - salessystem
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`salessystem` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `salessystem`;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `description` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `category` */

insert  into `category`(`id`,`name`,`description`,`created_at`,`modified_at`) values (1,'Harina','Preparada','2022-07-12 16:08:26','2022-07-18 12:49:51'),(2,'Aceites Vegetales','De todas las marcas ','2022-07-15 23:29:17','2022-07-16 06:35:35'),(3,'Cereales','Quinua','2022-07-04 23:09:02',NULL),(5,'Lácteos','leche, yogurt','2022-07-11 20:06:07',NULL);

/*Table structure for table `claim` */

DROP TABLE IF EXISTS `claim`;

CREATE TABLE `claim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(200) NOT NULL,
  `client_id` int(11) NOT NULL,
  `type_message` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `client_id_2` (`client_id`),
  CONSTRAINT `claim_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `claim` */

insert  into `claim`(`id`,`description`,`client_id`,`type_message`,`created_at`,`modified_at`) values (1,'Queja en la entrega de productos',3,'Reclamo','2022-07-16 00:32:47','2022-07-16 07:37:03'),(3,'No enviaron comprobante de pago',1,'Reclamo','2022-07-16 11:50:18',NULL);

/*Table structure for table `client` */

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type_client` varchar(20) NOT NULL,
  `type_document` varchar(20) NOT NULL,
  `num_document` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `client` */

insert  into `client`(`id`,`name`,`type_client`,`type_document`,`num_document`,`address`,`phone_number`,`email`,`created_at`,`modified_at`) values (1,'Fabian laz','Otros','DNI','10000000','Jr. fabain 1001','100000001','fabian@gmail.com','2022-07-14 02:15:22','2022-07-16 06:39:36'),(2,'Mecados Paco','Empresa','RUC','10000000000','Jr. mercado paco 1002','100000001','mecadospaco@gmail.com','2022-07-15 23:38:37','0000-00-00 00:00:00'),(3,'Liz Diaz','Otros','DNI','10000004','Jr. Liz Diaz 1004','100000004','lizdiaz@gmail.com','2022-07-12 08:51:29','0000-00-00 00:00:00');

/*Table structure for table `p_order` */

DROP TABLE IF EXISTS `p_order`;

CREATE TABLE `p_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `cant` int(11) NOT NULL,
  `type_state` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `product` varchar(50) NOT NULL,
  `type_payment` varchar(50) NOT NULL,
  `type_delivery` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  CONSTRAINT `p_order_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `p_order` */

insert  into `p_order`(`id`,`client_id`,`description`,`cant`,`type_state`,`date`,`product`,`type_payment`,`type_delivery`,`address`,`created_at`,`modified_at`) values (1,1,'Solicito dos kilos de chifles ',2,'Entregado','2022-07-16 00:00:00','Chifles','Contra Entrega','Domicilio','Jr. Liz Diaz 1004','2022-07-16 19:44:37','2022-07-17 03:51:00'),(2,3,'Solicito dos kilos de almendras ',2,'Entregado','2022-07-17 00:00:00','Almendras','Contra Entrega','Trabajo','Jr. Liz Diaz 1005','2022-07-17 19:25:58','2022-07-18 02:26:52');

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(15) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` varchar(10) NOT NULL,
  `stock` int(5) NOT NULL,
  `picture` varchar(40) NOT NULL DEFAULT 'default.png',
  `category_id` int(5) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcode` (`barcode`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `product` */

insert  into `product`(`id`,`barcode`,`name`,`description`,`price`,`stock`,`picture`,`category_id`,`created_at`,`modified_at`) values (1,'1000000000000','Harina Molitalia','Harina preparada','2.10',34,'img1.png',1,'2022-07-10 23:17:02','2022-07-12 03:03:32'),(2,'1000000000001','Harina Blanca Flor','Harina para repostería','1.50',35,'img2.png',1,'2022-07-09 00:08:54','2022-07-12 03:04:39'),(4,'1000000000002','Harina Pan','Harina de trigo','2.50',19,'img4.png',1,'2022-07-10 09:56:55','2022-07-12 03:05:26'),(5,'1000000000003','Lecha Gloria ','Leche tarro chiquita','3.50',25,'img5.png',5,'2022-07-10 23:27:24','2022-07-12 03:06:44'),(6,'10000000000004','Primor Premium Botella 1 L','Aceite Vegetal Primor Premium Botella 1 L','1.20',20,'img6.png',2,'2022-07-09 23:36:26','2022-07-13 10:29:41');

/*Table structure for table `rol` */

DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `rol` */

insert  into `rol`(`id`,`name`) values (1,'Admin'),(2,'Vendedor');

/*Table structure for table `sale` */

DROP TABLE IF EXISTS `sale`;

CREATE TABLE `sale` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `subtotal` varchar(10) NOT NULL,
  `igv` varchar(10) NOT NULL,
  `discount` varchar(10) NOT NULL,
  `total` varchar(10) NOT NULL,
  `user_id` int(1) NOT NULL,
  `client_id` int(1) NOT NULL,
  `voucher_id` int(1) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `voucher_id` (`voucher_id`),
  KEY `client_id` (`client_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`voucher_id`) REFERENCES `voucher` (`id`),
  CONSTRAINT `sale_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  CONSTRAINT `sale_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `sale` */

insert  into `sale`(`id`,`subtotal`,`igv`,`discount`,`total`,`user_id`,`client_id`,`voucher_id`,`date`) values (1,'8.76','8.76','0.00','8.76',1,1,1,'2022-07-11 00:00:00'),(2,'52.00','52.00','5.30','56.06',1,2,2,'2022-07-15 00:00:00'),(3,'1.50','1.50','0.00','1.77',2,1,1,'2022-07-16 00:00:00'),(4,'36.15','36.15','12.78','29.88',2,2,2,'2022-07-16 00:00:00'),(5,'1.00','1.00','0.00','1.18',2,3,3,'2022-07-16 00:00:00'),(6,'3.50','3.50','0.00','3.50',1,1,1,'2022-07-12 00:00:00'),(7,'2.00','2.00','0.00','2.36',1,3,3,'2022-07-12 00:00:00'),(8,'3.69','3.69','0.00','4.35',1,2,2,'2022-07-12 17:40:24'),(9,'4.60','0.828','0.00','5.43',1,2,1,'2022-07-11 20:09:39'),(10,'17.00','3.06','0.00','20.06',1,3,1,'2022-07-16 20:04:46'),(11,'12.50','2.25','0.00','14.75',1,1,1,'2022-07-17 16:54:00');

/*Table structure for table `sale_detail` */

DROP TABLE IF EXISTS `sale_detail`;

CREATE TABLE `sale_detail` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `sale_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `cant` int(10) NOT NULL,
  `price` varchar(15) NOT NULL,
  `discount` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sale_id` (`sale_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `sale_detail_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `sale` (`id`),
  CONSTRAINT `sale_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

/*Data for the table `sale_detail` */

insert  into `sale_detail`(`id`,`sale_id`,`product_id`,`cant`,`price`,`discount`) values (1,1,2,2,'1.23','0.00'),(2,1,1,3,'2.10','0.00'),(3,2,6,10,'1.20','5.30'),(4,2,5,20,'0.50','5.30'),(5,2,4,12,'2.50','5.30'),(6,3,5,3,'0.50','0.00'),(7,4,4,12,'2.50','12.78'),(8,4,2,5,'1.23','12.78'),(9,5,5,2,'0.50','0.00'),(10,6,5,2,'0.50','0.00'),(11,6,4,1,'2.50','0.00'),(12,7,5,4,'0.50','0.00'),(13,8,2,3,'1.23','0.00'),(14,9,1,1,'2.10','0'),(15,9,4,1,'2.50','.'),(16,10,2,2,'1.50','0'),(17,10,5,4,'3.50','.'),(18,11,4,5,'2.50','0');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `picture` varchar(15) NOT NULL,
  `rol_id` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `rol_id` (`rol_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`email`,`phone_number`,`password`,`picture`,`rol_id`,`created_at`,`modified_at`) values (1,'Primer Admin ','primeradmin@gmail.com','100000001','81dc9bdb52d04dc20036dbd8313ed055','img1.png',1,'2022-07-10 03:35:46','2022-07-12 03:02:47'),(2,'Primer Empleado','primerempleado@gmail.com','100000002','81dc9bdb52d04dc20036dbd8313ed055','img2.png',1,'2022-07-16 01:01:03','2020-07-16 09:01:52'),(3,'Tercer Empleado','tercerempleado@gmail.com','987654321','81dc9bdb52d04dc20036dbd8313ed055','img3.png',2,'2022-07-14 15:07:10','0000-00-00 00:00:00'),(4,'Cuarto empleado','cuartouser@gmail.com','987654321','81dc9bdb52d04dc20036dbd8313ed055','img4.png',2,'2022-07-17 19:57:47','0000-00-00 00:00:00');

/*Table structure for table `voucher` */

DROP TABLE IF EXISTS `voucher`;

CREATE TABLE `voucher` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `igv` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `voucher` */

insert  into `voucher`(`id`,`name`,`igv`) values (1,'Factura',18),(2,'Boleta',0),(3,'Ticket',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
