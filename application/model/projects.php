<?php

class model_projects implements model_projectsInterface
{
	public function __construct($config)
	{
		$txt = 'model_projects_mappers_'.$config['mapper']['projects'].'_projects';
		$this->mapper = new $txt($config['database']);
	}
	
	public function getProjects()
	{
		return $this->mapper->getProjects();				
	}
	
	public function getProject($idProject)
	{
		return $this->mapper->getProject($idProject);
	}
	
	public function deleteProject($idProject, $config)
	{
		return $this->mapper->deleteProject($idProject, $config);
	}	

	public function insertProject($tablename,$data,$id,$config)
	{
		return $this->mapper->insert($tablename, $data, $id, $config);
	}
	
	public function updateProject($tablename, $data, $id, $config)
	{
		return $this->mapper->update($tablename, $data, $id, $config);
	}	
	
	public function getProjectsType()
	{
		return $this->mapper->selectAll('project_types');
	}
	
}