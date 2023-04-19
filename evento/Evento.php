<?php

abstract class Evento{

    public function __construct(
        public $titulo=null,
        public $status=null,
        public $imagen=null,
        public $contenido=null,
        public $fecha=null,
        public $nombreUsuario=null,
        public $id_post=null
    )
    {
        /*if($this->id_evento == null){
            throw new Exception("El evento necesita un usuario asignado");
        }*/
        
    }

        public function getId_post()
        {
            return $this->id_post;
        }
 
        public function setId_post($id_post)
        {
            $this->id_post = $id_post;
            return $this;
        }
 
        public function getTitulo()
        {
            return $this->titulo;
        }

        public function setTitulo($titulo)
        {
            $this->titulo = $titulo;
            return $this;
        }
 
        public function getStatus()
        {
                return $this->status;
        }

        public function setStatus($status)
        {
                $this->status = $status;

                return $this;
        }

        public function getImagen()
        {
                return $this->imagen;
        }

        public function setImagen($imagen)
        {
                $this->imagen = $imagen;

                return $this;
        }

        public function getContenido()
        {
                return $this->contenido;
        }

        public function setContenido($contenido)
        {
                $this->contenido = $contenido;

                return $this;
        }

        public function getFecha()
        {
                return $this->fecha;
        }

        public function setFecha($fecha)
        {
                $this->fecha = $fecha;

                return $this;
        }

        public function getNombreUsuario()
        {
                return $this->nombreUsuario;
        }

        public function setNombreUsuario($nombreUsuario)
        {
                $this->nombreUsuario = $nombreUsuario;

                return $this;
        }
}