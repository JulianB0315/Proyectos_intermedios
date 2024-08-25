<?php
session_start();
//recuperar
$nombres=$_POST["nombres"];
$Apellidos=$_POST["Apellidos"];
$email=$_POST["email"];
$Genero=isset($_POST["Genero"])?implode(",",$_POST["Genero"]):"";
$poblacion=$_POST["poblacion"];
$descripcion=$_POST["descripcion"];

//almecennar
$_SESSION["nombres"]=$nombres;
$_SESSION["Apellidos"]=$Apellidos;
$_SESSION["email"]=$email;
$_SESSION["Genero"]=$Genero;
$_SESSION["poblacion"]=$poblacion;
$_SESSION["descripcion"]=$descripcion

//redireccion a la pagina de visualizacion
header("Location:mostrar.php");
?>