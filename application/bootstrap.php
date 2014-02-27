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
	
	
	

}