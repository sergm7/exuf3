<?php
	session_start();
	include('db_connect.php');
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<?php
	    if(empty($_SESSION['user'])) {
	?>
	        <form action="val_form.php" method="post">
	            <label>Usuario:</label><br />
	            <input type="text" name="user" /><br />
	            <label>Contraseña:</label><br />
	            <input type="password" name="pass" /><br />
	            <input type="submit" name="enviar" value="login" />
	        </form>  

	<?php
	    }else {	
	        echo "Bienvenido" <?=$_SESSION['user']?>
	    }
	?>  

</body>
</html>