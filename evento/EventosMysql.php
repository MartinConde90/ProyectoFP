<?php
require_once(dirname(__FILE__)."/../evento/Evento.php");
require_once(dirname(__FILE__)."/../conexion/BDMySql.php");
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

class EventosMysql extends Evento{

    function guardar(){
        $stm = BDMySql::getConexion()->prepare("INSERT into posts (nombre, estatus, imagen,contenido,fecha, post_user) values(:nombre,:estatus,:imagen,:contenido,:fecha,:post_user)"); 
                $stm->execute([":nombre"=>$this->getTitulo(),":estatus"=>$this->getStatus(),":imagen"=>$this->getImagen(),":contenido"=>$this->getContenido(),":fecha"=>$this->getFecha(),":post_user"=>$this->getNombreUsuario()]);
    }

    static function listar(){
        $stm = BDMySql::getConexion()->prepare("SELECT * from posts"); 
        $stm->execute();
        $posts = [];
        while (($post = $stm->fetch())!=null) {
            $posts[] =  new EventosMysql($post["nombre"],$post["estatus"],$post["imagen"],$post["contenido"],$post["fecha"],$post["post_user"],$post["id_post"]);
        }
        return $posts;
    }

    function modificar(){
        $stm = BDMySql::getConexion()->prepare("UPDATE posts SET nombre = :nombre , estatus = :estatus, imagen = :imagen, contenido = :contenido where id_post=:id");
        $stm->execute([":nombre"=>$this->getTitulo(),":estatus"=>$this->getStatus(),":imagen"=>$this->getImagen(),":contenido"=>$this->getContenido(),":id"=>$this->getId_post()]);
    }

    static function eliminar($id){
        $stm = BDMySql::getConexion()->prepare("DELETE from posts where id_post = :id ");
        $stm->execute([":id"=>$id]);
    }

}