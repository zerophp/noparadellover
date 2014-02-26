<?php 


if(isset($_GET['action']))
	$action=$_GET['action'];
else
	$action='select';

switch ($action)
{
	
	case 'update':
		if ($_POST)
		{
			$obj = new model_duties($config);
			$obj->updateDuty('duties', $_POST, $_POST['idduty'],$config['database']);
		
			// Saltar a tabla de duties
			header('Location: /duties.php');
		}
		else
		{
			//$duty=getRow('duties','idduty',$_GET['id'], $config['database']);
			$obj = new model_duties($config);
			$duty=$obj->getDuty($_GET['id'], $config['database']);
			ob_start();
				include('../application/views/duties/insert.php');
				$content=ob_get_contents();
			ob_end_clean();
		}
		break;

	case 'insert':
		if ($_POST)
		{			
			$obj = new model_duties($config);
			$obj->insertDuty('duties', $_POST, $_POST['idduty'],$config['database']);
			header('Location: /duties.php');	
		}
		else
		{
			ob_start();
			include('../application/views/duties/insert.php');
			$content=ob_get_contents();
			ob_end_clean();
		}
		break;

	case 'delete':
		if($_POST)
		{
			if($_POST['borrar']=="Si")
			{
				$obj = new model_duties($config);
				$obj->deleteDuty($_POST['idduty'],$config['database']);				
			}
			header('Location: /duties.php');
		}
		else
		{
			$obj = new model_duties($config);
			$duty=$obj->getDuty($_GET['id'], $config['database']);
			ob_start();
			include('../application/views/duties/delete.php');
			$content=ob_get_contents();
			ob_end_clean();
		}
		break;
	
	case 'select':
		$obj = new model_duties($config);
		$filas = $obj->getDuties();		
		ob_start();
		include ('../application/views/duties/select.phtml');
		$content=ob_get_contents();
		ob_end_clean();
		break;

	default:
		break;
}

// Include Layuout
// include('../views/layouts/layout.phtml');





