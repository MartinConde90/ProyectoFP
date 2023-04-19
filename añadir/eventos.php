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

    $evento = new EventosMysql($post_title,$post_status,$post_image,$post_content,$post_date,$_SESSION["id"]);
    $evento->guardar($evento);
     
    header("location:/ProyectoFP/index.php");

    
}
include("../header.php")
?>

    <div class="mensaje"><?=$mensaje?></div>

    <section class="intro">
    <div class="bg-image h-100" style="background-image: url(https://mdbootstrap.com/img/Photos/new-templates/glassmorphism-article/img7.jpg);">
      <div class="mask d-flex align-items-center h-100">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="card mask-custom">
                <div class="card-body">
                  <div class="table-responsive">
                    
                    <table class="table table-borderless text-white mb-0">
                    <div class="contenedor">
                        <h2>Nueva publicación</h2>
                            <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                    <label for="title">Post Title</label>
                                    <input type="text" class="form-control" name="title">
                                </div>
                                <select name="post_status" id="">
                                    <option value="">Post Status</option>
                                    <option value="Published">Publicar</option>
                                    <option value="Draft">Borrador</option>
                                </select>
                      
                                <div class="form-group">
                                    <label for="title">Post Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>

                                <div class="form-group">
                                    <label for="title">Post Content</label>
                                    <textarea class="form-control" name="post_content" cols="20" rows="5"></textarea>
                                </div>

                                <input class="boton" type="submit" value="Crear">    
                            </form>
                    </div>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
   
</body>
</html>