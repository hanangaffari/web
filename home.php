<?php  
include 'header.php';
session_start();

?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<table border="1" height="40%" width="50%" align="center">
	<td>halo kakak 	<?php echo $_SESSION['users'];  ?>  di siniiii</td>
</table>
</body>
</html>