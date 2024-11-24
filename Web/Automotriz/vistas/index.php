<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Michel Automotriz</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- Narvar-->
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #1E3A8A;">
        <div class="container-fluid">
            <a class="navbar-brand text-light fw-semibold fs-2" href="./index.php">
                <img src="img/logo.png" alt="Shop logo" width="70" height="70"
                    class="d-inline-block align-text-center">
                Michel Automotriz
            </a>
            <button class="navbar-toggler bg-" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offCanvas" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <section class="offcanvas offcanvas-end" id="offCanvas" tabindex="-1">
                <div clasS="offcanvas-header" data-bs-theme="principal">
                    <h5 class="offcanvas-title fs-1 p-3">Michel Automotriz</h5>
                    <button class="btn-close bg-" type="button" aria-label="Close"
                        data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body d-flex flex-column justify-content-between px-0">
                    <ul class="navbar-nav fs-5 justify-content-evenly">
                        <li class="nav-item p-3 ">
                            <a class="nav-link" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item p-3 ">
                            <a class="nav-link" href="./repuestos.php">Repuestos</a>
                        </li>
                        <li class="nav-item p-3 ">
                            <a class="nav-link" href="servicios.php">Servicios para tu auto</a>
                        </li>
                    </ul>

                </div>
            </section>
        </div>
    </nav>
    <!-- Contenido principal -->
    <main>
        <!-- Sección Hero -->
        <section class="hero-section">
            <div class="container">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row align-items-center">
                                <div class="col-md-6 text-left">
                                    <h1>Innovación y Dinamismo en el Mundo Automotriz</h1>
                                    <p class="lead">Tecnología avanzada para tu movilidad del futuro. Con nuestros vehículos de última generación, combinamos eficiencia, seguridad y sostenibilidad.</p>
                                </div>
                                <div class="col-md-6">
                                    <img src="img/Innovación.jpg" alt="Innovación Automotriz" class="d-block w-100">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row align-items-center">
                                <div class="col-md-6 text-left">
                                    <h1>Diseño y Eficiencia al Máximo</h1>
                                    <p class="lead">Redefiniendo el concepto de movilidad con vehículos sostenibles y de alto rendimiento.</p>
                                </div>
                                <div class="col-md-6">
                                    <img src="img/Diseño.jpg" alt="Eficiencia Automotriz" class="d-block w-100">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row align-items-center">
                                <div class="col-md-6 text-left">
                                    <h1>Conducir el Futuro</h1>
                                    <p class="lead">Únete a la revolución automotriz con tecnología de punta y un diseño que destaca.</p>
                                </div>
                                <div class="col-md-6">
                                    <img src="img/Conducir el Futuro.webp" alt="Futuro Automotriz" class="d-block w-100">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- Sección Servicios -->
        <section class="service-section" id="services">
            <div class="container">
                <h2 class="text-center mb-5">¿Qué Hacemos en Michel Automotriz?</h2>
                <div class="row">
                    <!-- Primer Tarjeta -->
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card">
                            <a href="servicios.php" class="card-img-top-wrapper">
                                <img src="img/Reparación de Motores.webp" class="card-img-top" alt="Reparación de Motores">
                            </a>
                            <i class="bi bi-wrench service-icon"></i>
                            <div class="card-body">
                                <h4 class="card-title">Reparación de Motores</h4>
                                <p class="card-text">Reparación de motores con tecnología de punta para garantizar el máximo rendimiento y longevidad de tu vehículo.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Segunda Tarjeta -->
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card">
                            <a href="servicios.php" class="card-img-top-wrapper">
                                <img src="img/Venta de Repuestos.jpg" class="card-img-top" alt="Venta de Repuestos">
                            </a>
                            <i class="bi bi-tools service-icon"></i>
                            <div class="card-body">
                                <h4 class="card-title">Venta de Repuestos</h4>
                                <p class="card-text">Repuestos originales y de alta calidad para mantener tu vehículo en perfecto estado de funcionamiento.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Tercera Tarjeta -->
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card">
                            <a href="servicios.php" class="card-img-top-wrapper">
                                <img src="img/Servicio Eléctrico.jpg" class="card-img-top" alt="Servicio Eléctrico">
                            </a>
                            <i class="bi bi-plug service-icon"></i>
                            <div class="card-body">
                                <h4 class="card-title">Servicio Eléctrico</h4>
                                <p class="card-text">Servicio eléctrico integral, especializado en el cambio de bobinas, baterías y sistemas eléctricos de vehículos.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Cuarta Tarjeta -->
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card">
                            <a href="servicios.php" class="card-img-top-wrapper">
                                <img src="img/Mantenimiento Automotriz.webp" class="card-img-top" alt="Mantenimiento Automotriz">
                            </a>
                            <i class="bi bi-tools service-icon"></i>
                            <div class="card-body">
                                <h4 class="card-title">Mantenimiento Automotriz</h4>
                                <p class="card-text">Ofrecemos servicios especializados de mantenimiento para garantizar el rendimiento y la seguridad de tu vehículo.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <!-- Quinta Tarjeta -->
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card">
                            <a href="servicios.php" class="card-img-top-wrapper">
                                <img src="img/Alineación y Balanceo.jpg" class="card-img-top" alt="Alineación y Balanceo">
                            </a>
                            <i class="bi bi-circle service-icon"></i>
                            <div class="card-body">
                                <h4 class="card-title">Alineación y Balanceo</h4>
                                <p class="card-text">Alineamos y balanceamos tus llantas para mejorar la seguridad y el rendimiento de tu vehículo.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sexta Tarjeta -->
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card">
                            <a href="servicios.php" class="card-img-top-wrapper">
                                <img src="img/Mantenimiento Preventivo.jpg" class="card-img-top" alt="Mantenimiento Preventivo">
                            </a>
                            <i class="bi bi-gear service-icon"></i>
                            <div class="card-body">
                                <h4 class="card-title">Mantenimiento Preventivo</h4>
                                <p class="card-text">Mantenemos tu vehículo en condiciones óptimas mediante revisiones periódicas y ajustes preventivos.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Séptima Tarjeta -->
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card">
                            <a href="servicios.php" class="card-img-top-wrapper">
                                <img src="img/Revisión de Frenos.jpg" class="card-img-top" alt="Revisión de Frenos">
                            </a>
                            <i class="bi bi-brakes service-icon"></i>
                            <div class="card-body">
                                <h4 class="card-title">Revisión de Frenos</h4>
                                <p class="card-text">Inspeccionamos y reparamos el sistema de frenos para garantizar tu seguridad al conducir.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Octava Tarjeta -->
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card">
                            <a href="servicios.php" class="card-img-top-wrapper">
                                <img src="img/Diagnóstico Computarizado.png" class="card-img-top" alt="Diagnóstico Computarizado">
                            </a>
                            <i class="bi bi-laptop service-icon"></i>
                            <div class="card-body">
                                <h4 class="card-title">Diagnóstico Computarizado</h4>
                                <p class="card-text">Realizamos diagnósticos avanzados de tu vehículo utilizando equipos de última tecnología.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pie de página -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <!-- Sección de contacto -->
                    <div class="footer-seccion col-md-4">
                        <h3 class="footer-title">Contacto</h3>
                        <ul class="footer-list">
                            <li><a href="tel:+123456789" class="footer-link"><i class="fas fa-phone"></i> +123 456 789</a></li>
                            <li><a href="mailto:contacto@michelautomotriz.com" class="footer-link"><i class="fas fa-envelope"></i> michelautomotriz.com</a></li>
                            <li><a href="https://maps.app.goo.gl/VUETEDFf8wMEUZ5k6" class="footer-link"><i class="fas fa-map-marker-alt"></i> Encuéntranos en Google Maps</a></li>
                        </ul>
                    </div>

                    <!-- Sección de redes sociales -->
                    <div class="footer-seccion col-md-4">
                        <h3 class="footer-title">Síguenos</h3>
                        <ul class="footer-list">
                            <li><a href="https://facebook.com" class="footer-link"><i class="fab fa-facebook"></i> Facebook</a></li>
                            <li><a href="https://twitter.com" class="footer-link"><i class="fab fa-twitter"></i> Twitter</a></li>
                            <li><a href="https://instagram.com" class="footer-link"><i class="fab fa-instagram"></i> Instagram</a></li>
                        </ul>
                    </div>

                    <!-- Sección de información -->
                    <div class="footer-seccion col-md-4">
                        <h3 class="footer-title">Información</h3>
                        <ul class="footer-list">
                            <li><a href="/acerca" class="footer-link"><i class="fas fa-info-circle"></i> Acerca de Nosotros</a></li>
                            <li><a href="/terminos" class="footer-link"><i class="fas fa-file-alt"></i> Términos y Condiciones</a></li>
                            <li><a href="/privacidad" class="footer-link"><i class="fas fa-shield-alt"></i> Política de Privacidad</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- CopyRight -->
            <div class="footer-copy">
                <p>&copy; 2024 Michel Automotriz. Todos los derechos reservados.</p>
            </div>
        </footer>


    </main>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>