<?php



if(isset($_GET['action']))
	$action=$_GET['action'];
else
	$action='select';

switch ($action)
{
    case 'select':
        $obj = new model_companies($config);
        $data = $obj->loadCompaniesData();
        
        ob_start();
            include ('../application/views/companies/select.php');
            $content=ob_get_contents();
        ob_end_clean();
        break;
    case 'insert':
        if ($_POST)
        {
            $obj = new model_companies($config);
            $obj->insert('companies', $_POST, $_POST['idcompany']);
            header('Location: /companies.php');
        }
        else
        {
            ob_start();
            include('../application/views/companies/insert.php');
            $content=ob_get_contents();
            ob_end_clean();
        }
        break;
    case 'update':
        if ($_POST)
        {
            $obj = new model_companies($config);
            $obj->update('companies', $_POST, $_GET['id']);
            header('Location: /companies.php');
        }
        else
        {
            $obj = new model_companies($config);
            $data=$obj->loadCompany($_GET['id']);
                include('../application/views/companies/insert.php');
                $content=ob_get_contents();
            ob_end_clean();
        }
        break;
    case 'delete':
        if($_POST)
        {
            if($_POST['delete']=="Yes")
            {
                $obj = new model_companies($config);
                $obj->deleteCompany($_GET['id']);			
            }
            header('Location: /companies.php');
        }
        else
        {	
            $obj = new model_companies($config);
            $data=$obj->loadCompany($_GET['id']);
            ob_start();
                include('../application/views/companies/delete.php');
                $content=ob_get_contents();
            ob_end_clean();
        }
        break;
    
    default:
        break;
}

// include('../views/layouts/layout.phtml');
        