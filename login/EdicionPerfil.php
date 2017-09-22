<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edicion Perfil</title>
    <link rel="stylesheet" href="./css/test.css">
  </head>
  <body>
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
    <form class="" action="index.html" method="post">
        <label>Nombre:<input type="text" name="nombre" value=""></label>
        <label>Apellidos:<input type="text" name="" value=""></label>
        <label>Correo<input type="text" name="" value=""></label>
        <label>Telefono<input type="text" name="" value=""></label>
        <label>Direccion<input type="text" name="" value=""></label>
        <label>Redes Sociales:<input type="text" name="" value=""></label>
        <input type="hidden" name="actualizar" value="actualizarPerfil">
        <input type="submit" name="" value="Actualizar">
    </form>
  </body>
</html>
