<?Php
@session_start();
		$cedula_usu=$_SESSION["cedula"];
		$nombre_usu=$_SESSION["nombres"];
		$apellido_usu=$_SESSION["apellidos"];
		$nivel_usu=$_SESSION["nivel_acceso"];
		$des_rol_usu=$_SESSION["descripcionrol"];
		$id_usuario=$_SESSION["id_usuario"];
		$fecha=date("d/m/Y");
function getRealIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];
       
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
   
    return $_SERVER['REMOTE_ADDR'];
}
$ip=getRealIP();

require_once('../conectarpg.php'); 
$conex=new BaseDatos();
$conex->conectar($conex->servidor,$conex->usuario,$conex->password,$conex->BD);
///////////////////////////////////////////////////////////////////////////////////////////////////
$rif= $_REQUEST['rif'];
$nombre_em= strtoupper($_REQUEST['nombre_em']);
$direc= strtoupper($_REQUEST['direc']);
$telef= $_REQUEST['telef'];
$estatus=($_REQUEST['estatus']);


$id_pro=$_REQUEST['id_pro'];
//$estatus=$_REQUEST['estatus'];////////agregar



   $sqlinpersoed="UPDATE empresa.empresa
   SET nombre='$nombre_em', direccion='$direc', estatus='$estatus', rif='$rif', fecha='$fecha', ip='$ip', 
       num_telef='$telef'
 WHERE id='$id_pro'";
 

   
	
$respered = pg_query($sqlinpersoed);

if($respered){
echo "
                <script language='JavaScript'>
                alert('Edicion Exitosa!');
				window.close('../index.php?s=coempresa');
                </script>";
}else{
echo "
                <script language='JavaScript'>
                alert('Error al procesar datos');
				window.close('../index.php?s=coempresa');
                </script>";

//pg_last_error();
}

?>