<?php 
header('Access-Control-Allow-Origin: *');

	$connection = mysql_connect("localhost", "root", ""); 
	$db = mysql_select_db("remov", $connection); 
	
	$sql = "SELECT * FROM film ";
$result = mysql_query($sql);
function getProduksi (){

}

$a=0;
    while($row= mysql_fetch_row($result)) {
		
		$data['movies'][$a]['ID_film']=$row[0];
		$data['movies'][$a]['Judul']=$row[1];
		$data['movies'][$a]['Sutradara']=$row[2];
		$data['movies'][$a]['Produksi']=$row[3];
		$data['movies'][$a]['Tanggal_tayang']=$row[4];
		$data['movies'][$a]['Durasi']=$row[5];
		$data['movies'][$a]['Kategori']=$row[6];
		$data['movies'][$a]['Genre']=$row[7];
		$data['movies'][$a]['Rating']=$row[8];
		$data['movies'][$a]['Negara_produksi']=$row[9];
		$data['movies'][$a]['Sinopsis']=$row[10];
		$data['movies'][$a]['Cast']=$row[11];
		 
			$a++;
		}
  
$json_string = json_encode($data);
echo $json_string;

//echo $data['movies'][0]['Judul'];
mysql_close($connection);
?>