<?php


class frontview
{
	var $config;
	var $layout; 
	
	public function __construct($config,$request)
	{
		$this->config = $config;
		$this->request = $request;
		$this->setLayout($this->config['layouts']['default']);
	}
	
	public function setLayout($layout)
	{
		$this->layout = $layout;
	}
	
	public function getLayout()
	{
		return $this->layout;
	}
}