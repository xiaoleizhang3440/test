# Host: localhost  (Version: 5.5.53)
# Date: 2018-01-31 01:58:53
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "table_admin"
#

DROP TABLE IF EXISTS `table_admin`;
CREATE TABLE `table_admin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "table_admin"
#

/*!40000 ALTER TABLE `table_admin` DISABLE KEYS */;
INSERT INTO `table_admin` VALUES (1,'admin','14e1b600b1fd579f47433b88e8d85291'),(2,'admin2','14e1b600b1fd579f47433b88e8d85291');
/*!40000 ALTER TABLE `table_admin` ENABLE KEYS */;

#
# Structure for table "table_category"
#

DROP TABLE IF EXISTS `table_category`;
CREATE TABLE `table_category` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT NULL,
  `category_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

#
# Data for table "table_category"
#

/*!40000 ALTER TABLE `table_category` DISABLE KEYS */;
INSERT INTO `table_category` VALUES (3,'货物名称','goods_name'),(4,'每件体积','package_volume'),(5,'刚种','steel_type'),(6,'需要车种','vehicle_type'),(7,'起运地','from_where'),(8,'到达地','to_where'),(9,'委托事项','delegate_item'),(10,'公式','ship_formula'),(11,'承运商','ship_vendor'),(15,'委托单位','delegate_unit'),(16,'委托人','delegate_person'),(17,'单价/包车','unit_price'),(18,'开账员','biller_person');
/*!40000 ALTER TABLE `table_category` ENABLE KEYS */;

#
# Structure for table "table_form"
#

DROP TABLE IF EXISTS `table_form`;
CREATE TABLE `table_form` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `consignment_ID` varchar(255) DEFAULT NULL,
  `goods_name` varchar(255) DEFAULT NULL,
  `contract_num` varchar(255) DEFAULT NULL,
  `package_num` int(11) DEFAULT NULL,
  `package_volume` varchar(255) DEFAULT NULL,
  `steel_type` varchar(255) DEFAULT NULL,
  `delegate_num` int(11) DEFAULT NULL,
  `vehicle_type` varchar(255) DEFAULT NULL,
  `vehicle_amount` varchar(255) DEFAULT NULL,
  `receiver_comment` text,
  `from_where` varchar(255) DEFAULT NULL,
  `to_where` varchar(255) DEFAULT NULL,
  `delegate_item` varchar(255) DEFAULT NULL,
  `vehicle_num` varchar(255) DEFAULT NULL,
  `vehicle_trips` varchar(255) DEFAULT NULL,
  `kilo_meter` varchar(255) DEFAULT NULL,
  `vehicle_weight` varchar(255) DEFAULT NULL,
  `vehicle_starttime` varchar(255) DEFAULT NULL,
  `vehicle_endtime` varchar(255) DEFAULT NULL,
  `dispatch_comment` text,
  `driver_item1` varchar(255) DEFAULT NULL,
  `driver_comment1` varchar(500) DEFAULT NULL,
  `driver_item2` varchar(255) DEFAULT NULL,
  `driver_comment2` varchar(255) DEFAULT NULL,
  `driver_item3` varchar(255) DEFAULT NULL,
  `driver_comment3` varchar(255) DEFAULT NULL,
  `driver_item4` varchar(255) DEFAULT NULL,
  `driver_comment4` varchar(255) DEFAULT NULL,
  `driver_item5` varchar(255) DEFAULT NULL,
  `driver_comment5` varchar(255) DEFAULT NULL,
  `ton_num` varchar(255) DEFAULT NULL,
  `dump_num` varchar(255) DEFAULT NULL,
  `goods_level` varchar(255) DEFAULT NULL,
  `cost_ship_weight` int(11) DEFAULT NULL,
  `cost_dump_weight` int(11) DEFAULT NULL,
  `cost_ship_unitprice` float DEFAULT NULL,
  `cost_dump_unitprice` float DEFAULT NULL,
  `cost_ship_gross` float DEFAULT NULL,
  `cost_dump_gross` float DEFAULT NULL,
  `ship_formula` varchar(255) DEFAULT NULL,
  `ship_biller` varchar(255) DEFAULT NULL,
  `ship_date` varchar(225) DEFAULT NULL,
  `caculated_price` float DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `order_status` int(11) DEFAULT '0',
  `delegate_unit` varchar(255) DEFAULT NULL,
  `delegate_person` varchar(255) DEFAULT NULL,
  `ship_vendor` varchar(255) DEFAULT NULL,
  `sendorder_person` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

#
# Data for table "table_form"
#

/*!40000 ALTER TABLE `table_form` DISABLE KEYS */;
INSERT INTO `table_form` VALUES (86,'20180131-1','测试货物','',0,'','',3,'','','','旗云2','xdfdsfa','','单价包车1','','','4','','','','','2','','','','','','','','','','','',0,0,3,0,0,0,'','','点击选择',3,'2018-01-31 00:53:37',1,'33','委托人1','承运商1',''),(87,'20180131-2','测试货物','',0,'','',0,'','','','fffff','到达2','sss','单价包车2','','','88','','','','','88444','','','','','','','','','','','',0,0,0,0,0,0,'','','点击选择',0,'2018-01-31 00:54:22',0,'442','委托人2','承运商1','aaaaaxx'),(88,'20180131-3','','',0,'','',0,'','','','','','','','','','','','','','','','','','','','','','','','','','',0,0,0,0,0,0,'','','点击选择',0,'2018-01-31 01:24:55',1,'','','',''),(89,'20180131-4','','',0,'','',0,'','','','','','','','','','','','','','','','','','','','','','','','','','',0,0,0,0,0,0,'','','点击选择',0,'2018-01-31 01:26:41',1,'','','','');
/*!40000 ALTER TABLE `table_form` ENABLE KEYS */;

#
# Structure for table "table_options"
#

DROP TABLE IF EXISTS `table_options`;
CREATE TABLE `table_options` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `option_value` varchar(255) DEFAULT NULL,
  `option_category` varchar(255) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

#
# Data for table "table_options"
#

/*!40000 ALTER TABLE `table_options` DISABLE KEYS */;
INSERT INTO `table_options` VALUES (1,'testa','goods_name','2017-12-21 13:54:13'),(2,'aaaa','package_volume','2017-12-21 13:54:37'),(3,'bbbbb','steel_type','2017-12-21 13:54:41'),(5,'eeeee','vehicle_type','2017-12-21 13:54:51'),(6,'fffff','from_where','2017-12-21 13:54:56'),(7,'xdfdsfa','to_where','2017-12-21 13:55:02'),(9,'gdfd','ship_formula','2017-12-21 13:55:13'),(13,'天天','package_volume','2018-01-21 15:18:06'),(15,'承运商1','ship_vendor','2018-01-21 18:28:57'),(16,'测试货物','goods_name','2018-01-26 00:00:23'),(17,'sss','delegate_item','2018-01-26 17:41:38'),(20,'旗云2','from_where','2018-01-28 00:20:16'),(21,'到达2','to_where','2018-01-28 00:36:21'),(22,'委托单位1','delegate_unit','2018-01-30 11:39:10'),(23,'委托单位2','delegate_unit','2018-01-30 11:39:28'),(24,'委托人1','delegate_person','2018-01-30 11:39:40'),(25,'委托人2','delegate_person','2018-01-30 11:39:49'),(26,'单价包车1','unit_price','2018-01-30 11:40:18'),(27,'单价包车2','unit_price','2018-01-30 11:40:28'),(28,'开账员1','biller_person','2018-01-30 11:42:03'),(29,'开账员2','biller_person','2018-01-30 11:42:12');
/*!40000 ALTER TABLE `table_options` ENABLE KEYS */;
