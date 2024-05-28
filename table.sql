CREATE TABLE `persons` (
 `PersonID` int(11) NOT NULL AUTO_INCREMENT,
 `FirstName` varchar(50) DEFAULT NULL,
 `LastName` varchar(50) DEFAULT NULL,
 `UserName` varchar(50) DEFAULT NULL,
 `PhoneNumber` varchar(11) DEFAULT NULL,
 `EMail` varchar(60) DEFAULT NULL,
 `UserPassword` varchar(60) DEFAULT NULL,
 PRIMARY KEY (`PersonID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci