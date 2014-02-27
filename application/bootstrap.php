<?php

class bootstrap
{
	var $config;
	
	public function run($request, $configfile)
	{
		$this->config = parse_ini_file($configfile, TRUE);
		
		$controller = 'controllers_'.$request['controller'];
		$obj = new $controller($this->config,$request);		
		$content = $obj->$request['action']();
		$layout = $obj->getLayout();
		$this->renderLayout($layout,$content);		
		
	}
	
	public function renderLayout($layout, $content)
	{
// 		$this->config['layouts']['default'];
		include('../application/views/layouts/'.
				$layout.
				'.phtml');
	}

}