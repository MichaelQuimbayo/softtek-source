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

	public function Obtener($idProducto)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM producto WHERE idProducto = ?");
			$stm->execute(array($idProducto));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idProducto)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM producto WHERE idProducto = ?");

			$stm->execute(array($idProducto));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE producto SET
						nomprod          = ?,
						precioU        = ?,
            descrip        = ?
				    WHERE idProducto = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nomprod,
                        $data->precioU,
                        $data->descrip,
                        $data->idProducto
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(producto $data)
	{
		try
		{
		$sql = "INSERT INTO producto (idProducto,nit,nomprod,precioU,descrip)
		        VALUES (?, ?, ?, ?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->idProducto,
                    $data->nit,
                    $data->nomprod,
                    $data->precioU,
                    $data->descrip
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}




?>