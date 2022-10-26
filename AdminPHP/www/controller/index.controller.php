<?php
 require_once 'model/seguridad.php';

class IndexController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new Seguridad();
    }

    //Llamado plantilla principal
    public function Index(){

        require_once 'view/index.php';

    }

 

 
}


?>