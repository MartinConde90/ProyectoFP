<?php
if(session_status() !== PHP_SESSION_ACTIVE){ 
    session_start();  
} 
require_once("evento/EventosMysql.php");
require_once("usuario/UsuarioMysql.php");

$usuarios = UsuarioMysql::listar();
include("header.php");
include ("sidebar.php"); 
?>


 <!-- Page Content -->
 
 <div class="container">

<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-12">
    
    <?php
    
    $per_page = 5;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else{
        $page = "";
    }

    if($page == "" || $page == 1){
        $page_1 = 0;
    }
    else{
        $page_1 = ($page * $per_page) - $per_page; //EN LA PAGINA 1 TENEMOS 5 PUBLICACIONES, -5 PARA SABER EN CUAL EMPIEZA
    }

    if(isset($_SESSION["id"]) && $usuarios[$_SESSION["id"]]->getRol() == 1){
        $post_query_count = BDMySql::getConexion()->prepare("SELECT * FROM posts"); 
    }
    //SOLO PUBLICADO PARA SUSCRIPTORES
    else{
        $post_query_count = BDMySql::getConexion()->prepare("SELECT * FROM posts WHERE estatus = 'Published'"); 
    }

    $post_query_count->execute();
    $count = $post_query_count->rowCount();

    if($count < 1){
        echo "<h1 class='text-center'>NO POST PUBLISHED</h1>";
    }
    else{

        $count = ceil($count / $per_page);

        if(isset($_SESSION["id"]) && $usuarios[$_SESSION["id"]]->getRol() == 1){
            $query = "SELECT * FROM posts LIMIT $page_1, $per_page"; 
        }
        //SOLO PUBLICADO PARA SUSCRIPTORES
        else{
            $query = "SELECT * FROM posts WHERE estatus = 'Published' LIMIT $page_1, $per_page"; 
        }

        //$query = "SELECT * FROM posts WHERE post_status = 'Published' LIMIT $page_1, $per_page"; 
                                                    //LIMIT Y 2 PARAMETROS, INDICAN POSICION Y CUANTOS
        $select_all_post_query = BDMySql::getConexion()->query($query);

        //if($_SESSION['user_role'] == 'admin' || $_SESSION['user_role'] == 'subscriber' ){
          $contador = 0;
          foreach ($select_all_post_query as $row) {
            $post_id = $row['id_post'];
            $post_title = $row['nombre'];
            $post_date = $row['fecha'];
            $post_image = $row['imagen'];
            $post_content = substr(strip_tags($row['contenido']),0,100); //de 0 caracteres a 100
            $post_status = $row['estatus'];
            $usuario = BDMySql::getConexion()->query("SELECT nombre FROM usuario WHERE idusuario = '{$row['id_usuario']}'");
            $resultado = $usuario->fetch();
            $usuario = $resultado['nombre'];
        ?>
                    <!-- <h1><?php echo $count ?></h1> -->
                    <h2>
                        <!-- MODIFICACION EN .HTACCESS PARA LOS LINKS-->
                        <!-- <a href="post.php?p_id=<?php //echo $post_id ?>"><?php //echo $post_title ?></a> -->
                        <a href="mostrarDatos/post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                    </h2>
                    <p class="lead">
                        <!-- <a href="author_posts.php?author=<?php //echo $post_user ?>&p_id=<?php //echo $the_post_id ?>"><?php //echo $post_user ?> -->
                        <!-- MODIFICACION EN .HTACCESS PARA LOS LINKS-->
                        by <a href="#<?php echo $usuario ?>/<?php echo $post_id ?>"><?php echo $usuario ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                    <hr>
                    <a href="mostrarDatos/post.php?p_id=<?php echo $post_id ?>">
                        <img class="img-responsive" src="image/<?php echo $post_image ?>" alt="">
                    </a>
                    <hr>
                    
                    <p><?php echo $post_content ?></p>
                    <a class="btn btn-primary" href="mostrarDatos/post.php?p_id=<?php echo $post_id ?>">Read More<span class="glyphicon glyphicon-chevron-right">
                                                                                                    </span>
                    </a>

                    <hr>
        <?php     
           }
           
        //}
        //else{
        //    echo "<h1 class='text-center'>PUBLICATIONS AVAILABLE ONLY FOR USERS</h1>";
        //}
    }?>

        
    </div>

    <!-- Blog Sidebar Widgets Column -->
</div>

<hr>

<ul class="pager">    
<?php

    for($i = 1; $i <= $count; $i++){
        if($i == $page){
            echo "<li><a class='active_link' href='/ProyectoFP/index.php?page={$i}'>{$i}</a></li>"; 
        }
        else{
            echo "<li><a href='/ProyectoFP/index.php?page={$i}'>{$i}</a></li>";
        }
    }

?>
</ul>
<?php include "footer.php"; ?>
</body>
</html>