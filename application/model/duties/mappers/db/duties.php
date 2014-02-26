<?php

class model_duties_mappers_db_duties extends model_mappers_db
{
	public $link;
	public $config;
	
	public function __construct($config)
	{
		$this->config = $config;
		$this->link = parent::__construct($config);		
	}
	
	public function getDuties()
	{
		$sql="SELECT * FROM duties";			
		$result=mysqli_query($this->link, $sql);
		while ($row=mysqli_fetch_assoc($result))
		{
			$rows[]=$row;
		}
		return $rows;
	}
	
	public function getDuty($idduty)
	{		
		$sql="SELECT * FROM duties WHERE duties.idduty = ".$idduty;
			$result=mysqli_query($this->link, $sql);
		while ($row=mysqli_fetch_assoc($result))
		{
			$rows[]=$row;
		}	
		return $rows[0];
	}
	
	public function deleteDuty($idduty)
	{		
		$sql = "DELETE FROM duties WHERE idduty = ".$idduty;
	
		$result=mysqli_query($this->link, $sql);
		return $result;
	}
		
	public function updateDuty($idduty, $data)
	{
		$sql = "UPDATE duties SET";
		foreach($data as $key => $value)
		{
			$sql.=$key."='".$value."',";
		}				
		$result=mysqli_query($this->link, $sql);
		return $result;
	}
}