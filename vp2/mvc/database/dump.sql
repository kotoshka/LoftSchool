-- MySQL dump 10.13  Distrib 5.6.38, for Win32 (AMD64)
--
-- Host: localhost    Database: vp2
-- ------------------------------------------------------
-- Server version	5.6.38

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
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (1,2,'https://lorempixel.com/200/200/cats/Faker/?68511'),(2,30,'https://lorempixel.com/200/200/cats/Faker/?57877'),(3,14,'https://lorempixel.com/200/200/cats/Faker/?12605'),(4,61,'https://lorempixel.com/200/200/cats/Faker/?25593'),(5,11,'https://lorempixel.com/200/200/cats/Faker/?19384'),(6,45,'https://lorempixel.com/200/200/cats/Faker/?30430'),(7,16,'https://lorempixel.com/200/200/cats/Faker/?42924'),(8,65,'https://lorempixel.com/200/200/cats/Faker/?15579'),(9,90,'https://lorempixel.com/200/200/cats/Faker/?17798'),(10,61,'https://lorempixel.com/200/200/cats/Faker/?46016'),(11,72,'https://lorempixel.com/200/200/cats/Faker/?99198'),(12,31,'https://lorempixel.com/200/200/cats/Faker/?57211'),(13,67,'https://lorempixel.com/200/200/cats/Faker/?77408'),(14,72,'https://lorempixel.com/200/200/cats/Faker/?94003'),(15,62,'https://lorempixel.com/200/200/cats/Faker/?13616'),(16,88,'https://lorempixel.com/200/200/cats/Faker/?83488'),(17,64,'https://lorempixel.com/200/200/cats/Faker/?19912'),(18,35,'https://lorempixel.com/200/200/cats/Faker/?73343'),(19,35,'https://lorempixel.com/200/200/cats/Faker/?26589'),(20,1,'https://lorempixel.com/200/200/cats/Faker/?49164'),(21,21,'8mE6HbEX_cg.jpg');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Mr. Lawson Franecki Sr.','Kobe O\'Hara','|{Vhb82jOHl',41,'Dolores eos et animi et id corrupti fugiat. Atque veritatis ipsum ut nihil. Atque dolorem minima ut non eos et architecto.','https://lorempixel.com/200/200/cats/Faker/?45889'),(2,'Mr. Xavier Homenick','Sabrina Mosciski','slo^\"L9Tjb)m',59,'Ea libero ratione explicabo eaque hic et. Maiores tenetur et velit sed dolorem. Hic voluptatum voluptatem nam omnis qui enim et odio. Nihil quia rem velit.','https://lorempixel.com/200/200/cats/Faker/?91593'),(3,'Edythe Luettgen','Adrain West','vYbj{)5pnn;.]}SxZp5O',41,'Enim doloribus voluptatibus molestiae enim. Ullam fuga facilis et id quidem ullam et. Voluptatem vel hic laborum omnis.','https://lorempixel.com/200/200/cats/Faker/?48124'),(4,'Jeromy Walker Jr.','Casimir Kerluke','1u/~#~&20tezM',68,'Explicabo magnam quis error sint nisi quae ipsa. Eaque quis quae cum perspiciatis sunt aliquam.','https://lorempixel.com/200/200/cats/Faker/?75956'),(5,'Brycen Dooley','Olga Koch','9&u?/X}=}',87,'Necessitatibus suscipit laudantium pariatur delectus provident. Non eligendi vitae unde quo non et. Quia sed mollitia tempore autem pariatur non.','https://lorempixel.com/200/200/cats/Faker/?68450'),(6,'Domenica Larkin','Hope Lowe','rL#5!%qP`0_\\F0HDoj%',18,'Id molestiae et et cupiditate. Voluptatibus blanditiis fugiat molestias ut fuga possimus sed. Cumque sapiente provident ut eum ipsa dolor ut.','https://lorempixel.com/200/200/cats/Faker/?53305'),(7,'Hope Prosacco MD','Pete Kshlerin III','l]oN|x,v$s1Nyqf',24,'Hic eveniet omnis numquam enim adipisci et aut. Ratione quisquam consequuntur id inventore voluptas iusto. Amet possimus odio harum nesciunt quidem laboriosam.','https://lorempixel.com/200/200/cats/Faker/?29934'),(8,'Hassie Wintheiser V','Ernesto O\'Connell','(C85%#U',58,'Nobis qui expedita molestiae adipisci porro unde. Ut ut velit inventore. Quo et dolorem esse magnam animi omnis.','https://lorempixel.com/200/200/cats/Faker/?54407'),(9,'Raoul Blick','Katelyn Schultz','?_3`,~0EJ-Vp',66,'Eveniet labore odit et magni neque. Ut minus voluptas dolores culpa vel dicta autem cumque. Ea expedita repellat necessitatibus a consequatur dolorem.','https://lorempixel.com/200/200/cats/Faker/?12226'),(10,'Halle Waters','Deron Hahn','gjHEba*}k',11,'Earum fuga maiores atque corrupti. Maxime tempora non eaque. Nemo consequatur rerum rem et. Quia consequuntur voluptas pariatur voluptatum beatae.','https://lorempixel.com/200/200/cats/Faker/?16538'),(11,'Dr. Columbus Gleason','Jeanne Collins IV','(:Lv)1C%#.l3(}',89,'Nesciunt ipsum corporis aut non nihil. Inventore error aut quae eveniet unde vel. Eaque vel harum commodi quibusdam.','https://lorempixel.com/200/200/cats/Faker/?50957'),(12,'Aliza Gerlach','Prof. Harry Kovacek DDS','4^ji*j%9(cgaynGT\\',54,'Enim error consequatur sint. Cupiditate aliquam ut et dolor dolores aut officia. Et ipsam aperiam et voluptatibus sed ipsum.','https://lorempixel.com/200/200/cats/Faker/?18429'),(13,'Miss Lexi Roberts','Olga Greenholt','TJW8\"Il',71,'Fugit blanditiis dicta voluptas ea id recusandae repellat est. Dolorem repudiandae rerum alias amet eos. Architecto eius id adipisci dolorem amet tempora molestiae ab.','https://lorempixel.com/200/200/cats/Faker/?48017'),(14,'Dr. Mavis Pfeffer MD','Theresia Barrows','/vp:86TR2',31,'Non et debitis tenetur non voluptate officia. Quis eum eveniet beatae. Nostrum qui explicabo laboriosam eligendi praesentium doloremque.','https://lorempixel.com/200/200/cats/Faker/?21239'),(15,'Miss Meaghan Daugherty','Lenore Douglas','T?-:bufEFgroi6l\'',35,'Temporibus et vel dolore voluptatem. Sunt velit deleniti voluptate pariatur. Doloremque ut hic sit dignissimos.','https://lorempixel.com/200/200/cats/Faker/?56965'),(16,'Mrs. Myrna Boyle II','Prof. Hector Reichel Jr.','/1^wVtWZ\'S!',19,'Aut reiciendis quam distinctio molestias. Eos nisi amet autem est eligendi. Vitae sequi pariatur quasi consequatur incidunt ut. Sit quae ut molestiae quidem mollitia consequatur.','https://lorempixel.com/200/200/cats/Faker/?36914'),(17,'Troy Zulauf','Ms. Brionna Wolf','7C]F!,4c5;2Th+WJ!n',39,'Perferendis dolor sit laudantium sed laboriosam. Sed deleniti sint non cum. Laudantium qui dolorum ut voluptatem aut officia. Nemo tempora doloribus veniam impedit porro libero sit.','https://lorempixel.com/200/200/cats/Faker/?34047'),(18,'Ruben Fay','Ally Feil','T1]~K!',42,'Eum numquam et mollitia ea. Omnis quidem magni omnis minus aliquid. Cupiditate dicta odit dignissimos voluptas.','https://lorempixel.com/200/200/cats/Faker/?54587'),(19,'Ruth Weimann','Mrs. Margarita Hodkiewicz','gH_GReM~R4t\"7Jq(g/R',21,'Unde consectetur est laborum hic ut. Sunt assumenda esse et qui.','https://lorempixel.com/200/200/cats/Faker/?75696'),(20,'Lacey Hudson','Prof. Mina Turcotte V','&n35N5qmkd',24,'Laudantium eum magni in praesentium unde. Tenetur facere eos commodi autem enim consequatur porro. Quia id aperiam dolor alias non voluptatum natus.','https://lorempixel.com/200/200/cats/Faker/?63599'),(21,'123','123','$2y$10$c3JlZGdmdGd5amhrbGo7b.USq36dgf7BGw49f4Y4CtvlS3XjwCZj2',12,'test','ec2hUacJZU4.jpg');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-26 21:45:46
