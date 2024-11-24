<?php
// Incluir la conexión PDO
include '../controladores/conexion.php';

$productos_por_pagina = 30;
$página_actual = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($página_actual - 1) * $productos_por_pagina;

$search = isset($_GET['search']) ? $_GET['search'] : '';
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';

$query = "SELECT * FROM Repuestos WHERE 1=1";
$params = [];

if (!empty($search)) {
    $query .= " AND nombre LIKE :search";
    $params['search'] = "%$search%";
}

if (!empty($categoria)) {
    $query .= " AND categoria = :categoria";
    $params['categoria'] = $categoria;
}

$query .= " LIMIT $productos_por_pagina OFFSET $offset";
$stmt = $pdo->prepare($query);
$stmt->execute($params);

if ($stmt->rowCount() > 0):
?>
    ?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Michel Automotriz-Repuestos</title>
        <link rel="icon" href="img/logo.png">
        <link rel="stylesheet" href="styles_php.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.min.css">
    </head>

    <body>
        <!-- Navbar-->
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
                                <a class="nav-link" href="repuestos.php">Repuestos</a>
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
            <section class="productos-section mt-5">
                <div class="container">
                    <h2 class="text-center mb-5">Nuestros Repuestos</h2>
                    <!-- Sección de búsqueda y filtro -->
                    <div class="row mb-4">
                        <div class="col-md-8 mx-auto">
                            <form action="" id="searchForm" method="GET" class="d-flex search-bar">
                                <input type="text" id="searchInput" class="form-control me-2" placeholder="Buscar repuestos..." name="search" value="<?php echo htmlspecialchars($search); ?>">
                                <select name="categoria" class="form-select me-2">
                                    <option value="">Todas las categorías</option>
                                    <option value="motor">Motor</option>
                                    <option value="frenos">Frenos</option>
                                    <option value="suspension">Suspensión</option>
                                </select>
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </form>

                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <?php
                        while ($repuesto = $stmt->fetch(PDO::FETCH_ASSOC)):
                        ?>
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="<?php echo $repuesto['imagen1']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($repuesto['nombre']); ?>">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo htmlspecialchars($repuesto['nombre']); ?></h4>
                                        <p class="card-text"><?php echo htmlspecialchars($repuesto['descripcion']); ?></p>
                                        <p class="card-text"><strong>Precio: </strong>S./<?php echo number_format($repuesto['precio_unitario'], 2); ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="detalles.php?id=<?php echo $repuesto['repuesto_id']; ?>" class="btn btn-primary">Más Información</a>
                                    </div>

                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
            <script>
                document.getElementById('searchForm').addEventListener('submit', function() {
                    document.getElementById('searchInput').value = '';
                });
            </script>
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

    <?php
    // Obtener el total de productos para calcular la cantidad de páginas
    $query_total = "SELECT COUNT(*) FROM Repuestos WHERE nombre LIKE :search";
    $stmt_total = $pdo->prepare($query_total);
    $stmt_total->execute(['search' => "%$search%"]);
    $total_productos = $stmt_total->fetchColumn();
    $total_paginas = ceil($total_productos / $productos_por_pagina);
// Mostrar el pie de página
else:
    echo '<p>No hay repuestos disponibles.</p>';
endif;
    ?>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    </body>

    </html>