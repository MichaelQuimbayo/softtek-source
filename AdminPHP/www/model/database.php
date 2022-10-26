<?php

class Database
{


    public static function Conectar()
    {
        $conn = mysqli_connect('db', 'root', 'test', "rolAdmin");

        if (mysqli_connect_errno()){
        printf('Fallo la conexion');
        }
        
        return $conn;
    }
}



?>