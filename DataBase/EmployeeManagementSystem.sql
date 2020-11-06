/*
 Navicat Premium Data Transfer

 Source Server         : LocalWeb
 Source Server Type    : MySQL
 Source Server Version : 80019
 Source Host           : localhost:3306
 Source Schema         : EmployeeManagementSystem

 Target Server Type    : MySQL
 Target Server Version : 80019
 File Encoding         : 65001

 Date: 19/05/2020 20:05:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for Approved_Time_Sheet
-- ----------------------------
DROP TABLE IF EXISTS `Approved_Time_Sheet`;
CREATE TABLE `Approved_Time_Sheet` (
  `idApproved_Time_Sheet` int NOT NULL AUTO_INCREMENT,
  `States` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  `Time_Sheets_idTime_Sheet` int NOT NULL,
  `Employer_Users_idEmployer_Users` int NOT NULL,
  `comment` text,
  PRIMARY KEY (`idApproved_Time_Sheet`),
  KEY `fk_Approved_Time_Sheet_Time_Sheets1_idx` (`Time_Sheets_idTime_Sheet`),
  KEY `fk_Approved_Time_Sheet_Employer_Users1_idx` (`Employer_Users_idEmployer_Users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Attandences
-- ----------------------------
DROP TABLE IF EXISTS `Attandences`;
CREATE TABLE `Attandences` (
  `idAttandences` int NOT NULL AUTO_INCREMENT,
  `Date` varchar(45) DEFAULT NULL,
  `Start_Time` varchar(45) DEFAULT NULL,
  `End_Time` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  `Employee_Profiles_idEmployee_Profiles` int NOT NULL,
  `Sites_Shifts_idSites_Shifts` int NOT NULL,
  `comments` text,
  `img1` varchar(45) DEFAULT NULL,
  `img2` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAttandences`),
  KEY `fk_Attandences_Employee_Profiles1_idx` (`Employee_Profiles_idEmployee_Profiles`),
  KEY `fk_Attandences_Sites_Shifts1_idx` (`Sites_Shifts_idSites_Shifts`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Country
-- ----------------------------
DROP TABLE IF EXISTS `Country`;
CREATE TABLE `Country` (
  `idCountry` int NOT NULL AUTO_INCREMENT,
  `CName` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCountry`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Country
-- ----------------------------
BEGIN;
INSERT INTO `Country` VALUES (1, NULL, '2020-05-17 12:28:08', '2020-05-17 12:28:08');
INSERT INTO `Country` VALUES (2, NULL, '2020-05-17 12:28:08', '2020-05-17 12:28:08');
COMMIT;

-- ----------------------------
-- Table structure for Employee_Logins
-- ----------------------------
DROP TABLE IF EXISTS `Employee_Logins`;
CREATE TABLE `Employee_Logins` (
  `idEmployee_Logins` int NOT NULL AUTO_INCREMENT,
  `User_Name` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  `Employee_Profiles_idEmployee_Profiles` int NOT NULL,
  PRIMARY KEY (`idEmployee_Logins`),
  KEY `fk_Employee_Logins_Employee_Profiles1_idx` (`Employee_Profiles_idEmployee_Profiles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Employee_Profiles
-- ----------------------------
DROP TABLE IF EXISTS `Employee_Profiles`;
CREATE TABLE `Employee_Profiles` (
  `idEmployee_Profiles` int NOT NULL AUTO_INCREMENT,
  `EName` varchar(45) DEFAULT NULL,
  `DOB` varchar(45) DEFAULT NULL,
  `Gender` varchar(45) DEFAULT NULL,
  `TFN` varchar(45) DEFAULT NULL,
  `ABN` varchar(45) DEFAULT NULL,
  `Mobile` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `States` varchar(45) DEFAULT NULL,
  `Bank` varchar(45) DEFAULT NULL,
  `BankeName` varchar(45) DEFAULT NULL,
  `BSB` varchar(45) DEFAULT NULL,
  `AccountNumber` varchar(45) DEFAULT NULL,
  `Pay_Rate_Weekdays` varchar(45) DEFAULT NULL,
  `Pay_Rate_Sunday` varchar(45) DEFAULT NULL,
  `Pay_Rate_Saturday` varchar(45) DEFAULT NULL,
  `Employee_Holiday` varchar(45) DEFAULT NULL,
  `Profile_Pic` varchar(190) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  `Employer_Profiles_idEmployer_Profile` int(11) unsigned zerofill NOT NULL,
  PRIMARY KEY (`idEmployee_Profiles`),
  KEY `fk_Employee_Profiles_Employer_Profiles1_idx` (`Employer_Profiles_idEmployer_Profile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Employee_Profiles_has_Sites_Shifts
-- ----------------------------
DROP TABLE IF EXISTS `Employee_Profiles_has_Sites_Shifts`;
CREATE TABLE `Employee_Profiles_has_Sites_Shifts` (
  `Employee_Profiles_idEmployee_Profiles` int NOT NULL,
  `Sites_Shifts_idSites_Shifts` int NOT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  `Invoice_Type_idInvoice_Type` int NOT NULL,
  KEY `fk_Employee_Profiles_has_Sites_Shifts_Sites_Shifts1_idx` (`Sites_Shifts_idSites_Shifts`),
  KEY `fk_Employee_Profiles_has_Sites_Shifts_Employee_Profiles1_idx` (`Employee_Profiles_idEmployee_Profiles`),
  KEY `fk_Employee_Profiles_has_Sites_Shifts_Invoice_Type1_idx` (`Invoice_Type_idInvoice_Type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Employeer_BankCards
-- ----------------------------
DROP TABLE IF EXISTS `Employeer_BankCards`;
CREATE TABLE `Employeer_BankCards` (
  `idEmployeer_BankCards` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  `Bank` varchar(45) DEFAULT NULL,
  `Card_Name` varchar(45) DEFAULT NULL,
  `Card_Number` varchar(45) DEFAULT NULL,
  `Card_Exp_Date` varchar(45) DEFAULT NULL,
  `Card_CVV_Number` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEmployeer_BankCards`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Employer_Privileges
-- ----------------------------
DROP TABLE IF EXISTS `Employer_Privileges`;
CREATE TABLE `Employer_Privileges` (
  `idEmployer_Privileges` int NOT NULL AUTO_INCREMENT,
  `Attandences` varchar(45) DEFAULT NULL,
  `TimeSheet` varchar(45) DEFAULT NULL,
  `Payment` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEmployer_Privileges`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Employer_Profiles
-- ----------------------------
DROP TABLE IF EXISTS `Employer_Profiles`;
CREATE TABLE `Employer_Profiles` (
  `idEmployer_Profile` int NOT NULL AUTO_INCREMENT,
  `EName` varchar(45) DEFAULT NULL,
  `ABN` varchar(45) DEFAULT NULL,
  `ACN` varchar(45) DEFAULT NULL,
  `TFN` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Mobile` varchar(45) DEFAULT NULL,
  `Web` varchar(45) DEFAULT NULL,
  `WorkCoverNumber` varchar(45) DEFAULT NULL,
  `PublicLibilityNumber` varchar(45) DEFAULT NULL,
  `LaboureCoverNumber` varchar(45) DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  `States_idStates` int NOT NULL,
  PRIMARY KEY (`idEmployer_Profile`),
  KEY `fk_Employer_Profiles_States1_idx` (`States_idStates`),
  CONSTRAINT `fk_Employer_Profiles_States1` FOREIGN KEY (`States_idStates`) REFERENCES `States` (`idStates`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Employer_System_Payment
-- ----------------------------
DROP TABLE IF EXISTS `Employer_System_Payment`;
CREATE TABLE `Employer_System_Payment` (
  `idEmployer_System_Payment` int NOT NULL AUTO_INCREMENT,
  `Month` varchar(45) DEFAULT NULL,
  `Date` varchar(45) DEFAULT NULL,
  `States` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  `Employer_Profiles_idEmployer_Profile` int NOT NULL,
  PRIMARY KEY (`idEmployer_System_Payment`),
  KEY `fk_Employer_System_Payment_Employer_Profiles1_idx` (`Employer_Profiles_idEmployer_Profile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Employer_Users
-- ----------------------------
DROP TABLE IF EXISTS `Employer_Users`;
CREATE TABLE `Employer_Users` (
  `idEmployer_Users` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  `Mobile` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  `Employer_Profiles_idEmployer_Profile` int NOT NULL,
  `Employer_Users_Type_idEmployer_Users_Type` int NOT NULL,
  `Employer_Users_Status_idEmployer_Users_Status` int NOT NULL,
  `Employer_Users_Pivileges_idEmployer_Users_Pivileges` int NOT NULL,
  PRIMARY KEY (`idEmployer_Users`),
  KEY `fk_Employer_Users_Employer_Profiles_idx` (`Employer_Profiles_idEmployer_Profile`),
  KEY `fk_Employer_Users_Employer_Users_Type1_idx` (`Employer_Users_Type_idEmployer_Users_Type`),
  KEY `fk_Employer_Users_Employer_Users_Status1_idx` (`Employer_Users_Status_idEmployer_Users_Status`),
  KEY `fk_Employer_Users_Employer_Users_Pivileges1_idx` (`Employer_Users_Pivileges_idEmployer_Users_Pivileges`),
  CONSTRAINT `fk_Employer_Users_Employer_Profiles` FOREIGN KEY (`Employer_Profiles_idEmployer_Profile`) REFERENCES `Employer_Profiles` (`idEmployer_Profile`),
  CONSTRAINT `fk_Employer_Users_Employer_Users_Pivileges1` FOREIGN KEY (`Employer_Users_Pivileges_idEmployer_Users_Pivileges`) REFERENCES `Employer_Users_Pivileges` (`idEmployer_Users_Pivileges`),
  CONSTRAINT `fk_Employer_Users_Employer_Users_Status1` FOREIGN KEY (`Employer_Users_Status_idEmployer_Users_Status`) REFERENCES `Employer_Users_Status` (`idEmployer_Users_Status`),
  CONSTRAINT `fk_Employer_Users_Employer_Users_Type1` FOREIGN KEY (`Employer_Users_Type_idEmployer_Users_Type`) REFERENCES `Employer_Users_Type` (`idEmployer_Users_Type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Employer_Users_Logins
-- ----------------------------
DROP TABLE IF EXISTS `Employer_Users_Logins`;
CREATE TABLE `Employer_Users_Logins` (
  `idEmployer_Users_Logins` int NOT NULL AUTO_INCREMENT,
  `User_Name` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Employer_Users_idEmployer_Users` int NOT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEmployer_Users_Logins`),
  KEY `fk_Employer_Users_Logins_Employer_Users1_idx` (`Employer_Users_idEmployer_Users`),
  CONSTRAINT `fk_Employer_Users_Logins_Employer_Users1` FOREIGN KEY (`Employer_Users_idEmployer_Users`) REFERENCES `Employer_Users` (`idEmployer_Users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Employer_Users_Pivileges
-- ----------------------------
DROP TABLE IF EXISTS `Employer_Users_Pivileges`;
CREATE TABLE `Employer_Users_Pivileges` (
  `idEmployer_Users_Pivileges` int NOT NULL AUTO_INCREMENT,
  `Employer_Profile` varchar(45) DEFAULT NULL,
  `Employee_Profile` varchar(45) DEFAULT NULL,
  `Attandences_Profile` varchar(45) DEFAULT NULL,
  `Payment_Profile` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEmployer_Users_Pivileges`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Employer_Users_Status
-- ----------------------------
DROP TABLE IF EXISTS `Employer_Users_Status`;
CREATE TABLE `Employer_Users_Status` (
  `idEmployer_Users_Status` int NOT NULL AUTO_INCREMENT,
  `Status` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEmployer_Users_Status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Employer_Users_Type
-- ----------------------------
DROP TABLE IF EXISTS `Employer_Users_Type`;
CREATE TABLE `Employer_Users_Type` (
  `idEmployer_Users_Type` int NOT NULL AUTO_INCREMENT,
  `Type` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEmployer_Users_Type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Invoice
-- ----------------------------
DROP TABLE IF EXISTS `Invoice`;
CREATE TABLE `Invoice` (
  `idInvoice` int NOT NULL AUTO_INCREMENT,
  `Date` varchar(45) DEFAULT NULL,
  `Tot_WEnd_Pay` varchar(45) DEFAULT NULL,
  `Tot_WDay_Pay` varchar(45) DEFAULT NULL,
  `Allowances` varchar(45) DEFAULT NULL,
  `Tax_Didct` varchar(45) DEFAULT NULL,
  `Super_Didct` varchar(45) DEFAULT NULL,
  `Other_Didct` varchar(45) DEFAULT NULL,
  `Sub_Total` varchar(45) DEFAULT NULL,
  `States` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  `Approved_Time_Sheet_idApproved_Time_Sheet` int NOT NULL,
  `Employer_Users_idEmployer_Users` int NOT NULL,
  `comment` text,
  PRIMARY KEY (`idInvoice`),
  KEY `fk_Invoice_Approved_Time_Sheet1_idx` (`Approved_Time_Sheet_idApproved_Time_Sheet`),
  KEY `fk_Invoice_Employer_Users1_idx` (`Employer_Users_idEmployer_Users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Invoice_Type
-- ----------------------------
DROP TABLE IF EXISTS `Invoice_Type`;
CREATE TABLE `Invoice_Type` (
  `idInvoice_Type` int NOT NULL AUTO_INCREMENT,
  `Type` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `creaet_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idInvoice_Type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Pay_Period
-- ----------------------------
DROP TABLE IF EXISTS `Pay_Period`;
CREATE TABLE `Pay_Period` (
  `idPay_Period` int NOT NULL AUTO_INCREMENT,
  `Start_date` varchar(45) DEFAULT NULL,
  `End_Date` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  `Employer_Profiles_idEmployer_Profile` int NOT NULL,
  PRIMARY KEY (`idPay_Period`),
  KEY `fk_Pay_Period_Employer_Profiles1_idx` (`Employer_Profiles_idEmployer_Profile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Payment
-- ----------------------------
DROP TABLE IF EXISTS `Payment`;
CREATE TABLE `Payment` (
  `idPayment` int NOT NULL AUTO_INCREMENT,
  `Total_Diposit` varchar(45) DEFAULT NULL,
  `States` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  `Payment_Type_idPayment_Type` int NOT NULL,
  `Invoice_idInvoice` int NOT NULL,
  `Employer_Users_idEmployer_Users` int NOT NULL,
  PRIMARY KEY (`idPayment`),
  KEY `fk_Payment_Payment_Type1_idx` (`Payment_Type_idPayment_Type`),
  KEY `fk_Payment_Invoice1_idx` (`Invoice_idInvoice`),
  KEY `fk_Payment_Employer_Users1_idx` (`Employer_Users_idEmployer_Users`),
  CONSTRAINT `fk_Payment_Payment_Type1` FOREIGN KEY (`Payment_Type_idPayment_Type`) REFERENCES `Payment_Type` (`idPayment_Type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Payment_Type
-- ----------------------------
DROP TABLE IF EXISTS `Payment_Type`;
CREATE TABLE `Payment_Type` (
  `idPayment_Type` int NOT NULL AUTO_INCREMENT,
  `Type` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPayment_Type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Sites
-- ----------------------------
DROP TABLE IF EXISTS `Sites`;
CREATE TABLE `Sites` (
  `idSites` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  `Location` varchar(45) DEFAULT NULL,
  `GeoTag` varchar(45) DEFAULT NULL,
  `GeoTag2` varchar(45) DEFAULT NULL,
  `Range` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  `Employer_Profiles_idEmployer_Profile` int NOT NULL,
  PRIMARY KEY (`idSites`),
  KEY `fk_Sites_Employer_Profiles1_idx` (`Employer_Profiles_idEmployer_Profile`),
  CONSTRAINT `fk_Sites_Employer_Profiles1` FOREIGN KEY (`Employer_Profiles_idEmployer_Profile`) REFERENCES `Employer_Profiles` (`idEmployer_Profile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Sites_Ftat_Hours
-- ----------------------------
DROP TABLE IF EXISTS `Sites_Ftat_Hours`;
CREATE TABLE `Sites_Ftat_Hours` (
  `idSites_Ftat_Hours` int NOT NULL AUTO_INCREMENT,
  `hours` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  `Sites_Shifts_idSites_Shifts` int NOT NULL,
  PRIMARY KEY (`idSites_Ftat_Hours`),
  KEY `fk_Sites_Ftat_Hours_Sites_Shifts1_idx` (`Sites_Shifts_idSites_Shifts`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Sites_Hours_Type
-- ----------------------------
DROP TABLE IF EXISTS `Sites_Hours_Type`;
CREATE TABLE `Sites_Hours_Type` (
  `idSites_Hours_Type` int NOT NULL AUTO_INCREMENT,
  `Type` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idSites_Hours_Type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Sites_Shifts
-- ----------------------------
DROP TABLE IF EXISTS `Sites_Shifts`;
CREATE TABLE `Sites_Shifts` (
  `idSites_Shifts` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  `Sites_Hours_Type_idSites_Hours_Type` int NOT NULL,
  `Sites_idSites` int NOT NULL,
  PRIMARY KEY (`idSites_Shifts`),
  KEY `fk_Sites_Shifts_Sites_Hours_Type1_idx` (`Sites_Hours_Type_idSites_Hours_Type`),
  KEY `fk_Sites_Shifts_Sites1_idx` (`Sites_idSites`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for States
-- ----------------------------
DROP TABLE IF EXISTS `States`;
CREATE TABLE `States` (
  `idStates` int NOT NULL AUTO_INCREMENT,
  `SName` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `Country_idCountry` int NOT NULL,
  PRIMARY KEY (`idStates`),
  KEY `fk_States_Country1_idx` (`Country_idCountry`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of States
-- ----------------------------
BEGIN;
INSERT INTO `States` VALUES (1, NULL, '2020-05-17 11:40:56', '2020-05-17 11:40:56', 1);
INSERT INTO `States` VALUES (2, NULL, '2020-05-17 11:40:56', '2020-05-17 11:40:56', 1);
INSERT INTO `States` VALUES (3, NULL, '2020-05-17 11:40:56', '2020-05-17 11:40:56', 1);
INSERT INTO `States` VALUES (4, NULL, '2020-05-17 11:40:56', '2020-05-17 11:40:56', 1);
INSERT INTO `States` VALUES (5, NULL, '2020-05-17 11:40:56', '2020-05-17 11:40:56', 1);
INSERT INTO `States` VALUES (6, NULL, '2020-05-17 11:40:56', '2020-05-17 11:40:56', 1);
INSERT INTO `States` VALUES (7, NULL, '2020-05-17 11:40:56', '2020-05-17 11:40:56', 1);
INSERT INTO `States` VALUES (8, NULL, '2020-05-17 11:40:56', '2020-05-17 11:40:56', 1);
COMMIT;

-- ----------------------------
-- Table structure for Time_Sheets
-- ----------------------------
DROP TABLE IF EXISTS `Time_Sheets`;
CREATE TABLE `Time_Sheets` (
  `idTime_Sheet` int NOT NULL AUTO_INCREMENT,
  `Date` varchar(45) DEFAULT NULL,
  `Tot_Sunt_Hr` varchar(45) DEFAULT NULL,
  `Tot_Sat_Hr` varchar(45) DEFAULT NULL,
  `Tot_PHol_Hr` varchar(45) DEFAULT NULL,
  `Tot_WDay_Hr` varchar(45) DEFAULT NULL,
  `states` varchar(45) DEFAULT NULL,
  `Employee_Profiles_idEmployee_Profiles` int NOT NULL,
  `Sites_Shifts_idSites_Shifts` int NOT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  `Pay_Period_idPay_Period` int NOT NULL,
  `comment` text,
  PRIMARY KEY (`idTime_Sheet`),
  KEY `fk_Time_Sheets_Employee_Profiles1_idx` (`Employee_Profiles_idEmployee_Profiles`),
  KEY `fk_Time_Sheets_Sites_Shifts1_idx` (`Sites_Shifts_idSites_Shifts`),
  KEY `fk_Time_Sheets_Pay_Period1_idx` (`Pay_Period_idPay_Period`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
