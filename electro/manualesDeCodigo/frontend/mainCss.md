# Documentación Completa del CSS - Análisis Línea por Línea

## Tabla de Contenidos
1. [Estilos del Body](#estilos-del-body)
2. [Navegación](#navegación)
3. [Dropdown Menu](#dropdown-menu)
4. [Enlaces de Navegación](#enlaces-de-navegación)
5. [Títulos Principales](#títulos-principales)
6. [Párrafos](#párrafos)
7. [Botones](#botones)
8. [Evidencias](#evidencias)
9. [Títulos Secundarios](#títulos-secundarios)
10. [Contenedores de Cualidades](#contenedores-de-cualidades)
11. [Carrusel](#carrusel)
12. [Animaciones](#animaciones)
13. [Responsive Design](#responsive-design)

---

## Estilos del Body

```css
body {
```
**Línea 1:** Selector que apunta al elemento body de la página HTML.

```css
  text-align: center;
```
**Línea 2:** Centra horizontalmente todo el texto contenido en el body.

```css
  background: linear-gradient(135deg, #0f1419 0%, #1a2332 50%, #0f1922 100%);
```
**Línea 3:** Aplica un gradiente lineal como fondo con dirección diagonal (135°):
- Inicia con color azul muy oscuro (#0f1419) al 0%
- Transiciona a azul grisáceo (#1a2332) al 50%
- Termina con azul verdoso oscuro (#0f1922) al 100%

```css
  color: #e8f4f8;
```
**Línea 4:** Establece el color de texto base en azul muy claro (#e8f4f8).

```css
  font-family: "Poppins", sans-serif;
```
**Línea 5:** Define la familia tipográfica principal como Poppins, con fallback a sans-serif.

```css
  min-height: 100vh;
```
**Línea 6:** Garantiza que el body ocupe mínimo el 100% de la altura de la ventana del navegador.

```css
}
```
**Línea 7:** Cierre del selector body.

---

## Navegación

```css
.miNav {
```
**Línea 9:** Selector de clase para el elemento de navegación principal.

```css
  background: linear-gradient(90deg, #1e3a5f 0%, #2c5aa0 100%);
```
**Línea 10:** Gradiente horizontal para el fondo de la navegación:
- Azul oscuro (#1e3a5f) al inicio
- Azul medio (#2c5aa0) al final

```css
  box-shadow: 0 4px 20px rgba(44, 90, 160, 0.3);
```
**Línea 11:** Sombra difusa debajo de la navegación:
- Sin desplazamiento horizontal (0)
- 4px de desplazamiento vertical
- 20px de difuminado
- Color azul semitransparente

```css
  backdrop-filter: blur(10px);
```
**Línea 12:** Aplica un efecto de desenfoque de 10px al contenido detrás de la navegación.

```css
}
```
**Línea 13:** Cierre del selector .miNav.

---

## Navbar Brand

```css
.navbar-brand {
```
**Línea 15:** Selector para el logo/marca de la barra de navegación.

```css
  color: #64b5f6 !important;
```
**Línea 16:** Color azul claro con prioridad máxima (!important) para sobrescribir otros estilos.

```css
  font-weight: 700;
```
**Línea 17:** Peso de fuente en negrita (700 = bold).

```css
  font-size: 1.8rem;
```
**Línea 18:** Tamaño de fuente de 1.8 veces el tamaño base del elemento raíz.

```css
  text-shadow: 0 0 10px rgba(100, 181, 246, 0.5);
```
**Línea 19:** Sombra de texto con efecto de brillo:
- Sin desplazamiento horizontal ni vertical (0 0)
- 10px de difuminado
- Color azul semitransparente

```css
}
```
**Línea 20:** Cierre del selector .navbar-brand.

---

## Dropdown Menu

```css
.dropdown-menu {
```
**Línea 22:** Selector para los menús desplegables.

```css
  background: linear-gradient(135deg, #1e3a5f 0%, #2c5aa0 100%);
```
**Línea 23:** Fondo con gradiente diagonal igual al de la navegación principal.

```css
  border: 1px solid rgba(100, 181, 246, 0.3);
```
**Línea 24:** Borde sólido de 1px con color azul semitransparente.

```css
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
```
**Línea 25:** Sombra pronunciada:
- 8px de desplazamiento vertical
- 32px de difuminado
- Negro semitransparente

```css
}
```
**Línea 26:** Cierre del selector .dropdown-menu.

---

## Dropdown Items

```css
.dropdown-item {
```
**Línea 28:** Selector para elementos individuales del dropdown.

```css
  color: #e8f4f8;
```
**Línea 29:** Color de texto azul claro.

```css
  transition: all 0.3s ease;
```
**Línea 30:** Transición suave de 0.3 segundos para todas las propiedades con aceleración ease.

```css
}
```
**Línea 31:** Cierre del selector .dropdown-item.

```css
.dropdown-item:hover {
```
**Línea 33:** Pseudo-selector para el estado hover de los elementos dropdown.

```css
  background: linear-gradient(90deg, #42a5f5 0%, #1e88e5 100%);
```
**Línea 34:** Fondo con gradiente horizontal azul al hacer hover.

```css
  color: white;
```
**Línea 35:** Cambia el color del texto a blanco al hacer hover.

```css
  transform: translateX(5px);
```
**Línea 36:** Desplaza el elemento 5px hacia la derecha al hacer hover.

```css
}
```
**Línea 37:** Cierre del selector .dropdown-item:hover.

---

## Enlaces de Navegación

```css
.nav-link {
```
**Línea 39:** Selector para los enlaces de navegación.

```css
  color: #e8f4f8 !important;
```
**Línea 40:** Color azul claro con prioridad máxima.

```css
  font-weight: 500;
```
**Línea 41:** Peso de fuente medio (500).

```css
  transition: all 0.3s ease;
```
**Línea 42:** Transición suave para todas las propiedades.

```css
}
```
**Línea 43:** Cierre del selector .nav-link.

```css
.nav-link:hover {
```
**Línea 45:** Estado hover para enlaces de navegación.

```css
  color: #64b5f6 !important;
```
**Línea 46:** Cambia a color azul más brillante al hacer hover.

```css
  text-shadow: 0 0 8px rgba(100, 181, 246, 0.6);
```
**Línea 47:** Añade sombra de texto con brillo azul al hacer hover.

```css
}
```
**Línea 48:** Cierre del selector .nav-link:hover.

---

## Títulos Principales

```css
.titulo {
```
**Línea 50:** Selector para títulos principales.

```css
  font-size: 80px;
```
**Línea 51:** Tamaño de fuente muy grande (80px).

```css
  line-height: 1.3;
```
**Línea 52:** Altura de línea de 1.3 veces el tamaño de fuente.

```css
  color: #ffffff;
```
**Línea 53:** Color base blanco para el título.

```css
  text-shadow: 0 0 20px rgba(100, 181, 246, 0.4);
```
**Línea 54:** Sombra de texto con brillo azul difuso.

```css
  margin: 60px 0 40px 0;
```
**Línea 55:** Márgenes: 60px arriba, 0 izquierda/derecha, 40px abajo.

```css
}
```
**Línea 56:** Cierre del selector .titulo.

```css
.titulo span {
```
**Línea 58:** Selector para elementos span dentro de títulos.

```css
  background: linear-gradient(135deg, #42a5f5 0%, #1e88e5 50%, #0d47a1 100%);
```
**Línea 59:** Gradiente diagonal de azul claro a azul oscuro.

```css
  background-clip: text;
```
**Línea 60:** Recorta el fondo para que solo aparezca en el texto.

```css
  -webkit-background-clip: text;
```
**Línea 61:** Versión específica para navegadores WebKit.

```css
  -webkit-text-fill-color: transparent;
```
**Línea 62:** Hace transparente el relleno del texto para mostrar el gradiente.

```css
  filter: drop-shadow(0 0 10px rgba(66, 165, 245, 0.5));
```
**Línea 63:** Añade una sombra proyectada con brillo azul.

```css
}
```
**Línea 64:** Cierre del selector .titulo span.

---

## Párrafos

```css
.parrafo {
```
**Línea 66:** Selector para párrafos con clase específica.

```css
  font-size: 28px;
```
**Línea 67:** Tamaño de fuente grande (28px).

```css
  color: #b3d9f2;
```
**Línea 68:** Color azul pastel claro.

```css
  margin: 30px 0 50px 0;
```
**Línea 69:** Márgenes: 30px arriba, 0 laterales, 50px abajo.

```css
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
```
**Línea 70:** Sombra de texto sutil hacia abajo.

```css
}
```
**Línea 71:** Cierre del selector .parrafo.

---

## Botones

```css
.boton {
```
**Línea 73:** Selector para botones principales.

```css
  color: white;
```
**Línea 74:** Color de texto blanco.

```css
  font-weight: 700;
```
**Línea 75:** Peso de fuente en negrita.

```css
  font-size: 28px;
```
**Línea 76:** Tamaño de fuente grande.

```css
  background: linear-gradient(135deg, #1e88e5 0%, #42a5f5 50%, #64b5f6 100%);
```
**Línea 77:** Gradiente diagonal de azul oscuro a azul claro.

```css
  border: none;
```
**Línea 78:** Sin borde.

```css
  border-radius: 50px;
```
**Línea 79:** Bordes completamente redondeados.

```css
  cursor: pointer;
```
**Línea 80:** Cursor de mano al hacer hover.

```css
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
```
**Línea 81:** Transición con curva de Bézier personalizada (efecto de rebote).

```css
  width: 700px;
```
**Línea 82:** Ancho fijo de 700px.

```css
  height: 80px;
```
**Línea 83:** Altura fija de 80px.

```css
  box-shadow: 0 8px 32px rgba(30, 136, 229, 0.4);
```
**Línea 84:** Sombra pronunciada con color azul.

```css
  position: relative;
```
**Línea 85:** Posicionamiento relativo para elementos pseudo.

```css
  overflow: hidden;
```
**Línea 86:** Oculta contenido que desborde el botón.

```css
}
```
**Línea 87:** Cierre del selector .boton.

```css
.boton::before {
```
**Línea 89:** Pseudo-elemento para efecto de brillo.

```css
  content: '';
```
**Línea 90:** Contenido vacío requerido para pseudo-elementos.

```css
  position: absolute;
```
**Línea 91:** Posicionamiento absoluto dentro del botón.

```css
  top: 0;
```
**Línea 92:** Alineado al borde superior.

```css
  left: -100%;
```
**Línea 93:** Inicialmente fuera del botón (izquierda).

```css
  width: 100%;
```
**Línea 94:** Ancho completo del botón.

```css
  height: 100%;
```
**Línea 95:** Altura completa del botón.

```css
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
```
**Línea 96:** Gradiente horizontal transparente con franja blanca en el centro.

```css
  transition: left 0.8s;
```
**Línea 97:** Transición de la propiedad left en 0.8 segundos.

```css
}
```
**Línea 98:** Cierre del selector .boton::before.

```css
.boton:hover {
```
**Línea 100:** Estado hover del botón.

```css
  transform: translateY(-3px) scale(1.02);
```
**Línea 101:** Levanta 3px y escala ligeramente el botón.

```css
  box-shadow: 0 15px 40px rgba(30, 136, 229, 0.6);
```
**Línea 102:** Sombra más pronunciada al hacer hover.

```css
  background: linear-gradient(135deg, #0d47a1 0%, #1565c0 50%, #1976d2 100%);
```
**Línea 103:** Cambia a gradiente con tonos azules más oscuros.

```css
}
```
**Línea 104:** Cierre del selector .boton:hover.

```css
.boton:hover::before {
```
**Línea 106:** Pseudo-elemento en estado hover.

```css
  left: 100%;
```
**Línea 107:** Mueve el brillo completamente hacia la derecha.

```css
}
```
**Línea 108:** Cierre del selector .boton:hover::before.

---

## Evidencias

```css
.evidencias {
```
**Línea 110:** Selector para sección de evidencias.

```css
  font-size: 32px;
```
**Línea 111:** Tamaño de fuente grande.

```css
  font-weight: 700;
```
**Línea 112:** Peso de fuente en negrita.

```css
  background: linear-gradient(135deg, #42a5f5 0%, #1e88e5 50%, #0288d1 100%);
```
**Línea 113:** Gradiente diagonal azul para el texto.

```css
  background-clip: text;
```
**Línea 114:** Recorta el fondo al texto.

```css
  -webkit-background-clip: text;
```
**Línea 115:** Versión WebKit del recorte.

```css
  -webkit-text-fill-color: transparent;
```
**Línea 116:** Hace transparente el relleno del texto.

```css
  text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
```
**Línea 117:** Sombra de texto hacia abajo.

```css
  margin: 60px 0;
```
**Línea 118:** Márgenes verticales de 60px.

```css
}
```
**Línea 119:** Cierre del selector .evidencias.

---

## Títulos Secundarios

```css
h1:not(.titulo):not(.evidencias) {
```
**Línea 121:** Selector para h1 que no tengan las clases titulo o evidencias.

```css
  font-size: 42px;
```
**Línea 122:** Tamaño de fuente de 42px.

```css
  color: #ffffff;
```
**Línea 123:** Color blanco.

```css
  font-weight: 600;
```
**Línea 124:** Peso de fuente semi-negrita.

```css
  text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
```
**Línea 125:** Sombra de texto sutil.

```css
  margin: 40px 0;
```
**Línea 126:** Márgenes verticales de 40px.

```css
}
```
**Línea 127:** Cierre del selector h1.

---

## Contenedores de Cualidades

```css
.cualidades {
```
**Línea 129:** Selector para contenedor de cualidades.

```css
  display: flex;
```
**Línea 130:** Diseño flexbox.

```css
  flex-direction: row;
```
**Línea 131:** Dirección horizontal de los elementos flex.

```css
  align-items: stretch;
```
**Línea 132:** Estira elementos para ocupar toda la altura.

```css
  justify-content: center;
```
**Línea 133:** Centra elementos horizontalmente.

```css
  gap: 30px;
```
**Línea 134:** Espacio de 30px entre elementos.

```css
  background: linear-gradient(135deg, #1a2b42 0%, #2c4a73 100%);
```
**Línea 135:** Fondo con gradiente diagonal azul oscuro.

```css
  padding: 40px 20px;
```
**Línea 136:** Relleno: 40px vertical, 20px horizontal.

```css
  margin: 40px 0;
```
**Línea 137:** Márgenes verticales de 40px.

```css
  border-radius: 20px;
```
**Línea 138:** Bordes redondeados de 20px.

```css
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
```
**Línea 139:** Sombra pronunciada hacia abajo.

```css
}
```
**Línea 140:** Cierre del selector .cualidades.

---

## Contenedores Individuales

```css
.container {
```
**Línea 142:** Selector para contenedores individuales.

```css
  background: linear-gradient(135deg, #243447 0%, #364c63 100%);
```
**Línea 143:** Fondo con gradiente diagonal azul grisáceo.

```css
  border-radius: 20px;
```
**Línea 144:** Bordes redondeados.

```css
  padding: 30px 25px;
```
**Línea 145:** Relleno: 30px vertical, 25px horizontal.

```css
  transition: all 0.4s ease;
```
**Línea 146:** Transición suave para todas las propiedades.

```css
  border: 1px solid rgba(100, 181, 246, 0.2);
```
**Línea 147:** Borde azul semitransparente.

```css
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
```
**Línea 148:** Sombra suave.

```css
  max-width: 300px;
```
**Línea 149:** Ancho máximo de 300px.

```css
}
```
**Línea 150:** Cierre del selector .container.

```css
.container:hover {
```
**Línea 152:** Estado hover del contenedor.

```css
  transform: translateY(-10px) scale(1.03);
```
**Línea 153:** Levanta 10px y escala ligeramente.

```css
  box-shadow: 0 20px 50px rgba(66, 165, 245, 0.3);
```
**Línea 154:** Sombra más pronunciada con color azul.

```css
  border-color: rgba(100, 181, 246, 0.5);
```
**Línea 155:** Borde más visible al hacer hover.

```css
}
```
**Línea 156:** Cierre del selector .container:hover.

```css
.container h2 {
```
**Línea 158:** Selector para h2 dentro de contenedores.

```css
  color: #64b5f6;
```
**Línea 159:** Color azul claro.

```css
  font-size: 24px;
```
**Línea 160:** Tamaño de fuente de 24px.

```css
  font-weight: 600;
```
**Línea 161:** Peso semi-negrita.

```css
  margin-bottom: 20px;
```
**Línea 162:** Margen inferior de 20px.

```css
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
```
**Línea 163:** Sombra de texto sutil.

```css
}
```
**Línea 164:** Cierre del selector .container h2.

```css
.container p {
```
**Línea 166:** Selector para párrafos dentro de contenedores.

```css
  color: #b3d9f2;
```
**Línea 167:** Color azul pastel.

```css
  font-size: 16px;
```
**Línea 168:** Tamaño de fuente de 16px.

```css
  line-height: 1.6;
```
**Línea 169:** Altura de línea de 1.6.

```css
  margin: 0;
```
**Línea 170:** Sin márgenes.

```css
}
```
**Línea 171:** Cierre del selector .container p.

---

## Carrusel

```css
#carusel2 {
```
**Línea 173:** Selector por ID para carrusel específico.

```css
  width: 900px;
```
**Línea 174:** Ancho fijo de 900px.

```css
  height: 500px;
```
**Línea 175:** Altura fija de 500px.

```css
  margin: 40px auto;
```
**Línea 176:** Márgenes: 40px vertical, auto horizontal (centrado).

```css
  overflow: hidden;
```
**Línea 177:** Oculta contenido desbordante.

```css
  border-radius: 20px;
```
**Línea 178:** Bordes redondeados.

```css
  box-shadow: 0 15px 50px rgba(0, 0, 0, 0.4);
```
**Línea 179:** Sombra pronunciada.

```css
}
```
**Línea 180:** Cierre del selector #carusel2.

```css
.carrosel {
```
**Línea 182:** Selector para contenedor de carrusel.

```css
  display: flex;
```
**Línea 183:** Diseño flexbox.

```css
  justify-content: center;
```
**Línea 184:** Centra contenido horizontalmente.

```css
  align-items: center;
```
**Línea 185:** Centra contenido verticalmente.

```css
  margin: 60px 0;
```
**Línea 186:** Márgenes verticales de 60px.

```css
}
```
**Línea 187:** Cierre del selector .carrosel.

```css
.carrosel-animado {
```
**Línea 189:** Selector para carrusel con animación.

```css
  width: 1200px;
```
**Línea 190:** Ancho de 1200px.

```css
  height: auto;
```
**Línea 191:** Altura automática.

```css
  border-radius: 20px;
```
**Línea 192:** Bordes redondeados.

```css
  overflow: hidden;
```
**Línea 193:** Oculta desbordamiento.

```css
  box-shadow: 0 15px 50px rgba(0, 0, 0, 0.4);
```
**Línea 194:** Sombra pronunciada.

```css
}
```
**Línea 195:** Cierre del selector .carrosel-animado.

```css
section {
```
**Línea 197:** Selector para elementos section.

```css
  display: flex;
```
**Línea 198:** Diseño flexbox.

```css
  width: 100%;
```
**Línea 199:** Ancho completo.

```css
  height: 450px;
```
**Línea 200:** Altura fija de 450px.

```css
}
```
**Línea 201:** Cierre del selector section.

```css
section img {
```
**Línea 203:** Selector para imágenes dentro de sections.

```css
  width: 0px;
```
**Línea 204:** Ancho inicial de 0px.

```css
  flex-grow: 1;
```
**Línea 205:** Permite que la imagen crezca proporcionalmente.

```css
  object-fit: cover;
```
**Línea 206:** Ajusta la imagen para cubrir completamente su contenedor.

```css
  opacity: 0.7;
```
**Línea 207:** Opacidad del 70%.

```css
  transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
```
**Línea 208:** Transición suave con curva de Bézier personalizada.

```css
  filter: brightness(0.8) contrast(1.1);
```
**Línea 209:** Reduce brillo y aumenta contraste.

```css
}
```
**Línea 210:** Cierre del selector section img.

```css
section img:hover {
```
**Línea 212:** Estado hover para imágenes en sections.

```css
  cursor: pointer;
```
**Línea 213:** Cursor de mano.

```css
  width: 400px;
```
**Línea 214:** Ancho expandido de 400px.

```css
  opacity: 1;
```
**Línea 215:** Opacidad completa.

```css
  filter: brightness(1.1) contrast(1.3) saturate(1.2);
```
**Línea 216:** Aumenta brillo, contraste y saturación.

```css
  transform: scale(1.02);
```
**Línea 217:** Escala ligeramente la imagen.

```css
}
```
**Línea 218:** Cierre del selector section img:hover.

---

## Animaciones

```css
@keyframes fadeInUp {
```
**Línea 221:** Define animación keyframes llamada fadeInUp.

```css
  from {
```
**Línea 222:** Estado inicial de la animación.

```css
    opacity: 0;
```
**Línea 223:** Opacidad inicial de 0 (invisible).

```css
    transform: translateY(30px);
```
**Línea 224:** Desplazamiento inicial 30px hacia abajo.

```css
  }
```
**Línea 225:** Cierre del estado from.

```css
  to {
```
**Línea 226:** Estado final de la animación.

```css
    opacity: 1;
```
**Línea 227:** Opacidad final de 1 (visible).

```css
    transform: translateY(0);
```
**Línea 228:** Sin desplazamiento (posición normal).

```css
  }
```
**Línea 229:** Cierre del estado to.

```css
}
```
**Línea 230:** Cierre de la definición keyframes.

```css
.titulo, .parrafo, .evidencias {
```
**Línea 232:** Selector múltiple para aplicar animación.

```css
  animation: fadeInUp 1s ease-out;
```
**Línea 233:** Aplica la animación fadeInUp durante 1 segundo con aceleración ease-out.

```css
}
```
**Línea 234:** Cierre del selector de animación.

---

## Responsive Design

```css
@media (max-width: 768px) {
```
**Línea 237:** Media query para dispositivos con ancho máximo de 768px.

```css
  .titulo {
```
**Línea 238:** Selector título en versión móvil.

```css
    font-size: 50px;
```
**Línea 239:** Reduce tamaño de fuente a 50px.

```css
  }
```
**Línea 240:** Cierre del selector título móvil.

```css
  .boton {
```
**Línea 242:** Selector botón en versión móvil.

```css
    width: 90%;
```
**Línea 243:** Ancho del 90% del contenedor.

```css
    font-size: 22px;
```
**Línea 244:** Reduce tamaño de fuente a 22px.

```css
  }
```
**Línea 245:** Cierre del selector botón móvil.

```css
  .cualidades {
```
**Línea 247:** Selector cualidades en versión móvil.

```css
    flex-direction: column;
```
**Línea 248:** Cambia dirección de flex a columna (vertical).

```css
    gap: 20px;
```
**Línea 249:** Reduce espacio entre elementos a 20px.

```css
  }
```
**Línea 250:** Cierre del selector cualidades móvil.

```css
  .carrosel-animado {
```
**Línea 252:** Selector carrusel animado en móvil.

```css
    width: 90%;
```
**Línea 253:** Ancho del 90% del contenedor.

```css
  }
```
**Línea 254:** Cierre del selector carrusel animado móvil.

```css
  #carusel2 {
```
**Línea 256:** Selector carrusel2 en móvil.

```css
    width: 90%;
```
**Línea 257:** Ancho del 90% del contenedor.

```css
  }
```
**Línea 258:** Cierre del selector carrusel2 móvil.

```css
  .parrafo {
```
**Línea 260:** Selector párrafo en móvil.

```css
    font-size: 20px;
```
**Línea 261:** Reduce tamaño de fuente a 20px.

```css
  }
```
**Línea 262:** Cierre del selector párrafo móvil.

```css
}
```
**Línea 263:** Cierre de la media query móvil.


