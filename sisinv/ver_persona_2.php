<?php
@session_start();
		$cedula_usu=$_SESSION["cedula"];
		$nombre_usu=$_SESSION["nombres"];
		$apellido_usu=$_SESSION["apellidos"];
		$nivel_usu=$_SESSION["nivel_acceso"];
		$des_rol_usu=$_SESSION["descripcionrol"];
		$id_usuario=$_SESSION["id_usuario"];
		$fotouuario=$_SESSION['s_foto'];

		$fecha=date("d/m/Y");
		
		
function VerpersonaPRE()
{
?>

 
<script type="text/javascript" language="javascript" src="../../js/jquery.dataTables.js"></script>

<script type="text/javascript">
function popup(url,ancho,alto) {
var posicion_x; 
var posicion_y; 

posicion_x=(screen.width/2)-(ancho/2); 
posicion_y=(screen.height/2)-(alto/2); 
window.open(url, "leonpurpura.com", "width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=yes,resizable=no,left="+posicion_x+",top="+posicion_y+"");
}
</script> 
 <?php
require_once('conectarpg.php');
$conex=new BaseDatos();
$conex->conectar($conex->servidor,$conex->usuario,$conex->password,$conex->BD);

$id_=$_REQUEST['id_persona'];
 $sql="SELECT id, cedula, nombre, apellido, direccion, telefono, estatus, precedu
  FROM persona.persona
  where
 id=".$id_.";";
$data_estu=$conex->sentencia($sql);
while($data=$conex->filas($data_estu))
        {
		$CODIGO=$data['id'];
	    $ced=$data['cedula'];
		$nombre=$data['nombre'];
		$apellido=$data['apellido'];
		$direccion=$data['direccion'];
		$telefono=$data['telefono'];
		$estatus=$data['estatus'];
		$precedu=$data['precedu'];
		}
		
		
		$sql_U="SELECT (SELECT  nombre  FROM empresa.cargo where id=cargo) as cargop
  FROM persona.carg_pers
  where persona=$id_ and estatus=1";
$data_estu_u=$conex->sentencia($sql_U);
$numdataus=$conex->numfilas($data_estu_u);
if($numdataus!=''){
while($dataus=$conex->filas($data_estu_u))
        {
		 $cargop=$dataus['cargop'];
		}
	}else{$cargop="No Posee";}
		
		
		
$sql_Usu="SELECT usuario, clave  FROM persona.usuario where idpersona=$id_ and estatus=1";
$data_estu_usu=$conex->sentencia($sql_Usu);
$numdatausua=$conex->numfilas($data_estu_usu);
if($numdatausua){
while($datausua=$conex->filas($data_estu_usu))
        {
		$usuario=$datausua['usuario'];
		$clave=$datausua['clave'];
		}
	}else{$clave="No Posee";  $usuario="No Posee";}


	
$fotsin="sinfoto.png";

if (file_exists("/xampp/htdocs/sisinv/fotos/".$ced.".png")){ 
$foto="http://".$_SERVER['SERVER_NAME']."/sisinv/fotos/".$ced.".png";
}
else
{ 
$foto="http://".$_SERVER['SERVER_NAME']."/sisinv/fotos/".$fotsin;}  


        ?>
<div class="container-fluid-center">
<div class="form-group">
<h2 align="center">FICHA PERSONAL</h2>
<div align="center">
  <table class='table table-bordered' style="width:90%" >
    <tr>
      <td rowspan="3" width="15%"><div align="center"><img src="<?Php echo $foto; ?>" alt=" " height="140"  style="width:100%; "  /></div></td>
      <td width="15%"><div align="center"><em><strong>ID</strong></em></div></td>
      <td width="15%"><div align="justify"><?Php echo $CODIGO; ?></div></td>
      <td width="15%"><p align="center"><em><strong>APELLIDOS</strong></em></p>      </td>
      <td width="20%"><div align="justify"><?Php echo $apellido; ?></div></td>
    </tr>
    <tr>
      <td><div align="center"><em><strong>CEDULA</strong></em></div></td>
      <td><div align="justify"><?Php echo $precedu; echo "<br>"; echo $ced; ?></div></td>
      <td><div align="center"><em><strong>NOMBRES</strong></em></div></td>
      <td><div align="justify"><?Php echo $nombre; ?></div></td>
	</tr>
    <tr>
      <td height="30"><div align="center"><em><strong>TELEFONO</strong></em></div></td>
      <td><div align="justify"><?Php echo $telefono; ?></div></td>
      <td><div align="center"><em><strong>CARGO</strong></em></div></td>
      <td><div align="justify"><?Php echo $cargop; ?></div></td>
	</tr>
    <tr>
      <td><div align="center"><em><strong>DIRECCION</strong></em></div></td>
      <td colspan="3"><div align="justify"><?Php echo $direccion; ?></div></td>
	  <td><!-- Split button -->
<div class="btn-group">
  <button type="button" class="btn btn-info" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ver&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>  </button>
  <ul class="dropdown-menu">
    <li><a href="index_o.php?s=planilla&idpersona=<?Php echo $CODIGO; ?>" target="_blank">Imprimir</a></li>
	<li><a href="javascript:popup('Persona_editar.php?nest=<?php echo $CODIGO; ?>',900,600)">Editar</a></li>
    <li><a href="histo/Record_academicopdf.php" target="_blank">Borrar Usuario</a></li>
  </ul>
</div></td>
	  </tr>
    <tr>
      <td><div align="center"><em><strong>USUARIO</strong></em>:</div></td>
      <td colspan="3"><?Php echo $usuario; ?></td>
      <td><div align="center"><em><strong>CLAVE</strong></em>: <?Php echo $clave; ?></div></td>
      </tr>
  </table>
  

  </div>
  </div>
</div>




<?php

}
?>