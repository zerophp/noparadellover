<?php 

interface model_dutiesInterface
{
	public function getDuties();
	public function getDuty($idduty);
	public function insertDuty($tablename,$data,$id,$config);
	public function updateDuty($tablename, $data, $id, $config);
	public function deleteDuty($idduty, $config);

}

