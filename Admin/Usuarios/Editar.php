<?php 
  include("../../conexion.php");
  session_start();
  error_reporting(0);
  if ($_SESSION["estado"] == "LOGEADO"){ 

    $rut=$_GET['id'];
    $sql = "SELECT u.rut_usu ,u.nombre ,u.apellido,u.clave ,u.correo ,u.fono , tu.tipo as 'cargo',u.id_tipo 
                          FROM usuarios u , tipo_usuarios tu
                          WHERE (u.id_tipo = tu.id_tipo) AND u.estado='Activo' AND rut_usu='$rut'";
    $resultado=mysqli_query($con,$sql);
    $rows=mysqli_fetch_array($resultado,$base);
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
                <h1 class="h4 text-gray-900 mb-4">ACTUALIZAR USUARIO</h1>
              </div>
              <form class="user" method="POST" action="Editar.php">
                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                   <input type="text" class="form-control form-control-user" id="rut_demo_5" name="rut" placeholder=" Rut" required="" value="<?php echo $rows['rut_usu']; ?>" readonly>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder=" Nombre Usuario" name="txt_nombre" required="" value="<?php echo $rows['nombre']; ?>">
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder=" Apellido Usuario" name="txt_apellido" required="" value="<?php echo $rows['apellido']; ?>">
                  </div>
                </div>
                 <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <input type="email" class="form-control form-control-user"  placeholder=" Correo" name="txt_correo" required="" value="<?php echo $rows['correo']; ?>">
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user"  placeholder=" Fono" name="txt_fono" required="" value="<?php echo $rows['fono']; ?>">
                  </div>
                  <div class="col-sm-4">
                      <input type="password" class="form-control form-control-user"  placeholder="Password" name="txt_clave" required="" value="<?php echo $rows['clave']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <select class="form-control" name="cbo_cargo">
                      <option value="<?php echo $rows['id_tipo']; ?>"><?php echo $rows['cargo']; ?></option>
                      <option  disabled="">Seleccione Cargo</option>
                      <?php 
                          $listarcargo="SELECT * FROM tipo_usuarios";
                          $ListaCargo=mysqli_query($con,$listarcargo);
                          while($row=mysqli_fetch_array($ListaCargo,$base)){
                            echo "<option value='$row[id_tipo]'>$row[tipo]</option>";
                            }
                      ?>
                    </select>
                  </div>
                </div>
                <input type="submit" name="BTN_ACTUALIZAR" value="ACTUALIZAR USUARIO" class="btn btn-primary btn-user btn-block">
                <hr>
                <a href="listaUsuarios.php" class="btn btn-dark btn-user btn-block">VOLVER</a>
              </form>
            </div>
          </div>
              <?php 

    if ($_POST["BTN_ACTUALIZAR"]) {

      $rut=$_POST["rut"];
      $nombre=$_POST["txt_nombre"];
      $apellido=$_POST["txt_apellido"];
      $clave=$_POST["txt_clave"];
      $correo=$_POST["txt_correo"];
      $fono=$_POST["txt_fono"];
      $cargo=$_POST["cbo_cargo"];

      $update="UPDATE usuarios  SET nombre='$nombre' , apellido='$apellido' , correo='$correo' , fono='$fono' , clave='$clave' , id_tipo='$cargo' WHERE rut_usu='$rut'";
      $resultadoupdate=mysqli_query($con,$update);


        if ($resultadoupdate) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>USUARIO ACTUALIZADO CORRECTAMENTE
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
        }else{
          echo "$update";
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