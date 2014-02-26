<?php



// Check the variable action
if(isset($_GET['action']))
	$action=$_GET['action'];
else
	$action='select';

switch ($action)
{
	case 'update':
		if ($_POST)
		{
			$obj = new model_projects($config);
			$obj->updateProject('projects', $_POST, $_POST['idproject'],$config['database']);
			header('Location: /projects.php');
		}
		else
		{
			$obj = new model_projects($config);
			$project = $obj->getProject($_GET['id'], $config['database']);
			
			$companies = getAllRows($config['database'], 'companies');
			$projects_type = getAllRows($config['database'], 'projects_type');

			ob_start();
				include('../application/views/projects/insert.php');
				$content=ob_get_contents();
			ob_end_clean();
		}
		break;

	case 'insert':
		if ($_POST)
		{			
			$obj = new model_projects($config);
			$obj->insertProject('projects', $_POST, $_POST['idproject'],$config['database']);
			header('Location: /projects.php');
		}
		else
		{
			$objCompanies = new model_companies($config);			
			$companies = $objCompanies->getCompanies('companies');
			
			$objProjects = new model_projects($config);
			$projects_type = $objProjects->getProjectsType();
			
 			ob_start();
				include('../application/views/projects/insert.php');
				$content = ob_get_contents();
			ob_end_clean();
		}
		break;

	case 'delete':
		if($_POST)
		{
			if($_POST['borrar']=="Si")
			{
				$obj = new model_projects($config);
				$obj->deleteProject($_POST['id']);
			}
			header('Location: /projects.php');
		}
		else
		{
			$obj = new model_projects($config);
			$project = $obj->getProject($_GET['id']);
			ob_start();
				include('../application/views/projects/delete.php');
				$content=ob_get_contents();
			ob_end_clean();
		}
		break;

	case 'select':
		$obj = new model_projects($config);
		$filas = $obj->getProjects();
	
		ob_start();
			include ('../application/views/projects/select.phtml');
			$content=ob_get_contents();
		ob_end_clean();
		break;

	default:
		break;
}
// include('../views/layouts/layout.phtml');




