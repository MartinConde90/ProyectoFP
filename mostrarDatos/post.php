<?php
include("../header.php");
include ("../sidebar.php"); 
require_once(dirname(__FILE__)."/../evento/EventosMysql.php");
if(session_status() !== PHP_SESSION_ACTIVE){ 
    session_start();  
} 


$usuarios = UsuarioMysql::listar();
?>
<!-- Page Content -->
<div class="container">



    <!-- Blog Entries Column -->
    <div class="col-md-8">
    
    <?php

    if(isset($_GET['p_id'])){
        $post_id = $_GET['p_id'];
        $query = "SELECT * FROM posts WHERE id_post = $post_id";
        $selected_post = BDMySql::getConexion()->query($query);
        
        if ($_SERVER["REQUEST_METHOD"]== "POST"){

            $autor = $_SESSION["nombre"];
            $email = $_SESSION["correo"];
            $contenido = $_POST["comentario"];
            $fecha = date('Y-m-d');

            $query = "INSERT INTO comentarios (id_post_comentario, autor_comentario, email_autor, 
                        contenido_comentario, estatus_comentario, fecha_comentario)";
                        $query .= "VALUES ($post_id, '{$autor}', '{$email}', 
                                   '{$contenido}', 'Aprobado', '$fecha')";
            $query_realize = BDMySql::getConexion()->query($query);


            function redirect($location){
                header("Location:" . $location);
                exit;
            }
            redirect("/PROYECTOFP/mostrarDatos/post.php?p_id=$post_id");
        }

        foreach ($selected_post as $row) {
            $post_id = $row['id_post'];
            $post_title = $row['nombre'];
            $post_date = $row['fecha'];
            $post_image = $row['imagen'];
            $post_content = $row['contenido']; //de 0 caracteres a 100
            $post_status = $row['estatus'];
            $usuario = $row['post_user'];
            ?>
                    <!--<h1 class="page-header">
                        Page Heading<small>Secondary Text</small>
                    </h1>-->

                    <!-- First Blog Post -->
                    <!-- <h1><?php echo $count ?></h1> -->
                    <h2>
                        <!-- MODIFICACION EN .HTACCESS PARA LOS LINKS-->
                        <!-- <a href="post.php?p_id=<?php //echo $post_id ?>"><?php //echo $post_title ?></a> -->
                        <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                    </h2>
                    <p class="lead">
                        <!-- <a href="author_posts.php?author=<?php //echo $post_user ?>&p_id=<?php //echo $the_post_id ?>"><?php //echo $post_user ?> -->
                        <!-- MODIFICACION EN .HTACCESS PARA LOS LINKS-->
                        by <a href="/cms/author_posts/<?php echo $usuario ?>/<?php echo $post_id ?>"><?php echo $usuario ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                    <hr>
                    <a href="post.php?p_id=<?php echo $post_id ?>">
                        <img class="img-responsive" src="../image/<?php echo $post_image ?>" alt="" style="max-width: 100%">
                    </a>
                    <hr>
                    <p><?php echo $post_content ?></p>
                    <hr>

        <?php  

                //COMENTARIOS

                    if(isset($_SESSION["rol"])){ 
                        ?> 
                        <!-- Formulario comentario -->
                        <div class="well coment">
                            <h4>Deja un comentario:</h4>
                            <form action="" method="post" role="form">
                                <div class="form-group">
                                    <textarea class="form-control"name="comentario" rows="3" cols="30" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>

             <?php }
                    else{ ?>
                        <div class="row">
                                <p style=" font-weight:bold">Logueate para poder comentar</p>
                        </div>
              <?php } ?>

              <hr>

              <?php

              //COMENTARIOS REALIZADOS

              $query = "SELECT * FROM comentarios WHERE id_post_comentario = $post_id ";
              $query .= "AND estatus_comentario = 'Aprobado' ";
              $query .= "ORDER BY id_comentario DESC ";

              $comentarios_post = BDMySql::getConexion()->query($query);

              foreach($comentarios_post as $coment){
                $fecha = $coment["fecha_comentario"];
                $content = $coment["contenido_comentario"];
                $autor = $coment["autor_comentario"];
              ?>

                    <div class="media">
                        
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $autor ?>
                                <small><?php echo $fecha ?></small>
                            </h4>
                            <?php echo $content ?>
                        </div>
                    </div>
                    <hr>
              <?php
                } 
        }
    }
?>

<?php include "../footer.php"; ?>