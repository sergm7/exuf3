 <?php //Sesion
    session_start();
    include('db_connect.php');
    if(isset($_POST['enviar'])) { 

            $sql = mysql_query("SELECT idusers, name, pass FROM users WHERE name='".$user."' AND pass='".$pass."'");

            if($row = mysql_fetch_array($sql)) {
                $_SESSION['idusers'] = $row['idusers']; 

                $_SESSION['user'] = $row["user"];
                header("Location: index.php");

            }else {

              echo "Error al iniciar sesion!"
              header("Location: login.php");
            }
        }
    }
