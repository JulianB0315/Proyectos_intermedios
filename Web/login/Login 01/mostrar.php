<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div>
        <h2>DATOS REGISTRADOS</h2>
        <?php
        session_start();
        if(
            isset($_SESSION["nombres"])&&
            isset($_SESSION["Apellidos"])&&
            isset($_SESSION["email"])&&
            isset($_SESSION["Genero"])&&
            isset($_SESSION["Poblacion"])&&
            isset($_SESSION["descripcion"])
        ){
            echo "<p><strong>Nombres:</strong>".$_SESSION["nombres"]."</p>";
            echo "<p><strong>Aoellidos:</strong>".$_SESSION["Apellidos"]."</p>";
            echo "<p><strong>Correo Electronico:</strong>".$_SESSION["email"]."</p>";
            echo "<p><strong>Genero:</strong>".$_SESSION["Genero"]."</p>";
            echo "<p><strong>Poblacion:</strong>".$_SESSION["poblacion"]."</p>";
            echo "<p><strong>Descripcion:</strong>".$_SESSION["descripcion"]."</p>";
            session_unset();
            session_destroy();
        }
        else{
            echo"No hay datos :C";
        }
        ?>
    </div>
</body>
</html>