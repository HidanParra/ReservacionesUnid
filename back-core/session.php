<?php 
function create_session($user,$type){		
	session_start();
	$_SESSION['US']= $user;
	$_SESSION['TYPE']= $type[0]["rol_id"];
	$_SESSION['USR_ID']= $type[0]["usr_id"];
	$cookie_name = "lau";
	$cookie_value = $type[0]["usr_id"];
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");	
	return;
}
function delete_session(){
	$_COOKIE['lau']=0;
	setcookie("lau", 0, time()-1,"/");
	session_start();	
	session_destroy();		
	
	return;

}
function get_data_session(){
		
	return $_SESSION;
}
 ?>
