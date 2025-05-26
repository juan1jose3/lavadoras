# Editar Servicio - Documentación Completa

## Descripción General
Este documento proporciona una documentación detallada línea por línea del script `editar_servicio.php`. Este archivo procesa las actualizaciones de servicios enviadas desde el formulario CRUD, manejando múltiples tablas relacionadas en una sola transacción de base de datos.

## Estructura del Archivo

### 1. Inicialización y Validación de Método

```php
<?php
session_start();
```
**Líneas 1-2:** 
- Abre el contexto PHP
- Inicia una nueva sesión o reanuda la sesión existente para mantener datos entre páginas

```php
if($_SERVER["REQUEST_METHOD"] == "POST"){
```
**Línea 4:** Verifica que la solicitud HTTP sea de tipo POST, asegurando que solo se procesen datos enviados desde formularios

### 2. Captura de Datos del Formulario

#### Datos Principales del Servicio

```php
    // Datos del formulario
    $codigoServicio = $_POST["codigoServicio"];
    $fechaIngreso = $_POST["fechaIngreso"];
    $estado = $_POST["estado"];
    $descripcionFalla = $_POST["descripcionFalla"];
    $cliente_cedula = $_POST["cliente_cedula"];
    $tecnico_id = $_POST["tecnico_id"];
    $tipoElectrodomestico_id = $_POST["tipoElectrodomestico_id"];
    $tipoServicio_id = $_POST["tipoServicio_id"];
    $metodoPago_id = $_POST["metodoPago_id"];
    $cantidad = $_POST["cantidad"];
    $estadoPago = $_POST["estadoPago"];
```

**Líneas 5-16:** Captura todos los datos principales del formulario de edición:
- `codigoServicio`: Identificador único del servicio (no editable)
- `fechaIngreso`: Fecha cuando ingresó el servicio
- `estado`: Estado actual del servicio (Pendiente, En proceso, Completado, Cancelado)
- `descripcionFalla`: Descripción detallada del problema reportado
- `cliente_cedula`: Cédula del cliente (no editable)
- `tecnico_id`: ID del técnico asignado
- `tipoElectrodomestico_id`: Tipo de electrodoméstico a reparar
- `tipoServicio_id`: Tipo de servicio a realizar
- `metodoPago_id`: Método de pago seleccionado
- `cantidad`: Monto del servicio
- `estadoPago`: Estado del pago (Pendiente, Pagado, Parcial, Cancelado)

#### Datos de Garantía

```php
    // Datos de garantía
    $inicioGarantia = $_POST["inicioGarantia"];
    $finGarantia = $_POST["finGarantia"];
    $tycGarantia = $_POST["tycGarantia"];
```

**Líneas 18-21:** Captura datos específicos de la garantía:
- `inicioGarantia`: Fecha de inicio de la garantía
- `finGarantia`: Fecha de finalización de la garantía
- `tycGarantia`: Términos y condiciones de la garantía

### 3. Manejo de Transacciones y Conexión a Base de Datos

```php
    try{
        require_once "dbh.inc.php"; 
        
        
        $pdo->beginTransaction();
```

**Líneas 23-27:**
- Inicia bloque try-catch para manejo de errores
- Incluye archivo de configuración de base de datos
- **Inicia una transacción**: Esto es crítico para mantener consistencia de datos al actualizar múltiples tablas relacionadas

### 4. Obtención de IDs Relacionados

```php
        // 1. Obtener los IDs relacionados del servicio actual
        $queryObtenerIDs = "SELECT 
            s.garantia_idGarantia,
            s.pagoCliente_idPagoCliente,
            pc.pago_idPago,
            pc.metodoPago_idMetodoPago as metodoPago_actual
        FROM servicio s
        JOIN pagoCliente pc ON s.pagoCliente_idPagoCliente = pc.idPagoCliente
        WHERE s.codigoServicio = :codigoServicio";
```

**Líneas 29-36:** Consulta SQL para obtener IDs de registros relacionados:
- `garantia_idGarantia`: ID de la garantía asociada
- `pagoCliente_idPagoCliente`: ID del registro de pago del cliente
- `pago_idPago`: ID del pago específico
- `metodoPago_actual`: Método de pago actual (para comparar si cambió)

```php
        $stmtObtener = $pdo->prepare($queryObtenerIDs);
        $stmtObtener->bindParam(":codigoServicio", $codigoServicio);
        $stmtObtener->execute();
        $idsRelacionados = $stmtObtener->fetch(PDO::FETCH_ASSOC);
```

**Líneas 38-41:**
- Prepara la consulta SQL para ejecución segura
- Vincula el parámetro del código de servicio
- Ejecuta la consulta
- Obtiene el resultado como array asociativo

```php
        if (!$idsRelacionados) {
            throw new Exception("No se encontró el servicio especificado.");
        }
```

**Líneas 43-45:** Validación de existencia del servicio, lanza excepción si no se encuentra

### 5. Actualización de la Tabla Principal (Servicio)

```php
        // 2. Actualizar el servicio principal
        $queryServicio = "UPDATE servicio SET 
            fechaIngreso = :fechaIngreso,
            estado = :estado,
            descripcionFalla = :descripcionFalla,
            tecnico_idTecnico = :tecnico_id,
            tipoElectrodomestico_idTipoElectrodomestico = :tipoElectrodomestico_id,
            tipoServicio_idTipoServicio = :tipoServicio_id
        WHERE codigoServicio = :codigoServicio";
```

**Líneas 47-55:** Consulta UPDATE para la tabla `servicio` con los campos editables:
- Actualiza fecha de ingreso, estado, descripción de falla
- Actualiza referencias a técnico, tipo de electrodoméstico y tipo de servicio
- Utiliza parámetros nombrados para seguridad

```php
        $stmtServicio = $pdo->prepare($queryServicio);
        $stmtServicio->bindParam(":fechaIngreso", $fechaIngreso);
        $stmtServicio->bindParam(":estado", $estado);
        $stmtServicio->bindParam(":descripcionFalla", $descripcionFalla);
        $stmtServicio->bindParam(":tecnico_id", $tecnico_id);
        $stmtServicio->bindParam(":tipoElectrodomestico_id", $tipoElectrodomestico_id);
        $stmtServicio->bindParam(":tipoServicio_id", $tipoServicio_id);
        $stmtServicio->bindParam(":codigoServicio", $codigoServicio);
        $stmtServicio->execute();
```

**Líneas 57-65:**
- Prepara la consulta de actualización
- Vincula todos los parámetros a sus respectivas variables
- Ejecuta la actualización de la tabla servicio

### 6. Actualización de Garantía (Condicional)

```php
        // 3. Actualizar la garantía
        if (!empty($inicioGarantia) && !empty($finGarantia)) {
            $queryGarantia = "UPDATE garantia SET 
                inicioGarantia = :inicioGarantia,
                finGarantia = :finGarantia,
                tycGarantia = :tycGarantia
            WHERE idGarantia = :idGarantia";
```

**Líneas 67-73:**
- Verifica que las fechas de garantía no estén vacías
- Consulta UPDATE para la tabla `garantia`
- Actualiza fechas de inicio, fin y términos y condiciones

```php
            $stmtGarantia = $pdo->prepare($queryGarantia);
            $stmtGarantia->bindParam(":inicioGarantia", $inicioGarantia);
            $stmtGarantia->bindParam(":finGarantia", $finGarantia);
            $stmtGarantia->bindParam(":tycGarantia", $tycGarantia);
            $stmtGarantia->bindParam(":idGarantia", $idsRelacionados['garantia_idGarantia']);
            $stmtGarantia->execute();
        }
```

**Líneas 75-81:**
- Prepara y ejecuta la actualización de garantía
- Utiliza el ID de garantía obtenido en la consulta inicial
- Solo se ejecuta si hay fechas válidas de garantía

### 7. Actualización de Información de Pago

```php
        // 4. Actualizar el pago
        $queryPago = "UPDATE pago SET 
            cantidad = :cantidad,
            estado = :estadoPago
        WHERE idPago = :idPago";
```

**Líneas 83-87:** Consulta UPDATE para la tabla `pago`, actualizando cantidad y estado del pago

```php
        $stmtPago = $pdo->prepare($queryPago);
        $stmtPago->bindParam(":cantidad", $cantidad);
        $stmtPago->bindParam(":estadoPago", $estadoPago);
        $stmtPago->bindParam(":idPago", $idsRelacionados['pago_idPago']);
        $stmtPago->execute();
```

**Líneas 89-93:**
- Prepara y ejecuta la actualización del pago
- Utiliza el ID de pago obtenido en la consulta inicial

### 8. Actualización Condicional del Método de Pago

```php
        // 5. Actualizar el método de pago si ha cambiado
        if ($metodoPago_id != $idsRelacionados['metodoPago_actual']) {
            $queryMetodoPago = "UPDATE pagoCliente SET 
                metodoPago_idMetodoPago = :metodoPago_id
            WHERE idPagoCliente = :idPagoCliente";
```

**Líneas 95-99:**
- Compara el método de pago nuevo con el actual
- Solo actualiza si hay cambio (optimización de rendimiento)
- Consulta UPDATE para la tabla `pagoCliente`

```php
            $stmtMetodoPago = $pdo->prepare($queryMetodoPago);
            $stmtMetodoPago->bindParam(":metodoPago_id", $metodoPago_id);
            $stmtMetodoPago->bindParam(":idPagoCliente", $idsRelacionados['pagoCliente_idPagoCliente']);
            $stmtMetodoPago->execute();
        }
```

**Líneas 101-105:**
- Prepara y ejecuta la actualización del método de pago
- Solo se ejecuta si el método de pago ha cambiado

### 9. Confirmación de Transacción y Redirección Exitosa

```php
        // Confirmar transacción
        $pdo->commit();
        $pdo = null;
```

**Líneas 107-109:**
- **Confirma la transacción**: Hace permanentes todos los cambios realizados
- Cierra la conexión a la base de datos

```php
        // Establecer mensaje de éxito en sesión
        $_SESSION['mensaje'] = "Servicio actualizado exitosamente. Código: " . $codigoServicio;
        
        // Redirigir de vuelta a la página del CRUD
        header("Location: crud.php");
        exit();
```

**Líneas 111-116:**
- Establece mensaje de éxito en la sesión (se mostrará en la página CRUD)
- Redirige al usuario de vuelta a la página principal del CRUD
- `exit()` asegura que no se ejecute código adicional

### 10. Manejo de Errores PDO

```php
    } catch (PDOException $e) {
       
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        error_log("Error en editar_servicio.php: " . $e->getMessage());
        
        $_SESSION['error'] = "Error al actualizar el servicio: " . $e->getMessage();
        header("Location: crud.php"); 
        exit();
```

**Líneas 118-127:**
- Captura errores específicos de PDO (base de datos)
- Verifica si hay una transacción activa y la revierte
- **Rollback**: Deshace todos los cambios realizados en la transacción
- Registra el error en el log del servidor
- Establece mensaje de error en la sesión
- Redirige de vuelta al CRUD

### 11. Manejo de Errores Generales

```php
    } catch (Exception $e) {
        
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        error_log("Error en editar_servicio.php: " . $e->getMessage());
        
        $_SESSION['error'] = "Error: " . $e->getMessage();
        header("Location: crud.php"); 
        exit();
    }
```

**Líneas 129-139:**
- Captura cualquier otro tipo de excepción
- Realiza rollback si hay transacción activa
- Registra el error y redirige con mensaje de error

### 12. Protección Contra Acceso Directo

```php
} else {
    $_SESSION['error'] = "Acceso no autorizado";
    header("Location: crud.php"); 
    exit();
}
?>
```

**Líneas 140-144:**
- Se ejecuta si el método de solicitud no es POST
- Previene acceso directo al archivo
- Establece mensaje de error y redirige

## Características Técnicas Avanzadas

### 1. Transacciones ACID
- **Atomicidad**: Todas las operaciones se completan o ninguna se realiza
- **Consistencia**: Los datos mantienen su integridad referencial
- **Aislamiento**: Las operaciones no interfieren entre sí
- **Durabilidad**: Los cambios confirmados son permanentes

### 2. Seguridad Implementada

#### Consultas Preparadas
- Todos los queries utilizan parámetros vinculados
- Previene inyección SQL completamente
- Mejora el rendimiento al reutilizar planes de ejecución

#### Validación de Métodos
- Solo acepta solicitudes POST
- Previene acceso directo no autorizado
- Protege contra solicitudes malformadas

#### Manejo de Errores Robusto
- Logging de errores para auditoría
- Rollback automático en caso de fallo
- Mensajes de error controlados para el usuario

### 3. Optimizaciones de Rendimiento

#### Actualización Condicional
```php
if ($metodoPago_id != $idsRelacionados['metodoPago_actual']) {
```
- Solo actualiza el método de pago si realmente cambió
- Reduce carga innecesaria en la base de datos

#### Consulta Única para IDs
- Una sola consulta obtiene todos los IDs relacionados
- Minimiza el número de consultas a la base de datos

#### Validación Temprana
```php
if (!$idsRelacionados) {
    throw new Exception("No se encontró el servicio especificado.");
}
```
- Valida la existencia del servicio antes de proceder
- Evita operaciones innecesarias si el servicio no existe

