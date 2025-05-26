<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Datos del cliente
    $cedula = $_POST["cedula"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $correo = $_POST["correo"];
    $localidad = $_POST["localidad"];
    
    // Datos electrodoméstico
    $electro = $_POST["electro"];
    $servicio = $_POST["servicio"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"] ?? ""; 
    $des = $_POST["des"];

    // Latitud y longitud
    $latitud = $_POST["latitud"];
    $longitud = $_POST["longitud"];

    // Método de Pago
    $metodoPago = $_POST["metodoPago"];

    try{
        require_once "dbh.inc.php";
        
        // Iniciar transacción
        $pdo->beginTransaction();

        // 1. Insertar ubicación
        $query1 = "INSERT INTO ubicacion(direccion, localidad, latitud, longitud)
        VALUES(:direccion, :localidad, :latitud, :longitud)";

        $stmt1 = $pdo->prepare($query1);
        $stmt1->bindParam(":direccion", $direccion);
        $stmt1->bindParam(":localidad", $localidad);
        $stmt1->bindParam(":latitud", $latitud);
        $stmt1->bindParam(":longitud", $longitud);
        $stmt1->execute();

        $idUbicacion = $pdo->lastInsertId();

        // 2. Insertar cliente
        $query2 = "INSERT INTO cliente(cedula, nombres, apellidos, telefono, correo, ubicacion_idUbicacion)
        VALUES(:cedula, :nombres, :apellidos, :telefono, :correo, :ubicacion_idUbicacion)";

        $stmt2 = $pdo->prepare($query2);
        $stmt2->bindParam(":cedula", $cedula);
        $stmt2->bindParam(":nombres", $nombres);
        $stmt2->bindParam(":apellidos", $apellidos);
        $stmt2->bindParam(":telefono", $telefono);
        $stmt2->bindParam(":correo", $correo);
        $stmt2->bindParam(":ubicacion_idUbicacion", $idUbicacion);
        $stmt2->execute();

        // 3. Insertar electrodoméstico
        $query3 = "INSERT INTO electrodomestico(marca, modelo, tipoElectrodomestico_idTipoElectrodomestico, cliente_cedula)
        VALUES(:marca, :modelo, :tipoElectrodomestico_idTipoElectrodomestico, :cliente_cedula)";

        $stmt3 = $pdo->prepare($query3);
        $stmt3->bindParam(":marca", $marca);
        $stmt3->bindParam(":modelo", $modelo);
        $stmt3->bindParam(":tipoElectrodomestico_idTipoElectrodomestico", $electro);
        $stmt3->bindParam(":cliente_cedula", $cedula);
        $stmt3->execute();

        // 4. Crear garantía
        $inicioGarantia = date("Y-m-d");
        $tycGarantia = "Garantía de 90 días por servicio técnico";
        
        $fechaFin = new DateTime($inicioGarantia);
        $fechaFin->modify('+90 days');
        $finGarantia = $fechaFin->format('Y-m-d');

        $queryGarantia = "INSERT INTO garantia (inicioGarantia, tycGarantia, finGarantia)
        VALUES (:inicioGarantia, :tycGarantia, :finGarantia)";

        $stmtGarantia = $pdo->prepare($queryGarantia);
        $stmtGarantia->bindParam(":inicioGarantia", $inicioGarantia);
        $stmtGarantia->bindParam(":tycGarantia", $tycGarantia);
        $stmtGarantia->bindParam(":finGarantia", $finGarantia);
        $stmtGarantia->execute();

        $idGarantia = $pdo->lastInsertId();

        // 5. Crear pago
        $cantidad = 100; 
        $fechaPago = date("Y-m-d");
        $estado = "completado";

        $queryPago = "INSERT INTO pago (cantidad, fecha, estado) 
        VALUES (:cantidad, :fecha, :estado)";
        
        $stmtPago = $pdo->prepare($queryPago);
        $stmtPago->bindParam(":cantidad", $cantidad);
        $stmtPago->bindParam(":fecha", $fechaPago);
        $stmtPago->bindParam(":estado", $estado);
        $stmtPago->execute();

        $idPago = $pdo->lastInsertId();

        // 6. Crear relación pago-cliente
        $queryPagoCliente = "INSERT INTO pagoCliente (metodoPago_idMetodoPago, pago_idPago, cliente_cedula)
        VALUES (:metodoPago, :pago, :cedula)";

        $stmtPagoCliente = $pdo->prepare($queryPagoCliente);
        $stmtPagoCliente->bindParam(":metodoPago", $metodoPago);
        $stmtPagoCliente->bindParam(":pago", $idPago);
        $stmtPagoCliente->bindParam(":cedula", $cedula);
        $stmtPagoCliente->execute();

        $idPagoCliente = $pdo->lastInsertId();

        // 7. Asignar técnico disponible
        $queryTec = "
        SELECT t.idTecnico 
        FROM tecnico t
        JOIN disponibilidad d ON t.disponibilidad_idDisponibilidad = d.idDisponibilidad
        ORDER BY d.serviciosAsignados ASC
        LIMIT 1";

        $stmtTec = $pdo->prepare($queryTec);
        $stmtTec->execute();
        $tecnico = $stmtTec->fetch(PDO::FETCH_ASSOC);

        if (!$tecnico) {
            throw new Exception("No hay técnicos disponibles en este momento.");
        }

        $idTecnico = $tecnico['idTecnico'];
        $idDisponibilidad = $tecnico['idDisponibilidad'];
        $serviciosActuales = $tecnico['serviciosAsignados'];

        // 8. Actualizar contador de servicios del técnico
        $nuevoValor = $serviciosActuales + 1;

        $queryUpdateServicios = "
        UPDATE disponibilidad
        SET serviciosAsignados = :nuevoValor
        WHERE idDisponibilidad = :idDisponibilidad";

        $stmtUpdate = $pdo->prepare($queryUpdateServicios);
        $stmtUpdate->bindParam(":nuevoValor", $nuevoValor);
        $stmtUpdate->bindParam(":idDisponibilidad", $idDisponibilidad);
        $stmtUpdate->execute();

        // 9. Crear el servicio principal
        $fechaIngreso = date("Y-m-d H:i:s");
        $estadoServicio = "Pendiente";

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

        $stmtServicio = $pdo->prepare($queryServicio);
        $stmtServicio->bindParam(":fechaIngreso", $fechaIngreso);
        $stmtServicio->bindParam(":estado", $estadoServicio);
        $stmtServicio->bindParam(":descripcionFalla", $des);
        $stmtServicio->bindParam(":cliente_cedula", $cedula);
        $stmtServicio->bindParam(":tecnico_idTecnico", $idTecnico);
        $stmtServicio->bindParam(":garantia_idGarantia", $idGarantia);
        $stmtServicio->bindParam(":tipoElectrodomestico_id", $electro);
        $stmtServicio->bindParam(":tipoServicio_id", $servicio);
        $stmtServicio->bindParam(":pagoCliente_id", $idPagoCliente);
        $stmtServicio->execute();

        $idServicio = $pdo->lastInsertId();


        $queryHistorial = "INSERT INTO historialcliente (cliente_cedula,servicio_codigoServicio)
        VALUES( :cedula, :codigoServicio);";
        $stmtHistorial = $pdo->prepare($queryHistorial);

        $stmtHistorial->bindParam(":cedula",$cedula);
        $stmtHistorial->bindParam(":codigoServicio",$idServicio);
        $stmtHistorial->execute();

        // Confirmar transacción
        $pdo->commit();
        $pdo = null;

        // Redireccionar con mensaje de éxito
        echo "<script>alert('Servicio creado exitosamente. Código: " . $idServicio . "'); window.location.href='../form.php';</script>";
        
    } catch (PDOException $e) {
        // Revertir cambios en caso de error
        $pdo->rollBack();
        error_log("Error en insert.php: " . $e->getMessage());
        
        echo "<script>alert('Error al crear el servicio: " . addslashes($e->getMessage()) . "'); window.history.back();</script>";
        
    } catch (Exception $e) {
        // Revertir cambios en caso de error
        $pdo->rollBack();
        error_log("Error en insert.php: " . $e->getMessage());
        
        echo "<script>alert('Error: " . addslashes($e->getMessage()) . "'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Acceso no autorizado'); window.location.href='./index.html';</script>";
}
?>