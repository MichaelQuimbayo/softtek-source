<?php
 require_once 'model/seguridad.php';

class SalirController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        
    }

    //Llamado plantilla principal
    public function Index(){

        session_start();

        session_destroy();

        header('Location: index.php');

    }


}


?>