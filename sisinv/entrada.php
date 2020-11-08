<?php
@session_start();
require_once('conectarpg.php'); 
$conex=new BaseDatos();
$conex->conectar($conex->servidor,$conex->usuario,$conex->password,$conex->BD);

$sql="SELECT id, cedula, nombre, apellido, direccion, telefono, estatus, usuario, 
       fecha, ip
  FROM persona.persona
  where id=1";

	$respuestaSql=$conex->sentencia($sql);
	while($data=$conex->filas($respuestaSql))
	{
		echo $claveDesdBd=$data['nombre'];
		 echo $id_usuario_=$data['apellido'];
	}


/*
$fecha=date("d/m/Y - H:i:s");
$fechass =date('Y-m-d h:i:s ');
$ano=date("Y");
$ip=$_SERVER['REMOTE_ADDR'];

$correo=strtoupper($_POST["login"]);
$clave=strtoupper($_POST["clave"]);
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
$sql="
SELECT *  FROM usuarios.usuarios WHERE usuario='$correo' AND id_estatus='1' ";

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
			alert("NO TIENE ACCESO AL SISTEMA O CLAVE INCORRECTA");
			var pagina="../stssai/Lg.php";
		function redireccionar() 
		{location.href=pagina;} 
		setTimeout ("redireccionar()", 10);  
	  </script>
		<?php
	}	else	{
		$res=$conex->sentencia("SELECT 
u.id, 
u.id_persona, 
u.cambioclave,
p.id as idper, 
p.cedula, 
p.nombres, 
p.apellidos, 
((SELECT descripcion  FROM persona.prefijo_cedula as pre where pre.id=p.pre_cedula)||p.cedula ) AS cedulacom, 
r.rol_id as id_rol, 
rl.descripcion
  FROM 
  usuarios.usuarios as u,
  persona.persona as p,
  usuarios.usuarios_rol as r,
  usuarios.rol as rl
  where 
      u.usuario='$correo' 
  AND u.clave='$clave'
  AND u.id_persona=p.id 
  AND r.persona_id=p.id
  AND rl.id_rol=r.rol_id");
		$numregs=$conex->numfilas($res);
		while($dato=$conex->filas($res)){
		$_SESSION["cons_cedula"]=$dato["cedulacom"];
		$_SESSION["cambioClave"]=$dato["cambioclave"];
		$_SESSION["cons_nombres"]=$dato["nombres"];
		$_SESSION["cons_apellidos"]=$dato["apellidos"];
		$_SESSION["furma_aut"]=substr($dato["apellidos"],1,3).substr($dato["nombres"],0,5);
		$_SESSION["idper"]=$dato["idper"];
		$_SESSION["s_nivel_acceso"]=$dato["id_rol"];
		$_SESSION["descripcionrol"]=$dato["descripcion"];

$fotsin="sinfotoh.png";

if (file_exists("/wamp/www/stssai/foto/".$dato['cedula'].".jpg")){ 
$_SESSION['s_foto']="http://".$_SERVER['SERVER_NAME']."/sisadmac/stssai/foto/".$dato['cedula'].".jpg";
}
else
{ $_SESSION['s_foto']="http://".$_SERVER['SERVER_NAME']."/sisadmac/stssai/foto/".$fotsin;}  


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
			alert("NO TIENE ACCESO AL SISTEMA O CLAVE INCORRECTA");
			var pagina="../stssai/Lg.php";
		function redireccionar() 
		{location.href=pagina;} 
		setTimeout ("redireccionar()", 10);  
	  </script>
	  <?Php
	  
	}//numregs
	
}//correcto


*/

?>
