<?php
include "./lib/usuario.php";
include "./lib/seguridad.php";
// include "./lib/usuarios_ejerciciosvideos.php";


$user=new usuario();
$seguridad = new Seguridad();


//-- Esto es para que se pueda distribuir la informacion del Usuario --\\
$resultado = $user->buscarUsuario($seguridad->getUsuario());
	if ($resultado != false) {
		$data=[];
		foreach ($resultado as $key => $fila) {
			$data=$fila;
		}
	}

if(isset($_POST["accion"])){
     //Registro de usuario
     if($_POST["accion"]=="registro"){
       if($_POST["contr1"]==$_POST["contr2"]){

        $usurioReg=$user->insertarUsuario($_POST['usuario'],$_POST['nombre'],$_POST['apellidos'],
				$_POST['correo'],$_POST['contr1'],$_POST['telefono'],$_POST['direccion']);
         if($usurioReg!=null){
            header("Location: index2.php?UsuarioCorrect=El usuario ha sido registrado correctamente");
         }else{
           header("Location: index2.php?UsuarioCorrect=Existe un  usuario o un Correo con ese nombre");
         }
       }else{
        header("Location: index2.php?UsuarioCorrect=Las contraseñas no son Iguales. Intente registrarse de nuevo con las contraseñas iguales.");
       }
     }
     //-- Login de usuario --\\
     elseif ($_POST["accion"]=="login") {
			$resultado=$user->buscarLogin($_POST["usuario"]);
      // var_dump($resultado);
			if($resultado!=null){
				//-- Comparamos los passwords     CON sha1 esta encriptado... --\\
				if($resultado["Pass"]==sha1($_POST["contr1"])){
					//-- con esta funcion hace sesion start en miperfil.php --\\
					$seguridad->addUsuario($_POST["usuario"]);
          //-- Cuando este logueado te renvia a myperfil.php --\\
          if ($fila['rol']=='admin') {
            header("Location: Panel_de_Control/index.php?UsuarioCorrect=Bienvienido , te estabamos señor supremo");
          }elseif ($fila['rol']=='user') {
            header("Location: myPerfil.php?UsuarioCorrect=Bienvienido , te estabamos esperando");

          }

				}else{
          //-- Cuando las contraseña es incorrecta --\\
         header('Location: index2.php?UsuarioCorrect=Las contraseñas no coinciden con su Usuario');
				}
			}else{
        //-- Cuando el usuario no existe --\\
        header('Location: index2.php?UsuarioCorrect=Su Usuario no Existe, por favor registrese.');
			}
		}
     //-- LogOut --\\
     elseif ($_POST["accion"]=="logout") {
       $seguridad->logOut();
       header('Location: index2.php?UsuarioCorrect=Gracias por disfrutar de nuestros servicios.');
     }

    //-- Actualizar Perfil de Usuario --\\
    elseif ($_POST["accion"]=="ActualizarPerfil") {
      $user->actualizarPerfil($_POST['nombre'],
                                  $_POST['apellidos'],
                                  $_POST['Correo'],
                                  $_POST['altura'],
                                  $_POST['peso'],
                                  $_POST['sexo'],
                                  $_POST['actividadDiaria'],
                                  $_POST['problemasdeSalud'],
                                  $_POST['actividadDiariaDesc'],
                                  $_POST['problemasdeSaludDesc'],
                                  $_POST['id']);
      header("Location: myPerfil.php?UsuarioCorrect=Tu Perfil ha sido actualizado");
    }

 }
?>
