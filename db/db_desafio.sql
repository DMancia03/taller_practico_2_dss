-- MySQL Script generated by MySQL Workbench
-- Thu Apr 28 18:37:51 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema calendar_taller
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema calendar_taller
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `calendar_taller` DEFAULT CHARACTER SET utf8 ;
USE `calendar_taller` ;

-- -----------------------------------------------------
-- Table `calendar_taller`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `calendar_taller`.`User` ;

CREATE TABLE IF NOT EXISTS `calendar_taller`.`User` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NULL,
  `LastName` VARCHAR(45) NULL,
  `Username` VARCHAR(45) NULL,
  `Password` VARCHAR(45) NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE INDEX `Username_UNIQUE` (`Username` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `calendar_taller`.`Event`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `calendar_taller`.`Event` ;

CREATE TABLE IF NOT EXISTS `calendar_taller`.`Event` (
  `idEvent` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `StartDate` DATE NULL,
  `Description` VARCHAR(45) NULL,
  `Avilable` VARCHAR(1) NOT NULL DEFAULT 's',
  `User_idUser` INT NOT NULL,
  PRIMARY KEY (`idEvent`),
  INDEX `fk_Event_User_idx` (`User_idUser` ASC) ,
  CONSTRAINT `fk_Event_User`
    FOREIGN KEY (`User_idUser`)
    REFERENCES `calendar_taller`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
