<?php
	header('Access-Control-Allow-Origin: *');
	$connection = mysql_connect("localhost", "root", ""); 
	$db = mysql_select_db("remov", $connection); 
	$username=$_POST['username1']; 
	$email=$_POST['email1'];
	$password= sha1($_POST['password1']); 
	$nama_lengkap=$_POST['nama_lengkap1'];
	$jenis_kelamin=$_POST['jenis_kelamin1'];
	$alamat=$_POST['alamat1'];
	$avatar=$_POST['avatar1'];
	$tanggal_daftar	= date("Y/m/d");

	$email = filter_var($email, FILTER_SANITIZE_EMAIL); 
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo "Email Tidak Valid";
	}else{
		$result = mysql_query("SELECT * FROM member WHERE username='$username'");
		$data = mysql_num_rows($result);
		if(($data)==0){
			$query = mysql_query("insert into member(username, email, password,nama_lengkap,jenis_kelamin,alamat,avatar,tanggal_daftar) values 
				('$username', '$email', '$password', '$nama_lengkap', '$jenis_kelamin', '$alamat', '$avatar', '$tanggal_daftar')");
			if($query){
				echo "Registrasi Berhasil";
		}else{
				echo "Error";
		}
		}else{
			echo "Username Sudah Digunakan";
			}
	}
	mysql_close ($connection);
?>