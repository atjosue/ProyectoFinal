-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema metrofooddb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema metrofooddb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `metrofooddb` DEFAULT CHARACTER SET latin1 ;
USE `metrofooddb` ;

-- -----------------------------------------------------
-- Table `metrofooddb`.`carrito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `metrofooddb`.`carrito` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombreCombo` VARCHAR(100) NULL DEFAULT NULL,
  `precio` DOUBLE NULL DEFAULT NULL,
  `catidad` INT(11) NULL DEFAULT NULL,
  `idRestaurante` INT(11) NULL DEFAULT NULL,
  `idCliente` INT(11) NULL DEFAULT NULL,
  `idCombo` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `metrofooddb`.`tipousuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `metrofooddb`.`tipousuario` (
  `idTipoUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `tipoUsuario` INT(11) NULL DEFAULT NULL,
  `nombreTipoUsuario` VARCHAR(30) NULL DEFAULT NULL,
  `estado` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idTipoUsuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `metrofooddb`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `metrofooddb`.`usuario` (
  `idUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(20) NULL DEFAULT NULL,
  `pass` VARCHAR(120) NULL DEFAULT NULL,
  `fechaCreacionUsuario` DATE NULL DEFAULT NULL,
  `fechaModificacionUsuario` DATE NULL DEFAULT NULL,
  `estadoUsuario` INT(11) NULL DEFAULT NULL,
  `idTipoUsuario` INT(11) NULL DEFAULT NULL,
  `tipousuario_idTipoUsuario` INT(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  INDEX `fk_usuario_tipousuario_idx` (`tipousuario_idTipoUsuario` ASC),
  CONSTRAINT `fk_usuario_tipousuario`
    FOREIGN KEY (`tipousuario_idTipoUsuario`)
    REFERENCES `metrofooddb`.`tipousuario` (`idTipoUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `metrofooddb`.`restaurante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `metrofooddb`.`restaurante` (
  `idRestaurante` INT(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` INT(11) NOT NULL,
  `nombreRestaurante` VARCHAR(100) NOT NULL,
  `descripcionRestaurante` VARCHAR(300) NULL DEFAULT NULL,
  `estadoRestaurante` INT(11) NULL DEFAULT NULL,
  `longRestaurante` VARCHAR(80) NULL DEFAULT NULL,
  `latiRestaurante` VARCHAR(80) NULL DEFAULT NULL,
  `direccion` VARCHAR(100) NULL DEFAULT NULL,
  `informacionRestaurante` VARCHAR(300) NULL DEFAULT NULL,
  `img` VARCHAR(100) NULL DEFAULT NULL,
  `tel1` VARCHAR(100) NULL DEFAULT NULL,
  `tel2` VARCHAR(100) NULL DEFAULT NULL,
  `usuario_idUsuario` INT(11) NOT NULL,
  PRIMARY KEY (`idRestaurante`),
  INDEX `fk_restaurante_usuario1_idx` (`usuario_idUsuario` ASC),
  CONSTRAINT `fk_restaurante_usuario1`
    FOREIGN KEY (`usuario_idUsuario`)
    REFERENCES `metrofooddb`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `metrofooddb`.`combo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `metrofooddb`.`combo` (
  `idCombo` INT(11) NOT NULL AUTO_INCREMENT,
  `nombreCombo` VARCHAR(100) NOT NULL,
  `descripcionCombo` VARCHAR(100) NULL DEFAULT NULL,
  `precioCombo` DOUBLE NOT NULL,
  `estadoCombo` INT(11) NULL DEFAULT NULL,
  `fechaCreacionCombo` DATE NULL DEFAULT NULL,
  `fechaModificacionCombo` DATE NULL DEFAULT NULL,
  `idRestaurante` INT(11) NULL DEFAULT NULL,
  `img` VARCHAR(300) NULL DEFAULT NULL,
  `restaurante_idRestaurante` INT(11) NOT NULL,
  PRIMARY KEY (`idCombo`),
  INDEX `fk_combo_restaurante1_idx` (`restaurante_idRestaurante` ASC),
  CONSTRAINT `fk_combo_restaurante1`
    FOREIGN KEY (`restaurante_idRestaurante`)
    REFERENCES `metrofooddb`.`restaurante` (`idRestaurante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `metrofooddb`.`orden`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `metrofooddb`.`orden` (
  `idOrden` INT(11) NOT NULL AUTO_INCREMENT,
  `fechaOrden` DATE NULL DEFAULT NULL,
  `estadoOrden` INT(11) NULL DEFAULT NULL,
  `idRepartidor` INT(11) NULL DEFAULT NULL,
  `idCliente` INT(11) NULL DEFAULT NULL,
  `estadoEntregaOrden` INT(11) NULL DEFAULT NULL,
  `idRestaurante` INT(11) NULL DEFAULT NULL,
  `lonRestaurante` VARCHAR(250) NULL DEFAULT NULL,
  `latRestaurante` VARCHAR(250) NULL DEFAULT NULL,
  `longCliente` VARCHAR(250) NULL DEFAULT NULL,
  `latCliente` VARCHAR(250) NOT NULL,
  `fechaModificacion` DATE NULL DEFAULT NULL,
  `combo_idCombo` INT(11) NOT NULL,
  PRIMARY KEY (`idOrden`),
  INDEX `fk_orden_combo1_idx` (`combo_idCombo` ASC),
  CONSTRAINT `fk_orden_combo1`
    FOREIGN KEY (`combo_idCombo`)
    REFERENCES `metrofooddb`.`combo` (`idCombo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `metrofooddb`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `metrofooddb`.`cliente` (
  `idCliente` INT(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` INT(11) NOT NULL,
  `nombreCliente` VARCHAR(100) NULL DEFAULT NULL,
  `apellidoCliente` VARCHAR(100) NULL DEFAULT NULL,
  `estado` INT(11) NULL DEFAULT NULL,
  `direccion` VARCHAR(100) NULL DEFAULT NULL,
  `longCliente` VARCHAR(100) NULL DEFAULT NULL,
  `latiCliente` VARCHAR(100) NULL DEFAULT NULL,
  `correoCliente` VARCHAR(100) NULL DEFAULT NULL,
  `telefonoCLiente` VARCHAR(40) NULL DEFAULT NULL,
  `usuario_idUsuario` INT(11) NOT NULL,
  `orden_idOrden` INT(11) NOT NULL,
  PRIMARY KEY (`idCliente`),
  INDEX `fk_cliente_usuario1_idx` (`usuario_idUsuario` ASC),
  INDEX `fk_cliente_orden1_idx` (`orden_idOrden` ASC),
  CONSTRAINT `fk_cliente_usuario1`
    FOREIGN KEY (`usuario_idUsuario`)
    REFERENCES `metrofooddb`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_orden1`
    FOREIGN KEY (`orden_idOrden`)
    REFERENCES `metrofooddb`.`orden` (`idOrden`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `metrofooddb`.`detalle_orden`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `metrofooddb`.`detalle_orden` (
  `idDetalleOrden` INT(11) NOT NULL AUTO_INCREMENT,
  `idOrden` INT(11) NULL DEFAULT NULL,
  `idCombo` INT(11) NULL DEFAULT NULL,
  `nombreCombo` VARCHAR(100) NULL DEFAULT NULL,
  `cantidad` INT(11) NULL DEFAULT NULL,
  `subtotal` DOUBLE NULL DEFAULT NULL,
  `estadoDestalleOrden` INT(11) NULL DEFAULT NULL,
  `precioCombo` DOUBLE NULL DEFAULT NULL,
  `fechaCreacion` DATE NULL DEFAULT NULL,
  `fechaModificacion` DATE NULL DEFAULT NULL,
  `orden_idOrden` INT(11) NOT NULL,
  PRIMARY KEY (`idDetalleOrden`),
  INDEX `fk_detalle_orden_orden1_idx` (`orden_idOrden` ASC),
  CONSTRAINT `fk_detalle_orden_orden1`
    FOREIGN KEY (`orden_idOrden`)
    REFERENCES `metrofooddb`.`orden` (`idOrden`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `metrofooddb`.`repartidor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `metrofooddb`.`repartidor` (
  `idRepartidor` INT(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` INT(11) NOT NULL,
  `nombreRepartidor` VARCHAR(100) NULL DEFAULT NULL,
  `apellidoRepartidor` VARCHAR(100) NULL DEFAULT NULL,
  `telefono` VARCHAR(40) NULL DEFAULT NULL,
  `DUI` VARCHAR(12) NULL DEFAULT NULL,
  `idRestaurante` INT(11) NULL DEFAULT NULL,
  `estadoRepartidor` INT(11) NULL DEFAULT NULL,
  `longRepartidor` VARCHAR(100) NULL DEFAULT NULL,
  `latiRepartidor` VARCHAR(100) NULL DEFAULT NULL,
  `usuario_idUsuario` INT(11) NOT NULL,
  `orden_idOrden` INT(11) NOT NULL,
  `restaurante_idRestaurante` INT(11) NOT NULL,
  PRIMARY KEY (`idRepartidor`),
  INDEX `fk_repartidor_usuario1_idx` (`usuario_idUsuario` ASC),
  INDEX `fk_repartidor_orden1_idx` (`orden_idOrden` ASC),
  INDEX `fk_repartidor_restaurante1_idx` (`restaurante_idRestaurante` ASC),
  CONSTRAINT `fk_repartidor_orden1`
    FOREIGN KEY (`orden_idOrden`)
    REFERENCES `metrofooddb`.`orden` (`idOrden`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_repartidor_restaurante1`
    FOREIGN KEY (`restaurante_idRestaurante`)
    REFERENCES `metrofooddb`.`restaurante` (`idRestaurante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_repartidor_usuario1`
    FOREIGN KEY (`usuario_idUsuario`)
    REFERENCES `metrofooddb`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `metrofooddb`.`telefono_restaurante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `metrofooddb`.`telefono_restaurante` (
  `idTelefonoRestaurante` INT(11) NOT NULL AUTO_INCREMENT,
  `idRestaurante` INT(11) NOT NULL,
  `telefono` VARCHAR(25) NULL DEFAULT NULL,
  `estado` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idTelefonoRestaurante`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `metrofooddb`.`tipoimagen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `metrofooddb`.`tipoimagen` (
  `idTipoImagen` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo` INT(11) NULL DEFAULT NULL,
  `nombre` VARCHAR(15) NULL DEFAULT NULL,
  PRIMARY KEY (`idTipoImagen`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
