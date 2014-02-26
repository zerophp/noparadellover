<?php
interface model_projectsInterface
{
	public function getProjects();
	public function getProject($idproject);
	public function insertProject($tablename, $data, $id, $config);
	public function updateProject($tablename, $data, $id, $config);
	public function deleteProject($idProject, $config);
}