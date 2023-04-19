<?php
require_once(dirname(__FILE__)."/../usuario/UsuarioMysql.php");

$mensaje = "";
if(session_status() !== PHP_SESSION_ACTIVE)
{
    session_start();
}
if(!isset($_SESSION["id"])){
    header("location:login.php");
}

if($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["correo"])&& isset($_POST["password"])&& isset($_POST["nombre"])&& isset($_POST["rol"]) ) {

    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $password = $_POST["password"];
    $rol = $_POST["rol"];


    $usuario = new UsuarioMysql($nombre,$correo,$password,$rol,true);
    $usuario->guardar($usuario);

    header("location:../mostrarDatos/listarUsuarios.php");
    exit();
}
include("../header.php");
include ("../sidebar.php"); 
?>

<div class="container">
        
                
                <form class="addform" action="" method="post">
                <h2>Añadir usuario</h2>
                  <div class="form-group">
                    <hr>
                    <label for="title">Nombre de usuario</label>
                    <input class="form-control" type="text" name="nombre" id="nombre" required placeholder="Nombre de usuario">
                    <hr>
                  </div>

                  <div class="form-group">
                    <label for="title">Correo electrónico</label>
                    <input class="form-control" type="email" name="correo" id="correo" required placeholder="Correo de usuario">
                    <hr>
                  </div>

                  <div class="form-group">
                    <label for="title">Contraseña</label>
                    <input class="form-control" type="password" name="password" id="password" required placeholder="Contraseña">
                    <hr>
                  </div>

                  <div class="form-group">
                    <label for="title">Rol del usuario</label>
                    <select name="rol" id="rol">
                        <option value="0">Subscriptor</option>
                        <option value="1">Administrador</option>
                    </select>
                    <hr>
                  </div>

                  <input class="btn btn-primary" type="submit" value="Registrar">    
                </form>
            
                    
  <?php include "../footer.php"; ?>
</body>
</html>