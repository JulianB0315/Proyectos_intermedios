<?php
include '../controladores/conexion.php';

$query = "SELECT * FROM Servicios";
$stmt = $pdo->prepare($query);
$stmt->execute();
$servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Michel Automotriz-Servicios</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="styles_php.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                            <a class="nav-link" href="./index.php">Inicio</a>
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
        <section class="servicios">
            <div class="container">
                <h2 class="text-center">Nuestros Servicios</h2>
                <p class="lead text-center">Ofrecemos una variedad de servicios automotrices para garantizar el rendimiento y la seguridad de tu vehículo.</p>
                <div class="row">
                    <?php foreach ($servicios as $servicio): ?>
                        <div class="col-md-6">
                            <!-- Carrusel para las imágenes -->
                            <div id="carousel-<?php echo $servicio['servicio_id']; ?>" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="<?php echo htmlspecialchars($servicio['imagen1']); ?>" class="d-block w-100" alt="Imagen 1 - <?php echo htmlspecialchars($servicio['nombre']); ?>">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?php echo htmlspecialchars($servicio['imagen2']); ?>" class="d-block w-100" alt="Imagen 2 - <?php echo htmlspecialchars($servicio['nombre']); ?>">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?php echo $servicio['servicio_id']; ?>" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?php echo $servicio['servicio_id']; ?>" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="servicio-item">
                                <h3><?php echo htmlspecialchars($servicio['nombre']); ?></h3>
                                <p class="descripcion"><?php echo htmlspecialchars($servicio['descripcion']); ?></p>
                                <p class="precio">Precio: <?php echo htmlspecialchars($servicio['precio']); ?></p>
                                <p class="duracion">Tiempo de servicio: <?php echo htmlspecialchars($servicio['duracion']); ?></p>
                                <p class="descripcion-detallada">
                                    <?php echo htmlspecialchars($servicio['descripcion_detallada']); ?>
                                </p>
                                <a href="https://wa.me/+51984164309?text=Hola,%20tengo%20una%20consulta%20sobre%20el%20<?php echo htmlspecialchars($servicio['nombre']); ?>"
                                    target="_blank"
                                    class="btn-cotizar">
                                    <i class="fab fa-whatsapp"></i> Cotizar
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

    </main>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>