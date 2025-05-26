
# Manual de Código HTML - Formulario de Reparación

Este manual explica línea por línea el funcionamiento del archivo HTML relacionado con el sistema de reparación.

---

## Estructura del Código HTML

```html
<!DOCTYPE html>
```
- Define el tipo de documento HTML5.

```html
<html lang="es">
```
- Abre el documento HTML y establece el idioma como español.

```html
<head>
```
- Sección del encabezado del documento HTML. Aquí se colocan metadatos, títulos, enlaces a estilos, etc.

```html
    <meta charset="UTF-8">
```
- Define la codificación de caracteres como UTF-8, para soportar caracteres especiales en español.

```html
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
```
- Optimiza el sitio para dispositivos móviles.

```html
    <title>Reparación</title>
```
- Define el título de la pestaña del navegador.

```html
    <link rel="stylesheet" href="css/reparacion.css">
```
- Vincula el archivo CSS que da estilo al formulario.

```html
</head>
```
- Cierra la sección del `<head>`.

```html
<body>
```
- Abre la sección del cuerpo donde se mostrará el contenido visible del sitio.

```html
    <div class="formulario-reparacion">
```
- Contenedor principal del formulario con clase CSS para estilo personalizado.

```html
        <h2>Formulario de Reparación</h2>
```
- Título del formulario visible para el usuario.

```html
        <form action="#" method="post">
```
- Inicia el formulario. `action="#"` significa que no se envía a otra página. `method="post"` indica que los datos se enviarán mediante POST.

Campos del formulario:

```html
            <label for="nombre">Nombre del Cliente:</label>
            <input type="text" id="nombre" name="nombre" required>
```
- Etiqueta y campo de texto para que el cliente escriba su nombre. El atributo `required` obliga a llenar este campo.

```html
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required>
```
- Campo para introducir el número de teléfono.

```html
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
```
- Campo específico para direcciones de correo electrónico. Valida que sea un formato válido.

```html
            <label for="equipo">Tipo de Equipo:</label>
            <input type="text" id="equipo" name="equipo" required>
```
- Campo para indicar qué equipo necesita reparación (ej: computadora, celular, etc.).

```html
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" required>
```
- Campo para escribir la marca del equipo.

```html
            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" required>
```
- Campo para detallar el modelo.

```html
            <label for="problema">Descripción del Problema:</label>
            <textarea id="problema" name="problema" rows="4" required></textarea>
```
- Área de texto más grande para describir el problema del equipo.

```html
            <label for="fecha">Fecha de Ingreso:</label>
            <input type="date" id="fecha" name="fecha" required>
```
- Campo para seleccionar la fecha en que se entregó el equipo.

```html
            <button type="submit">Enviar</button>
```
- Botón que envía el formulario.

```html
        </form>
    </div>
</body>
</html>
```
- Cierra las etiquetas abiertas.

---

## Créditos

Manual generado automáticamente para documentación de proyectos HTML.

# Pagina Lavadoras

# Secadoras


