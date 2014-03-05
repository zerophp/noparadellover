<?php

class model_projects_mappers_db_projects extends model_mappers_db
{

	public function getProjects()
	{
		$sql="SELECT * FROM projects";
			
		$result=mysqli_query($this->linkR, $sql);
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

		$result=mysqli_query($this->linkR, $sql);
		while ($row=mysqli_fetch_assoc($result))
		{
			$rows[]=$row;
		}
		return $rows[0];
	}
	
	public function deleteProject($idproject)
	{
		$sql = "DELETE FROM projects WHERE idproject = ".$idproject;
	
		$result=mysqli_query($this->linkW, $sql);
		return $result;
	}
	
	public function updateProject($idproject, $data)
	{
		$sql = "UPDATE projects SET";
		foreach($data as $key => $value)
		{
			$sql.=$key."='".$value."',";
		}

		$result=mysqli_query($this->linkW, $sql);
		return $result;
	}
}