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
    <title>Experiencia Profesional</title>
       <link rel="stylesheet" href="./css/test.css">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <header>
  <div class="container">
    <section class="nav">
        <nav>
          <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="experienciaProf.php">experiencia profesional</a></li>
            <li><a href="estudiosEduc.php">estudios y educación</a></li>
            <li><a href="myperfil.php">edición y perfil</a></li>
            <a href="login.php">Logueate</a>
            <a href="registro.php">Registrate</a>
          </ul>
        </nav>
      </section>


      </div>
<?php
//-- Esto es para que se pueda distribuir la informacion del Usuario
$resultado = $user->buscarUsuario($seguridad->getUsuario());
	if ($resultado != false) {
		$data=[];
		foreach ($resultado as $key => $fila) {
			$data=$fila;
		}
	}

    if (!empty($_GET)) {
       ?>
      <script type="text/javascript">
        alert("<?=$_GET['UsuarioCorrect'] ?>");
      </script>
      <?php
    }
?>
<br><br><br><br>
<form class="" action="accionesFuncion.php" method="post">
  <label for="Estudio Inicio">Estudios Inicio :<input type="date" name="EstAnoinicio" value="<?= $data['EstAnoinicio']; ?>"></label><br><br>
  <label for="Estudio fin">Estudios Fin :<input type="date" name="EstAnofin" value="<?= $data['EstAnofin']; ?>"></label><br><br>
  <label for="EstudioEmpresa">Estudios Empresa :<input type="text" name="EstEmpresa" value="<?= $data['EstEmpresa']; ?>"></label><br><br>
  <label for="">Texto Estudios :<br><br><textarea name="EstTexto" rows="8" cols="80"><?= $data['EstTexto']; ?></textarea></label>
  <input type="hidden" name="id_usuario" value="<?= $data['id_usuario']; ?>">
  <input type="hidden" name="accionFuncion" value="actualizarEstudios"><br>
  <input type="submit" value="actualizar">
</form>
  </body>
</html>
