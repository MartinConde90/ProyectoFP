<?php
require_once(dirname(__FILE__)."/../evento/EventosMysql.php");
if(session_status() !== PHP_SESSION_ACTIVE){ 
    session_start();  
} 

$eventos = EventosMysql::listar();

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
                        <th scope="col">Autor</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Fecha</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php    
                    foreach ($eventos as $id => $evento) {
                ?>
                        <tr>
                            <td><?= $evento->getId_post() ?></td>
                            <td><?= $evento->getNombreUsuario() ?></td>
                            <td><?= $evento->getTitulo() ?></td>
                            <td><?= $evento->getStatus() ?></td>
                            <td><img width='100' src='../image/<?= $evento->getImagen() ?>' ></td>
                            <td><?= $evento->getFecha() ?></td>
                            <td><a  href="/ProyectoFP/modificar/modifEvento.php?id=<?= $evento->getId_post() ?>"><button type="button" class="btn btn-warning">Editar</button></a></td>
                            <td><a  href="../eliminar/eliminarEvento.php?id=<?= $evento->getId_post() ?>" onclick="javascript:return confirm('Estás seguro de eliminar esta publicación?')"><button type="button" class="btn btn-danger">Delete</button></a></td>
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