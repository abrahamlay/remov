
<?php
include "koneksi.php";
function getNo($no){
    $query = mysql_query("SELECT no FROM mahasiswa where no = $no");
    $data = mysql_fetch_array($query);
    return $data['no'];
}
function getNama($no){
    $query = mysql_query("SELECT fullname FROM mahasiswa where no = $no");
    $data = mysql_fetch_array($query);
    return $data['fullname'];
}
function getIPK($no){
    $query = mysql_query("SELECT ipk FROM mahasiswa where no = $no");
    $data = mysql_fetch_array($query);
    return $data['ipk'];
}
function getIncome($no){
    $query = mysql_query("SELECT income FROM mahasiswa where no = $no");
    $data = mysql_fetch_array($query);
    return $data['income'];
}
function getTanggungan($no){
    $query = mysql_query("SELECT tanggungan FROM mahasiswa where no = $no");
    $data = mysql_fetch_array($query);
    return $data['tanggungan'];
}
function getSemester($no){
    $query = mysql_query("SELECT semester FROM mahasiswa where no = $no");
    $data = mysql_fetch_array($query);
    return $data['semester'];
}
function getSKS($no){
    $query = mysql_query("SELECT sks FROM mahasiswa where no = $no");
    $data = mysql_fetch_array($query);
    return $data['sks'];
}
function getPrestasi($no){
    $query = mysql_query("SELECT prestasi FROM mahasiswa where no = $no");
    $data = mysql_fetch_array($query);
    return $data['prestasi'];
}

$sql2 = mysql_query("SELECT * FROM mahasiswa");
$i = 0;
$no = 0;
$normS = array();
$newBobot = array(0.1, 0.05, 0.35, 0.15, 0.1, 0.25);
while ($dt2 = mysql_fetch_array($sql2)) {
	$normS[$i] = pow($dt2['ipk'], $newBobot[0]) * pow($dt2['income'], $newBobot[1]) * pow($dt2['tanggungan'], $newBobot[2]) * pow($dt2['semester'], $newBobot[3]) * pow($dt2['sks'], $newBobot[4]) * pow($dt2['prestasi'], $newBobot[5]);	
	$i++;
}

$sql3 = mysql_query("SELECT * FROM mahasiswa");
$i=0;
$no = 0;
$normWP = array();
$jums = round(array_sum($normS),2);
while ($dt3 = mysql_fetch_array($sql3)) {

   // $normS[$i] = pow($dt2['ipk'], $newBobot[0]) * pow($dt2['income'], $newBobot[1]) * pow($dt2['tanggungan'], $newBobot[2]) * pow($dt2['semester'], $newBobot[3]) * pow($dt2['sks'], $newBobot[4]) * pow($dt2['prestasi'], $newBobot[5]);   
    $normWP[$i] = $normS[$i]/$jums;

    $data['mahasiswa'][$i]['no'] = getNo($dt3['no']);
    $data['mahasiswa'][$i]['fullname'] = getNama($dt3['no']);
    $data['mahasiswa'][$i]['ipk'] = getIPK($dt3['no']);
    $data['mahasiswa'][$i]['income'] = getIncome($dt3['no']);
    $data['mahasiswa'][$i]['tanggungan'] = getTanggungan($dt3['no']);
    $data['mahasiswa'][$i]['semester'] = getSemester($dt3['no']);
    $data['mahasiswa'][$i]['sks'] = getSKS($dt3['no']);
    $data['mahasiswa'][$i]['prestasi'] = getPrestasi($dt3['no']);
    $data['mahasiswa'][$i]['S'] = round($normS[$i],2);
    $data['mahasiswa'][$i]['WP'] = round($normWP[$i],2);

    $no++;
    $i++;
}
$json_string = json_encode($data, JSON_PRETTY_PRINT);
echo $json_string;
?>