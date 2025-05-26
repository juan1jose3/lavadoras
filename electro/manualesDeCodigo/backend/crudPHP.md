# CRUD de Servicios - Documentación Completa

## Descripción General
Este documento proporciona una documentación detallada línea por línea del sistema CRUD (Create, Read, Update, Delete) para la gestión de servicios técnicos. El sistema está desarrollado en PHP con MySQL y utiliza Bootstrap para la interfaz de usuario.

## Estructura del Archivo

### 1. Configuración Inicial y Conexión a Base de Datos

```php
<?php
    session_start();
```
**Línea 2:** Inicia una nueva sesión PHP o reanuda la sesión existente. Esto permite mantener datos del usuario a través de múltiples páginas.

```php
    try{
        require_once "dbh.inc.php";
```
**Líneas 4-5:** 
- Inicia un bloque try-catch para manejo de errores
- Incluye el archivo de configuración de base de datos una sola vez (require_once evita inclusiones duplicadas)

### 2. Consulta Principal de Servicios

```php
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
```

**Líneas 7-31:** Consulta SQL compleja que:
- Selecciona campos de la tabla `servicio` (alias `s`)
- Realiza JOINs con múltiples tablas relacionadas:
  - `tecnico` (t): Para obtener datos del técnico asignado
  - `garantia` (g): Para información de garantía del servicio
  - `tipoelectrodomestico` (te): Para el tipo de electrodoméstico
  - `tipoServicio` (ts): Para el tipo de servicio realizado
  - `pagoCliente` (pc): Para datos de pago del cliente
  - `metodoPago` (mp): Para el método de pago utilizado
  - `pago` (p): Para detalles del pago

```php
        $stmt = $pdo->prepare($queryCrud);
        $stmt->execute();
        $resultsCrud = $stmt->fetchAll(PDO::FETCH_ASSOC);
```

**Líneas 33-35:**
- Prepara la consulta SQL para ejecución segura
- Ejecuta la consulta preparada
- Obtiene todos los resultados como array asociativo

### 3. Consultas para Opciones de Formularios

```php
        $queryTecnicos = "SELECT idTecnico, nombres, apellidos FROM tecnico";
        $stmtTecnicos = $pdo->prepare($queryTecnicos);
        $stmtTecnicos->execute();
        $tecnicos = $stmtTecnicos->fetchAll(PDO::FETCH_ASSOC);
```

**Líneas 37-40:** Obtiene lista de técnicos disponibles para los selectores de formularios.

```php
        $queryElectrodomesticos = "SELECT idTipoElectrodomestico, nombre FROM tipoelectrodomestico";
        $stmtElectrodomesticos = $pdo->prepare($queryElectrodomesticos);
        $stmtElectrodomesticos->execute();
        $electrodomesticos = $stmtElectrodomesticos->fetchAll(PDO::FETCH_ASSOC);
```

**Líneas 42-45:** Obtiene lista de tipos de electrodomésticos disponibles.

```php
        $queryTiposServicio = "SELECT idTipoServicio, tipo FROM tiposervicio";
        $stmtTiposServicio = $pdo->prepare($queryTiposServicio);
        $stmtTiposServicio->execute();
        $tiposServicio = $stmtTiposServicio->fetchAll(PDO::FETCH_ASSOC);
```

**Líneas 47-50:** Obtiene lista de tipos de servicio disponibles.

```php
        $queryMetodosPago = "SELECT idMetodoPago, metodo FROM metodopago";
        $stmtMetodosPago = $pdo->prepare($queryMetodosPago);
        $stmtMetodosPago->execute();
        $metodosPago = $stmtMetodosPago->fetchAll(PDO::FETCH_ASSOC);
```

**Líneas 52-55:** Obtiene lista de métodos de pago disponibles.

```php
        $pdo = null;
```

**Línea 59:** Cierra la conexión a la base de datos estableciendo la variable PDO como null.

```php
    }catch(PDOException $e){
        die("Query failed: " . $e->getMessage());
    }
?>
```

**Líneas 61-63:** 
- Captura cualquier excepción de PDO
- Termina la ejecución del script mostrando el mensaje de error

## 4. Estructura HTML

### Declaración DOCTYPE y Head

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
```

**Líneas 65-73:**
- Define documento HTML5
- Establece idioma en inglés
- Configura charset UTF-8 para caracteres especiales
- Meta viewport para diseño responsivo
- Incluye Bootstrap 5.1.3 para estilos
- Incluye Font Awesome 6.0.0 para iconos

### Body y Mensajes de Sesión

```html
<body>

    <?php if(isset($_SESSION["mensaje"])):?>
        <div class="alert alert-success">
            <?= $_SESSION['mensaje']; ?>
        </div>
         <?php unset($_SESSION['mensaje']); ?>
    <?php endif; ?>
```

**Líneas 75-81:**
- Verifica si existe un mensaje en la sesión
- Muestra mensaje de éxito si existe
- Elimina el mensaje de la sesión después de mostrarlo (patrón one-time message)

### Estructura Principal del Contenido

```html
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">Listado de Servicios</h4>
                    </div>
```

**Líneas 83-89:**
- Container fluido que ocupa todo el ancho
- Fila con margen superior
- Columna que ocupa las 12 posiciones (ancho completo)
- Card de Bootstrap para contenedor elegante
- Header oscuro con título

### Tabla de Servicios

```html
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
```

**Líneas 91-106:**
- Verifica si hay resultados para mostrar
- Div responsivo para tabla en dispositivos pequeños
- Tabla con efectos hover y rayas alternadas
- Encabezados de todas las columnas de datos

### Cuerpo de la Tabla

```html
                                    <tbody>
                                        <?php foreach($resultsCrud as $row):?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($row["codigoServicio"]); ?></td>
                                                <td><?php echo htmlspecialchars($row["fechaIngreso"]); ?></td>
```

**Líneas 108-112:**
- Itera sobre cada registro de servicio
- Muestra código de servicio con protección XSS (htmlspecialchars)
- Muestra fecha de ingreso protegida

```html
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
```

**Líneas 113-123:**
- Badge con color dinámico según el estado
- Usa match() de PHP 8 para asignar colores Bootstrap:
  - Verde para Completado
  - Amarillo para En proceso
  - Azul para Pendiente
  - Rojo para Cancelado
  - Gris para otros estados

```html
                                                <td><?php echo htmlspecialchars($row["cliente_cedula"]); ?></td>
                                                <td><?php echo htmlspecialchars($row["nombreTecnico"] . " " . $row["apellidosTecnico"]); ?></td>
                                                <td><?php echo htmlspecialchars($row["Electrodomestico"]); ?></td>
                                                <td><?php echo htmlspecialchars($row["tipoServicio"]); ?></td>
                                                <td><?php echo htmlspecialchars($row["metodoPago"]); ?></td>
                                                <td><?php echo htmlspecialchars($row["cantidad"]); ?></td>
```

**Líneas 124-129:** Muestra datos básicos del servicio con protección XSS.

```html
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
```

**Líneas 130-140:** Badge para estado de pago con colores similares al estado del servicio.

### Columna de Acciones

```html
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
```

**Líneas 141-154:**
- Grupo de botones para acciones
- Botón "Ver" (azul claro) que abre modal de detalles
- Botón "Editar" (azul) que abre modal de edición
- Formulario oculto para eliminación (preparado pero no usado actualmente)
- Cada modal tiene ID único basado en el código de servicio

### Mensaje Cuando No Hay Datos

```html
                        <?php else:?>
                            <div class="alert alert-info" role="alert">
                                <i class="fas fa-info-circle me-2"></i>No hay servicios registrados en el sistema.
                            </div>
                        <?php endif; ?>
```

**Líneas 158-161:** Muestra mensaje informativo cuando no hay servicios registrados.

## 5. Modales

### Modal de Detalles

```html
                        <?php foreach($resultsCrud as $row): ?>
                            <div class="modal fade" id="modalDetalle<?= $row['codigoServicio']; ?>" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detalles del Servicio: <?= $row['codigoServicio']; ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
```

**Líneas 164-171:**
- Genera un modal para cada servicio
- Modal grande (modal-lg) para más espacio
- Header con título dinámico y botón cerrar

```html
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
```

**Líneas 172-186:** Cuerpo del modal dividido en dos columnas con información básica del servicio.

```html
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
```

**Líneas 187-197:** Secciones adicionales para descripción de falla e información de garantía.

### Modal de Edición

```html
                            <div class="modal fade" id="modalEditar<?= $row['codigoServicio']; ?>" tabindex="-1">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <form action="editar_servicio.php" method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editar Servicio: <?= $row['codigoServicio']; ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
```

**Líneas 207-214:**
- Modal extra grande (modal-xl) para formulario completo
- Formulario POST hacia editar_servicio.php
- Header con título dinámico

```html
                                            <div class="modal-body">
                                                <input type="hidden" name="codigoServicio" value="<?= $row['codigoServicio']; ?>">
                                                <input type="hidden" name="garantia_id" value="<?= $row['garantia_idGarantia']; ?>">
```

**Líneas 215-217:** Campos ocultos para identificar el servicio y garantía a editar.

#### Primera Columna del Formulario

```html
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Código de Servicio</label>
                                                            <input type="text" class="form-control" value="<?= $row['codigoServicio']; ?>" readonly>
                                                            <small class="text-muted">No se puede modificar</small>
                                                        </div>
```

**Líneas 219-225:** Campo de código de servicio (solo lectura) con texto explicativo.

```html
                                                        <div class="mb-3">
                                                            <label class="form-label">Fecha de Ingreso</label>
                                                            <input type="date" name="fechaIngreso" class="form-control" value="<?= date('Y-m-d', strtotime($row['fechaIngreso'])); ?>" required>
                                                        </div>
```

**Líneas 226-229:** Campo de fecha convertido al formato HTML5 date input.

```html
                                                        <div class="mb-3">
                                                            <label class="form-label">Estado del Servicio</label>
                                                            <select name="estado" class="form-control" required>
                                                                <option value="Pendiente" <?= ($row['estado'] == 'Pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                                                                <option value="En proceso" <?= ($row['estado'] == 'En proceso') ? 'selected' : ''; ?>>En proceso</option>
                                                                <option value="Completado" <?= ($row['estado'] == 'Completado') ? 'selected' : ''; ?>>Completado</option>
                                                                <option value="Cancelado" <?= ($row['estado'] == 'Cancelado') ? 'selected' : ''; ?>>Cancelado</option>
                                                            </select>
                                                        </div>
```

**Líneas 230-237:** Select de estado con opción actual preseleccionada.

#### Segunda Columna del Formulario

```html
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
```

**Líneas 245-254:** Select de técnicos dinámico con opción actual preseleccionada.

#### Tercera Columna del Formulario

```html
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Cantidad</label>
                                                            <input type="number" step="0.01" name="cantidad" class="form-control" value="<?= $row['cantidad']; ?>" required>
                                                        </div>
```

**Líneas 284-288:** Campo numérico para cantidad con decimales (step="0.01").

#### Sección de Garantía

```html
                                                <hr>
                                                <h6 class="mb-3">Información de Garantía</h6>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Inicio de Garantía</label>
                                                            <input type="date" name="inicioGarantia" class="form-control" value="<?= $row['inicioGarantia']; ?>">
                                                        </div>
                                                    </div>
```

**Líneas 307-315:** Sección separada para datos de garantía con campos de fecha.

## 6. Scripts y Funcionalidad JavaScript

```html
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function eliminarServicio(codigoServicio) {
            if (confirm('¿Está seguro de que desea eliminar este servicio?')) {
                document.getElementById('form-eliminar-' + codigoServicio).submit();
            }
        }
    </script>
```

**Líneas 341-348:**
- Incluye Bootstrap JavaScript para funcionalidad de modales
- Función JavaScript para eliminar servicios con confirmación
- Envía formulario oculto si el usuario confirma



