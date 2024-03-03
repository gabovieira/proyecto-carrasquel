<!DOCTYPE html>
<html>

<head>
	<title>My Page</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
	<?php include 'vista/header.html'; ?>
	<?php include 'vista/menu.html'; ?>
	<?php include 'vista/footer.html'; ?>
	<script src="index.js"></script>
	<?php include 'vista/php funciones/addtocart.php'; ?>
	<?php include 'vista/php funciones/updatecart.php'; ?>
	<?php include 'vista/php funciones/removefromcart.php'; ?>
	<?php include 'vista/php funciones/updatecarttotal.php'; ?>


</body>

</html>