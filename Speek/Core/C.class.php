<?php
class C{
	protected $view;
	function assign($key,$val){
		$this->view->assign($key,$val);
	}
	function display(){
		$this->view->display();
	}
}
?>
