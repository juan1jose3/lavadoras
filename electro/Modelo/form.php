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
    
    <style>
        
        body {
            background: linear-gradient(135deg, #0f1419 0%, #1a2332 50%, #0f1922 100%);
            color: #e8f4f8;
            font-family: "Poppins", sans-serif;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .miNav {
            background: linear-gradient(90deg, #1e3a5f 0%, #2c5aa0 100%);
            box-shadow: 0 4px 20px rgba(44, 90, 160, 0.3);
            backdrop-filter: blur(10px);
        }

        .navbar-brand {
            color: #64b5f6 !important;
            font-weight: 700;
            font-size: 1.8rem;
            text-shadow: 0 0 10px rgba(100, 181, 246, 0.5);
        }

        .dropdown-menu {
            background: linear-gradient(135deg, #1e3a5f 0%, #2c5aa0 100%);
            border: 1px solid rgba(100, 181, 246, 0.3);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .dropdown-item {
            color: #e8f4f8;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background: linear-gradient(90deg, #42a5f5 0%, #1e88e5 100%);
            color: white;
            transform: translateX(5px);
        }

        .nav-link {
            color: #e8f4f8 !important;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: #64b5f6 !important;
            text-shadow: 0 0 8px rgba(100, 181, 246, 0.6);
        }

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

        .section-title {
            color: #64b5f6;
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .box label {
            display: block;
            margin: 20px 0 8px 0;
            font-weight: 600;
            color: #b3d9f2;
            font-size: 1rem;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }

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

        .box input::placeholder, .box textarea::placeholder {
            color: #7ba7c7;
        }

        .box input:focus, .box select:focus, .box textarea:focus {
            border-color: #42a5f5;
            outline: none;
            background: linear-gradient(135deg, #243447 0%, #2c4a73 100%);
            box-shadow: 0 0 0 4px rgba(66, 165, 245, 0.1);
            transform: translateY(-1px);
        }

        .box select {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%2364b5f6' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 12px center;
            background-repeat: no-repeat;
            background-size: 16px;
            padding-right: 50px;
        }

        .box select option {
            background: #1a2332;
            color: #e8f4f8;
            padding: 10px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .location {
            margin: 30px 0;
        }

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

        .submit-btn:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 15px 40px rgba(30, 136, 229, 0.6);
            background: linear-gradient(135deg, #0d47a1 0%, #1565c0 50%, #1976d2 100%);
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:active {
            transform: translateY(-1px) scale(1.01);
        }

        .error {
            color: #ff6b6b;
            font-size: 14px;
            margin-top: 8px;
            font-weight: 500;
        }

        /* Animaciones */
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

        .box {
            animation: fadeInUp 0.8s ease-out;
        }

        .form-section {
            animation: fadeInUp 0.8s ease-out;
            animation-fill-mode: both;
        }

        .form-section:nth-child(1) { animation-delay: 0.1s; }
        .form-section:nth-child(2) { animation-delay: 0.2s; }
        .form-section:nth-child(3) { animation-delay: 0.3s; }
        .form-section:nth-child(4) { animation-delay: 0.4s; }

        /* Responsive */
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

        /* Estilos específicos para elementos del formulario */
        textarea {
            resize: vertical;
            min-height: 120px;
        }

        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        
        .required-asterisk {
            color: #ff6b6b;
            margin-left: 3px;
        }

        .form-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #64b5f6;
            pointer-events: none;
        }
    </style>
    

    
    
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
                // Aquí conectarás con tu función de mapa
                console.log('Mapa clickeado');
            });
        });

        // Validaciones adicionales del formulario
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
