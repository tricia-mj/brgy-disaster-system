-- brgy_disaster_system_mysql.sql
-- MySQL-compatible schema and sample data for Barangay Disaster Information & Response System
-- Created for XAMPP / MariaDB / MySQL import
-- Usage:
--   1) Save and import via phpMyAdmin OR:
--      mysql -u root -p < brgy_disaster_system_mysql.sql
--   2) Or create DB first then import:
--      mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS brgy_disaster_system CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
--      mysql -u root -p brgy_disaster_system < brgy_disaster_system_mysql.sql

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS `brgy_disaster_system` 
  DEFAULT CHARACTER SET utf8mb4 
  DEFAULT COLLATE utf8mb4_unicode_ci;
USE `brgy_disaster_system`;

DROP TABLE IF EXISTS `alerts`;
DROP TABLE IF EXISTS `map_markers`;
DROP TABLE IF EXISTS `requests`;
DROP TABLE IF EXISTS `incidents`;

-- Table for Barangay Alerts
CREATE TABLE `alerts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `message` TEXT NOT NULL,
  `posted_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table for Community Map Markers
CREATE TABLE `map_markers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `type` ENUM('evacuation','blocked','danger') NOT NULL DEFAULT 'danger',
  `lat` DECIMAL(10,7) NOT NULL,
  `lng` DECIMAL(10,7) NOT NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table for Emergency Assistance Requests
CREATE TABLE `requests` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `contact` VARCHAR(50) NOT NULL,
  `request_type` ENUM('rescue','food','first_aid') NOT NULL DEFAULT 'food',
  `urgency` ENUM('low','medium','high') NOT NULL DEFAULT 'low',
  `details` TEXT,
  `submitted_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX (`urgency`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table for Incident Archive
CREATE TABLE `incidents` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `disaster_type` VARCHAR(100) NOT NULL,
  `affected_people` INT DEFAULT 0,
  `response_time` VARCHAR(50),
  `actions_taken` TEXT,
  `logged_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS=1;

-- Sample data for alerts
INSERT INTO `alerts` (`message`) VALUES
('Flood warning in Zone 2'),
('Evacuation center open at Barangay Hall');

-- Sample data for map markers
INSERT INTO `map_markers` (`name`, `type`, `lat`, `lng`) VALUES
('Barangay Hall', 'evacuation', 14.5995000, 120.9842000),
('Main Road - Fallen Tree', 'blocked', 14.6010000, 120.9850000);

-- Sample data for requests
INSERT INTO `requests` (`name`, `contact`, `request_type`, `urgency`, `details`) VALUES
('Juan Dela Cruz', '09171234567', 'rescue', 'high', 'Trapped on 2nd floor, Zone 3'),
('Maria Santos', '09181234567', 'food', 'medium', 'Need food packs at Zone 5');

-- Sample data for incidents
INSERT INTO `incidents` (`disaster_type`, `affected_people`, `response_time`, `actions_taken`) VALUES
('Flood', 120, '2 hours', 'Rescue teams deployed, relief goods distributed');

-- End of file
