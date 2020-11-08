<?php
@session_start();
require_once('conectarpg.php'); 
$conex=new BaseDatos();
$conex->conectar($conex->servidor,$conex->usuario,$conex->password,$conex->BD);

$fecha=date("d/m/Y - H:i:s");
$fechass =date('Y-m-d h:i:s ');
$ano=date("Y");
$ip=$_SERVER['REMOTE_ADDR'];

$correo=strtoupper($_POST["login"]);
$clave=$_POST["clave"];
function limpiarCadena($valor)
{   
$valor = str_ireplace("SELECT","",$valor);
$valor = str_ireplace("INSERT","",$valor);
$valor = str_ireplace("COPY","",$valor);
$valor = str_ireplace("DELETE","",$valor);
$valor = str_ireplace("DROP","",$valor);
$valor = str_ireplace("DUMP","",$valor);
$valor = str_ireplace(" OR ","",$valor);
$valor = str_ireplace("LIKE","",$valor);
$valor = str_ireplace("%","",$valor);
$valor = str_ireplace("^","",$valor);
$valor = str_ireplace("[","",$valor);
$valor = str_ireplace("]","",$valor);
$valor = str_ireplace("","",$valor);
$valor = str_ireplace("!","",$valor);
$valor = str_ireplace("¡","",$valor);
$valor = str_ireplace("?","",$valor);
$valor = str_ireplace("=","",$valor);
$valor = str_ireplace("'","",$valor);
$valor = str_ireplace("/","",$valor);
$valor = str_ireplace("\ ","",$valor);
$valor = str_ireplace("&","",$valor);  
$valor = addslashes($valor);
$valor = addslashes($valor);
return $valor;
}
$claveDesdBd='';
$res='';
$clave=limpiarCadena($clave);
$correo=limpiarCadena($correo);
$correcto=false;



$sql="SELECT id, usuario, clave, estatus, idpersona, idcarg_pers, fecha, ip
  FROM persona.usuario  WHERE usuario='$correo' AND estatus='1' ";

	$respuestaSql=$conex->sentencia($sql);
	while($data=$conex->filas($respuestaSql))
	{
		 $claveDesdBd=$data['clave'];//strtoupper($data['clave']);
		 $id_usuario_=$data['id'];
	}
	
		if($claveDesdBd==$clave)//strtoupper(md5($clave)))
			{  $correcto = true;}
		else
			{ $correcto = false;}
			
	if($correcto==false)
	{
	$numregs=0;
    @session_destroy();
		?>
		<script type="text/javascript">
			alert("SISINV INFORMA QUE NO TENDRA ACCESO AL SISTEMA O LA CLAVE ES INCORRECTA");
			var pagina="../";
		function redireccionar() 
		{location.href=pagina;} 
		setTimeout ("redireccionar()", 10);  
	  </script>
		<?php
	}	else	{
		$res=$conex->sentencia("SELECT 
p.id as id_persona, p.cedula, p.nombre, p.apellido, p.direccion, p.telefono, p.estatus,
cp.id, cp.persona, cp.cargo, cp.usuario, cp.estatus,
c.id as id_cargo, c.nombre as nomcargo, c.estatus,
(u.id) as id_usuario, u.usuario, u.clave, u.estatus, u.idpersona

 FROM 

 persona.persona as p,
 persona.carg_pers AS cp,
 empresa.cargo as c,
 persona.usuario AS u

 WHERE
 p.id=cp.persona
 and cp.cargo=c.id
 and cp.usuario=u.id
 and u.idpersona=p.id
 and u.usuario='$correo' 
 AND u.clave='$clave'");
		$numregs=$conex->numfilas($res);
		while($dato=$conex->filas($res)){
		$_SESSION["cedula"]=$dato["cedula"];
		$_SESSION["nombres"]=$dato["nombre"];
		$_SESSION["apellidos"]=$dato["apellido"];
		$_SESSION["nivel_acceso"]=$dato["id_cargo"];
		$_SESSION["descripcionrol"]=$dato["nombre"];
		$_SESSION["id_usuario"]=$dato["id_usuario"];

$fotsin="sinfoto.png";

if (file_exists("/xampp/htdocs/sisinv/fotos/".$dato['cedula'].".png")){ 
$_SESSION['s_foto']="http://".$_SERVER['SERVER_NAME']."/sisinv/fotos/".$dato['cedula'].".png";
}
else
{ $_SESSION['s_foto']="http://".$_SERVER['SERVER_NAME']."/sisinv/fotos/".$fotsin;}  


		//$_SESSION['s_foto']="http://".$_SERVER['SERVER_NAME']."/sisadmac/stssai/foto/".$dato['cedula'].".jpg";
		$_SESSION["s_usuario"]=$dato["id_persona"];
		}//while
if($numregs>=1)
	{

		?>
		<script type="text/javascript">
			var pagina="index.php";
		function redireccionar() 
		{location.href=pagina;} 
		setTimeout ("redireccionar()", 10);  
	  	</script>
	  	<?php
           // $tiempo=$conex->sentencia("INSERT INTO usuarios.sesiones  VALUES ('$usuario', '$fechass', '$fechass','$fechass', '1', '3','$id_se')");
           // $sesion=$conex->sentencia("INSERT INTO  docente.auditoria_sesion VALUES ('$usuario','$fecha','$ano','3','$ip')");    		
	}//numregs
if($numregs==0)
	{

		?>
		    @session_destroy();
		?>
		<script type="text/javascript">
			alert("SISINV INFORMA QUE NO TENDRA ACCESO AL SISTEMA O LA CLAVE ES INCORRECTA");
			var pagina="../";
		function redireccionar() 
		{location.href=pagina;} 
		setTimeout ("redireccionar()", 10);  
	  </script>
	  <?Php
	  
	}//numregs
	
}//correcto
?>
