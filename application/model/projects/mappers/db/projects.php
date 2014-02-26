<?php

class model_projects_mappers_db_projects extends model_mappers_db
{
	public $link;
	public $config;
	
	public function __construct($config)
	{
		$this->config = $config;
		$this->link = parent::__construct($config);		
	}
	
	public function getProjects()
	{
		$sql="SELECT * FROM projects";
			
		$result=mysqli_query($this->link, $sql);
		while ($row=mysqli_fetch_assoc($result))
		{
			$rows[]=$row;
		}
		return $rows;
	}
	
	public function getProject($idproject)
	{
		$sql="SELECT * FROM projects
			  WHERE idproject = ".$idproject;

		$result=mysqli_query($this->link, $sql);
		while ($row=mysqli_fetch_assoc($result))
		{
			$rows[]=$row;
		}
		return $rows[0];
	}

	
// 	public function getPets($iduser)
// 	{
// 		$sql = "SELECT  GROUP_CONCAT(pets.name SEPARATOR '|') as pets
// 			FROM pets
// 			INNER JOIN users_has_pets ON
// 				  users_has_pets.pets_idpet = pets.idpet
// 			WHERE users_has_pets.users_iduser = ".$iduser;
	
// 		$result=mysqli_query($this->link, $sql);
// 		$row = mysqli_fetch_assoc($result);
// 		return $row['pets'];
// 	}
	
// 	public function getLanguages($iduser)
// 	{
// 		$sql = "SELECT  GROUP_CONCAT(languages.name SEPARATOR '|') as languages
// 			FROM languages
// 			INNER JOIN users_has_languages ON
// 				  users_has_languages.languages_idlanguage = languages.idlanguage
// 			WHERE users_has_languages.users_iduser = ".$iduser;
	
// 		$result=mysqli_query($this->link, $sql);
// 		$row = mysqli_fetch_assoc($result);
// 		return $row['languages'];
// 	}
	
	public function deleteProject($idproject)
	{
		$sql = "DELETE FROM projects WHERE idproject = ".$idproject;
	
		$result=mysqli_query($this->link, $sql);
		return $result;
	}
	
	public function updateProject($idproject, $data)
	{
		$sql = "UPDATE projects SET";
		foreach($data as $key => $value)
		{
			$sql.=$key."='".$value."',";
		}
// 		echo $sql;
// 		die;

		$result=mysqli_query($this->link, $sql);
		return $result;
	}
}