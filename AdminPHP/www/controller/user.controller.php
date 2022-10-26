<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/user.php';

class UserController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new user();
    }

    //Llamado plantilla principal
    public function Index(){
        session_start();

        if($_SESSION && isset($_SESSION["rol_id"])){

            if($_SESSION["rol_id"]==1){
                require_once 'view/user.php';
            }else{
                header('Location: index.php?c=dashboard');
            }
      
        }else{
            header('Location: index.php');
        }

      
       
    }

    //Llamado a la vista user
    public function Crud(){
        $user = new user();

        //Se obtienen los datos del user.
        if(isset($_REQUEST['id'])){
            $user = $this->model->Obtener($_REQUEST['id']);
        }

        //Llamado de las vistas.
        require_once 'view/user/user.php';
      
  }


}


?>