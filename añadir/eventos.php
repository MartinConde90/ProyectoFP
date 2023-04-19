<?php
require_once(dirname(__FILE__)."/../evento/EventosMysql.php");

$mensaje = "";
if(session_status() !== PHP_SESSION_ACTIVE) 
{ 
    session_start(); 
} 
if(!isset($_SESSION['rol'])){
  header("location:/ProyectoFP/index.php");
}
if ($_SERVER["REQUEST_METHOD"]== "POST") {

   
    $post_title        = ($_POST['title']);
    $post_status       = ($_POST['post_status']);
    $post_image        = ($_FILES['image']['name']);
    $post_image_temp   = ($_FILES['image']['tmp_name']);

    $post_content      = strip_tags(($_POST['post_content']));
    $post_date         = date("Y-m-d H:i:s");

    move_uploaded_file($post_image_temp, "../image/$post_image");

    $evento = new EventosMysql($post_title,$post_status,$post_image,$post_content,$post_date,$_SESSION["nombre"]);
    $evento->guardar($evento);
     
    header("location:/ProyectoFP/index.php");

    
}
include("../header.php");
include ("../sidebar.php"); 
?>
<div class="container">
    <div class="mensaje"><?=$mensaje?></div>
        <form class="addform" action="" method="post" enctype="multipart/form-data">
        <h2>Nueva publicación</h2>
          <div class="form-group">
            <hr>
            <label for="title">Post Title</label>
            <input type="text" class="form-control" name="title">
            <hr>
          </div>
            
          <select name="post_status" id="">
            <option value="Draft">Post Status</option>
            <option value="Published">Publicar</option>
            <option value="Draft">Borrador</option>
          </select>
  
          <div class="form-group">
            <hr>
            <label for="title">Post Image</label>
            <input type="file" class="form-control" name="image">
            <hr>
          </div>

          <div class="form-group">
            <label for="title">Post Content</label>
            <textarea class="form-control" name="post_content" cols="20" rows="5"></textarea>
            <hr>
          </div>

          <input class="btn btn-primary" type="submit" value="Publicar">    
        </form>
                    
                    
  <?php include "../footer.php"; ?>
</body>
</html>