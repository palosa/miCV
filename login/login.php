<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
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
            <a href="login.php">Logueate</a>
            <a href="registro.php">Registrate</a>
          </ul>
        </nav>
      </section>


    <section>

      <article class="LOGIN">
        <form class="" action="accion.php" method="post"><br><br>
          <h1>Login</h1>
          <label for="">Nombre de usuario:<input type="text" name="nombreUsuario"></label><br>
          <label for="">Contraseña:<input type="password" name="contraseña1" ></label><br>

          <input type="hidden" name="accion" value="login">
          <input type="submit" name="" value="Loguearte"><br>
            <a href="registr0.php">Si no tienes una cuenta en nuestra pagina web Ckick aqui.</a>
        </form>
      </article>
    </section>


  </div>
  </div>

  <footer style=" position: fixed;
  height:15px;
      bottom: 0;
      width: 100%;
      background-color:black;">
    <div class="container">

    </div>
  </footer>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
