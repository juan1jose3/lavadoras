# 📋 Formulario de Servicio Técnico AEONIX - Documentación Técnica

## 📖 Descripción General
Formulario web interactivo para agendar servicios técnicos de electrodomésticos con integración de mapas para selección de ubicación. El sistema permite a los usuarios solicitar servicios de reparación, mantenimiento y revisión técnica para neveras, lavadoras y secadoras.

## 🏗️ Estructura del Documento HTML

### Declaración DOCTYPE y Elemento HTML Raíz
```html
<!DOCTYPE html>
<html lang="en">
```
- **`<!DOCTYPE html>`**: Declara el documento como HTML5
- **`<html lang="en">`**: Elemento raíz con idioma inglés (aunque el contenido está en español)

### Sección HEAD - Metadatos y Recursos Externos

#### Meta Tags y Configuración Básica
```html
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Form</title>
```
- **`charset="UTF-8"`**: Define codificación de caracteres UTF-8 para soporte internacional
- **`viewport`**: Configuración responsive para dispositivos móviles
- **`<title>`**: Título que aparece en la pestaña del navegador

#### Framework CSS Bootstrap
```html
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
  crossorigin="anonymous"
/>
```
- **Bootstrap 4.1.3**: Framework CSS para diseño responsive y componentes predefinidos
- **`integrity`**: Hash SHA384 para verificación de integridad del archivo
- **`crossorigin="anonymous"`**: Política CORS para recursos externos

#### Fuentes de Google Fonts
```html
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
  href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,800&display=swap"
  rel="stylesheet"
/>
```
- **`preconnect`**: Optimización de rendimiento para conexiones DNS tempranas
- **Fuente Poppins**: Tipografía moderna con múltiples pesos (100-900) e itálicas
- **`display=swap`**: Estrategia de carga de fuentes para mejorar rendimiento

#### Librería Leaflet para Mapas
```html
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" 
      integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
```
- **Leaflet 1.9.4**: Librería JavaScript para mapas interactivos
- Estilos CSS necesarios para el funcionamiento del mapa

#### Hoja de Estilos Personalizada
```html
<link rel="stylesheet" href="Estilos/form.css">
```
- **CSS personalizado**: Archivo local con estilos específicos del formulario

### Scripts JavaScript

#### Librerías jQuery y Bootstrap
```html
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
```
- **jQuery 3.6.0**: Librería para manipulación DOM y AJAX
- **Popper.js 1.14.7**: Librería para posicionamiento de elementos flotantes
- **Bootstrap JS 4.5.2**: Componentes interactivos de Bootstrap

## 🧭 Barra de Navegación

### Estructura de Navegación
```html
<nav class="navbar navbar-expand-lg miNav">
  <a class="navbar-brand" href="#">AEONIX</a>
```
- **`navbar`**: Clase Bootstrap para barra de navegación
- **`navbar-expand-lg`**: Expansión en pantallas grandes
- **`miNav`**: Clase CSS personalizada
- **`navbar-brand`**: Marca o logo de la empresa

### Botón de Navegación Móvil
```html
<button
  class="navbar-toggler"
  type="button"
  data-toggle="collapse"
  data-target="#navbarNav"
  aria-controls="navbarNav"
  aria-expanded="false"
  aria-label="Toggle navigation"
>
  <span class="navbar-toggler-icon"></span>
</button>
```
- **`navbar-toggler`**: Botón hamburguesa para móviles
- **`data-toggle="collapse"`**: Funcionalidad de colapso Bootstrap
- **`data-target="#navbarNav"`**: Elemento objetivo a mostrar/ocultar
- **Atributos ARIA**: Accesibilidad para lectores de pantalla

### Menú de Navegación
```html
<div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav">
```
- **`collapse navbar-collapse`**: Contenedor colapsable
- **`navbar-nav`**: Lista de navegación Bootstrap

#### Enlaces de Navegación
```html
<li class="nav-item active">
  <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
</li>
```
- **`nav-item active`**: Elemento de navegación activo
- **`sr-only`**: Texto solo visible para lectores de pantalla
- Enlaces a diferentes secciones: Neveras, Lavadoras, Secadores, Contacto

## 📝 Formulario Principal

### Contenedor del Formulario
```html
<div class="box">
  <h1>🔧 Agenda tu Servicio Técnico</h1>
  <form id="formulario" method="POST" action="includes/insert.php">
```
- **`box`**: Clase CSS personalizada para el contenedor
- **`method="POST"`**: Método HTTP para envío de datos
- **`action="includes/insert.php"`**: Script PHP que procesa el formulario

## 👤 Sección 1: Información Personal

### Estructura de Sección
```html
<div class="form-section">
  <div class="section-title">👤 Información Personal</div>
```
- **`form-section`**: Clase para agrupar campos relacionados
- **`section-title`**: Título visual de la sección

### Campos de Identificación
```html
<div class="form-row">
  <div>
    <label for="cedula">Cédula <span class="required-asterisk">*</span></label>
    <input type="number" name="cedula" id="cedula" required minlength="3" 
           title="No se permiten letras" placeholder="Ingresa tu número de cédula"/>
  </div>
```
- **`form-row`**: Contenedor para campos en la misma fila
- **`type="number"`**: Tipo de entrada numérica
- **`required`**: Campo obligatorio HTML5
- **`minlength="3"`**: Mínimo 3 caracteres
- **`title`**: Tooltip informativo
- **`placeholder`**: Texto de ayuda en el campo

### Campo de Teléfono
```html
<input type="tel" name="telefono" id="telefono" required placeholder="Ej: 300 123 4567"/>
```
- **`type="tel"`**: Tipo específico para números telefónicos
- Optimizado para teclados móviles

### Campos de Nombre y Apellido
```html
<input type="text" name="nombres" id="nombres" required minlength="3" 
       pattern="[A-Za-zÀ-ÿ\s]+" title="Solo se permiten letras y espacios" 
       placeholder="Tus nombres"/>
```
- **`pattern="[A-Za-zÀ-ÿ\s]+"`**: Expresión regular que permite:
  - A-Z: Letras mayúsculas inglesas
  - a-z: Letras minúsculas inglesas
  - À-ÿ: Caracteres acentuados y especiales
  - \s: Espacios en blanco
  - +: Uno o más caracteres

### Campo de Email
```html
<input type="email" name="correo" id="correo" required placeholder="tu@email.com"/>
```
- **`type="email"`**: Validación automática de formato email
- Teclado optimizado en dispositivos móviles

### Selector de Localidad
```html
<select name="localidad" id="localidad" required>
  <option value="">📍 Seleccione su localidad</option>
  <option value="Usaquén">Usaquén</option>
  <!-- ... más opciones ... -->
</select>
```
- **`<select>`**: Lista desplegable
- **`value=""`**: Opción vacía por defecto
- **20 localidades de Bogotá**: Todas las localidades administrativas

## ⚡ Sección 2: Información del Electrodoméstico

### Selectores de Servicio
```html
<select name="electro" id="electro" required>
  <option value="">🔌 Seleccione el electrodoméstico</option>
  <option value="1">❄️ Nevera</option>
  <option value="2">🌀 Lavadora</option>
  <option value="3">🔥 Secadora</option>
</select>
```
- **Valores numéricos**: IDs para base de datos
- **Emojis**: Mejora la experiencia visual

### Campo de Descripción
```html
<textarea name="des" id="des" required rows="6" 
          placeholder="Describe detalladamente qué está pasando..."></textarea>
```
- **`<textarea>`**: Campo de texto multilínea
- **`rows="6"`**: Altura inicial de 6 líneas
- **Placeholder extenso**: Guía detallada para el usuario

## 💳 Sección 3: Método de Pago
```html
<select name="metodoPago" id="metodoPago" required>
  <option value="1">💳 Tarjeta débito</option>
  <option value="2">💎 Tarjeta crédito</option>
  <option value="3">📱 Transferencia bancaria</option>
  <option value="4">💵 Efectivo</option>
</select>
```
- **4 métodos de pago**: Cobertura completa de opciones de pago

## 📍 Sección 4: Ubicación del Servicio

### Campos Ocultos para Coordenadas
```html
<input type="hidden" id="latitud" name="latitud" placeholder="Latitud" readonly>
<input type="hidden" id="longitud" name="longitud" placeholder="Longitud" readonly>
```
- **`type="hidden"`**: Campos no visibles al usuario
- **`readonly`**: Solo lectura, valores establecidos por JavaScript
- Almacenan coordenadas GPS seleccionadas en el mapa

### Contenedor del Mapa
```html
<div id="map">
  <p>🗺️ Haz clic en el mapa para seleccionar la ubicación exacta...</p>
</div>
```
- **`id="map"`**: Contenedor donde se renderiza el mapa Leaflet
- Texto instructivo para el usuario

### Botón de Envío
```html
<button type="submit" class="submit-btn">🚀 ¡AGENDAR MI SERVICIO AHORA!</button>
```
- **`type="submit"`**: Envía el formulario al hacer clic
- **Diseño llamativo**: Incentiva la acción del usuario

## 🎯 JavaScript - Funcionalidad del Formulario

### Carga de Librería Leaflet
```html
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" 
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" 
        crossorigin=""></script>
```
- **Leaflet.js**: Librería principal para mapas interactivos

### Event Listener para DOM Cargado
```javascript
document.addEventListener('DOMContentLoaded', function() {
    const map = document.getElementById('map');
    map.addEventListener('click', function() {
        console.log('Mapa clickeado');
    });
});
```
- **`DOMContentLoaded`**: Se ejecuta cuando el DOM está completamente cargado
- **Event listener del mapa**: Detecta clics en el mapa (funcionalidad básica)
- **`console.log`**: Debug para verificar funcionamiento

### Validación de Formulario
```javascript
document.getElementById('formulario').addEventListener('submit', function(e) {
    const cedula = document.getElementById('cedula').value;
    const telefono = document.getElementById('telefono').value;
    
    if (cedula.length < 6) {
        e.preventDefault();
        alert('La cédula debe tener al menos 6 dígitos');
        return;
    }
    
    if (telefono.length < 10) {
        e.preventDefault();
        alert('El número de teléfono debe tener al menos 10 dígitos');
        return;
    }
});
```
- **`addEventListener('submit')`**: Intercepta el envío del formulario
- **`e.preventDefault()`**: Previene el envío si hay errores
- **Validaciones personalizadas**:
  - Cédula: mínimo 6 dígitos
  - Teléfono: mínimo 10 dígitos
- **`alert()`**: Muestra mensajes de error al usuario

### Script Externo del Mapa
```html
<script src="js/map.js"></script>
```
- **Archivo separado**: Lógica específica del mapa en archivo independiente
- **Modularización**: Mejor organización del código

## 🔧 Archivos de Dependencias

### Archivos CSS
- **`Estilos/form.css`**: Estilos personalizados del formulario
- **Bootstrap CSS**: Framework de diseño
- **Leaflet CSS**: Estilos del mapa
- **Google Fonts CSS**: Tipografía Poppins

### Archivos JavaScript
- **`js/map.js`**: Lógica del mapa interactivo
- **jQuery**: Manipulación DOM
- **Bootstrap JS**: Componentes interactivos
- **Leaflet JS**: Funcionalidad del mapa

### Archivo de Procesamiento
- **`includes/insert.php`**: Script PHP que procesa los datos del formulario

## 🚀 Flujo de Funcionamiento

1. **Carga de la página**: Se cargan todos los recursos CSS y JavaScript
2. **Inicialización**: Event listeners se configuran cuando DOM está listo
3. **Interacción del usuario**: Llena el formulario y selecciona ubicación en mapa
4. **Validación**: JavaScript valida campos antes del envío
5. **Envío**: Datos se envían via POST a `insert.php`
6. **Procesamiento**: PHP procesa y almacena los datos

