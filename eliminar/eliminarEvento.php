<?php
require_once(dirname(__FILE__)."/../evento/EventosMysql.php");

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start(); 
} 


$id = $_GET['id'];

$eventos = EventosMysql::listar();

foreach ($eventos as $key => $evento){
    if($evento->getId_post() == $id){
        EventosMysql::eliminar($id);
    }
}
header("location:/ProyectoFP/mostrarDatos/listarPosts.php");
    exit();

