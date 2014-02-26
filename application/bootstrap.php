<?php

class bootstrap
{
	public function run($request, $configfile)
	{
		$config = parse_ini_file($configfile, TRUE);
		
		$controller = 'controllers_'.$request['controller'];
		$obj = new $controller($config,$request);		
		$content = $obj->$request['action']();
		
		include('../application/views/layouts/layout.phtml');
	}

}