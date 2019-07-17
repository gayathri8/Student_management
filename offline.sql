-- MySQL dump 10.14  Distrib 5.5.47-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: offline
-- ------------------------------------------------------
-- Server version	5.5.47-MariaDB

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

SET FOREIGN_KEY_CHECKS = 0;

--
-- Table structure for table `board`
--

DROP TABLE IF EXISTS `board`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `board` (
  `board_id` int(11) NOT NULL AUTO_INCREMENT,
  `board_name` varchar(100) NOT NULL,
  `state_id` int(11) NOT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`board_id`),
  KEY `board_state` (`state_id`),
  KEY `state_id` (`state_id`,`status_value_id`,`log_id`),
  KEY `state_id_2` (`state_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `state_id_3` (`state_id`),
  KEY `status_value_id_2` (`status_value_id`),
  KEY `log_id_2` (`log_id`),
  KEY `log_id_3` (`log_id`),
  CONSTRAINT `board_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`),
  CONSTRAINT `board_log_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `board_status_value_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `board`
--

LOCK TABLES `board` WRITE;
/*!40000 ALTER TABLE `board` DISABLE KEYS */;
INSERT INTO `board` VALUES (0,'NA',0,1,1),(1,'Andhra Pradesh Board of Intermediate Education',8,1,1),(2,'Andhra Pradesh Board of Secondary Education',8,1,1),(3,'Andhra Pradesh Open School Society',8,1,1),(4,'Assam Board of Secondary Education',10,1,1),(5,'Assam Higher Secondary Education Council',10,1,1),(6,'Bihar Intermediate Education Council',11,1,1),(7,'Bihar Sanskrit Shiksha Board',11,1,1),(8,'Bihar School Examination Board',11,1,1),(9,'Chattisgarh Madhyamik Shiksha Mandal',12,1,1),(10,'Chhatisgarh Board of Secondary Education',12,1,1),(11,'Goa Board of Secondary and Higher Secondary Education',13,1,1),(12,'Gujarat Secondary and Higher Secondary Education',14,1,1),(13,'Haryana Board of Education',15,1,1),(14,'Haryana Open School',15,1,1),(15,'H P Board of School Education',16,1,1),(16,'Himachal Pradesh Board of School Education',16,1,1),(17,'J & K State Board of School Education',17,1,1),(18,'J & K State Open School',17,1,1),(19,'Jharkhand Academic Council',18,1,1),(20,'Karnataka Board of the Pre-University Education',19,1,1),(21,'Karnataka Open School',19,1,1),(22,'Karnataka Secondary Education Examination Board',19,1,1),(23,'Kerala Board of Higher Secondary Education',20,1,1),(24,'Kerala Board of Public Examinations',20,1,1),(25,'Kerala State Open School',20,1,1),(26,'Madhya Pradesh Board of Secondary Education',21,1,1),(27,'Madhya Pradesh State Open School',21,1,1),(28,'Maharashtra State Board of Secondary and Higher Secondary Education',22,1,1),(29,'Manipur Board of Secondary Education',23,1,1),(30,'Manipur Council of Higher Secondary Education',23,1,1),(31,'Meghalaya Board of School Education',24,1,1),(32,'Meghalaya Board of Secondary Education',24,1,1),(33,'Mizoram Board of School Education',25,1,1),(34,'Cambridge University',0,1,1),(35,'IGCSE Programme from University of Cambridge',0,1,1),(36,'International Baccalaureate',0,1,1),(37,'Nagaland Board of School Education',26,1,1),(38,'Central Board of Secondary Education (CBSE)',1,1,1),(39,'Council for the Indian School Certificate Examinations',1,1,1),(40,'Directorate of Army Education',1,1,1),(41,'Jamia Millia Hamdard University',1,1,1),(42,'Jamia Millia Islamia',1,1,1),(43,'National Institute of Open Schooling (formarly National Open School)',1,1,1),(44,'Rashtriya Sanskrit Sansthan',1,1,1),(45,'Orissa Board of Secondary Education',27,1,1),(46,'Orissa Council of Higher Secondary Education',27,1,1),(47,'Punjab School Education Board',28,1,1),(48,'Banasthali Vidyapith',29,1,1),(49,'Rajasthan Board of Secondary Education',29,1,1),(50,'Rajasthan State Open School',29,1,1),(51,'Tamil Nadu Board of Higher Secondary Education',31,1,1),(52,'Tamil Nadu Board of Secondary Education',31,1,1),(53,'Telangana Board of Secondary Education',32,1,1),(54,'Telangana Intermediate Education Board',32,1,1),(55,'Tripura Board of Secondary Education',33,1,1),(56,'Aligarh Muslim University',34,1,1),(57,'U.P. Board of High School & Intermediate Education',34,1,1),(58,'Gurukul Kangri Vishwavidyalaya',35,1,1),(59,'Uttaranchal Shiksha Evam Pariksha Parishad',35,1,1),(60,'Uttranchal Shiksha Evm Pariksha Parishad',35,1,1),(61,'Rabindra Mukta Vidyalaya (W.B. State Open School)',36,1,1),(62,'West Bengal Board of Madarsa Education',36,1,1),(63,'West Bengal Board of Secondary Education',36,1,1),(64,'West Bengal Council of Higher Secondary Education',36,1,1);
/*!40000 ALTER TABLE `board` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campus`
--

DROP TABLE IF EXISTS `campus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campus` (
  `campus_id` int(11) NOT NULL AUTO_INCREMENT,
  `campus_name` varchar(10) NOT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`campus_id`),
  KEY `campus_id` (`campus_id`,`campus_name`),
  KEY `campus_id_2` (`campus_id`),
  KEY `campus_id_3` (`campus_id`),
  KEY `campus_name` (`campus_name`),
  KEY `log_id` (`log_id`),
  KEY `log_id_2` (`log_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id_3` (`log_id`),
  KEY `status_value_id_2` (`status_value_id`),
  KEY `log_id_4` (`log_id`),
  CONSTRAINT `campus_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `campus_status_value_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campus`
--

LOCK TABLES `campus` WRITE;
/*!40000 ALTER TABLE `campus` DISABLE KEYS */;
INSERT INTO `campus` VALUES (1,'Allahabad',1,1),(2,'Amethi',1,1),(3,'Lucknow',1,1);
/*!40000 ALTER TABLE `campus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `copied_semesters`
--

DROP TABLE IF EXISTS `copied_semesters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `copied_semesters` (
  `original_sem_id` int(11) NOT NULL,
  `copy_sem_id` int(11) NOT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  KEY `original_sem_id` (`original_sem_id`),
  KEY `copy_sem_id` (`copy_sem_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id` (`log_id`),
  CONSTRAINT `copied_semesters_ibfk_4` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `copied_semesters_ibfk_1` FOREIGN KEY (`original_sem_id`) REFERENCES `course_structure` (`sem_id`),
  CONSTRAINT `copied_semesters_ibfk_2` FOREIGN KEY (`copy_sem_id`) REFERENCES `course_structure` (`sem_id`),
  CONSTRAINT `copied_semesters_ibfk_3` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `copied_semesters`
--

LOCK TABLES `copied_semesters` WRITE;
/*!40000 ALTER TABLE `copied_semesters` DISABLE KEYS */;
/*!40000 ALTER TABLE `copied_semesters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_registration`
--

DROP TABLE IF EXISTS `course_registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_registration` (
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade_card_year` year(4) NOT NULL DEFAULT '0000',
  `grade_card_sem_code` int(11) NOT NULL DEFAULT '0',
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`course_id`,`student_id`,`grade_card_sem_code`,`grade_card_year`),
  KEY `status_id` (`status_value_id`),
  KEY `student_id` (`student_id`),
  KEY `log_id` (`log_id`),
  KEY `sem_code` (`grade_card_sem_code`),
  KEY `sem_code_2` (`grade_card_sem_code`),
  KEY `course_id` (`course_id`),
  KEY `student_id_2` (`student_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id_2` (`log_id`),
  CONSTRAINT `reg_course_id_constraint` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  CONSTRAINT `reg_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `reg_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`),
  CONSTRAINT `reg_student_id_constraint` FOREIGN KEY (`student_id`) REFERENCES `student_original` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_registration`
--

LOCK TABLES `course_registration` WRITE;
/*!40000 ALTER TABLE `course_registration` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_structure`
--

DROP TABLE IF EXISTS `course_structure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_structure` (
  `program_id` int(10) NOT NULL,
  `sem_id` int(10) NOT NULL AUTO_INCREMENT,
  `sem_title` varchar(100) NOT NULL,
  `year_of_joining` int(10) NOT NULL,
  `sem_code_of_joining` int(11) NOT NULL,
  `sem_id_year` int(10) NOT NULL,
  `sem_id_sem_code` int(10) NOT NULL,
  `completion_date` date NOT NULL,
  `status_value_id` int(10) NOT NULL,
  `log_id` int(10) NOT NULL,
  PRIMARY KEY (`sem_id`),
  KEY `program_id` (`program_id`),
  KEY `program_id_2` (`program_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id` (`log_id`),
  KEY `program_id_3` (`program_id`),
  CONSTRAINT `course_structure_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `course_structure_program_id_constraint` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`),
  CONSTRAINT `course_structure_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_structure`
--

LOCK TABLES `course_structure` WRITE;
/*!40000 ALTER TABLE `course_structure` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_structure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_type`
--

DROP TABLE IF EXISTS `course_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_type` (
  `course_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_type_description` varchar(20) NOT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`course_type_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id` (`log_id`),
  KEY `status_value_id_2` (`status_value_id`),
  KEY `log_id_2` (`log_id`),
  CONSTRAINT `course_type_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `course_type_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_type`
--

LOCK TABLES `course_type` WRITE;
/*!40000 ALTER TABLE `course_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(10) CHARACTER SET utf8 NOT NULL,
  `course_name` varchar(150) CHARACTER SET utf32 NOT NULL,
  `course_type` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `sem_code` int(11) NOT NULL,
  `theory_credit` int(11) NOT NULL,
  `lab_credit` int(11) NOT NULL,
  `mid_sem_exam_date` date DEFAULT NULL,
  `end_sem_exam_date` date DEFAULT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`course_id`,`course_code`,`year`,`sem_code`),
  UNIQUE KEY `course_id` (`course_id`),
  KEY `course_name` (`course_name`),
  KEY `theory_credit` (`theory_credit`),
  KEY `lab_credit` (`lab_credit`),
  KEY `status_id` (`status_value_id`),
  KEY `log_id` (`log_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id_2` (`log_id`),
  KEY `course_type` (`course_type`),
  KEY `status_value_id_2` (`status_value_id`),
  KEY `log_id_3` (`log_id`),
  CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`course_type`) REFERENCES `course_type` (`course_type_id`),
  CONSTRAINT `courses_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `courses_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_type`
--

DROP TABLE IF EXISTS `exam_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam_type` (
  `exam_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_type` varchar(6) NOT NULL,
  `exam_year` year(4) DEFAULT NULL,
  `exam_month` int(2) DEFAULT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`exam_type_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id` (`log_id`),
  KEY `status_value_id_2` (`status_value_id`),
  KEY `log_id_2` (`log_id`),
  CONSTRAINT `exam_type_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `exam_type_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_type`
--

LOCK TABLES `exam_type` WRITE;
/*!40000 ALTER TABLE `exam_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `exam_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `abbreviation` varchar(20) NOT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`faculty_id`),
  KEY `faculty_id` (`faculty_id`),
  KEY `faculty_name` (`faculty_name`),
  KEY `faculty_name_2` (`faculty_name`),
  KEY `status_id` (`status_value_id`),
  KEY `log_id` (`log_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id_2` (`log_id`),
  CONSTRAINT `faculty_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `faculty_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty`
--

LOCK TABLES `faculty` WRITE;
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculty_course`
--

DROP TABLE IF EXISTS `faculty_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faculty_course` (
  `faculty_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`faculty_id`,`course_id`),
  KEY `status_id` (`status_value_id`),
  KEY `course_id` (`course_id`),
  KEY `log_id` (`log_id`),
  KEY `faculty_id` (`faculty_id`),
  KEY `course_id_2` (`course_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id_2` (`log_id`),
  CONSTRAINT `faculty_course_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `faculty_course_course_id_constraint` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  CONSTRAINT `faculty_course_faculty_id_constraint` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`),
  CONSTRAINT `faculty_course_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty_course`
--

LOCK TABLES `faculty_course` WRITE;
/*!40000 ALTER TABLE `faculty_course` DISABLE KEYS */;
/*!40000 ALTER TABLE `faculty_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grades` (
  `grade_id` int(11) NOT NULL AUTO_INCREMENT,
  `grade` varchar(10) NOT NULL,
  `credit` int(11) NOT NULL,
  `description` varchar(20) NOT NULL,
  `version_no` int(11) NOT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`grade_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id` (`log_id`),
  CONSTRAINT `grades_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `grades_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `table_name` varchar(100) NOT NULL,
  `executed_query` text CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `prev_hash` varchar(60) CHARACTER SET utf8 NOT NULL,
  `curr_hash` varchar(60) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `staff_id` (`staff_id`),
  KEY `rank` (`rank`),
  KEY `log_id` (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,1,100,'2016-07-12 11:59:37','NA','NA','NA','1','1');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `old_branch`
--

DROP TABLE IF EXISTS `old_branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `old_branch` (
  `branch_change_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `roll_no` varchar(10) CHARACTER SET utf8 NOT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`branch_change_id`),
  UNIQUE KEY `log_id_5` (`log_id`),
  KEY `roll_no` (`roll_no`),
  KEY `program_id` (`program_id`),
  KEY `log_id` (`log_id`),
  KEY `student_id` (`student_id`),
  KEY `program_id_2` (`program_id`),
  KEY `student_id_2` (`student_id`),
  KEY `log_id_2` (`log_id`),
  KEY `log_id_3` (`log_id`),
  KEY `log_id_4` (`log_id`),
  KEY `status_value_id` (`status_value_id`),
  CONSTRAINT `branch_change_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `branch_change_program_id_constraint` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`),
  CONSTRAINT `branch_change_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`),
  CONSTRAINT `branch_change_student_id_constraint` FOREIGN KEY (`student_id`) REFERENCES `student_original` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `old_branch`
--

LOCK TABLES `old_branch` WRITE;
/*!40000 ALTER TABLE `old_branch` DISABLE KEYS */;
/*!40000 ALTER TABLE `old_branch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program`
--

DROP TABLE IF EXISTS `program`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `program` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_type` varchar(10) NOT NULL,
  `program_code` varchar(32) DEFAULT NULL,
  `program_name` varchar(50) DEFAULT NULL,
  `program_prefix` varchar(10) NOT NULL,
  `program_duration` varchar(20) NOT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`program_id`),
  UNIQUE KEY `program_id_2` (`program_id`),
  KEY `program_id` (`program_id`),
  KEY `program_code` (`program_code`),
  KEY `program_name` (`program_name`),
  KEY `status_id` (`status_value_id`),
  KEY `status_id_2` (`status_value_id`),
  KEY `log_id` (`log_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id_2` (`log_id`),
  CONSTRAINT `program_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `program_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program`
--

LOCK TABLES `program` WRITE;
/*!40000 ALTER TABLE `program` DISABLE KEYS */;
INSERT INTO `program` VALUES (1,'B.Tech','B.Tech-IT','B.Tech-IT','IIT','4',1,1),(2,'M.Tech','M.Tech-HCI','M.Tech (Human Computer Interaction)','IHC','2',1,1);
/*!40000 ALTER TABLE `program` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `religion`
--

DROP TABLE IF EXISTS `religion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `religion` (
  `religion_id` int(11) NOT NULL AUTO_INCREMENT,
  `religion_name` varchar(10) CHARACTER SET utf8 NOT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`religion_id`),
  KEY `log_id` (`log_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id_2` (`log_id`),
  CONSTRAINT `religion_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `religion_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `religion`
--

LOCK TABLES `religion` WRITE;
/*!40000 ALTER TABLE `religion` DISABLE KEYS */;
INSERT INTO `religion` VALUES (1,'Hinduism',1,1),(2,'Islam',1,1),(3,'Sikhism',1,1),(4,'Buddhism',1,1),(5,'Jainism',1,1);
/*!40000 ALTER TABLE `religion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `results` (
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sem_id` int(11) NOT NULL,
  `theory_grade` int(11) NOT NULL,
  `lab_grade` int(11) NOT NULL,
  `exam_type` varchar(5) NOT NULL,
  `date_of_exam` date DEFAULT NULL,
  `date_of_declaration` date NOT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`course_id`,`student_id`,`timestamp`),
  KEY `status_id` (`status_value_id`),
  KEY `student_id` (`student_id`),
  KEY `log_id` (`log_id`),
  KEY `lab_grade` (`lab_grade`),
  KEY `status_id_2` (`status_value_id`),
  KEY `course_grade` (`theory_grade`),
  KEY `course_grade_2` (`theory_grade`),
  KEY `lab_grade_2` (`lab_grade`),
  KEY `course_grade_3` (`theory_grade`),
  KEY `lab_grade_3` (`lab_grade`),
  KEY `course_grade_4` (`theory_grade`),
  KEY `course_grade_5` (`theory_grade`),
  KEY `lab_grade_4` (`lab_grade`),
  KEY `course_id` (`course_id`),
  KEY `student_id_2` (`student_id`),
  KEY `semester_id` (`sem_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id_2` (`log_id`),
  KEY `sem_id` (`sem_id`),
  KEY `theory_grade` (`theory_grade`),
  KEY `lab_grade_5` (`lab_grade`),
  CONSTRAINT `results_ibfk_3` FOREIGN KEY (`lab_grade`) REFERENCES `grades` (`grade_id`),
  CONSTRAINT `results_course_id_constraint` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  CONSTRAINT `results_ibfk_1` FOREIGN KEY (`sem_id`) REFERENCES `course_structure` (`sem_id`),
  CONSTRAINT `results_ibfk_2` FOREIGN KEY (`theory_grade`) REFERENCES `grades` (`grade_id`),
  CONSTRAINT `results_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `results_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`),
  CONSTRAINT `results_student_id_constraint` FOREIGN KEY (`student_id`) REFERENCES `student_original` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results`
--

LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
/*!40000 ALTER TABLE `results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sem_cancel`
--

DROP TABLE IF EXISTS `sem_cancel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sem_cancel` (
  `student_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `sem_code` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  KEY `log_id` (`log_id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `sem_cancel_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_original` (`student_id`),
  CONSTRAINT `sem_cancel_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sem_cancel`
--

LOCK TABLES `sem_cancel` WRITE;
/*!40000 ALTER TABLE `sem_cancel` DISABLE KEYS */;
/*!40000 ALTER TABLE `sem_cancel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sem_code_description`
--

DROP TABLE IF EXISTS `sem_code_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sem_code_description` (
  `sem_code_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`sem_code_id`),
  KEY `sem_code` (`sem_code_id`),
  KEY `sem_code_2` (`sem_code_id`),
  KEY `sem_code_3` (`sem_code_id`),
  KEY `log_id` (`log_id`),
  KEY `status_id` (`status_value_id`),
  KEY `log_id_2` (`log_id`),
  KEY `status_id_2` (`status_value_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id_3` (`log_id`),
  CONSTRAINT `sem_code_description_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `sem_code_description_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sem_code_description`
--

LOCK TABLES `sem_code_description` WRITE;
/*!40000 ALTER TABLE `sem_code_description` DISABLE KEYS */;
INSERT INTO `sem_code_description` VALUES (1,'Jan-June',1,1),(2,'Aug-Dec',1,1);
/*!40000 ALTER TABLE `sem_code_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sem_structure`
--

DROP TABLE IF EXISTS `sem_structure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sem_structure` (
  `sem_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status_value_id` int(10) NOT NULL,
  `log_id` int(10) NOT NULL,
  PRIMARY KEY (`sem_id`,`course_id`),
  KEY `course_id` (`course_id`),
  KEY `semester_id` (`sem_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id` (`log_id`),
  KEY `course_id_2` (`course_id`),
  KEY `semester_id_2` (`sem_id`),
  CONSTRAINT `sem_structure_ibfk_1` FOREIGN KEY (`sem_id`) REFERENCES `course_structure` (`sem_id`),
  CONSTRAINT `sem_structure_course_id_constraint` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  CONSTRAINT `sem_structure_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `sem_structure_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sem_structure`
--

LOCK TABLES `sem_structure` WRITE;
/*!40000 ALTER TABLE `sem_structure` DISABLE KEYS */;
/*!40000 ALTER TABLE `sem_structure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rank` int(11) NOT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`staff_id`),
  UNIQUE KEY `username` (`username`),
  KEY `log_id` (`log_id`),
  KEY `rank` (`rank`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id_2` (`log_id`),
  CONSTRAINT `staff_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `staff_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,'abhi','abhi','$2y$10$qRhC6GObcZliRc2Vbn0csuFAiebgy4zzdE3E2LrA/8y.FBd/2LnK6','abhi@gmail.com',100,1,1);
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_designation`
--

DROP TABLE IF EXISTS `staff_designation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_designation` (
  `designation_id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(60) NOT NULL,
  `rank` int(11) NOT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`designation_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id` (`log_id`),
  CONSTRAINT `staff_designations_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `staff_designations_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_designation`
--

LOCK TABLES `staff_designation` WRITE;
/*!40000 ALTER TABLE `staff_designation` DISABLE KEYS */;
INSERT INTO `staff_designation` VALUES (1,'Director',100,1,1),(2,'Dean',75,1,1),(3,'DR',76,1,1),(4,'AR',60,1,1),(5,'Faculty Incharge',60,1,1),(6,'Temporary AR',48,1,1),(7,'Staff',20,1,1);
/*!40000 ALTER TABLE `staff_designation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_documents`
--

DROP TABLE IF EXISTS `staff_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_documents` (
  `document_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `category` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `media` mediumblob NOT NULL,
  `mime` varchar(100) NOT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`document_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id` (`log_id`),
  KEY `status_value_id_2` (`status_value_id`),
  KEY `log_id_2` (`log_id`),
  KEY `student_id` (`staff_id`),
  KEY `staff_id` (`staff_id`),
  KEY `status_value_id_3` (`status_value_id`),
  KEY `log_id_3` (`log_id`),
  CONSTRAINT `staff_documents_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `staff_documents_staff_id_constraint` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`),
  CONSTRAINT `staff_documents_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_documents`
--

LOCK TABLES `staff_documents` WRITE;
/*!40000 ALTER TABLE `staff_documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `staff_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `zone` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`state_id`),
  KEY `log_id` (`log_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id_2` (`log_id`),
  CONSTRAINT `state_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `state_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` VALUES (0,'NA','NA',1,1),(1,'NCT of Delhi','',1,1),(2,'UT of Andaman and Ni','',1,1),(3,'UT of Chandigarh','',1,1),(4,'UT of Dadra and Naga','',1,1),(5,'UT of Daman and Diu','',1,1),(6,'UT of Lakshadweep','',1,1),(7,'UT of Puducherry','',1,1),(8,'Andhra Pradesh','',1,1),(9,'Arunachal Pradesh','',1,1),(10,'Assam','',1,1),(11,'Bihar','',1,1),(12,'Chhattisgarh','',1,1),(13,'Goa','',1,1),(14,'Gujarat','',1,1),(15,'Haryana','',1,1),(16,'Himachal Pradesh','',1,1),(17,'Jammu and Kashmir','',1,1),(18,'Jharkhand','',1,1),(19,'Karnataka','',1,1),(20,'Kerala','',1,1),(21,'Madhya Pradesh','',1,1),(22,'Maharashtra','',1,1),(23,'Manipur','',1,1),(24,'Meghalaya','',1,1),(25,'Mizoram','',1,1),(26,'Nagaland','',1,1),(27,'Odisha','',1,1),(28,'Punjab','',1,1),(29,'Rajasthan','',1,1),(30,'Sikkim','',1,1),(31,'Tamil Nadu','',1,1),(32,'Telangana','',1,1),(33,'Tripura','',1,1),(34,'Uttar Pradesh','',1,1),(35,'Uttarakhand','',1,1),(36,'West Bengal','',1,1);
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`status_id`),
  KEY `log_id` (`log_id`),
  KEY `log_id_2` (`log_id`),
  KEY `staff_id` (`log_id`),
  KEY `status_id` (`status_id`),
  KEY `log_id_3` (`log_id`),
  CONSTRAINT `status_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'on',1),(2,'off',1);
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_value`
--

DROP TABLE IF EXISTS `status_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_value` (
  `status_value_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`status_value_id`),
  KEY `status_id` (`status_id`),
  KEY `log_id` (`log_id`),
  KEY `log_id_2` (`log_id`),
  KEY `status_id_2` (`status_id`),
  CONSTRAINT `status_value_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `status_value_status_id_constraint` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_value`
--

LOCK TABLES `status_value` WRITE;
/*!40000 ALTER TABLE `status_value` DISABLE KEYS */;
INSERT INTO `status_value` VALUES (1,1,1);
/*!40000 ALTER TABLE `status_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `campus_id` int(11) NOT NULL,
  `date_of_admission` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `first_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `middle_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hindi_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `enrollment_no` varchar(10) CHARACTER SET utf8 NOT NULL,
  `dob` date NOT NULL,
  `birth_place` varchar(60) CHARACTER SET utf8 NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category` varchar(20) CHARACTER SET utf8 NOT NULL,
  `religion_id` int(11) NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 NOT NULL,
  `marital_status` varchar(15) CHARACTER SET utf8 NOT NULL,
  `area` varchar(50) CHARACTER SET utf8 NOT NULL,
  `blood_group` varchar(3) CHARACTER SET utf8 NOT NULL,
  `nationality` varchar(50) CHARACTER SET utf8 NOT NULL,
  `communication_addr` varchar(180) CHARACTER SET utf8 NOT NULL,
  `comm_city` varchar(100) CHARACTER SET utf8 NOT NULL,
  `comm_state_id` int(11) NOT NULL,
  `comm_pincode` varchar(10) NOT NULL,
  `comm_phone_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `comm_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `father_first_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `father_last_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `father_profession` varchar(50) CHARACTER SET utf8 NOT NULL,
  `father_office_addr` varchar(180) CHARACTER SET utf8 NOT NULL,
  `father_city` varchar(100) CHARACTER SET utf8 NOT NULL,
  `father_state_id` int(11) NOT NULL,
  `father_pincode` varchar(10) NOT NULL,
  `father_phone_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `father_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `mother_first_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `mother_last_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `mother_profession` varchar(100) CHARACTER SET utf8 NOT NULL,
  `permanent_addr` varchar(180) CHARACTER SET utf8 NOT NULL,
  `perm_city` varchar(100) CHARACTER SET utf8 NOT NULL,
  `perm_state_id` int(11) NOT NULL,
  `perm_pincode` varchar(10) NOT NULL,
  `perm_phone_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `perm_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `local_guardian_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `local_guardian_addr` varchar(180) CHARACTER SET utf8 NOT NULL,
  `local_guard_city` varchar(100) CHARACTER SET utf8 NOT NULL,
  `local_guard_phone_no` varchar(100) CHARACTER SET utf8 NOT NULL,
  `admission_category_id` int(11) NOT NULL,
  `admit_card` varchar(5) CHARACTER SET utf8 NOT NULL,
  `jee_rank_card` varchar(5) CHARACTER SET utf8 NOT NULL,
  `jee_roll_no` varchar(20) NOT NULL,
  `jee_rank_pos` varchar(10) NOT NULL,
  `jee_seat_allot_letter` varchar(5) CHARACTER SET utf8 NOT NULL,
  `marksheet_10` varchar(5) CHARACTER SET utf8 NOT NULL,
  `cert_10` varchar(5) CHARACTER SET utf8 NOT NULL,
  `percentage_10` double NOT NULL,
  `board_id_10` int(11) NOT NULL,
  `board_10_pass_state_id` int(11) DEFAULT NULL,
  `marksheet_12` varchar(5) CHARACTER SET utf8 NOT NULL,
  `cert_12` varchar(5) CHARACTER SET utf8 NOT NULL,
  `percentage_12` double NOT NULL,
  `board_id_12` int(11) NOT NULL,
  `board_12_pass_state_id` int(11) DEFAULT NULL,
  `marksheet_grad` varchar(5) CHARACTER SET utf8 NOT NULL,
  `degree_grad` varchar(5) CHARACTER SET utf8 NOT NULL,
  `percentage_grad` double NOT NULL,
  `university_grad_id` int(11) NOT NULL,
  `marksheet_pg` varchar(5) CHARACTER SET utf8 NOT NULL,
  `degree_pg` varchar(5) CHARACTER SET utf8 NOT NULL,
  `percentage_pg` double NOT NULL,
  `university_pg_id` int(11) NOT NULL,
  `gate_score_card` varchar(5) CHARACTER SET utf8 NOT NULL,
  `gate_year` year(4) NOT NULL,
  `gate_score` double NOT NULL,
  `cat_score_card` varchar(5) CHARACTER SET utf8 NOT NULL,
  `cat_year` year(4) NOT NULL,
  `cat_score` double NOT NULL,
  `transfer_cert` varchar(5) CHARACTER SET utf8 NOT NULL,
  `migration_cert` int(11) NOT NULL,
  `character_cert` varchar(5) CHARACTER SET utf8 NOT NULL,
  `caste_cert` varchar(5) CHARACTER SET utf8 NOT NULL,
  `ph_cert` varchar(5) CHARACTER SET utf8 NOT NULL,
  `passport` varchar(5) CHARACTER SET utf8 NOT NULL,
  `passport_no` varchar(15) CHARACTER SET utf8 NOT NULL,
  `passport_expiry` date NOT NULL,
  `mcaip` varchar(5) CHARACTER SET utf8 NOT NULL,
  `DASA` varchar(5) CHARACTER SET utf8 NOT NULL,
  `remark` mediumtext CHARACTER SET utf8 NOT NULL,
  `anti_rag_st` varchar(5) CHARACTER SET utf8 NOT NULL,
  `anti_rag_pr` varchar(5) CHARACTER SET utf8 NOT NULL,
  `med_cert` varchar(5) CHARACTER SET utf8 NOT NULL,
  `muslim_minority` varchar(5) CHARACTER SET utf8 NOT NULL,
  `other_minority` varchar(5) CHARACTER SET utf8 NOT NULL,
  `admission_letter` varchar(5) CHARACTER SET utf8 NOT NULL,
  `year` year(4) DEFAULT NULL,
  `sem_code` int(11) NOT NULL,
  `section` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `aadhaar` varchar(12) NOT NULL,
  `hostel_no` varchar(8) NOT NULL,
  `hostel_room` varchar(5) NOT NULL,
  `dasa_country` varchar(30) NOT NULL,
  `id_card_validity` varchar(20) NOT NULL,
  `termination_date` date NOT NULL,
  `graduation_date` date NOT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  KEY `program_id` (`program_id`),
  KEY `campus_id` (`campus_id`),
  KEY `category_id` (`category_id`),
  KEY `religion_id` (`religion_id`),
  KEY `religion_id_2` (`religion_id`),
  KEY `state_id1` (`comm_state_id`),
  KEY `state_id1_2` (`comm_state_id`),
  KEY `state_id2` (`father_state_id`),
  KEY `state_id3` (`perm_state_id`),
  KEY `category_id_2` (`category_id`),
  KEY `state_id3_2` (`perm_state_id`),
  KEY `board_id_10` (`board_id_10`),
  KEY `university_pg_id` (`university_pg_id`),
  KEY `university_grad_id` (`university_grad_id`),
  KEY `borad_id_12` (`board_id_12`),
  KEY `enrollment_no` (`enrollment_no`),
  KEY `log_id` (`log_id`),
  KEY `status_id` (`status_value_id`),
  KEY `sem_code` (`sem_code`),
  KEY `board_12_passing_state` (`board_12_pass_state_id`),
  KEY `board_12_passing_state_2` (`board_12_pass_state_id`),
  KEY `board_12_passing_state_3` (`board_12_pass_state_id`),
  KEY `board_10_passing_state` (`board_10_pass_state_id`),
  KEY `board_12_passing_state_4` (`board_12_pass_state_id`),
  KEY `board_10_passing_state_2` (`board_10_pass_state_id`),
  KEY `enrollment_no_3` (`enrollment_no`),
  KEY `program_id_2` (`program_id`),
  KEY `campus_id_2` (`campus_id`),
  KEY `category_id_3` (`category_id`),
  KEY `religion_id_3` (`religion_id`),
  KEY `comm_state_id` (`comm_state_id`),
  KEY `father_state_id` (`father_state_id`),
  KEY `perm_state_id` (`perm_state_id`),
  KEY `admission_category_id` (`admission_category_id`),
  KEY `board_id_10_2` (`board_id_10`),
  KEY `board_10_passing_state_3` (`board_10_pass_state_id`),
  KEY `board_id_12` (`board_id_12`),
  KEY `board_12_passing_state_5` (`board_12_pass_state_id`),
  KEY `university_grad_id_2` (`university_grad_id`),
  KEY `university_pg_id_2` (`university_pg_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id_2` (`log_id`),
  KEY `program_id_3` (`program_id`),
  KEY `campus_id_3` (`campus_id`),
  KEY `category_id_4` (`category_id`),
  KEY `religion_id_4` (`religion_id`),
  KEY `comm_state_id_2` (`comm_state_id`),
  KEY `comm_state_id_3` (`comm_state_id`),
  KEY `father_state_id_2` (`father_state_id`),
  KEY `perm_state_id_2` (`perm_state_id`),
  KEY `admission_category_id_2` (`admission_category_id`),
  KEY `board_10_passing_state_id` (`board_10_pass_state_id`),
  KEY `comm_state_id_4` (`comm_state_id`),
  KEY `father_state_id_3` (`father_state_id`),
  KEY `perm_state_id_3` (`perm_state_id`),
  KEY `admission_category_id_3` (`admission_category_id`),
  KEY `board_id_10_3` (`board_id_10`),
  KEY `board_10_passing_state_id_2` (`board_10_pass_state_id`),
  KEY `board_id_12_2` (`board_id_12`),
  KEY `board_12_passing_state_id` (`board_12_pass_state_id`),
  KEY `university_grad_id_3` (`university_grad_id`),
  KEY `university_pg_id_3` (`university_pg_id`),
  KEY `student_id` (`student_id`),
  KEY `program_id_4` (`program_id`),
  CONSTRAINT `student_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_original` (`student_id`),
  CONSTRAINT `student_ibfk_10` FOREIGN KEY (`board_id_10`) REFERENCES `board` (`board_id`),
  CONSTRAINT `student_ibfk_11` FOREIGN KEY (`board_10_pass_state_id`) REFERENCES `state` (`state_id`),
  CONSTRAINT `student_ibfk_12` FOREIGN KEY (`board_id_12`) REFERENCES `board` (`board_id`),
  CONSTRAINT `student_ibfk_13` FOREIGN KEY (`board_12_pass_state_id`) REFERENCES `state` (`state_id`),
  CONSTRAINT `student_ibfk_14` FOREIGN KEY (`university_grad_id`) REFERENCES `universities` (`university_id`),
  CONSTRAINT `student_ibfk_15` FOREIGN KEY (`university_pg_id`) REFERENCES `universities` (`university_id`),
  CONSTRAINT `student_ibfk_16` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`),
  CONSTRAINT `student_ibfk_17` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `student_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`),
  CONSTRAINT `student_ibfk_3` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`campus_id`),
  CONSTRAINT `student_ibfk_4` FOREIGN KEY (`category_id`) REFERENCES `student_category` (`category_id`),
  CONSTRAINT `student_ibfk_5` FOREIGN KEY (`religion_id`) REFERENCES `religion` (`religion_id`),
  CONSTRAINT `student_ibfk_6` FOREIGN KEY (`comm_state_id`) REFERENCES `state` (`state_id`),
  CONSTRAINT `student_ibfk_7` FOREIGN KEY (`father_state_id`) REFERENCES `state` (`state_id`),
  CONSTRAINT `student_ibfk_8` FOREIGN KEY (`perm_state_id`) REFERENCES `state` (`state_id`),
  CONSTRAINT `student_ibfk_9` FOREIGN KEY (`admission_category_id`) REFERENCES `student_category` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_category`
--

DROP TABLE IF EXISTS `student_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(10) CHARACTER SET utf8 NOT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`),
  KEY `category_id` (`category_id`),
  KEY `category_name` (`category_name`),
  KEY `log_id` (`log_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id_2` (`log_id`),
  CONSTRAINT `category_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`),
  CONSTRAINT `category_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_category`
--

LOCK TABLES `student_category` WRITE;
/*!40000 ALTER TABLE `student_category` DISABLE KEYS */;
INSERT INTO `student_category` VALUES (1,'General',1,1),(2,'OBC',1,1),(3,'SC',1,1),(4,'ST',1,1);
/*!40000 ALTER TABLE `student_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_documents`
--

DROP TABLE IF EXISTS `student_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_documents` (
  `document_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `category` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `media` mediumblob NOT NULL,
  `mime` varchar(100) NOT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`document_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id` (`log_id`),
  KEY `status_value_id_2` (`status_value_id`),
  KEY `log_id_2` (`log_id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `student_documents_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `student_documents_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`),
  CONSTRAINT `student_documents_student_id_constraint` FOREIGN KEY (`student_id`) REFERENCES `student_original` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_documents`
--

LOCK TABLES `student_documents` WRITE;
/*!40000 ALTER TABLE `student_documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_original`
--

DROP TABLE IF EXISTS `student_original`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_original` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `campus_id` int(11) NOT NULL,
  `date_of_admission` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `first_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `middle_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hindi_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `enrollment_no` varchar(10) CHARACTER SET utf8 NOT NULL,
  `dob` date NOT NULL,
  `birth_place` varchar(60) CHARACTER SET utf8 NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category` varchar(20) CHARACTER SET utf8 NOT NULL,
  `religion_id` int(11) NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 NOT NULL,
  `marital_status` varchar(15) CHARACTER SET utf8 NOT NULL,
  `area` varchar(50) CHARACTER SET utf8 NOT NULL,
  `blood_group` varchar(3) CHARACTER SET utf8 NOT NULL,
  `nationality` varchar(50) CHARACTER SET utf8 NOT NULL,
  `communication_addr` varchar(180) CHARACTER SET utf8 NOT NULL,
  `comm_city` varchar(100) CHARACTER SET utf8 NOT NULL,
  `comm_state_id` int(11) NOT NULL,
  `comm_pincode` varchar(10) NOT NULL,
  `comm_phone_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `comm_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `father_first_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `father_last_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `father_profession` varchar(50) CHARACTER SET utf8 NOT NULL,
  `father_office_addr` varchar(180) CHARACTER SET utf8 NOT NULL,
  `father_city` varchar(100) CHARACTER SET utf8 NOT NULL,
  `father_state_id` int(11) NOT NULL,
  `father_pincode` varchar(10) NOT NULL,
  `father_phone_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `father_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `mother_first_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `mother_last_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `mother_profession` varchar(100) CHARACTER SET utf8 NOT NULL,
  `permanent_addr` varchar(180) CHARACTER SET utf8 NOT NULL,
  `perm_city` varchar(100) CHARACTER SET utf8 NOT NULL,
  `perm_state_id` int(11) NOT NULL,
  `perm_pincode` varchar(10) NOT NULL,
  `perm_phone_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `perm_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `local_guardian_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `local_guardian_addr` varchar(180) CHARACTER SET utf8 NOT NULL,
  `local_guard_city` varchar(100) CHARACTER SET utf8 NOT NULL,
  `local_guard_phone_no` varchar(100) CHARACTER SET utf8 NOT NULL,
  `admission_category_id` int(11) NOT NULL,
  `admit_card` varchar(5) CHARACTER SET utf8 NOT NULL,
  `jee_rank_card` varchar(5) CHARACTER SET utf8 NOT NULL,
  `jee_roll_no` varchar(20) NOT NULL,
  `jee_rank_pos` varchar(10) NOT NULL,
  `jee_seat_allot_letter` varchar(5) CHARACTER SET utf8 NOT NULL,
  `marksheet_10` varchar(5) CHARACTER SET utf8 NOT NULL,
  `cert_10` varchar(5) CHARACTER SET utf8 NOT NULL,
  `percentage_10` double NOT NULL,
  `board_id_10` int(11) NOT NULL,
  `board_10_pass_state_id` int(11) DEFAULT NULL,
  `marksheet_12` varchar(5) CHARACTER SET utf8 NOT NULL,
  `cert_12` varchar(5) CHARACTER SET utf8 NOT NULL,
  `percentage_12` double NOT NULL,
  `board_id_12` int(11) NOT NULL,
  `board_12_pass_state_id` int(11) DEFAULT NULL,
  `marksheet_grad` varchar(5) CHARACTER SET utf8 NOT NULL,
  `degree_grad` varchar(5) CHARACTER SET utf8 NOT NULL,
  `percentage_grad` double NOT NULL,
  `university_grad_id` int(11) NOT NULL,
  `marksheet_pg` varchar(5) CHARACTER SET utf8 NOT NULL,
  `degree_pg` varchar(5) CHARACTER SET utf8 NOT NULL,
  `percentage_pg` double NOT NULL,
  `university_pg_id` int(11) NOT NULL,
  `gate_score_card` varchar(5) CHARACTER SET utf8 NOT NULL,
  `gate_year` year(4) NOT NULL,
  `gate_score` double NOT NULL,
  `cat_score_card` varchar(5) CHARACTER SET utf8 NOT NULL,
  `cat_year` year(4) NOT NULL,
  `cat_score` double NOT NULL,
  `transfer_cert` varchar(5) CHARACTER SET utf8 NOT NULL,
  `migration_cert` int(11) NOT NULL,
  `character_cert` varchar(5) CHARACTER SET utf8 NOT NULL,
  `caste_cert` varchar(5) CHARACTER SET utf8 NOT NULL,
  `ph_cert` varchar(5) CHARACTER SET utf8 NOT NULL,
  `passport` varchar(5) CHARACTER SET utf8 NOT NULL,
  `passport_no` varchar(15) CHARACTER SET utf8 NOT NULL,
  `passport_expiry` date NOT NULL,
  `mcaip` varchar(5) CHARACTER SET utf8 NOT NULL,
  `DASA` varchar(5) CHARACTER SET utf8 NOT NULL,
  `remark` mediumtext CHARACTER SET utf8 NOT NULL,
  `anti_rag_st` varchar(5) CHARACTER SET utf8 NOT NULL,
  `anti_rag_pr` varchar(5) CHARACTER SET utf8 NOT NULL,
  `med_cert` varchar(5) CHARACTER SET utf8 NOT NULL,
  `muslim_minority` varchar(5) CHARACTER SET utf8 NOT NULL,
  `other_minority` varchar(5) CHARACTER SET utf8 NOT NULL,
  `admission_letter` varchar(5) CHARACTER SET utf8 NOT NULL,
  `year` year(4) DEFAULT NULL,
  `sem_code` int(11) NOT NULL,
  `section` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `aadhaar` varchar(12) NOT NULL,
  `hostel_no` varchar(8) NOT NULL,
  `hostel_room` varchar(5) NOT NULL,
  `dasa_country` varchar(30) NOT NULL,
  `id_card_validity` varchar(20) NOT NULL,
  `termination_date` date NOT NULL,
  `graduation_date` date NOT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`student_id`),
  KEY `program_id` (`program_id`),
  KEY `campus_id` (`campus_id`),
  KEY `category_id` (`category_id`),
  KEY `religion_id` (`religion_id`),
  KEY `religion_id_2` (`religion_id`),
  KEY `state_id1` (`comm_state_id`),
  KEY `state_id1_2` (`comm_state_id`),
  KEY `state_id2` (`father_state_id`),
  KEY `state_id3` (`perm_state_id`),
  KEY `category_id_2` (`category_id`),
  KEY `state_id3_2` (`perm_state_id`),
  KEY `board_id_10` (`board_id_10`),
  KEY `university_pg_id` (`university_pg_id`),
  KEY `university_grad_id` (`university_grad_id`),
  KEY `borad_id_12` (`board_id_12`),
  KEY `enrollment_no` (`enrollment_no`),
  KEY `log_id` (`log_id`),
  KEY `status_id` (`status_value_id`),
  KEY `sem_code` (`sem_code`),
  KEY `board_12_passing_state` (`board_12_pass_state_id`),
  KEY `board_12_passing_state_2` (`board_12_pass_state_id`),
  KEY `board_12_passing_state_3` (`board_12_pass_state_id`),
  KEY `board_10_passing_state` (`board_10_pass_state_id`),
  KEY `board_12_passing_state_4` (`board_12_pass_state_id`),
  KEY `board_10_passing_state_2` (`board_10_pass_state_id`),
  KEY `enrollment_no_3` (`enrollment_no`),
  KEY `program_id_2` (`program_id`),
  KEY `campus_id_2` (`campus_id`),
  KEY `category_id_3` (`category_id`),
  KEY `religion_id_3` (`religion_id`),
  KEY `comm_state_id` (`comm_state_id`),
  KEY `father_state_id` (`father_state_id`),
  KEY `perm_state_id` (`perm_state_id`),
  KEY `admission_category_id` (`admission_category_id`),
  KEY `board_id_10_2` (`board_id_10`),
  KEY `board_10_passing_state_3` (`board_10_pass_state_id`),
  KEY `board_id_12` (`board_id_12`),
  KEY `board_12_passing_state_5` (`board_12_pass_state_id`),
  KEY `university_grad_id_2` (`university_grad_id`),
  KEY `university_pg_id_2` (`university_pg_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id_2` (`log_id`),
  KEY `program_id_3` (`program_id`),
  KEY `campus_id_3` (`campus_id`),
  KEY `category_id_4` (`category_id`),
  KEY `religion_id_4` (`religion_id`),
  KEY `comm_state_id_2` (`comm_state_id`),
  KEY `comm_state_id_3` (`comm_state_id`),
  KEY `father_state_id_2` (`father_state_id`),
  KEY `perm_state_id_2` (`perm_state_id`),
  KEY `admission_category_id_2` (`admission_category_id`),
  KEY `board_10_passing_state_id` (`board_10_pass_state_id`),
  KEY `comm_state_id_4` (`comm_state_id`),
  KEY `father_state_id_3` (`father_state_id`),
  KEY `perm_state_id_3` (`perm_state_id`),
  KEY `admission_category_id_3` (`admission_category_id`),
  KEY `board_id_10_3` (`board_id_10`),
  KEY `board_10_passing_state_id_2` (`board_10_pass_state_id`),
  KEY `board_id_12_2` (`board_id_12`),
  KEY `board_12_passing_state_id` (`board_12_pass_state_id`),
  KEY `university_grad_id_3` (`university_grad_id`),
  KEY `university_pg_id_3` (`university_pg_id`),
  CONSTRAINT `student_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `student_original_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`),
  CONSTRAINT `student_original_ibfk_10` FOREIGN KEY (`board_10_pass_state_id`) REFERENCES `state` (`state_id`),
  CONSTRAINT `student_original_ibfk_11` FOREIGN KEY (`board_12_pass_state_id`) REFERENCES `state` (`state_id`),
  CONSTRAINT `student_original_ibfk_12` FOREIGN KEY (`university_grad_id`) REFERENCES `universities` (`university_id`),
  CONSTRAINT `student_original_ibfk_13` FOREIGN KEY (`university_pg_id`) REFERENCES `universities` (`university_id`),
  CONSTRAINT `student_original_ibfk_14` FOREIGN KEY (`board_id_12`) REFERENCES `board` (`board_id`),
  CONSTRAINT `student_original_ibfk_2` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`campus_id`),
  CONSTRAINT `student_original_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `student_category` (`category_id`),
  CONSTRAINT `student_original_ibfk_4` FOREIGN KEY (`religion_id`) REFERENCES `religion` (`religion_id`),
  CONSTRAINT `student_original_ibfk_5` FOREIGN KEY (`comm_state_id`) REFERENCES `state` (`state_id`),
  CONSTRAINT `student_original_ibfk_6` FOREIGN KEY (`father_state_id`) REFERENCES `state` (`state_id`),
  CONSTRAINT `student_original_ibfk_7` FOREIGN KEY (`perm_state_id`) REFERENCES `state` (`state_id`),
  CONSTRAINT `student_original_ibfk_8` FOREIGN KEY (`admission_category_id`) REFERENCES `student_category` (`category_id`),
  CONSTRAINT `student_original_ibfk_9` FOREIGN KEY (`board_id_10`) REFERENCES `board` (`board_id`),
  CONSTRAINT `student_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_original`
--

LOCK TABLES `student_original` WRITE;
/*!40000 ALTER TABLE `student_original` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_original` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temp_results`
--

DROP TABLE IF EXISTS `temp_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temp_results` (
  `temp_results_id` int(11) NOT NULL AUTO_INCREMENT,
  `sem_id` int(11) NOT NULL,
  `result_file` blob NOT NULL,
  `mime` varchar(50) NOT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`temp_results_id`),
  KEY `log_id` (`log_id`),
  KEY `log_id_2` (`log_id`),
  KEY `status_value_id` (`status_value_id`),
  CONSTRAINT `temp_results_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`),
  CONSTRAINT `temp_results_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temp_results`
--

LOCK TABLES `temp_results` WRITE;
/*!40000 ALTER TABLE `temp_results` DISABLE KEYS */;
/*!40000 ALTER TABLE `temp_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `universities`
--

DROP TABLE IF EXISTS `universities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `universities` (
  `university_id` int(11) NOT NULL AUTO_INCREMENT,
  `university_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `status_value_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`university_id`),
  KEY `log_id` (`log_id`),
  KEY `status_id` (`status_value_id`),
  KEY `status_value_id` (`status_value_id`),
  KEY `log_id_2` (`log_id`),
  KEY `state_id` (`state_id`),
  KEY `state_id_2` (`state_id`),
  CONSTRAINT `universities_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`),
  CONSTRAINT `universities_log_id_constraint` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `universities_status_value_id_constraint` FOREIGN KEY (`status_value_id`) REFERENCES `status_value` (`status_value_id`)
) ENGINE=InnoDB AUTO_INCREMENT=853 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `universities`
--

LOCK TABLES `universities` WRITE;
/*!40000 ALTER TABLE `universities` DISABLE KEYS */;
INSERT INTO `universities` VALUES (0,'NA',0,1,1),(1,'Acharya Nagarjuna University',8,1,1),(2,'Adikavi Nannaya University',8,1,1),(3,'Andhra University',8,1,1),(4,'Damodaram Sanjivayya National Law University',8,1,1),(5,'Dr. B.R. Ambedkar University',8,1,1),(6,'Dr. N.T.R. University of Health Sciences',8,1,1),(7,'Dr. Y.S.R. Horticultural University',8,1,1),(8,'Dravidian University',8,1,1),(9,'Gandhi Institute of Technology and Management',8,1,1),(10,'IIT - Tirupati',8,1,1),(11,'Indian Institute of Information Technology - Sri City',8,1,1),(12,'Jawaharlal Nehru Technological University - Anantpur',8,1,1),(13,'Jawaharlal Nehru Technological University - Kakinada',8,1,1),(14,'Koneru Lakshmaiah Education Foundation',8,1,1),(15,'Krishna University',8,1,1),(16,'NIT Andhra Pradesh',8,1,1),(17,'Rashtriya Sanskrit Vidyapeeth',8,1,1),(18,'Rayalaseema University',8,1,1),(19,'Sri Krishnadevaraya University',8,1,1),(20,'Sri Padmavati Mahila Vishwavidyalayam',8,1,1),(21,'Sri Sathya Sai Institute of Higher Learning',8,1,1),(22,'Sri Venkateswara Institute of Medical Sciences',8,1,1),(23,'Sri Venkateswara University',8,1,1),(24,'Sri Venkateswara Vedic University',8,1,1),(25,'Sri Venkateswara Veterinary University',8,1,1),(26,'Vignan\'s Foundation for Science',8,1,1),(27,'Vikram Simhapuri University',8,1,1),(28,'Yogi Vemana University',8,1,1),(29,'Apex Professional University',9,1,1),(30,'Arunachal University of Studies',9,1,1),(31,'Arunodaya University',9,1,1),(32,'Himalayan University',9,1,1),(33,'NIT Arunachal Pradesh',9,1,1),(34,'North East Frontier Technical University',9,1,1),(35,'North Eastern Regional Institute of Science & Technology',9,1,1),(36,'Rajiv Gandhi University',9,1,1),(37,'The Indira Gandhi Technological & Medical Sciences University',9,1,1),(38,'Venkateshwara Open University',9,1,1),(39,'Assam Agricultural University',10,1,1),(40,'Assam Don Bosco University',10,1,1),(41,'Assam Down Town University',10,1,1),(42,'Assam Rajiv Gandhi University of Co-operative Management',10,1,1),(43,'Assam Science & Technology University',10,1,1),(44,'Assam University',10,1,1),(45,'Assam Women\'s University',10,1,1),(46,'Bodoland University',10,1,1),(47,'Cotton College State University',10,1,1),(48,'Dibrugarh University',10,1,1),(49,'Gauhati University',10,1,1),(50,'IIT - Guwahati',10,1,1),(51,'Indian Institute of Information Technology - Guwahati',10,1,1),(52,'Krishna Kanta Handique State Open University',10,1,1),(53,'Kumar Bhaskar Varma Sanskrit & Ancient Studies University',10,1,1),(54,'Mahapurusha Srimanta Sankaradeva Viswavidyalaya',10,1,1),(55,'National Law University and Judicial Academy',10,1,1),(56,'NIPER - Guwahati',10,1,1),(57,'NIT Silchar',10,1,1),(58,'Srimanta Sankaradeva University of Health Sciences',10,1,1),(59,'Tezpur University',10,1,1),(60,'The Assam Kaziranga University',10,1,1),(61,'Aryabhatta knowledge University',11,1,1),(62,'Babasaheb Bhimrao Ambedkar Bihar University',11,1,1),(63,'Bhupendra Narayan Mandal University',11,1,1),(64,'Bihar Agricultural University',11,1,1),(65,'Central University of South Bihar',11,1,1),(66,'Chanakya National Law University',11,1,1),(67,'IIT - Patna',11,1,1),(68,'Jai Prakash Vishwavidyalaya',11,1,1),(69,'Kameshwara Singh Darbhanga Sanskrit Vishwavidyalaya',11,1,1),(70,'Lalit Narayan Mithila University',11,1,1),(71,'Magadh University',11,1,1),(72,'Mahatma Gandhi Central University',11,1,1),(73,'Maulana Mazharul Haque Arabic & Persian University',11,1,1),(74,'Nalanda Open University',11,1,1),(75,'Nalanda University',11,1,1),(76,'Nava Nalanda Mahavihara',11,1,1),(77,'NIPER - Hajipur',11,1,1),(78,'NIT Patna',11,1,1),(79,'Patna University',11,1,1),(80,'Rajendra Agricultural University',11,1,1),(81,'T.M. University',11,1,1),(82,'Veer Kunwar Singh University',11,1,1),(83,'Amity University (Raipur)',12,1,1),(84,'Ayush and Health Sciences University of Chhattisgarh',12,1,1),(85,'Bastar Vishwavidyalaya',12,1,1),(86,'Bilaspur Vishwavidyalaya',12,1,1),(87,'Chhattisgarh Kamdhenu Vishwavidyalaya',12,1,1),(88,'Chhattisgarh Swami Vivekanand Technical University',12,1,1),(89,'Dr. C.V. Raman University',12,1,1),(90,'Durg Vishwavidyalaya',12,1,1),(91,'Guru Ghasidas Vishwavidyalaya',12,1,1),(92,'Hidayatullah National Law University',12,1,1),(93,'ICFAI University',12,1,1),(94,'IIT - Bhilai',12,1,1),(95,'Indira Gandhi Krishi Vishwavidyalaya',12,1,1),(96,'Indira Kala Sangeet Vishwavidyalaya',12,1,1),(97,'International Institute of Information Technology - Naya Raipur',12,1,1),(98,'ITM University',12,1,1),(99,'Kalinga University',12,1,1),(100,'Kushabhau Thakre Patrakarita Avam Jansanchar Vishwavidyalaya',12,1,1),(101,'Maharishi University of Management and Technology',12,1,1),(102,'MATS University',12,1,1),(103,'NIT Raipur',12,1,1),(104,'O.P. Jindal University',12,1,1),(105,'Pt. Ravishankar Shukla University',12,1,1),(106,'Pt. Sundarlal Sharma (Open) University',12,1,1),(107,'Sarguja University',12,1,1),(108,'Goa University',13,1,1),(109,'IIT - Goa',13,1,1),(110,'NIT Goa',13,1,1),(111,'Ahmadabad University',14,1,1),(112,'Anand Agricultural Univerisity',14,1,1),(113,'AURO University of Hospitality and Management',14,1,1),(114,'Bhakta Kavi Narsinh Mehta University',14,1,1),(115,'C.U. Shah University',14,1,1),(116,'Calorx Teachers\' University',14,1,1),(117,'Central University of Gujarat',14,1,1),(118,'Centre for Environmental Planning and Technology University',14,1,1),(119,'Charotar University of Science & Technology',14,1,1),(120,'Children\'s University',14,1,1),(121,'Dharmsinh Desai University',14,1,1),(122,'Dhirubhai Ambani Institute of Information and Communication Technology',14,1,1),(123,'Dr. Babasaheb Ambedkar Open University',14,1,1),(124,'G.L.S. University',14,1,1),(125,'Ganpat University',14,1,1),(126,'GSFC University',14,1,1),(127,'Gujarat Agricultural University',14,1,1),(128,'Gujarat Ayurveda University',14,1,1),(129,'Gujarat Forensic Sciences University',14,1,1),(130,'Gujarat National Law University',14,1,1),(131,'Gujarat Technlogical University',14,1,1),(132,'Gujarat University',14,1,1),(133,'Gujarat University of Transplantation Sciences',14,1,1),(134,'Gujarat Vidyapith',14,1,1),(135,'Hemchandracharya North Gujarat University',14,1,1),(136,'IIM Ahmedabad',14,1,1),(137,'IIT - Gandhinagar',14,1,1),(138,'Indian Institute of Information Technology - Vadodara',14,1,1),(139,'Indian Institute of Public Health - Gandhinagar',14,1,1),(140,'Indian Institute of Teacher Education',14,1,1),(141,'Indus University',14,1,1),(142,'Institute of Advanced Research',14,1,1),(143,'Institute of Infrastructure Technology Research and Management',14,1,1),(144,'ITM - Vocational University',14,1,1),(145,'Junagarh Agricultural University',14,1,1),(146,'Kadi Sarva Vishwavidyalaya',14,1,1),(147,'Kamdhenu University',14,1,1),(148,'Krantiguru Shyamji Krishna Verma Kachchh University',14,1,1),(149,'Lakulish Yoga University',14,1,1),(150,'Maharaja Krishnakumarsinji Bhavnagar University',14,1,1),(151,'Maharaja Sayajirao University of Baroda',14,1,1),(152,'Navrachana University',14,1,1),(153,'NIPER - Ahmedabad',14,1,1),(154,'Nirma University',14,1,1),(155,'NIT Surat',14,1,1),(156,'Pandit Deendayal Petroleum University',14,1,1),(157,'Parul University',14,1,1),(158,'R.K. University',14,1,1),(159,'Rai University',14,1,1),(160,'Raksha Shakti University',14,1,1),(161,'Sankalchand Patel University',14,1,1),(162,'Sardar Patel University',14,1,1),(163,'Saurashtra University',14,1,1),(164,'Shree Somnath Sanskrit University',14,1,1),(165,'Shri Govind Guru University',14,1,1),(166,'Sumandeep Vidyapeeth',14,1,1),(167,'Swarnim Gujarat Sports University',14,1,1),(168,'Team Lease Skills University',14,1,1),(169,'UKA Tarsadia University',14,1,1),(170,'Veer Narmad South Gujarat University',14,1,1),(171,'Al-Falah University',15,1,1),(172,'Amity University',15,1,1),(173,'Ansal University',15,1,1),(174,'Apeejay Stya University',15,1,1),(175,'Ashoka University',15,1,1),(176,'Baba Mast Nath University',15,1,1),(177,'Bhagat Phool Singh Mahila Vishwavidyalaya',15,1,1),(178,'BML Munjal University',15,1,1),(179,'Central University of Haryana',15,1,1),(180,'Chaudhary Bansi Lal University',15,1,1),(181,'Chaudhary Devi Lal University',15,1,1),(182,'Chaudhary Ranbir Singh University',15,1,1),(183,'Choudhary Charan Singh Haryana Agricultural University',15,1,1),(184,'Deen Bandhu Chhotu Ram University of Science & Technology',15,1,1),(185,'G.D. Goenka University',15,1,1),(186,'Guru Jambeshwar University of Science and Technology',15,1,1),(187,'Indira Gandhi University',15,1,1),(188,'Jagan Nath University',15,1,1),(189,'K.R. Mangalam University',15,1,1),(190,'Kurukshetra University',15,1,1),(191,'Lala Lajpat Rai University of Veterinary & Animal Sciences',15,1,1),(192,'Lingaya\'s University',15,1,1),(193,'M.V.N. University',15,1,1),(194,'Maharishi Dayanand University',15,1,1),(195,'Maharishi Markandeshwar Education Trust',15,1,1),(196,'Maharishi Markandeshwar University',15,1,1),(197,'Manav Rachna International University',15,1,1),(198,'Manav Rachna University',15,1,1),(199,'National Brain Research Centre',15,1,1),(200,'National Dairy Research Institute',15,1,1),(201,'National Institute of Food Technology',15,1,1),(202,'NIILM University',15,1,1),(203,'NIT Kurukshetra',15,1,1),(204,'O.P. Jindal Global University',15,1,1),(205,'PDM University',15,1,1),(206,'Pt. Bhagwat Dayal Sharma University of Health Sciences',15,1,1),(207,'Shree Guru Gobind Singh Tricentenary University',15,1,1),(208,'SRM University',15,1,1),(209,'State University of Performing and Visual Arts',15,1,1),(210,'The Northcap University',15,1,1),(211,'YMCA University of Science & Technology',15,1,1),(212,'Abhilashi University',16,1,1),(213,'Alakh Prakash Goyal University',16,1,1),(214,'Arni University',16,1,1),(215,'Baddi University of Emerging Sciences & Technology',16,1,1),(216,'Bahra University',16,1,1),(217,'Career Point University',16,1,1),(218,'Central University of Himachal Pradesh',16,1,1),(219,'Chaudhary Sarwan Kumar Himachal Pradesh Krishi Vishvavidyalaya',16,1,1),(220,'Chitkara University',16,1,1),(221,'Dr. Y.S.Parmar University of Horticulture & Forestry',16,1,1),(222,'Eternal University',16,1,1),(223,'Himachal Pradesh Technical University',16,1,1),(224,'Himachal Pradesh University',16,1,1),(225,'ICFAI University',16,1,1),(226,'IIT - Mandi',16,1,1),(227,'India Education Centre University',16,1,1),(228,'Indus International University',16,1,1),(229,'Jaypee University of Information Technology',16,1,1),(230,'Maharaja Agrasen University',16,1,1),(231,'Maharishi Markandeshwar University',16,1,1),(232,'Manav Bharti University',16,1,1),(233,'NIT Hamirpur',16,1,1),(234,'Shoolini University of Biotechnology and Management Sciences',16,1,1),(235,'Sri Sai University',16,1,1),(236,'Baba Ghulam Shah Badshah University',17,1,1),(237,'Central Institute of Buddhist Studies',17,1,1),(238,'Central University of Jammu',17,1,1),(239,'Central University of Kashmir',17,1,1),(240,'IIT - Jammu',17,1,1),(241,'Islamic University of Science & Technology University',17,1,1),(242,'NIT Srinagar',17,1,1),(243,'Sher-e-Kashmir University of Agricultural Science & Technology - Chatha',17,1,1),(244,'Sher-e-Kashmir University of Agricultural Science & Technology - Shalimar',17,1,1),(245,'Shri Mata Vaishno Devi University',17,1,1),(246,'University of Jammu',17,1,1),(247,'University of Kashmir',17,1,1),(248,'Birla Institute of Technology',18,1,1),(249,'Birsa Agricultural University',18,1,1),(250,'Central University of Jharkhand',18,1,1),(251,'IIM Ranchi',18,1,1),(252,'IIT - Dhanbad',18,1,1),(253,'Indian Institute of Information Technology - Ranchi',18,1,1),(254,'Indian School of Mines',18,1,1),(255,'Jharkhand Rai University',18,1,1),(256,'Kolhan University',18,1,1),(257,'National University of Study & Research in Law',18,1,1),(258,'Nilamber-Pitamber University',18,1,1),(259,'NIT Jamshedpur',18,1,1),(260,'Ranchi University',18,1,1),(261,'Sai Nath University',18,1,1),(262,'Sido Kanhu Murmu University',18,1,1),(263,'The Institute of Chartered Financial Analysts of India University',18,1,1),(264,'Vinoba Bhave University',18,1,1),(265,'Alliance University',19,1,1),(266,'Azim Premji University',19,1,1),(267,'B.L.D.E. University',19,1,1),(268,'Bangalore University',19,1,1),(269,'Central University of Karnataka',19,1,1),(270,'Christ College',19,1,1),(271,'CMR University',19,1,1),(272,'Davangere University',19,1,1),(273,'Dayanand Sagar University',19,1,1),(274,'Gulbarga University',19,1,1),(275,'IIM Bangalore',19,1,1),(276,'IIT - Dharwad',19,1,1),(277,'Indian Institute of Science',19,1,1),(278,'Institute of Trans-Disciplinary Health Sciences and Technology',19,1,1),(279,'International Institute of Information Technology',19,1,1),(280,'International Institute of Information Technology - Bangalore',19,1,1),(281,'Jagadguru Sri Shivarathreeswara University',19,1,1),(282,'Jain University',19,1,1),(283,'Jawaharlal Nehru Centre for Advanced Scientific Research',19,1,1),(284,'Kannada University',19,1,1),(285,'Karnataka Folklore University',19,1,1),(286,'Karnataka Janapada Vishwavidyalaya',19,1,1),(287,'Karnataka Sanskrit University',19,1,1),(288,'Karnataka State Law University',19,1,1),(289,'Karnataka State Open University',19,1,1),(290,'Karnataka State Women University',19,1,1),(291,'Karnataka University',19,1,1),(292,'Karnataka Veterinary',19,1,1),(293,'KLE Academy of Higher Education and Research',19,1,1),(294,'KLE Technological University',19,1,1),(295,'KSGH Music and Performing Arts University',19,1,1),(296,'Kuvempu University',19,1,1),(297,'M.S. Ramaiah University of Applied Sciences',19,1,1),(298,'Mangalore University',19,1,1),(299,'Manipal Academy of Higher Education',19,1,1),(300,'National Law School of India University',19,1,1),(301,'NIT Surathkal',19,1,1),(302,'NITTE University',19,1,1),(303,'PES University',19,1,1),(304,'Presidency University (Karnataka)',19,1,1),(305,'Rai Technology University',19,1,1),(306,'Rajiv Gandhi University of Health Sciences',19,1,1),(307,'Rani Channamma University',19,1,1),(308,'Reva University',19,1,1),(309,'Sri Devraj Urs Academy of Higher Education and Research',19,1,1),(310,'Sri Siddhartha Academy of Higher Education',19,1,1),(311,'Srinivas University',19,1,1),(312,'Swami Vivekananda Yoga Anusandhana Samsthana',19,1,1),(313,'Tumkur University',19,1,1),(314,'University of Agricultural Sciences - GKVK Campus',19,1,1),(315,'University of Agricultural Sciences - Yettinagudda  Campus',19,1,1),(316,'University of Horticultural Sciences',19,1,1),(317,'University of Mysore',19,1,1),(318,'Vijayanagara Sri Krishnadevaraya University',19,1,1),(319,'Visveswaraiah Technological University',19,1,1),(320,'Yenepoya University',19,1,1),(321,'APJ Abdul Kalam Technological University',20,1,1),(322,'Central University of Kerala',20,1,1),(323,'Cochin University of Science & Technology',20,1,1),(324,'IIM Kozhikode',20,1,1),(325,'IIT - Palghat',20,1,1),(326,'Indian Institute of Information Technology - Kottayam',20,1,1),(327,'Indian Institute of Space Science and Technology',20,1,1),(328,'Kannur University',20,1,1),(329,'Kerala Agricultural University',20,1,1),(330,'Kerala Kalamandalam',20,1,1),(331,'Kerala University of Fisheries & Ocean Studies',20,1,1),(332,'Kerala University of Health Sciences',20,1,1),(333,'Kerala Veterinary & Animal Sciences University',20,1,1),(334,'Mahatma Gandhi University',20,1,1),(335,'National University of Advanced Legal Studies',20,1,1),(336,'NIT Calicut',20,1,1),(337,'Shree Sankaracharya University of Sanskrit',20,1,1),(338,'Thunchath Ezhuthachan Malayalam University',20,1,1),(339,'University of Calicut',20,1,1),(340,'University of Kerala',20,1,1),(341,'A.K.S. University',21,1,1),(342,'AISECT University',21,1,1),(343,'Amity University',21,1,1),(344,'Atal Bihari Vajpai Hindi Vishwavidyalaya',21,1,1),(345,'Awadesh Pratap Singh University',21,1,1),(346,'Barkatullah University',21,1,1),(347,'Devi Ahilya Vishwavidyalaya',21,1,1),(348,'Dr. A.P.J. Abdul Kalam University',21,1,1),(349,'Dr. B.R. Ambedkar University of Social Sciences',21,1,1),(350,'Dr. Harisingh Gour Vishwavidyalaya',21,1,1),(351,'IIM Indore',21,1,1),(352,'IIT - Indore',21,1,1),(353,'Indian Institute of Information Technology and Management - Gwalior',21,1,1),(354,'Indian Institute of Information Technology,  Design and Manufacturing - Jabalpur',21,1,1),(355,'ITM University',21,1,1),(356,'Jagran Lakecity University',21,1,1),(357,'Jawaharlal Nehru Krishi Vishwavidyalaya',21,1,1),(358,'Jaypee University of Engineering & Technology',21,1,1),(359,'Jiwaji University',21,1,1),(360,'Lakshmibai National Institute of Physical Education',21,1,1),(361,'LNCT University',21,1,1),(362,'M.P.Bhoj (open) University',21,1,1),(363,'Madhya Pradesh Medical Science University',21,1,1),(364,'Maharaja Chhatrasal Bundelkhand Vishwavidyalaya',21,1,1),(365,'Maharishi Mahesh Yogi Vedic Vishwavidyalaya',21,1,1),(366,'Maharishi Panini Sanskrit Evam Vedic Vishwavidyalaya',21,1,1),(367,'Mahatma Gandhi Chitrakoot Gramoday Vishwavidyalaya',21,1,1),(368,'Makhanlal Chaturvedi Rashtriya Patrakarita National University of Journalism',21,1,1),(369,'Malwanchal University',21,1,1),(370,'Mandsaur University',21,1,1),(371,'Maulana Azad NIT Bhopal',21,1,1),(372,'Medi-Caps University',21,1,1),(373,'Nanaji Deshmukh Pashu Chikitsa Vigyan Vishwavidyalaya',21,1,1),(374,'National Law Institute University',21,1,1),(375,'NITTR - Bhopal',21,1,1),(376,'Oriental University',21,1,1),(377,'P.K. University',21,1,1),(378,'People\'s University',21,1,1),(379,'Raja Mansingh Tomar Music & Arts University',21,1,1),(380,'Rajiv Gandhi Prodoyogiki Vishwavidyalaya',21,1,1),(381,'Rajmata Vijayaraje Scindia Krishi Vishwavidyalaya',21,1,1),(382,'Rani Durgavati Vishwavidyalaya',21,1,1),(383,'RKDF University',21,1,1),(384,'Sanchi University of Buddhist-Indic Studies',21,1,1),(385,'Sarvepalli Radhakrishnan University',21,1,1),(386,'Shri Vaishnav Vidyapeeth Vishwavidyalaya',21,1,1),(387,'Sri Satya Sai University of Technology & Medical Sciences',21,1,1),(388,'Swami Vivekananda University',21,1,1),(389,'Techno Global University',21,1,1),(390,'The Indira Gandhi National Tribal University',21,1,1),(391,'Vikram University',21,1,1),(392,'Ajeenkya D.Y. Patil University',22,1,1),(393,'Amity University',22,1,1),(394,'Bharati Vidyapeeth',22,1,1),(395,'Central Institute of Fisheries Education',22,1,1),(396,'D.Y. Patil Educational Society',22,1,1),(397,'Datta Meghe Institute of Medical Sciences',22,1,1),(398,'Deccan College of Post-Graduate & Research Institute',22,1,1),(399,'Dr. Babasaheb Ambedkar Marathwada University',22,1,1),(400,'Dr. Babasaheb Ambedkar Technological University',22,1,1),(401,'Dr. D.Y. Patil Vidyapeeth',22,1,1),(402,'Dr. Punjabrao Deshmukh Krishi Vidyapeeth',22,1,1),(403,'Flame University',22,1,1),(404,'Gokhale Institute of Politics & Economics',22,1,1),(405,'Gondwana University',22,1,1),(406,'Homi Bhabha National Institute',22,1,1),(407,'IIT - Bombay',22,1,1),(408,'Indian Institute of Information Technology - Nagpur',22,1,1),(409,'Indira Gandhi Institute of Development Research',22,1,1),(410,'Institute of Armament Technology',22,1,1),(411,'Institute of Chemical Technology',22,1,1),(412,'International Institute for Population Sciences',22,1,1),(413,'Kavi Kulguru Kalidas Sanskrit Vishwavidyalaya',22,1,1),(414,'Konkan Krishi Vidyapeeth',22,1,1),(415,'Krishna Institute of Medical Sciences',22,1,1),(416,'Maharashtra Animal & Fishery Sciences University',22,1,1),(417,'Maharashtra National Law University',22,1,1),(418,'Maharashtra University of Health Sciences',22,1,1),(419,'Mahatma Gandhi Antarrashtriya Hindi Vishwavidyalay',22,1,1),(420,'Mahatma Phule Krishi Vidyapeeth',22,1,1),(421,'Marathwada Agricultural University',22,1,1),(422,'MGM Institute of Health Sciences',22,1,1),(423,'MIT Art Design & Technology University',22,1,1),(424,'Narsee Monjee Institute of Management Studies',22,1,1),(425,'North Maharashtra University',22,1,1),(426,'Padmashree Dr. D.Y. Patil Vidyapeeth',22,1,1),(427,'Pravara Institute of Medical Sciences',22,1,1),(428,'Sant Gadge Baba Amravati University',22,1,1),(429,'Savitribai Phule Pune University',22,1,1),(430,'Shivaji University',22,1,1),(431,'Smt. Nathibai Damodar Thackersey Womenâ€™s University',22,1,1),(432,'Solapur University',22,1,1),(433,'Spicer Adventist University',22,1,1),(434,'Swami Ramanand Teerth Marathwada University',22,1,1),(435,'SYMBIOSIS International University',22,1,1),(436,'Tata Institute of Fundamental Research',22,1,1),(437,'Tata Institute of Social Sciences',22,1,1),(438,'The Rashtrasant Tukadoji Maharaj Nagpur University',22,1,1),(439,'Tilak Maharashtra Vidyapeeth',22,1,1),(440,'University of Mumbai',22,1,1),(441,'Visvesvaraya NIT Nagpur',22,1,1),(442,'Yashwant Rao Chavan Maharashtra Open University',22,1,1),(443,'Central Agricultural University',23,1,1),(444,'Manipur University',23,1,1),(445,'NIT Manipur',23,1,1),(446,'Sangai International University',23,1,1),(447,'CMJ University',24,1,1),(448,'IIM Shillong',24,1,1),(449,'Mahatma Gandhi University',24,1,1),(450,'Martin Luther Christian University',24,1,1),(451,'Mizoram University',24,1,1),(452,'NIT Meghalaya',24,1,1),(453,'North Eastern Hill University',24,1,1),(454,'Techno Global University',24,1,1),(455,'The Institute of Chartered Financial Analysts of India University',24,1,1),(456,'University of Science & Technology',24,1,1),(457,'University of Technology & Management',24,1,1),(458,'William Carey University',24,1,1),(459,'NIT Mizoram',25,1,1),(460,'The Institute of Chartered Financial Analysts of India University',25,1,1),(461,'Nagaland University',26,1,1),(462,'NIT Nagaland',26,1,1),(463,'The Global Open University',26,1,1),(464,'The Institute of Chartered Financial Analysts of India University',26,1,1),(465,'Bharat Ratna Dr. B.R. Ambedkar University',1,1,1),(466,'Delhi Pharmaceutical Sciences & Research University',1,1,1),(467,'Delhi Technological University',1,1,1),(468,'Guru Gobind Singh Indraprastha Vishwavidyalaya',1,1,1),(469,'IIT - Delhi',1,1,1),(470,'Indian Agricultural Research Institute',1,1,1),(471,'Indian Institute of Foreign Trade',1,1,1),(472,'Indian Law Institute',1,1,1),(473,'Indira Gandhi Delhi Technical University for Women',1,1,1),(474,'Indira Gandhi National Open University',1,1,1),(475,'Indraprastha Institute of Information Technology',1,1,1),(476,'Indraprastha Institute of Information Technology Delhi',1,1,1),(477,'Institute of Liver and Biliary Sciences (ILBS)',1,1,1),(478,'Jamia Hamdard',1,1,1),(479,'Jamia Mallia Islamia University',1,1,1),(480,'Jawaharlal Nehru University',1,1,1),(481,'National Institute of Educational Planning and Administration',1,1,1),(482,'National Law University',1,1,1),(483,'National Museum Institute of History of Art',1,1,1),(484,'NIT Delhi',1,1,1),(485,'Rashtriya Sanskrit Sansthana',1,1,1),(486,'Shri Lal Bahadur Shastri Rashtriya Sanskrit Vidyapith',1,1,1),(487,'South Asian University',1,1,1),(488,'TERI School of Advanced Studies',1,1,1),(489,'University of Delhi',1,1,1),(490,'Berhampur University',27,1,1),(491,'Biju Patnaik University of Technology',27,1,1),(492,'Central University of Orissa',27,1,1),(493,'Centurion University of Technology and Management',27,1,1),(494,'Fakir Mohan University',27,1,1),(495,'IIT - Bhubaneswar',27,1,1),(496,'International Institute of Information Technology - Bhubaneswar',27,1,1),(497,'Kalinga Institute of Industrial Technology',27,1,1),(498,'National Law University',27,1,1),(499,'NIT Rourkela',27,1,1),(500,'North Orissa University',27,1,1),(501,'Orissa University of Agriculture & Technology',27,1,1),(502,'Rama Devi Womenâ€™s University',27,1,1),(503,'Ravenshaw University',27,1,1),(504,'Sambalpur University',27,1,1),(505,'Shiksha \'O\' Anusandhan',27,1,1),(506,'Shri Jagannath Sanskrit Vishwavidyalaya',27,1,1),(507,'Sri Sri University',27,1,1),(508,'Utkal University',27,1,1),(509,'Utkal University of Culture',27,1,1),(510,'Veer Surendra Sai University of Technology',27,1,1),(511,'Xavier University',27,1,1),(512,'NIT Pondicherry',7,1,1),(513,'Pondicherry University',7,1,1),(514,'Sri Balaji Vidyapeeth',7,1,1),(515,'Adesh University',28,1,1),(516,'Akal University',28,1,1),(517,'Baba Farid University of Health Sciences',28,1,1),(518,'Central University of Punjab',28,1,1),(519,'Chandigarh University',28,1,1),(520,'Chitkara University',28,1,1),(521,'D.A.V. University',28,1,1),(522,'Desh Bhagat University',28,1,1),(523,'Dr. B. R. Ambedkar NIT Jalandhar',28,1,1),(524,'GNA University',28,1,1),(525,'Guru Angad Dev Veterinary & Animal Sciences University',28,1,1),(526,'Guru Kashi University',28,1,1),(527,'Guru Nanak Dev University',28,1,1),(528,'Guru Ravidas Ayurved University',28,1,1),(529,'IIT - Ropar',28,1,1),(530,'Lovely Professional University',28,1,1),(531,'Maharaja Ranjit Singh Punjab Technical University',28,1,1),(532,'Punjab Agricultural University',28,1,1),(533,'Punjabi University',28,1,1),(534,'Rayat Bahra University',28,1,1),(535,'RIMT University',28,1,1),(536,'Sant Baba Bhag Singh University',28,1,1),(537,'Sant Longowal Institute of Engineering and Technology (SLIET)',28,1,1),(538,'Sri Guru Granth Sahib World University',28,1,1),(539,'Thapar Institute of Engineering & Technology',28,1,1),(540,'The I.K. Gujaral Punjab Technical University',28,1,1),(541,'The Rajiv Gandhi National University of Law',28,1,1),(542,'Amity University',29,1,1),(543,'Banasthali Vidyapith',29,1,1),(544,'Bhagwant University',29,1,1),(545,'Birla Institute of Technology & Science',29,1,1),(546,'Career Point University',29,1,1),(547,'Central University of Rajasthan',29,1,1),(548,'Dr. Bhimrao Ambedkar Law University',29,1,1),(549,'Dr. K.N. Modi University',29,1,1),(550,'Geetanjali University',29,1,1),(551,'Haridev Joshi University of Journalism & Mass Communication',29,1,1),(552,'Homoeopathy University',29,1,1),(553,'ICFAI University',29,1,1),(554,'IIHMR University',29,1,1),(555,'IIS University',29,1,1),(556,'IIT - Jodhpur',29,1,1),(557,'Indian Institute of Information Technology - Kota',29,1,1),(558,'Institute of Advanced Studies in Education of Gandhi Vidya Mandir',29,1,1),(559,'J.E.C.R.C. University',29,1,1),(560,'J.K. Lakshmipat University',29,1,1),(561,'Jagadguru Ramanandacharya Rajasthan Sanskrit University',29,1,1),(562,'Jagan Nath University',29,1,1),(563,'Jai Narain Vyas University',29,1,1),(564,'Jain Vishva Bharati Institute',29,1,1),(565,'Jaipur National University',29,1,1),(566,'Janardan Rai Nagar Rajasthan Vidyapeeth',29,1,1),(567,'Jayoti Vidyapeeth Womenâ€™s University',29,1,1),(568,'Jodhpur National University',29,1,1),(569,'LNM Institute of Information Technology',29,1,1),(570,'LNM Institute of Information Technology',29,1,1),(571,'Madhav University',29,1,1),(572,'Maharaj Vinayak Global University',29,1,1),(573,'Maharaja Ganga Singh University',29,1,1),(574,'Maharaja Surajmal Brij University',29,1,1),(575,'Maharana Pratap University of Agriculture & Technology',29,1,1),(576,'Maharishi Arvind University',29,1,1),(577,'Maharishi Dayanand Saraswati University',29,1,1),(578,'Mahatma Gandhi University of Medical Sciences & Technology',29,1,1),(579,'Mahatma Jyoti Rao Phule University',29,1,1),(580,'Malaviya NIT Jaipur',29,1,1),(581,'Manipal University',29,1,1),(582,'Maulana Azad University',29,1,1),(583,'Mewar University',29,1,1),(584,'Mody Institute of Technology and Science',29,1,1),(585,'Mohan Lal Sukhadia University',29,1,1),(586,'National Law University',29,1,1),(587,'NIIT University',29,1,1),(588,'NIMS University',29,1,1),(589,'OPJS University',29,1,1),(590,'Pacific Academic of Higher Education & Research University',29,1,1),(591,'Pacific Medical University',29,1,1),(592,'Poornima University',29,1,1),(593,'Pratap University',29,1,1),(594,'R.N.B. Global University',29,1,1),(595,'Raffles University',29,1,1),(596,'Raj Rishi Bhartrihari Matsya University',29,1,1),(597,'Rajasthan Agricultural University',29,1,1),(598,'Rajasthan Ayurveda University',29,1,1),(599,'Rajasthan Technical University',29,1,1),(600,'Rajasthan University of Health Sciences',29,1,1),(601,'Rajasthan University of Veterinary & Animal Sciences',29,1,1),(602,'Rajiv Gandhi Tribal University',29,1,1),(603,'Sangam University',29,1,1),(604,'Sardar Patel University of Police',29,1,1),(605,'Shekhawati University',29,1,1),(606,'Shri Jagdish Prasad Jhabarmal Tibrewala University',29,1,1),(607,'Shridhar University',29,1,1),(608,'Singhania University',29,1,1),(609,'Sir Padmapat Singhania University',29,1,1),(610,'Sunrise University',29,1,1),(611,'Suresh Gyan Vihar University',29,1,1),(612,'Tantia University',29,1,1),(613,'University of Engineering & Management',29,1,1),(614,'University of Kota',29,1,1),(615,'University of Rajasthan',29,1,1),(616,'Vardhman Mahaveer Open University',29,1,1),(617,'Vivekananda Global University',29,1,1),(618,'Eastern Institute for integrated Learning in Management University (EIILM)',30,1,1),(619,'NIT Sikkim',30,1,1),(620,'Shri Ramasamy Memorial University',30,1,1),(621,'Sikkim- Manipal University',30,1,1),(622,'Sikkim University',30,1,1),(623,'The Institute of Chartered Financial Analysts of India University',30,1,1),(624,'Vinayaka Missions Sikkim University',30,1,1),(625,'Academy of Maritime Education and Training',31,1,1),(626,'Alagappa University',31,1,1),(627,'Amrita Vishwa Vidyapeetham',31,1,1),(628,'Anna University',31,1,1),(629,'Annamalai University',31,1,1),(630,'Avinashilingam Institute for Home Science & Higher Education for Women',31,1,1),(631,'B.S. Abdur Rahman Institute of Science and Technology',31,1,1),(632,'Bharath Institute of Higher Education & Research',31,1,1),(633,'Bharathiar University',31,1,1),(634,'Bharathidasan University',31,1,1),(635,'Central University of Tamil Nadu',31,1,1),(636,'Chennai Mathematical Institute',31,1,1),(637,'Chettinad Academy of Research and Education (CARE)',31,1,1),(638,'Gandhigram Rural Institute',31,1,1),(639,'Hindustan Institute of Technology and Science (HITS)',31,1,1),(640,'IIT - Madras',31,1,1),(641,'Indian Institute of Information Technology - Srirangam',31,1,1),(642,'Indian Institute of Information Technology Design and Manufacturing - Kancheepuram',31,1,1),(643,'Indian Maritime University',31,1,1),(644,'Kalasalingam Academy of Research and Higher Education',31,1,1),(645,'Karpagam Academy of Higher Education',31,1,1),(646,'Karunya Institute of Technology and Sciences',31,1,1),(647,'M.G.R. Educational and Research Institute',31,1,1),(648,'Madurai Kamraj University',31,1,1),(649,'Manonmaniam Sundarnar University',31,1,1),(650,'Meenakshi Academy of Higher Education and Research',31,1,1),(651,'Mother Teresa Womenâ€™s University',31,1,1),(652,'NIT Trichy',31,1,1),(653,'NITTR - Chennai',31,1,1),(654,'Noorul Islam Centre for Higher Education',31,1,1),(655,'Periyar Maniammai Institute of Science & Technology (PMIST)',31,1,1),(656,'Periyar University',31,1,1),(657,'Ponnaiyah Ramajayam Institute of Science & Technology (PRIST)',31,1,1),(658,'S.R.M. Institute of Sciences and Technology',31,1,1),(659,'Sathyabama Institute of Science and Technology',31,1,1),(660,'Saveetha Institute of Medical and Technical Sciences',31,1,1),(661,'Shanmugha Arts',31,1,1),(662,'Sri Chandrasekharandra Saraswati Vishwa Mahavidyalaya',31,1,1),(663,'Sri Ramachandra Medical College and Research Institute',31,1,1),(664,'St. Peter\'s Institute of Higher Education and Research',31,1,1),(665,'Tamil Nadu Teacher Education University',31,1,1),(666,'Tamil University',31,1,1),(667,'Tamilnadu Agricultural University',31,1,1),(668,'Tamilnadu Dr. Ambedkar Law University',31,1,1),(669,'Tamilnadu Dr. M.G.R. Medical University',31,1,1),(670,'Tamilnadu Fisheries University',31,1,1),(671,'Tamilnadu Music and Fine Arts University',31,1,1),(672,'Tamilnadu National Law School',31,1,1),(673,'Tamilnadu Open University',31,1,1),(674,'Tamilnadu Physical Education and Sports University',31,1,1),(675,'Tamilnadu Veterinary & Animal Sciences University',31,1,1),(676,'Thiruvalluvar University',31,1,1),(677,'University of Madras',31,1,1),(678,'Vel Tech Rangarajan Dr. Sagunthala R & D Institute of Science and Technology',31,1,1),(679,'Vel\'s Institute of Science',31,1,1),(680,'Vellore Institute of Technology',31,1,1),(681,'Vinayaka Missions Research Foundation',31,1,1),(682,'Acharya N.G. Ranga Agricultural University',32,1,1),(683,'Dr. B.R. Ambedkar Open University',32,1,1),(684,'ICFAI Foundation for Higher Education',32,1,1),(685,'IIT - Hyderabad',32,1,1),(686,'Institute of Chartered Financial Analysts of India',32,1,1),(687,'International Institute of Information Technology',32,1,1),(688,'International Institute of Information Technology - Hyderabad',32,1,1),(689,'Jawaharlal Nehru Architecture and Fine Arts University',32,1,1),(690,'Jawaharlal Nehru Technological University',32,1,1),(691,'Kakatiya University',32,1,1),(692,'Maharaja Bir Bikram University',32,1,1),(693,'Mahatma Gandhi University',32,1,1),(694,'Maulana Azad National Urdu University',32,1,1),(695,'NALSAR University of Law',32,1,1),(696,'NIPER - Hyderabad',32,1,1),(697,'NIT Warangal',32,1,1),(698,'Nizam\'s Institute of Medical Sciences',32,1,1),(699,'Osmania University',32,1,1),(700,'Palamuru University',32,1,1),(701,'Potti Sreeramulu Telugu University',32,1,1),(702,'Professor Jayashankar Telangana State Agricultural University',32,1,1),(703,'Rajiv Gandhi University of Knowledge Technologies',32,1,1),(704,'Satavahana University',32,1,1),(705,'Sri Konda Laxman Telangana State Horticultural University',32,1,1),(706,'Telangana University',32,1,1),(707,'The English and Foreign Languages University',32,1,1),(708,'Tripura University',32,1,1),(709,'University of Hyderabad',32,1,1),(710,'NIT Agartala',33,1,1),(711,'NIPER - Mohali',3,1,1),(712,'NITTR - Chandigarh',3,1,1),(713,'Panjab University',3,1,1),(714,'Punjab Engineering College',3,1,1),(715,'Aligarh Muslim University',34,1,1),(716,'Amity University',34,1,1),(717,'Babasaheb Bhimrao Ambedkar University',34,1,1),(718,'Babu Banarasi Das University',34,1,1),(719,'Banaras Hindu University',34,1,1),(720,'Bhatkhande Music Institute',34,1,1),(721,'Bundelkhand University',34,1,1),(722,'Central Institute of Higher Tibetan Studies',34,1,1),(723,'Chandra Shekhar Azad University of Agriculture & Technology',34,1,1),(724,'Chatrapati Shahuji Maharaj Kanpur University',34,1,1),(725,'Choudhary Charan Singh University',34,1,1),(726,'Dayalbagh Educational Institute',34,1,1),(727,'Deen Dayal Upadhyay Gorakhpur University',34,1,1),(728,'Dr. B.R. Ambedkar University',34,1,1),(729,'Dr. Ram Manohar Lohia Awadh University',34,1,1),(730,'Dr. Ram Manohar Lohiya National Law University',34,1,1),(731,'G.L.A. University',34,1,1),(732,'Galgotias University',34,1,1),(733,'Gautam Buddha University',34,1,1),(734,'IFTM University',34,1,1),(735,'IIM Lucknow',34,1,1),(736,'IIT - Kanpur',34,1,1),(737,'IIT (BHU) Varanasi',34,1,1),(738,'Indian Institute of Information Technology - Allahabad',34,1,1),(739,'Indian Veterinary Research Institute',34,1,1),(740,'Integral University',34,1,1),(741,'Invertis University',34,1,1),(742,'J.S. University',34,1,1),(743,'Jagadguru Rambhadracharya Handicapped University',34,1,1),(744,'Jaypee Institute of Information Technology',34,1,1),(745,'Jaypee University',34,1,1),(746,'Khwaja Moinuddin Chishti Urdu',34,1,1),(747,'King George Medical University',34,1,1),(748,'M.J.P.Rohilkhand University',34,1,1),(749,'Madan Mohan Malviya University of Technology',34,1,1),(750,'Maharishi University of Information Technology',34,1,1),(751,'Mahatma Gandhi Kashi Vidyapeeth',34,1,1),(752,'Mangalayatan University',34,1,1),(753,'Mohammad Ali Jauhar University',34,1,1),(754,'Monad University',34,1,1),(755,'Motilal Nehru NIT Allahabad',34,1,1),(756,'Narendra Deo University of Agriculture & Technology',34,1,1),(757,'Nehru Gram Bharati Vishwavidyalaya',34,1,1),(758,'NIPER - Raebareli',34,1,1),(759,'Noida International University',34,1,1),(760,'Rajiv Gandhi National Aviation University',34,1,1),(761,'Rama University',34,1,1),(762,'Rani Lakshmi Bai Central Agricultural University',34,1,1),(763,'Sam Higginbottom Institute of Agriculture',34,1,1),(764,'Sampurnanand Sanskrit Vishwavidyalaya',34,1,1),(765,'Santosh University',34,1,1),(766,'Sardar Vallabh Bhai Patel University of Agriculture & Technology',34,1,1),(767,'Sharda University',34,1,1),(768,'Shiv Nadar University',34,1,1),(769,'Shobhit University',34,1,1),(770,'Shobit Institute of Engineering & Technology',34,1,1),(771,'Shri Ramswaroop Memorial University',34,1,1),(772,'Shri Venkateshwara University',34,1,1),(773,'Swami Vivekanand Subharti University',34,1,1),(774,'Teerthanker Mahaveer University',34,1,1),(775,'The Glocal University',34,1,1),(776,'U.P. King George\'s University of Dental Science',34,1,1),(777,'U.P. Rajarshi Tandon Open University',34,1,1),(778,'University of Allahabad',34,1,1),(779,'University of Lucknow',34,1,1),(780,'Uttar Pradesh Pandit Deen Dayal Upadhyaya Pashu Chikitsa Vigyan Vishwavidyalaya Evam Go-Anusandhan Sansthan',34,1,1),(781,'Uttar Pradesh Technical University',34,1,1),(782,'Uttar Pradesh Viklang Uddhar Dr. Shakuntala Misra University',34,1,1),(783,'Veer Bahadur Singh Purvanchal University',34,1,1),(784,'Dev Sanskriti Vishwavidyalaya',35,1,1),(785,'DIT University',35,1,1),(786,'Doon University',35,1,1),(787,'Forest Research Institute',35,1,1),(788,'G.B. Pant University of Agriculture and Technology',35,1,1),(789,'Graphic Era Parvatiya Vishwavidyalaya',35,1,1),(790,'Graphic Era University',35,1,1),(791,'Gurukul Kangri Vishwavidyalaya',35,1,1),(792,'Hemwati Nandan Bahuguna Garhwal University',35,1,1),(793,'Hemwati Nandan Bahuguna Medical Education University',35,1,1),(794,'Himgiri Zee University',35,1,1),(795,'IIT - Roorkee',35,1,1),(796,'IMS Unison University',35,1,1),(797,'Institute of Chartered Financial Analysts of India (ICFAI)',35,1,1),(798,'Kumaun University',35,1,1),(799,'Motherhood University',35,1,1),(800,'NIT Uttarakhand',35,1,1),(801,'Sri Dev Suman Uttarakhand Vishwavidyalay',35,1,1),(802,'Swami Rama Himalayan University',35,1,1),(803,'University of Patanjali',35,1,1),(804,'University of Petroleum and Energy Studies',35,1,1),(805,'Uttarakhand Ayurved University',35,1,1),(806,'Uttarakhand Open University',35,1,1),(807,'Uttarakhand Sanskrit University',35,1,1),(808,'Uttaranchal University',35,1,1),(809,'Uttrakhand Technical University',35,1,1),(810,'Veer Chandra Singh Garhwali Uttarakhand University of Horticulture & Forestry',35,1,1),(811,'Adamas University',36,1,1),(812,'Aliah University',36,1,1),(813,'Amity University',36,1,1),(814,'Bankura University',36,1,1),(815,'Bidhan Chandra Krishi Vishwavidyalaya',36,1,1),(816,'Brainware University',36,1,1),(817,'Cooch Behar Panchanan Barma University',36,1,1),(818,'Diamond Harbour Womenâ€™s University',36,1,1),(819,'Gaur Banga University',36,1,1),(820,'IIM Calcutta',36,1,1),(821,'IIT - Kharagpur',36,1,1),(822,'Indian Institute of Information Technology - Kalyani',36,1,1),(823,'Jadavpur University',36,1,1),(824,'JIS University',36,1,1),(825,'Kazi Nazrul University',36,1,1),(826,'Maulana Abul Kalam Azad University of Technology',36,1,1),(827,'Netaji Subhash Open University',36,1,1),(828,'NIPER - Kolkata',36,1,1),(829,'NIT Durgapur',36,1,1),(830,'NITTR - Kolkata',36,1,1),(831,'Presidency University',36,1,1),(832,'Rabindra Bharati University',36,1,1),(833,'Raiganj University',36,1,1),(834,'Ramakrishna Mission Vivekananda Educational and Research Institute',36,1,1),(835,'Seacom Skills University',36,1,1),(836,'Sidho-Kanho-Birsha University',36,1,1),(837,'Techno India University',36,1,1),(838,'The Neotia University',36,1,1),(839,'The West Bengal National University of Juridical Science',36,1,1),(840,'The West Bengal University of Health Sciences',36,1,1),(841,'The West Bengal University of Teachersâ€™ Training',36,1,1),(842,'University of Burdwan',36,1,1),(843,'University of Calcutta',36,1,1),(844,'University of Engineering and Management',36,1,1),(845,'University of Kalyani',36,1,1),(846,'University of North Bengal',36,1,1),(847,'Uttar Banga Krishi Vishwavidyalaya',36,1,1),(848,'Vidyasagar University',36,1,1),(849,'Vishwa Bharati University',36,1,1),(850,'West Bengal State University',36,1,1),(851,'West Bengal University of Animal and Fishery Sciences',36,1,1),(852,'Cambridge International Examinations',1,1,5);
/*!40000 ALTER TABLE `universities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `update_status_value_history`
--

DROP TABLE IF EXISTS `update_status_value_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `update_status_value_history` (
  `original_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `new_log_id` int(11) NOT NULL,
  `old_status_value_id` int(11) NOT NULL,
  PRIMARY KEY (`original_log_id`),
  KEY `old_log_id` (`new_log_id`),
  KEY `new_status_id` (`old_status_value_id`),
  KEY `original_log_id` (`original_log_id`),
  KEY `new_log_id` (`new_log_id`),
  KEY `old_status_id` (`old_status_value_id`),
  CONSTRAINT `update_status_history_new_log_id_constraint` FOREIGN KEY (`new_log_id`) REFERENCES `log` (`log_id`),
  CONSTRAINT `update_status_history_original_log_id_constraint` FOREIGN KEY (`original_log_id`) REFERENCES `log` (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `update_status_value_history`
--

LOCK TABLES `update_status_value_history` WRITE;
/*!40000 ALTER TABLE `update_status_value_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `update_status_value_history` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-12 17:47:44
