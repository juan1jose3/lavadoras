<?php
    session_start();

    try{
        require_once "dbh.inc.php";

        // Query principal para obtener servicios
        $queryCrud = "SELECT 
        s.codigoServicio,
        s.fechaIngreso,
        s.estado,
        s.descripcionFalla,
        s.cliente_cedula,
        s.tecnico_idTecnico,
        s.garantia_idGarantia,
        s.tipoElectrodomestico_idTipoElectrodomestico,
        s.tipoServicio_idTipoServicio,
        s.pagoCliente_idPagoCliente,
        t.nombres AS nombreTecnico,
        t.apellidos AS apellidosTecnico,
        g.inicioGarantia,
        g.finGarantia,
        g.tycGarantia,
        te.nombre AS Electrodomestico,
        ts.tipo AS tipoServicio,
        mp.metodo AS metodoPago,
        p.cantidad,
        p.estado AS estadoPago
        FROM servicio s
        JOIN tecnico t ON s.tecnico_idTecnico = t.idTecnico
        JOIN garantia g ON s.garantia_idGarantia = g.idGarantia
        JOIN tipoelectrodomestico te ON s.tipoElectrodomestico_idTipoElectrodomestico = te.idTipoElectrodomestico
        JOIN tipoServicio ts ON s.tipoServicio_idTipoServicio = ts.idTipoServicio
        JOIN pagoCliente pc ON s.pagoCliente_idPagoCliente = pc.idPagoCliente
        JOIN metodoPago mp ON pc.metodoPago_idMetodoPago = mp.idMetodoPago
        JOIN pago p ON pc.pago_idPago = p.idPago";

        $stmt = $pdo->prepare($queryCrud);
        $stmt->execute();
        $resultsCrud = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Consultas para obtener opciones de los selects
        $queryTecnicos = "SELECT idTecnico, nombres, apellidos FROM tecnico";
        $stmtTecnicos = $pdo->prepare($queryTecnicos);
        $stmtTecnicos->execute();
        $tecnicos = $stmtTecnicos->fetchAll(PDO::FETCH_ASSOC);

        $queryElectrodomesticos = "SELECT idTipoElectrodomestico, nombre FROM tipoelectrodomestico";
        $stmtElectrodomesticos = $pdo->prepare($queryElectrodomesticos);
        $stmtElectrodomesticos->execute();
        $electrodomesticos = $stmtElectrodomesticos->fetchAll(PDO::FETCH_ASSOC);

        $queryTiposServicio = "SELECT idTipoServicio, tipo FROM tiposervicio";
        $stmtTiposServicio = $pdo->prepare($queryTiposServicio);
        $stmtTiposServicio->execute();
        $tiposServicio = $stmtTiposServicio->fetchAll(PDO::FETCH_ASSOC);

        $queryMetodosPago = "SELECT idMetodoPago, metodo FROM metodopago";
        $stmtMetodosPago = $pdo->prepare($queryMetodosPago);
        $stmtMetodosPago->execute();
        $metodosPago = $stmtMetodosPago->fetchAll(PDO::FETCH_ASSOC);

    

        $pdo = null;

    }catch(PDOException $e){
        die("Query failed: " . $e->getMessage());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>

    <?php if(isset($_SESSION["mensaje"])):?>
        <div class="alert alert-success">
            <?= $_SESSION['mensaje']; ?>
        </div>
         <?php unset($_SESSION['mensaje']); ?>
    <?php endif; ?>

    <div class="container-fluid">
        <!-- Tabla de Servicios -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">Listado de Servicios</h4>
                    </div>

                    <div class="card-body">
                        <?php if(!empty($resultsCrud)): ?>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Fecha Ingreso</th>
                                            <th>Estado</th>
                                            <th>Cliente</th>
                                            <th>Técnico</th>
                                            <th>Electrodoméstico</th>
                                            <th>Tipo Servicio</th>
                                            <th>Método Pago</th>
                                            <th>Cantidad</th>
                                            <th>Estado Pago</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach($resultsCrud as $row):?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($row["codigoServicio"]); ?></td>
                                                <td><?php echo htmlspecialchars($row["fechaIngreso"]); ?></td>
                                                <td>
                                                    <span class="badge bg-<?php 
                                                        echo match($row["estado"]) {
                                                            'Completado' => 'success',
                                                            'En proceso' => 'warning',
                                                            'Pendiente' => 'info',
                                                            'Cancelado' => 'danger',
                                                            default => 'secondary'
                                                        };
                                                    ?>">
                                                        <?php echo htmlspecialchars($row["estado"]); ?>
                                                    </span>
                                                </td>
                                                <td><?php echo htmlspecialchars($row["cliente_cedula"]); ?></td>
                                                <td><?php echo htmlspecialchars($row["nombreTecnico"] . " " . $row["apellidosTecnico"]); ?></td>
                                                <td><?php echo htmlspecialchars($row["Electrodomestico"]); ?></td>
                                                <td><?php echo htmlspecialchars($row["tipoServicio"]); ?></td>
                                                <td><?php echo htmlspecialchars($row["metodoPago"]); ?></td>
                                                <td><?php echo htmlspecialchars($row["cantidad"]); ?></td>
                                                <td>
                                                    <span class="badge bg-<?php 
                                                        echo match($row["estadoPago"]) {
                                                            'Pagado' => 'success',
                                                            'Parcial' => 'warning',
                                                            'Pendiente' => 'info',
                                                            'Cancelado' => 'danger',
                                                            default => 'secondary'
                                                        };
                                                    ?>">
                                                        <?php echo htmlspecialchars($row["estadoPago"]); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalDetalle<?= $row['codigoServicio']; ?>" title="Ver detalles">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditar<?= $row['codigoServicio']; ?>" title="Editar">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        
                                                    </div>

                                                    <form id="form-eliminar-<?= $row['codigoServicio']; ?>" method="POST" action="SQL/eliminar_servicio.php" style="display: none;">
                                                        <input type="hidden" name="codigoServicio" value="<?= $row['codigoServicio']; ?>">
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else:?>
                            <div class="alert alert-info" role="alert">
                                <i class="fas fa-info-circle me-2"></i>No hay servicios registrados en el sistema.
                            </div>
                        <?php endif; ?>

                        <!-- Modales para cada servicio -->
                        <?php foreach($resultsCrud as $row): ?>
                            <!-- Modal de Detalles -->
                            <div class="modal fade" id="modalDetalle<?= $row['codigoServicio']; ?>" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detalles del Servicio: <?= $row['codigoServicio']; ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><strong>Código:</strong> <?= htmlspecialchars($row['codigoServicio']); ?></p>
                                                    <p><strong>Fecha Ingreso:</strong> <?= htmlspecialchars($row['fechaIngreso']); ?></p>
                                                    <p><strong>Estado:</strong> <?= htmlspecialchars($row['estado']); ?></p>
                                                    <p><strong>Cliente:</strong> <?= htmlspecialchars($row['cliente_cedula']); ?></p>
                                                    <p><strong>Técnico:</strong> <?= htmlspecialchars($row['nombreTecnico'] . " " . $row['apellidosTecnico']); ?></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><strong>Electrodoméstico:</strong> <?= htmlspecialchars($row['Electrodomestico']); ?></p>
                                                    <p><strong>Tipo Servicio:</strong> <?= htmlspecialchars($row['tipoServicio']); ?></p>
                                                    <p><strong>Método Pago:</strong> <?= htmlspecialchars($row['metodoPago']); ?></p>
                                                    <p><strong>Cantidad:</strong> <?= htmlspecialchars($row['cantidad']); ?></p>
                                                    <p><strong>Estado Pago:</strong> <?= htmlspecialchars($row['estadoPago']); ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p><strong>Descripción de la Falla:</strong></p>
                                                    <p><?= htmlspecialchars($row['descripcionFalla']); ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p><strong>Garantía:</strong></p>
                                                    <p>Inicio: <?= htmlspecialchars($row['inicioGarantia']); ?> | Fin: <?= htmlspecialchars($row['finGarantia']); ?></p>
                                                    <p>Términos: <?= htmlspecialchars($row['tycGarantia']); ?></p>
                                                </div>

                                            
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal de Edición -->
                            <div class="modal fade" id="modalEditar<?= $row['codigoServicio']; ?>" tabindex="-1">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <form action="editar_servicio.php" method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editar Servicio: <?= $row['codigoServicio']; ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="codigoServicio" value="<?= $row['codigoServicio']; ?>">
                                                <input type="hidden" name="garantia_id" value="<?= $row['garantia_idGarantia']; ?>">
                                                
                                                <div class="row">
                                                    <!-- Primera columna -->
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Código de Servicio</label>
                                                            <input type="text" class="form-control" value="<?= $row['codigoServicio']; ?>" readonly>
                                                            <small class="text-muted">No se puede modificar</small>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Fecha de Ingreso</label>
                                                            <input type="date" name="fechaIngreso" class="form-control" value="<?= date('Y-m-d', strtotime($row['fechaIngreso'])); ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Estado del Servicio</label>
                                                            <select name="estado" class="form-control" required>
                                                                <option value="Pendiente" <?= ($row['estado'] == 'Pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                                                                <option value="En proceso" <?= ($row['estado'] == 'En proceso') ? 'selected' : ''; ?>>En proceso</option>
                                                                <option value="Completado" <?= ($row['estado'] == 'Completado') ? 'selected' : ''; ?>>Completado</option>
                                                                <option value="Cancelado" <?= ($row['estado'] == 'Cancelado') ? 'selected' : ''; ?>>Cancelado</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Cédula del Cliente</label>
                                                            <input type="text" name="cliente_cedula" class="form-control" value="<?= $row['cliente_cedula']; ?>" readonly>
                                                            <small class="text-muted">No se puede modificar</small>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Segunda columna -->
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Técnico</label>
                                                            <select name="tecnico_id" class="form-control" required>
                                                                <?php foreach($tecnicos as $tecnico): ?>
                                                                    <option value="<?= $tecnico['idTecnico']; ?>" 
                                                                            <?= ($tecnico['idTecnico'] == $row['tecnico_idTecnico']) ? 'selected' : ''; ?>>
                                                                        <?= htmlspecialchars($tecnico['nombres'] . " " . $tecnico['apellidos']); ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Electrodoméstico</label>
                                                            <select name="tipoElectrodomestico_id" class="form-control" required>
                                                                <?php foreach($electrodomesticos as $electro): ?>
                                                                    <option value="<?= $electro['idTipoElectrodomestico']; ?>" 
                                                                            <?= ($electro['idTipoElectrodomestico'] == $row['tipoElectrodomestico_idTipoElectrodomestico']) ? 'selected' : ''; ?>>
                                                                        <?= htmlspecialchars($electro['nombre']); ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Tipo de Servicio</label>
                                                            <select name="tipoServicio_id" class="form-control" required>
                                                                <?php foreach($tiposServicio as $tipo): ?>
                                                                    <option value="<?= $tipo['idTipoServicio']; ?>" 
                                                                            <?= ($tipo['idTipoServicio'] == $row['tipoServicio_idTipoServicio']) ? 'selected' : ''; ?>>
                                                                        <?= htmlspecialchars($tipo['tipo']); ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Método de Pago</label>
                                                            <select name="metodoPago_id" class="form-control" required>
                                                                <?php foreach($metodosPago as $metodo): ?>
                                                                    <option value="<?= $metodo['idMetodoPago']; ?>" 
                                                                            <?= ($metodo['idMetodoPago'] == $row['metodoPago_id']) ? 'selected' : ''; ?>>
                                                                        <?= htmlspecialchars($metodo['metodo']); ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Tercera columna -->
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Cantidad</label>
                                                            <input type="number" step="0.01" name="cantidad" class="form-control" value="<?= $row['cantidad']; ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Estado del Pago</label>
                                                            <select name="estadoPago" class="form-control" required>
                                                                <option value="Pendiente" <?= ($row['estadoPago'] == 'Pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                                                                <option value="Pagado" <?= ($row['estadoPago'] == 'Pagado') ? 'selected' : ''; ?>>Pagado</option>
                                                                <option value="Parcial" <?= ($row['estadoPago'] == 'Parcial') ? 'selected' : ''; ?>>Parcial</option>
                                                                <option value="Cancelado" <?= ($row['estadoPago'] == 'Cancelado') ? 'selected' : ''; ?>>Cancelado</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Descripción de Falla</label>
                                                            <textarea name="descripcionFalla" class="form-control" rows="4" required><?= htmlspecialchars($row['descripcionFalla']); ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Sección de Garantía -->
                                                <hr>
                                                <h6 class="mb-3">Información de Garantía</h6>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Inicio de Garantía</label>
                                                            <input type="date" name="inicioGarantia" class="form-control" value="<?= $row['inicioGarantia']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Fin de Garantía</label>
                                                            <input type="date" name="finGarantia" class="form-control" value="<?= $row['finGarantia']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Términos y Condiciones</label>
                                                            <textarea name="tycGarantia" class="form-control" rows="2"><?= htmlspecialchars($row['tycGarantia']); ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function eliminarServicio(codigoServicio) {
            if (confirm('¿Está seguro de que desea eliminar este servicio?')) {
                document.getElementById('form-eliminar-' + codigoServicio).submit();
            }
        }
    </script>
</body>
</html>