<?php 
header('Access-Control-Allow-Origin: *');

	$connection = mysql_connect("localhost", "root", ""); 
	$db = mysql_select_db("remov", $connection); 
	
	$sql = "SELECT * FROM komentar,member,film WHERE member_ID=ID_member and film_ID=ID_film order by waktu desc";
$result = mysql_query($sql);

$a=0;
    while($row= mysql_fetch_array($result)) {
		
		$data['timelines'][$a]['ID_komentar']=$row['ID_komentar'];
		$data['timelines'][$a]['member_ID']=$row['member_ID'];
		$data['timelines'][$a]['film_ID']=$row['film_ID'];
		$data['timelines'][$a]['komentar']=$row['komentar'];
		$data['timelines'][$a]['waktu']=$row['waktu'];
		$data['timelines'][$a]['Nama']=$row['Nama']; 
		
		$data['timelines'][$a]['ID_film']=$row['ID_film'];
		$data['timelines'][$a]['Judul']=$row['Judul'];
		$data['timelines'][$a]['Sutradara']=$row['Sutradara'];
		$data['timelines'][$a]['Produksi']=$row['Produksi'];
		$data['timelines'][$a]['Tanggal_tayang']=$row['Tanggal_tayang'];
		$data['timelines'][$a]['Durasi']=$row['Durasi'];
		$data['timelines'][$a]['Kategori']=$row['Kategori'];
		$data['timelines'][$a]['Genre']=$row['Genre'];
		$data['timelines'][$a]['Rating']=$row['Rating'];
		$data['timelines'][$a]['Negara_produksi']=$row['Negara_produksi'];
		$data['timelines'][$a]['Sinopsis']=$row['Sinopsis'];
		$data['timelines'][$a]['Cast']=$row['Cast'];
		$data['timelines'][$a]['Cover']=$row['Cover'];
		
			$a++;
		}
  
$json_string = json_encode($data);
echo $json_string;

//echo $data['timeline'][0]['Judul'];
mysql_close($connection);
?>