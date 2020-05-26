

<!DOCTYPE html>
<html>
<head>
	<link href="../../css/sb-admin-2.min.css" rel="stylesheet">
	<title></title>
</head>
<body>
	<?php
	
include("../../conexion.php");

	$rut = $_GET['id'];
	
	$sql = "UPDATE usuarios SET estado='Inactivo' WHERE rut_usu = '$rut'";
	$resultado=mysqli_query($con,$sql);
	if ($resultado) {
				echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
			            <strong>USUARIO ELIMINADO
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			          </div>";
				echo"
		                    <script type=\"text/javascript\">
		                      function redireccionar(){window.location='listaUsuarios.php';}
		                      setTimeout ('redireccionar()', 1000);
		                    </script>";
			}else{
				echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
			            <strong>ERROR DE SERVIDOR
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			          </div>";
			}

?>

</body>
</html>