<?php

/**
 * 
 */
class Core
{
	public function  Run(){
		$url = '/';
		if(isset($_GET['url'])){
			$url.=$_GET['url'];
		}
		
		$param = array();
		
		if(!empty($url) && $url !='/'){
				
			$url = explode('/', $url);
			array_shift($url);

			$currentController = $url[0].'Controller';

			array_shift($url);

			if(isset($url[0]) && !empty($url[0])){
				$currentAction = $url[0];
				array_shift($url);
			}else{
				$currentAction = 'index';
			}
			
			if(count($url)>0){
				$param = $url;
				
			}

		}else{
			
			$currentController = 'homeController';
			$currentAction = 'index';

		}
		
		if(!file('controllers/'.$currentController.'.php')||!method_exists($currentController, $currentAction)){

			$currentController = 'homeController';
			$currentAction = 'index';
			
		}
		
		$c = new $currentController();

		call_user_func_array(array($c, $currentAction), $param);
	}
}




?>