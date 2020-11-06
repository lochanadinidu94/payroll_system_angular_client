-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema EmployeeManagementSystem
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema EmployeeManagementSystem
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `EmployeeManagementSystem` DEFAULT CHARACTER SET utf8 ;
USE `EmployeeManagementSystem` ;

-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Employeer_BankCards`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Employeer_BankCards` (
  `idEmployeer_BankCards` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NULL,
  `Bank` VARCHAR(45) NULL,
  `Card_Name` VARCHAR(45) NULL,
  `Card_Number` VARCHAR(45) NULL,
  `Card_Exp_Date` VARCHAR(45) NULL,
  `Card_CVV_Number` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  PRIMARY KEY (`idEmployeer_BankCards`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Employer_Privileges`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Employer_Privileges` (
  `idEmployer_Privileges` INT NOT NULL AUTO_INCREMENT,
  `Attandences` VARCHAR(45) NULL,
  `TimeSheet` VARCHAR(45) NULL,
  `Payment` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  PRIMARY KEY (`idEmployer_Privileges`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Country`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Country` (
  `idCountry` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  PRIMARY KEY (`idCountry`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`States`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`States` (
  `idStates` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `Country_idCountry` INT NOT NULL,
  PRIMARY KEY (`idStates`),
  INDEX `fk_States_Country1_idx` (`Country_idCountry` ASC) VISIBLE,
  CONSTRAINT `fk_States_Country1`
    FOREIGN KEY (`Country_idCountry`)
    REFERENCES `EmployeeManagementSystem`.`Country` (`idCountry`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Employer_Profiles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Employer_Profiles` (
  `idEmployer_Profile` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NULL,
  `ABN` VARCHAR(45) NULL,
  `ACN` VARCHAR(45) NULL,
  `TFN` VARCHAR(45) NULL,
  `Email` VARCHAR(45) NULL,
  `Mobile` VARCHAR(45) NULL,
  `Web` VARCHAR(45) NULL,
  `WorkCoverNumber` VARCHAR(45) NULL,
  `PublicLibilityNumber` VARCHAR(45) NULL,
  `LaboureCoverNumber` VARCHAR(45) NULL,
  `Status` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  `Employeer_BankCards_idEmployeer_BankCards` INT NOT NULL,
  `Employer_Privileges_idEmployer_Privileges` INT NOT NULL,
  `States_idStates` INT NOT NULL,
  PRIMARY KEY (`idEmployer_Profile`),
  INDEX `fk_Employer_Profiles_Employeer_BankCards1_idx` (`Employeer_BankCards_idEmployeer_BankCards` ASC) VISIBLE,
  INDEX `fk_Employer_Profiles_Employer_Privileges1_idx` (`Employer_Privileges_idEmployer_Privileges` ASC) VISIBLE,
  INDEX `fk_Employer_Profiles_States1_idx` (`States_idStates` ASC) VISIBLE,
  CONSTRAINT `fk_Employer_Profiles_Employeer_BankCards1`
    FOREIGN KEY (`Employeer_BankCards_idEmployeer_BankCards`)
    REFERENCES `EmployeeManagementSystem`.`Employeer_BankCards` (`idEmployeer_BankCards`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Employer_Profiles_Employer_Privileges1`
    FOREIGN KEY (`Employer_Privileges_idEmployer_Privileges`)
    REFERENCES `EmployeeManagementSystem`.`Employer_Privileges` (`idEmployer_Privileges`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Employer_Profiles_States1`
    FOREIGN KEY (`States_idStates`)
    REFERENCES `EmployeeManagementSystem`.`States` (`idStates`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Employer_Users_Type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Employer_Users_Type` (
  `idEmployer_Users_Type` INT NOT NULL AUTO_INCREMENT,
  `Type` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  PRIMARY KEY (`idEmployer_Users_Type`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Employer_Users_Status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Employer_Users_Status` (
  `idEmployer_Users_Status` INT NOT NULL AUTO_INCREMENT,
  `Status` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  PRIMARY KEY (`idEmployer_Users_Status`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Employer_Users_Pivileges`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Employer_Users_Pivileges` (
  `idEmployer_Users_Pivileges` INT NOT NULL AUTO_INCREMENT,
  `Employer_Profile` VARCHAR(45) NULL,
  `Employee_Profile` VARCHAR(45) NULL,
  `Attandences_Profile` VARCHAR(45) NULL,
  `Payment_Profile` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  PRIMARY KEY (`idEmployer_Users_Pivileges`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Employer_Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Employer_Users` (
  `idEmployer_Users` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NULL,
  `Mobile` VARCHAR(45) NULL,
  `Email` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  `Employer_Profiles_idEmployer_Profile` INT NOT NULL,
  `Employer_Users_Type_idEmployer_Users_Type` INT NOT NULL,
  `Employer_Users_Status_idEmployer_Users_Status` INT NOT NULL,
  `Employer_Users_Pivileges_idEmployer_Users_Pivileges` INT NOT NULL,
  PRIMARY KEY (`idEmployer_Users`),
  INDEX `fk_Employer_Users_Employer_Profiles_idx` (`Employer_Profiles_idEmployer_Profile` ASC) VISIBLE,
  INDEX `fk_Employer_Users_Employer_Users_Type1_idx` (`Employer_Users_Type_idEmployer_Users_Type` ASC) VISIBLE,
  INDEX `fk_Employer_Users_Employer_Users_Status1_idx` (`Employer_Users_Status_idEmployer_Users_Status` ASC) VISIBLE,
  INDEX `fk_Employer_Users_Employer_Users_Pivileges1_idx` (`Employer_Users_Pivileges_idEmployer_Users_Pivileges` ASC) VISIBLE,
  CONSTRAINT `fk_Employer_Users_Employer_Profiles`
    FOREIGN KEY (`Employer_Profiles_idEmployer_Profile`)
    REFERENCES `EmployeeManagementSystem`.`Employer_Profiles` (`idEmployer_Profile`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Employer_Users_Employer_Users_Type1`
    FOREIGN KEY (`Employer_Users_Type_idEmployer_Users_Type`)
    REFERENCES `EmployeeManagementSystem`.`Employer_Users_Type` (`idEmployer_Users_Type`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Employer_Users_Employer_Users_Status1`
    FOREIGN KEY (`Employer_Users_Status_idEmployer_Users_Status`)
    REFERENCES `EmployeeManagementSystem`.`Employer_Users_Status` (`idEmployer_Users_Status`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Employer_Users_Employer_Users_Pivileges1`
    FOREIGN KEY (`Employer_Users_Pivileges_idEmployer_Users_Pivileges`)
    REFERENCES `EmployeeManagementSystem`.`Employer_Users_Pivileges` (`idEmployer_Users_Pivileges`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Employer_Users_Logins`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Employer_Users_Logins` (
  `idEmployer_Users_Logins` INT NOT NULL AUTO_INCREMENT,
  `User_Name` VARCHAR(45) NULL,
  `Password` VARCHAR(45) NULL,
  `Employer_Users_idEmployer_Users` INT NOT NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  PRIMARY KEY (`idEmployer_Users_Logins`),
  INDEX `fk_Employer_Users_Logins_Employer_Users1_idx` (`Employer_Users_idEmployer_Users` ASC) VISIBLE,
  CONSTRAINT `fk_Employer_Users_Logins_Employer_Users1`
    FOREIGN KEY (`Employer_Users_idEmployer_Users`)
    REFERENCES `EmployeeManagementSystem`.`Employer_Users` (`idEmployer_Users`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Sites`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Sites` (
  `idSites` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NULL,
  `Location` VARCHAR(45) NULL,
  `GeoTag` VARCHAR(45) NULL,
  `GeoTag2` VARCHAR(45) NULL,
  `Range` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  `Employer_Profiles_idEmployer_Profile` INT NOT NULL,
  PRIMARY KEY (`idSites`),
  INDEX `fk_Sites_Employer_Profiles1_idx` (`Employer_Profiles_idEmployer_Profile` ASC) VISIBLE,
  CONSTRAINT `fk_Sites_Employer_Profiles1`
    FOREIGN KEY (`Employer_Profiles_idEmployer_Profile`)
    REFERENCES `EmployeeManagementSystem`.`Employer_Profiles` (`idEmployer_Profile`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Employee_Profiles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Employee_Profiles` (
  `idEmployee_Profiles` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NULL,
  `DOB` VARCHAR(45) NULL,
  `Gender` VARCHAR(45) NULL,
  `TFN` VARCHAR(45) NULL,
  `ABN` VARCHAR(45) NULL,
  `Mobile` VARCHAR(45) NULL,
  `Email` VARCHAR(45) NULL,
  `Address` VARCHAR(45) NULL,
  `States` VARCHAR(45) NULL,
  `Bank` VARCHAR(45) NULL,
  `BankeName` VARCHAR(45) NULL,
  `BSB` VARCHAR(45) NULL,
  `AccountNumber` VARCHAR(45) NULL,
  `Pay_Rate_Weekdays` VARCHAR(45) NULL,
  `Pay_Rate_Sunday` VARCHAR(45) NULL,
  `Pay_Rate_Saturday` VARCHAR(45) NULL,
  `Employee_Holiday` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  `Employer_Profiles_idEmployer_Profile` INT ZEROFILL NOT NULL,
  PRIMARY KEY (`idEmployee_Profiles`),
  INDEX `fk_Employee_Profiles_Employer_Profiles1_idx` (`Employer_Profiles_idEmployer_Profile` ASC) VISIBLE,
  CONSTRAINT `fk_Employee_Profiles_Employer_Profiles1`
    FOREIGN KEY (`Employer_Profiles_idEmployer_Profile`)
    REFERENCES `EmployeeManagementSystem`.`Employer_Profiles` (`idEmployer_Profile`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Employee_Logins`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Employee_Logins` (
  `idEmployee_Logins` INT NOT NULL AUTO_INCREMENT,
  `User_Name` VARCHAR(45) NULL,
  `Password` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  `Employee_Profiles_idEmployee_Profiles` INT NOT NULL,
  PRIMARY KEY (`idEmployee_Logins`),
  INDEX `fk_Employee_Logins_Employee_Profiles1_idx` (`Employee_Profiles_idEmployee_Profiles` ASC) VISIBLE,
  CONSTRAINT `fk_Employee_Logins_Employee_Profiles1`
    FOREIGN KEY (`Employee_Profiles_idEmployee_Profiles`)
    REFERENCES `EmployeeManagementSystem`.`Employee_Profiles` (`idEmployee_Profiles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Sites_Hours_Type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Sites_Hours_Type` (
  `idSites_Hours_Type` INT NOT NULL AUTO_INCREMENT,
  `Type` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  PRIMARY KEY (`idSites_Hours_Type`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Sites_Shifts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Sites_Shifts` (
  `idSites_Shifts` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  `Sites_Hours_Type_idSites_Hours_Type` INT NOT NULL,
  `Sites_idSites` INT NOT NULL,
  PRIMARY KEY (`idSites_Shifts`),
  INDEX `fk_Sites_Shifts_Sites_Hours_Type1_idx` (`Sites_Hours_Type_idSites_Hours_Type` ASC) VISIBLE,
  INDEX `fk_Sites_Shifts_Sites1_idx` (`Sites_idSites` ASC) VISIBLE,
  CONSTRAINT `fk_Sites_Shifts_Sites_Hours_Type1`
    FOREIGN KEY (`Sites_Hours_Type_idSites_Hours_Type`)
    REFERENCES `EmployeeManagementSystem`.`Sites_Hours_Type` (`idSites_Hours_Type`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Sites_Shifts_Sites1`
    FOREIGN KEY (`Sites_idSites`)
    REFERENCES `EmployeeManagementSystem`.`Sites` (`idSites`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Attandences`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Attandences` (
  `idAttandences` INT NOT NULL AUTO_INCREMENT,
  `Date` VARCHAR(45) NULL,
  `Start_Time` VARCHAR(45) NULL,
  `End_Time` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  `Employee_Profiles_idEmployee_Profiles` INT NOT NULL,
  `Sites_Shifts_idSites_Shifts` INT NOT NULL,
  `comments` TEXT NULL,
  `img1` VARCHAR(45) NULL,
  `img2` VARCHAR(45) NULL,
  PRIMARY KEY (`idAttandences`),
  INDEX `fk_Attandences_Employee_Profiles1_idx` (`Employee_Profiles_idEmployee_Profiles` ASC) VISIBLE,
  INDEX `fk_Attandences_Sites_Shifts1_idx` (`Sites_Shifts_idSites_Shifts` ASC) VISIBLE,
  CONSTRAINT `fk_Attandences_Employee_Profiles1`
    FOREIGN KEY (`Employee_Profiles_idEmployee_Profiles`)
    REFERENCES `EmployeeManagementSystem`.`Employee_Profiles` (`idEmployee_Profiles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Attandences_Sites_Shifts1`
    FOREIGN KEY (`Sites_Shifts_idSites_Shifts`)
    REFERENCES `EmployeeManagementSystem`.`Sites_Shifts` (`idSites_Shifts`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Pay_Period`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Pay_Period` (
  `idPay_Period` INT NOT NULL AUTO_INCREMENT,
  `Start_date` VARCHAR(45) NULL,
  `End_Date` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  `Employer_Profiles_idEmployer_Profile` INT NOT NULL,
  PRIMARY KEY (`idPay_Period`),
  INDEX `fk_Pay_Period_Employer_Profiles1_idx` (`Employer_Profiles_idEmployer_Profile` ASC) VISIBLE,
  CONSTRAINT `fk_Pay_Period_Employer_Profiles1`
    FOREIGN KEY (`Employer_Profiles_idEmployer_Profile`)
    REFERENCES `EmployeeManagementSystem`.`Employer_Profiles` (`idEmployer_Profile`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Time_Sheets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Time_Sheets` (
  `idTime_Sheet` INT NOT NULL AUTO_INCREMENT,
  `Date` VARCHAR(45) NULL,
  `Tot_Sunt_Hr` VARCHAR(45) NULL,
  `Tot_Sat_Hr` VARCHAR(45) NULL,
  `Tot_PHol_Hr` VARCHAR(45) NULL,
  `Tot_WDay_Hr` VARCHAR(45) NULL,
  `states` VARCHAR(45) NULL,
  `Employee_Profiles_idEmployee_Profiles` INT NOT NULL,
  `Sites_Shifts_idSites_Shifts` INT NOT NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  `Pay_Period_idPay_Period` INT NOT NULL,
  `comment` TEXT NULL,
  PRIMARY KEY (`idTime_Sheet`),
  INDEX `fk_Time_Sheets_Employee_Profiles1_idx` (`Employee_Profiles_idEmployee_Profiles` ASC) VISIBLE,
  INDEX `fk_Time_Sheets_Sites_Shifts1_idx` (`Sites_Shifts_idSites_Shifts` ASC) VISIBLE,
  INDEX `fk_Time_Sheets_Pay_Period1_idx` (`Pay_Period_idPay_Period` ASC) VISIBLE,
  CONSTRAINT `fk_Time_Sheets_Employee_Profiles1`
    FOREIGN KEY (`Employee_Profiles_idEmployee_Profiles`)
    REFERENCES `EmployeeManagementSystem`.`Employee_Profiles` (`idEmployee_Profiles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Time_Sheets_Sites_Shifts1`
    FOREIGN KEY (`Sites_Shifts_idSites_Shifts`)
    REFERENCES `EmployeeManagementSystem`.`Sites_Shifts` (`idSites_Shifts`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Time_Sheets_Pay_Period1`
    FOREIGN KEY (`Pay_Period_idPay_Period`)
    REFERENCES `EmployeeManagementSystem`.`Pay_Period` (`idPay_Period`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Approved_Time_Sheet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Approved_Time_Sheet` (
  `idApproved_Time_Sheet` INT NOT NULL AUTO_INCREMENT,
  `States` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  `Time_Sheets_idTime_Sheet` INT NOT NULL,
  `Employer_Users_idEmployer_Users` INT NOT NULL,
  `comment` TEXT NULL,
  PRIMARY KEY (`idApproved_Time_Sheet`),
  INDEX `fk_Approved_Time_Sheet_Time_Sheets1_idx` (`Time_Sheets_idTime_Sheet` ASC) VISIBLE,
  INDEX `fk_Approved_Time_Sheet_Employer_Users1_idx` (`Employer_Users_idEmployer_Users` ASC) VISIBLE,
  CONSTRAINT `fk_Approved_Time_Sheet_Time_Sheets1`
    FOREIGN KEY (`Time_Sheets_idTime_Sheet`)
    REFERENCES `EmployeeManagementSystem`.`Time_Sheets` (`idTime_Sheet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Approved_Time_Sheet_Employer_Users1`
    FOREIGN KEY (`Employer_Users_idEmployer_Users`)
    REFERENCES `EmployeeManagementSystem`.`Employer_Users` (`idEmployer_Users`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Invoice`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Invoice` (
  `idInvoice` INT NOT NULL AUTO_INCREMENT,
  `Date` VARCHAR(45) NULL,
  `Tot_WEnd_Pay` VARCHAR(45) NULL,
  `Tot_WDay_Pay` VARCHAR(45) NULL,
  `Allowances` VARCHAR(45) NULL,
  `Tax_Didct` VARCHAR(45) NULL,
  `Super_Didct` VARCHAR(45) NULL,
  `Other_Didct` VARCHAR(45) NULL,
  `Sub_Total` VARCHAR(45) NULL,
  `States` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  `Approved_Time_Sheet_idApproved_Time_Sheet` INT NOT NULL,
  `Employer_Users_idEmployer_Users` INT NOT NULL,
  `comment` TEXT NULL,
  PRIMARY KEY (`idInvoice`),
  INDEX `fk_Invoice_Approved_Time_Sheet1_idx` (`Approved_Time_Sheet_idApproved_Time_Sheet` ASC) VISIBLE,
  INDEX `fk_Invoice_Employer_Users1_idx` (`Employer_Users_idEmployer_Users` ASC) VISIBLE,
  CONSTRAINT `fk_Invoice_Approved_Time_Sheet1`
    FOREIGN KEY (`Approved_Time_Sheet_idApproved_Time_Sheet`)
    REFERENCES `EmployeeManagementSystem`.`Approved_Time_Sheet` (`idApproved_Time_Sheet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Invoice_Employer_Users1`
    FOREIGN KEY (`Employer_Users_idEmployer_Users`)
    REFERENCES `EmployeeManagementSystem`.`Employer_Users` (`idEmployer_Users`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Sites_Ftat_Hours`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Sites_Ftat_Hours` (
  `idSites_Ftat_Hours` INT NOT NULL AUTO_INCREMENT,
  `hours` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  `Sites_Shifts_idSites_Shifts` INT NOT NULL,
  PRIMARY KEY (`idSites_Ftat_Hours`),
  INDEX `fk_Sites_Ftat_Hours_Sites_Shifts1_idx` (`Sites_Shifts_idSites_Shifts` ASC) VISIBLE,
  CONSTRAINT `fk_Sites_Ftat_Hours_Sites_Shifts1`
    FOREIGN KEY (`Sites_Shifts_idSites_Shifts`)
    REFERENCES `EmployeeManagementSystem`.`Sites_Shifts` (`idSites_Shifts`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Invoice_Type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Invoice_Type` (
  `idInvoice_Type` INT NOT NULL AUTO_INCREMENT,
  `Type` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `creaet_at` VARCHAR(45) NULL,
  PRIMARY KEY (`idInvoice_Type`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Employee_Profiles_has_Sites_Shifts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Employee_Profiles_has_Sites_Shifts` (
  `Employee_Profiles_idEmployee_Profiles` INT NOT NULL,
  `Sites_Shifts_idSites_Shifts` INT NOT NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  `Invoice_Type_idInvoice_Type` INT NOT NULL,
  INDEX `fk_Employee_Profiles_has_Sites_Shifts_Sites_Shifts1_idx` (`Sites_Shifts_idSites_Shifts` ASC) VISIBLE,
  INDEX `fk_Employee_Profiles_has_Sites_Shifts_Employee_Profiles1_idx` (`Employee_Profiles_idEmployee_Profiles` ASC) VISIBLE,
  INDEX `fk_Employee_Profiles_has_Sites_Shifts_Invoice_Type1_idx` (`Invoice_Type_idInvoice_Type` ASC) VISIBLE,
  CONSTRAINT `fk_Employee_Profiles_has_Sites_Shifts_Employee_Profiles1`
    FOREIGN KEY (`Employee_Profiles_idEmployee_Profiles`)
    REFERENCES `EmployeeManagementSystem`.`Employee_Profiles` (`idEmployee_Profiles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Employee_Profiles_has_Sites_Shifts_Sites_Shifts1`
    FOREIGN KEY (`Sites_Shifts_idSites_Shifts`)
    REFERENCES `EmployeeManagementSystem`.`Sites_Shifts` (`idSites_Shifts`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Employee_Profiles_has_Sites_Shifts_Invoice_Type1`
    FOREIGN KEY (`Invoice_Type_idInvoice_Type`)
    REFERENCES `EmployeeManagementSystem`.`Invoice_Type` (`idInvoice_Type`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Payment_Type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Payment_Type` (
  `idPayment_Type` INT NOT NULL AUTO_INCREMENT,
  `Type` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  PRIMARY KEY (`idPayment_Type`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Payment` (
  `idPayment` INT NOT NULL AUTO_INCREMENT,
  `Total_Diposit` VARCHAR(45) NULL,
  `States` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  `Payment_Type_idPayment_Type` INT NOT NULL,
  `Invoice_idInvoice` INT NOT NULL,
  `Employer_Users_idEmployer_Users` INT NOT NULL,
  PRIMARY KEY (`idPayment`),
  INDEX `fk_Payment_Payment_Type1_idx` (`Payment_Type_idPayment_Type` ASC) VISIBLE,
  INDEX `fk_Payment_Invoice1_idx` (`Invoice_idInvoice` ASC) VISIBLE,
  INDEX `fk_Payment_Employer_Users1_idx` (`Employer_Users_idEmployer_Users` ASC) VISIBLE,
  CONSTRAINT `fk_Payment_Payment_Type1`
    FOREIGN KEY (`Payment_Type_idPayment_Type`)
    REFERENCES `EmployeeManagementSystem`.`Payment_Type` (`idPayment_Type`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Payment_Invoice1`
    FOREIGN KEY (`Invoice_idInvoice`)
    REFERENCES `EmployeeManagementSystem`.`Invoice` (`idInvoice`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Payment_Employer_Users1`
    FOREIGN KEY (`Employer_Users_idEmployer_Users`)
    REFERENCES `EmployeeManagementSystem`.`Employer_Users` (`idEmployer_Users`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Employer_System_Payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Employer_System_Payment` (
  `idEmployer_System_Payment` INT NOT NULL AUTO_INCREMENT,
  `Month` VARCHAR(45) NULL,
  `Date` VARCHAR(45) NULL,
  `States` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  `Employer_Profiles_idEmployer_Profile` INT NOT NULL,
  PRIMARY KEY (`idEmployer_System_Payment`),
  INDEX `fk_Employer_System_Payment_Employer_Profiles1_idx` (`Employer_Profiles_idEmployer_Profile` ASC) VISIBLE,
  CONSTRAINT `fk_Employer_System_Payment_Employer_Profiles1`
    FOREIGN KEY (`Employer_Profiles_idEmployer_Profile`)
    REFERENCES `EmployeeManagementSystem`.`Employer_Profiles` (`idEmployer_Profile`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EmployeeManagementSystem`.`Cal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmployeeManagementSystem`.`Cal` (
  `idCal` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `create_at` VARCHAR(45) NULL,
  `States_idStates` INT NOT NULL,
  PRIMARY KEY (`idCal`),
  INDEX `fk_Cal_States1_idx` (`States_idStates` ASC) VISIBLE,
  CONSTRAINT `fk_Cal_States1`
    FOREIGN KEY (`States_idStates`)
    REFERENCES `EmployeeManagementSystem`.`States` (`idStates`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
