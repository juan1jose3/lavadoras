# Documentación CSS - Estilos del Formulario

Este documento explica línea por línea los estilos CSS para un formulario moderno con diseño oscuro y efectos visuales avanzados.

## Estructura General

El CSS está organizado en las siguientes secciones:
- Estilos base del body
- Navegación (navbar)
- Contenedor principal (box)
- Formularios y campos
- Botones
- Efectos y animaciones
- Responsive design

---

## 1. ESTILOS BASE DEL BODY

```css
body {
    background: linear-gradient(135deg, #0f1419 0%, #1a2332 50%, #0f1922 100%);
    color: #e8f4f8;
    font-family: "Poppins", sans-serif;
    min-height: 100vh;
    margin: 0;
    padding: 0;
}
```

**Línea por línea:**
- `background: linear-gradient(135deg, #0f1419 0%, #1a2332 50%, #0f1922 100%);`
  - **Propósito**: Crea un gradiente diagonal de fondo
  - **Ángulo**: 135 grados (diagonal hacia abajo-derecha)
  - **Colores**: Tonos oscuros azul-gris (#0f1419 → #1a2332 → #0f1922)
  
- `color: #e8f4f8;`
  - **Propósito**: Define el color de texto por defecto
  - **Color**: Azul claro muy suave para buena legibilidad
  
- `font-family: "Poppins", sans-serif;`
  - **Propósito**: Establece la fuente principal
  - **Fuente**: Poppins (Google Font) con fallback a sans-serif
  
- `min-height: 100vh;`
  - **Propósito**: Garantiza altura mínima de pantalla completa
  - **Valor**: 100% del viewport height
  
- `margin: 0;` y `padding: 0;`
  - **Propósito**: Elimina márgenes y padding predeterminados del navegador

---

## 2. NAVEGACIÓN (.miNav)

```css
.miNav {
    background: linear-gradient(90deg, #1e3a5f 0%, #2c5aa0 100%);
    box-shadow: 0 4px 20px rgba(44, 90, 160, 0.3);
    backdrop-filter: blur(10px);
}
```

**Línea por línea:**
- `background: linear-gradient(90deg, #1e3a5f 0%, #2c5aa0 100%);`
  - **Propósito**: Gradiente horizontal para la barra de navegación
  - **Dirección**: 90 grados (horizontal izquierda a derecha)
  - **Colores**: Azul oscuro a azul más claro
  
- `box-shadow: 0 4px 20px rgba(44, 90, 160, 0.3);`
  - **Propósito**: Añade sombra debajo del navbar
  - **Valores**: Sin desplazamiento horizontal, 4px hacia abajo, 20px de difuminado
  - **Color**: Azul semitransparente (30% opacidad)
  
- `backdrop-filter: blur(10px);`
  - **Propósito**: Efecto de desenfoque del fondo detrás del navbar
  - **Valor**: 10px de desenfoque para efecto cristal

---

## 3. MARCA DEL NAVBAR (.navbar-brand)

```css
.navbar-brand {
    color: #64b5f6 !important;
    font-weight: 700;
    font-size: 1.8rem;
    text-shadow: 0 0 10px rgba(100, 181, 246, 0.5);
}
```

**Línea por línea:**
- `color: #64b5f6 !important;`
  - **Propósito**: Color azul claro para el logo/marca
  - **!important**: Fuerza la aplicación del estilo
  
- `font-weight: 700;`
  - **Propósito**: Texto en negrita (bold)
  - **Valor**: 700 equivale a "bold"
  
- `font-size: 1.8rem;`
  - **Propósito**: Tamaño de fuente grande para destacar
  - **Valor**: 1.8 veces el tamaño base (aproximadamente 28.8px)
  
- `text-shadow: 0 0 10px rgba(100, 181, 246, 0.5);`
  - **Propósito**: Efecto de brillo/resplandor en el texto
  - **Valores**: Sin desplazamiento, 10px de difuminado, color azul semitransparente

---

## 4. MENÚ DESPLEGABLE (.dropdown-menu)

```css
.dropdown-menu {
    background: linear-gradient(135deg, #1e3a5f 0%, #2c5aa0 100%);
    border: 1px solid rgba(100, 181, 246, 0.3);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
}
```

**Línea por línea:**
- `background: linear-gradient(135deg, #1e3a5f 0%, #2c5aa0 100%);`
  - **Propósito**: Gradiente diagonal para el fondo del dropdown
  - **Consistencia**: Mismos colores que el navbar
  
- `border: 1px solid rgba(100, 181, 246, 0.3);`
  - **Propósito**: Borde sutil azul semitransparente
  - **Grosor**: 1px, estilo sólido, 30% de opacidad
  
- `box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);`
  - **Propósito**: Sombra pronunciada para elevar el dropdown
  - **Valores**: Sin desplazamiento horizontal, 8px hacia abajo, 32px de difuminado

---

## 5. ELEMENTOS DEL DROPDOWN (.dropdown-item)

```css
.dropdown-item {
    color: #e8f4f8;
    transition: all 0.3s ease;
}

.dropdown-item:hover {
    background: linear-gradient(90deg, #42a5f5 0%, #1e88e5 100%);
    color: white;
    transform: translateX(5px);
}
```

**Línea por línea:**
- `color: #e8f4f8;`
  - **Propósito**: Color de texto claro para contraste
  
- `transition: all 0.3s ease;`
  - **Propósito**: Suaviza todas las transiciones
  - **Duración**: 0.3 segundos con curva "ease"
  
- `:hover` - **Estado al pasar el mouse:**
  - `background: linear-gradient(90deg, #42a5f5 0%, #1e88e5 100%);`
    - **Propósito**: Gradiente horizontal azul en hover
  - `color: white;`
    - **Propósito**: Texto blanco para máximo contraste
  - `transform: translateX(5px);`
    - **Propósito**: Desplaza el elemento 5px hacia la derecha

---

## 6. ENLACES DE NAVEGACIÓN (.nav-link)

```css
.nav-link {
    color: #e8f4f8 !important;
    font-weight: 500;
    transition: all 0.3s ease;
}

.nav-link:hover {
    color: #64b5f6 !important;
    text-shadow: 0 0 8px rgba(100, 181, 246, 0.6);
}
```

**Línea por línea:**
- `font-weight: 500;`
  - **Propósito**: Peso de fuente medio (entre normal y bold)
  
- En `:hover`:
  - `text-shadow: 0 0 8px rgba(100, 181, 246, 0.6);`
    - **Propósito**: Efecto de brillo azul al hacer hover
    - **Intensidad**: 60% de opacidad para brillo notable

---

## 7. CONTENEDOR PRINCIPAL (.box)

```css
.box {
    max-width: 800px;
    margin: 40px auto;
    padding: 40px;
    background: linear-gradient(135deg, #1a2b42 0%, #2c4a73 50%, #1e3a5f 100%);
    border-radius: 25px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
    border: 1px solid rgba(100, 181, 246, 0.2);
    backdrop-filter: blur(10px);
}
```

**Línea por línea:**
- `max-width: 800px;`
  - **Propósito**: Limita el ancho máximo del contenedor
  - **Beneficio**: Mejora la legibilidad en pantallas grandes
  
- `margin: 40px auto;`
  - **Propósito**: Centra el contenedor horizontalmente
  - **Valores**: 40px arriba/abajo, "auto" para centrado horizontal
  
- `padding: 40px;`
  - **Propósito**: Espacio interno uniforme de 40px
  
- `background: linear-gradient(135deg, #1a2b42 0%, #2c4a73 50%, #1e3a5f 100%);`
  - **Propósito**: Gradiente diagonal con tres puntos de color
  - **Efecto**: Crea profundidad visual con tonos azul-gris
  
- `border-radius: 25px;`
  - **Propósito**: Esquinas muy redondeadas para diseño moderno
  
- `box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);`
  - **Propósito**: Sombra dramática para efecto flotante
  - **Valores**: 20px hacia abajo, 60px de difuminado, 40% opacidad
  
- `border: 1px solid rgba(100, 181, 246, 0.2);`
  - **Propósito**: Borde sutil azul para definir el contorno
  
- `backdrop-filter: blur(10px);`
  - **Propósito**: Efecto cristal/vidrio esmerilado

---

## 8. TÍTULO PRINCIPAL (.box h1)

```css
.box h1 {
    text-align: center;
    background: linear-gradient(135deg, #42a5f5 0%, #1e88e5 50%, #0288d1 100%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 40px;
    font-size: 2.5rem;
    font-weight: 700;
    text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}
```

**Línea por línea:**
- `text-align: center;`
  - **Propósito**: Centra el título horizontalmente
  
- `background: linear-gradient(135deg, #42a5f5 0%, #1e88e5 50%, #0288d1 100%);`
  - **Propósito**: Gradiente para el texto (efecto arcoíris)
  - **Colores**: Diferentes tonos de azul
  
- `background-clip: text;` y `-webkit-background-clip: text;`
  - **Propósito**: Aplica el gradiente solo al texto
  - **Compatibilidad**: Versión estándar y prefijo WebKit
  
- `-webkit-text-fill-color: transparent;`
  - **Propósito**: Hace el texto transparente para mostrar el gradiente
  
- `font-size: 2.5rem;`
  - **Propósito**: Tamaño grande para título principal (≈40px)
  
- `text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);`
  - **Propósito**: Sombra sutil para mejorar legibilidad

---

## 9. SECCIONES DE FORMULARIO (.form-section)

```css
.form-section {
    margin-bottom: 35px;
    padding: 25px;
    background: linear-gradient(135deg, #243447 0%, #364c63 100%);
    border-radius: 15px;
    border: 1px solid rgba(100, 181, 246, 0.15);
    transition: all 0.3s ease;
}

.form-section:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(66, 165, 245, 0.2);
    border-color: rgba(100, 181, 246, 0.3);
}
```

**Línea por línea:**
- `margin-bottom: 35px;`
  - **Propósito**: Espaciado entre secciones del formulario
  
- `padding: 25px;`
  - **Propósito**: Espacio interno para contenido de la sección
  
- `background: linear-gradient(135deg, #243447 0%, #364c63 100%);`
  - **Propósito**: Gradiente ligeramente diferente al contenedor principal
  - **Efecto**: Crea jerarquía visual
  
- `border-radius: 15px;`
  - **Propósito**: Esquinas redondeadas menos pronunciadas que el contenedor
  
- `border: 1px solid rgba(100, 181, 246, 0.15);`
  - **Propósito**: Borde muy sutil (15% opacidad)
  
- En `:hover`:
  - `transform: translateY(-2px);`
    - **Propósito**: Eleva la sección 2px hacia arriba
  - `box-shadow: 0 10px 30px rgba(66, 165, 245, 0.2);`
    - **Propósito**: Añade sombra azul en hover
  - `border-color: rgba(100, 181, 246, 0.3);`
    - **Propósito**: Intensifica el borde en hover

---

## 10. TÍTULOS DE SECCIÓN (.section-title)

```css
.section-title {
    color: #64b5f6;
    font-size: 1.4rem;
    font-weight: 600;
    margin-bottom: 20px;
    text-align: center;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}
```

**Línea por línea:**
- `color: #64b5f6;`
  - **Propósito**: Color azul claro para destacar títulos
  
- `font-size: 1.4rem;`
  - **Propósito**: Tamaño intermedio (≈22.4px)
  
- `font-weight: 600;`
  - **Propósito**: Semi-bold para jerarquía visual
  
- `text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);`
  - **Propósito**: Sombra sutil para profundidad

---

## 11. ETIQUETAS DE CAMPOS (.box label)

```css
.box label {
    display: block;
    margin: 20px 0 8px 0;
    font-weight: 600;
    color: #b3d9f2;
    font-size: 1rem;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}
```

**Línea por línea:**
- `display: block;`
  - **Propósito**: Hace que el label ocupe toda la línea
  
- `margin: 20px 0 8px 0;`
  - **Propósito**: Espaciado: 20px arriba, 0 derecha, 8px abajo, 0 izquierda
  
- `color: #b3d9f2;`
  - **Propósito**: Azul claro para las etiquetas (menos intenso que títulos)

---

## 12. CAMPOS DE ENTRADA (.box input, .box select, .box textarea)

```css
.box input, .box select, .box textarea {
    width: 100%;
    padding: 15px 20px;
    border: 2px solid rgba(100, 181, 246, 0.3);
    border-radius: 12px;
    font-size: 16px;
    box-sizing: border-box;
    background: linear-gradient(135deg, #1a2332 0%, #243447 100%);
    color: #e8f4f8;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    font-family: "Poppins", sans-serif;
}
```

**Línea por línea:**
- `width: 100%;`
  - **Propósito**: Campos ocupan todo el ancho disponible
  
- `padding: 15px 20px;`
  - **Propósito**: Espaciado interno generoso (15px vertical, 20px horizontal)
  
- `border: 2px solid rgba(100, 181, 246, 0.3);`
  - **Propósito**: Borde azul semitransparente de 2px
  
- `border-radius: 12px;`
  - **Propósito**: Esquinas redondeadas moderadas
  
- `font-size: 16px;`
  - **Propósito**: Tamaño de fuente específico para evitar zoom en móviles
  
- `box-sizing: border-box;`
  - **Propósito**: Incluye padding y border en el ancho total
  
- `background: linear-gradient(135deg, #1a2332 0%, #243447 100%);`
  - **Propósito**: Fondo degradado coherente con el diseño
  
- `transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);`
  - **Propósito**: Transición suave con curva material design

---

## 13. PLACEHOLDERS

```css
.box input::placeholder, .box textarea::placeholder {
    color: #7ba7c7;
}
```

**Línea por línea:**
- `color: #7ba7c7;`
  - **Propósito**: Color azul grisáceo para texto de placeholder
  - **Contraste**: Suficiente contraste pero no distrae del contenido

---

## 14. ESTADO FOCUS DE CAMPOS

```css
.box input:focus, .box select:focus, .box textarea:focus {
    border-color: #42a5f5;
    outline: none;
    background: linear-gradient(135deg, #243447 0%, #2c4a73 100%);
    box-shadow: 0 0 0 4px rgba(66, 165, 245, 0.1);
    transform: translateY(-1px);
}
```

**Línea por línea:**
- `border-color: #42a5f5;`
  - **Propósito**: Borde azul más intenso al enfocar
  
- `outline: none;`
  - **Propósito**: Elimina el outline predeterminado del navegador
  
- `background: linear-gradient(135deg, #243447 0%, #2c4a73 100%);`
  - **Propósito**: Fondo ligeramente más claro en focus
  
- `box-shadow: 0 0 0 4px rgba(66, 165, 245, 0.1);`
  - **Propósito**: Anillo de enfoque azul sutil (accesibilidad)
  
- `transform: translateY(-1px);`
  - **Propósito**: Eleva el campo 1px para feedback visual

---

## 15. CAMPOS SELECT PERSONALIZADOS

```css
.box select {
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%2364b5f6' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 12px center;
    background-repeat: no-repeat;
    background-size: 16px;
    padding-right: 50px;
}
```

**Línea por línea:**
- `cursor: pointer;`
  - **Propósito**: Cambia el cursor para indicar interactividad
  
- `appearance: none;`
  - **Propósito**: Elimina el estilo predeterminado del select
  
- `background-image: url("data:image/svg+xml,...")`
  - **Propósito**: Icono SVG personalizado de flecha hacia abajo
  - **Color**: Codificado como %2364b5f6 (azul claro)
  
- `background-position: right 12px center;`
  - **Propósito**: Posiciona el icono a 12px del borde derecho, centrado verticalmente
  
- `background-repeat: no-repeat;`
  - **Propósito**: Evita que el icono se repita
  
- `background-size: 16px;`
  - **Propósito**: Tamaño del icono de 16px
  
- `padding-right: 50px;`
  - **Propósito**: Espacio para el icono personalizado

---

## 16. OPCIONES DEL SELECT

```css
.box select option {
    background: #1a2332;
    color: #e8f4f8;
    padding: 10px;
}
```

**Línea por línea:**
- `background: #1a2332;`
  - **Propósito**: Fondo oscuro coherente para opciones
  
- `color: #e8f4f8;`
  - **Propósito**: Texto claro para contraste
  
- `padding: 10px;`
  - **Propósito**: Espaciado interno para mejor UX

---

## 17. FILAS DE FORMULARIO (.form-row)

```css
.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}
```

**Línea por línea:**
- `display: grid;`
  - **Propósito**: Activa CSS Grid para layout
  
- `grid-template-columns: 1fr 1fr;`
  - **Propósito**: Dos columnas de igual ancho
  - **1fr**: Una fracción del espacio disponible
  
- `gap: 20px;`
  - **Propósito**: Espaciado de 20px entre columnas

---

## 18. SECCIÓN DE UBICACIÓN (.location)

```css
.location {
    margin: 30px 0;
}
```

**Línea por línea:**
- `margin: 30px 0;`
  - **Propósito**: Espaciado vertical de 30px arriba y abajo

---

## 19. MAPA (#map)

```css
#map {
    width: 100%;
    height: 350px;
    border: 2px solid rgba(100, 181, 246, 0.3);
    border-radius: 15px;
    margin-top: 15px;
    background: linear-gradient(135deg, #243447 0%, #364c63 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #7ba7c7;
    font-size: 1.1rem;
    transition: all 0.3s ease;
}

#map:hover {
    border-color: #42a5f5;
}
```

**Línea por línea:**
- `width: 100%;` y `height: 350px;`
  - **Propósito**: Dimensiones del contenedor del mapa
  
- `display: flex;`, `align-items: center;`, `justify-content: center;`
  - **Propósito**: Centra el contenido del mapa (placeholder)
  
- `font-size: 1.1rem;`
  - **Propósito**: Tamaño de fuente para texto del placeholder
  
- En `:hover`:
  - `border-color: #42a5f5;`
    - **Propósito**: Borde más intenso al hacer hover

---

## 20. BOTÓN DE ENVÍO (.submit-btn)

```css
.submit-btn {
    background: linear-gradient(135deg, #1e88e5 0%, #42a5f5 50%, #64b5f6 100%);
    color: white;
    padding: 18px 40px;
    border: none;
    border-radius: 50px;
    font-size: 20px;
    font-weight: 700;
    cursor: pointer;
    width: 100%;
    margin-top: 30px;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 0 8px 32px rgba(30, 136, 229, 0.4);
    position: relative;
    overflow: hidden;
    font-family: "Poppins", sans-serif;
}
```

**Línea por línea:**
- `background: linear-gradient(135deg, #1e88e5 0%, #42a5f5 50%, #64b5f6 100%);`
  - **Propósito**: Gradiente azul atractivo con tres puntos
  
- `padding: 18px 40px;`
  - **Propósito**: Padding generoso para botón prominente
  
- `border: none;`
  - **Propósito**: Elimina borde predeterminado
  
- `border-radius: 50px;`
  - **Propósito**: Botón completamente redondeado (estilo pill)
  
- `font-size: 20px;` y `font-weight: 700;`
  - **Propósito**: Texto grande y bold para énfasis
  
- `width: 100%;`
  - **Propósito**: Botón ocupa todo el ancho disponible
  
- `transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);`
  - **Propósito**: Transición suave con curva de rebote
  
- `box-shadow: 0 8px 32px rgba(30, 136, 229, 0.4);`
  - **Propósito**: Sombra azul pronunciada para profundidad
  
- `position: relative;` y `overflow: hidden;`
  - **Propósito**: Necesario para el efecto de brillo

---

## 21. EFECTO DE BRILLO DEL BOTÓN (.submit-btn::before)

```css
.submit-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.8s;
}
```

**Línea por línea:**
- `content: '';`
  - **Propósito**: Crea pseudo-elemento vacío
  
- `position: absolute;`
  - **Propósito**: Posicionamiento absoluto respecto al botón
  
- `left: -100%;`
  - **Propósito**: Inicia fuera del botón (izquierda)
  
- `background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);`
  - **Propósito**: Gradiente de brillo horizontal
  - **Efecto**: Transparente → blanco semitransparente → transparente
  
- `transition: left 0.8s;`
  - **Propósito**: Anima el movimiento horizontal

---

## 22. ESTADO HOVER DEL BOTÓN

```css
.submit-btn:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 15px 40px rgba(30, 136, 229, 0.6);
    background: linear-gradient(135deg, #0d47a1 0%, #1565c0 50%, #1976d2 100%);
}

.submit-btn:hover::before {
    left: 100%;
}
```

**Línea por línea:**
- `transform: translateY(-3px) scale(1.02);`
  - **Propósito**: Eleva 3px y aumenta 2% el tamaño
  - **Efecto**: Botón "salta" al hacer hover
  
- `box-shadow: 0 15px 40px rgba(30, 136, 229, 0.6);`
  - **Propósito**: Sombra más intensa y extendida
  
- `background: linear-gradient(135deg, #0d47a1 0%, #1565c0 50%, #1976d2 100%);`
  - **Propósito**: Gradiente más oscuro en hover
  
- `.submit-btn:hover::before { left: 100%; }`
  - **Propósito**: Mueve el brillo hacia la derecha

---

## 23. ESTADO ACTIVE DEL BOTÓN

```css
.submit-btn:active {
    transform: translateY(-1px) scale(1.01);
}
```

**Línea por línea:**
- `transform: translateY(-1px) scale(1.01);`
  - **Propósito**: Efecto más sutil al hacer clic
  - **Feedback**: Indica que el botón fue presionado

---

## 24. MENSAJES DE ERROR (.error)

```css
.error {
    color: #ff6b6b;
    font-size: 14px;
    margin-top: 8px;
    font-weight: 500;
}
```

**Línea por línea:**
- `color: #ff6b6b;`
  - **Propósito**: Color rojo coral para indicar errores
  - **Accesibilidad**: Color distintivo para mensajes de error
  
- `font-size: 14px;`
  - **Propósito**: Tamaño menor que el texto normal
  - **Jerarquía**: Menos prominente pero visible
  
- `margin-top: 8px;`
  - **Propósito**: Espaciado entre el campo y el mensaje de error
  
- `font-weight: 500;`
  - **Propósito**: Peso medio para destacar sin ser excesivo

---

## 25. ANIMACIONES

### Animación fadeInUp
```css
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
```

**Línea por línea:**
- `@keyframes fadeInUp`
  - **Propósito**: Define una animación personalizada
  - **Nombre**: "fadeInUp" para aparecer desde abajo
  
- `from { opacity: 0; transform: translateY(30px); }`
  - **Estado inicial**: Invisible y 30px hacia abajo
  
- `to { opacity: 1; transform: translateY(0); }`
  - **Estado final**: Visible y en posición normal

### Aplicación de animaciones
```css
.box {
    animation: fadeInUp 0.8s ease-out;
}

.form-section {
    animation: fadeInUp 0.8s ease-out;
    animation-fill-mode: both;
}
```

**Línea por línea:**
- `animation: fadeInUp 0.8s ease-out;`
  - **Propósito**: Aplica la animación fadeInUp
  - **Duración**: 0.8 segundos
  - **Curva**: ease-out (rápido al inicio, lento al final)
  
- `animation-fill-mode: both;`
  - **Propósito**: Mantiene los estilos antes y después de la animación

### Retrasos secuenciales
```css
.form-section:nth-child(1) { animation-delay: 0.1s; }
.form-section:nth-child(2) { animation-delay: 0.2s; }
.form-section:nth-child(3) { animation-delay: 0.3s; }
.form-section:nth-child(4) { animation-delay: 0.4s; }
```

**Línea por línea:**
- `animation-delay: X.Xs;`
  - **Propósito**: Retrasa el inicio de cada animación
  - **Efecto**: Las secciones aparecen una tras otra (efecto cascada)

---

## 26. DISEÑO RESPONSIVE

```css
@media (max-width: 768px) {
    .box {
        margin: 20px;
        padding: 25px;
    }
    
    .box h1 {
        font-size: 2rem;
    }
    
    .form-row {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .submit-btn {
        font-size: 18px;
        padding: 15px 30px;
    }

    #map {
        height: 250px;
    }
}
```

**Línea por línea:**
- `@media (max-width: 768px)`
  - **Propósito**: Aplica estilos para pantallas menores a 768px
  - **Dispositivos**: Tablets y móviles
  
- `.box { margin: 20px; padding: 25px; }`
  - **Propósito**: Reduce márgenes y padding en móviles
  - **Beneficio**: Aprovecha mejor el espacio limitado
  
- `.box h1 { font-size: 2rem; }`
  - **Propósito**: Reduce el tamaño del título principal
  - **Legibilidad**: Evita que el título sea demasiado grande
  
- `.form-row { grid-template-columns: 1fr; }`
  - **Propósito**: Cambia de 2 columnas a 1 columna
  - **UX**: Mejor experiencia en pantallas pequeñas
  
- `.form-row { gap: 15px; }`
  - **Propósito**: Reduce el espaciado entre elementos
  
- `.submit-btn { font-size: 18px; padding: 15px 30px; }`
  - **Propósito**: Reduce tamaño del botón para móviles
  
- `#map { height: 250px; }`
  - **Propósito**: Reduce altura del mapa en móviles

---

## 27. ESTILOS ADICIONALES DEL TEXTAREA

```css
textarea {
    resize: vertical;
    min-height: 120px;
}
```

**Línea por línea:**
- `resize: vertical;`
  - **Propósito**: Permite redimensionar solo verticalmente
  - **UX**: Evita que el usuario rompa el layout horizontal
  
- `min-height: 120px;`
  - **Propósito**: Altura mínima del textarea
  - **Usabilidad**: Suficiente espacio para escribir texto

---

## 28. CAMPOS NUMÉRICOS

```css
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type="number"] {
    -moz-appearance: textfield;
}
```

**Línea por línea:**
- `::-webkit-outer-spin-button` y `::-webkit-inner-spin-button`
  - **Propósito**: Selectores para las flechas de campos numéricos en WebKit
  
- `-webkit-appearance: none;`
  - **Propósito**: Elimina las flechas en navegadores WebKit (Chrome, Safari)
  
- `margin: 0;`
  - **Propósito**: Elimina márgenes de las flechas
  
- `input[type="number"] { -moz-appearance: textfield; }`
  - **Propósito**: Elimina las flechas en Firefox
  - **Resultado**: Campos numéricos con apariencia limpia

---

## 29. ASTERISCO OBLIGATORIO (.required-asterisk)

```css
.required-asterisk {
    color: #ff6b6b;
    margin-left: 3px;
}
```

**Línea por línea:**
- `color: #ff6b6b;`
  - **Propósito**: Color rojo para indicar campos obligatorios
  - **Consistencia**: Mismo color que los mensajes de error
  
- `margin-left: 3px;`
  - **Propósito**: Pequeño espaciado entre el texto y el asterisco

---

## 30. GRUPO DE FORMULARIO (.form-group)

```css
.form-group {
    position: relative;
}
```

**Línea por línea:**
- `position: relative;`
  - **Propósito**: Establece contexto de posicionamiento
  - **Uso**: Permite posicionar iconos absolutamente dentro del grupo

---

## 31. ICONOS DE ENTRADA (.input-icon)

```css
.input-icon {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #64b5f6;
    pointer-events: none;
}
```

**Línea por línea:**
- `position: absolute;`
  - **Propósito**: Posicionamiento absoluto respecto al form-group
  
- `right: 15px;`
  - **Propósito**: Posiciona el icono a 15px del borde derecho
  
- `top: 50%;` y `transform: translateY(-50%);`
  - **Propósito**: Centra verticalmente el icono
  - **Técnica**: Posición 50% + transformación -50%
  
- `color: #64b5f6;`
  - **Propósito**: Color azul claro coherente con el diseño
  
- `pointer-events: none;`
  - **Propósito**: El icono no interfiere con la interacción del campo
  - **UX**: Los clics pasan a través del icono al campo

