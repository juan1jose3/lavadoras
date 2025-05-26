# README - Documentación Completa del Script insert.php

## Descripción General
Este script PHP procesa formularios POST para crear servicios técnicos de electrodomésticos. Implementa un sistema de transacciones para garantizar la integridad de los datos al insertar información en múltiples tablas relacionadas.

## Documentación Línea por Línea

### Línea 1: Etiqueta de Apertura PHP
```php
<?php
```
**Función:** Inicia el bloque de código PHP.

### Línea 2: Validación del Método de Solicitud
```php
if($_SERVER["REQUEST_METHOD"] == "POST"){
```
**Función:** Verifica que la solicitud HTTP sea de tipo POST. Solo procesa el formulario si se envió mediante POST.

## Sección: Captura de Datos del Cliente (Líneas 3-9)

### Línea 3: Captura de Cédula
```php
    $cedula = $_POST["cedula"];
```
**Función:** Obtiene la cédula del cliente desde el formulario POST y la almacena en la variable `$cedula`.

### Línea 4: Captura de Nombres
```php
    $nombres = $_POST["nombres"];
```
**Función:** Obtiene los nombres del cliente desde el formulario POST.

### Línea 5: Captura de Apellidos
```php
    $apellidos = $_POST["apellidos"];
```
**Función:** Obtiene los apellidos del cliente desde el formulario POST.

### Línea 6: Captura de Teléfono
```php
    $telefono = $_POST["telefono"];
```
**Función:** Obtiene el número de teléfono del cliente desde el formulario POST.

### Línea 7: Captura de Dirección
```php
    $direccion = $_POST["direccion"];
```
**Función:** Obtiene la dirección del cliente desde el formulario POST.

### Línea 8: Captura de Correo Electrónico
```php
    $correo = $_POST["correo"];
```
**Función:** Obtiene el correo electrónico del cliente desde el formulario POST.

### Línea 9: Captura de Localidad
```php
    $localidad = $_POST["localidad"];
```
**Función:** Obtiene la localidad/ciudad del cliente desde el formulario POST.

## Sección: Captura de Datos del Electrodoméstico (Líneas 11-16)

### Línea 11: Captura de Tipo de Electrodoméstico
```php
    $electro = $_POST["electro"];
```
**Función:** Obtiene el ID del tipo de electrodoméstico desde el formulario POST.

### Línea 12: Captura de Tipo de Servicio
```php
    $servicio = $_POST["servicio"];
```
**Función:** Obtiene el ID del tipo de servicio requerido desde el formulario POST.

### Línea 13: Captura de Marca
```php
    $marca = $_POST["marca"];
```
**Función:** Obtiene la marca del electrodoméstico desde el formulario POST.

### Línea 14: Captura de Modelo (Con Valor Por Defecto)
```php
    $modelo = $_POST["modelo"] ?? ""; 
```
**Función:** Obtiene el modelo del electrodoméstico. Usa el operador null coalescing (`??`) para asignar una cadena vacía si el campo está vacío o no existe.

### Línea 15: Captura de Descripción del Problema
```php
    $des = $_POST["des"];
```
**Función:** Obtiene la descripción de la falla o problema del electrodoméstico.

## Sección: Captura de Coordenadas de Ubicación (Líneas 17-20)

### Línea 17: Captura de Latitud
```php
    $latitud = $_POST["latitud"];
```
**Función:** Obtiene la coordenada de latitud de la ubicación del cliente.

### Línea 18: Captura de Longitud
```php
    $longitud = $_POST["longitud"];
```
**Función:** Obtiene la coordenada de longitud de la ubicación del cliente.

## Sección: Captura de Método de Pago (Líneas 20-21)

### Línea 20: Captura de Método de Pago
```php
    $metodoPago = $_POST["metodoPago"];
```
**Función:** Obtiene el ID del método de pago seleccionado por el cliente.

## Sección: Manejo de Transacciones y Base de Datos (Líneas 22-24)

### Línea 22: Inicio del Bloque Try-Catch
```php
    try{
```
**Función:** Inicia un bloque try-catch para manejo de excepciones durante las operaciones de base de datos.

### Línea 23: Inclusión del Archivo de Conexión
```php
        require_once "dbh.inc.php";
```
**Función:** Incluye el archivo que contiene la configuración y conexión a la base de datos. `require_once` garantiza que se incluya solo una vez.

### Línea 24: Inicio de Transacción
```php
        $pdo->beginTransaction();
```
**Función:** Inicia una transacción de base de datos. Todas las operaciones posteriores se ejecutarán como una unidad atómica.

## Sección: Inserción de Ubicación (Líneas 26-36)

### Línea 26: Comentario Explicativo
```php
        // 1. Insertar ubicación
```
**Función:** Comentario que documenta el paso 1 del proceso.

### Línea 27-28: Query de Inserción de Ubicación
```php
        $query1 = "INSERT INTO ubicacion(direccion, localidad, latitud, longitud)
        VALUES(:direccion, :localidad, :latitud, :longitud)";
```
**Función:** Define la consulta SQL preparada para insertar un nuevo registro en la tabla `ubicacion`.

### Línea 30: Preparación de la Consulta
```php
        $stmt1 = $pdo->prepare($query1);
```
**Función:** Prepara la consulta SQL para ejecución, creando un statement preparado.

### Línea 31-34: Vinculación de Parámetros
```php
        $stmt1->bindParam(":direccion", $direccion);
        $stmt1->bindParam(":localidad", $localidad);
        $stmt1->bindParam(":latitud", $latitud);
        $stmt1->bindParam(":longitud", $longitud);
```
**Función:** Vincula las variables PHP con los parámetros nombrados en la consulta SQL para prevenir inyección SQL.

### Línea 35: Ejecución de la Consulta
```php
        $stmt1->execute();
```
**Función:** Ejecuta la consulta preparada para insertar la ubicación en la base de datos.

### Línea 37: Obtención del ID Generado
```php
        $idUbicacion = $pdo->lastInsertId();
```
**Función:** Obtiene el ID auto-generado de la ubicación recién insertada para usarlo como clave foránea.

## Sección: Inserción de Cliente (Líneas 39-49)

### Línea 39: Comentario Explicativo
```php
        // 2. Insertar cliente
```
**Función:** Comentario que documenta el paso 2 del proceso.

### Línea 40-41: Query de Inserción de Cliente
```php
        $query2 = "INSERT INTO cliente(cedula, nombres, apellidos, telefono, correo, ubicacion_idUbicacion)
        VALUES(:cedula, :nombres, :apellidos, :telefono, :correo, :ubicacion_idUbicacion)";
```
**Función:** Define la consulta SQL para insertar un nuevo cliente, vinculándolo con la ubicación creada anteriormente.

### Línea 43: Preparación de la Consulta
```php
        $stmt2 = $pdo->prepare($query2);
```
**Función:** Prepara la consulta de inserción de cliente.

### Línea 44-49: Vinculación de Parámetros del Cliente
```php
        $stmt2->bindParam(":cedula", $cedula);
        $stmt2->bindParam(":nombres", $nombres);
        $stmt2->bindParam(":apellidos", $apellidos);
        $stmt2->bindParam(":telefono", $telefono);
        $stmt2->bindParam(":correo", $correo);
        $stmt2->bindParam(":ubicacion_idUbicacion", $idUbicacion);
```
**Función:** Vincula todos los datos del cliente con la consulta, incluyendo el ID de ubicación obtenido en el paso anterior.

### Línea 50: Ejecución de Inserción de Cliente
```php
        $stmt2->execute();
```
**Función:** Ejecuta la inserción del cliente en la base de datos.

## Sección: Inserción de Electrodoméstico (Líneas 52-62)

### Línea 52: Comentario Explicativo
```php
        // 3. Insertar electrodoméstico
```
**Función:** Comentario que documenta el paso 3 del proceso.

### Línea 53-54: Query de Inserción de Electrodoméstico
```php
        $query3 = "INSERT INTO electrodomestico(marca, modelo, tipoElectrodomestico_idTipoElectrodomestico, cliente_cedula)
        VALUES(:marca, :modelo, :tipoElectrodomestico_idTipoElectrodomestico, :cliente_cedula)";
```
**Función:** Define la consulta para insertar el electrodoméstico, vinculándolo con el cliente y su tipo.

### Línea 56: Preparación de la Consulta
```php
        $stmt3 = $pdo->prepare($query3);
```
**Función:** Prepara la consulta de inserción de electrodoméstico.

### Línea 57-60: Vinculación de Parámetros del Electrodoméstico
```php
        $stmt3->bindParam(":marca", $marca);
        $stmt3->bindParam(":modelo", $modelo);
        $stmt3->bindParam(":tipoElectrodomestico_idTipoElectrodomestico", $electro);
        $stmt3->bindParam(":cliente_cedula", $cedula);
```
**Función:** Vincula los datos del electrodoméstico con la consulta.

### Línea 61: Ejecución de Inserción de Electrodoméstico
```php
        $stmt3->execute();
```
**Función:** Ejecuta la inserción del electrodoméstico en la base de datos.

## Sección: Creación de Garantía (Líneas 63-81)

### Línea 63: Comentario Explicativo
```php
        // 4. Crear garantía
```
**Función:** Comentario que documenta el paso 4 del proceso.

### Línea 64: Fecha de Inicio de Garantía
```php
        $inicioGarantia = date("Y-m-d");
```
**Función:** Establece la fecha actual como inicio de la garantía en formato YYYY-MM-DD.

### Línea 65: Términos y Condiciones de Garantía
```php
        $tycGarantia = "Garantía de 90 días por servicio técnico";
```
**Función:** Define el texto de los términos y condiciones de la garantía.

### Línea 66-68: Cálculo de Fecha de Fin de Garantía
```php
        $fechaFin = new DateTime($inicioGarantia);
        $fechaFin->modify('+90 days');
        $finGarantia = $fechaFin->format('Y-m-d');
```
**Función:** Crea un objeto DateTime, le suma 90 días y formatea la fecha de fin de garantía.

### Línea 70-71: Query de Inserción de Garantía
```php
        $queryGarantia = "INSERT INTO garantia (inicioGarantia, tycGarantia, finGarantia)
        VALUES (:inicioGarantia, :tycGarantia, :finGarantia)";
```
**Función:** Define la consulta para insertar la garantía con sus fechas y términos.

### Línea 73: Preparación de Consulta de Garantía
```php
        $stmtGarantia = $pdo->prepare($queryGarantia);
```
**Función:** Prepara la consulta de inserción de garantía.

### Línea 74-76: Vinculación de Parámetros de Garantía
```php
        $stmtGarantia->bindParam(":inicioGarantia", $inicioGarantia);
        $stmtGarantia->bindParam(":tycGarantia", $tycGarantia);
        $stmtGarantia->bindParam(":finGarantia", $finGarantia);
```
**Función:** Vincula las fechas y términos de garantía con la consulta.

### Línea 77: Ejecución de Inserción de Garantía
```php
        $stmtGarantia->execute();
```
**Función:** Ejecuta la inserción de la garantía en la base de datos.

### Línea 79: Obtención del ID de Garantía
```php
        $idGarantia = $pdo->lastInsertId();
```
**Función:** Obtiene el ID auto-generado de la garantía recién creada.

## Sección: Creación de Pago (Líneas 81-94)

### Línea 81: Comentario Explicativo
```php
        // 5. Crear pago
```
**Función:** Comentario que documenta el paso 5 del proceso.

### Línea 82-84: Definición de Datos de Pago
```php
        $cantidad = 100; 
        $fechaPago = date("Y-m-d");
        $estado = "completado";
```
**Función:** Establece los valores del pago: cantidad fija de 100, fecha actual y estado completado.

### Línea 86-87: Query de Inserción de Pago
```php
        $queryPago = "INSERT INTO pago (cantidad, fecha, estado) 
        VALUES (:cantidad, :fecha, :estado)";
```
**Función:** Define la consulta para insertar el registro de pago.

### Línea 89: Preparación de Consulta de Pago
```php
        $stmtPago = $pdo->prepare($queryPago);
```
**Función:** Prepara la consulta de inserción de pago.

### Línea 90-92: Vinculación de Parámetros de Pago
```php
        $stmtPago->bindParam(":cantidad", $cantidad);
        $stmtPago->bindParam(":fecha", $fechaPago);
        $stmtPago->bindParam(":estado", $estado);
```
**Función:** Vincula los datos del pago con la consulta.

### Línea 93: Ejecución de Inserción de Pago
```php
        $stmtPago->execute();
```
**Función:** Ejecuta la inserción del pago en la base de datos.

### Línea 95: Obtención del ID de Pago
```php
        $idPago = $pdo->lastInsertId();
```
**Función:** Obtiene el ID auto-generado del pago recién creado.

## Sección: Creación de Relación Pago-Cliente (Líneas 97-106)

### Línea 97: Comentario Explicativo
```php
        // 6. Crear relación pago-cliente
```
**Función:** Comentario que documenta el paso 6 del proceso.

### Línea 98-99: Query de Relación Pago-Cliente
```php
        $queryPagoCliente = "INSERT INTO pagoCliente (metodoPago_idMetodoPago, pago_idPago, cliente_cedula)
        VALUES (:metodoPago, :pago, :cedula)";
```
**Función:** Define la consulta para crear la relación entre pago, método de pago y cliente.

### Línea 101: Preparación de Consulta de Relación
```php
        $stmtPagoCliente = $pdo->prepare($queryPagoCliente);
```
**Función:** Prepara la consulta de relación pago-cliente.

### Línea 102-104: Vinculación de Parámetros de Relación
```php
        $stmtPagoCliente->bindParam(":metodoPago", $metodoPago);
        $stmtPagoCliente->bindParam(":pago", $idPago);
        $stmtPagoCliente->bindParam(":cedula", $cedula);
```
**Función:** Vincula el método de pago, ID de pago y cédula del cliente.

### Línea 105: Ejecución de Inserción de Relación
```php
        $stmtPagoCliente->execute();
```
**Función:** Ejecuta la creación de la relación pago-cliente.

### Línea 107: Obtención del ID de Relación Pago-Cliente
```php
        $idPagoCliente = $pdo->lastInsertId();
```
**Función:** Obtiene el ID de la relación pago-cliente recién creada.

## Sección: Asignación de Técnico (Líneas 109-125)

### Línea 109: Comentario Explicativo
```php
        // 7. Asignar técnico disponible
```
**Función:** Comentario que documenta el paso 7 del proceso.

### Línea 110-115: Query de Selección de Técnico
```php
        $queryTec = "
        SELECT t.idTecnico 
        FROM tecnico t
        JOIN disponibilidad d ON t.disponibilidad_idDisponibilidad = d.idDisponibilidad
        ORDER BY d.serviciosAsignados ASC
        LIMIT 1";
```
**Función:** Consulta que selecciona el técnico con menos servicios asignados (distribución de carga equilibrada).

### Línea 117: Preparación de Consulta de Técnico
```php
        $stmtTec = $pdo->prepare($queryTec);
```
**Función:** Prepara la consulta de selección de técnico.

### Línea 118: Ejecución de Consulta de Técnico
```php
        $stmtTec->execute();
```
**Función:** Ejecuta la consulta para obtener el técnico disponible.

### Línea 119: Obtención de Datos del Técnico
```php
        $tecnico = $stmtTec->fetch(PDO::FETCH_ASSOC);
```
**Función:** Obtiene los datos del técnico como array asociativo.

### Línea 121-123: Validación de Disponibilidad de Técnico
```php
        if (!$tecnico) {
            throw new Exception("No hay técnicos disponibles en este momento.");
        }
```
**Función:** Verifica si hay técnicos disponibles, lanza excepción si no los hay.

### Línea 125: Extracción del ID de Técnico
```php
        $idTecnico = $tecnico['idTecnico'];
```
**Función:** Obtiene el ID del técnico seleccionado del array de resultados.

### Línea 126-127: Extracción de Datos de Disponibilidad
```php
        $idDisponibilidad = $tecnico['idDisponibilidad'];
        $serviciosActuales = $tecnico['serviciosAsignados'];
```
**Función:** Obtiene el ID de disponibilidad y el número actual de servicios asignados al técnico.

## Sección: Actualización de Contador de Servicios (Líneas 129-140)

### Línea 129: Comentario Explicativo
```php
        // 8. Actualizar contador de servicios del técnico
```
**Función:** Comentario que documenta el paso 8 del proceso.

### Línea 130: Cálculo de Nuevo Valor
```php
        $nuevoValor = $serviciosActuales + 1;
```
**Función:** Incrementa en 1 el contador de servicios asignados al técnico.

### Línea 132-135: Query de Actualización de Servicios
```php
        $queryUpdateServicios = "
        UPDATE disponibilidad
        SET serviciosAsignados = :nuevoValor
        WHERE idDisponibilidad = :idDisponibilidad";
```
**Función:** Define la consulta para actualizar el contador de servicios del técnico.

### Línea 137: Preparación de Consulta de Actualización
```php
        $stmtUpdate = $pdo->prepare($queryUpdateServicios);
```
**Función:** Prepara la consulta de actualización.

### Línea 138-139: Vinculación de Parámetros de Actualización
```php
        $stmtUpdate->bindParam(":nuevoValor", $nuevoValor);
        $stmtUpdate->bindParam(":idDisponibilidad", $idDisponibilidad);
```
**Función:** Vincula el nuevo valor y el ID de disponibilidad con la consulta.

### Línea 140: Ejecución de Actualización
```php
        $stmtUpdate->execute();
```
**Función:** Ejecuta la actualización del contador de servicios.

## Sección: Creación del Servicio Principal (Líneas 142-171)

### Línea 142: Comentario Explicativo
```php
        // 9. Crear el servicio principal
```
**Función:** Comentario que documenta el paso 9 del proceso.

### Línea 143-144: Definición de Datos del Servicio
```php
        $fechaIngreso = date("Y-m-d H:i:s");
        $estadoServicio = "Pendiente";
```
**Función:** Establece la fecha y hora actual de ingreso del servicio y su estado inicial.

### Línea 146-158: Query de Inserción de Servicio
```php
        $queryServicio = "INSERT INTO servicio (
            fechaIngreso, 
            estado, 
            descripcionFalla, 
            cliente_cedula, 
            tecnico_idTecnico,
            garantia_idGarantia, 
            tipoElectrodomestico_idTipoElectrodomestico,
            tipoServicio_idTipoServicio, 
            pagoCliente_idPagoCliente
        ) VALUES (
            :fechaIngreso, 
            :estado, 
            :descripcionFalla, 
            :cliente_cedula, 
            :tecnico_idTecnico,
            :garantia_idGarantia, 
            :tipoElectrodomestico_id, 
            :tipoServicio_id, 
            :pagoCliente_id
        )";
```
**Función:** Define la consulta completa para insertar el servicio, relacionando todos los elementos creados anteriormente.

### Línea 160: Preparación de Consulta de Servicio
```php
        $stmtServicio = $pdo->prepare($queryServicio);
```
**Función:** Prepara la consulta de inserción de servicio.

### Línea 161-170: Vinculación de Parámetros del Servicio
```php
        $stmtServicio->bindParam(":fechaIngreso", $fechaIngreso);
        $stmtServicio->bindParam(":estado", $estadoServicio);
        $stmtServicio->bindParam(":descripcionFalla", $des);
        $stmtServicio->bindParam(":cliente_cedula", $cedula);
        $stmtServicio->bindParam(":tecnico_idTecnico", $idTecnico);
        $stmtServicio->bindParam(":garantia_idGarantia", $idGarantia);
        $stmtServicio->bindParam(":tipoElectrodomestico_id", $electro);
        $stmtServicio->bindParam(":tipoServicio_id", $servicio);
        $stmtServicio->bindParam(":pagoCliente_id", $idPagoCliente);
```
**Función:** Vincula todos los datos y IDs obtenidos en pasos anteriores con la consulta de servicio.

### Línea 171: Ejecución de Inserción de Servicio
```php
        $stmtServicio->execute();
```
**Función:** Ejecuta la inserción del servicio principal en la base de datos.

### Línea 173: Obtención del ID del Servicio
```php
        $idServicio = $pdo->lastInsertId();
```
**Función:** Obtiene el ID auto-generado del servicio recién creado.

## Sección: Creación de Historial de Cliente (Líneas 175-181)

### Línea 176-177: Query de Inserción de Historial
```php
        $queryHistorial = "INSERT INTO historialcliente (cliente_cedula,servicio_codigoServicio)
        VALUES( :cedula, :codigoServicio);";
```
**Función:** Define la consulta para insertar el servicio en el historial del cliente.

### Línea 178: Preparación de Consulta de Historial
```php
        $stmtHistorial = $pdo->prepare($queryHistorial);
```
**Función:** Prepara la consulta de inserción de historial.

### Línea 180-181: Vinculación de Parámetros de Historial
```php
        $stmtHistorial->bindParam(":cedula",$cedula);
        $stmtHistorial->bindParam(":codigoServicio",$idServicio);
```
**Función:** Vincula la cédula del cliente y el código del servicio con la consulta.

### Línea 182: Ejecución de Inserción de Historial
```php
        $stmtHistorial->execute();
```
**Función:** Ejecuta la inserción del registro en el historial del cliente.

## Sección: Confirmación y Finalización (Líneas 184-189)

### Línea 184: Comentario Explicativo
```php
        // Confirmar transacción
```
**Función:** Comentario que indica la confirmación de la transacción.

### Línea 185: Confirmación de Transacción
```php
        $pdo->commit();
```
**Función:** Confirma todas las operaciones de la transacción, haciéndolas permanentes en la base de datos.

### Línea 186: Cierre de Conexión
```php
        $pdo = null;
```
**Función:** Libera la conexión a la base de datos asignando null al objeto PDO.

### Línea 188-189: Mensaje de Éxito y Redirección
```php
        // Redireccionar con mensaje de éxito
        echo "<script>alert('Servicio creado exitosamente. Código: " . $idServicio . "'); window.location.href='../form.php';</script>";
```
**Función:** Muestra un mensaje de alerta con el código del servicio creado y redirige al formulario principal.

## Sección: Manejo de Excepciones PDO (Líneas 191-197)

### Línea 191: Captura de Excepciones PDO
```php
    } catch (PDOException $e) {
```
**Función:** Captura específicamente errores relacionados con operaciones de base de datos.

### Línea 192: Comentario de Reversión
```php
        // Revertir cambios en caso de error
```
**Función:** Comentario explicativo sobre la reversión de transacción.

### Línea 193: Reversión de Transacción
```php
        $pdo->rollBack();
```
**Función:** Revierte todos los cambios realizados en la transacción en caso de error.

### Línea 194: Registro de Error en Log
```php
        error_log("Error en insert.php: " . $e->getMessage());
```
**Función:** Registra el error en el log del servidor para depuración.

### Línea 196: Mensaje de Error PDO
```php
        echo "<script>alert('Error al crear el servicio: " . addslashes($e->getMessage()) . "'); window.history.back();</script>";
```
**Función:** Muestra un mensaje de error al usuario y regresa a la página anterior. Usa `addslashes()` para escapar caracteres especiales.

## Sección: Manejo de Excepciones Generales (Líneas 198-204)

### Línea 198: Captura de Excepciones Generales
```php
    } catch (Exception $e) {
```
**Función:** Captura cualquier otra excepción no relacionada específicamente con PDO.

### Línea 199: Comentario de Reversión
```php
        // Revertir cambios en caso de error
```
**Función:** Comentario explicativo sobre la reversión de transacción.

### Línea 200: Reversión de Transacción
```php
        $pdo->rollBack();
```
**Función:** Revierte la transacción para mantener consistencia de datos.

### Línea 201: Registro de Error General
```php
        error_log("Error en insert.php: " . $e->getMessage());
```
**Función:** Registra el error general en el log del servidor.

### Línea 203: Mensaje de Error General
```php
        echo "<script>alert('Error: " . addslashes($e->getMessage()) . "'); window.history.back();</script>";
```
**Función:** Muestra el mensaje de error genérico al usuario y regresa a la página anterior.

## Sección: Validación de Método HTTP (Líneas 205-207)

### Línea 205: Bloque Else para Métodos No POST
```php
    } else {
```
**Función:** Maneja el caso cuando la solicitud no es de tipo POST.

### Línea 206: Mensaje de Acceso No Autorizado
```php
        echo "<script>alert('Acceso no autorizado'); window.location.href='./index.html';</script>";
```
**Función:** Muestra mensaje de error y redirige al index si se intenta acceder con método diferente a POST.

### Línea 207: Cierre de Condicional Principal
```php
    }
```
**Función:** Cierra el bloque condicional que verifica el método POST.

### Línea 208: Cierre de Etiqueta PHP
```php
?>
```
`