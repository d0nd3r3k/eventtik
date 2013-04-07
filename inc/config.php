<?php
define("BASE_DIR", dirname(dirname(__FILE__)));

define('ONLINE',false);

if (ONLINE){
	/// ONLINE ///
	define("BASE_URL","http://www.eventtik.com");
	define("DB_SERVER","localhost");
	define("DB_USER","root");
	define("DB_PASS","");
	define("DB_NAME","eventtik_db");
	//////////////
}else{
	/// LOCAL ///
	define("BASE_URL","http://localhost/eventik");
	define("DB_SERVER","localhost");
	define("DB_USER","root");
	define("DB_PASS","root");
	define("DB_NAME","eventtik_db");
	/////////////
}

?>


