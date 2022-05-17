<?php 
include 'header.php';

session_start();
$nama = $_SESSION['users'];
$datauser = "catatan/$nama.txt";

if (!file_exists($datauser)) {
	die('<center>kamu belum punya catatan</center>');
}else{
	$file = fopen($datauser, "r");
}
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<table border="1" align="center" width="50%">
	<td>
		<a href="">urut berdasarkan</a>
		<select id="urut" onclick="urutkan(this)">
			<option value="0">tanggal </option>
			<option value="1">waktu </option>
			<option value="2">lokasi </option>
			<option value="3">suhu </option>
		</select>
		<input type="submit" name="urutkan">
	</td>
</table>
<br>
<table align="center" border="1" width="50%" height="40%">
	<td>
		<table align="center" border="1" width="50%" id="tableku">
	<tr>
		<th>tanggal</th>
		<th>waktu</th>
		<th>lokasi</th>
		<th>suhu tubuh</th>
	</tr>
	<?php  

	while (($row = fgets($file))!= false) {
		$col = explode(',',$row);
		foreach ($col as $data) {
			echo "<td>".trim($data)."</td>";
		}
	}

	?>
</table>
</td>
</table>
 <script src="table.js"></script>
</body> 
</html>