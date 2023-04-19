<?php
require_once(dirname(__FILE__)."/../usuario/UsuarioMysql.php");

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start(); 
} 
if(!isset($_SESSION["id"])){
    header("location:login.php");
}

$id = $_GET['id'];
$nombre="";
$correo="";

$usuarioAmodif;

$usuarios = UsuarioMysql::listar();

foreach ($usuarios as $key => $usuario){
    if($usuario->getId_usuario() == $id){
        $usuarioAmodif = $usuario;
    }
}

if ($_SERVER["REQUEST_METHOD"]== "POST"){

    if(!$_POST["nombre"]==""){
        $nombre = ($_POST["nombre"]);
    }
    if(!$_POST["correo"]==""){
        $correo = $_POST["correo"];
    }else{
        $correo = $usuarioAmodif->getCorreo();
    }
    if(empty($_POST["rol"])){
        $rol = $_POST["rol"];
    }else{
        $rol = $usuarioAmodif->getRol();
    }

    
    $usuario = new UsuarioMysql($nombre,$correo,$usuarioAmodif->getPassword(),$rol,false,$id);
    $usuario->modificar($usuario);


            header("location:../mostrarDatos/listarUsuarios.php");
}
include("../header.php");
include ("../sidebar.php"); 
?>

      <div class="container">  
          <form class="addform" action="" method="post" enctype="multipart/form-data">
          <h2>Nuevos datos del usuario</h2>
            <div class="form-group">
              <hr>
              <label style="margin-left:10px">Nombre de usuario</label>
              <input class="form-control"  type="text" name="nombre" id="nombre" value="<?=$usuarioAmodif->getNombre();?>">    
              <hr>
            </div>
            <div class="form-group">
              <label style="margin-left:10px">EMAIL</label>
              <input class="form-control"  type="email" name="correo" id="correo" value="<?=$usuarioAmodif->getCorreo()?>">
              <hr>
            </div>
            <div class="form-group">
              <label style="margin-left:10px">ROL</label>
              <input class="form-control"  type="number" min="0" max="1" name="rol" id="rol" value="<?=$usuarioAmodif->getRol()?>">
              <hr>
            </div>
            <div class="form-group d-flex justify-content-start" style="margin-top:25px">
              <div>
                <input class="btn btn-primary" type="submit" value="Modificar">
              </div>
            </div>
          </form>
      
        <?php include "../footer.php"; ?>
</body>
</html>