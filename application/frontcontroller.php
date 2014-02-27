<?php

class frontcontroller
{
	var $config;
	var $request;
	
	public function __construct($configfile)
	{
		$this->setConfig($configfile);
		$this->getRequest();
		$bootstrap = new bootstrap($this->config, $this->request);
		$bootstrap->run();
	}
	
	
	public function getRequest()
	{
		$request = model_general_request::getRequest();
		$this->request = $request;
	}
	
	public function setConfig($configfile)
	{
		$this->config = parse_ini_file($configfile, TRUE);
	}
	

}