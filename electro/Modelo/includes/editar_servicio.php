<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
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
    
    // Datos de garantía
    $inicioGarantia = $_POST["inicioGarantia"];
    $finGarantia = $_POST["finGarantia"];
    $tycGarantia = $_POST["tycGarantia"];

    try{
        require_once "dbh.inc.php"; 
        
        
        $pdo->beginTransaction();

        // 1. Obtener los IDs relacionados del servicio actual
        $queryObtenerIDs = "SELECT 
            s.garantia_idGarantia,
            s.pagoCliente_idPagoCliente,
            pc.pago_idPago,
            pc.metodoPago_idMetodoPago as metodoPago_actual
        FROM servicio s
        JOIN pagoCliente pc ON s.pagoCliente_idPagoCliente = pc.idPagoCliente
        WHERE s.codigoServicio = :codigoServicio";

        $stmtObtener = $pdo->prepare($queryObtenerIDs);
        $stmtObtener->bindParam(":codigoServicio", $codigoServicio);
        $stmtObtener->execute();
        $idsRelacionados = $stmtObtener->fetch(PDO::FETCH_ASSOC);

        if (!$idsRelacionados) {
            throw new Exception("No se encontró el servicio especificado.");
        }

        // 2. Actualizar el servicio principal
        $queryServicio = "UPDATE servicio SET 
            fechaIngreso = :fechaIngreso,
            estado = :estado,
            descripcionFalla = :descripcionFalla,
            tecnico_idTecnico = :tecnico_id,
            tipoElectrodomestico_idTipoElectrodomestico = :tipoElectrodomestico_id,
            tipoServicio_idTipoServicio = :tipoServicio_id
        WHERE codigoServicio = :codigoServicio";

        $stmtServicio = $pdo->prepare($queryServicio);
        $stmtServicio->bindParam(":fechaIngreso", $fechaIngreso);
        $stmtServicio->bindParam(":estado", $estado);
        $stmtServicio->bindParam(":descripcionFalla", $descripcionFalla);
        $stmtServicio->bindParam(":tecnico_id", $tecnico_id);
        $stmtServicio->bindParam(":tipoElectrodomestico_id", $tipoElectrodomestico_id);
        $stmtServicio->bindParam(":tipoServicio_id", $tipoServicio_id);
        $stmtServicio->bindParam(":codigoServicio", $codigoServicio);
        $stmtServicio->execute();

        // 3. Actualizar la garantía
        if (!empty($inicioGarantia) && !empty($finGarantia)) {
            $queryGarantia = "UPDATE garantia SET 
                inicioGarantia = :inicioGarantia,
                finGarantia = :finGarantia,
                tycGarantia = :tycGarantia
            WHERE idGarantia = :idGarantia";

            $stmtGarantia = $pdo->prepare($queryGarantia);
            $stmtGarantia->bindParam(":inicioGarantia", $inicioGarantia);
            $stmtGarantia->bindParam(":finGarantia", $finGarantia);
            $stmtGarantia->bindParam(":tycGarantia", $tycGarantia);
            $stmtGarantia->bindParam(":idGarantia", $idsRelacionados['garantia_idGarantia']);
            $stmtGarantia->execute();
        }

        // 4. Actualizar el pago
        $queryPago = "UPDATE pago SET 
            cantidad = :cantidad,
            estado = :estadoPago
        WHERE idPago = :idPago";

        $stmtPago = $pdo->prepare($queryPago);
        $stmtPago->bindParam(":cantidad", $cantidad);
        $stmtPago->bindParam(":estadoPago", $estadoPago);
        $stmtPago->bindParam(":idPago", $idsRelacionados['pago_idPago']);
        $stmtPago->execute();

        // 5. Actualizar el método de pago si ha cambiado
        if ($metodoPago_id != $idsRelacionados['metodoPago_actual']) {
            $queryMetodoPago = "UPDATE pagoCliente SET 
                metodoPago_idMetodoPago = :metodoPago_id
            WHERE idPagoCliente = :idPagoCliente";

            $stmtMetodoPago = $pdo->prepare($queryMetodoPago);
            $stmtMetodoPago->bindParam(":metodoPago_id", $metodoPago_id);
            $stmtMetodoPago->bindParam(":idPagoCliente", $idsRelacionados['pagoCliente_idPagoCliente']);
            $stmtMetodoPago->execute();
        }

        // Confirmar transacción
        $pdo->commit();
        $pdo = null;

        // Establecer mensaje de éxito en sesión
        $_SESSION['mensaje'] = "Servicio actualizado exitosamente. Código: " . $codigoServicio;
        
        // Redirigir de vuelta a la página del CRUD
        header("Location: crud.php");
        exit();
        
    } catch (PDOException $e) {
       
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        error_log("Error en editar_servicio.php: " . $e->getMessage());
        
        $_SESSION['error'] = "Error al actualizar el servicio: " . $e->getMessage();
        header("Location: crud.php"); 
        exit();
        
    } catch (Exception $e) {
        
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        error_log("Error en editar_servicio.php: " . $e->getMessage());
        
        $_SESSION['error'] = "Error: " . $e->getMessage();
        header("Location: crud.php"); 
        exit();
    }
} else {
    $_SESSION['error'] = "Acceso no autorizado";
    header("Location: crud.php"); 
    exit();
}
?>