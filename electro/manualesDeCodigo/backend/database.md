# Base de Datos de Servicio Técnico de Electrodomésticos

## Descripción General
Esta base de datos está diseñada para gestionar un sistema de servicio técnico de electrodomésticos. Permite administrar clientes, técnicos, servicios, pagos, garantías y el historial completo de servicios prestados.

## Estructura de la Base de Datos

### Configuración Inicial del Script

```sql
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
```

**Propósito:** Guarda las configuraciones actuales de MySQL y las desactiva temporalmente para permitir la creación de tablas sin restricciones durante el proceso de instalación.

- `UNIQUE_CHECKS=0`: Desactiva verificaciones de unicidad
- `FOREIGN_KEY_CHECKS=0`: Desactiva verificaciones de claves foráneas
- `SQL_MODE`: Establece un modo estricto de SQL

### Creación del Schema

```sql
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;
```

**Propósito:** Crea la base de datos principal llamada `mydb` con codificación UTF-8 y la selecciona para uso.

## Tablas del Sistema

### 1. Tabla `ubicacion`

```sql
CREATE TABLE IF NOT EXISTS `mydb`.`ubicacion` (
  `idUbicacion` INT NOT NULL AUTO_INCREMENT,
  `direccion` VARCHAR(45) NOT NULL,
  `localidad` VARCHAR(45) NOT NULL,
  `latitud` DECIMAL(9,6) NOT NULL,
  `longitud` DECIMAL(9,6) NOT NULL,
  PRIMARY KEY (`idUbicacion`))
ENGINE = InnoDB;
```

**Propósito:** Almacena las ubicaciones geográficas de los clientes.

**Campos:**
- `idUbicacion`: Identificador único autoincremental
- `direccion`: Dirección física (máximo 45 caracteres)
- `localidad`: Ciudad o localidad (máximo 45 caracteres)
- `latitud`: Coordenada geográfica latitud (9 dígitos, 6 decimales)
- `longitud`: Coordenada geográfica longitud (9 dígitos, 6 decimales)

### 2. Tabla `cliente`

```sql
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
```

**Propósito:** Almacena la información personal de los clientes.

**Campos:**
- `cedula`: Número de identificación del cliente (clave primaria)
- `nombres`: Nombres del cliente (máximo 100 caracteres)
- `apellidos`: Apellidos del cliente (máximo 100 caracteres)
- `telefono`: Número telefónico (máximo 100 caracteres)
- `correo`: Dirección de correo electrónico (máximo 100 caracteres)
- `ubicacion_idUbicacion`: Referencia a la tabla ubicacion

**Relaciones:** Cada cliente debe tener una ubicación asociada.

### 3. Tabla `tipoElectrodomestico`

```sql
CREATE TABLE IF NOT EXISTS `mydb`.`tipoElectrodomestico` (
  `idTipoElectrodomestico` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoElectrodomestico`))
ENGINE = InnoDB;
```

**Propósito:** Cataloga los tipos de electrodomésticos (refrigerador, lavadora, etc.).

**Campos:**
- `idTipoElectrodomestico`: Identificador único autoincremental
- `nombre`: Nombre del tipo de electrodoméstico (máximo 45 caracteres)

### 4. Tabla `electrodomestico`

```sql
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
```

**Propósito:** Registra los electrodomésticos específicos de cada cliente.

**Campos:**
- `idElectrodomestico`: Identificador único autoincremental
- `marca`: Marca del electrodoméstico (máximo 45 caracteres)
- `modelo`: Modelo del electrodoméstico (opcional, máximo 45 caracteres)
- `tipoElectrodomestico_idTipoElectrodomestico`: Tipo de electrodoméstico
- `cliente_cedula`: Cliente propietario

**Relaciones:** Cada electrodoméstico pertenece a un cliente y tiene un tipo específico.

### 5. Tabla `tipoServicio`

```sql
CREATE TABLE IF NOT EXISTS `mydb`.`tipoServicio` (
  `idTipoServicio` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoServicio`))
ENGINE = InnoDB;
```

**Propósito:** Cataloga los tipos de servicios (reparación, mantenimiento, instalación, etc.).

**Campos:**
- `idTipoServicio`: Identificador único autoincremental
- `tipo`: Descripción del tipo de servicio (máximo 45 caracteres)

### 6. Tabla `disponibilidad`

```sql
CREATE TABLE IF NOT EXISTS `mydb`.`disponibilidad` (
  `idDisponibilidad` INT NOT NULL AUTO_INCREMENT,
  `serviciosAsignados` INT NOT NULL,
  `fecha` DATE NOT NULL,
  PRIMARY KEY (`idDisponibilidad`))
ENGINE = InnoDB;
```

**Propósito:** Controla la disponibilidad y carga de trabajo de los técnicos.

**Campos:**
- `idDisponibilidad`: Identificador único autoincremental
- `serviciosAsignados`: Número de servicios asignados en la fecha
- `fecha`: Fecha específica de disponibilidad

### 7. Tabla `tecnico`

```sql
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
```

**Propósito:** Almacena información de los técnicos de servicio.

**Campos:**
- `idTecnico`: Identificador único autoincremental
- `nombres`: Nombres del técnico (máximo 45 caracteres)
- `apellidos`: Apellidos del técnico (máximo 45 caracteres)
- `disponibilidad_idDisponibilidad`: Referencia a su disponibilidad

**Relaciones:** Cada técnico tiene asociada una disponibilidad específica.

### 8. Tabla `garantia`

```sql
CREATE TABLE IF NOT EXISTS `mydb`.`garantia` (
  `idGarantia` INT NOT NULL AUTO_INCREMENT,
  `inicioGarantia` DATE NOT NULL,
  `tYcGarantia` VARCHAR(100) NOT NULL,
  `finGarantia` DATE NOT NULL,
  PRIMARY KEY (`idGarantia`))
ENGINE = InnoDB;
```

**Propósito:** Gestiona las garantías de los servicios prestados.

**Campos:**
- `idGarantia`: Identificador único autoincremental
- `inicioGarantia`: Fecha de inicio de la garantía
- `tYcGarantia`: Términos y condiciones de la garantía (máximo 100 caracteres)
- `finGarantia`: Fecha de finalización de la garantía

### 9. Tabla `pago`

```sql
CREATE TABLE IF NOT EXISTS `mydb`.`pago` (
  `idPago` INT NOT NULL AUTO_INCREMENT,
  `cantidad` INT NOT NULL,
  `fecha` DATE NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPago`))
ENGINE = InnoDB;
```

**Propósito:** Registra los pagos realizados por los servicios.

**Campos:**
- `idPago`: Identificador único autoincremental
- `cantidad`: Monto del pago
- `fecha`: Fecha del pago
- `estado`: Estado del pago (pendiente, pagado, etc., máximo 45 caracteres)

### 10. Tabla `metodoPago`

```sql
CREATE TABLE IF NOT EXISTS `mydb`.`metodoPago` (
  `idMetodoPago` INT NOT NULL AUTO_INCREMENT,
  `metodo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idMetodoPago`))
ENGINE = InnoDB;
```

**Propósito:** Cataloga los métodos de pago disponibles (efectivo, tarjeta, transferencia, etc.).

**Campos:**
- `idMetodoPago`: Identificador único autoincremental
- `metodo`: Descripción del método de pago (máximo 45 caracteres)

### 11. Tabla `pagoCliente`

```sql
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
```

**Propósito:** Relaciona pagos específicos con clientes y métodos de pago.

**Campos:**
- `idPagoCliente`: Identificador único autoincremental
- `metodoPago_idMetodoPago`: Método utilizado para el pago
- `pago_idPago`: Referencia al pago realizado
- `cliente_cedula`: Cliente que realizó el pago

**Relaciones:** Conecta un cliente específico con un pago y su método correspondiente.

### 12. Tabla `servicio` (Tabla Central)

```sql
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
  -- Múltiples índices para optimizar consultas
  INDEX `fk_servicio_cliente1_idx` (`cliente_cedula` ASC) ,
  INDEX `fk_servicio_tecnico1_idx` (`tecnico_idTecnico` ASC) ,
  INDEX `fk_servicio_garantia1_idx` (`garantia_idGarantia` ASC) ,
  INDEX `fk_servicio_tipoElectrodomestico1_idx` (`tipoElectrodomestico_idTipoElectrodomestico` ASC) VISIBLE,
  INDEX `fk_servicio_tipoServicio1_idx` (`tipoServicio_idTipoServicio` ASC) ,
  INDEX `fk_servicio_pagoCliente1_idx` (`pagoCliente_idPagoCliente` ASC) ,
  -- Múltiples restricciones de clave foránea
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
```

**Propósito:** Tabla central que registra todos los servicios técnicos realizados.

**Campos:**
- `codigoServicio`: Identificador único del servicio
- `fechaIngreso`: Fecha en que se recibió el servicio
- `estado`: Estado actual del servicio (máximo 45 caracteres)
- `descripcionFalla`: Descripción del problema (opcional, máximo 100 caracteres)
- `cliente_cedula`: Cliente que solicita el servicio
- `tecnico_idTecnico`: Técnico asignado al servicio
- `garantia_idGarantia`: Garantía asociada al servicio
- `tipoElectrodomestico_idTipoElectrodomestico`: Tipo de electrodoméstico a reparar
- `tipoServicio_idTipoServicio`: Tipo de servicio a realizar
- `pagoCliente_idPagoCliente`: Información del pago del servicio

**Relaciones:** Esta tabla conecta prácticamente todas las demás tablas del sistema, siendo el núcleo del negocio.

### 13. Tabla `historialCliente`

```sql
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
```

**Propósito:** Mantiene un registro histórico de todos los servicios realizados a cada cliente.

**Campos:**
- `idHistorialCliente`: Identificador único autoincremental
- `cliente_cedula`: Cliente del historial
- `servicio_codigoServicio`: Servicio realizado

**Relaciones:** Conecta clientes con todos sus servicios históricos.

### Restauración de Configuraciones

```sql
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
```

**Propósito:** Restaura las configuraciones originales de MySQL después de completar la creación de la base de datos.

## Flujo de Datos del Sistema

1. **Cliente**: Se registra con su información personal y ubicación
2. **Electrodoméstico**: Se registra el electrodoméstico del cliente
3. **Servicio**: Se crea una orden de servicio que incluye:
   - Cliente solicitante
   - Técnico asignado (con disponibilidad)
   - Tipo de servicio y electrodoméstico
   - Garantía aplicable
   - Información de pago
4. **Historial**: Se registra automáticamente en el historial del cliente

## Motor de Base de Datos

Todas las tablas utilizan **InnoDB** como motor de almacenamiento, lo que proporciona:
- Soporte completo para transacciones ACID
- Integridad referencial con claves foráneas
- Recuperación automática de fallos
- Bloqueo a nivel de fila para mejor concurrencia

