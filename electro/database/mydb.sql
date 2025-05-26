-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`ubicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ubicacion` (
  `idUbicacion` INT NOT NULL AUTO_INCREMENT,
  `direccion` VARCHAR(45) NOT NULL,
  `localidad` VARCHAR(45) NOT NULL,
  `latitud` DECIMAL(9,6) NOT NULL,
  `longitud` DECIMAL(9,6) NOT NULL,
  PRIMARY KEY (`idUbicacion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cliente` (
  `cedula` INT NOT NULL,
  `nombres` VARCHAR(100) NOT NULL,
  `apellidos` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(100) NOT NULL,
  `correo` VARCHAR(100) NOT NULL,
  `ubicacion_idUbicacion` INT NOT NULL,
  PRIMARY KEY (`cedula`, `ubicacion_idUbicacion`),
  INDEX `fk_cliente_ubicacion_idx` (`ubicacion_idUbicacion` ASC),
  CONSTRAINT `fk_cliente_ubicacion`
    FOREIGN KEY (`ubicacion_idUbicacion`)
    REFERENCES `mydb`.`ubicacion` (`idUbicacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tipoElectrodomestico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tipoElectrodomestico` (
  `idTipoElectrodomestico` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoElectrodomestico`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`electrodomestico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`electrodomestico` (
  `idElectrodomestico` INT NOT NULL AUTO_INCREMENT,
  `marca` VARCHAR(45) NOT NULL,
  `modelo` VARCHAR(45) NULL,
  `tipoElectrodomestico_idTipoElectrodomestico` INT NOT NULL,
  `cliente_cedula` INT NOT NULL,
  PRIMARY KEY (`idElectrodomestico`, `tipoElectrodomestico_idTipoElectrodomestico`, `cliente_cedula`),
  INDEX `fk_electrodomestico_tipoElectrodomestico1_idx` (`tipoElectrodomestico_idTipoElectrodomestico` ASC) VISIBLE,
  INDEX `fk_electrodomestico_cliente1_idx` (`cliente_cedula` ASC),
  CONSTRAINT `fk_electrodomestico_tipoElectrodomestico1`
    FOREIGN KEY (`tipoElectrodomestico_idTipoElectrodomestico`)
    REFERENCES `mydb`.`tipoElectrodomestico` (`idTipoElectrodomestico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_electrodomestico_cliente1`
    FOREIGN KEY (`cliente_cedula`)
    REFERENCES `mydb`.`cliente` (`cedula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tipoServicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tipoServicio` (
  `idTipoServicio` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoServicio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`disponibilidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`disponibilidad` (
  `idDisponibilidad` INT NOT NULL AUTO_INCREMENT,
  `serviciosAsignados` INT NOT NULL,
  `fecha` DATE NOT NULL,
  PRIMARY KEY (`idDisponibilidad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tecnico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tecnico` (
  `idTecnico` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `disponibilidad_idDisponibilidad` INT NOT NULL,
  PRIMARY KEY (`idTecnico`, `disponibilidad_idDisponibilidad`),
  INDEX `fk_tecnico_disponibilidad1_idx` (`disponibilidad_idDisponibilidad` ASC),
  CONSTRAINT `fk_tecnico_disponibilidad1`
    FOREIGN KEY (`disponibilidad_idDisponibilidad`)
    REFERENCES `mydb`.`disponibilidad` (`idDisponibilidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`garantia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`garantia` (
  `idGarantia` INT NOT NULL AUTO_INCREMENT,
  `inicioGarantia` DATE NOT NULL,
  `tYcGarantia` VARCHAR(100) NOT NULL,
  `finGarantia` DATE NOT NULL,
  PRIMARY KEY (`idGarantia`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`pago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pago` (
  `idPago` INT NOT NULL AUTO_INCREMENT,
  `cantidad` INT NOT NULL,
  `fecha` DATE NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPago`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`metodoPago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`metodoPago` (
  `idMetodoPago` INT NOT NULL AUTO_INCREMENT,
  `metodo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idMetodoPago`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`pagoCliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pagoCliente` (
  `idPagoCliente` INT NOT NULL AUTO_INCREMENT,
  `metodoPago_idMetodoPago` INT NOT NULL,
  `pago_idPago` INT NOT NULL,
  `cliente_cedula` INT NOT NULL,
  PRIMARY KEY (`idPagoCliente`, `metodoPago_idMetodoPago`, `pago_idPago`, `cliente_cedula`),
  INDEX `fk_pagoCliente_metodoPago1_idx` (`metodoPago_idMetodoPago` ASC) ,
  INDEX `fk_pagoCliente_pago1_idx` (`pago_idPago` ASC) ,
  INDEX `fk_pagoCliente_cliente1_idx` (`cliente_cedula` ASC) ,
  CONSTRAINT `fk_pagoCliente_metodoPago1`
    FOREIGN KEY (`metodoPago_idMetodoPago`)
    REFERENCES `mydb`.`metodoPago` (`idMetodoPago`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagoCliente_pago1`
    FOREIGN KEY (`pago_idPago`)
    REFERENCES `mydb`.`pago` (`idPago`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagoCliente_cliente1`
    FOREIGN KEY (`cliente_cedula`)
    REFERENCES `mydb`.`cliente` (`cedula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`servicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`servicio` (
  `codigoServicio` INT NOT NULL AUTO_INCREMENT,
  `fechaIngreso` DATE NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `descripcionFalla` VARCHAR(100) NULL,
  `cliente_cedula` INT NOT NULL,
  `tecnico_idTecnico` INT NOT NULL,
  `garantia_idGarantia` INT NOT NULL,
  `tipoElectrodomestico_idTipoElectrodomestico` INT NOT NULL,
  `tipoServicio_idTipoServicio` INT NOT NULL,
  `pagoCliente_idPagoCliente` INT NOT NULL,
  PRIMARY KEY (`codigoServicio`, `cliente_cedula`, `tecnico_idTecnico`, `garantia_idGarantia`, `tipoElectrodomestico_idTipoElectrodomestico`, `tipoServicio_idTipoServicio`, `pagoCliente_idPagoCliente`),
  INDEX `fk_servicio_cliente1_idx` (`cliente_cedula` ASC) ,
  INDEX `fk_servicio_tecnico1_idx` (`tecnico_idTecnico` ASC) ,
  INDEX `fk_servicio_garantia1_idx` (`garantia_idGarantia` ASC) ,
  INDEX `fk_servicio_tipoElectrodomestico1_idx` (`tipoElectrodomestico_idTipoElectrodomestico` ASC) VISIBLE,
  INDEX `fk_servicio_tipoServicio1_idx` (`tipoServicio_idTipoServicio` ASC) ,
  INDEX `fk_servicio_pagoCliente1_idx` (`pagoCliente_idPagoCliente` ASC) ,
  CONSTRAINT `fk_servicio_cliente1`
    FOREIGN KEY (`cliente_cedula`)
    REFERENCES `mydb`.`cliente` (`cedula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicio_tecnico1`
    FOREIGN KEY (`tecnico_idTecnico`)
    REFERENCES `mydb`.`tecnico` (`idTecnico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicio_garantia1`
    FOREIGN KEY (`garantia_idGarantia`)
    REFERENCES `mydb`.`garantia` (`idGarantia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicio_tipoElectrodomestico1`
    FOREIGN KEY (`tipoElectrodomestico_idTipoElectrodomestico`)
    REFERENCES `mydb`.`tipoElectrodomestico` (`idTipoElectrodomestico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicio_tipoServicio1`
    FOREIGN KEY (`tipoServicio_idTipoServicio`)
    REFERENCES `mydb`.`tipoServicio` (`idTipoServicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicio_pagoCliente1`
    FOREIGN KEY (`pagoCliente_idPagoCliente`)
    REFERENCES `mydb`.`pagoCliente` (`idPagoCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`historialCliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`historialCliente` (
  `idHistorialCliente` INT NOT NULL AUTO_INCREMENT,
  `cliente_cedula` INT NOT NULL,
  `servicio_codigoServicio` INT NOT NULL,
  PRIMARY KEY (`idHistorialCliente`, `cliente_cedula`, `servicio_codigoServicio`),
  INDEX `fk_historialCliente_cliente1_idx` (`cliente_cedula` ASC),
  INDEX `fk_historialCliente_servicio1_idx` (`servicio_codigoServicio` ASC),
  CONSTRAINT `fk_historialCliente_cliente1`
    FOREIGN KEY (`cliente_cedula`)
    REFERENCES `mydb`.`cliente` (`cedula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_historialCliente_servicio1`
    FOREIGN KEY (`servicio_codigoServicio`)
    REFERENCES `mydb`.`servicio` (`codigoServicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
