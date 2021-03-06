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
                <h1 class="h4 text-gray-900 mb-4">CREAR NUEVO CURSO</h1>
              </div>
              <form class="user" method="POST" action="Nuevo.php">
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                   <input type="text" class="form-control form-control-user" id="rut_demo_5" name="txt_curso" placeholder=" Ingrese Nombre Curso" required="">
                  </div>
                  
                </div>
                <input type="submit" name="BTN_INGRESAR" value="REGISTRAR CURSO" class="btn btn-primary btn-user btn-block">
                <hr>
                <a href="listaCursos.php" class="btn btn-dark btn-user btn-block">VOLVER</a>
              </form>
            </div>
          </div>
              <?php 

    if ($_POST["BTN_INGRESAR"]) {
      $curso=$_POST["txt_curso"];

        $insertar="INSERT INTO cursos VALUES(null,'$curso')";
        $resultadoInsert=mysqli_query($con,$insertar);

        if ($resultadoInsert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>CURSO CREADO CORRECTAMENTE
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

  
</body>
</html>
<?php 
}else{
  header("location:../../index.php");
  } 
?>