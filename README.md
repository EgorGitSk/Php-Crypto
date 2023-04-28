# Php-Crypto

Tasks:

1.Registration and Login +

2.Allow users to change their data, name, surname and email +

3.Contact Form

4.Modify main page data +/-

5. Admin page +/-

6.Add +, Delete users+, change their data , add/delete data to prices table +

7.Modify,Add course sections, lessons



#Create Tables

#FAQ

CREATE TABLE `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext DEFAULT NULL,
  `text` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

#COURSES 

CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(45) DEFAULT NULL,
  `lesson` varchar(45) DEFAULT NULL,
  `text` longtext DEFAULT NULL,
  `link` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

#PRICELIST

CREATE TABLE `pricelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(45) DEFAULT NULL,
  `investing` varchar(1) DEFAULT NULL,
  `mining` varchar(1) DEFAULT NULL,
  `portfolio` varchar(1) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

#QUESTION

CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `sent_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `connection` (`user_id`),
  CONSTRAINT `connection` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

#Users

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
