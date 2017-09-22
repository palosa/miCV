<?php
include "./lib/usuario.php";
include "./lib/seguridad.php";
  $seguridad = new seguridad();
  $user=new usuario();
 ?>
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

        <nav>
          <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="experienciaProf.php">experiencia profesional</a></li>
            <li><a href="estudiosEduc.php">estudios y educación</a></li>
            <li><a href="myperfil.php">edición y perfil</a></li>
            <li><a href="http://localhost/CV">Blog</a></li>
            <?php
            if($seguridad->getUsuario()==null){
                  echo "<a href='login.php'>Login </a>";
                  echo "<a href='registro.php'>Registro</a>";
            }else {
              echo "hola ".$seguridad->getUsuario();
              echo "<br>";
              $ip = $_SERVER['REMOTE_ADDR'];
              echo "y : la ip suya es".$ip;
            }
            ?>
          </ul>
        </nav>

    </div>
  	</header>
    <!-- <section id="tareas">
      <h2>Bienvenido a tu CV</h2>
      <p>Hecha la Base de Datos micv en phpmyadmin,exportada, tablas hechas....faltaria programar para subir foto...</p>
      <p>Ya tenemos repositorio para compartir, FALTA SUBIR LOS CAMBIOS HASTA HOY MIERCOLES</p>
      <p>Parte Privada, HECHA FALTA MEJORAR LO QUE SE PUEDA</p>
      <p>Si se puede hacer con WORDPRESS lol</p>
    </section> -->
<?php
$tabla=$user->mostrarUsuario();
  foreach ($tabla as  $value) {

 ?>
 <div class="container">
 		<div class="main row">
    <section id="logo">
      <img src="<?= $value['foto']?>" alt="">
    </section>

      <section id="cv">

      <h1>Datos personales :</h1><br><br>

      <h2><?= $value['nombre']?> <?= $value['apellidos']?></h2>
      <b><?= $value['correo']?></b><br>
      <b><?= $value['telefono']?></b><br>
      <b><?= $value['otrasRedesSoc']?></b><br>
      <b><?= $value['direccion']?></b><br>
      <!-- <b>gbrflorid@a.com</b>
      <b>a</b> -->
      <h1>Estudios :</h1>
      <b><?= $value['EstAnoinicio']?></b><br>
      <b><?= $value['EstAnofin']?></b><br>
      <b><?= $value['EstEmpresa']?></b><br>
      <b><?= $value['EstTexto']?></b><br>
      <!-- <ol>
        <li>1:aaaaaaaaaaaaaaaaaaaaaaaaaa</li><br>
        <li>2: aaaaaaaaaaaaaaaaaaaaaaaaaa</li><br>
        <li>3: aaaaaaaaaaaaaaaaaaaaaaaaaa</li><br>
        <li>4: aaaaaaaaaaaaaaaaaaaaaaaaaa</li><br>
        <li>5: aaaaaaaaaaaaaaaaaaaaaaaaaa</li><br>
      </ol> -->
      <h1>Experiencia profesional :</h1>
      <b><?= $value['ExpAnoinicio']?></b><br>
      <b><?= $value['ExpAnofin']?></b><br>
      <b><?= $value['ExpEmpresa']?></b><br>
      <b><?= $value['ExpTexto']?></b><br>
    </section>
<?php } ?>

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
