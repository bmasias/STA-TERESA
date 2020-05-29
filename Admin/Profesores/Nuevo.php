<?php 
  include("../../conexion.php");
  session_start();
  error_reporting(0);
  if ($_SESSION["estado"] == "LOGEADO"){ 
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Colegio Sagrada Familia</title>
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body style="background-color: teal">
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">CREAR NUEVO PROFESOR</h1>
              </div>
              <form class="user" method="POST" action="Nuevo.php">
                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                   <input type="text" class="form-control form-control-user" id="rut_demo_5" name="rut" placeholder=" Rut" required="">
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder=" Nombre Profesor" name="txt_nombre" required="">
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder=" Apellido Profesor" name="txt_apellido" required="">
                  </div>
                </div>
                 <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="email" class="form-control form-control-user"  placeholder=" Correo" name="txt_correo" required="">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user"  placeholder="Direccion" name="txt_direccion" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user"  placeholder=" Fono" name="txt_fono" required="">
                  </div>
                  <div class="col-sm-6">
                      <input type="password" class="form-control form-control-user"  placeholder="Password" name="txt_clave" required="" >
                  </div>
                </div>
                <input type="submit" name="BTN_INGRESAR" value="REGISTRAR PROFESOR" class="btn btn-primary btn-user btn-block">
                <hr>
                <a href="listaProfesores.php" class="btn btn-dark btn-user btn-block">VOLVER</a>
              </form>
            </div>
          </div>
              <?php 

    if ($_POST["BTN_INGRESAR"]) {
      $rut=$_POST["rut"];
      $nombre=$_POST["txt_nombre"];
      $apellido=$_POST["txt_apellido"];
      $clave=$_POST["txt_clave"];
      $correo=$_POST["txt_correo"];
      $direccion=$_POST["txt_direccion"];
      $fono=$_POST["txt_fono"];

        $insertar="INSERT INTO usuarios VALUES('$rut','$nombre','$apellido','$correo','$direccion','$fono','Activo','$clave','2','1')";
        $resultadoInsert=mysqli_query($con,$insertar);

        if ($resultadoInsert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>PROFESOR CREADO CORRECTAMENTE
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
        }else{
          echo "$insertar";
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>ERROR DE SERVIDOR
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
        }//cierra if de resultado
    }//cierra click del boton
    ?>
        </div>
      </div>
    </div>

    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../js/sb-admin-2.min.js"></script>

    <script src="../../js/jquery.Rut.js"></script>
  <script src="../../js/jquery.validate.js"></script>
  <script src="../../js/jquery-ui.js"></script>
   <script type="text/javascript">
    $('#rut_demo_5').Rut({
      on_error: function(){ 
        alert('Rut incorrecto'); 
      },
      format_on: 'keyup'
    });
  </script>
  
</body>
</html>
<?php 
}else{
  header("location:../../index.php");
  } 
?>