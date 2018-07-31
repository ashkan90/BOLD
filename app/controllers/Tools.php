<?php
/**
 * 
 */
class Tools extends Controller
{
	
	function __construct($controller, $action)
	{
		parent::__construct($controller, $action);
	}

	public function indexAction(){
		$this->view->render('tools/index');
	}

	public function firstAction(){
		$this->view->render('tools/firstAction');
	}

	public function secondAction(){
		$this->view->render('tools/secondAction');
	}

	public function thirdAction(){
		$this->view->render('tools/thirdAction');
	}


}