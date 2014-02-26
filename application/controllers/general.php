<?php


class controllers_general
{
	var $config; 
	
	public function __construct($config,$request)
	{
		$this->config = $config;
		$this->request = $request;
	}
}