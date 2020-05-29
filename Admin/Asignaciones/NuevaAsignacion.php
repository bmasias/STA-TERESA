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
                <h1 class="h4 text-gray-900 mb-4"> NUEVA ASIGNACION</h1>
              </div>
              <form class="user" method="POST" action="NuevaAsignacion.php">
                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                   <select class="form-control" name="cbo_profesor">
                     <option  selected="" disabled="">Seleccione Profesor</option>
                     <?php 
                          $listarcargo="SELECT * FROM usuarios where id_tipo='2'";
                          $ListaCargo=mysqli_query($con,$listarcargo);
                          while($row=mysqli_fetch_array($ListaCargo,$base)){
                            echo "<option value='$row[rut_usu]'>$row[nombre] $row[apellido]</option>";
                            }
                      ?>
                   </select>
                  </div>
                  <div class="col-sm-4">
                    <select class="form-control" name="cbo_curso">
                     <option selected="" disabled="">Seleccione Curso</option>
                     <?php 
                          $listarcargo="SELECT * FROM cursos";
                          $ListaCargo=mysqli_query($con,$listarcargo);
                          while($row=mysqli_fetch_array($ListaCargo,$base)){
                            echo "<option value='$row[id_curso]'>$row[nombre] </option>";
                            }
                      ?>
                   </select>
                  </div>
                  <div class="col-sm-4">
                    <select class="form-control" name="cbo_asignatura">
                     <option selected="" disabled="">Seleccione Asignatura</option>
                     <?php 
                          $listarcargo="SELECT * FROM asignaturas";
                          $ListaCargo=mysqli_query($con,$listarcargo);
                          while($row=mysqli_fetch_array($ListaCargo,$base)){
                            echo "<option value='$row[id_asignaturas]'>$row[nom_asignatura] </option>";
                            }
                      ?>
                   </select>
                  </div>
                </div>
                <input type="submit" name="BTN_INGRESAR" value="REGISTRAR ASIGNACION" class="btn btn-primary btn-user btn-block">
                <hr>
                <a href="listaAsignaciones.php" class="btn btn-dark btn-user btn-block">VOLVER</a>
              </form>
            </div>
          </div>
              <?php 

    if ($_POST["BTN_INGRESAR"]) {
      $profe=$_POST["cbo_profesor"];
      $curso=$_POST["cbo_curso"];
      $asignatura=$_POST["cbo_asignatura"];


        $insertar="INSERT INTO cabezeras VALUES(null,'$profe','$curso','$asignatura')";
        $resultadoInsert=mysqli_query($con,$insertar);

        if ($resultadoInsert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>ASIGNACION CREADA CORRECTAMENTE
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