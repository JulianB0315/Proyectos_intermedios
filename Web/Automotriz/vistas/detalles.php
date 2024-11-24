<?php
// Incluir la conexión PDO
include '../controladores/conexion.php';
// Validar el parámetro 'id'
$repuesto_id = isset($_GET['id']) ? (string)$_GET['id'] : null;
if (!$repuesto_id) {
    echo '<p class="alert alert-danger">El ID del repuesto no es válido.</p>';
    exit;
}

try {
    // Preparar y ejecutar la consulta
    $query = "SELECT * FROM Repuestos WHERE repuesto_id = :id LIMIT 1";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $repuesto_id, PDO::PARAM_STR);
    $stmt->execute();

    $repuesto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($repuesto) {
?>

        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Michel Automotriz-<?php echo htmlspecialchars($repuesto['nombre']); ?></title>
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
                <section class="detalles">
                    <div class="row align-items-center">
                        <!-- Imágenes a la izquierda -->
                        <div class="col-md-6">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="<?php echo htmlspecialchars($repuesto['imagen1']); ?>" class="d-block w-100" alt="<?php echo htmlspecialchars($repuesto['nombre']); ?>">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?php echo htmlspecialchars($repuesto['imagen2']); ?>" class="d-block w-100" alt="<?php echo htmlspecialchars($repuesto['nombre']); ?>">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <!-- Información a la derecha -->
                        <div class="col-md-6">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo htmlspecialchars($repuesto['nombre']); ?></h4>
                                <p class="card-text"><?php echo htmlspecialchars($repuesto['descripcion']); ?></p>
                                <p class="card-text"><strong>Precio: </strong>S/.<?php echo number_format($repuesto['precio_unitario'], 2); ?></p>
                                <a href="https://wa.me/+51984164309?text=Hola,%20tengo%20una%20consulta%20sobre%20el%20producto%20<?php echo urlencode($repuesto['nombre']); ?>.%20Me%20interesaría%20cotizar%20este%20producto%20con%20Automotriz%20Michel.">
                                    <button class="btn btn-primary cotizar-btn">Cotizar</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="Descripcion">
                    <div class="container">
                        <h2 class="text-center">Descripción del Producto</h2>
                        <p class="lead text-center">
                            <?php echo htmlspecialchars($repuesto['descripcion_detallada']); ?>
                        </p>
                    </div>
                    <div class="c   ontainer">
                        <h2 class="text-center">¿Te quedó alguna duda?</h2>
                        <p class="text-center">
                            👉🏻 Comunícate con nosotros vía <a href="https://wa.me/+51984164309?text=Hola,%20tengo%20una%20consulta%20sobre%20el%20producto%20<?php echo htmlspecialchars($repuesto['nombre']); ?>" target="_blank" class="whatsapp-link"><i class="fab fa-whatsapp"></i> WhatsApp</a> y te ayudaremos con tus consultas.
                        </p>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h4><i class="fas fa-truck"></i> Envío y Devolución</h4>
                                        <p>Ofrecemos envío rápido y devoluciones fáciles en caso de ser necesario.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h4><i class="fas fa-shield-alt"></i> Garantía</h4>
                                        <p>Todos nuestros productos cuentan con garantía por defectos de fábrica.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h4><i class="fas fa-lock"></i> Pago Seguro</h4>
                                        <p>Realiza tus compras con total confianza a través de nuestros métodos de pago seguros.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <section class="Mas-productos">
                    <h2 class="text-center">Tambien te puede interesar</h2>
                    <?php
                    // Incluir la conexión PDO
                    include '../controladores/conexion.php';
                    $categoria = $repuesto['categoria'];
                    $query = "SELECT * FROM Repuestos WHERE categoria = :categoria LIMIT 9;";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
                    $stmt->execute();
                    if ($stmt->rowCount() > 0) {
                    ?>

                        <div id="productoCarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                $contador = 0;
                                while ($repuesto = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    if ($contador % 3 == 0) {
                                        $activeClass = ($contador == 0) ? 'active' : '';
                                        echo '<div class="carousel-item ' . $activeClass . '"><div class="row">';
                                    }

                                ?>
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img src="<?php echo htmlspecialchars($repuesto['imagen1']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($repuesto['nombre']); ?>">
                                            <div class="card-body">
                                                <h4 class="card-title"><?php echo htmlspecialchars($repuesto['nombre']); ?></h4>
                                                <p class="card-text"><?php echo htmlspecialchars($repuesto['descripcion']); ?></p>
                                                <p class="card-text"><strong>Precio: </strong>S/.<?php echo number_format($repuesto['precio_unitario'], 2); ?></p>
                                            </div>
                                            <div class="card-footer">
                                                <a href="detalles.php?id=<?php echo $repuesto['repuesto_id']; ?>" class="btn btn-primary">Más Información</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    $contador++;
                                    if ($contador % 3 == 0) {
                                        echo '</div></div>';
                                    }
                                }
                                if ($contador % 3 != 0) {
                                    echo '</div></div>';
                                }
                                ?>
                            </div>

                            <!-- Controles de navegación del carrusel -->
                            <a class="carousel-control-prev" href="#productoCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#productoCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    <?php
                    } else {
                        echo "<p>No se encontraron productos para mostrar.</p>";
                    }
                    ?>
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
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>

        </html>
<?php
    } else {
        echo '<p class="alert alert-warning">No se encontró el repuesto solicitado.</p>';
    }
} catch (PDOException $e) {
    echo '<p class="alert alert-danger">Error en la base de datos: ' . htmlspecialchars($e->getMessage()) . '</p>';
}
?>