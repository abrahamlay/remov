<?php
header('Access-Control-Allow-Origin: *');

	$connection = mysql_connect("localhost", "root", ""); 
	$db = mysql_select_db("remov", $connection); 
	
	$username=$_REQUEST['username'];
					
$query = "SELECT * FROM member where username = '$username'";
$hasil = mysql_query($query);

while($row = mysql_fetch_array($hasil)){
	
		$data['ID_member']=$row['ID_member'];
		$data['Nama']=$row['Nama'];
		$data['username']=$row['username'];
		$data['Alamat']=$row['Alamat'];
		$data['Tanggal_Daftar']=$row['Tanggal_Daftar'];
		$data['Jenis_Kelamin']=$row['Jenis_Kelamin'];
	//$a++;
}

$json_string = json_encode($data);
echo $json_string;
	
?>