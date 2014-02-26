<?php


class model_general_request
{
	public static function getRequest()
	{
		$requestd = explode('/',$_SERVER['REQUEST_URI']);
		
		if(file_exists($_SERVER['DOCUMENT_ROOT'].
					   '/../application/controllers/'.
					   $requestd[1].'.php'))
			$request['controller']=$requestd[1];
		else if($requestd[1]!=='')
			$request['controller']='error';
		else 
			$request['controller']='index';
		
		if(isset($requestd[2]) && $requestd[2]!=='')
		{
			$request['action'] = $requestd[2];
			for($i=3;$i<count($requestd);$i+=2)
				{
					$request['params'][$requestd[$i]]=$requestd[$i+1];
				}
		}
		else 
			$request['action'] = 'index';
		
		
		return $request;
	}
}