<?php
class model_db
{
	public function __construct($config)
	{
		$this->config = $config;
		$this->link = $this->connectDB();
		$this->selectDB();
		return $this->link;
	}
	
	protected function connectDB()
	{
		// Conectar a la DBMS
		$link=mysqli_connect($this->config['host'],
				$this->config['user'],
				$this->config['password']
		);
		return $link;
	}
	
	function selectDB()
	{
		mysqli_select_db($this->link, $this->config['db']);
		mysqli_set_charset ($this->link, 'utf8');
		mysqli_query($this->link, "SET NAMES utf8");
		return;
	}
}