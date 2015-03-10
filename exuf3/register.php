<?php
	include('acceso_db.php'); // incluimos el archivo de conexión a la Base de Datos
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	 <?php
	 		//solo podremos acceder si el usuario que ha iniciado sesion es admin
	 	if($_SESSION['user']) != "admin" ){
		echo"Esta es una pagina restringida, solo se puede acceder como administador"
		header("Location: login.php");
		}else{

	    if(isset($_POST['enviar'])) {
			 
	        	 $user = $_POST['user'];
	             $pass = $_POST['pass'];
				 $email = $_POST['email'];
				 $rol = $_POST['rol'];

	        //comprobamos que ningun campo este vacio
			if(empty($_POST['user'])) { 
	            echo "Escribe un nombre de usuario";

	        }elseif(empty($_POST['pass'])) { 
	            echo "Escribe una contraseña";

	        }elseif($_POST['pass'] != $_POST['pass_confirm']) {
	            echo "Contraseña incorrecta!";

	        }elseif(empty($_POST['email'])) {
	            echo "Escribe un email";

	        }elseif(empty($_POST['rol'])) {
	            echo "Añade un rol al usuario";


	            //Si los datos son correctos
	        }else {

	            // Miramos que el usuario no exista
	            $sql = mysql_query("SELECT name FROM users WHERE name='".$user."'");

	            //Si nos devuelve alguna fila quiere decir que existe
	            if(mysql_num_rows($sql) > 0) {
	                echo "El siguiente usuario ya existe" <?=$user['user']?;

	                //Si no existe lo insertamos
	            }else {
	                
	                $reg = mysql_query("INSERT INTO users (name, pass, email, rol) VALUES ('".$user."', '".$pass."', '".$email."','".$rol."')");
	                if($reg) {
	                    echo "Operacion finalizada";
	                }
	                
	            }
	        }

	    }else {
	?>
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
		    <label>Usuario:</label><br />
		    <input type="text" name="user" maxlength="20" /><br />
		    <label>Contraseña:</label><br />
		    <input type="password" name="pass" minlength="6" maxlength="20"  /><br />
		    <label>Confirmar Contraseña:</label><br />
		    <input type="password" name="pass_confirm" minlength="6" maxlength="15" /><br />
		    <label>Email:</label><br />
		    <input type="text" name="email" maxlength="40" /><br />
		    <input type="submit" name="enviar" value="Registrar" />
		    <input type="reset" value="Borrar" />
		</form>

	<?php
	    }
	}
	?> 

</body>
</html>