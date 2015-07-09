 
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema aztecatu_RegistroIntel
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema aztecatu_RegistroIntel
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `aztecatu_RegistroIntel` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `aztecatu_RegistroIntel` ;

-- -----------------------------------------------------
-- Table `aztecatu_RegistroIntel`.`carrera`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aztecatu_RegistroIntel`.`carrera` ;

CREATE TABLE IF NOT EXISTS `aztecatu_RegistroIntel`.`carrera` (
  `idcarrera` VARCHAR(3) NOT NULL COMMENT '',
  `nombre_carrera` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idcarrera`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aztecatu_RegistroIntel`.`alumno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aztecatu_RegistroIntel`.`alumno` ;

CREATE TABLE IF NOT EXISTS `aztecatu_RegistroIntel`.`alumno` (
  `nombre_alumno` VARCHAR(45) NULL COMMENT '',
  `matricula` INT NOT NULL COMMENT '',
  `email` VARCHAR(25) NULL COMMENT '',
  `telefono` VARCHAR(15) NULL COMMENT '',
  `carrera` VARCHAR(3) NULL COMMENT '',
  PRIMARY KEY (`matricula`)  COMMENT '',
  INDEX `fk_alumno_carrera_idx` (`carrera` ASC)  COMMENT '',
  CONSTRAINT `carrera`
    FOREIGN KEY (`carrera`)
    REFERENCES `aztecatu_RegistroIntel`.`carrera` (`idcarrera`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Data for table `aztecatu_RegistroIntel`.`carrera`
-- -----------------------------------------------------
START TRANSACTION;
USE `aztecatu_RegistroIntel`;
INSERT INTO `aztecatu_RegistroIntel`.`carrera` (`idcarrera`, `nombre_carrera`) VALUES ('ICC', 'Ingeniería en Ciencias de la Computación');
INSERT INTO `aztecatu_RegistroIntel`.`carrera` (`idcarrera`, `nombre_carrera`) VALUES ('LCC', 'Licenciatura en Ciencias de la Computación');
INSERT INTO `aztecatu_RegistroIntel`.`carrera` (`idcarrera`, `nombre_carrera`) VALUES ('TI', 'Tecnologías de la información');

COMMIT;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;