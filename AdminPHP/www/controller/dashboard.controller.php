<?php
 require_once 'model/seguridad.php';

class DashboardController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new Seguridad();
    }

    //Llamado plantilla principal
    public function Index(){

        session_start();

        if($_SESSION && isset($_SESSION["rol_id"])){
            require_once 'view/dashboard.php';
        }else{
            header('Location: index.php');
        }

      

    }

 

 
}


?>