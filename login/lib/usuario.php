<?php
include_once "db.php";

class usuario extends db{

	function __construct()
	{
		parent::__construct();
	}
	public function mostrarUsuario(){
    $sql="SELECT * FROM usuarios";
    return $mostrarNoticias=$this->realizarConsulta($sql);
    if ($mostrarNoticias=!false) {
      return true;
    }else {
      return false;
    }
  }
	public function insertarUsuario($usuario,$nombre,$apellidos,$email,$password,$telefono,$direccion){
		if($this->buscarUsuario($usuario) != false){
	   		echo "Existe un usuario con este nombre de usuario";
			return false;
		}
		if ($this->checkearEmail($email)) {
			echo "Existe un usuario con este email";
			return false;
		}
	  $sqlInsercion="INSERT INTO usuarios(id_usuario,nombre,apellidos,correo,usuario,rol,pass,otrasRedesSoc,foto,direccion,telefono,EstAnoinicio,EstAnofin,EstEmpresa,EstTexto,ExpAnoinicio,ExpAnofin,ExpEmpresa,ExpTexto)
		Values(NULL,'".$nombre."','".$apellidos."','".$email."','".$usuario."','user','".sha1($password)."',0,'perfilUser.jpg','".$direccion."','".$telefono."',0,0,0,0,1,1,1,1)";
	     $resultado=$this->realizarConsulta($sqlInsercion);
	     if ($resultado!=null) {
	     	return true;
	     }else{
	     	return false;
	     }
	}
	public function actualizarPerfil($nombre,$apellidos,$email,$telefono,$otrasRedes,$direccion,$id){
		$sql="UPDATE usuarios SET nombre='" .$nombre ."',
											apellidos='" .$apellidos ."',
											correo='" .$email ."',
											telefono='" .$telefono ."',
											otrasRedesSoc='" .$otrasRedes ."',
											direccion='" .$direccion ."'
									WHERE id_usuario='" .$id ."'";
		$actualizarPerfil=$this->realizarConsulta($sql);
		if ($actualizarPerfil=!false) {
		return true;
		}else {
		return false;
		}
	}
	public function actualizarEstudios($EstAnoinicio,$EstAnofin,$EstEmpresa,$EstTexto,$id){
		$sql="UPDATE usuarios SET EstAnoinicio='" .$EstAnoinicio ."',
															EstAnofin='" .$EstAnofin ."',
															EstEmpresa='" .$EstEmpresa ."',
															EstTexto='" .$EstTexto."'
														WHERE id_usuario='" .$id ."'";
		$actualizarEstudios=$this->realizarConsulta($sql);
		if ($actualizarEstudios=!false) {
		return true;
		}else {
		return false;
		}
	}
	public function actualizarExperiencia($ExpAnoinicio,$ExpAnofin,$ExpEmpresa,$ExpTexto,$id){
		$sql="UPDATE usuarios SET ExpAnoinicio='" .$ExpAnoinicio ."',
															ExpAnofin='" .$ExpAnofin ."',
															ExpEmpresa='" .$ExpEmpresa ."',
															ExpTexto='" .$ExpTexto."'
														WHERE id_usuario='" .$id ."'";
		$actualizarEstudios=$this->realizarConsulta($sql);
		if ($actualizarEstudios=!false) {
		return true;
		}else {
		return false;
		}
	}
	public function checkearEmail($email){
	  	$sqlInsercion="SELECT * FROM usuarios WHERE correo='".$email."'";
	     $resultado=$this->realizarConsulta($sqlInsercion);
	     if ($resultado->num_rows != null) {
	     	return true;
	     }else{
	     	return false;
	     }
	}

	public function buscarUsuario($user){
	    $sql="SELECT * FROM usuarios WHERE usuario='".$user."'";
	    $resultado = $this->realizarConsulta($sql);
	    if ($resultado->num_rows != null) {
	     	return $resultado;
	     }else{
	     	return false;
	     }
	}
	public function buscarLogin($usuario){
	    //Construimos la consulta  OPCION CON fetch_assoc     devuelve objeto mysqli
	    $sql="SELECT * from usuarios WHERE usuario='".$usuario."'";
	    //Realizamos la consulta
	    $resultado=$this->realizarConsulta($sql);
	    if($resultado!=false){
	        return $resultado->fetch_assoc();
	    }else{
	        return null;
	      }
  	}
	 function buscarUsuarioInsert($usuario){
    $sql="SELECT * from usuarios WHERE usuario='".$usuario."'";
    	return $resultado=$this->realizarConsulta($sql);
		}
  	public function actualizarUsuario($nombre,$apellidos,$email,$telefono,$otrasRedesSoc,$id,$direccion,$img_name,$img_tmp_name,$img_size){
  		if(isset($img_name)){
				$img_name2=$img_name;
				$target_dir = "IMAGENES/perfil/";
				$t=time();
				$target_file = $target_dir .$t.basename($img_name2);
				$img_tmp_name2=$img_tmp_name;
				$img_size2=$img_size;

				$uploadOk = 1;
				$register=0;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

				if(isset($_POST["submit"])) {
					$check = getimagesize($img_tmp_name2);
					if($check !== false) {
						$uploadOk = 1;
					} else {
						$uploadOk = 0;
					}
				}

				if (file_exists($target_file)) {
					$uploadOk = 0;
				}

				if ($img_size2 > 500000) {
					echo '<script language="javascript">alert("Sorry, your file is too large.");</script>';
					$uploadOk = 0;
				}

				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					echo '<script language="javascript">alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");</script>';
					$uploadOk = 0;
				}

				if ($uploadOk == 0) {
					echo '<script language="javascript">alert("Sorry, your file was not uploaded.");</script>';
				}
				else {
					if (move_uploaded_file($img_tmp_name2, $target_file)) {
								$sqlActualizar="UPDATE usuarios SET foto='".$target_file."' WHERE id_usuario='".$id."'";
								$this->realizarConsulta($sqlActualizar);
					}
					else {
						echo '<script language="javascript">alert("Sorry, there was an error uploading your file.");</script>';
						}
				}
			}

	$sqlActualizar="UPDATE usuarios SET nombre='".$nombre."', apellidos='".$apellidos."',correo='".$email."',telefono='".$telefono."',otrasRedesSoc='".$otrasRedesSoc."' WHERE id_usuario='".$id."'";
	$resultado=$this->realizarConsulta($sqlActualizar);

	if (isset($resultado)&& $resultado!=null) {
				return true;
		}else{
		return false;
	}
  	}




}
?>
