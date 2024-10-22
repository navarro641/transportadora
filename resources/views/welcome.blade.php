<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hermes Transportadora</title>
    <style>
        /* Estilos internos */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #5FD0F6;
            padding: 10px 0;
        }

        /* Estilo del Header */
        .navbar {
            display: flex;
            justify-content: space-between; 
            align-items: center;
            background-color: #5FD0F6;
            padding: 10px 30px; 
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 100px; /* Ajusta el tamaño del logo */
            height: auto;
        }

        .company-name {
            display: flex;
            flex-direction: column;
            margin-left: 15px; /* Espacio entre el logo y el nombre */
        }

        .company-name .hermes {
            font-size: 28px;
            font-weight: bold;
            color: white;
        }

        .company-name .transportadora {
            font-size: 14px;
            color: white;
        }

        /* Menú de navegación */
        nav {
            flex-grow: 1;
            display: flex;
            justify-content: space-between; 
            padding: 0 50px; 
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: space-between; 
            width: 100%; 
            margin: 10;
            padding: 30;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }



        /* Sección principal banner */
        .tracking-section {
            position: relative;
            width: 100%;
            min-height: 100vh; /* Asegura que la sección ocupe al menos la altura completa de la pantalla */
            background-image: url('{{ asset('imagenes/Banner1.png') }}');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover; /* Asegura que la imagen cubra todo el espacio */
            display: flex;
            justify-content: flex-start; /* Alinea los elementos a la izquierda */
            align-items: center; /* Centra verticalmente el contenido */
            padding-left: 50px; /* Ajusta el espacio desde el borde izquierdo */
            box-sizing: border-box; /* Incluye el padding en el cálculo de ancho y alto */
            overflow: hidden; /* Evita cualquier desplazamiento adicional */
        }

        /* Contenido superpuesto sobre el fondo */
        .tracking-content {
            /* background-color: rgba(255, 255, 255, 0.8); Fondo blanco semi-transparente */
            padding: 40px;
            border-radius: 10px;
            max-width: 400px;
            text-align: center;
            box-sizing: border-box;
        }

        .tracking-content h1 {
            font-size: 35px;
            margin-bottom: 50px;
        }

        .search-box {
            display: flex;
            align-items: center;
            border: 4px solid #000;
            border-radius: 25px;
            padding: 5px 10px;
            margin-bottom: 60px;
            width: 100%;
        }

        .search-box input {
            border: none;
            outline: none;
            flex-grow: 1;
            font-size: 16px;
            padding: 10px;
            margin: 0;
            background-color: transparent;
        }

        .search-box button {
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
        }

        .tracking-content p {
            font-size: 25px;
            margin-bottom: 40px;
        }

        .register-btn {
            background-color: #00aaff;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 20px 60px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 40px;
        }



        .services {
            text-align: center;
            padding: 40px;
        }

        .service-cards {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            background-color: white;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 200px;
            text-align: center;
        }

        .card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .about {
            padding: 40px;
            background-color: #f9f9f9;
        }

        .about-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 20px;
        }

        .footer-content {
            display: flex;
            justify-content: space-around;
            text-align: left;
        }

        .services-section {
            text-align: center;
            padding: 50px 20px;
        }

        .services-section h2 {
            color: #00aaff;
            font-size: 24px;
            margin-bottom: 40px;
        }

        /* Contenedor del slider */
        .slider-container {
            width: 100%;
            overflow: hidden; /* Oculta las tarjetas que están fuera de la vista */
            position: relative;
        }

        /* Slider */
        .slider {
            display: flex;
            gap: 40px; /* Mayor espacio entre las tarjetas */
            animation: slide 20s linear infinite; /* Animación más lenta */
            animation-play-state: running; /* Asegura que la animación esté en ejecución por defecto */
        }

        /* Tamaño de las tarjetas */
        .service-card {
            background-color: white;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            width: 250px;
            height: 350px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease;
            flex-shrink: 0; /* Las tarjetas no se reducirán de tamaño */
        }

        .service-card img {
            width: 100%;
            height: 150px;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .service-card p {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .service-card:hover {
            transform: scale(1.1); /* Aumenta el tamaño de la tarjeta al pasar el mouse */
        }

        /* Animación del slider */
        @keyframes slide {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        /* Pausa la animación al pasar el mouse */
        .slider:hover {
            animation-play-state: paused; /* Pausa el movimiento cuando el mouse está sobre el slider */
        }

        .about-section {
        text-align: center;
        padding: 50px 20px;
        }

        .about-section h2 {
            font-size: 32px;
            color: #00aaff;
            margin-bottom: 40px;
        }

        /* Estructura de las filas */
        .about-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
        }

        /* Estructura de las columnas */
        .about-column {
            flex: 1;
            margin: 0 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 45%;
        }

        /* Imágenes ajustadas */
        .about-column img {
            width: 100%;
            max-width: 400px; /* Limitar el ancho máximo de las imágenes */
            height: auto;
            border-radius: 10px;
        }

        /* Cuadros de texto con tamaño igual al de las imágenes */
        .about-column p {
            background-color: #f4f4f4;
            padding: 30px;
            border-radius: 10px;
            border: 2px dashed #ccc;
            font-size: 16px;
            color: #333;
            width: 100%;
            max-width: 400px; /* Limitar el ancho máximo para igualar el de las imágenes */
            height: 100%; /* Ajusta la altura para igualar la de las imágenes */
            display: flex;
            align-items: center; /* Centra el texto verticalmente */
            justify-content: center; /* Centra el texto horizontalmente */
            box-sizing: border-box; /* Asegura que padding se incluya en el tamaño total */
        }

















        

    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo-container">
                <div class="logo">
                    <img src="{{ asset('imagenes/logo.png') }}" alt="Hermes Transportadora">
                </div>
                <div class="company-name">
                    <span class="hermes">Hermes</span>
                    <span class="transportadora">Transportadora</span>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="#">¿Quiénes Somos?</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Regístrate</a></li>
                    <li><a href="{{ route('iniciar-sesion') }}">Ingresar</a></li>
                </ul>
            </nav>
        </div>
        
        
        
        
    </header>

    <section class="tracking-section">
        <div class="tracking-content">
            <h1>Rastrea tu envío.</h1>
            <div class="search-box">
                <input type="text" placeholder="#Guia:" />
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>
            <p>¡Transportamos confianza, entregamos resultados!</p>
            <button class="register-btn">Regístrate</button>
        </div>
    </section>
    

    <section class="services-section">
        <h2>Conoce Nuestra Oferta De Servicios</h2>
        <div class="slider-container">
            <div class="slider">
                <div class="service-card">
                    <img src="imagenes/envios.png" alt="Envíos Nacionales">
                    <p>Envíos Nacionales</p>
                </div>
                <div class="service-card">
                    <img src="imagenes/envios2.png" alt="Almacenamiento y Distribución">
                    <p>Almacenamiento y Distribución</p>
                </div>
                <div class="service-card">
                    <img src="imagenes/envios3.png" alt="Mensajería">
                    <p>Mensajería</p>
                </div>
                <div class="service-card">
                    <img src="imagenes/envios4.png" alt="Paquetería y Mercancía">
                    <p>Paquetería y Mercancía</p>
                </div>
                <div class="service-card">
                    <img src="imagenes/envios5.png" alt="Puerta a Puerta">
                    <p>Puerta a Puerta</p>
                </div>
            </div>
        </div>
    </section>
    
    

    <section class="about-section">
        <h2>¿Quiénes Somos?</h2>
        <div class="about-row">
            <div class="about-column">
                <img src="imagenes/somoss.png" alt="Imagen de la empresa">
            </div>
            <div class="about-column">
                <p>
                    En Hermes Transportadora, nos destacamos por ofrecer soluciones rápidas y confiables en el transporte de carga. 
                    Al igual que nuestro nombre lo sugiere, nos movemos con la misma agilidad y precisión que caracteriza al mensajero 
                    de los dioses. Nos comprometemos a que cada envío llegue a su destino de manera puntual, combinando tecnología, 
                    eficiencia y un equipo dedicado a brindar el mejor servicio logístico a nuestros clientes.
                </p>
            </div>
        </div>
    
        <div class="about-row">
            <div class="about-column">
                <p>
                    Con más de 10 años de experiencia, Hermes Transportadora transforma cada carga en un viaje seguro y puntual. 
                    Tu confianza es nuestra brújula, y cada entrega, un paso hacia el futuro. Elige Hermes, donde tu carga vuela con 
                    la promesa de llegar.
                </p>
            </div>
            <div class="about-column">
                <img src="imagenes/somoss2.png" alt="Imagen del personal">
            </div>
        </div>
    </section>
    

    <footer>
        <div class="footer-content">
            <div class="cities">
                <h3>Algunas Ciudades</h3>
                <p>Bogotá: Calle 85 # 15-10, Barrio Chicó Norte</p>
                <p>Bucaramanga: Carrera 33 # 48-20, Barrio Cabecera del Llano</p>
                <p>Barranquilla: Calle 72 # 43-62, Barrio Alto Prado</p>
                <p>Tunja: Calle 19 # 10-45, Barrio Centro</p>
            </div>
            <div class="contact">
                <h3>Contactos</h3>
                <p>Teléfono: 01 8000 123456</p>
                <p>Email: contacto@hermes.com</p>
            </div>
            <div class="hours">
                <h3>Horarios</h3>
                <p>Lunes - Viernes: 08:00 AM - 08:00 PM</p>
                <p>Sábados y Festivos: 09:00 AM - 01:00 PM</p>
            </div>
        </div>
    </footer>

</body>
</html>
