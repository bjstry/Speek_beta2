<?php
class C{
	protected $view = null;
	//protected $model = null;
	public function __construct(){
		$this->view = new V();
	}
	protected function assign($a=null,$b=null){
		if(is_array($a)){
			if($b==null){
				//echo 'ok';
				$this->view->assign($a);
			}else{
				echo '参数非法!';
				exit();
			}
		}else{
			if($b==null){
				echo '参数非法!';
			}else{
				//echo 'ok2';
				$this->view->assign($a,$b);
			}
		}
	}
	protected function display($a=null,$b=null,$c=null){
		$type = empty($a)?1:0;
		if($type == 1){
			$err = is_file(C('DT_V_VDIR').C('DT_THEME').'/'.$_GET['c'].$_GET['m'].C('DT_V_EXT'))?$this->view->display(C('DT_V_VDIR').C('DT_THEME').'/'.$_GET['c'].$_GET['m'].C('DT_V_EXT'),$b,$c):1;
			if($err==1){
				echo C('DT_V_VDIR').C('DT_THEME').'/'.$_GET['c'].$_GET['m'].C('DT_V_EXT').'- 模板文件不存在!';
				exit();
			}
		}else{
			$err = is_file(C('DT_V_VDIR').C('DT_THEME').'/'.$a.C('DT_V_EXT'))?$this->view->display(C('DT_V_VDIR').C('DT_THEME').'/'.$a.C('DT_V_EXT'),$b,$c):1;
			if($err==1){
				echo C('DT_V_VDIR').C('DT_THEME').'/'.$a.C('DT_V_EXT').'- 模板文件不存在!';
				exit();
			}
		}
	}
}
?>
