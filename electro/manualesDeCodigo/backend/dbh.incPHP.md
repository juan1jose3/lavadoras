# Documentación: Conexión PDO a MySQL

Este documento explica línea por línea el código PHP para establecer una conexión a una base de datos MySQL utilizando PDO (PHP Data Objects).

## Código Completo
```php
<?php
$dsn = "mysql:host=localhost;dbname=mydb";
$dbUsername = "root";
$password = "";

try{
    $pdo = new PDO($dsn,$dbUsername,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOexception $e){
    echo "Connection failed: ".  $e->getMessage();
}
```

## Explicación Línea por Línea

### Línea 1: Apertura de PHP
```php
<?php
```
- **Propósito**: Etiqueta de apertura que indica el inicio del código PHP
- **Función**: Le dice al servidor que debe interpretar el código siguiente como PHP

### Línea 2: Definición del DSN
```php
$dsn = "mysql:host=localhost;dbname=mydb";
```
- **Variable**: `$dsn` (Data Source Name)
- **Propósito**: Define la cadena de conexión a la base de datos
- **Componentes**:
  - `mysql:` - Especifica el driver de base de datos (MySQL)
  - `host=localhost` - Servidor donde está la base de datos (local)
  - `dbname=mydb` - Nombre de la base de datos a conectar

### Línea 3: Usuario de la Base de Datos
```php
$dbUsername = "root";
```
- **Variable**: `$dbUsername`
- **Propósito**: Almacena el nombre de usuario para acceder a la base de datos
- **Valor**: "root" (usuario administrador por defecto en MySQL)

### Línea 4: Contraseña de Acceso
```php
$password = "";
```
- **Variable**: `$password`
- **Propósito**: Almacena la contraseña del usuario de la base de datos
- **Valor**: Cadena vacía (sin contraseña - común en desarrollo local)

### Línea 5: Línea en blanco
- **Propósito**: Separación visual para mejorar la legibilidad del código

### Línea 6: Inicio del Bloque Try
```php
try{
```
- **Propósito**: Inicia un bloque de manejo de excepciones
- **Función**: Permite capturar y manejar errores que puedan ocurrir durante la conexión

### Línea 7: Creación del Objeto PDO
```php
    $pdo = new PDO($dsn,$dbUsername,$password);
```
- **Variable**: `$pdo`
- **Propósito**: Crea una nueva instancia de la clase PDO
- **Parámetros**:
  - `$dsn` - Cadena de conexión
  - `$dbUsername` - Usuario de la base de datos
  - `$password` - Contraseña del usuario
- **Resultado**: Establece la conexión a la base de datos

### Línea 8: Configuración del Modo de Error
```php
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
```
- **Método**: `setAttribute()`
- **Propósito**: Configura cómo PDO manejará los errores
- **Parámetros**:
  - `PDO::ATTR_ERRMODE` - Atributo que controla el modo de error
  - `PDO::ERRMODE_EXCEPTION` - Modo que lanza excepciones en caso de error
- **Beneficio**: Permite un mejor manejo de errores usando try-catch

### Línea 9: Línea en blanco
- **Propósito**: Separación visual antes del bloque catch

### Línea 10: Inicio del Bloque Catch
```php
}catch(PDOexception $e){
```
- **Propósito**: Captura excepciones de tipo PDOException
- **Variable**: `$e` - Objeto que contiene información del error
- **Función**: Se ejecuta solo si ocurre un error en el bloque try

### Línea 11: Manejo del Error
```php
    echo "Connection failed: ".  $e->getMessage();
```
- **Función**: `echo` - Imprime un mensaje en pantalla
- **Mensaje**: "Connection failed: " concatenado con el mensaje de error
- **Método**: `$e->getMessage()` - Obtiene el mensaje descriptivo del error
- **Propósito**: Informa al usuario sobre el fallo en la conexión

### Línea 12: Cierre del Bloque Catch
```php
}
```
- **Propósito**: Cierra el bloque catch y finaliza el manejo de excepciones

