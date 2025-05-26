# README - Página Web de Neveras AEONIX

## Descripción General
Esta es una página web dedicada a servicios de reparación de neveras/refrigeradores de la empresa AEONIX. La página incluye información sobre problemas comunes, diagnósticos, soluciones y las marcas que reparan.

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
<head> <head>
```
- **Error de sintaxis**: Hay dos etiquetas `<head>` abiertas (debería corregirse)

```html
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
<link rel="stylesheet" href="Estilos/main.css">
```
- **CSS Personalizado**: Enlaza archivo de estilos local ubicado en carpeta "Estilos"

```html
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
```
- **Preconexión a Google Fonts**: Establece conexión temprana con servidores de fuentes para mejorar rendimiento

```html
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
```
- **Fuente Poppins**: Carga la familia de fuentes Poppins con todos los pesos e itálicas
- `display=swap`: Permite mostrar fuente de respaldo hasta que Poppins cargue completamente

```html
<title>Nevera</title>
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
  <span style="color: #3612d6">Recupera el frío. Recupera tu nevera.</span>
</h1>
```
- **Título principal**: Slogan específico para neveras con color morado
- `titulo`: Clase CSS personalizada para estilos específicos
- Color `#3612d6`: Morado oscuro aplicado inline

### Párrafo Descriptivo
```html
<p class="parrafo">
    ¿Tu nevera no enfría correctamente o hace ruidos extraños? <br>
     No te preocupes, somos expertos en la reparación de neveras de <br>
     todas las marcas y modelos. <br><br>
     Diagnóstico rápido y solución efectiva para que tu nevera <br>
      vuelva a funcionar como nueva.<br><br>
</p>
```
- **Párrafo promocional**: Describe los servicios específicos para neveras
- `<br>`: Saltos de línea para formateo visual
- Mensaje enfocado en problemas típicos de refrigeración

### Botón de Llamada a la Acción
```html
<button class="boton" onclick="window.location.href='form.php'">¡CONTÁCTANOS AHORA MISMO!</button>
```
- **Botón CTA**: Redirige a formulario de contacto
- `onclick`: Evento JavaScript para navegación
- `window.location.href`: Cambia la URL actual

### Subtítulo de Sección
```html
<h1 class="subTitulo">Problemas comunes en neveras <br> 
    y como solucionarlos
</h1>
```
- **Subtítulo**: Introduce la sección de problemas específicos de neveras
- `subTitulo`: Clase CSS personalizada

### Primera Sección de Problemas
```html
<div class="cualidades" style="background-color: #521186;">
    <div class="container">
        <br>
        <h2>1.La nevera no enfría <br></h2>
        <p>
            <ul>
                <li>Causas: Termostato descalibrado, fuga de gas, fallo en el compresor o ventilador.</li><br>
                <li>Soluciones: Ajustar termostato, recargar gas, revisar y cambiar compresor o ventilador.</li> <br>
            </ul>
        </p>
    </div>
```
- `cualidades`: Contenedor principal con fondo morado (`#521186`)
- `container`: Clase Bootstrap para contenido centrado y responsivo
- **Problema 1**: La nevera no enfría - problema más común en refrigeradores

```html
<div class="container">
    <br>
    <h2>2.Ruidos extraños<br></h2>
    <p>
        <ul>
            <li>Causas: Ventilador con hielo, desgaste en el compresor, tornillos sueltos.</li><br>
            <li>Soluciones: Descongelar, lubricar o cambiar compresor, ajustar tornillos.</li> <br>
        </ul>
    </p>
</div>
```
- **Problema 2**: Ruidos extraños - problemas relacionados con componentes mecánicos

```html
<div class="container">
    <br>
    <h2>3.Acumulación de agua<br></h2>
    <p>
        <ul>
            <li>Causas: Drenaje obstruido, falla en el termostato, exceso de humedad.</li><br>
            <li>Soluciones: Limpiar drenaje, revisar termostato, mejorar ventilación.</li> <br>
        </ul>
    </p>
</div>
```
- **Problema 3**: Acumulación de agua - problemas de drenaje y humedad

### Segunda Sección de Problemas
```html
<div class="cualidades" style="background-color: #521186;">
    <div class="container">
        <br>
        <h2>4.La nevera congela demasiado<br></h2>
        <ul>
            <li>Causas: Termostato mal ajustado, sensor de temperatura defectuoso.</li><br>
            <li>Soluciones: Regular temperatura, reemplazar sensor si es necesario.</li> <br>
        </ul>
    </div>
```
- **Problema 4**: Congelación excesiva - problemas de control de temperatura

```html
<div class="container">
    <br>
    <h2>5.La nevera no enciende <br></h2>
    <ul>
        <li>Causas: Problema eléctrico, fusible quemado, fallo en el compresor.</li><br>
        <li>Soluciones: Verificar enchufe, cambiar fusible, revisar el compresor.</li> <br>
    </ul>
</div>
```
- **Problema 5**: La nevera no enciende - problemas eléctricos

```html
<div class="container">
    <br>
    <h2>6.Puerta no cierra bien<br></h2>
    <ul>
        <li>Causas: Gomas desgastadas, bisagras desajustadas, objeto bloqueando.</li><br>
        <li>Soluciones: Cambiar gomas, ajustar bisagras, reorganizar el interior.</li> <br>
    </ul>
</div>
```
- **Problema 6**: Puerta no cierra bien - problemas de sellado y estructura

### Sección de Diagnóstico
```html
<h1 class="subTitulo">🛠️ ¿Cómo Saber si tu Nevera Necesita Reparación?</h1>
<p class="parrafo">Si notas cualquiera de estos síntomas en tu nevera, es recomendable contactar a un profesional antes de que el problema se agrave, te ofrecemos diagnóstico gratuito y reparación garantizada.</p>
```
- **Sección informativa**: Orienta al usuario sobre cuándo buscar ayuda profesional
- Menciona diagnóstico gratuito como valor agregado

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
</div>
```
- **Lista de marcas**: Marcas de neveras que la empresa repara
- `marcas`: Contenedor personalizado para la lista
- Lista más corta que la versión de lavadoras (6 vs 9 marcas)
- Uso inconsistente de `<li>` fuera de `<ul>` (debería corregirse)

## Dependencias Externas
- **Bootstrap 4.1.3**: Framework CSS para diseño responsivo
- **jQuery 3.6.0**: Librería JavaScript
- **Popper.js 1.14.7**: Para componentes de Bootstrap
- **Google Fonts (Poppins)**: Tipografía personalizada
- **main.css**: Archivo de estilos personalizado local

## Archivos Relacionados
- `index.html`: Página principal
- `lavadoras.html`: Página de lavadoras
- `secadoras.html`: Página de secadoras
- `form.php`: Formulario de contacto
- `Estilos/main.css`: Archivo de estilos personalizado

