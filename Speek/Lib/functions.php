<?php
function C($name=null,$value=null){
	static $_conf = array();
	if(empty($name)){
		return $_conf;
	}
	if(is_string($name)){
		if(!strpos($name,'.')){
			$name=strtolower($name);
			if(is_null($value))
				return isset($_conf[$name])?$_conf[$name]:null;
			$_conf[$name]=$vlaue;
			echo $_conf[$name];
			return;
		}
		$name = explode('.',$name);
		$name[0]=strtolower($name[0]);
		if(is_null($value))
			return isset($_conf[$name[0]][$name[1]])?$_conf[$name[0]][$name[1]]:null;
		$_conf[$name[0]][$name[1]]=$value;
		return;
	}
	if(is_array($name)){
		return $_conf = array_merge($_conf,array_change_key_case($name));
	}
	return null;
}
?>
