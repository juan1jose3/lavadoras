<!DOCTYPE html>
<html lang="en">
  <head>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
   <ink rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    
    <link rel="stylesheet" href="Estilos/form.css">
    
    
    <title>Form</title>
  </head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
        <nav  class="navbar navbar-expand-lg miNav">
      <a class="navbar-brand" href="#">AEONIX</a>
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
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a
            >
          </li>

          <li class="nav-item active">
            <a class="dropdown-item" href="neveras.html">Neveras</a>
          </li>

          <li class="nav-item active">
            <a class="dropdown-item" href="lavadoras.html">Lavadoras</a>
          </li>

          <li class="nav-item active">
            <a class="dropdown-item" href="secadoras.html">Secadores</a>
          </li>

            </div>
          
          <li class="nav-item">
            <a class="nav-link" href="https://web.whatsapp.com/" target="_blank">Contacto</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="box">
        <h1>🔧 Agenda tu Servicio Técnico</h1>
        <form id="formulario" method="POST" action="includes/insert.php">
            
            <!-- SECCIÓN 1: DATOS DEL CLIENTE -->
            <div class="form-section">
                <div class="section-title">👤 Información Personal</div>
                
                <div class="form-row">
                    <div>
                        <label for="cedula">Cédula <span class="required-asterisk">*</span></label>
                        <input type="number" name="cedula" id="cedula" required minlength="3" title="No se permiten letras" placeholder="Ingresa tu número de cédula"/>
                    </div>
                    <div>
                        <label for="telefono">Número de contacto <span class="required-asterisk">*</span></label>
                        <input type="tel" name="telefono" id="telefono" required placeholder="Ej: 300 123 4567"/>
                    </div>
                </div>

                <div class="form-row">
                    <div>
                        <label for="nombres">Nombres <span class="required-asterisk">*</span></label>
                        <input type="text" name="nombres" id="nombres" required minlength="3" pattern="[A-Za-zÀ-ÿ\s]+" title="Solo se permiten letras y espacios" placeholder="Tus nombres"/>
                    </div>
                    <div>
                        <label for="apellidos">Apellidos <span class="required-asterisk">*</span></label>
                        <input type="text" name="apellidos" id="apellidos" required minlength="3" pattern="[A-Za-zÀ-ÿ\s]+" title="Solo se permiten letras y espacios" placeholder="Tus apellidos"/>
                    </div>
                </div>

                <label for="correo">Correo electrónico <span class="required-asterisk">*</span></label>
                <input type="email" name="correo" id="correo" required placeholder="tu@email.com"/>

                <label for="direccion">Dirección completa <span class="required-asterisk">*</span></label>
                <input type="text" name="direccion" id="direccion" required minlength="5" placeholder="Calle 123 #45-67, Barrio, Ciudad"/>

                <label for="localidad">Localidad <span class="required-asterisk">*</span></label>
                <select name="localidad" id="localidad" required>
                    <option value="">📍 Seleccione su localidad</option>
                    <option value="Usaquén">Usaquén</option>
                    <option value="Chapinero">Chapinero</option>
                    <option value="Santa Fe">Santa Fe</option>
                    <option value="San Cristóbal">San Cristóbal</option>
                    <option value="Usme">Usme</option>
                    <option value="Tunjuelito">Tunjuelito</option>
                    <option value="Bosa">Bosa</option>
                    <option value="Kennedy">Kennedy</option>
                    <option value="Fontibón">Fontibón</option>
                    <option value="Engativá">Engativá</option>
                    <option value="Suba">Suba</option>
                    <option value="Barrios Unidos">Barrios Unidos</option>
                    <option value="Teusaquillo">Teusaquillo</option>
                    <option value="Los Mártires">Los Mártires</option>
                    <option value="Antonio Nariño">Antonio Nariño</option>
                    <option value="Puente Aranda">Puente Aranda</option>
                    <option value="La Candelaria">La Candelaria</option>
                    <option value="Rafael Uribe Uribe">Rafael Uribe Uribe</option>
                    <option value="Ciudad Bolívar">Ciudad Bolívar</option>
                    <option value="Sumapaz">Sumapaz</option>
                </select>
            </div>

            <!-- SECCIÓN 2: DATOS DEL ELECTRODOMÉSTICO -->
            <div class="form-section">
                <div class="section-title">⚡ Información del Electrodoméstico</div>
                
                <div class="form-row">
                    <div>
                        <label for="electro">Tipo de electrodoméstico <span class="required-asterisk">*</span></label>
                        <select name="electro" id="electro" required>
                            <option value="">🔌 Seleccione el electrodoméstico</option>
                            <option value="1">❄️ Nevera</option>
                            <option value="2">🌀 Lavadora</option>
                            <option value="3">🔥 Secadora</option>
                        </select>
                    </div>
                    <div>
                        <label for="servicio">Tipo de servicio <span class="required-asterisk">*</span></label>
                        <select name="servicio" id="servicio" required>
                            <option value="">🔧 Seleccione el servicio</option>
                            <option value="1">🔍 Revisión técnica</option>
                            <option value="2">🛠️ Reparación</option>
                            <option value="3">🧹 Mantenimiento</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div>
                        <label for="marca">Marca del electrodoméstico <span class="required-asterisk">*</span></label>
                        <input type="text" name="marca" id="marca" required minlength="1" placeholder="Ej: Samsung, LG, Whirlpool"/>
                    </div>
                    <div>
                        <label for="modelo">Modelo (opcional)</label>
                        <input type="text" name="modelo" id="modelo" placeholder="Ej: WF45K6200AW"/>
                    </div>
                </div>

                <label for="des">Descripción detallada del problema <span class="required-asterisk">*</span></label>
                <textarea name="des" id="des" required rows="6" placeholder="Describe detalladamente qué está pasando con tu electrodoméstico: ruidos, olores, no enciende, etc. Entre más detalles proporciones, mejor podremos ayudarte."></textarea>
            </div>

            <!-- SECCIÓN 3: MÉTODO DE PAGO -->
            <div class="form-section">
                <div class="section-title">💳 Método de Pago</div>
                
                <label for="metodoPago">¿Cómo deseas pagar? <span class="required-asterisk">*</span></label>
                <select name="metodoPago" id="metodoPago" required>
                    <option value="">💰 Seleccione método de pago</option>
                    <option value="1">💳 Tarjeta débito</option>
                    <option value="2">💎 Tarjeta crédito</option>
                    <option value="3">📱 Transferencia bancaria</option>
                    <option value="4">💵 Efectivo</option>
                </select>
            </div>

            <!-- SECCIÓN 4: UBICACIÓN -->
            <div class="form-section">
                <div class="section-title">📍 Ubicación del Servicio</div>
                
                <div class="location">
                    <input type="hidden" id="latitud" name="latitud" placeholder="Latitud" readonly>
                    <input type="hidden" id="longitud" name="longitud" placeholder="Longitud" readonly>
                    
                    <div id="map">
                        <p>🗺️ Haz clic en el mapa para seleccionar la ubicación exacta donde realizaremos el servicio</p>
                    </div>
                </div>
            </div>

            <button type="submit" class="submit-btn">🚀 ¡AGENDAR MI SERVICIO AHORA!</button>
        </form>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
       
        document.addEventListener('DOMContentLoaded', function() {
            const map = document.getElementById('map');
            map.addEventListener('click', function() {
                console.log('Mapa clickeado');
            });
        });

        
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
    </script>
      <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
      <script src="js/map.js"></script>
    
  </body>
</html>
