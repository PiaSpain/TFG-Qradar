<?php
    // Nos traemos las viariables de la sesiones
    include("../Modelo/sesiones.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Henar Alcolea López</title>
    <!-- BOOTSTRAP 4 --> 
    <!-- Para los estilos nos descargamos boostrap --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- FONT AWESOME para los iconos de editar y eliminar-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/vista.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="app.php" class="navbar-brand text-dark"><i class="fas fa-bars"></i>     IBM QRadar Log Source Management</a>
            <!--Pasmos mediante get cerramos para comprobar en el archivo cerrar.php que hemos accedido por este enlace -->
            <a href="../Modelo/cerrar.php?cerramos" class="navbar-brand text-dark">Usu: <?=@$_SESSION['dni'];?> CERRAR SESIÓN</a>
        </div>
    </nav>