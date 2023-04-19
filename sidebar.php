<?php
if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["correo"])&& isset($_POST["password"]) ) {

    $correo = $_POST["correo"];
    $passwd = $_POST["password"];

    $usuarios = UsuarioMysql::listar();

    foreach ($usuarios as $id => $usuario) {
        
        if($usuario->comprobarValidarUsuario($correo,$passwd)){
            $_SESSION["correo"] = $correo;
            $_SESSION["id"] = $usuario->getId_usuario();
            $_SESSION["nombre"] = $usuario->getNombre();
            $_SESSION["rol"] = $usuario->getRol();
            header("location:/ProyectoFP");
            exit();
        }else{
            $mensaje = "Usuario no encontrado";
        }
    }  
}
?>
<!-- Blog Sidebar Widgets Column -->

<div class="col-md-4">

<!-- Login -->
<div class="well">
    
    <?php if(isset($_SESSION['rol'])): ?>
        <h4>Usuario: <?php echo $_SESSION['nombre'] ?></h4>
        <a href="/ProyectoFP/cerrarSesion.php" class="btn btn-primary">Logout</a>

    <?php else: ?>
        <h4>Login</h4>
        <form  method ="post">
            <div class="form-group">
            <input class="inpt" type="email" name="correo" id="correo" required placeholder="Correo de usuario">                       
            </div>
            <div class="input-group">
            <input class="inpt" type="password" name="password" id="password" required placeholder="Contraseña">                        
                <span class="input-group-btn">
                    <button class="btn btn-primary" name="login" type="submit">Login</button>
                </span>
            </div>
            
        </form><!-- Search form -->
        <!-- /.input-group -->

    <?php endif; ?>
</div>
</div>
