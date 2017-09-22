<?php
include "./lib/usuario.php";
include "./lib/seguridad.php";
  $user= new usuario();
  $seguridad = new Seguridad();

 if (isset($_POST['accionFuncion'])) {
   if($_POST["accionFuncion"]=="actualizarPerfil2"){
     $perReg=$user->actualizarPerfil($_POST["nombre"],$_POST["apellidos"],$_POST["correo"],$_POST["telefono"],$_POST["otrasRedesSoc"],$_POST["direccion"],$_POST['id_usuario']);

     if($perReg!=null){
       header("Location: myperfil.php?UsuarioCorrect=Has actualizado tu perfil.");
     }else{
       header("Location: myperfil.php?UsuarioCorrect=No se ha podido actualizar tu perfil");
     }

   }elseif ($_POST["accionFuncion"]=="actualizarEstudios") {
     $estReg=$user->actualizarEstudios($_POST["EstAnoinicio"],$_POST["EstAnofin"],$_POST["EstEmpresa"],$_POST["EstTexto"],$_POST['id_usuario']);

     if($estReg!=null){
       header("Location: estudiosEduc.php?UsuarioCorrect=Has actualizado tus estudios academicos.");
     }else{
       header("Location: estudiosEduc.php?UsuarioCorrect=No se ha podido actualizar tus estudios academicos.");
     }
   }
    elseif ($_POST["accionFuncion"]=="actualizarPerfil") {		
		 $img_name="";
		 $img_tmp_name="";
		 $img_size="";
		 
		 if(isset($_FILES["fileToUpload"])){
			$img_name=$_FILES["fileToUpload"]["name"];
			$img_tmp_name=$_FILES["fileToUpload"]["tmp_name"];
			$img_size=$_FILES["fileToUpload"]["size"];
		 }
		 
		
		$usurioReg=$user->actualizarUsuario($_POST['nombre'],$_POST['apellidos'],$_POST['email'],$_POST['telefono'],$_POST['otrasRedesSoc'],$_POST['id_usuario'],$_POST['direccion'],$img_name,$img_tmp_name,$img_size);

		if($usurioReg==true){
			header("Location: myperfil.php?UsuarioCorrect=El usuario se ha modificado correctamente");
        }else{
			header("Location: myperfil.php?UsuarioCorrect=Ha habido un error al modificar el usuario, intentelo más tarde");
	    }
}
   
   elseif ($_POST["accionFuncion"]=="actualizarExperiencia") {
     $expReg=$user->actualizarExperiencia($_POST["ExpAnoinicio"],$_POST["ExpAnofin"],$_POST["ExpEmpresa"],$_POST["ExpTexto"],$_POST['id_usuario']);

     if($expReg!=null){
       header("Location: experienciaProf.php?UsuarioCorrect=Has actualizado tus Experiencias laborales.");
     }else{
       header("Location: experienciaProf.php?UsuarioCorrect=No se ha podido actualizar tus Experiencias laborales.");
     }
   }
 }


?>
