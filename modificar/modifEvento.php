<?php
require_once(dirname(__FILE__)."/../evento/EventosMysql.php");
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start(); 
} 

$id = $_GET['id'];
$nombre="";
$fecha_ini="";
$fecha_fin="";

$eventoAmodif;
$eventos = EventosMysql::listar();

foreach ($eventos as $key => $evento){
    if($evento->getId_post() == $id){
        $eventoAmodif = $evento;
    }
}

if ($_SERVER["REQUEST_METHOD"]== "POST"){

    if(!$_POST["title"]==""){
        $post_title = ($_POST["title"]);
    }
    if(!$_POST["post_status"]==""){
        $post_status = ($_POST["post_status"]);
    }
    

    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
        $post_image = ($_FILES['image']['name']);
        $post_image_temp = $_FILES['image']['tmp_name'];
        move_uploaded_file($post_image_temp, "../image/$post_image");
      } else {
        $post_image = $eventoAmodif->getImagen();
      }
    
    if(!$_POST["post_content"]==""){
        $post_content = ($_POST["post_content"]);
    }
       
    $evento = new EventosMysql($post_title,$post_status,$post_image,$post_content,$eventoAmodif->getFecha(),$eventoAmodif->getNombreUsuario(),$id);
    $evento->modificar($evento);


    header("location:/ProyectoFP/mostrarDatos/listarPosts.php");
}
include("../header.php");
include ("../sidebar.php"); 
?>

<div class="container">
        <form class="addform" action="" method="post" enctype="multipart/form-data">
        <h2>Nuevos datos de la publicacion</h2>
          <div class="form-group">
            <hr>
            <label for="title">Post Title</label>
            <input type="text" class="form-control" name="title" value="<?=$eventoAmodif->getTitulo();?>" required>
            <hr>
          </div>
            
          <select name="post_status" id="">
            <option value="<?=$eventoAmodif->getStatus();?>">Post Status</option>
            <option value="Published">Publicar</option>
            <option value="Draft">Borrador</option>
          </select>
  
          <div class="form-group">
            <hr>
            <img width="100" src="/ProyectoFP/image/<?= $eventoAmodif->getImagen();?>" alt="">
            <label for="title">Post Image</label>
            <input type="file" class="form-control" name="image">
            <hr>
          </div>

          <div class="form-group">
            <label for="title">Post Content</label>
            <textarea class="form-control" name="post_content" cols="20" rows="5"  required><?= $eventoAmodif->getContenido();?></textarea>
            <hr>
          </div>

          <input class="btn btn-primary" type="submit" value="Publicar">    
        </form>
        <?php include "../footer.php"; ?>
</body>
</html>