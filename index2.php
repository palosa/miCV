<?php
include "./lib/usuario.php";
$user=new usuario();
include "./lib/seguridad.php";
$seguridad = new seguridad();



//-- Esto es para que se pueda distribuir la informacion del Usuario --\\
$resultado = $user->buscarUsuario($seguridad->getUsuario());
	if ($resultado != false) {
		$data=[];
		foreach ($resultado as $key => $fila) {
			$data=$fila;
		}
	}

?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>INICIO</title>
    <!-- BOOTSTRAP -->
    <!-- BOOTSTRAP -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="cabecera.css">
    <link rel="stylesheet" href="inicio.css">
<?php
if (!empty($_GET)) {
   ?>
  <script type="text/javascript">
    alert("<?=$_GET['UsuarioCorrect'] ?>");
  </script>
  <?php
}
?>
  <body>

                  <h4 class="modal-title">Inicia Sesion</h4>
                          <form class="" action="accion.php" method="post">
                               <label for="Usuario">Usuario:</label>
                               <input type="text" name="usuario" value="" class="form-control input-sm" placeholder="usuario">
                               <label for="Contraseña">Contraseña:</label>
                               <input type="password" name="contr1" id="password" class="form-control input-sm" placeholder="Password"><br>
                             <input type="hidden" name="accion" value="login">
                             <input type="submit" value="Iniciar Sesion" class="btn btn-info registro">
                           </form>

													 	<hr>

                  <h3 class="modal-title">Registrate</h3>

<form class="" action="accion.php" method="post">
        <label for="Usuario">Usuario:</label><br>
        <input type="text" name="usuario" required><br>
        <label for="Nombre">Nombre:</label><br>
        <input type="text" name="nombre" required><br>
        <label for="Apellidos">Apellidos:</label><br>
        <input type="text" name="apellidos" required><br>
        <label for="Email">Email:</label><br>
        <input type="text" name="correo" required><br>
        <label for="Contraseña">Contraseña:</label><br>
        <input type="password" name="contr1" required><br>
        <label for="Repita_Contraseña">Repita la Contraseña:</label><br>
        <input type="password" name="contr2" required><br>
				<label for="Telefono">Telefono:</label><br>
        <input type="text" name="telefono" required><br>
				<label for="Direccion">Direccion:</label><br>
        <input type="text" name="direccion" required><br>
   <input type="hidden" name="accion" value="registro">
   <input type="submit" value="Registrate" class="btn btn-info btn-block registro">
 </form>



  </body>
</html>
