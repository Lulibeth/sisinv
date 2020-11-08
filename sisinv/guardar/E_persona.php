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
$cedula=$_REQUEST['cedula'];
$preced=$_REQUEST['preced'];
$nombre=strtoupper($_REQUEST['nombre']);
$apellido=strtoupper($_REQUEST['apellido']);
$direccion=strtoupper($_REQUEST['direccion']);
$telefono=$_REQUEST['telefono'];
$id_per=$_REQUEST['id_per'];
//$estatus=$_REQUEST['estatus'];////////agregar
$estatus=1;



 $sqlinpersoed="UPDATE persona.persona
   SET  cedula='$cedula', nombre='$nombre', apellido='$apellido', direccion='$direccion', telefono='$telefono', 
       estatus='$estatus', usuario='$id_usuario', fecha='$fecha', ip='$ip', precedu='$preced'
 WHERE id='$id_per'";
	
$respered = pg_query($sqlinpersoed);

if($respered){
echo "
                <script language='JavaScript'>
                alert('Edicion Exitosa!');
				window.close();
								window.location='../index.php?s=coper';

                </script>";
}else{
echo "
                <script language='JavaScript'>
                alert('Error al procesar datos');
				window.close();
								window.location='../index.php?s=coper';

                </script>";

//pg_last_error();
}

?>