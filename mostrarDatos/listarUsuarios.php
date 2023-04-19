<?php
require_once(dirname(__FILE__)."/../usuario/UsuarioMysql.php");
if(session_status() !== PHP_SESSION_ACTIVE){ 
    session_start();  
} 

$usuarios = UsuarioMysql::listar();

include("../header.php");
include ("../sidebar.php"); 
?>

        <?php 
        if($_SESSION["rol"] == 1){
            
    ?>
        <div class="container">
                  <table class="table  text-white mb-0">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php    
                    foreach ($usuarios as $id => $usuario) {
                ?>
                        <tr>
                            <td><?= $usuario->getId_usuario() ?></td>
                            <td><?= $usuario->getNombre() ?></td>
                            <td><?= $usuario->getCorreo() ?></td>
                            <td><?= $usuario->getRol() ?></td>
                            <td><a  href="../modificar/modifUsuarios.php?id=<?= $usuario->getId_usuario() ?>"><button type="button" class="btn btn-warning">Editar</button></a></td>
                            <td><a  href="../eliminar/eliminarUsuarios.php?id=<?= $usuario->getId_usuario() ?>" onclick="javascript:return confirm('Estás seguro de eliminar este usuario?')"><button type="button" class="btn btn-danger">Delete</button></a></td>
                        </tr>
                <?php 
                    }
                ?>
            </table>
        
        <?php
        }else{
        ?>
        <h2>No tienes permiso para ver los usuarios</h2>
        <?php } ?>
                    </tbody>
                  
<?php include "../footer.php"; ?>
</body>
</html>