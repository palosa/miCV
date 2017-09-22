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
     ?><br><br><br>
     <form class="" action="accionesFuncion.php" method="post">
       <label for="Experiencia Inicio">Experiencia Inicio :<input type="date" name="ExpAnoinicio" value="<?= $data['ExpAnoinicio']; ?>"></label><br><br>
       <label for="Experiencia fin">Experiencia Fin :<input type="date" name="ExpAnofin" value="<?= $data['ExpAnofin']; ?>"></label><br><br>
       <label for="Experiencia Empresa">Experiencia Empresa :<input type="text" name="ExpEmpresa" value="<?= $data['ExpEmpresa']; ?>"></label><br><br>
       <label for="">Experiencia Texto : <br><br><textarea name="ExpTexto" rows="8" cols="80"><?= $data['ExpTexto']; ?></textarea></label>
       <input type="hidden" name="id_usuario" value="<?= $data['id_usuario']; ?>">
       <input type="hidden" name="accionFuncion" value="actualizarExperiencia"><br>
       <input type="submit" value="actualizar">
     </form>
  </body>
</html>
