<?php
  include "./lib/usuario.php";
  include "./lib/seguridad.php";
    $seguridad = new seguridad();
    $user=new usuario();

  //si no hay usuario que entra, redirige a indeX, o si se entra de golpe....
  if ($seguridad->getUsuario() == null ) {
  	header('Location: login.php?UsuarioCorrect=No estas Logueado,por favor logueate.');

  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Myperfil</title>
    <link rel="stylesheet" href="./css/test.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <?php
    if(!empty($_GET)) {
       ?>
      <script type="text/javascript">
        alert("<?=$_GET['UsuarioCorrect'] ?>");
      </script>
      <?php
    }

      //-- Esto es para que se pueda distribuir la informacion del Usuario
      $resultado = $user->buscarUsuario($seguridad->getUsuario());
        if ($resultado != false) {
          $data=[];
          foreach ($resultado as $key => $fila) {
            $data=$fila;
          }
        }
    ?>
    <header>
  <div class="container">
    <section class="nav">
        <nav>
          <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="experienciaProf.php">experiencia profesional</a></li>
            <li><a href="estudiosEduc.php">estudios y educación</a></li>
            <li><a href="myperfil.php">edición y perfil</a></li>
            <!-- <a href="login.php">Logueate</a> -->
            <form method="post" action="accion.php">
						<input type="hidden" name="accion" value="logout">

						<li><input type="submit" class="btn btn-danger"value="LogOut"></li>
					</form>
          </ul>
        </nav>
      </section>
<br>
      <form action="accionesFuncion.php" method="post" enctype="multipart/form-data" >
		<label for="Nombre">Imagen de Perfil:</label><br>
            <img src="<?php echo $data['foto']; ?>" alt="" class="imgPerfil"><br><br>
                Cambiar Imagen:
			  <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*"><br><br>
		    <label for="Nombre">Nombre:<input type="text" name="nombre" value="<?= $data['nombre']; ?>"></label><br><br>
        <label for="Apellidos">Apellidos:<input type="text" name="apellidos" value="<?= $data['apellidos']; ?>"></label><br><br>
        <label for="Correo">Correo:<input type="text" name="email" value="<?= $data['correo']; ?>"></label><br><br>
        <label for="Telefono">Telefono:<input type="text" name="telefono" value="<?= $data['telefono']; ?>"></label><br><br>
        <label for="">Tus redes:<br><br><textarea name="otrasRedesSoc" rows="8" cols="80"><?= $data['otrasRedesSoc']; ?></textarea></label><br><br>
        <label for="Direccion">Direccion:<input type="text" name="direccion" value="<?= $data['direccion']; ?>"></label><br><br>
        <input type="hidden" name="id_usuario" value="<?= $data['id_usuario']; ?>">
        <input type="hidden" name="accionFuncion" value="actualizarPerfil">
        <input type="submit" value="Actualizar">
        <br><br><br>

      </form>

        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
