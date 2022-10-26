<?php

class User
{
	private $conn;

    public $id;
    public $name;
    public $lastname;
    public $email;
    public $password;
    public $state;
    public $created_at;

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

	public function Listar()
	{
		try
		{
			$result = array();

			$result = $this->conn->query("SELECT user.*, rol.rol as rol_name FROM user INNER JOIN rol ON rol.id=user.rol_id");
			

			return $result->fetch_all(MYSQLI_ASSOC);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function Registrar(user $conn)
	{
		try
		{
		}
	}
}




?>