-- MySQL dump 10.13  Distrib 5.6.49, for Linux (x86_64)
--
-- Host: localhost    Database: minierp
-- ------------------------------------------------------
-- Server version	5.6.49

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
-- Table structure for table `akun`
--

DROP TABLE IF EXISTS `akun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) NOT NULL,
  `kode_akun` varchar(30) NOT NULL,
  `nama_akun` varchar(250) NOT NULL,
  `debet_kredit` set('DEBET','KREDIT') DEFAULT NULL,
  `kategori` set('NR','LR') DEFAULT NULL,
  PRIMARY KEY (`id_akun`),
  KEY `id_parent` (`id_parent`)
) ENGINE=InnoDB AUTO_INCREMENT=6017 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `akun`
--

LOCK TABLES `akun` WRITE;
/*!40000 ALTER TABLE `akun` DISABLE KEYS */;
INSERT INTO `akun` VALUES (1000,0,'1-000','AKTIVA','','NR'),(1100,1000,'1-100','AKTIVA LANCAR',NULL,'NR'),(1111,1100,'1-111','Kas','DEBET','NR'),(1200,1000,'1-200','AKTIVA TETAP',NULL,'NR'),(2000,0,'2-000','KEWAJIBAN',NULL,'NR'),(2100,2000,'2-100','KEWAJIBAN LANCAR',NULL,'NR'),(2200,2000,'2-200','KEWAJIBAN JANGKA PANJANG',NULL,'NR'),(3000,0,'3-000','EKUITAS',NULL,'NR'),(3100,3000,'3-100','Modal Saham','KREDIT','NR'),(3200,3000,'3-200','Laba Ditahan','KREDIT','NR'),(4000,0,'4-000','PENDAPATAN',NULL,'LR'),(4100,4000,'4-100','Pendapatan Jasa','KREDIT','LR'),(6000,0,'6-000','BIAYA USAHA',NULL,'LR'),(6011,6000,'6-011','Gaji','DEBET','LR'),(6012,6000,'6-012','Perlengkapan','DEBET','LR'),(6014,6000,'6-014','Listrik, Telepon, Internet, Biaya Lain','DEBET','LR'),(6016,6000,'6016','Biaya Sewa','DEBET','LR');
/*!40000 ALTER TABLE `akun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_setting`
--

DROP TABLE IF EXISTS `app_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_setting` (
  `id_app_setting` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(1500) NOT NULL,
  `is_image` int(1) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id_app_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_setting`
--

LOCK TABLES `app_setting` WRITE;
/*!40000 ALTER TABLE `app_setting` DISABLE KEYS */;
INSERT INTO `app_setting` VALUES (1,'APP-NAME',0,'DOMIVATEX'),(2,'APP-NAME-SINGKAT',0,'DOMIVATEX'),(3,'APP-NAME-SINGKATAN',0,'PB'),(4,'Logo',1,'Logo.png'),(5,'Icon',1,'Icon.png'),(6,'ADDRESS',0,'Jalan Percetakan Negara Nomor 23 Jakarta - 10560 - Indonesia Selengkapnya'),(7,'Copyright',0,'Copyright {TAHUN} PPID BPOM. All Right Reserved'),(8,'MAIN-BACKGROUND',1,'MAIN-BACKGROUND.jpg'),(9,'ABOUT-APP',0,'Aplikasi Layanan PPID BPOM'),(10,'APP-VERSION',0,'1.0.0 (Beta)'),(11,'APP-RELEASE-DATE',0,'Juni 2021'),(12,'APP-CONTACT',0,'PPID BPOM'),(13,'WA-1',0,'08123456789 (WA belum diset)'),(14,'WA-2',0,'08123456789 (WA belum diset)'),(15,'IG',0,'IG PPID BPOM (Belum diset)'),(16,'WEBSITE',0,'https://www.pom.go.id'),(17,'EMAIL',0,'email.belumdiset@gmail.com'),(18,'ABOUT-WEB',0,'Sistem PPID BPOM'),(100,'API-KEY',0,'LzloRzRtWjh0S3d3ZitTMko0UENYQT09');
/*!40000 ALTER TABLE `app_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `auth_assignment_user_id_idx` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` VALUES ('admin','1',1542014079),('admin','7',1552641965),('member','13',1563241503),('member','14',1547712959);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` VALUES ('/*',2,NULL,NULL,NULL,1569471203,1569471203),('/admin/assignment/*',2,NULL,NULL,NULL,1552641503,1552641503),('/admin/assignment/assign',2,NULL,NULL,NULL,1552641510,1552641510),('/admin/assignment/index',2,NULL,NULL,NULL,1552641510,1552641510),('/admin/assignment/revoke',2,NULL,NULL,NULL,1552641510,1552641510),('/admin/assignment/view',2,NULL,NULL,NULL,1552641510,1552641510),('/admin/default/*',2,NULL,NULL,NULL,1552641513,1552641513),('/admin/default/index',2,NULL,NULL,NULL,1552641513,1552641513),('/admin/permission/*',2,NULL,NULL,NULL,1552641517,1552641517),('/admin/permission/assign',2,NULL,NULL,NULL,1552641517,1552641517),('/admin/permission/create',2,NULL,NULL,NULL,1552641517,1552641517),('/admin/permission/delete',2,NULL,NULL,NULL,1552641517,1552641517),('/admin/permission/index',2,NULL,NULL,NULL,1552641517,1552641517),('/admin/permission/remove',2,NULL,NULL,NULL,1552641517,1552641517),('/admin/permission/update',2,NULL,NULL,NULL,1552641517,1552641517),('/admin/permission/view',2,NULL,NULL,NULL,1552641517,1552641517),('/admin/role/*',2,NULL,NULL,NULL,1552641520,1552641520),('/admin/role/assign',2,NULL,NULL,NULL,1552641520,1552641520),('/admin/role/create',2,NULL,NULL,NULL,1552641520,1552641520),('/admin/role/delete',2,NULL,NULL,NULL,1552641520,1552641520),('/admin/role/index',2,NULL,NULL,NULL,1552641520,1552641520),('/admin/role/remove',2,NULL,NULL,NULL,1552641520,1552641520),('/admin/role/update',2,NULL,NULL,NULL,1552641520,1552641520),('/admin/role/view',2,NULL,NULL,NULL,1552641520,1552641520),('/admin/route/*',2,NULL,NULL,NULL,1552641523,1552641523),('/admin/route/assign',2,NULL,NULL,NULL,1552641523,1552641523),('/admin/route/create',2,NULL,NULL,NULL,1552641523,1552641523),('/admin/route/index',2,NULL,NULL,NULL,1552641523,1552641523),('/admin/route/refresh',2,NULL,NULL,NULL,1552641523,1552641523),('/admin/route/remove',2,NULL,NULL,NULL,1552641523,1552641523),('/admin/rule/*',2,NULL,NULL,NULL,1552641527,1552641527),('/admin/rule/create',2,NULL,NULL,NULL,1552641527,1552641527),('/admin/rule/delete',2,NULL,NULL,NULL,1552641527,1552641527),('/admin/rule/index',2,NULL,NULL,NULL,1552641527,1552641527),('/admin/rule/update',2,NULL,NULL,NULL,1552641527,1552641527),('/admin/rule/view',2,NULL,NULL,NULL,1552641527,1552641527),('/admin/user/delete',2,NULL,NULL,NULL,1552641538,1552641538),('/admin/user/index',2,NULL,NULL,NULL,1552641538,1552641538),('/admin/user/view',2,NULL,NULL,NULL,1552641538,1552641538),('/akun/*',2,NULL,NULL,NULL,1624525994,1624525994),('/app-setting/*',2,NULL,NULL,NULL,1623558891,1623558891),('/basic-packing-item/*',2,NULL,NULL,NULL,1625442083,1625442083),('/basic-packing/*',2,NULL,NULL,NULL,1625442065,1625442065),('/contact-us/*',2,NULL,NULL,NULL,1566445209,1566445209),('/contact-us/create',2,NULL,NULL,NULL,1566445209,1566445209),('/contact-us/delete',2,NULL,NULL,NULL,1566445209,1566445209),('/contact-us/index',2,NULL,NULL,NULL,1566445209,1566445209),('/contact-us/update',2,NULL,NULL,NULL,1566445209,1566445209),('/contact-us/view',2,NULL,NULL,NULL,1566445209,1566445209),('/content/*',2,NULL,NULL,NULL,1566440059,1566440059),('/content/create',2,NULL,NULL,NULL,1566440059,1566440059),('/content/delete',2,NULL,NULL,NULL,1566440059,1566440059),('/content/index',2,NULL,NULL,NULL,1566440059,1566440059),('/content/reset-default-image',2,NULL,NULL,NULL,1570060236,1570060236),('/content/update',2,NULL,NULL,NULL,1566440059,1566440059),('/content/upload-image',2,NULL,NULL,NULL,1570060235,1570060235),('/content/view',2,NULL,NULL,NULL,1566440059,1566440059),('/cpanel-leftmenu/*',2,NULL,NULL,NULL,1552641574,1552641574),('/cpanel-leftmenu/create',2,NULL,NULL,NULL,1552641574,1552641574),('/cpanel-leftmenu/delete',2,NULL,NULL,NULL,1552641574,1552641574),('/cpanel-leftmenu/index',2,NULL,NULL,NULL,1552641574,1552641574),('/cpanel-leftmenu/update',2,NULL,NULL,NULL,1552641574,1552641574),('/cpanel-leftmenu/view',2,NULL,NULL,NULL,1552641574,1552641574),('/dashboard/*',2,NULL,NULL,NULL,1552641577,1552641577),('/dashboard/main',2,NULL,NULL,NULL,1552641577,1552641577),('/frontend-topnav-parent/*',2,NULL,NULL,NULL,1624284213,1624284213),('/frontend-topnav/*',2,NULL,NULL,NULL,1567558594,1567558594),('/frontend-topnav/create',2,NULL,NULL,NULL,1567558594,1567558594),('/frontend-topnav/delete',2,NULL,NULL,NULL,1567558594,1567558594),('/frontend-topnav/index',2,NULL,NULL,NULL,1567558594,1567558594),('/frontend-topnav/reset-default-image',2,NULL,NULL,NULL,1570060236,1570060236),('/frontend-topnav/update',2,NULL,NULL,NULL,1567558594,1567558594),('/frontend-topnav/upload-image',2,NULL,NULL,NULL,1570060236,1570060236),('/frontend-topnav/view',2,NULL,NULL,NULL,1567558594,1567558594),('/gii/*',2,NULL,NULL,NULL,1552641560,1552641560),('/home-info/*',2,NULL,NULL,NULL,1623560246,1623560246),('/image-management/*',2,NULL,NULL,NULL,1566440062,1566440062),('/image-management/create',2,NULL,NULL,NULL,1566440062,1566440062),('/image-management/delete',2,NULL,NULL,NULL,1566440062,1566440062),('/image-management/index',2,NULL,NULL,NULL,1566440062,1566440062),('/image-management/update',2,NULL,NULL,NULL,1566440062,1566440062),('/image-management/view',2,NULL,NULL,NULL,1566440062,1566440062),('/jpembelian/*',2,NULL,NULL,NULL,1625442088,1625442088),('/language/*',2,NULL,NULL,NULL,1566440066,1566440066),('/language/create',2,NULL,NULL,NULL,1566440066,1566440066),('/language/delete',2,NULL,NULL,NULL,1566440066,1566440066),('/language/index',2,NULL,NULL,NULL,1566440065,1566440065),('/language/update',2,NULL,NULL,NULL,1566440066,1566440066),('/language/view',2,NULL,NULL,NULL,1566440066,1566440066),('/laporan/*',2,NULL,NULL,NULL,1552641588,1552641588),('/laporan/bulanan',2,NULL,NULL,NULL,1552641588,1552641588),('/laporan/captcha',2,NULL,NULL,NULL,1552641588,1552641588),('/laporan/error',2,NULL,NULL,NULL,1552641588,1552641588),('/laporan/harian',2,NULL,NULL,NULL,1552641588,1552641588),('/laporan/scan',2,NULL,NULL,NULL,1552641588,1552641588),('/material-in-item-proc/*',2,NULL,NULL,NULL,1625442097,1625442097),('/material-in/*',2,NULL,NULL,NULL,1625442097,1625442097),('/material-support/*',2,NULL,NULL,NULL,1625442097,1625442097),('/material/*',2,NULL,NULL,NULL,1624525185,1624525185),('/media-identity/*',2,NULL,NULL,NULL,1568270276,1568270276),('/media-identity/create',2,NULL,NULL,NULL,1568270276,1568270276),('/media-identity/delete',2,NULL,NULL,NULL,1568270276,1568270276),('/media-identity/index',2,NULL,NULL,NULL,1568270275,1568270275),('/media-identity/update',2,NULL,NULL,NULL,1568270276,1568270276),('/media-identity/view',2,NULL,NULL,NULL,1568270275,1568270275),('/menu-link/*',2,NULL,NULL,NULL,1568270278,1568270278),('/menu-link/create',2,NULL,NULL,NULL,1568270277,1568270277),('/menu-link/delete',2,NULL,NULL,NULL,1568270277,1568270277),('/menu-link/index',2,NULL,NULL,NULL,1568270276,1568270276),('/menu-link/update',2,NULL,NULL,NULL,1568270277,1568270277),('/menu-link/view',2,NULL,NULL,NULL,1568270277,1568270277),('/news/*',2,NULL,NULL,NULL,1566440068,1566440068),('/news/create',2,NULL,NULL,NULL,1566440068,1566440068),('/news/delete',2,NULL,NULL,NULL,1566440068,1566440068),('/news/index',2,NULL,NULL,NULL,1566440068,1566440068),('/news/list',2,NULL,NULL,NULL,1568270278,1568270278),('/news/reset-default-image',2,NULL,NULL,NULL,1570060236,1570060236),('/news/update',2,NULL,NULL,NULL,1566440068,1566440068),('/news/upload-image',2,NULL,NULL,NULL,1570060236,1570060236),('/news/view',2,NULL,NULL,NULL,1566440068,1566440068),('/office-region/*',2,NULL,NULL,NULL,1568345553,1568345553),('/office-region/create',2,NULL,NULL,NULL,1568345553,1568345553),('/office-region/delete',2,NULL,NULL,NULL,1568345553,1568345553),('/office-region/index',2,NULL,NULL,NULL,1568345553,1568345553),('/office-region/reset-default-image',2,NULL,NULL,NULL,1570060236,1570060236),('/office-region/update',2,NULL,NULL,NULL,1568345553,1568345553),('/office-region/upload-image',2,NULL,NULL,NULL,1570060236,1570060236),('/office-region/view',2,NULL,NULL,NULL,1568345553,1568345553),('/perusahaan/*',2,NULL,NULL,NULL,1552641592,1552641592),('/perusahaan/create',2,NULL,NULL,NULL,1552641592,1552641592),('/perusahaan/delete',2,NULL,NULL,NULL,1552641592,1552641592),('/perusahaan/index',2,NULL,NULL,NULL,1552641592,1552641592),('/perusahaan/update',2,NULL,NULL,NULL,1552641592,1552641592),('/perusahaan/view',2,NULL,NULL,NULL,1552641592,1552641592),('/product/*',2,NULL,NULL,NULL,1566440072,1566440072),('/product/create',2,NULL,NULL,NULL,1566440072,1566440072),('/product/delete',2,NULL,NULL,NULL,1566440072,1566440072),('/product/index',2,NULL,NULL,NULL,1566440072,1566440072),('/product/reset-default-file',2,NULL,NULL,NULL,1570060236,1570060236),('/product/reset-default-image',2,NULL,NULL,NULL,1570060236,1570060236),('/product/update',2,NULL,NULL,NULL,1566440072,1566440072),('/product/upload-file',2,NULL,NULL,NULL,1569976553,1569976553),('/product/upload-image',2,NULL,NULL,NULL,1569976553,1569976553),('/product/view',2,NULL,NULL,NULL,1566440072,1566440072),('/request-product-info/*',2,NULL,NULL,NULL,1566440077,1566440077),('/request-product-info/create',2,NULL,NULL,NULL,1566440077,1566440077),('/request-product-info/delete',2,NULL,NULL,NULL,1566440077,1566440077),('/request-product-info/index',2,NULL,NULL,NULL,1566440077,1566440077),('/request-product-info/update',2,NULL,NULL,NULL,1566440077,1566440077),('/request-product-info/view',2,NULL,NULL,NULL,1566440077,1566440077),('/section-content/*',2,NULL,NULL,NULL,1566440080,1566440080),('/section-content/create',2,NULL,NULL,NULL,1566440080,1566440080),('/section-content/delete',2,NULL,NULL,NULL,1566440080,1566440080),('/section-content/index',2,NULL,NULL,NULL,1566440079,1566440079),('/section-content/update',2,NULL,NULL,NULL,1566440080,1566440080),('/section-content/view',2,NULL,NULL,NULL,1566440080,1566440080),('/site/*',2,NULL,NULL,NULL,1552641595,1552641595),('/site/about',2,NULL,NULL,NULL,1552641595,1552641595),('/site/captcha',2,NULL,NULL,NULL,1552641595,1552641595),('/site/contact',2,NULL,NULL,NULL,1552641595,1552641595),('/site/error',2,NULL,NULL,NULL,1552641595,1552641595),('/site/index',2,NULL,NULL,NULL,1552641595,1552641595),('/site/login',2,NULL,NULL,NULL,1552641595,1552641595),('/site/logout',2,NULL,NULL,NULL,1552641595,1552641595),('/site/scan',2,NULL,NULL,NULL,1552641595,1552641595),('/sustainability-impl-category/*',2,NULL,NULL,NULL,1569976554,1569976554),('/sustainability-impl-category/create',2,NULL,NULL,NULL,1569976554,1569976554),('/sustainability-impl-category/delete',2,NULL,NULL,NULL,1569976554,1569976554),('/sustainability-impl-category/index',2,NULL,NULL,NULL,1569976553,1569976553),('/sustainability-impl-category/update',2,NULL,NULL,NULL,1569976554,1569976554),('/sustainability-impl-category/view',2,NULL,NULL,NULL,1569976554,1569976554),('/sustainability-impl-news/*',2,NULL,NULL,NULL,1569976554,1569976554),('/sustainability-impl-news/create',2,NULL,NULL,NULL,1569976554,1569976554),('/sustainability-impl-news/delete',2,NULL,NULL,NULL,1569976554,1569976554),('/sustainability-impl-news/index',2,NULL,NULL,NULL,1569976554,1569976554),('/sustainability-impl-news/reset-default-image',2,NULL,NULL,NULL,1570060236,1570060236),('/sustainability-impl-news/update',2,NULL,NULL,NULL,1569976554,1569976554),('/sustainability-impl-news/upload-image',2,NULL,NULL,NULL,1569976554,1569976554),('/sustainability-impl-news/view',2,NULL,NULL,NULL,1569976554,1569976554),('/sustainability-report/*',2,NULL,NULL,NULL,1569471203,1569471203),('/sustainability-report/create',2,NULL,NULL,NULL,1569471203,1569471203),('/sustainability-report/delete',2,NULL,NULL,NULL,1569471203,1569471203),('/sustainability-report/index',2,NULL,NULL,NULL,1569471203,1569471203),('/sustainability-report/update',2,NULL,NULL,NULL,1569471203,1569471203),('/sustainability-report/view',2,NULL,NULL,NULL,1569471203,1569471203),('/unit-produksi/*',2,NULL,NULL,NULL,1625105212,1625105212),('/unit-produksi/create',2,NULL,NULL,NULL,1625105212,1625105212),('/unit-produksi/delete',2,NULL,NULL,NULL,1625105212,1625105212),('/unit-produksi/index',2,NULL,NULL,NULL,1625105212,1625105212),('/unit-produksi/update',2,NULL,NULL,NULL,1625105212,1625105212),('/unit-produksi/view',2,NULL,NULL,NULL,1625105212,1625105212),('/user-perusahaan/*',2,NULL,NULL,NULL,1552641605,1552641605),('/user-perusahaan/create',2,NULL,NULL,NULL,1552641604,1552641604),('/user-perusahaan/delete',2,NULL,NULL,NULL,1552641605,1552641605),('/user-perusahaan/index',2,NULL,NULL,NULL,1552641604,1552641604),('/user-perusahaan/update',2,NULL,NULL,NULL,1552641605,1552641605),('/user-perusahaan/view',2,NULL,NULL,NULL,1552641604,1552641604),('/user/*',2,NULL,NULL,NULL,1552641600,1552641600),('/user/create',2,NULL,NULL,NULL,1552641600,1552641600),('/user/delete',2,NULL,NULL,NULL,1552641600,1552641600),('/user/index',2,NULL,NULL,NULL,1552641600,1552641600),('/user/update',2,NULL,NULL,NULL,1552641600,1552641600),('/user/view',2,NULL,NULL,NULL,1552641600,1552641600),('/web-page/*',2,NULL,NULL,NULL,1570060236,1570060236),('/web-page/create',2,NULL,NULL,NULL,1570060236,1570060236),('/web-page/delete',2,NULL,NULL,NULL,1570060236,1570060236),('/web-page/index',2,NULL,NULL,NULL,1570060236,1570060236),('/web-page/update',2,NULL,NULL,NULL,1570060236,1570060236),('/web-page/view',2,NULL,NULL,NULL,1570060236,1570060236),('/web-vocabulary/*',2,NULL,NULL,NULL,1568270282,1568270282),('/web-vocabulary/create',2,NULL,NULL,NULL,1568270282,1568270282),('/web-vocabulary/delete',2,NULL,NULL,NULL,1568270282,1568270282),('/web-vocabulary/index',2,NULL,NULL,NULL,1568270281,1568270281),('/web-vocabulary/update',2,NULL,NULL,NULL,1568270282,1568270282),('/web-vocabulary/view',2,NULL,NULL,NULL,1568270282,1568270282),('admin',1,'Application Admin',NULL,NULL,1542013792,1565583564),('cpanel-leftmenu/create',2,'Create a menu',NULL,NULL,1547712959,1547712959),('cpanel-leftmenu/delete',2,'delete a menu',NULL,NULL,1547712959,1547712959),('cpanel-leftmenu/index',2,'Create a index',NULL,NULL,1547712959,1547712959),('cpanel-leftmenu/update',2,'Update a menu',NULL,NULL,1547713493,1547713493),('cpanel-leftmenu/view',2,'View a menu',NULL,NULL,1547712959,1547712959),('grievance-list-request/index',2,'View Grievance List',NULL,NULL,1563228150,1563228150),('koordinator',1,'koordinator',NULL,NULL,1563240797,1623560370),('member',1,'Member or supplier',NULL,NULL,1563240747,1563240747),('owner',1,'Owner Account',NULL,NULL,1542013792,1552641921),('user/create',2,'Create a user',NULL,NULL,1542013422,1542013422),('user/delete',2,'Delete a user',NULL,NULL,1542013422,1548749079),('user/index',2,'Create a index',NULL,NULL,1542013422,1548749389),('user/update',2,'Update a user',NULL,NULL,1542013422,1542013422),('user/view',2,'View a user',NULL,NULL,1542013422,1548749426),('writer',1,'writer',NULL,NULL,1563240780,1623560355);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` VALUES ('admin','/admin/assignment/*'),('admin','/admin/assignment/assign'),('admin','/admin/assignment/index'),('admin','/admin/assignment/revoke'),('admin','/admin/assignment/view'),('admin','/admin/default/*'),('admin','/admin/default/index'),('admin','/admin/permission/*'),('admin','/admin/permission/assign'),('admin','/admin/permission/create'),('admin','/admin/permission/delete'),('admin','/admin/permission/index'),('admin','/admin/permission/remove'),('admin','/admin/permission/update'),('admin','/admin/permission/view'),('admin','/admin/role/*'),('admin','/admin/role/assign'),('admin','/admin/role/create'),('admin','/admin/role/delete'),('admin','/admin/role/index'),('admin','/admin/role/remove'),('admin','/admin/role/update'),('admin','/admin/role/view'),('admin','/admin/route/*'),('admin','/admin/route/assign'),('admin','/admin/route/create'),('admin','/admin/route/index'),('admin','/admin/route/refresh'),('admin','/admin/route/remove'),('admin','/admin/rule/*'),('admin','/admin/rule/create'),('admin','/admin/rule/delete'),('admin','/admin/rule/index'),('admin','/admin/rule/update'),('admin','/admin/rule/view'),('admin','/admin/user/delete'),('admin','/admin/user/index'),('admin','/admin/user/view'),('admin','/akun/*'),('admin','/app-setting/*'),('admin','/basic-packing-item/*'),('admin','/basic-packing/*'),('admin','/contact-us/*'),('admin','/contact-us/create'),('admin','/contact-us/delete'),('admin','/contact-us/index'),('admin','/contact-us/update'),('admin','/contact-us/view'),('admin','/content/*'),('admin','/content/create'),('admin','/content/delete'),('admin','/content/index'),('admin','/content/update'),('admin','/content/view'),('admin','/cpanel-leftmenu/*'),('admin','/cpanel-leftmenu/create'),('admin','/cpanel-leftmenu/delete'),('admin','/cpanel-leftmenu/index'),('admin','/cpanel-leftmenu/update'),('admin','/cpanel-leftmenu/view'),('owner','/dashboard/*'),('owner','/dashboard/main'),('admin','/frontend-topnav-parent/*'),('admin','/frontend-topnav/*'),('admin','/frontend-topnav/create'),('admin','/frontend-topnav/delete'),('admin','/frontend-topnav/index'),('admin','/frontend-topnav/update'),('admin','/frontend-topnav/view'),('admin','/gii/*'),('admin','/home-info/*'),('admin','/image-management/*'),('admin','/image-management/create'),('admin','/image-management/delete'),('admin','/image-management/index'),('admin','/image-management/update'),('admin','/image-management/view'),('admin','/jpembelian/*'),('admin','/language/*'),('admin','/language/create'),('admin','/language/delete'),('admin','/language/index'),('admin','/language/update'),('admin','/language/view'),('owner','/laporan/*'),('owner','/laporan/bulanan'),('owner','/laporan/captcha'),('owner','/laporan/error'),('owner','/laporan/harian'),('owner','/laporan/scan'),('admin','/material-in-item-proc/*'),('admin','/material-in/*'),('admin','/material-support/*'),('admin','/material/*'),('admin','/media-identity/*'),('admin','/media-identity/create'),('admin','/media-identity/delete'),('admin','/media-identity/index'),('admin','/media-identity/update'),('admin','/media-identity/view'),('admin','/menu-link/*'),('admin','/menu-link/create'),('admin','/menu-link/delete'),('admin','/menu-link/index'),('admin','/menu-link/update'),('admin','/menu-link/view'),('admin','/news/*'),('admin','/news/create'),('admin','/news/delete'),('admin','/news/index'),('admin','/news/update'),('admin','/news/view'),('admin','/office-region/*'),('admin','/office-region/create'),('admin','/office-region/delete'),('admin','/office-region/index'),('admin','/office-region/update'),('admin','/office-region/view'),('admin','/perusahaan/*'),('admin','/perusahaan/create'),('admin','/perusahaan/delete'),('admin','/perusahaan/index'),('admin','/perusahaan/update'),('admin','/perusahaan/view'),('admin','/product/*'),('admin','/product/create'),('admin','/product/delete'),('admin','/product/index'),('admin','/product/update'),('admin','/product/view'),('admin','/request-product-info/*'),('admin','/request-product-info/create'),('admin','/request-product-info/delete'),('admin','/request-product-info/index'),('admin','/request-product-info/update'),('admin','/request-product-info/view'),('admin','/section-content/*'),('admin','/section-content/create'),('admin','/section-content/delete'),('admin','/section-content/index'),('admin','/section-content/update'),('admin','/section-content/view'),('admin','/site/error'),('owner','/site/error'),('admin','/site/index'),('member','/site/index'),('owner','/site/index'),('admin','/site/login'),('owner','/site/login'),('admin','/site/logout'),('owner','/site/logout'),('owner','/site/scan'),('admin','/sustainability-impl-category/*'),('admin','/sustainability-impl-category/create'),('admin','/sustainability-impl-category/delete'),('admin','/sustainability-impl-category/index'),('admin','/sustainability-impl-category/update'),('admin','/sustainability-impl-category/view'),('admin','/sustainability-impl-news/*'),('admin','/sustainability-impl-news/create'),('admin','/sustainability-impl-news/delete'),('admin','/sustainability-impl-news/index'),('admin','/sustainability-impl-news/update'),('admin','/sustainability-impl-news/upload-image'),('admin','/sustainability-impl-news/view'),('admin','/sustainability-report/*'),('admin','/sustainability-report/create'),('admin','/sustainability-report/delete'),('admin','/sustainability-report/index'),('admin','/sustainability-report/update'),('admin','/sustainability-report/view'),('admin','/unit-produksi/*'),('admin','/user-perusahaan/*'),('admin','/user-perusahaan/create'),('admin','/user-perusahaan/delete'),('admin','/user-perusahaan/index'),('admin','/user-perusahaan/update'),('admin','/user-perusahaan/view'),('admin','/user/*'),('admin','/user/create'),('admin','/user/delete'),('admin','/user/index'),('admin','/user/update'),('admin','/user/view'),('admin','/web-page/*'),('admin','/web-page/create'),('admin','/web-page/delete'),('admin','/web-page/index'),('admin','/web-page/update'),('admin','/web-page/view'),('admin','/web-vocabulary/*'),('admin','/web-vocabulary/create'),('admin','/web-vocabulary/delete'),('admin','/web-vocabulary/index'),('admin','/web-vocabulary/update'),('admin','/web-vocabulary/view'),('admin','cpanel-leftmenu/create'),('admin','cpanel-leftmenu/delete'),('admin','cpanel-leftmenu/index'),('admin','cpanel-leftmenu/update'),('admin','cpanel-leftmenu/view'),('admin','user/create'),('admin','user/delete'),('admin','user/index'),('admin','user/update'),('admin','user/view');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `basic_packing`
--

DROP TABLE IF EXISTS `basic_packing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `basic_packing` (
  `id_basic_packing` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) NOT NULL,
  `deskripsi` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_basic_packing`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `basic_packing`
--

LOCK TABLES `basic_packing` WRITE;
/*!40000 ALTER TABLE `basic_packing` DISABLE KEYS */;
INSERT INTO `basic_packing` VALUES (1,'Packing Standar','Packing Standard Kain'),(2,'Packing Baru','Test');
/*!40000 ALTER TABLE `basic_packing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `basic_packing_item`
--

DROP TABLE IF EXISTS `basic_packing_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `basic_packing_item` (
  `id_basic_packing_item` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_basic_packing` int(11) NOT NULL,
  `id_material_support` bigint(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `created_id_user` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id_basic_packing_item`),
  KEY `id_basic_packing` (`id_basic_packing`,`id_material_support`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `basic_packing_item`
--

LOCK TABLES `basic_packing_item` WRITE;
/*!40000 ALTER TABLE `basic_packing_item` DISABLE KEYS */;
INSERT INTO `basic_packing_item` VALUES (1,1,1,1,NULL,NULL,NULL,NULL),(2,1,2,1,NULL,NULL,NULL,NULL),(3,1,3,1,NULL,NULL,NULL,NULL),(4,2,2,1,'sadsda',NULL,NULL,NULL);
/*!40000 ALTER TABLE `basic_packing_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_us` (
  `id_contact_us` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_office_region` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `request_date` date DEFAULT NULL,
  `request_time` datetime DEFAULT NULL,
  `registered_ip_address` varchar(64) DEFAULT NULL,
  `status` set('OPEN','CLOSE') DEFAULT NULL,
  `action_date` date DEFAULT NULL,
  `action_by` varchar(150) DEFAULT NULL,
  `action_notes` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_contact_us`),
  KEY `id_office_region` (`id_office_region`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_us`
--

LOCK TABLES `contact_us` WRITE;
/*!40000 ALTER TABLE `contact_us` DISABLE KEYS */;
INSERT INTO `contact_us` VALUES (1,0,'Rizky','rizky@gmail,com','Tanya Produk','Produk ini tentang apa sih ya?','2019-08-14','2019-08-14 04:33:00','1','OPEN',NULL,NULL,NULL),(2,1,'Amanda','sudirman@gmail.com','ddd','ddd',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,2,'Amanda','sudirman@gmail.com','ddd','ddd',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,1,'Nanda','nanda@gmail.com','Tanya Apa saja','Saya mau nanya dong kalau ini dan itu gimana ya?',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,1,'sss','sss','ssds','asdasdasdasd',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,1,'ss','rzk@gmail.com','sss','asd',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,1,'Amanda 5','sudirman@gmail.com','ddd','dfsdfsdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,2,'s','sudirman@gmail.com','ss','sdasda ',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,1,'ssda','sda','sda','sdasdas',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,1,'ssda','sda@gmail.com','sda','sdasdas',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,2,'aASas','as@ss.com','AS','asAS',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `contact_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
  `id_content` bigint(20) NOT NULL AUTO_INCREMENT,
  `keyname` varchar(100) NOT NULL,
  `id_section_content` int(11) NOT NULL,
  `id_frontend_topnav` int(11) NOT NULL,
  `content_lang1` text NOT NULL,
  `content_lang2` text NOT NULL,
  `have_image` int(1) DEFAULT '0',
  `image_filename` varchar(250) DEFAULT NULL,
  `have_colorbox` int(1) NOT NULL DEFAULT '0',
  `color_box` varchar(20) DEFAULT NULL,
  `have_info1` int(1) DEFAULT '0',
  `info1` text,
  `have_info2` int(1) DEFAULT '0',
  `info2` text,
  `have_info3` int(1) DEFAULT '0',
  `info3` text,
  `updated_date` datetime DEFAULT NULL,
  `updated_user` int(11) DEFAULT NULL,
  `updated_ip_address` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id_content`),
  KEY `keyname` (`keyname`),
  KEY `id_section_content` (`id_section_content`),
  KEY `id_frontend_topnav` (`id_frontend_topnav`)
) ENGINE=InnoDB AUTO_INCREMENT=300535 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (1,'About Us-Group Policy-logo-1',2,1000,'<p>Profil</p>','<p>Implementieren Sie integrierte Unternehmensmanagementsysteme und verbessern Sie die Wettbewerbsf&auml;higkeit</p>',0,NULL,0,'',0,NULL,0,NULL,0,NULL,'2019-08-22 04:00:00',1,'1:1:1:1'),(10001,'Home-Heading-1',1,100,'<p><span style=\"font-weight: bold; color: #9f191f;\">PPID BPOM </span>memberikan informasi terlengkap kepada masyarakat</p>','<p>-</p>',1,'image_content_10001.png',0,'',0,NULL,0,NULL,0,NULL,'2019-08-22 04:00:00',1,'1:1:1:1'),(10002,'Home-Heading-2',1,100,'<p><span style=\"font-weight: bold; color: #9f191f;\">Piagram Anugerah BPOM<br /></span></p>','<p>Die weltweit f&uuml;hrenden Hersteller von nat&uuml;rlichen Fettalkoholen (2)</p>',1,'image_content_10002.png',0,'',0,NULL,0,NULL,0,NULL,'2019-08-22 04:00:00',1,'1:1:1:1'),(10003,'Home-Heading-3',1,100,'<p><span style=\"font-weight: bold; color: #9f191f;\"> The Leading Producers</span> of Natural Fatty Alcohols in The World (3)</p>','<p>Die weltweit f&uuml;hrenden Hersteller von nat&uuml;rlichen Fettalkoholen (3)</p>',1,'image_content_10003.jpg',0,'',0,NULL,0,NULL,0,NULL,'2019-08-22 04:00:00',1,'1:1:1:1'),(10004,'Home-Heading-4',1,100,'<p><span style=\"font-weight: bold; color: #9f191f;\"> The Leading Producers</span> of Natural Fatty Alcohols in The World (3)</p>','<p>Die weltweit f&uuml;hrenden Hersteller von nat&uuml;rlichen Fettalkoholen (3)</p>',1,'',0,NULL,0,NULL,0,NULL,0,NULL,NULL,NULL,NULL),(10005,'Home-Heading-5',1,100,'<p><span style=\"font-weight: bold; color: #9f191f;\"> The Leading Producers</span> of Natural Fatty Alcohols in The World (3)</p>','<p>Die weltweit f&uuml;hrenden Hersteller von nat&uuml;rlichen Fettalkoholen (3)</p>',1,'',0,NULL,0,NULL,0,NULL,0,NULL,NULL,NULL,NULL),(10010,'Our Location',1,100,'--','--',1,'',0,NULL,0,NULL,0,NULL,0,NULL,NULL,NULL,NULL),(100410,'About Us-Vission, Mission and Values-Mission',2,1004,'Our vision is a landmark of direction to grow profitability through delivery of high quality products competitively to customers and develop high skill of our people in the oleochemicals industry.','Unsere Vision ist ein Meilenstein in der Richtung, die Rentabilität durch wettbewerbsfähige Lieferung hochwertiger Produkte an Kunden zu steigern und die Fähigkeiten unserer Mitarbeiter in der Oleochemieindustrie zu entwickeln.',0,'',0,'',0,NULL,0,NULL,0,NULL,'2019-08-22 04:00:00',1,'1:1:1:1'),(100602,'About Us-Group Commitment-2',2,1006,'<p>Gambar Komitment 2</p>','<p>Engagement Bild 2</p>',0,'',0,'',0,NULL,0,NULL,0,NULL,'2019-08-22 04:00:00',1,'1:1:1:1'),(200200,'Application',3,2002,'Ecogreen Oleochemicals products are easily found in a wide range of applications from Personal Care, Household Care, Food, Pharmaceuticals, Lubricants, up to Industrial and Technical Applications. The wide ranges of products used in our daily life that contain oleochemicals are quite important.','Ecogreen Oleochemicals products are easily found in a wide range of applications from Personal Care, Household Care, Food, Pharmaceuticals, Lubricants, up to Industrial and Technical Applications. The wide ranges of products used in our daily life that contain oleochemicals are quite important.',1,'',0,NULL,0,NULL,0,NULL,0,NULL,NULL,NULL,NULL),(200201,'Application-Image-1',3,2002,'--','--',1,'',0,NULL,0,NULL,0,NULL,0,NULL,NULL,NULL,NULL),(300534,'Corporate Social Responsibility-4',4,3004,'<p><strong>2. Mangrove for Sustainable Livelihood</strong></p>\r\n<p>Global warming has decreased the number of fish and sea creatures in Batam water and caused local fishers change to be sand miner. In addition, threat of coastal abrasion is also become other concern for surrounding community.</p>\r\n<p>On April 2019, Ecogreen Oleochemical, with Kampung Kelembak and Aliansi Rehab Bumi together initiated to plant 1000 mangroves at Kampung Kelembak coastal line. Ecogreen is committed to continuously plant mangroves as well as monitor the mangrove plantation. We believe that the initiatives would bring constructive impacts to the environment quality in Kampung Kelembak and vision for tourist village in the future.</p>','<p><strong>2. Mangrove for Sustainable Livelihood</strong></p>\r\n<p>Global warming has decreased the number of fish and sea creatures in Batam water and caused local fishers change to be sand miner. In addition, threat of coastal abrasion is also become other concern for surrounding community.</p>\r\n<p>On April 2019, Ecogreen Oleochemical, with Kampung Kelembak and Aliansi Rehab Bumi together initiated to plant 1000 mangroves at Kampung Kelembak coastal line. Ecogreen is committed to continuously plant mangroves as well as monitor the mangrove plantation. We believe that the initiatives would bring constructive impacts to the environment quality in Kampung Kelembak and vision for tourist village in the future.</p>',0,'',0,'',0,NULL,0,NULL,0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cpanel_leftmenu`
--

DROP TABLE IF EXISTS `cpanel_leftmenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cpanel_leftmenu` (
  `id_leftmenu` int(11) NOT NULL,
  `id_parent_leftmenu` int(11) NOT NULL,
  `has_child` int(1) NOT NULL,
  `menu_name` varchar(200) NOT NULL,
  `menu_icon` varchar(100) NOT NULL,
  `value_indo` varchar(250) NOT NULL,
  `value_eng` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `is_public` int(1) NOT NULL DEFAULT '0',
  `auth` text NOT NULL,
  `mobile_display` set('NONE','MOBILE_TOP','MOBILE_BOTTOM') NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_leftmenu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cpanel_leftmenu`
--

LOCK TABLES `cpanel_leftmenu` WRITE;
/*!40000 ALTER TABLE `cpanel_leftmenu` DISABLE KEYS */;
INSERT INTO `cpanel_leftmenu` VALUES (2100,0,1,'Transaksi Utama','handshake','Transaksi Utama','Transaksi Utama','#',0,'admin','',1),(2101,2100,0,'Barang Masuk','arrow-circle-right','Barang Masuk','Barang Masuk','material-in/index',0,'admin','MOBILE_TOP',1),(2102,2100,0,'Barang Diproses','spinner','Barang Diproses','Barang Diproses','material-out/index',0,'admin','MOBILE_TOP',0),(2103,2100,0,'Rekapitulasi','edit','Rekapitulasi','Rekapitulasi','material-in/rekapitulasi-material',0,'admin','MOBILE_TOP',1),(2104,2100,0,'Laporan Harian','edit','Laporan Harian','Laporan Harian','material-in/laporan-harian',0,'admin','MOBILE_TOP',1),(2105,2100,0,'Laporan Bulanan','edit','Laporan Bulanan','Laporan Bulanan','material-in/laporan-bulanan',0,'admin','MOBILE_TOP',1),(2106,2100,0,'Laporan Tahunan','edit','Laporan Tahunan','Laporan Tahunan','material-in/laporan-tahunan',0,'admin','MOBILE_TOP',1),(11000,0,1,'Link Management','link','Link Management','Link Management','#',0,'admin','',0),(11001,11000,0,'Menu Link','list-alt','Menu Link','Menu Link','menu-link/index',0,'admin','MOBILE_TOP',1),(11002,11000,0,'Media Identity','play-circle-o','Media Identity','Media Identity','media-identity/index',0,'admin','MOBILE_TOP',1),(12000,0,1,'Data Master','database','Data Master','Data Master','#',0,'admin','',1),(12001,12000,0,'Material','file-alt','Material','Material','material/index',0,'admin','MOBILE_TOP',1),(12002,12000,0,'Akun','user-circle','Akun','Akun','akun/index',0,'admin','MOBILE_TOP',1),(12003,12000,0,'Material Pendukung','cart-arrow-down','Material Pendukung','Material Pendukung','material-support/index',0,'admin','MOBILE_TOP',1),(12004,12000,0,'Unit Produksi','users','Unit Produksi','Unit Produksi','unit-produksi/index',0,'admin','MOBILE_TOP',1),(12005,12000,0,'Basic Packing','cubes','Basic Packing','Basic Packing','basic-packing/index',0,'admin','MOBILE_TOP',1),(13000,0,1,'Setting','cogs','Setting','Setting','#',0,'admin','',1),(13001,13000,0,'Setting','cog','Setting','Setting','app-setting/index',0,'admin','MOBILE_TOP',1),(13002,13000,0,'Home Display','file-alt','Home Display','Home Display','home-info/index',0,'admin','MOBILE_TOP',0),(14000,0,1,'User Management','users','User Management','User Management','#',0,'admin','',1),(14001,14000,0,'User','user','User','User','user/index',0,'admin','MOBILE_TOP',1),(15000,0,1,'Management RBAC','users','Management RBAC','Management RBAC','#',0,'admin','',0),(15001,15000,0,'Assignments','circle','Assignments','Assignments','admin/assignment',0,'admin','MOBILE_TOP',0),(15002,15000,0,'Roles','circle','Roles','Roles','admin/role',0,'admin','MOBILE_TOP',0),(15003,15000,0,'Permissions','circle','Permissions','Permissions','admin/permission',0,'admin','MOBILE_TOP',0),(15004,15000,0,'Routes','circle','Routes','Routes','admin/route',0,'admin','MOBILE_TOP',0),(15005,15000,0,'Rules','circle','Rules','Rules','admin/rule',0,'admin','MOBILE_TOP',0),(1100000,0,0,'Logout ','sign-out','Logout ','Logout ','site/logout',0,'admin, member','',0);
/*!40000 ALTER TABLE `cpanel_leftmenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frontend_topnav`
--

DROP TABLE IF EXISTS `frontend_topnav`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frontend_topnav` (
  `id_frontend_topnav` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent_topnav` int(11) NOT NULL,
  `is_expanded` int(1) NOT NULL DEFAULT '0',
  `menu_name_lang1` varchar(250) DEFAULT NULL,
  `menu_name_lang2` varchar(250) DEFAULT NULL,
  `description_lang1` varchar(250) DEFAULT NULL,
  `description_lang2` varchar(250) DEFAULT NULL,
  `link_url` varchar(250) NOT NULL,
  `file_image` varchar(250) DEFAULT NULL,
  `is_visible` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_frontend_topnav`)
) ENGINE=InnoDB AUTO_INCREMENT=5009 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frontend_topnav`
--

LOCK TABLES `frontend_topnav` WRITE;
/*!40000 ALTER TABLE `frontend_topnav` DISABLE KEYS */;
INSERT INTO `frontend_topnav` VALUES (100,0,0,'Beranda','Zuhause','','','index','',1),(1000,0,1,'Profil','Über uns','<p>Profil PPID BPOM dapat dilihat di sini. Informasi seperti sejarah, tugas dan fungsi serta struktur organisasi</p>','','','topnav_1000.jpg',1),(1001,1000,0,'Sejarah','Firmenlogo','','','sejarah','',1),(1002,1000,0,'Tugas dan Fungsi','Firmenprofil','','','tugas_dan_fungsi','',1),(1003,1000,0,'Stuktur Organisasi','Unsere Position','','','struktur_organisasi','',1),(1004,1000,0,'Galeri','Vision, Mission und Werte','','','galeri','',1),(2000,0,0,'Regulasi','','','','regulasi','',1),(3000,0,1,'Informasi Publik','Nachhaltigkeit','<p>Anda dapat melihat beberapa informasi publik seperti informasi berkala, informasi serta merta dan informasi setiap saat.</p>','','','topnav_3000.jpeg',1),(3001,3000,0,'Informasi Secara Berkala','Nachhaltigkeits-Dashboard',NULL,NULL,'informasi-berkala','',1),(3002,3000,0,'Informasi Serta Merta','Nachhaltigkeitsverpflichtung','','','informasi-serta-merta','',1),(3003,3000,0,'Informasi Setiap Saat','Beschwerde','','','informasi-setiap-saat','',1),(4000,0,0,'Laporan','','','','laporan','',1),(5000,0,1,'Standard Layanan','','<p>Anda dapat memperoleh informasi terkait standard layanan seperti SOP, Media, Permohonan Informasi, pengajuan keberatan, dsb.</p>','','','topnav_5000.jpg',1),(5001,5000,0,'SOP Layanan','Kontaktiere uns','','','sop-layanan','',1),(5002,5000,0,'Media Layanan',NULL,NULL,NULL,'media-layanan',NULL,1),(5003,5000,0,'Maklumat Layanan',NULL,NULL,NULL,'maklumat-layanan',NULL,1),(5004,5000,0,'Permohonan Informasi',NULL,NULL,NULL,'permohonan-informasi',NULL,1),(5005,5000,0,'Biaya Layanan',NULL,NULL,NULL,'biaya-layanan',NULL,1),(5006,5000,0,'Jadwal Layanan',NULL,NULL,NULL,'jadwal-layanan',NULL,1),(5007,5000,0,'Pengajuan Keberatan',NULL,NULL,NULL,'pengajuan-keberatan',NULL,1),(5008,5000,0,'Permohonan Penyelesaian Sengketa Informasi',NULL,NULL,NULL,'penyelesaian-sengketa',NULL,1);
/*!40000 ALTER TABLE `frontend_topnav` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_info`
--

DROP TABLE IF EXISTS `home_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `home_info` (
  `id_home_info` int(11) NOT NULL AUTO_INCREMENT,
  `no` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_home_info`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_info`
--

LOCK TABLES `home_info` WRITE;
/*!40000 ALTER TABLE `home_info` DISABLE KEYS */;
INSERT INTO `home_info` VALUES (1,1,'Smart Farming','Smart Farming merupakan sebuah sistem yang digunakan untuk... (silakan diisi)'),(2,2,'Drone & Sensor','Salah satu teknologi yang digunakan dalam smart farming ini adalah penggunaan teknologi drone dan sensor.'),(3,3,'Aktif Monitoring','Anda sebagai pemilik lahan ataupun pengelola lahan (mandor / petani) dapat melakukan monitoring lahan pertanian secara aktif');
/*!40000 ALTER TABLE `home_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image_management`
--

DROP TABLE IF EXISTS `image_management`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image_management` (
  `id_image_management` bigint(20) NOT NULL,
  `keyname` varchar(100) NOT NULL,
  `id_section_content` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_user` int(11) DEFAULT NULL,
  `updated_ip_address` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_management`
--

LOCK TABLES `image_management` WRITE;
/*!40000 ALTER TABLE `image_management` DISABLE KEYS */;
/*!40000 ALTER TABLE `image_management` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `j_pembelian`
--

DROP TABLE IF EXISTS `j_pembelian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `j_pembelian` (
  `id_j_pembelian` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_material_support` bigint(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_biaya` double NOT NULL,
  `no_bukti` varchar(250) DEFAULT NULL,
  `tanggal_pembelian` date NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id_j_pembelian`),
  KEY `id_material_support` (`id_material_support`,`tanggal_pembelian`,`bulan`,`tahun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `j_pembelian`
--

LOCK TABLES `j_pembelian` WRITE;
/*!40000 ALTER TABLE `j_pembelian` DISABLE KEYS */;
/*!40000 ALTER TABLE `j_pembelian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language` (
  `id_language` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(150) NOT NULL,
  `short` varchar(20) NOT NULL,
  PRIMARY KEY (`id_language`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` VALUES (1,'English','EN'),(2,'Indonesia','ID');
/*!40000 ALTER TABLE `language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `id_material` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) DEFAULT NULL,
  `nama` varchar(250) NOT NULL,
  `deskripsi` varchar(500) DEFAULT NULL,
  `created_id_user` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id_material`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` VALUES (1,'WL 2433-T1-1','SATIN DOBBY','Bahan kain nyaman untuk di pakai',0,'0000-00-00 00:00:00',''),(2,'WL 2433-T1-2','SATIN','Bahannya ringan dan hangat',0,'0000-00-00 00:00:00',''),(13,'WL 2433-TI-3','LINEN','Kainnya ini tekstur yang lebih halus dari katun',NULL,NULL,NULL),(14,'WL 2433-TI-4','DENIM','Kainnya tebal mudah di cuci dan tidak mudah bau',NULL,NULL,NULL),(15,'WL 2433-TI-5','DRILL','Kainnya lebih tebal dari linen sehingga cocok digunakan sebagai bahan bawahan',NULL,NULL,NULL),(16,'WL 2433-TI-6','BABY CANVAS','Kain halus & lembut',NULL,NULL,NULL),(17,'WL 2433-TI-7','LYCRA','Kain memiliki elastisitas yang tinggi ',NULL,NULL,NULL),(18,'WL 2433-TI-8','ORGANZA','Kain transparan serta siluet kain organza cocok untuk pakaian yang mewah ',NULL,NULL,NULL),(19,'WL 2433-TI-9','POLYESTER','Kain tidak mudah kusut',NULL,NULL,NULL),(20,'WL 2433-TI-10','TWISTCONE','Bahan kainnya tidak tembus pandang',NULL,NULL,NULL);
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_in`
--

DROP TABLE IF EXISTS `material_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_in` (
  `id_material_in` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_unit_poduksi` int(11) NOT NULL,
  `id_material` bigint(20) NOT NULL,
  `varian` varchar(250) NOT NULL,
  `tanggal_proses` date NOT NULL,
  `total_yard_awal` int(11) DEFAULT '0',
  `total_yard_hasil` int(11) DEFAULT '0',
  `total_buang` int(11) DEFAULT '0',
  `catatan` varchar(250) DEFAULT NULL,
  `created_id_user` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id_material_in`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_in`
--

LOCK TABLES `material_in` WRITE;
/*!40000 ALTER TABLE `material_in` DISABLE KEYS */;
INSERT INTO `material_in` VALUES (1,10,1,'Merah dot','2021-07-22',50,50,0,'',NULL,NULL,NULL),(2,10,2,'Merah maroon','2021-07-23',110,110,0,'',NULL,NULL,NULL),(3,10,13,'Cokelat tua','2021-07-24',110,110,0,'',NULL,NULL,NULL),(4,10,14,'Biru dongker','2021-07-25',100,100,0,'',NULL,NULL,NULL),(5,10,15,'Hitam','2021-07-26',100,100,0,'',NULL,NULL,NULL),(6,10,16,'Cokelat muda','2021-07-27',100,100,0,'',NULL,NULL,NULL),(8,10,17,'Hijau','2021-07-28',100,100,0,'',NULL,NULL,NULL),(9,10,18,'Putih','2021-07-29',50,49,1,'',NULL,NULL,NULL),(11,10,19,'Orange','2021-07-30',50,50,0,'',NULL,NULL,NULL),(12,10,20,'Silver','2021-07-31',50,49,1,'',NULL,NULL,NULL),(14,10,14,'Biru dongker','2021-06-24',410,409,1,'',NULL,NULL,NULL),(16,10,20,'Silver','2021-05-26',305,304,1,'',NULL,NULL,NULL),(21,10,2,'Merah maroon','2021-05-31',100,100,0,'',NULL,NULL,NULL),(22,10,14,'Biru dongker','2021-04-25',150,150,0,'',NULL,NULL,NULL),(23,10,15,'Hitam','2021-04-26',150,149,1,'',NULL,NULL,NULL),(25,10,20,'Silver','2021-06-25',100,100,0,'',NULL,NULL,NULL),(26,10,19,'Orange','2020-11-25',100,100,0,'',NULL,NULL,NULL),(27,10,18,'Putih','2020-11-26',130,130,0,'',NULL,NULL,NULL),(28,10,13,'Cokelat tua','2020-11-27',170,170,0,'',NULL,NULL,NULL),(29,10,15,'Hitam','2020-11-28',55,55,0,'',NULL,NULL,NULL),(30,10,17,'Hijau','2020-11-29',55,54,1,'',NULL,NULL,NULL),(31,10,1,'Merah dot','2020-12-05',100,100,0,'',NULL,NULL,NULL),(32,10,18,'Putih','2020-12-06',65,65,0,'',NULL,NULL,NULL),(33,10,13,'Cokelat tua','2020-12-07',55,55,0,'',NULL,NULL,NULL),(34,10,15,'Hitam','2020-12-08',177,175,2,'',NULL,NULL,NULL),(35,10,19,'Orange','2020-12-09',95,95,0,'',NULL,NULL,NULL);
/*!40000 ALTER TABLE `material_in` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_in_item_proc`
--

DROP TABLE IF EXISTS `material_in_item_proc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_in_item_proc` (
  `id_material_in_item_proc` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_material_in` bigint(20) NOT NULL,
  `yard_awal` int(11) NOT NULL,
  `yard_hasil1` int(11) NOT NULL,
  `yard_hasil2` int(11) DEFAULT '0',
  `yard_hasil3` int(11) DEFAULT '0',
  `yard_hasil4` int(11) DEFAULT '0',
  `yard_hasil5` int(11) DEFAULT '0',
  `yard_hasil6` int(11) DEFAULT '0',
  `yard_hasil_total` int(11) NOT NULL DEFAULT '0',
  `buang1` int(11) DEFAULT '0',
  `buang2` int(11) DEFAULT '0',
  `selisih_lebih` int(11) NOT NULL,
  `selisih_kurang` int(11) NOT NULL,
  `is_packing` int(11) DEFAULT '0',
  `id_basic_packing` int(11) DEFAULT '0',
  `label_barcode_number1` varchar(250) DEFAULT NULL,
  `label_barcode_number2` varchar(250) DEFAULT NULL,
  `label_barcode_number3` varchar(250) DEFAULT NULL,
  `label_barcode_number4` varchar(250) DEFAULT NULL,
  `label_barcode_number5` varchar(250) DEFAULT NULL,
  `label_barcode_number6` varchar(250) DEFAULT NULL,
  `created_id_user` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id_material_in_item_proc`),
  KEY `id_material_in` (`id_material_in`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_in_item_proc`
--

LOCK TABLES `material_in_item_proc` WRITE;
/*!40000 ALTER TABLE `material_in_item_proc` DISABLE KEYS */;
INSERT INTO `material_in_item_proc` VALUES (1,1,50,50,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,2,60,60,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,2,50,50,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,3,30,30,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,3,80,80,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,4,100,100,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,5,100,100,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,6,100,100,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,7,150,150,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,9,50,49,NULL,NULL,0,0,0,0,1,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,10,70,70,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,11,50,50,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,12,50,49,NULL,NULL,0,0,0,0,1,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(28,8,50,50,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,7,50,50,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(30,13,150,150,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(31,13,150,150,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(32,13,100,99,NULL,NULL,0,0,0,0,1,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(33,13,100,100,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,14,200,199,NULL,NULL,0,0,0,0,1,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,15,75,75,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(36,15,75,75,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(37,16,150,150,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(38,16,75,75,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(39,16,80,79,NULL,NULL,0,0,0,0,1,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(40,17,75,75,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(41,17,85,84,NULL,NULL,0,0,0,0,1,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(42,8,50,50,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(43,15,50,50,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(44,18,135,135,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(45,19,100,100,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(46,20,50,50,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(47,20,50,49,NULL,NULL,0,0,0,0,1,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(48,21,50,50,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(49,22,100,100,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(50,22,50,50,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(51,23,75,75,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(52,23,75,74,NULL,NULL,0,0,0,0,1,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(53,24,75,75,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(54,24,125,125,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(55,14,100,100,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(56,14,50,50,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(57,14,60,60,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(58,25,50,50,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(59,25,50,50,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(60,21,50,50,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(61,26,65,65,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(62,26,35,35,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(63,27,75,75,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(64,27,55,55,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(65,28,70,70,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(66,29,55,55,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(67,30,55,54,NULL,NULL,0,0,0,0,1,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(68,31,60,60,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(69,31,40,40,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(70,32,65,65,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(71,33,55,55,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(72,34,77,75,NULL,NULL,0,0,0,0,2,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(73,35,45,45,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(74,35,50,50,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(75,28,100,100,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(76,34,100,100,NULL,NULL,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `material_in_item_proc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_support`
--

DROP TABLE IF EXISTS `material_support`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_support` (
  `id_material_support` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) DEFAULT NULL,
  `nama` varchar(250) NOT NULL,
  `deskripsi` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_material_support`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_support`
--

LOCK TABLES `material_support` WRITE;
/*!40000 ALTER TABLE `material_support` DISABLE KEYS */;
INSERT INTO `material_support` VALUES (1,'PLSTK','Plastik Packing','Plastik Pembungkus Untuk Packing Kain'),(2,'CN','Cone','Tabung / Batang untuk penyangga / meletakkan kain'),(3,'LBL','Label','Label Nama');
/*!40000 ALTER TABLE `material_support` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_identity`
--

DROP TABLE IF EXISTS `media_identity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_identity` (
  `id_media_identity` int(11) NOT NULL AUTO_INCREMENT,
  `media_name` varchar(200) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `url` varchar(250) NOT NULL,
  PRIMARY KEY (`id_media_identity`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_identity`
--

LOCK TABLES `media_identity` WRITE;
/*!40000 ALTER TABLE `media_identity` DISABLE KEYS */;
INSERT INTO `media_identity` VALUES (1,'Facebook','fa fa-facebook','http://www.facebook.com/'),(2,'Linkedin','fa fa-linkedin-square ','https://www.linkedin.com');
/*!40000 ALTER TABLE `media_identity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_link`
--

DROP TABLE IF EXISTS `menu_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_link` (
  `id_menu_link` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(100) NOT NULL,
  `menu_name_lang1` varchar(50) DEFAULT NULL,
  `menu_name_lang2` varchar(50) DEFAULT NULL,
  `url` varchar(250) NOT NULL,
  `is_active` int(2) NOT NULL,
  PRIMARY KEY (`id_menu_link`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_link`
--

LOCK TABLES `menu_link` WRITE;
/*!40000 ALTER TABLE `menu_link` DISABLE KEYS */;
INSERT INTO `menu_link` VALUES (1,'Home','Home','Zuhause','index',1),(2,'Tentang Kami','About Us','Über uns','company_profile',1),(6,'Contact Us','Contact Us','Kontaktiere uns','Kontak Kami',1);
/*!40000 ALTER TABLE `menu_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id_news` bigint(20) NOT NULL AUTO_INCREMENT,
  `title_lang1` varchar(250) NOT NULL,
  `title_lang2` varchar(250) DEFAULT NULL,
  `content_lang1` text NOT NULL,
  `content_lang2` text,
  `created_id_user` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL,
  `file_image` varchar(250) DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'PPID Test Berita Part 1 (dengan judul yang agak panjang)','','<p><strong>Cirebon</strong>&nbsp;- Sejumlah jurnalis yang tergabung dari Aliansi Jurnalis Ciayumajakuning (Kota-Kabupaten Cirebon, Majalengka, Kuningan dan Indramayu) berunjuk rasa di depan Gedung DPRD Kota Cirebon, Jawa Barat. Jurnalis menolak pengesahan Rancangan Kitab Undang-undang Hukum Pidana (RKUHP).<br /><br />Koordinator aksi Muhamad Syahrir Romdhon menyebut, sejumlah pasal yang ada pada RKUHP mengancam kebebasan jurnalis. Sebab, pasal-pasal tersebut berbenturan dengan UU No 44 tahun 1999 tentang pers.<br /><br />\"Setelah kami kaji, ada 13 pasal yang bertabrakan dengan UU No 44 tahun 1999 tentang pers. Seperti Pasal 217, 218 dan 219 tentang penyerangan terhadap presiden dan wakil presiden. Bahkan, presiden dan wakil presiden bisa membuat aduan secara tertulis. Hukuman penjara sampai empat setengah tahun,\" kata pria yang akrab disapa Aray itu usai aksi, Kamis (26/9/2019).<br /><br /></p>\r\n<center></center>\r\n<table class=\"linksisip\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<div class=\"lihatjg\"><strong>Baca juga:&nbsp;</strong><a href=\"https://news.detik.com/read/2019/09/26/080949/4722347/10/ruu-kuhp-ditunda-kumpul-kebo-tidak-dihukum-hina-presiden-tak-dipidana\" data-label=\"List Berita\" data-action=\"Berita Pilihan\" data-category=\"Detil Artikel\">RUU KUHP Ditunda: Kumpul Kebo Tidak Dihukum, Hina Presiden Tak Dipidana</a></div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><br />Lebih lanjut, Aray mengatakan 13 pasal yang bertabrakan dengan UU No 44 tahun 1999 itu melemahkan kerja-kerja jurnalistik. Kendati saat ini pemerintah tengah menunda pengesahan RKUHP, itu bukan jaminan bahwa akan dibatalkan.<br /><br />\"Padahal pers itu salah satu pilar demokrasi yang harus terbebas dari berbagai pengekangan. Kami jurnalis menolak RKUHP ini, kami mendesak pemerintah membatalkan pengesahan RKUHP,\" katanya.</p>','',1,'2019-03-07 00:00:00','1','',0),(2,'PPID BPOM Berita 1 - Lorem Ipsum','','<div id=\"lipsum\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec suscipit metus ullamcorper elit dignissim scelerisque. Maecenas et metus gravida tortor sodales luctus a vitae arcu. Aenean sem odio, pharetra non fermentum vitae, dapibus eget odio. Quisque porttitor maximus porttitor. Quisque ullamcorper tristique tempus. Nam finibus quis enim quis sagittis. Mauris vehicula vel ex scelerisque rutrum. Suspendisse orci nibh, bibendum id mollis quis, lacinia non nulla. Duis nec ex quam. Vestibulum quis nulla massa. Sed augue sapien, viverra vitae odio in, consequat viverra lacus. Donec a mi mauris. Maecenas pharetra magna eget tempor pellentesque. Etiam auctor arcu a tincidunt pretium. Sed pulvinar vel ligula consequat interdum. Integer blandit cursus auctor.</p>\r\n<p>Nulla id tincidunt odio. Etiam hendrerit enim a ligula tincidunt, pulvinar porttitor diam molestie. Pellentesque feugiat faucibus magna, in lobortis tellus dignissim vehicula. Cras condimentum, turpis imperdiet commodo rutrum, leo felis ultrices sapien, vel accumsan mi urna a purus. Integer quis leo porttitor, facilisis dolor sed, elementum dui. Vestibulum molestie posuere porttitor. Quisque non viverra lorem. Proin nec viverra nibh. Sed maximus nisi vel commodo suscipit. Donec dignissim turpis non velit cursus, vitae vulputate urna consectetur. Suspendisse ut turpis nunc. Quisque ullamcorper, erat ut eleifend eleifend, tortor nibh lacinia urna, eu volutpat elit ante a nisl. Etiam non neque ac ante lacinia tincidunt id nec ante. Aliquam non nibh nec orci consequat placerat. Morbi tincidunt enim quis diam consectetur, quis commodo magna interdum.</p>\r\n<p>Fusce nec luctus massa. Donec malesuada pulvinar convallis. Vestibulum aliquam mollis viverra. Aliquam sit amet pellentesque nisi, eget porttitor metus. Aliquam in convallis mauris. Suspendisse lobortis libero eget eros hendrerit aliquet. Donec a sapien vestibulum, tempus odio varius, auctor neque. Integer a felis sed justo venenatis rhoncus id ut quam. Nunc ut molestie leo, sed egestas nunc. Aliquam erat volutpat. Nulla nec massa quis quam pulvinar tincidunt.</p>\r\n<p>Morbi tortor ante, vulputate sed libero sit amet, aliquet varius massa. Sed finibus feugiat est sed condimentum. Donec in metus in orci placerat elementum. Vestibulum at porta tortor. Praesent posuere, sapien sed rhoncus dignissim, ante eros gravida velit, a bibendum neque ipsum nec nunc. In condimentum sit amet ante eget faucibus. Phasellus tempus ligula id convallis feugiat. Nulla at diam auctor, sodales neque nec, dictum nisi. Integer sem orci, imperdiet et euismod ac, varius nec turpis. Etiam vitae auctor est. Integer ut sollicitudin ipsum. Sed condimentum egestas luctus. Nullam est tortor, bibendum eu pharetra vel, efficitur nec massa. Donec sed malesuada libero. Integer accumsan, mi a cursus molestie, felis nibh sollicitudin justo, at consequat ligula nunc id est.</p>\r\n<p>Nullam consectetur sed justo vitae molestie. Fusce nec finibus sapien, sagittis dapibus nisi. In quis est non ipsum maximus interdum. Praesent egestas eros a sem fermentum fermentum. Suspendisse sit amet magna posuere, semper nisl nec, laoreet enim. Mauris lectus ligula, ultricies eget ultricies at, volutpat vitae nibh. Curabitur velit urna, sollicitudin ac ante nec, pharetra convallis ante.</p>\r\n</div>','',1,'2021-06-18 12:08:46','127.0.0.1',NULL,1),(3,'PPID Launching Website Baru',NULL,'<div class=\"col-md-12 col-sm-12 col-xs-12\">\r\n<div class=\"well-middle\">\r\n<div class=\"single-well\">\r\n<p>Sebagai kementerian yang ikut membidani lahirnya Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik (UU KIP), Kementerian Komunikasi dan Informatika hadir sebagai Badan Publik yang mendukung dan berkomitmen terhadap pelaksanaan Keterbukaan Informasi Publik di masyarakat. &nbsp;Komitmen dalam pelaksanaan UU KIP ini tercermin dengan tidak pernah absennya Kementerian Kominfo untuk masuk dalam peringkat 10 (sepuluh) besar dalam penilaian pelaksanaan UU KIP yang diselenggarakan oleh Komisi Informasi Pusat.</p>\r\n<p>Sebagai salah satu Badan Publik yang pada periode awal hadirnya UU KIP telah membentuk Pejabat Pengelola Informasi dan Dokumentasi (PPID) melalui Keputusan Menteri Komunikasi dan Informatika Nomor 117/KEP/M.KOMINFO/03/2010 tentang Organisasi Pengelola Informasi dan Dokumentasi. Kementerian Kominfo terus berupaya untuk menjaga momentum keterbukaan informasi di masyarakat. Oleh karena itu, PPID Kementerian Kominfo bersungguh-sungguh untuk dapat :<br />1.&nbsp;&nbsp; &nbsp;Memberikan pelayanan informasi yang cepat dan tepat waktu<br />2.&nbsp;&nbsp; &nbsp;Memberikan kemudahan dalam mendapatkan informasi publik bidang komunikasi dan informatika yang diperlukan dengan murah dan sederhana<br />3.&nbsp;&nbsp; &nbsp;Menyediakan dan memberikan informasi publik yang akurat, benar, dan tidak menyesatkan<br />4.&nbsp;&nbsp; &nbsp;Menyediakan daftar informasi publik untuk informasi yang wajib disediakan dan diumumkan<br />5.&nbsp;&nbsp; &nbsp;Menjamin penggunaan seluruh informasi publik dan fasilitasi pelayanan sesuai dengan ketentuan dan tata tertib yang berlaku<br />6.&nbsp;&nbsp; &nbsp;Menyiapkan ruang dan fasilitas yang nyaman dan tertata baik<br />7.&nbsp;&nbsp; &nbsp;Merespon dengan cepat permintaan informasi dan keberatan atas informasi publik yang disampaikan baik langsung maupun melalui media<br />8.&nbsp;&nbsp; &nbsp;Menyiapkan petugas informasi yang berdedikasi dan siap melayani<br />9.&nbsp;&nbsp; &nbsp;Melakukan pengawasan internal dan evaluasi kinerja pelaksana</p>\r\n<p>Seiring dengan perkembangan organisasi di Kementerian Kominfo, pada tahun 2016 PPID melakukan perubahan organisasi dan tata kerja. Dengan disahkannya Keputusan Menteri Kominfo Nomor 1740 Tahun 2016 PPID Kementerian Kominfo bertransformasi untuk meningkatkan layanan informasi publik ke masyarakat.&nbsp;</p>\r\n<p>Hadirnya pucuk pimpinan Kementerian Kominfo sebagai Pengarah dan Para Eselon&nbsp;I sebagai Tim Pertimbangan Pelayanan Informasi merepresentasikan komitmen pimpinan dalam ikut melaksanakan UU KIP ini. Dalam struktur ini juga, kolaborasi antar satuan kerja benar-benar diprioritaskan dalam memberikan layanan informasi kepada masyarakat secara tepat dan akurat sesuai undang-undang.</p>\r\n<p>Kepala Biro Hubungan Masyarakat yang sejak awal berdirinya PPID berperan sebagai Pejabat Pengelola Informasi dan Dokumentasi, menjadi garda terdepan dalam pelaksanaan UU KIP di Kementerian Kominfo serta terus menjalankan tugas yang diamanatkan dalam KM Kominfo No 1740 Tahun 2016. Dibantu dengan personil-personil dibawahnya, Kepala Biro Hubungan Masyarakat menjalankan layanan rutin harian pelayanan informasi serta bersinergi dengan Pusat Data dan Sarana Informatika untuk fungsi pengelolaan informasi, Biro Umum untuk Dokumentasi dan Arsip, serta Biro Hukum dalam proses pengaduan dan penyelesaian sengketa.</p>\r\n</div>\r\n</div>\r\n</div>',NULL,1,'2021-06-18 12:50:33','127.0.0.1',NULL,1),(4,'PENJELASAN BADAN POM RI tentang Isu Nata De Coco',NULL,'<p>Sehubungan dengan kembali merebaknya isu negatif di media sosial terkait Nata de Coco, Badan POM perlu memberikan penjelasan sebagai berikut:</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li>Nata de Coco merupakan pangan yang dibuat dari bahan baku air kelapa, sehingga termasuk sebagai kelompok bahan baku berbasis buah di dalam kategori pangan.</li>\r\n<li>Nata de Coco terbentuk dari jutaan benang serat tipis atau selulosa yang sering juga disebut sebagai&nbsp;<em>dietary fiber</em>&nbsp;atau serat pangan.</li>\r\n<li>Kandungan&nbsp;<em>dietary fiber&nbsp;</em>atau serat pangan pada Nata de Coco baik untuk tubuh karena memang diperlukan dan penting untuk pencernaan.</li>\r\n<li>Lapisan yang banyak tersebut juga membuat Nata de Coco bisa memerangkap cairan. Jika ditekan, maka cairan tersebut akan keluar dan yang tertinggal adalah benang-benang serat yang menyerupai lembaran tipis. Lembaran tipis ini lah yang diisukan atau disebut-sebut seolah-olah lembaran plastik.</li>\r\n<li>Potongan Nata de Coco yang semula lembut kenyal bisa digigit putus, akan menjadi sangat liat, dan sangat sulit untuk disobek jika cairannya berkurang karena yang tertinggal adalah kumpulan benang-benang serat tipis.</li>\r\n<li>Kualitas Nata de Coco yang baik ditandai dengan warnanya yang putih bersih, transparan, struktur kuat, tidak mudah hancur, tidak lengket, tidak berbau asam, serta tidak mengandung kotoran.</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>Badan POM terus mengimbau masyarakat agar menjadi konsumen cerdas dan tidak mudah terpengaruh dengan isu yang beredar melalui media sosial. Selalu lakukan Cek KLIK (Cek Kemasan, Cek Label, Cek Izin edar, dan Cek Kedaluwarsa) sebelum membeli atau mengonsumsi produk pangan.</p>\r\n<p>&nbsp;</p>\r\n<p>Jika masyarakat menemukan produk yang mencurigakan atau ingin mendapatkan informasi lebih lanjut, hubungi&nbsp;<em>Contact Center</em>&nbsp;HALOBPOM 1500533 (pulsa lokal), SMS 0812-1-9999-533,&nbsp;<em>WhatsApp&nbsp;</em>0811-9181-533,&nbsp;<em>e-mail</em>&nbsp;halobpom@pom.go.id,&nbsp;<em>Twitter&nbsp;</em>@BPOM_RI, atau Unit Layanan Pengaduan Konsumen (ULPK) Balai Besar/Balai POM di seluruh Indonesia.</p>',NULL,1,'2021-06-22 07:36:16','::1',NULL,1),(5,'PPID BPOM Test Berita III',NULL,'<p>Sehubungan dengan beredarnya pemberitaan di media daring tentang cacing yang ditemukan dalam ikan makerel kemasan kaleng, BPOM RI memandang perlu memberikan penjelasan sebagai berikut:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n<ol>\r\n<li>BPOM RI telah berkoordinasi dengan dinas terkait di Provinsi Riau untuk melakukan penelusuran dan pemeriksaan guna memastikan adanya dugaan cacing dalam ikan makerel dalam kaleng.</li>\r\n<li>Hasil pemeriksaan dan pengujian BPOM RI menemukan adanya cacing dengan kondisi mati pada produk ikan makerel dalam saus tomat dalam kaleng ukuran 425 gr, yaitu:&nbsp;\r\n<ul>\r\n<li>Merek Farmerjack, nomor izin edar (NIE) BPOM RI ML 543929007175, nomor bets 3502/01106 35 1 356;</li>\r\n<li>Merek IO, NIE BPOM RI ML 543929070004, nomor bets 370/12 Oktober 2020; dan</li>\r\n<li>Merek HOKI, NIE BPOM RI ML 543909501660, nomor Bets 3502/01103/-.</li>\r\n</ul>\r\n</li>\r\n<li>BPOM RI telah memerintahkan kepada importir untuk menarik produk FARMERJACK, IO dan HOKI dengan bets tersebut di atas dari peredaran dan melakukan pemusnahan.</li>\r\n<li>Produk yang mengandung cacing tidak layak dikonsumsi dan pada konsumen tertentu dapat menyebabkan reaksi alergi (hipersensitifitas) pada orang yang sensitif.</li>\r\n<li>BPOM RI terus memantau pelaksanaan penarikan dan pemusnahan serta meningkatkan sampling dan pengujian terhadap peredaran bets lainnya dan semua produk ikan dalam kaleng lainnya baik produk dalam maupun luar negeri.</li>\r\n</ol>\r\n<p>Masyarakat dihimbau untuk lebih cermat dan hati-hati dalam membeli produk pangan. Selalu ingat cek &ldquo;KLIK&rdquo; (Kemasan, Label, Izin Edar, dan Kedaluwarsa) sebelum membeli atau mengonsumsi produk pangan. Pastikan kemasannya dalam kondisi utuh, baca informasi pada label, pastikan memiliki izin edar dari BPOM RI, dan tidak melebihi masa kedaluwarsa. Masyarakat yang menemukan produk bermasalah dapat menghubungi Contact Center HALO BPOM di nomor telepon 1-500-533 (pulsa lokal), SMS 0812-1-9999-533, e-mail: halobpom@pom.go.id, atau Unit Layanan Pengaduan Konsumen (ULPK) Balai Besar/Balai POM di seluruh Indonesia.</p>',NULL,1,'2021-06-22 07:40:19','::1',NULL,1);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section_content`
--

DROP TABLE IF EXISTS `section_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section_content` (
  `id_section_content` int(11) NOT NULL AUTO_INCREMENT,
  `section_content` varchar(250) NOT NULL,
  `is_active` int(1) DEFAULT '1',
  PRIMARY KEY (`id_section_content`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section_content`
--

LOCK TABLES `section_content` WRITE;
/*!40000 ALTER TABLE `section_content` DISABLE KEYS */;
INSERT INTO `section_content` VALUES (1,'HOME',1),(2,'ABOUT US',1),(3,'PRODUCT',1),(5,'CONTACT US',1);
/*!40000 ALTER TABLE `section_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unit_produksi`
--

DROP TABLE IF EXISTS `unit_produksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unit_produksi` (
  `id_unit_produksi` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama_unit` varchar(250) NOT NULL,
  `lokasi` varchar(250) DEFAULT NULL,
  `foto1` varchar(250) NOT NULL,
  `desc_fungsi` varchar(250) DEFAULT NULL,
  `desc_material_in` varchar(250) DEFAULT NULL,
  `desc_proses` varchar(500) DEFAULT NULL,
  `desc_material_out` varchar(250) DEFAULT NULL,
  `jumlah_operator` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_unit_produksi`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit_produksi`
--

LOCK TABLES `unit_produksi` WRITE;
/*!40000 ALTER TABLE `unit_produksi` DISABLE KEYS */;
INSERT INTO `unit_produksi` VALUES (10,'UNIT PACKING KAIN','Pabrik 2 - TAMAN KOPO INDAH 3 E5 Blok 00 No-1 Kel. MEKAR RAHAYU Kec. MARGAASIH Kota BANDUNG','','1) Menghitung ulang kain yang datang (yard ulang)\r\n2) Melaporkan hasil hitungan dan berapa yang dibuang\r\n3) Mengemas ulang dengan plastik baru, cone baru dan label baru','Kain yang sudah dimakloon dari pihak ketiga','Menghitung ulang kain, menghitung BS, mengemas (packing) dengan yang baru','Kain yang sudah dipacking dengan potongan atau ukuran tertentu',5);
/*!40000 ALTER TABLE `unit_produksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_key` varchar(250) NOT NULL,
  `status` smallint(6) NOT NULL,
  `password_reset_token` varchar(250) NOT NULL,
  `user_level` enum('admin','member','management (SA)','management (ST)','ADM') NOT NULL DEFAULT 'ADM',
  `role` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `email` (`email`),
  KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Admin','admin','admin@admin.com','$2y$13$wUP89zDmoJhxVQ55PqilV.K/5e3.K2RSRuhHShtr5zVJzSXZtBFJS','GL63CdJxr0wI2BuKh7JNC8rJU7XNUY24',10,'asdas','admin',20,1530780329,1557132823);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_perusahaan`
--

DROP TABLE IF EXISTS `user_perusahaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_perusahaan` (
  `id_user_perusahaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_ip_address` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user_perusahaan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_perusahaan`
--

LOCK TABLES `user_perusahaan` WRITE;
/*!40000 ALTER TABLE `user_perusahaan` DISABLE KEYS */;
INSERT INTO `user_perusahaan` VALUES (1,5,1,'0000-00-00 00:00:00',0,''),(2,8,15,'0000-00-00 00:00:00',0,''),(3,1,2,'0000-00-00 00:00:00',0,''),(4,10,1,'2019-02-25 06:14:48',0,'::1'),(5,12,99,'2019-03-08 04:20:19',0,'::1');
/*!40000 ALTER TABLE `user_perusahaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `web_page`
--

DROP TABLE IF EXISTS `web_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `web_page` (
  `id_web_page` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `with_banner` int(1) NOT NULL,
  `content_lang1` text NOT NULL,
  `content_lang2` text,
  `created_id_user` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id_web_page`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `web_page`
--

LOCK TABLES `web_page` WRITE;
/*!40000 ALTER TABLE `web_page` DISABLE KEYS */;
INSERT INTO `web_page` VALUES (1,'custom-page',1,'<h2 class=\"featurette-heading\">COMPANY INTRODUCTION</h2>\r\n<hr />\r\n<p class=\"lead\">Founded in 1990, Ecogreen Oleochemicals is one of the leading producers of Natural Fatty Alcohols in the world. Ecogreen Oleochemicals has production facilities in Indonesia which producing various cuts of Saturated Fatty Alcohols (from C8 to C18). Unsaturated Fatty Alcohols (Oleyl Alcohols), Oleic Acid, Refined Glycerin and Specialty Esters such as Medium Chain Triglycerides (MCT for Food, Cosmetics, Pharmaceutical and Lubricant application).</p>\r\n<p class=\"lead\">Ecogreen Oleochemicals has also Ethoxylation Plant (EMPL) in Singapore producing Fatty Alcohol Ethoxylates (downstream of fatty alcohol). In Germany, Ecogreen Oleochemicals (DHW Deutsche Hydrierwerke GmbH Rodleben) has production facilities to produce Unsaturated Fatty Alcohols (Oleyl Alcohols), Primary Fatty Amines, Specialty Esters, Sorbitol powder. In France, Ecogreen Oleochemicals (E&amp;S Chimie) has production facilities to produce Fatty Alcohol Ethoxylates, Fatty Alcohol Esther Sulfates, Fatty Alcohol Sulfates and Specialty Esters. Currently Ecogreen Oleochemicals employs about 1,300 people globally.</p>\r\n<p class=\"lead\">To serve customers globally, Ecogreen Oleochemicals establishes marketing offices in Singapore, Germany and USA.</p>','<h2 class=\"featurette-heading\">COMPANY INTRODUCTION</h2>\r\n<hr />\r\n<p class=\"lead\">Founded in 1990, Ecogreen Oleochemicals is one of the leading producers of Natural Fatty Alcohols in the world. Ecogreen Oleochemicals has production facilities in Indonesia which producing various cuts of Saturated Fatty Alcohols (from C8 to C18). Unsaturated Fatty Alcohols (Oleyl Alcohols), Oleic Acid, Refined Glycerin and Specialty Esters such as Medium Chain Triglycerides (MCT for Food, Cosmetics, Pharmaceutical and Lubricant application).</p>\r\n<p class=\"lead\">Ecogreen Oleochemicals has also Ethoxylation Plant (EMPL) in Singapore producing Fatty Alcohol Ethoxylates (downstream of fatty alcohol). In Germany, Ecogreen Oleochemicals (DHW Deutsche Hydrierwerke GmbH Rodleben) has production facilities to produce Unsaturated Fatty Alcohols (Oleyl Alcohols), Primary Fatty Amines, Specialty Esters, Sorbitol powder. In France, Ecogreen Oleochemicals (E&amp;S Chimie) has production facilities to produce Fatty Alcohol Ethoxylates, Fatty Alcohol Esther Sulfates, Fatty Alcohol Sulfates and Specialty Esters. Currently Ecogreen Oleochemicals employs about 1,300 people globally.</p>\r\n<p class=\"lead\">To serve customers globally, Ecogreen Oleochemicals establishes marketing offices in Singapore, Germany and USA.</p>',NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `web_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `web_vocabulary`
--

DROP TABLE IF EXISTS `web_vocabulary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `web_vocabulary` (
  `id_web_vocabulary` bigint(20) NOT NULL AUTO_INCREMENT,
  `vocab_lang1` varchar(250) NOT NULL,
  `vocab_lang2` varchar(250) NOT NULL,
  PRIMARY KEY (`id_web_vocabulary`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `web_vocabulary`
--

LOCK TABLES `web_vocabulary` WRITE;
/*!40000 ALTER TABLE `web_vocabulary` DISABLE KEYS */;
INSERT INTO `web_vocabulary` VALUES (1,'Read More','Baca Lagi'),(2,'Berita','Berita'),(3,'Our Vission','Unsere Vision'),(4,'Our Mission','Unsere Aufgabe'),(5,'Our Values','Unsere Werte'),(6,'Corporate News','Unternehmensnachrichten'),(7,'Back','Zurück'),(8,'Create','Buat');
/*!40000 ALTER TABLE `web_vocabulary` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-02  2:50:42
