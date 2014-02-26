<?php

class model_duties implements model_dutiesInterface
{
	public function __construct($config)
	{
		$txt = 'model_duties_mappers_'.$config['mapper']['duties'].'_duties';
		$this->mapper = new $txt($config['database']);
	}
	
	public function getDuties()
	{
		return $this->mapper->getDuties();				
	}
	
	public function getDuty($idduty)
	{
		return $this->mapper->getDuty($idduty);
	}
	public function deleteDuty($idduty, $config)
	{
		return $this->mapper->deleteDuty($idduty, $config);
	}	

	public function insertDuty($tablename,$data,$id,$config)
	{
			
		return $this->mapper->insert($tablename, $data, $id, $config);
	}
	
	public function updateDuty($tablename, $data, $id, $config)
	{
		return $this->mapper->update($tablename, $data, $id, $config);
	}	
	
}