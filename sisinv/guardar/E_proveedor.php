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
$descrip=strtoupper($_REQUEST['descrip']);
$prerif=($_REQUEST['prerif']);
$telef=($_REQUEST['telef']);
$telef_=($_REQUEST['telef_']);
$estatus=($_REQUEST['estatus']);


$id_provee=$_REQUEST['id_pro'];
//$estatus=$_REQUEST['estatus'];////////agregar



   $sqlinpersoed="UPDATE factu_inv.proveedor
   SET descripcion='$descrip', rif='$prerif', telefono='$telef', telefono_f='$telef_', estatus='$estatus', usuario='$id_usuario',
       ip='$ip'
 WHERE id='$id_provee'";
 

   
	
$respered = pg_query($sqlinpersoed);

if($respered){
echo "
                <script language='JavaScript'>
                alert('Edicion Exitosa!');
				window.close('../index.php?s=coprovee');
                </script>";
}else{
echo "
                <script language='JavaScript'>
                alert('Error al procesar datos');
				window.close('../index.php?s=coprovee');
                </script>";

//pg_last_error();
}

?>