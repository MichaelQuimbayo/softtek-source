<?php
 require_once 'model/seguridad.php';

class LoginController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new Seguridad();
    }

    //Llamado plantilla principal
    public function Index(){

        require_once 'view/login.php';

    }

 

    //Método que autentica al usuario
    public function Autenticar(){
        session_start();

        //Captura de los datos del formulario (vista).
        $email= $_REQUEST['email'];
        $password = $_REQUEST['password'];
 

        //Registro al modelo proveedor.
        $rol_id=$this->model->Autenticar($email,$password);
      
     

        if($rol_id){

            $_SESSION["rol_id"]=$rol_id;

            if($rol_id==1){
                header('Location: index.php?c=user');
            }else{
                header('Location: index.php?c=dashboard');
            }
           
        }else{
            header('Location: index.php?c=login');
        }

      
    }
 
}


?>