<?php 
  include("../conexion.php");
  error_reporting(0);
  session_start();
  if ($_SESSION["estado"] == "LOGEADO"){ 

   $rut_sesion= $_SESSION["rut_usu"];

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title></title>


  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body style="background-color: #B2B2B2">
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">CARGAR ARCHIVO</h1>
              </div>


              <form class="form-horizontal" method="POST" action="CargarArchivo.php" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="txt_nombre" name="txt_nombre" placeholder="Nombre Documento" required="">
                  </div>
                  
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                      <input type="file" class="form-control" id="archivo" name="archivo">
                  </div>
                </div>
                 <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <select class="form-control" name="cbo_curso">
                      <option selected="">SELECCIONE CURSO</option>
                      <?php 
                          $listarCURSO="SELECT * FROM cursos";
                          $Listacursos=mysqli_query($con,$listarCURSO);
                          while($row=mysqli_fetch_array($Listacursos,$base)){
                            echo "<option value='$row[id_curso]'>$row[nombre]</option>";
                            }
                      ?>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <select class="form-control" name="cbo_asignatura">
                      <option selected="">SELECCIONE ASIGNATURA</option>
                      <?php 
                          $listarCURSO="SELECT * FROM asignaturas where rut_usuario='$rut_sesion' ";
                          $ListaContrato=mysqli_query($con,$listarCURSO);
                          while($row=mysqli_fetch_array($ListaContrato,$base)){
                            echo "<option value='$row[id_asignaturas]'>$row[nom_asignatura]</option>";
                            }
                      ?>
                    </select>
                  </div>
                </div>

                <input type="submit" name="BTN_INGRESAR" value="REGISTRAR ARCHIVO" class="btn btn-primary btn-user btn-block">
                <hr>
                <a href="Archivo.php" class="btn btn-dark btn-user btn-block">VOLVER</a>
              </form>
            </div>
          </div>
              <?php 

    if ($_POST["BTN_INGRESAR"]) {
          $curso=$_POST["cbo_curso"];
          $asignatura=$_POST["cbo_asignatura"];
          $nombre=$_POST["txt_nombre"];
          $archivo=$_FILES["archivo"]["name"];
          $ruta=$_FILES["archivo"]["tmp_name"];
          $destino="files/".$archivo;
          copy($ruta,$destino);

          $insert="INSERT INTO archivos VALUES(null,'$nombre',CURDATE(),'$destino','$rut_sesion','$curso','$asignatura')";
          $ejecutar=mysqli_query($con,$insert);

          if ($ejecutar) {
              echo "CORRECTO";
              echo "$insert";
          }else{
            echo "ERROR";
            echo $insert;
          }
    }//cierra click del boton
    ?>
        </div>
      </div>
    </div>




    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../js/sb-admin-2.min.js"></script>

</body>
</html>
<?php 
}else{
  header("location:../index.html");
  } 
?>