<?php 


class Controller {

	public function views ($views, $data = [])
	{
		require_once '../app/views/'. $views .'.php';
	}

	public function models ($models)
	{
		require_once '../app/models/'. $models . '.php';
		return new $models;
	}

	public function parseURL () 
	{
		if ( isset($_GET['url']) ){
			$url = rtrim($_GET['url'],'/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}


}

