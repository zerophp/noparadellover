<?php

class bootstrap
{
	var $config;
	var $request;
	
	public function __construct($config, $request)
	{
		$this->request = $request;
		$this->config = $config;
	}
	
	public function run()
	{
		$this->initSession();
		$this->initRegister();
		$this->initAcl();
		
		$controller = 'controllers_'.$this->request['controller'];
		$obj = new $controller($this->config,$this->request);
		$content = $obj->{$this->request['action']}();
		$layout = $obj->getLayout();
		$this->renderLayout($layout,$content);		
		
	}
	
	public function renderLayout($layout, $content)
	{
		include('../application/views/layouts/'.
				$layout.
				'.phtml');
	}
	
	
	protected function initAcl()
	{
		$publicControllers = array ('index', 'author');
		if(isset($_SESSION['iduser']))
		{		
			$acl = new model_acl($this->config['database']);
			$data = $acl->getAcl($_SESSION['iduser'], $this->request);
			if(!isset($data))
				header('Location: /author/login');
		}
		elseif (!in_array($this->request['controller'], $publicControllers))
		{
			header('Location: /author/login');
		} 				
	}
	
	public function initSession()
	{
		session_start();
	}
	
	public function initRegister()
	{
		$_SESSION['register']='';
	}
	
	public function initDbR()
	{
		
		if(!isset($_SESSION['register']['link']) ||
		$_SESSION['register']['link']=='')
		{
			$link=mysqli_connect($this->config['databaseR']['host'],
					$this->config['databaseR']['user'],
					$this->config['databaseR']['password']
			);
			$_SESSION['register']['linkR']=$link;
		}
		else
		{
			$_SESSION['register']['linkR']= 
				new model_mappers_db($this->config['databaseR']);
		}
		
	}
	
	public function initDbW()
	{
		if(!isset($_SESSION['register']['link']) ||
		$_SESSION['register']['link']=='')
		{
			$link=mysqli_connect($this->config['databaseW']['host'],
					$this->config['databaseW']['user'],
					$this->config['databaseW']['password']
			);
			$_SESSION['register']['linkW']=$link;
		}
		else
		{
			$_SESSION['register']['linkW']= 
				new model_mappers_db($this->config['databaseW']);
		}
	}
	
	
	

}