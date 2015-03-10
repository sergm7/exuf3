
<?php
	ini_set('display_errors','On');
    session_start();
    include('db_connect.php');
?> 

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
</head>
<body>

	<?php
	    if(isset($_SESSION['user'])) {

	        echo "Bienvenido" <?=$_SESSION['user']?>
	        <br />
	        <a href="end_session.php">Salir</a>
	<?php
	    }else {
	?>
			<a href="login.php">Login</a>
	<?php
		if($_SESSION['user']) == "admin"{ ?>

			<a href="register.php">Registrar usuarios</a> <br><hr><hr> 
	<?php
		}
	    }
	?> 
</body>
</html>