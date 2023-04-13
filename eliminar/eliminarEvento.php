<?php
require_once(dirname(__FILE__)."/../evento/EventosMysql.php");

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start(); 
} 


$id = $_GET['id'];

$eventos = EventosMysql::listar();

foreach ($eventos as $key => $evento){
    if($evento->getId_evento() == $id){
        EventosMysql::eliminar($id);
    }
}
header("location:../mostrarDatos/agenda.php");
    exit();

