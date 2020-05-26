<?php
//DESTRUTE LA SESION INICIADA Y REDIRECCIONA A RESPECTIVA PAGINA DE INICIO
include("conexion.php");
session_start();
session_destroy ();
header ("location:index.html");
?>