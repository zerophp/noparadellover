<?php

class controllers_users extends controllers_general
{
	public function select()
	{
		$obj = new model_users($this->config);
		$filas = $obj->getUsers();
		$content = model_general_views::renderView(array('filas'=>$filas), $this->request['action']);
		return $content;
	}
	
	public function insert()
	{
		if ($_POST)
		{
			$obj = new model_users($this->config);
			$obj->insertUser('users', $_POST, $this->config['database']);
			header('Location: /users');
		}
		else
		{
			$content = model_general_views::renderView(array(), $this->request['action']);
			return $content;
		}
	}
	
	public function update()
	{
		if ($_POST)
		{
			$obj = new model_users($this->config);
			$obj->updateUser('users', $_POST, $_POST['iduser'],$this->config['database']);
			// TODO: Implementar cambiar imagen
			header('Location: /users');
		}
		else
		{
			$obj = new model_users($this->config);
			$usuario=$obj->getUser($this->request['params']['id'], $this->config['database']);
			$content = model_general_views::renderView(array('usuario'=>$usuario), 'insert');
			return $content;
		}
	}
	
	public function delete()
	{
		if($_POST)
		{
			if($_POST['borrar']=="Si")
			{
				$obj = new model_users($this->config);
				$obj->deleteUser($_POST['id'],$this->config['database']);
				// TODO: delete image
			}
			header('Location: /users');
		}
		else
		{
			$obj = new model_users($this->config);
			$usuario=$obj->getUser($this->request['params']['id'], $this->config['database']);
			$content = model_general_views::renderView(array('usuario'=>$usuario),$this->request['action']);
			return $content;
		}
	}
	
	public function index()
	{
		header('Location: /users/select');
	}
	
	public function error()
	{
	
	}
}


	