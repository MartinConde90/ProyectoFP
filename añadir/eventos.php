<?php
require_once(dirname(__FILE__)."/../evento/EventosMysql.php");

$mensaje = "";
if(session_status() !== PHP_SESSION_ACTIVE) 
{ 
    session_start(); 
} 

if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["nombre"])&& isset($_POST["fecha_ini"])&& isset($_POST["fecha_fin"]) ) {
    $nombre = $_POST["nombre"];
    $fecha_ini = $_POST["fecha_ini"];
    $fecha_fin = $_POST["fecha_fin"]!=""?new DateTime($_POST["fecha_fin"]):null;

    $_SESSION["sistemaGuardado"] = $_POST['sistemaguardar'];
            $evento = new EventosMysql($nombre,new DateTime($fecha_ini),$fecha_fin,$_SESSION["id"]);
            $evento->guardar($evento);
     
    header("location:../mostrarDatos/agenda.php");

    
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
                        <h2>Creación eventos</h2>
                            <form action="" method="post">
                                <input class="inpt" type="text" name="nombre" id="nombre" required placeholder="Nombre del evento">
                                <input class="inpt" type="datetime-local" name="fecha_ini" id="fecha_ini" required placeholder="Fecha Inicio">
                                <input class="inpt" type="datetime-local" name="fecha_fin" id="fecha_fin" placeholder="Fecha Fin">
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