<?php
header('Access-Control-Allow-Origin: *');

	$connection = mysql_connect("localhost", "root", ""); 
	$db = mysql_select_db("remov", $connection); 
	
	$ID_film = $_GET["ID_film"];
					
$query = "SELECT * FROM film,komentar,member where member_ID = ID_member and film_ID=ID_film and ID_film = '$ID_film'";
$hasil = mysql_query($query);

while($row = mysql_fetch_array($hasil)){
	
		$data['ID_komentar']=$row['ID_komentar'];
		$data['member_ID']=$row['member_ID'];
		$data['film_ID']=$row['film_ID'];
		$data['komentar']=$row['komentar'];
		$data['waktu']=$row['waktu'];
		$data['Nama']=$row['Nama']; 
		

		$data['ID_film']=$row['ID_film'];
		$data['Judul']=$row['Judul'];
		$data['Sutradara']=$row['Sutradara'];
		$data['Produksi']=$row['Produksi'];
		$data['Tanggal_tayang']=$row['Tanggal_tayang'];
		$data['Durasi']=$row['Durasi'];
		$data['Kategori']=$row['Kategori'];
		$data['Genre']=$row['Genre'];
		$data['Rating']=$row['Rating'];
		$data['Negara_produksi']=$row['Negara_produksi'];
		$data['Sinopsis']=$row['Sinopsis'];
		$data['Cast']=$row['Cast'];
		$data['Cover']=$row['Cover'];
	//$a++;
}

$json_string = json_encode($data);
echo $json_string;
	
?>