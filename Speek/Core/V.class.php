<?php
class V extends Smarty{
	function __construct(){
		$this->caching = C('DT_CACHE');
		$this->template_dir = C('DT_V_VDIR');
		$this->compile_dir = C('DT_V_VCDIR');
		$this->cache_dir = C('DT_V_VCACHE');
		$this->left_delimiter = C('DT_V_LEFT');
		$this->right_delimiter = C('DT_V_RIGHT');
	}
}
?>
