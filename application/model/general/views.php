<?php


class model_general_views
{
	public static function renderView($data, $action)
	{
		ob_start();
			include ('../application/views/users/'.$action.'.phtml');
			$content=ob_get_contents();
		ob_end_clean();
		return $content;
	}
}