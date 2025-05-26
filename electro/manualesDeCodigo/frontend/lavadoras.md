# README - Página Web de Lavadoras AEONIX

## Descripción General
Esta es una página web dedicada a servicios de reparación de lavadoras de la empresa AEONIX. La página incluye información sobre problemas comunes, soluciones, consejos de mantenimiento y las marcas que reparan.

## Estructura del Documento

### Declaración DOCTYPE y HTML
```html
<!DOCTYPE html>
<html lang="en">
```
- `<!DOCTYPE html>`: Declara que el documento utiliza HTML5
- `<html lang="en">`: Elemento raíz del documento HTML con idioma en inglés

### Sección HEAD
```html
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" 
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
        crossorigin="anonymous" />
```
- **Bootstrap CSS**: Carga la librería Bootstrap 4.1.3 desde CDN para estilos responsivos
- `integrity`: Atributo de seguridad para verificar integridad del archivo
- `crossorigin="anonymous"`: Permite cargar recursos de otros dominios sin credenciales

```html
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
```
- `charset="UTF-8"`: Define la codificación de caracteres Unicode
- `viewport`: Configura la visualización en dispositivos móviles con escala inicial 1:1

```html
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
```
- **Preconexión a Google Fonts**: Establece conexión temprana con servidores de fuentes para mejorar rendimiento

```html
<link rel="stylesheet" href="Estilos/main.css">
```
- **CSS Personalizado**: Enlaza archivo de estilos local ubicado en carpeta "Estilos"

```html
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" 
      rel="stylesheet" />
```
- **Fuente Poppins**: Carga la familia de fuentes Poppins con todos los pesos e itálicas
- `display=swap`: Permite mostrar fuente de respaldo hasta que Poppins cargue completamente

```html
<title>Lavadoras</title>
```
- **Título de la página**: Texto que aparece en la pestaña del navegador

### Scripts JavaScript
```html
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
```
- **jQuery 3.6.0**: Librería JavaScript para manipulación DOM y eventos
- **Popper.js**: Dependencia de Bootstrap para posicionamiento de tooltips y popovers
- **Bootstrap JS**: Scripts de Bootstrap para componentes interactivos

### Barra de Navegación
```html
<nav class="navbar navbar-expand-lg miNav">
  <a class="navbar-brand" href="#">AEONIX</a>
```
- `navbar navbar-expand-lg`: Clases de Bootstrap para navegación responsiva (se expande en pantallas grandes)
- `miNav`: Clase CSS personalizada definida en main.css
- `navbar-brand`: Enlace del logotipo/marca de la empresa

```html
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
```
- **Botón de menú hamburguesa**: Visible solo en dispositivos móviles
- `data-toggle="collapse"`: Controla el colapso/expansión del menú
- `data-target="#navbarNav"`: Especifica qué elemento colapsar
- Atributos `aria-*`: Mejoran accesibilidad para lectores de pantalla

```html
<div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
    </li>
```
- `collapse navbar-collapse`: Contenedor colapsable del menú
- `nav-item active`: Elemento de navegación marcado como activo
- `sr-only`: Texto visible solo para lectores de pantalla

### Enlaces de Navegación
```html
<li class="nav-item active">
  <a class="dropdown-item" href="neveras.html">Neveras</a>
</li>
<li class="nav-item active">
  <a class="dropdown-item" href="lavadoras.html">Lavadoras</a>
</li>
<li class="nav-item active">
  <a class="dropdown-item" href="secadoras.html">Secadores</a>
</li>
```
- **Enlaces a otras páginas**: Neveras, Lavadoras y Secadoras
- `dropdown-item`: Clase de Bootstrap (aunque no están en un dropdown real)

```html
<li class="nav-item">
  <a class="nav-link" href="https://web.whatsapp.com/" target="_blank">Contacto</a>
</li>
```
- **Enlace a WhatsApp Web**: Para contacto directo
- `target="_blank"`: Abre en nueva pestaña

### Título Principal
```html
<h1 class="titulo">
  <span style="color: #194366">Lavado perfecto, sin errores ni ruidos. ¡Hoy queda lista!</span>
</h1>
```
- **Título principal**: Slogan de la empresa con color azul oscuro inline
- `titulo`: Clase CSS personalizada para estilos específicos

### Párrafo Descriptivo
```html
<p class="parrafo">
    ¿Tu lavadora no funciona bien?<br>
    ❌ No drena el agua<br>
    ❌ No gira el tambor<br>
    ❌ Hace ruidos extraños<br>
    ¡Nosotros lo solucionamos! Contamos con técnicos expertos en reparación <br>
    de lavadoras de todas las marcas.
    <br>
    ✔️ Revisión rápida <br>
    ✔️ Repuestos originales <br>
    ✔️ Garantía en el servicio <br>
</p>
```
- **Párrafo promocional**: Lista problemas comunes y beneficios del servicio
- `<br>`: Saltos de línea para formateo
- Uso de emojis para mejor presentación visual

### Botón de Llamada a la Acción
```html
<button class="boton" onclick="window.location.href='form.php'">¡CONTÁCTANOS AHORA MISMO!</button>
```
- **Botón CTA**: Redirige a formulario de contacto
- `onclick`: Evento JavaScript para navegación
- `window.location.href`: Cambia la URL actual

### Subtítulo de Sección
```html
<h1 class="subTitulo">Problemas comunes en lavadoras <br> 
    y como solucionarlos
</h1>
```
- **Subtítulo**: Introduce la sección de problemas y soluciones
- `subTitulo`: Clase CSS personalizada

### Secciones de Problemas y Soluciones
```html
<div class="cualidades" style="background-color: #1e0db4;">
    <div class="container">
        <br>
        <h2>1.La lavadora no enciende<br></h2>
        <p>
            <ul>
                <li>Causas: Problema eléctrico, fusible quemado, botón dañado.</li><br>
                <li>Soluciones: Verificar enchufe, cambiar fusible, revisar panel de control.</li> <br>
            </ul>
        </p>
    </div>
```
- `cualidades`: Contenedor principal con fondo azul
- `container`: Clase Bootstrap para contenido centrado y responsivo
- `<ul>` y `<li>`: Lista de causas y soluciones
- **Problema 1**: La lavadora no enciende

**Estructura similar se repite para 6 problemas:**
1. La lavadora no enciende
2. No llena de agua
3. No centrifuga
4. Hace ruidos fuertes
5. Tiene fugas de agua
6. No lava bien la ropa

### Sección de Consejos de Mantenimiento
```html
<h1 class="subTitulo">🛠️ Consejos para el Mantenimiento de una Lavadora</h1>
<p class="parrafo">✔️ Limpia el tambor y el filtro regularmente para evitar residuos. <br>
                    ✔️ Usa detergente adecuado según el tipo de lavadora.<br>
                    ✔️ No sobrecargues el tambor para evitar desgaste prematuro. <br>
                    ✔️ Revisa las mangueras y conexiones de agua periódicamente.
</p>
```
- **Consejos preventivos**: Tips para mantener la lavadora en buen estado
- Uso de emoji de herramientas y checkmarks para mejor presentación

### Sección de Marcas
```html
<h1 class="subTitulo">Marcas que reparamos ✔️ </h1>
<div class="marcas">
    <li class="parrafo">✔️LG</li> 
    <li class="parrafo">✔️ Samsung</li>
    <li class="parrafo">✔️ Whirlpool</li>
    <li class="parrafo">✔️ Mabe</li>
    <li class="parrafo">✔️ Electrolux</li>
    <li class="parrafo">✔️ Frigidaire</li>
    <li class="parrafo">✔️ Bosch</li>
    <li class="parrafo">✔️ GE (General Electric)</li>
    <li class="parrafo">✔️ Panasonic</li>
</div>
```
- **Lista de marcas**: Marcas de lavadoras que la empresa repara
- `marcas`: Contenedor personalizado para la lista
- Uso inconsistente de `<li>` fuera de `<ul>` (debería corregirse)

## Dependencias Externas
- **Bootstrap 4.1.3**: Framework CSS para diseño responsivo
- **jQuery 3.6.0**: Librería JavaScript
- **Popper.js 1.14.7**: Para componentes de Bootstrap
- **Google Fonts (Poppins)**: Tipografía personalizada
- **main.css**: Archivo de estilos personalizado local

## Archivos Relacionados
- `index.html`: Página principal
- `neveras.html`: Página de neveras
- `secadoras.html`: Página de secadoras
- `form.php`: Formulario de contacto
- `Estilos/main.css`: Archivo de estilos personalizado

