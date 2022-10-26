<?php

class Seguridad
{
    private $conn;


	public function __CONSTRUCT()
	{
		try
		{
			$this->conn = Database::Conectar();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

    public function Autenticar($email,$password)
	{
		try
		{
            $pwd=md5($password);
        
			$result = $this->conn->query("SELECT * FROM user WHERE email='$email' and password='$pwd'");
        
          
            $row=$result->fetch_assoc();
           
            if(!$row){
                return null;
            }

    

			return $row['rol_id'];
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


}