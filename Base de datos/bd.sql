-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mda
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mda` ;

-- -----------------------------------------------------
-- Schema mda
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mda` DEFAULT CHARACTER SET utf8 ;
USE `mda` ;

-- -----------------------------------------------------
-- Table `mda`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mda`.`Usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `pass` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `apellidos` VARCHAR(45) NULL,
  `direccion` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  `localizacion` VARCHAR(45) NULL,
  `fechaNacimiento` DATE NULL,
  `imagen` VARCHAR(45) NULL DEFAULT 'assets/img/usuario.png',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC),
  UNIQUE INDEX `correo_UNIQUE` (`correo` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mda`.`Evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mda`.`Evento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `lugar` VARCHAR(45) NOT NULL,
  `fechaInicio` DATE NOT NULL,
  `fechaFin` DATE NOT NULL,
  `imagen` VARCHAR(45) NULL DEFAULT 'assets/img/evento.png',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mda`.`Organizador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mda`.`Organizador` (
  `usuario` INT NOT NULL,
  `evento` INT NOT NULL,
  PRIMARY KEY (`usuario`, `evento`),
  INDEX `fk_Usuario_has_Evento_Evento1_idx` (`evento` ASC),
  INDEX `fk_Usuario_has_Evento_Usuario_idx` (`usuario` ASC),
  CONSTRAINT `fk_Usuario_has_Evento_Usuario`
    FOREIGN KEY (`usuario`)
    REFERENCES `mda`.`Usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_has_Evento_Evento1`
    FOREIGN KEY (`evento`)
    REFERENCES `mda`.`Evento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mda`.`Cuenta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mda`.`Cuenta` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `concepto` VARCHAR(45) NOT NULL,
  `importe` FLOAT NOT NULL,
  `descripcion` TEXT NULL,
  `cantidad` INT NOT NULL DEFAULT 1,
  `evento` INT NOT NULL,
  `tipo` INT NOT NULL,
  `fecha` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Inversion_Evento1_idx` (`evento` ASC),
  CONSTRAINT `fk_Inversion_Evento1`
    FOREIGN KEY (`evento`)
    REFERENCES `mda`.`Evento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mda`.`Actividad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mda`.`Actividad` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `fecha` DATETIME NULL,
  `lugar` VARCHAR(45) NULL,
  `precio` FLOAT NULL,
  `evento` INT NOT NULL,
  `estado` VARCHAR(45) NOT NULL DEFAULT 'activa',
  `imagen` VARCHAR(45) NULL DEFAULT 'assets/img/actividad.png',
  PRIMARY KEY (`id`),
  INDEX `fk_Actividad_Evento1_idx` (`evento` ASC),
  CONSTRAINT `fk_Actividad_Evento1`
    FOREIGN KEY (`evento`)
    REFERENCES `mda`.`Evento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mda`.`Producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mda`.`Producto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `precioCompra` FLOAT NOT NULL,
  `precioVenta` FLOAT NOT NULL,
  `cantidad` INT NOT NULL,
  `evento` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Producto_Evento1_idx` (`evento` ASC),
  CONSTRAINT `fk_Producto_Evento1`
    FOREIGN KEY (`evento`)
    REFERENCES `mda`.`Evento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mda`.`Comentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mda`.`Comentario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `comentario` TEXT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL DEFAULT 'Anonimo',
  `fecha` DATETIME NOT NULL,
  `actividad` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Comentario_Actividad1_idx` (`actividad` ASC),
  CONSTRAINT `fk_Comentario_Actividad1`
    FOREIGN KEY (`actividad`)
    REFERENCES `mda`.`Actividad` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mda`.`Voto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mda`.`Voto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `puntuacion` INT NOT NULL,
  `actividad` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Voto_Actividad1_idx` (`actividad` ASC),
  CONSTRAINT `fk_Voto_Actividad1`
    FOREIGN KEY (`actividad`)
    REFERENCES `mda`.`Actividad` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
