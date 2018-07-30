<?php
	/**
	 * 
	 */
	class Router{
		
		function __construct()
		{
			# code...
		}

		public static function route($url){
			//controllers

			$controller = (isset($url[0]) and $url[0] != '') ? ucwords($url[0]) : DEFAULT_CONTROLLER;
			$controller_name = $controller;
			array_shift($url);

			//action
			$action = (isset($url[0]) and $url[0] != '') ? $url[0] . 'Action' : 'indexAction';
			$action_name = $controller;


			//params
			$queryParams = $url;

			$dispatch = new $controller($controller_name, $action);

			if (method_exists($controller, $action)) {
				call_user_func_array([$dispatch, $action], $queryParams);
			}else {
				die('This method does not exists in the controller \"' . $controller_name . '\'');
			}

		}
	}