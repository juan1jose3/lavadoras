#AEONIX_wEB

*AEONIX_WEB* es una página web orientada a la presentación y gestión de servicios técnicos para electrodomésticos como lavadoras, neveras y secadoras. El sistema está desarrollado siguiendo una arquitectura basada en el patrón Modelo-Vista.

## 🧩 Estructura del Proyecto

AEONIX_WEB/
├── Modelo/
│   ├── form.php
│   ├── index.html
│   ├── lavadoras.html
│   ├── neveras.html
│   ├── secadoras.html
│   ├── includes/
│   │   ├── crud.php
│   │   ├── dbh.inc.php
│   │   ├── editar_servicio.php
│   │   └── insert.php
│   └── js/
│       └── map.js
├── Vista/
│   └── imagenes/
│       ├── *.jpg
│       └── *.png
```

## ⚙ Funcionalidades Principales

- Página principal con navegación a distintos tipos de electrodomésticos.
- Formularios de ingreso de datos.
- Conexión a base de datos para insertar, editar y mostrar servicios.
- Integración de scripts personalizados (como mapas u otros elementos interactivos).
- Sección visual con imágenes de productos y marcas reconocidas.

## 🚀 Tecnologías Usadas

- *HTML5 / CSS3*
- *PHP* para manejo del backend.
- *JavaScript* para funcionalidades dinámicas.
- *MySQL* como sistema gestor de base de datos.

## 🧪 Cómo Ejecutar el Proyecto

1. Clona este repositorio o descarga los archivos.
2. Asegúrate de tener instalado un servidor local como *XAMPP, **WAMP* o *Laragon*.
3. Coloca la carpeta electro en el directorio htdocs de tu servidor local.
4. Crea una base de datos en *phpMyAdmin* y configura las credenciales en includes/dbh.inc.php.
5. Accede a http://localhost/electro/Modelo/index.html desde tu navegador.

## 📂 Archivos Clave

- dbh.inc.php: configuración de conexión a la base de datos.
- crud.php: contiene operaciones para crear, leer, actualizar y eliminar.
- form.php: formulario para ingresar nuevos servicios.
- map.js: script JavaScript adicional.

## 👨‍💻 Autores



---

¡Siéntete libre de contribuir, reportar errores o proponer mejoras!
