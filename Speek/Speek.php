<?php
	//beta2 start 15210-1026
	//author TRY

	defined('SYS') or define('SYS',__DIR__);
	defined('PRJ') or define('PRJ',dirname($_SERVER['SCRIPT_FILENAME']));
	defined('EXT') or define('EXT','.php');
	defined('CEXT') or define('CEXT','.class.php');
	defined('SYS_CORE') or define('SYS_CORE',SYS.'/Core/');
	defined('SYS_CONF') or define('SYS_CONF',SYS.'/Conf/');
	defined('SYS_LIB') or define('SYS_LIB',SYS.'/Lib/');
	defined('PRJ_CDIR') or define('PRJ_CDIR',PRJ.'/C/');
	defined('PRJ_MDIR') or define('PRJ_MDIR',PRJ.'/M/');
	defined('PRJ_VDIR') or define('PRJ_VDIR',PRJ.'/T/');
	defined('PRJ_VCDIR') or define('PRJ_VCDIR',PRJ.'/T_c/');
	defined('PRJ_COM') or define('PRJ_COM',PRJ.'/Com/');
	defined('PRJ_CONF') or define('PRJ_CONF',PRJ.'/Conf/');

	require SYS_LIB.'/functions.php';
	require SYS_CORE.'/Speek.class.php';
	Speek::Run();
?>
