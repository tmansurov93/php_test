/*
SQLyog Ultimate v8.8 
MySQL - 5.5.25 : Database - test_comp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`test_comp` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `test_comp`;

/*Table structure for table `employees` */

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id_employees` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `m_name` varchar(60) NOT NULL,
  `position` varchar(60) NOT NULL,
  `date_e` date NOT NULL,
  `country` varchar(30) NOT NULL,
  `home_address` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `status_e` enum('0','1') NOT NULL,
  `date_insert` date NOT NULL,
  PRIMARY KEY (`id_employees`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `employees` */

insert  into `employees`(`id_employees`,`f_name`,`l_name`,`m_name`,`position`,`date_e`,`country`,`home_address`,`email_address`,`phone_number`,`status_e`,`date_insert`) values (1,'Дмитрий','Афанасиев','Георгиевич','Программист','1990-07-11','Russia','Марата 58, СПБ','dima90@mail.ru','79684128954','0','2019-10-11'),(2,'Назарова','Анастасия','Филиповна','Программист','1993-07-15','Russia','Салова 86','nazarova65@mail.ru','79614585854','0','2019-10-11'),(3,'Бистриков','Денис','Дмитриевич','Уборшик','1977-07-14','Russia','Попова','denis@mail.ru','79531257811','0','2019-10-11');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) COLLATE utf8_danish_ci NOT NULL,
  `parol` varchar(50) COLLATE utf8_danish_ci NOT NULL DEFAULT '',
  `fio` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `status` enum('a','u') COLLATE utf8_danish_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8_danish_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_danish_ci NOT NULL DEFAULT '',
  `status_u` enum('admin','user') COLLATE utf8_danish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`login`,`parol`,`fio`,`status`,`avatar`,`email`,`status_u`) values (1,'admin','admin','admin','a','avatar_admin.jpg','admin@info.ru','admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
