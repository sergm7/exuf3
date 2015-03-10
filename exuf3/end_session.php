<?php
    session_start();
    include('db_connect.php'); // Si hay una sesion, finalizamos

    if(isset($_SESSION['user'])) {
        session_destroy();
        header("Location: index.php");

    }else {
        echo "Error! No hay ninguna sesion";
        header("Location: login.php");
    }
