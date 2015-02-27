<?php
class Speek{
	public static function Run(){
		spl_autoload_register('Speek::AutoLoad');
		Speek::LoadConf();
		Speek::CreateDir();
		Speek::GetCm();
		Speek::LoadFile($_GET['c'],$_GET['m']);
	}
	static function AutoLoad($c){
		include_once SYS_CORE.$c.CEXT;	
	}
	private static function CreateDir(){
		if(!file_exists(PRJ)) mkdir(PRJ);
		if(!file_exists(PRJ_CDIR)) mkdir(PRJ_CDIR);
		if(!file_exists(PRJ_MDIR)) mkdir(PRJ_MDIR);
		if(!file_exists(C('DT_V_VDIR'))) mkdir(C('DT_V_VDIR'));
		if(!file_exists(C('DT_V_VCDIR'))) mkdir(C('DT_V_VCDIR'));
		if(!file_exists(C('DT_V_VCACHE'))) mkdir(C('DT_V_VCACHE'));
		if(!file_exists(PRJ_COM)) mkdir(PRJ_COM);
		if(!file_exists(PRJ_CONF)) mkdir(PRJ_CONF);
	}
	private static function GetCm(){
		if(C('DT_URLTYPE')==1){
			$_GET['c'] = $_GET['c']?$_GET['c']:C('DT_CONTROLLER');
			$_GET['m'] = $_GET['m']?$_GET['m']:C('DT_ACTION');
		}else if(C('DT_URLTYPE')==2){
			$path = explode('/',trim($_SERVER['PATH_INFO']));
			$_GET['c'] = $path[1];
			$_GET['m'] = $path[2];
			
		}else if(C('DT_URLTYPE')==3){
			$path = explode('/',trim($_SERVER['PATH_INFO']));
			$c = $path[1];
			$m = $path[2];
			$_GET['c'] = $_GET['c']?$_GET['c']:C('DT_CONTROLLER');
			$_GET['m'] = $_GET['c']?$_GET['c']:C('DT_ACTION');
			$_GET['c'] = $c?$c:$_GET['c'];
			$_GET['m'] = $m?$m:$_GET['m'];
			
		}
	}
	private static function LoadConf(){
		if(is_file(SYS_LIB.'functions'.EXT)){
			include_once SYS_LIB.'functions'.EXT;
		}
		if(is_file(SYS_CONF.'Config'.EXT))
			is_file(PRJ_CONF.'Config'.EXT)?C(array_merge(include_once(SYS_CONF.'Config'.EXT),include_once(PRJ_CONF.'Config'.EXT))):C(include_once(SYS_CONF.'Config'.EXT));
		$smarty = SYS_LIB.'Tpl/Smarty'.CEXT;
		if(!is_file($smarty)){
			echo '模板核心库不存在！';
			exit();
		}else{
			include_once $smarty;
		}
	}
	private static function LoadFile($a,$b){
		$c = ucwords($a);
		$m = ucwords($b);
		$cfile = PRJ_CDIR.$c.C('DT_C_NAME').CEXT;
		if(!is_file($cfile)){
			echo $c.' 控制器不存在！';
			exit();
		}else{
			include_once $cfile;
		}
		$class = $c.C('DT_C_NAME');
		if(!class_exists($class)){
			echo '控制器未定义！';
			exit();
		}
		$pram = new $class;
		if(!method_exists($pram,$m)){
			echo '接口未定义！';
			exit();
		}
		$pram->$m();
	}
}
?>
