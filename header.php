<?php
require_once("usuario/UsuarioMysql.php");
require_once("conexion/BDMySql.php");
if(session_status() !== PHP_SESSION_ACTIVE){ 
    session_start();  
} 

$usuarios = UsuarioMysql::listar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/ProyectoFP/estilos.css" media="screen" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" 
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" 
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" 
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" 
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" 
        crossorigin="anonymous">
    </script>
</head>
<body>
  <nav class="navbar navbar-dark navbar-expand justify-content-center bg-dark text-light">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="eventosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Publicaciones
        </a>
        <div class="dropdown-menu" aria-labelledby="eventosDropdown">
          <a class="dropdown-item text-dark" href="/ProyectoFP">Publicaciones</a>
          <a class="dropdown-item text-dark" href="/ProyectoFP/añadir/eventos.php">Añadir publicaciones</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="usuariosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usuarios
        </a>
        <div class="dropdown-menu text-dark" aria-labelledby="usuariosDropdown">
          <a class="dropdown-item text-dark" href="/ProyectoFP/mostrarDatos/listarUsuarios.php">Listar Usuarios</a>
          <a class="dropdown-item text-dark" href="/ProyectoFP/añadir/nuevoUsuario.php">Añadir Usuarios</a>
        </div>
      </li>
    </ul>
    
  </nav>