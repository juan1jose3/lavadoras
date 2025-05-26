# README - Página Web de Secadoras AEONIX

## Descripción General
Esta es una página web dedicada a servicios de reparación de secadoras de ropa de la empresa AEONIX. La página incluye información sobre problemas comunes, soluciones específicas, consejos de mantenimiento y las marcas que reparan.

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
<title>Secadoras</title>
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
  <span style="color: #5ea8e4">Seca bien, seca seguro. Reparamos tu secadora</span>
</h1>
```
- **Título principal**: Slogan específico para secadoras con color azul claro
- `titulo`: Clase CSS personalizada para estilos específicos
- Color `#5ea8e4`: Azul claro aplicado inline

### Párrafo Descriptivo
```html
<p class="parrafo">
    Tu secadora ya no seca como antes?<br>
    Si notas que tu ropa sigue húmeda o la secadora tarda demasiado, <br>
    es momento de una revisión.<br><br>
    ✔️ Soluciones rápidas y efectivas para que tu <br>
    secadora funcione al 100%.<br><br>
    ⚙️ Reparación de todas las marcas y modelos. <br>
    💨 Optimizamos el rendimiento y prolongamos la vida útil de tu equipo.
</p>
```
- **Párrafo promocional**: Describe problemas específicos de secado
- `<br>`: Saltos de línea para formateo visual
- **Emojis utilizados**: ✔️ (checkmark), ⚙️ (engranaje), 💨 (viento/aire)
- Enfoque en rendimiento y eficiencia del secado

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
- **Error de contenido**: El título dice "lavadoras" pero debería decir "secadoras"
- `subTitulo`: Clase CSS personalizada

### Primera Sección de Problemas
```html
<div class="cualidades" style="background-color: #2e1bd4;">
    <div class="container">
        <br>
        <h2>1.La secadora no enciende<br></h2>
        <p>
            <ul>
                <li>Causa: Cableado defectuoso o puerta mal cerrada.li><br>
                <li>Solución: Verificar conexión eléctrica y seguro de la puerta.</li> <br>
            </ul>
        </p>
    </div>
```
- `cualidades`: Contenedor principal con fondo azul oscuro (`#2e1bd4`)
- `container`: Clase Bootstrap para contenido centrado y responsivo
- **Error de sintaxis**: Primera `<li>` tiene `.li` en lugar de `</li>`
- **Problema 1**: La secadora no enciende - problema eléctrico común

```html
<div class="container">
    <br>
    <h2>2. No seca la ropa completamente<br></h2>
    <p>
        <ul>
            <li>Causa: Filtro de pelusa obstruido o resistencia dañada.</li><br>
            <li>Solución: Limpiar el filtro y revisar la resistencia térmica.</li><br>
        </ul>
    </p>
</div>
```
- **Problema 2**: No seca completamente - problema más común en secadoras

```html
<div class="container">
    <br>
    <h2>3.Hace ruidos extraños o vibraciones<br></h2>
    <p>
        <ul>
            <li>Causa: Rodamientos desgastados o piezas sueltas.</li><br>
            <li>Solución: Ajustar tornillos y reemplazar rodamientos si es necesario.</li> <br>
        </ul>
    </p>
</div>
```
- **Problema 3**: Ruidos y vibraciones - problemas mecánicos

### Segunda Sección de Problemas
```html
<div class="cualidades" style="background-color: #2e1bd4;">
    <div class="container">
        <br>
        <h2>4 Se apaga antes de terminar el ciclo<br></h2>
        <ul>
            <li>Causa: Sobrecalentamiento o sensor de temperatura defectuoso.</li><br>
            <li>Solución: Limpiar conductos de ventilación y revisar el sensor.</li> <br>
        </ul>
    </div>
```
- **Problema 4**: Se apaga prematuramente - problemas de temperatura
- **Error tipográfico**: Falta punto después del "4"

```html
<div class="container">
    <br>
    <h2>5. Tarda mucho en secar la ropa<br></h2>
    <ul>
        <li>Causa: Ventilación obstruida o termostato fallando.</li><br>
        <li> Solución: Revisar y limpiar el sistema de ventilación.</li> <br>
    </ul>
</div>
```
- **Problema 5**: Secado lento - problemas de ventilación
- **Error de formato**: Espacio extra antes de "Solución"

```html
<div class="container">
    <br>
    <h2>6.  Emite un olor a quemado<br></h2>
    <ul>
        <li>Causa: Acumulación de pelusa o falla en el motor.</li><br>
        <li>Solución: Limpiar internamente y verificar el motor.</li> <br>
    </ul>
</div>
```
- **Problema 6**: Olor a quemado - problema de seguridad crítico
- **Error de formato**: Doble espacio después del "6"

### Sección de Consejos de Mantenimiento
```html
<h1 class="subTitulo">🛠️ Consejos para el Mantenimiento de una Secadora</h1>
<p class="parrafo"> ✔️ Limpia el filtro de pelusa después de cada uso <br>
                    ✔️ Verifica y limpia el conducto de ventilación<br>
                    ✔️ Limpia el interior de la secadora periódicamente <br>
                    ✔️ Revisa el estado de la correa y los rodamientos.
</p>
```
- **Consejos específicos**: Tips para mantener secadoras en buen estado
- Uso de emoji de herramientas y checkmarks
- Enfoque en limpieza de pelusa y ventilación

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
- **Lista de marcas**: 9 marcas de secadoras que la empresa repara
- `marcas`: Contenedor personalizado para la lista
- Misma cantidad de marcas que en la página de lavadoras
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
- `lavadoras.html`: Página de lavadoras
- `form.php`: Formulario de contacto
- `Estilos/main.css`: Archivo de estilos personalizado
