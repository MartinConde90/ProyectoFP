<?php
require_once(dirname(__FILE__)."/../evento/EventosMysql.php");
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start(); 
} 
if(!isset($_SESSION["id"])){
    header("location:login.php");
}


$id = $_GET['id'];
$nombre="";
$fecha_ini="";
$fecha_fin="";

$eventoAmodif;
$eventos = EventosMysql::listar();

foreach ($eventos as $key => $evento){
    if($evento->getId_evento() == $id){
        $eventoAmodif = $evento;
    }
}

if ($_SERVER["REQUEST_METHOD"]== "POST"){

    if(!$_POST["nombre"]==""){
        $nombre = ($_POST["nombre"]);
    }
    if(!$_POST["fecha_ini"]==""){
        $fecha_ini = new DateTime($_POST["fecha_ini"]);
    }else{
        $fecha_ini = $eventoAmodif->getFecha_inicio();
    }
    if(!$_POST["fecha_fin"]==""){
        $fecha_fin = new DateTime($_POST["fecha_fin"]);
        $intervalo = $fecha_ini->diff($fecha_fin);
        if($intervalo->invert==1){
            $fecha_fin= null;
        }   
    }else{
        $fecha_fin = $eventoAmodif->getFecha_fin();

        $intervalo = $fecha_ini->diff($fecha_fin);
        if($intervalo->invert==1){
            $fecha_fin= null;
        }
    }
    
       
    $evento = new EventosMysql($nombre,$fecha_ini,$fecha_fin,$_SESSION["id"],$id);
    $evento->modificar($evento);


            header("location:../mostrarDatos/agenda.php");
}
include("../header.php")
?>

<section class="intro">
  <div class="bg-image h-100" style="background-image: url(https://mdbootstrap.com/img/Photos/new-templates/glassmorphism-article/img7.jpg);">
    <div class="mask d-flex justify-content-center align-items-center h-100">
      <div class="container">
            <div class="card mask-custom">
                    <h2>Introduce los nuevos datos del evento</h2>
                    <form class="d-flex justify-content-center align-items-start mx-auto" action="" method="post">
                        <div class="form-group">
                            <label class="text-light" style="margin-left:10px">Nombre Evento </label>
                            <input class="inpt form-control mx-2" style="width:200px" type="text" name="nombre" id="nombre" value="<?=$eventoAmodif->getNombre();?>">
                        </div>
                        <div class="form-group">
                            <label class="text-light" style="margin-left:10px">Fecha Inicio</label>
                            <input class="inpt form-control mx-2" style="width:200px"  type="datetime-local" name="fecha_ini" id="fecha_ini" value="<?=$eventoAmodif->getFecha_inicio()->format("d-m-Y T H:i ")?>">
                        </div>
                        <div class="form-group">
                            <label class="text-light" style="margin-left:10px">Fecha Fin</label>
                            <input class="inpt form-control mx-2" style="width:200px"  type="datetime-local" name="fecha_fin" id="fecha_fin" value="<?=$eventoAmodif->getFecha_fin()->format("d-m-Y T H:i ")?>">
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