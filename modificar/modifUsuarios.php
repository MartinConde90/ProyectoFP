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
?>


<section class="intro">
  <div class="bg-image h-100" style="background-image: url(https://mdbootstrap.com/img/Photos/new-templates/glassmorphism-article/img7.jpg);">
    <div class="mask d-flex justify-content-center align-items-center h-100">
      <div class="container">
            <div class="card mask-custom">

              
                  <h2>Introduce los nuevos datos del usuario</h2>
                  <form class="d-flex justify-content-center align-items-start mx-auto" action="" method="post">
                    <div class="form-group">
                      <label class="text-light" style="margin-left:10px">Nombre de usuario</label>
                      <input class="inpt form-control mx-2" style="width:200px" type="text" name="nombre" id="nombre" value="<?=$usuarioAmodif->getNombre();?>">    
                    </div>
                    <div class="form-group">
                      <label class="text-light" style="margin-left:10px">EMAIL</label>
                      <input class="inpt form-control mx-2" style="width:200px" type="email" name="correo" id="correo" value="<?=$usuarioAmodif->getCorreo()?>">
                    </div>
                    <div class="form-group">
                      <label class="text-light" style="margin-left:10px">ROL</label>
                      <input class="inpt form-control mx-2" style="width:200px" type="number" min="0" max="1" name="rol" id="rol" value="<?=$usuarioAmodif->getRol()?>">
                    </div>
                    <div class="form-group d-flex justify-content-start" style="margin-top:25px">
                      <div>
                        <input class="boton" type="submit" value="Modificar">
                      </div>
                    </div>
                  </form>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>