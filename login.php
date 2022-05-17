<?php  
if (isset($_POST['daftar'])) {
	$nama = $_POST['nama'];
	$pass = $_POST['password'];

	$text = $nama . "," . $pass . "," . "\n";

	$fp = fopen('config.txt', 'a+');

	if(fwrite($fp, $text)){
		echo '<script> alert("berhasil daftar"); </script>';
	}
}
elseif (isset($_POST['masuk'])) {
	$data = file_get_contents("config.txt");
	$contents = explode("\n", $data);

	foreach ($contents as $value) {
		$login = explode(",",$value);
		$nama = $login[0];
		$pass = $login[1];

		if($nama == $_POST['nama'] && $pass == $_POST['password']){
			session_start();
			$_SESSION['users'] = $nama;

			header('location: home.php');
		}else{
			echo '<script> alert("nama atau password anda salah")</script>';
		}
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
<form action="" method="POST">
	<br><br><br><br><br><br>
	<table align="center">
		<tr>
			<td>
				<input type="text" name="nama" placeholder="nama">
			</td>
		</tr>
		<tr>
			<td>
				<input type="password" name="password" placeholder="password">
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="daftar" value="saya pengguna baru">
				<input type="submit" name="masuk" value="login">
			</td>
		</tr>
	</table>
</form>
</body>
</html>