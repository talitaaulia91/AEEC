/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - aeec
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`aeec` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `aeec`;

/*Table structure for table `batch_program` */

DROP TABLE IF EXISTS `batch_program`;

CREATE TABLE `batch_program` (
  `ID_BATCH` char(10) NOT NULL,
  `ID_PROGRAM` char(10) NOT NULL,
  `NAMA_CLASS` varchar(255) NOT NULL,
  `TGL_MULAI` date NOT NULL,
  `TGL_BERAKHIR` date DEFAULT NULL,
  `BATCH` int(11) DEFAULT NULL,
  `KUOTA` int(11) DEFAULT NULL,
  `STATUS` char(1) NOT NULL DEFAULT '1',
  `WAKTU_MULAI` time DEFAULT NULL,
  `WAKTU_BERAKHIR` time DEFAULT NULL,
  `IMAGE` text DEFAULT NULL,
  PRIMARY KEY (`ID_BATCH`),
  KEY `fk_batch_program` (`ID_PROGRAM`),
  CONSTRAINT `fk_batch_program` FOREIGN KEY (`ID_PROGRAM`) REFERENCES `program` (`ID_PROGRAM`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `batch_program` */

insert  into `batch_program`(`ID_BATCH`,`ID_PROGRAM`,`NAMA_CLASS`,`TGL_MULAI`,`TGL_BERAKHIR`,`BATCH`,`KUOTA`,`STATUS`,`WAKTU_MULAI`,`WAKTU_BERAKHIR`,`IMAGE`) values 
('DL001','DL','DIGITAL LEADERSHIP BATCH 1','2022-04-28','2022-04-28',1,20,'1',NULL,NULL,NULL),
('FFNF001','FFNF','FINANCE ACCOUNTING FOR NON-FINANCIAL MANAGER BATCH 1','2022-04-28','2022-04-28',1,20,'1',NULL,NULL,NULL),
('SMA','ET','Strategic Management Accounting : Cost and Value - Virtual','2021-03-13',NULL,NULL,20,'1','09:30:00','10:30:00','register (3).png');

/*Table structure for table `cashback` */

DROP TABLE IF EXISTS `cashback`;

CREATE TABLE `cashback` (
  `ID_CASHBACK` char(8) NOT NULL,
  `ID_USER` char(10) NOT NULL,
  `NOMINAL` int(11) NOT NULL,
  `KADALUWARSA` date NOT NULL,
  `CREATED_AT` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_CASHBACK`),
  KEY `fk_user` (`ID_USER`),
  CONSTRAINT `fk_user` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `cashback` */

insert  into `cashback`(`ID_CASHBACK`,`ID_USER`,`NOMINAL`,`KADALUWARSA`,`CREATED_AT`) values 
('C0622001','US04220003',222000,'2023-06-04','2022-06-04 11:05:40');

/*Table structure for table `client` */

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client` (
  `ID_CLIENT` char(10) NOT NULL,
  `ID_USER` char(10) NOT NULL,
  `NAMA` varchar(255) NOT NULL,
  `JK` char(1) NOT NULL,
  `NO_TELP` varchar(14) NOT NULL,
  `NPWP` varchar(17) NOT NULL,
  `ALAMAT_NPWP` varchar(255) NOT NULL,
  `ALAMAT_RUMAH` varchar(255) NOT NULL,
  `INSTANSI` varchar(255) DEFAULT NULL,
  `JABATAN` varchar(255) DEFAULT NULL,
  `BERKAS_NPWP` varchar(255) DEFAULT NULL,
  `ALUMNI` char(1) NOT NULL,
  `ID_FAKULTAS` char(3) DEFAULT NULL,
  `CREATED_AT` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_CLIENT`),
  KEY `FK_MEMILIKI_AKUN` (`ID_USER`),
  KEY `FK_FAKULTAS` (`ID_FAKULTAS`),
  CONSTRAINT `FK_FAKULTAS` FOREIGN KEY (`ID_FAKULTAS`) REFERENCES `fakultas` (`ID_FAKULTAS`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_MEMILIKI_AKUN` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `client` */

insert  into `client`(`ID_CLIENT`,`ID_USER`,`NAMA`,`JK`,`NO_TELP`,`NPWP`,`ALAMAT_NPWP`,`ALAMAT_RUMAH`,`INSTANSI`,`JABATAN`,`BERKAS_NPWP`,`ALUMNI`,`ID_FAKULTAS`,`CREATED_AT`) values 
('PS06220001','US05220001','tes1','0','085706568677','123','JL JOYOBOYO 89','JL JOYOBOYO 89','unair','dosen','basketball.jpg','0','F16','2022-06-02'),
('PS06220002','US05220002','tes2','1','085706568677','123','JL JOYOBOYO 89','JL JOYOBOYO 89','unair','DW3D','white-paper-texture.jpg','0',NULL,'2022-06-02'),
('PS06220003','US05220003','tes3','1','085706568677','123','JL JOYOBOYO 89','JL JOYOBOYO 89','unair','dosen','basketball.jpg','1','F13','2022-06-02'),
('PS06220004','US04220003','Hamimma Talita Aulia','1','085706568677','123','JL JOYOBOYO 89','JL JOYOBOYO 89','unair','dosen','basketball.jpg','0',NULL,'2022-06-04'),
('PS06220005','US04220003','Hamimma Talita Aulia','1','085706568677','123','JL JOYOBOYO 89','JL JOYOBOYO 89','unair','dosen','basketball.jpg','0',NULL,'2022-06-04');

/*Table structure for table `detail_program` */

DROP TABLE IF EXISTS `detail_program`;

CREATE TABLE `detail_program` (
  `ID_DETAIL` char(4) NOT NULL,
  `ID_PROGRAM` char(10) NOT NULL,
  `ID_JADWAL` char(3) NOT NULL,
  PRIMARY KEY (`ID_DETAIL`),
  KEY `fk_program` (`ID_PROGRAM`),
  KEY `fk_jadwal` (`ID_JADWAL`),
  CONSTRAINT `fk_jadwal` FOREIGN KEY (`ID_JADWAL`) REFERENCES `jadwal` (`ID_JADWAL`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_program` FOREIGN KEY (`ID_PROGRAM`) REFERENCES `program` (`ID_PROGRAM`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_program` */

insert  into `detail_program`(`ID_DETAIL`,`ID_PROGRAM`,`ID_JADWAL`) values 
('DJ01','DL','J03'),
('DJ02','DL','J01'),
('DJ03','FFNF','J01'),
('DJ04','FFNF','J03');

/*Table structure for table `diskon` */

DROP TABLE IF EXISTS `diskon`;

CREATE TABLE `diskon` (
  `ID_DISKON` char(3) NOT NULL,
  `NAMA_DISKON` varchar(50) NOT NULL,
  `PERSENTASE` int(11) NOT NULL,
  `BENTUK` varchar(255) NOT NULL,
  `DESKRIPSI` text DEFAULT NULL,
  PRIMARY KEY (`ID_DISKON`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `diskon` */

insert  into `diskon`(`ID_DISKON`,`NAMA_DISKON`,`PERSENTASE`,`BENTUK`,`DESKRIPSI`) values 
('D01','Voucher 5%',5,'voucher',NULL),
('D02','Cashback 10%',10,'cashback',NULL),
('D03','Cashback 5% ',5,'cashback','\r\n   \r\n ');

/*Table structure for table `fakultas` */

DROP TABLE IF EXISTS `fakultas`;

CREATE TABLE `fakultas` (
  `ID_FAKULTAS` char(3) NOT NULL,
  `NAMA_FAKULTAS` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_FAKULTAS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `fakultas` */

insert  into `fakultas`(`ID_FAKULTAS`,`NAMA_FAKULTAS`) values 
('F01','FAKULTAS ILMU BUDAYA'),
('F02','FAKULTAS EKONOMI DAN BISNIS'),
('F03','FAKULTAS KEDOKTERAN'),
('F04','FAKULTAS KEDOKTERAN GIGI'),
('F05','FAKULTAS KEDOKTERAN HEWAN'),
('F06','FAKULTAS PERIKANAN DAN KELAUTAN'),
('F07','FAKULTAS PSIKOLOGI'),
('F08','FAKULTAS FARMASI'),
('F09','FAKULTAS KESEHATAN MASYARAKAT'),
('F10','FAKULTAS SAINS DAN TEKNOLOGI'),
('F11','FAKULTAS HUKUM'),
('F12','FAKULTAS KEPERAWATAN'),
('F13','FAKULTAS ILMU SOSIAL DAN POLITIK'),
('F14','FAKULTAS VOKASI'),
('F15','SEKOLAH PASCASARJANA'),
('F16','FAKULTAS TEKNOLOGI MAJU DAN MULTIDISIPLIN');

/*Table structure for table `hari` */

DROP TABLE IF EXISTS `hari`;

CREATE TABLE `hari` (
  `ID_HARI` char(2) NOT NULL,
  `NAMA_HARI` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_HARI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `hari` */

insert  into `hari`(`ID_HARI`,`NAMA_HARI`) values 
('H1','SENIN'),
('H2','SELASA'),
('H3','RABU'),
('H4','KAMIS'),
('H5','JUMAT'),
('H6','SABTU'),
('H7','MINGGU');

/*Table structure for table `histori` */

DROP TABLE IF EXISTS `histori`;

CREATE TABLE `histori` (
  `ID_HISTORI` char(10) NOT NULL,
  `ID_CLIENT` char(10) NOT NULL,
  `ID_PENDAFTARAN` char(10) NOT NULL,
  `CREATED_AT` datetime NOT NULL DEFAULT current_timestamp(),
  `STATUS` char(1) NOT NULL DEFAULT '0',
  `USERNAME_MOOC` varchar(255) DEFAULT NULL,
  `PASSWORD_MOOC` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_HISTORI`),
  KEY `fk_histori_client` (`ID_CLIENT`),
  KEY `fk_histori` (`ID_PENDAFTARAN`),
  CONSTRAINT `fk_histori` FOREIGN KEY (`ID_PENDAFTARAN`) REFERENCES `pendaftaran` (`ID_PENDAFTARAN`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_histori_client` FOREIGN KEY (`ID_CLIENT`) REFERENCES `client` (`ID_CLIENT`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `histori` */

/*Table structure for table `jadwal` */

DROP TABLE IF EXISTS `jadwal`;

CREATE TABLE `jadwal` (
  `ID_JADWAL` char(3) NOT NULL,
  `ID_HARI` char(3) NOT NULL,
  `ID_WAKTU` char(3) NOT NULL,
  PRIMARY KEY (`ID_JADWAL`),
  KEY `fk_hari` (`ID_HARI`),
  KEY `fk_waktu` (`ID_WAKTU`),
  CONSTRAINT `fk_hari` FOREIGN KEY (`ID_HARI`) REFERENCES `hari` (`ID_HARI`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_waktu` FOREIGN KEY (`ID_WAKTU`) REFERENCES `waktu` (`ID_WAKTU`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `jadwal` */

insert  into `jadwal`(`ID_JADWAL`,`ID_HARI`,`ID_WAKTU`) values 
('J01','H2','T01'),
('J02','H3','T02'),
('J03','H4','T01'),
('J04','H5','T02'),
('J05','H6','T03'),
('J06','H1','T02'),
('J07','H1','T01');

/*Table structure for table `kategori_program` */

DROP TABLE IF EXISTS `kategori_program`;

CREATE TABLE `kategori_program` (
  `ID_KATEGORI` char(5) NOT NULL,
  `NAMA_KATEGORI` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_KATEGORI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kategori_program` */

insert  into `kategori_program`(`ID_KATEGORI`,`NAMA_KATEGORI`) values 
('IHT','In House Training'),
('NRC','Non-Regular Class'),
('RC','Regular Class');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `ID_PEMBAYARAN` char(10) NOT NULL,
  `ID_PENDAFTARAN` char(10) NOT NULL,
  `TGL_PEMBAYARAN` date NOT NULL,
  `NOMINAL` int(11) NOT NULL,
  `BUKTI` varchar(1024) NOT NULL,
  `STATUS` char(1) NOT NULL,
  PRIMARY KEY (`ID_PEMBAYARAN`),
  KEY `FK_HARUS_MELAKUKAN` (`ID_PENDAFTARAN`),
  CONSTRAINT `FK_HARUS_MELAKUKAN` FOREIGN KEY (`ID_PENDAFTARAN`) REFERENCES `pendaftaran` (`ID_PENDAFTARAN`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pembayaran` */

/*Table structure for table `pendaftaran` */

DROP TABLE IF EXISTS `pendaftaran`;

CREATE TABLE `pendaftaran` (
  `ID_PENDAFTARAN` char(10) NOT NULL,
  `ID_BATCH` char(10) NOT NULL,
  `ID_CLIENT` char(10) NOT NULL,
  `ID_DISKON` char(3) DEFAULT NULL,
  `TGL_PENDAFTARAN` date NOT NULL,
  `HARGA_AWAL` int(11) DEFAULT NULL,
  `DISKON` int(11) DEFAULT NULL,
  `POTONGAN` int(11) DEFAULT NULL,
  `TAGIHAN` int(11) NOT NULL,
  `CASHBACK` int(11) DEFAULT NULL,
  `VIRTUAL_ACC` varchar(1024) DEFAULT NULL,
  `STATUS` char(1) NOT NULL,
  PRIMARY KEY (`ID_PENDAFTARAN`),
  KEY `FK_MELAKUKAN` (`ID_CLIENT`),
  KEY `FK_MEMILIH` (`ID_BATCH`),
  KEY `FK_MENDAPATKAN` (`ID_DISKON`),
  CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`ID_CLIENT`) REFERENCES `client` (`ID_CLIENT`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_MENDAPATKAN` FOREIGN KEY (`ID_DISKON`) REFERENCES `diskon` (`ID_DISKON`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_batch` FOREIGN KEY (`ID_BATCH`) REFERENCES `batch_program` (`ID_BATCH`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pendaftaran` */

/*Table structure for table `penilaian` */

DROP TABLE IF EXISTS `penilaian`;

CREATE TABLE `penilaian` (
  `ID_NILAI` char(10) NOT NULL,
  `ID_HISTORI` char(10) NOT NULL,
  `NILAI` int(11) NOT NULL DEFAULT 0,
  `CREATED_AT` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_NILAI`),
  KEY `fk_histori_nilai` (`ID_HISTORI`),
  CONSTRAINT `fk_histori_nilai` FOREIGN KEY (`ID_HISTORI`) REFERENCES `histori` (`ID_HISTORI`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `penilaian` */

/*Table structure for table `penyimpanan` */

DROP TABLE IF EXISTS `penyimpanan`;

CREATE TABLE `penyimpanan` (
  `ID_PENYIMPANAN` char(10) NOT NULL,
  `ID_CLIENT` char(10) NOT NULL,
  `FOLLOW_IG` varchar(255) DEFAULT NULL,
  `LIKE_IG` varchar(255) DEFAULT NULL,
  `FOLLOW_LINKEDIN` varchar(255) DEFAULT NULL,
  `LIKE_LINKEDIN` varchar(255) DEFAULT NULL,
  `SUBS_YT` varchar(255) DEFAULT NULL,
  `LIKE_YT` varchar(255) DEFAULT NULL,
  `TWITTER` varchar(255) DEFAULT NULL,
  `FACEBOOK` varchar(255) DEFAULT NULL,
  `CREATED_AT` date DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_PENYIMPANAN`),
  KEY `fk_client_sosmed` (`ID_CLIENT`),
  CONSTRAINT `fk_client_sosmed` FOREIGN KEY (`ID_CLIENT`) REFERENCES `client` (`ID_CLIENT`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `penyimpanan` */

insert  into `penyimpanan`(`ID_PENYIMPANAN`,`ID_CLIENT`,`FOLLOW_IG`,`LIKE_IG`,`FOLLOW_LINKEDIN`,`LIKE_LINKEDIN`,`SUBS_YT`,`LIKE_YT`,`TWITTER`,`FACEBOOK`,`CREATED_AT`) values 
('SM06220001','PS06220004','629ad0ed1d041.jpg','629ad0ed1d7c0.jpg','629ad0ed1dd80.jpg','629ad0ed1e219.jpg','629ad0ed1e6aa.jpg','629ad0ed1eaca.jpg','629ad0ed1eebd.jpg','629ad0ed1f2ec.webp','2022-06-04'),
('SM06220002','PS06220004','629ad2907cf1b.jpg','629ad2907d7de.jpg','629ad2907ded5.jpg','629ad2907e675.jpg','629ad2907ed29.jpg','629ad2907f518.jpg','629ad2907fbb6.jpg','629ad2908048e.jpg','2022-06-04');

/*Table structure for table `program` */

DROP TABLE IF EXISTS `program`;

CREATE TABLE `program` (
  `ID_PROGRAM` char(10) NOT NULL,
  `ID_KATEGORI` char(5) NOT NULL,
  `NAMA_PROGRAM` varchar(255) NOT NULL,
  `INDIVIDU` int(11) DEFAULT NULL,
  `KOLEKTIF` int(11) DEFAULT NULL,
  `KORPORAT` int(11) DEFAULT NULL,
  `PPN` int(11) DEFAULT NULL,
  `DESKRIPSI` text DEFAULT NULL,
  `SESI` int(11) DEFAULT NULL,
  `IMAGE` text DEFAULT NULL,
  PRIMARY KEY (`ID_PROGRAM`),
  KEY `FK_TERDIRI_ATAS` (`ID_KATEGORI`),
  CONSTRAINT `FK_TERDIRI_ATAS` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori_program` (`ID_KATEGORI`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `program` */

insert  into `program`(`ID_PROGRAM`,`ID_KATEGORI`,`NAMA_PROGRAM`,`INDIVIDU`,`KOLEKTIF`,`KORPORAT`,`PPN`,`DESKRIPSI`,`SESI`,`IMAGE`) values 
('DL','RC','DIGITAL LEADERSHIP',2220000,2220000,1554000,NULL,'a',7,'register (3).png'),
('EI','NRC','EXECUTIVE INSIGHTS',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
('ET','NRC','EXECUTIVE TALK',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
('FFNF','RC','FINANCE ACCOUNTING FOR NON-FINANCIAL MANAGER',2220000,1776000,1243200,NULL,'ll',7,'landing page (2).png'),
('TES','RC','Testing',2220000,1776000,1554000,11,'lorem',7,'jarkom basket.png');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `ID_USER` char(10) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `ROLE` char(10) NOT NULL,
  `CREATED_AT` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`ID_USER`,`EMAIL`,`PASSWORD`,`ROLE`,`CREATED_AT`) values 
('US04220001','talitaaulia91@gmail.com','$2y$10$Hu/PE92imsnKcUTgwW5ltexcSk3e5fi4ib9l5JKRoFaxp74tvIJ4y','user','2022-04-21'),
('US04220002','administrator@gmail.com','$2y$10$TcJZVrSGSfk8sbD.WOarCegkAwH19FekodVP1YSSbcIGR7mrP.Bx.','admin','2022-04-21'),
('US04220003','lia@gmail.com','$2y$10$TphVcH0NwdbJbL20JP3Mz.FL8jUkt294sxfSbR5QIWdTr3DvxLdAi','user','2022-04-28'),
('US05220001','tes1@gmail.com','$2y$10$1mAiOsGoPObZN7ND2YPPBOECk7lSEsqsCK57y8bJZF2qVeV0YU0wC','user','2022-05-12'),
('US05220002','tes2@gmail.com','$2y$10$mpomsPTll7hVg.oeN6QfB.zApN4bF9bA02B7lq7zTKtXn4ktyH0VG','user','2022-05-12'),
('US05220003','tes3@gmail.com','$2y$10$zgJc0HXYvj2SN3AHhOGNN.SjFKbS2diOOxOAFEfaKajTsKeYH1Gte','user','2022-05-12');

/*Table structure for table `waktu` */

DROP TABLE IF EXISTS `waktu`;

CREATE TABLE `waktu` (
  `ID_WAKTU` char(3) NOT NULL,
  `WAKTU_MULAI` time NOT NULL,
  `WAKTU_BERAKHIR` time NOT NULL,
  PRIMARY KEY (`ID_WAKTU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `waktu` */

insert  into `waktu`(`ID_WAKTU`,`WAKTU_MULAI`,`WAKTU_BERAKHIR`) values 
('T01','18:30:00','20:30:00'),
('T02','10:00:00','12:00:00'),
('T03','09:00:00','16:00:00');

/* Trigger structure for table `cashback` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_cashback` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_cashback` BEFORE INSERT ON `cashback` FOR EACH ROW 
BEGIN 
	SET NEW.ID_CASHBACK = CONCAT('C',DATE_FORMAT(NEW.CREATED_AT, "%m"),
	CAST(SUBSTR(YEAR(SYSDATE()),3,4)AS INT),
	LPAD((IFNULL((SELECT CAST(SUBSTR(ID_CASHBACK,6,3)AS INT) 
	FROM cashback
	WHERE DATE_FORMAT(CREATED_AT,"%m") = DATE_FORMAT(NEW.CREATED_AT,"%m")
	ORDER BY ID_CASHBACK DESC 
	LIMIT 1),0)+1),3,"0")); 
END */$$


DELIMITER ;

/* Trigger structure for table `client` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_client` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_client` BEFORE INSERT ON `client` FOR EACH ROW 
BEGIN 
	SET NEW.ID_CLIENT = CONCAT('PS',DATE_FORMAT(NEW.CREATED_AT, "%m"),
	CAST(SUBSTR(YEAR(SYSDATE()),3,4)AS INT),
	LPAD((IFNULL((SELECT CAST(SUBSTR(ID_CLIENT,7,4)AS INT) 
	FROM client
	WHERE DATE_FORMAT(CREATED_AT,"%m") = DATE_FORMAT(NEW.CREATED_AT,"%m")
	ORDER BY ID_CLIENT DESC 
	LIMIT 1),0)+1),4,"0")); 
END */$$


DELIMITER ;

/* Trigger structure for table `detail_program` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_detail_program` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_detail_program` BEFORE INSERT ON `detail_program` FOR EACH ROW 
BEGIN
	SET NEW.ID_DETAIL = CONCAT('DJ',LPAD((
	IFNULL((SELECT CAST(SUBSTR(ID_DETAIL,3,4)AS INT) 
	FROM detail_program
	ORDER BY ID_DETAIL DESC 
	LIMIT 1),0)+1),2,"0"));
END */$$


DELIMITER ;

/* Trigger structure for table `diskon` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_diskon` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_diskon` BEFORE INSERT ON `diskon` FOR EACH ROW 
BEGIN
	SET NEW.ID_DISKON = CONCAT('D',LPAD((
	IFNULL((SELECT CAST(SUBSTR(ID_DISKON,2,3)AS INT) 
	FROM diskon
	ORDER BY ID_DISKON DESC 
	LIMIT 1),0)+1),2,"0"));
END */$$


DELIMITER ;

/* Trigger structure for table `histori` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_histori` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_histori` BEFORE INSERT ON `histori` FOR EACH ROW 
BEGIN 
	SET NEW.ID_HISTORI = CONCAT('HS',DATE_FORMAT(NEW.CREATED_AT, "%m"),
	CAST(SUBSTR(YEAR(SYSDATE()),3,4)AS INT),
	LPAD((IFNULL((SELECT CAST(SUBSTR(ID_HISTORI,7,4)AS INT) 
	FROM histori
	WHERE DATE_FORMAT(CREATED_AT,"%m") = DATE_FORMAT(NEW.CREATED_AT,"%m")
	ORDER BY ID_HISTORI DESC 
	LIMIT 1),0)+1),4,"0")); 
END */$$


DELIMITER ;

/* Trigger structure for table `jadwal` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_jadwal` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_jadwal` BEFORE INSERT ON `jadwal` FOR EACH ROW 
BEGIN
	SET NEW.ID_JADWAL = CONCAT('J',LPAD((
	IFNULL((SELECT CAST(SUBSTR(ID_JADWAL,2,3)AS INT) 
	FROM jadwal
	ORDER BY ID_JADWAL DESC 
	LIMIT 1),0)+1),2,"0"));
END */$$


DELIMITER ;

/* Trigger structure for table `pembayaran` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_pembayaran` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_pembayaran` BEFORE INSERT ON `pembayaran` FOR EACH ROW 
BEGIN 
	SET NEW.ID_PEMBAYARAN = CONCAT('PAY',DATE_FORMAT(NEW.TGL_PEMBAYARAN, "%m"),
	CAST(SUBSTR(YEAR(SYSDATE()),3,4)AS INT),
	LPAD((IFNULL((SELECT CAST(SUBSTR(ID_PEMBAYARAN,8,3)AS INT) 
	FROM pembayaran
	WHERE  DATE_FORMAT(TGL_PEMBAYARAN, "%m") = DATE_FORMAT(NEW.TGL_PEMBAYARAN, "%m")
	ORDER BY ID_PEMBAYARAN DESC 
	LIMIT 1),0)+1),3,"0")); 
END */$$


DELIMITER ;

/* Trigger structure for table `pendaftaran` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_pendaftaran` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_pendaftaran` BEFORE INSERT ON `pendaftaran` FOR EACH ROW 
BEGIN 
	SET NEW.ID_PENDAFTARAN = CONCAT('REG',DATE_FORMAT(NEW.TGL_PENDAFTARAN, "%m"),
	CAST(SUBSTR(YEAR(SYSDATE()),3,4)AS INT),
	LPAD((IFNULL((SELECT CAST(SUBSTR(ID_PENDAFTARAN,8,3)AS INT) 
	FROM pendaftaran
	WHERE  DATE_FORMAT(TGL_PENDAFTARAN, "%m") = DATE_FORMAT(NEW.TGL_PENDAFTARAN,"%m")
	ORDER BY ID_PENDAFTARAN DESC 
	LIMIT 1),0)+1),3,"0")); 
END */$$


DELIMITER ;

/* Trigger structure for table `penilaian` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_penilaian` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_penilaian` BEFORE INSERT ON `penilaian` FOR EACH ROW 
BEGIN 
    SET NEW.ID_NILAI = CONCAT('NL',DATE_FORMAT(NEW.CREATED_AT, "%m"),
    CAST(SUBSTR(YEAR(SYSDATE()),3,4)AS INT),
    LPAD((IFNULL((SELECT CAST(SUBSTR(ID_NILAI,7,4)AS INT) 
    FROM penilaian
    WHERE DATE_FORMAT(CREATED_AT,"%m") = DATE_FORMAT(NEW.CREATED_AT,"%m")
    ORDER BY ID_NILAI DESC 
    LIMIT 1),0)+1),4,"0")); 
END */$$


DELIMITER ;

/* Trigger structure for table `penyimpanan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_penyimpanan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_penyimpanan` BEFORE INSERT ON `penyimpanan` FOR EACH ROW 
BEGIN 
	SET NEW.ID_PENYIMPANAN = CONCAT('SM',DATE_FORMAT(NEW.CREATED_AT, "%m"),
	CAST(SUBSTR(YEAR(SYSDATE()),3,4)AS INT),
	LPAD((IFNULL((SELECT CAST(SUBSTR(ID_PENYIMPANAN,7,4)AS INT) 
	FROM penyimpanan
	WHERE DATE_FORMAT(CREATED_AT,"%m") = DATE_FORMAT(NEW.CREATED_AT,"%m")
	ORDER BY ID_PENYIMPANAN DESC 
	LIMIT 1),0)+1),4,"0")); 
END */$$


DELIMITER ;

/* Trigger structure for table `user` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_user` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_user` BEFORE INSERT ON `user` FOR EACH ROW 
BEGIN 
	SET NEW.ID_USER = CONCAT('US',DATE_FORMAT(NEW.CREATED_AT, "%m"),
	CAST(SUBSTR(YEAR(SYSDATE()),3,4)AS INT),
	LPAD((IFNULL((SELECT CAST(SUBSTR(ID_USER,7,4)AS INT) 
	FROM USER
	WHERE DATE_FORMAT(CREATED_AT,"%m") = DATE_FORMAT(NEW.CREATED_AT,"%m")
	ORDER BY ID_USER DESC 
	LIMIT 1),0)+1),4,"0")); 
END */$$


DELIMITER ;

/* Function  structure for function  `cashback10` */

/*!50003 DROP FUNCTION IF EXISTS `cashback10` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `cashback10`(id VARCHAR(10)) RETURNS int(11)
BEGIN
DECLARE hitung INT;
SELECT INDIVIDU * 10/100 INTO hitung
FROM program
WHERE ID_PROGRAM = id;
RETURN hitung;
END */$$
DELIMITER ;

/* Function  structure for function  `cashback5` */

/*!50003 DROP FUNCTION IF EXISTS `cashback5` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `cashback5`(id VARCHAR(10)) RETURNS int(11)
BEGIN
DECLARE hitung INT;
SELECT INDIVIDU * 5/100 INTO hitung
FROM program
WHERE ID_PROGRAM = id;
RETURN hitung;
END */$$
DELIMITER ;

/* Function  structure for function  `voucher5` */

/*!50003 DROP FUNCTION IF EXISTS `voucher5` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `voucher5`(id VARCHAR(10)) RETURNS int(11)
BEGIN
DECLARE hitung INT;
SELECT INDIVIDU - (INDIVIDU * 5/100) INTO hitung
FROM program
WHERE ID_PROGRAM = id;
RETURN hitung;
END */$$
DELIMITER ;

/*Table structure for table `peserta` */

DROP TABLE IF EXISTS `peserta`;

/*!50001 DROP VIEW IF EXISTS `peserta` */;
/*!50001 DROP TABLE IF EXISTS `peserta` */;

/*!50001 CREATE TABLE  `peserta`(
 `ID_CLIENT` char(10) ,
 `ID_USER` char(10) ,
 `NAMA` varchar(255) ,
 `JK` char(1) ,
 `NO_TELP` varchar(14) ,
 `NPWP` varchar(17) ,
 `ALAMAT_NPWP` varchar(255) ,
 `ALAMAT_RUMAH` varchar(255) ,
 `INSTANSI` varchar(255) ,
 `JABATAN` varchar(255) ,
 `BERKAS_NPWP` varchar(255) ,
 `ALUMNI` char(1) ,
 `CREATED_AT` date ,
 `EMAIL` varchar(255) 
)*/;

/*View structure for view peserta */

/*!50001 DROP TABLE IF EXISTS `peserta` */;
/*!50001 DROP VIEW IF EXISTS `peserta` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `peserta` AS select `c`.`ID_CLIENT` AS `ID_CLIENT`,`c`.`ID_USER` AS `ID_USER`,`c`.`NAMA` AS `NAMA`,`c`.`JK` AS `JK`,`c`.`NO_TELP` AS `NO_TELP`,`c`.`NPWP` AS `NPWP`,`c`.`ALAMAT_NPWP` AS `ALAMAT_NPWP`,`c`.`ALAMAT_RUMAH` AS `ALAMAT_RUMAH`,`c`.`INSTANSI` AS `INSTANSI`,`c`.`JABATAN` AS `JABATAN`,`c`.`BERKAS_NPWP` AS `BERKAS_NPWP`,`c`.`ALUMNI` AS `ALUMNI`,`c`.`CREATED_AT` AS `CREATED_AT`,`u`.`EMAIL` AS `EMAIL` from (`user` `u` join `client` `c` on(`u`.`ID_USER` = `c`.`ID_USER`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;