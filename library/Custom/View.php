<?php

namespace HSO\Custom;

use Philo\Blade\Blade;

class  View{
	public static function render($view_name = ""){
		if(empty($view_name))
			return;

		$views = HSO_PATH . '/views';
		$cache = HSO_PATH . '/cache';

		$blade = new Blade($views, $cache);

		echo $blade->view()->make($view_name)->render();
	}
}