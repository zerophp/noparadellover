<?php


class model_general_views
{
	public static function renderView($data, $request)
	{
		ob_start();
			include ('../application/views/'.
						$request['controller'].
						'/'.
						$request['action'].'.phtml');
			$content=ob_get_contents();
		ob_end_clean();
		return $content;
	}
}