<?php


class controllers_author extends frontview
{
	public function login()
	{
		
		if($_POST)
		{
			$obj = new model_users($this->config);
			$usuario=$obj->getCredential($_POST['email'], $_POST['password']);
			
			if($usuario['iduser']=='')
				header('Location: / ');
			
			session_start();
			//echo session_id();
			$_SESSION['username']=$usuario['username'];
			$_SESSION['iduser']=$usuario['iduser'];
			
			header('Location: /users ');
				
			
		}
		else
		{
			$this->setLayout('login');
			$content = model_general_views::renderView(array(), $this->request);
			return $content;
		}
	}
	
	public function logout()
	{
		session_start();
		session_destroy();
		
		header('Location: /');
	}
	
}
