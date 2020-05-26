<?php
include("conexion.php");
	//TOMAMOS VALORES DE LOS TEXFIELD
	$rut=$_POST["rut"];
	$clave=$_POST["txt_clave"];

if(($_POST["btn_entrar"]) && ($rut!="") && ($clave!=""))
{
		$rut=$_POST["rut"];
		$clave=$_POST["txt_clave"];

	$listar="SELECT u.rut_usu ,u.nombre ,u.apellido ,u.correo ,u.estado ,u.fono,tu.tipo as 'cargo',u.estado
			FROM usuarios u , tipo_usuarios tu
			WHERE (U.id_tipo = tu.id_tipo) and u.rut_usu='$rut' and u.clave='$clave' and u.estado='Activo'";
	$ejecutalistar=mysqli_query($con,$listar);
	while($rs=mysqli_fetch_array($ejecutalistar,$base))
	{ 
		//RESCATA VALORES DE LA BD
		$rut_usu= $rs["rut_usu"];
		$nombre= $rs["nombre"];
		$apellido=$rs["apellido"];
		$correo=$rs["correo"];
		$tipo_cargo= $rs["cargo"];
	}//cierra while

	if($rut !="")
	{
		//INICIA UNA SESION PARA EL USUARIO
		session_start();
		//RESCATA VALORES DE PERSONAL DE PACKING
		$_SESSION["rut_usu"] = $rut_usu;
		$_SESSION["nombre"]  = $nombre;
		$_SESSION["apellido"]  = $apellido;
		$_SESSION["correo"]  = $correo;
		$_SESSION["cargo"] = $tipo_cargo;

		$_SESSION["estado"] ="LOGEADO";

			//*****ACCESO USUARIO ADMINISTRADOR*****//
			/*****ACCESO USUARIO ADMINISTRADOR******/
			if($tipo_cargo=="SuperAdministracion" ){
			header("location:Adm/inicio.php");
			//***** ACCESO TARJADORES *****//
			}else if($tipo_cargo=="Profesor"){ 
			header("location:Profesores/dashboard.php");

			}else {//SI PRESIONO EL BOTON
			//*****REDIRECCION A INDEX DE DATOS INCORRECTOS*****//
			echo"<script type=\"text/javascript\">alert('Datos Incorrectos'); window.location='index.html';</script>"; 
			}
	}else{//SI PRESIONO EL BOTON
		header("location:index.html");
	}
}
?>