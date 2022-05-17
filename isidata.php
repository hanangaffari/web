<?php  
include 'header.php';
session_start();

if(isset($_POST['simpan'])){
	$tanggal = $_POST['tanggal'];
	$jam  = $_POST['jam'];
	$lokasi = $_POST['lokasi'];
	$suhu = $_POST['suhu'];
	$nama = $_SESSION['users'];
	$text = $tanggal . ',' . $jam . "," . $lokasi . "," . $suhu . "</tr> \n";

	$data = "catatan/$nama.txt" ;

	$dirname = dirname($data);

	if(!is_dir($dirname)){
		mkdir($dirname,0755,true);
	}
	$fp = fopen($data, 'a+ ');

	if(fwrite($fp,$text)){
		echo '<script> alert("catatan berhasil disimpan"); </script>';
	}

}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<table border="1" align="center" width="50%" height="40%">
	<form action="" method="POST">
		<td>
			<table align="center" border="0">
				<tr>
					<td>Tanggal</td>
					<td><input type="date" name="tanggal"></td>
				</tr>
				<tr>
					<td>jam</td>
					<td><input type="time" name="jam"></td>
				</tr>
				<tr>
					<td>lokasi</td>
					<td><input type="text" name="lokasi"></td>
				</tr>
				<tr>
					<td>suhu tubuh</td>
					<td><input type="number" name="suhu"></td>
				</tr>
				<tr>					
					<td><input type="submit" name="simpan"></td>
				</tr>
			</table>
		</td>
	</form>
</table>
</body>
</html>