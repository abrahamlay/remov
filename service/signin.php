<?php
	header('Access-Control-Allow-Origin: *');
	$connection = mysql_connect("localhost", "root", ""); 
	$db = mysql_select_db("remov", $connection); 
	$isiusername=$_POST['username']; 
	$isipassword= $_POST['password']; 

	
		$result = mysql_query("SELECT * FROM member WHERE username='$isiusername' AND password='$isipassword'");
		if($result === FALSE) {
    die(mysql_error()); // TODO: better error handling
}else{
	echo "ok";
}
	mysql_close ($connection); 
?>