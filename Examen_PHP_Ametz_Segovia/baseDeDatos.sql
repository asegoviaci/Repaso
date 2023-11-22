CREATE DATABASE exam;

use exam;

CREATE TABLE `statistics` (
  `id` int NOT NULL AUTO_INCREMENT,
  `game` varchar(100) DEFAULT NULL,
  `team_name` varchar(100) DEFAULT NULL,
  `team_members` int DEFAULT NULL,
  `score` double DEFAULT NULL,
  `won` tinyint(1) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;



INSERT INTO exam.statistics (game,team_name,team_members,score,won,`date`) VALUES
	 ('LoL','JingDong Gaming',4,123.6,1,'2023-09-20'),
	 ('WoW','JingDong Gaming',4,56.0,1,'2023-09-01'),
	 ('Valorant','JingDong Gaming',4,520.0,1,'2023-09-15'),
	 ('Fortnite','Bilibili Gaming',5,120.0,0,'2023-09-15'),
	 ('Minecraft','Bilibili Gaming',5,789.0,0,'2023-09-01'),
	 ('Minecraft','T1',3,550.0,1,'2023-09-15'),
	 ('Valorant','T1',3,234.0,1,'2023-04-14'),
	 ('Minecraft','T1',3,129.0,0,'2023-04-24'),
	 ('WoW','T1',3,25.0,0,'2023-01-23'),
	 ('LoL','Bilibili Gaming',5,5.0,0,'2023-04-14'),
	 ('LoL','GenG',5,456.0,1,'2023-10-1'),
	 ('Fortnite','GenG',5,120.0,1,'2023-03-03'),
	 ('Minecraft','JingDong Gaming',4,120.0,0,'2023-05-27'),
	 ('WoW','GenG',5,74.0,1,'2023-06-16'),
	 ('Valorant','GenG',5,23.0,1,'2023-07-09'),
	 ('Valorant','GenG',5,278.0,0,'2023-07-11');
	
	

	
	


