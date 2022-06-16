CREATE DATABASE IF NOT EXISTS `escuela`;

CREATE TABLE `course` (
  `courseId` int(10) NOT NULL AUTO_INCREMENT,
  `courseName` varchar(255) NOT NULL,
  PRIMARY KEY (`courseName`),
  UNIQUE KEY `courseId` (`courseId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` set('student','teacher','admin') NOT NULL DEFAULT 'student',
  `courseId` int(11) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  KEY `FK_users_course` (`courseId`),
  CONSTRAINT `FK_users_course` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

CREATE TABLE `list` (
  `listId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `listName` varchar(50) NOT NULL,
  PRIMARY KEY (`listId`),
  KEY `userId` (`userId`),
  CONSTRAINT `FK_users` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE `subject` (
  `subjectId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `courseId` int(11) NOT NULL,
  PRIMARY KEY (`subjectId`),
  KEY `FK_SubjectCourse` (`courseId`),
  CONSTRAINT `FK_SubjectCourse` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

CREATE TABLE `task` (
  `taskId` int(11) NOT NULL AUTO_INCREMENT,
  `listId` int(11) NOT NULL,
  `taskName` varchar(50) NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`taskId`),
  KEY `listId` (`listId`),
  KEY `userId` (`userId`),
  CONSTRAINT `FK_users_task` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tasks_task` FOREIGN KEY (`listId`) REFERENCES `list` (`listId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

