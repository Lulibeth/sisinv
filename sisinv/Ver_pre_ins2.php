 <script>
function cargarsecmat()
{
//alert("csd");
	
		    var id_per_estum =document.getElementById('id_per_estum').value; 
			var materias =document.getElementById('materias').value; 
				libAjax('form1re1','contenido/Ver_nota_acum.php?id_per_estum='+id_per_estum+'&materias='+materias,'detasecmat', function(){
				$('#materias').css({'display':'inline-block'});
				});

}
</script>
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
@session_start();
      $cedu_usu=$_SESSION["cons_cedula"];
	  $nomb_usu=$_SESSION["cons_nombres"];
	  $ape_usu=$_SESSION["cons_apellidos"];
require_once('conectarpg.php');
$conex=new BaseDatos();
$conex->conectar($conex->servidor,$conex->usuario,$conex->password,$conex->BD);

$generador=$_SESSION["cons_cedula"];
$cedu=$_REQUEST['id_estu'];
$sql="SELECT id, pre_cedula,cedula_escolar, cedula, ced, nombres, apellidos, nacionalidad, 
       nacion_id, estadocivil, estcvl_id, tiposexo, sexo_id, etnia, 
       etnia_id, lu_nac, parroquia_n_id, lures, parroquia_r_id, diresccion, 
       fecha_naci, fecha_ingre, id_estatus
  FROM persona.persona1
  where ced='".$cedu."';";
$data_estu=$conex->sentencia($sql);
while($data=$conex->filas($data_estu))
        {
		$CODIGO=$data['id'];
	    $ced=$data['ced'];
		$cedula_escolar=$data['cedula_escolar'];
		$cedulano=$data['cedula'];
		$APELLIDOS=$data['apellidos'];
		$NOMBRES=$data['nombres'];
		$lures=$data['lures'];
		$diresccion=$data['diresccion'];
		$diretodo=$lures.' '.$diresccion;
		 $NOMGENERO=$data['tiposexo'];
		}
		
		
		$sql_U="SELECT id,  usuario, clave FROM usuarios.usuarios where id_persona=$CODIGO and id_estatus=1";
$data_estu_u=$conex->sentencia($sql_U);
while($dataus=$conex->filas($data_estu_u))
        {
		$usuario=$dataus['usuario'];
	    $clave=$dataus['clave'];
		}
		
				//sexo
		if($NOMGENERO =='MASCULINO') { $fotsin="sinfotoh.png";}
		if($NOMGENERO =='FEMENINO')  {  $fotsin="sinfotom.png";}
if (file_exists("/wamp/www/stssai/foto/".$cedulano.".jpg")){ 
$foto="http://".$_SERVER['HTTP_HOST']."/sisadmac/stssai/foto/".$cedulano.".jpg";
}
else
{ $foto="http://".$_SERVER['HTTP_HOST']."/sisadmac/stssai/foto/".$fotsin;}  
        ?>
<div class="container-fluid-center">
<div class="form-group">
<h2 align="center">FICHA PERSONAL</h2>
<BR/>
<h3 >Datos Principales</h3>
<div align="center">
  <table class='table table-bordered' style="width:90%" >
    <tr>
      <td rowspan="3" width="15%"><div align="center"><img src="<?Php echo $foto; ?>" alt=" " height="140"  style="width:100%; "  /></div></td>
      <td width="15%"><div align="center"><em><strong>ID</strong></em></div></td>
      <td width="15%"><div align="justify"><?Php echo $CODIGO; ?></div></td>
      <td width="15%"><p align="center"><em><strong>APELLIDOS</strong></em></p>      </td>
      <td width="20%"><div align="justify"><?Php echo $APELLIDOS; ?></div></td>
	  <td width="20%"><div align="center"><!-- Split button -->
<div class="btn-group">
  <button type="button" class="btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ver&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>  </button>
  <ul class="dropdown-menu">
    <li><a href="index_o.php?s=planilla&idpersona=<?Php echo $CODIGO; ?>" target="_blank">Planilla</a></li>
	<li><a href="javascript:popup('contenido/Deuda_editar.php?nest=<?php echo $CODIGO; ?>',900,600)">Editar Deuda</a></li>
		    <li><a href="#" data-toggle="modal" data-target="#myModalnotas<?Php echo $CODIGO; ?>">Notas Acomunladas</a></li>
    <li><a href="histo/Record_academicopdf.php" target="_blank">Resumen Academico</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Carga</a></li>
	<li><a href="#">Listados</a></li>
	<li role="separator" class="divider"></li>
	<li><a href="#">Coordinadores</a></li>
  </ul>
</div></td>
    </tr>
    <tr>
      <td><div align="center"><em><strong>CEDULA</strong></em></div></td>
      <td><div align="justify"><?Php echo $cedula_escolar; echo "<br>"; echo $ced; ?></div></td>
      <td><div align="center"><em><strong>NOMBRES</strong></em></div></td>
      <td><div align="justify"><?Php echo $NOMBRES; ?></div></td>
	  <td><div align="center"><!-- Split button -->
<div class="btn-group">
  <button type="button" class="btn btn-info">Solvencia</button>
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>  </button>
  <ul class="dropdown-menu">
    <li><a href="#">Administrativa</a></li>
    <li><a href="#">Academica</a></li>
    <li><a href="#">Economica</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Docente</a></li>
	<li role="separator" class="divider"></li>
	<li><a href="#">Coordinador</a></li>
    <div align="justify"></div>
  </ul>
</div></td>
    </tr>
    <tr>
      <td height="30"><div align="center"><em><strong>TELEFONO</strong></em></div></td>
      <td><div align="justify"><?Php echo $CODIGO; ?></div></td>
      <td><div align="center"><em><strong>CORREO</strong></em></div></td>
      <td><div align="justify"><?Php echo $CODIGO; ?></div></td>
	  <td><div align="center"><!-- Split button -->
<div class="btn-group">
  <button type="button" class="btn btn-warning">&nbsp;Imprimir&nbsp;&nbsp;</button>
  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>  </button>
  <ul class="dropdown-menu">
    <li><a href="#">Record</a></li>
    <li><a href="solicitudes/constancia_estudio.php" target="_blank">Constancia de Estudio</a></li>
    <li><a href="#">Constancia de Buena Conducta</a></li>
	<li><a href="#">Constancia de Solvencia Estudiante</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Actas</a></li>
	<li><a href="#">Constancia de Trabajo</a></li>
	<li role="separator" class="divider"></li>
	<li><a href="#">Listado General de Secciones</a></li>
  </ul>
</div></td>
    </tr>
    <tr>
      <td><div align="center"><em><strong>DIRECCION</strong></em></div></td>
      <td colspan="3"><div align="justify"><?Php echo $diretodo; ?></div></td>
	  <td><div align="center"><em><strong>Responsabilidades</strong></em></div></td>
	  <td ><div align="justify"><?Php echo $CODIGO; ?></div></td>
    </tr>
    <tr>
      <td><div align="center"><em><strong>USUARIO</strong></em>:</div></td>
      <td colspan="3"><?Php echo $usuario; ?></td>
      <td><div align="center"><em><strong>CLAVE</strong></em>:</div></td>
      <td ><?Php echo $clave; ?></td>
    </tr>
  </table>
  <table  class='table table-bordered' style="width:90%">
    <tr>
    <td colspan="3" bgcolor="#CCCCCC"><div align="center">INSCIPCION</div></td>
  </tr>
  <tr>
    <td>Grado/A&ntilde;o</td>
    <td>Secc&oacute;n</td>
    <td>Periodo</td>
  </tr>
  <?Php
  $sql123="	SELECT 
(p.id) as id_per, (e.id) as id_estu,(i.id) id_inscrip, s.nombre_seccion, c.nombre_carrera,
(SELECT nombre_periodo FROM inscripcion.periodo where  id=o.id_periodo) as periodo
	FROM 
persona.persona as p,
persona.estudiante as e,
inscripcion.inscripcion as i,
inscripcion.seccion_materia as m,
inscripcion.seccion_aperturada as s,
inscripcion.oferta as o,
universidad.dest_sectorizacion as ds,
universidad.sectorizacion_materias as sm,
universidad.carreras as c

	WHERE 
    p.id=$CODIGO
and p.id=e.id_persona 
and e.id_estatus=1
and e.id=i.id_esudiante
and i.id_seccion_materia=m.id
and m.seccion_aperturada_id=s.id
and s.id_oferta=o.id
and o.id_det_sectorizacion=ds.id
and ds.id_sectorizacion=sm.id
and sm.carrera=c.id";
$data_estu123=$conex->sentencia($sql123);
while($data123=$conex->filas($data_estu123))
        {
		$nombre_carrera=$data123['nombre_carrera'];
		$periodo=$data123['periodo'];
		$nombre_seccion=$data123['nombre_seccion'];
		
		
  ?>
  <tr>
    <td><?Php echo $nombre_carrera;?></td>
    <td><?Php echo $nombre_seccion;?></td>
    <td><?Php echo $periodo;?></td>
  </tr>
  <?Php } ?>
</table>

  </div>
  </div>
</div>


<!-- Modal notas -->
<div class="modal fade" id="myModal<?Php echo $CODIGO; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="width:100%">
  <div class="modal-dialog" role="document" style="width:90%">
    <div class="modal-content" style="width:100%">
      <div class="modal-header" style="width:95%">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Inscripcion</h4>
      </div>
      <div class="modal-body" style="width:95%">
     <?Php
	 $sql_inscr="SELECT 
iscr_id, des_inscrp, esta_isn, usu_ins, fecha_ins,id_sm, id_sa, nombre_seccion, id_m,
descri_m, uc,id_pers_estu, horas, id_d, id_e, id_o, des_o,id_periodo,id_sede, descri_scm,numero,  
carrera, id_ee, descrp_ee, aprobado_mayora, id_pers_estu, pre_ce_est, ce_est, nomnres_estu, 
apellidos_este, id_sede,carrera,id_doce, pre_ce_doce, ce_doce, nombre_doce, apellidos_doce, descripciopn_eest,estatus_o
  FROM inscripcion.vista_inscrpcion
  where id_pers_estu=$CODIGO and estatus_o=1 order by id_m";
$data_ins=$conex->sentencia($sql_inscr);
while($d_ins=$conex->filas($data_ins))
        {
		$id_est=$d_ins['id_e'];
		$id_pers_estu=$d_ins['id_pers_estu'];
		$nomnres_estu=$d_ins['nomnres_estu'];
		$ce_est=$d_ins['ce_est'];
		$apellidos_este=$d_ins['apellidos_este'];
		$id_sede=$d_ins['id_sede'];
		$carrera=$d_ins['carrera'];
		$id_periodo=$d_ins['id_periodo'];
		}
	  $generadopor=substr($cedu_usu,2,2).substr($nomb_usu,0,4).substr($ape_usu,0,3);
	  $fechaactua=date("d/m/Y h:i:s a");
$sql_periodo="SELECT nombre_periodo FROM inscripcion.periodo  where id=$id_periodo";
$data_periood=$conex->sentencia($sql_periodo);
while($d_p=$conex->filas($data_periood))
        {
		$nombre_periodo=$d_p['nombre_periodo'];
		}
		
$sql_sede="SELECT nombre_sede FROM universidad.sedes  where id=$id_sede";
$data_sede=$conex->sentencia($sql_sede);
while($d_s=$conex->filas($data_sede))
        {
		$nombre_sede=$d_s['nombre_sede'];
		}
		
		$sql_carrera="SELECT nombre_carrera FROM universidad.carreras  where id=$id_periodo";
$data_carrera=$conex->sentencia($sql_carrera);
while($d_c=$conex->filas($data_carrera))
        {
		$carrera=$d_c['nombre_carrera'];
		}
		
			 ?>   
		<table   class="table table-bordered">
    <tr >
    <td colspan="11"><div align="center"><strong>DATOS ACADEMICOS - HISTORIAL DE INSCRIPCION</strong></div></td>
  </tr>
  <tr >
    <td><strong>ID</strong></td>
    <td><?php echo $id_est;?></td>
    <td><strong>CEDULA</strong></td>
    <td><?php echo $ce_est;?></td>
	<td><strong>NOMBRE</strong></td>
	<td colspan="3"><?php echo $nomnres_estu;?></td>
    <td><strong>APELLIDOS</strong></td>
	<td colspan="2"><?php echo $apellidos_este;?></td>
	</tr>
    <tr >
    <td><strong>PERIODO</strong></td>
    <td><?php echo $nombre_periodo;?></td>
    <td><strong>FECHA ACTUAL </strong></td>
    <td><?php echo $fechaactua;?></td>
	<td><strong>CARRERA</strong></td>
	<td colspan="3"><?php echo $carrera;?></td>
	<td><strong>SEDE</strong></td>
	<td colspan="2"><?php echo $nombre_sede;?></td>
	</tr>
     <tr>
    <td colspan="5"> <div align="center"><button type="button" class="btn btn-info">Ver Horario</button></div></td>
    <td colspan="6"> <div align="center">
	<form action="index_o.php?s=hitins" target="_blank" method="post">
	<input name="id_per_estu" type="hidden" value="<?Php echo $id_pers_estu; ?>" />
	<button type="submit" class="btn btn-info">Ver Historial</button>
	
	</form>
	</div></td>
    </tr>
  <tr >
    <td ><div align="center"><strong>N&deg;</strong></div></td>
    <td ><div align="center"><strong>CODIGO</strong></div></td>
    <td ><div align="center"><strong>UNIDAD CURRICULAR </strong></div></td>
    <td colspan="2"><div align="center"><strong>SECTORIZACION</strong></div></td>
    <td><div align="center"><strong>UC</strong></div></td>
    <td><div align="center"><strong>HOR</strong></div></td>
    <td><div align="center"><strong>SECCION</strong></div></td>
    <td><div align="center"><strong>FECHA DE INSCRIPCION </strong></div></td>
    <td><div align="center"><strong>REALIZADA POR </strong></div></td>
    <td><div align="center"><strong>ESTATUS MATERIA</strong></div></td>
  </tr>

  <?Php
  $data_ins2=$conex->sentencia($sql_inscr);
  while($d_ins2=$conex->filas($data_ins2))
        {
		$num++;
		$id_m=$d_ins2['id_m'];
		$descri_m=$d_ins2['descri_m'];
		$descri_scm=$d_ins2['descri_scm'];
		$numero=$d_ins2['numero'];
		$uc=$d_ins2['uc'];
		$horas=$d_ins2['horas'];
		$nombre_seccion=$d_ins2['nombre_seccion'];
		$fecha_ins=$d_ins2['fecha_ins'];
		$usu_ins=$d_ins2['usu_ins'];
		$esta_isn=$d_ins2['esta_isn'];
		$esta_isn=$d_ins2['esta_isn'];


	
  ?>
   <tr >
    <td><?php echo $num;?></td>
    <td><?php echo $id_m;?></td>
    <td><?php echo $descri_m;?></td>
    <td><?php echo $descri_scm;?></td>
	<td><?php echo $numero;?></td>
	<td><?php echo $uc;?></td>
    <td><?php echo $horas;?></td>
    <td><?php echo $nombre_seccion;?></td>
    <td><?php echo $fecha_ins;?></td>
    <td><?php $sql_usu="SELECT (cedula||' '||nombres||' '||apellidos) as usuariore  FROM persona.persona  where id=$usu_ins";
$data_usu=$conex->sentencia($sql_usu);
while($d_usu=$conex->filas($data_usu))
        {
		echo $usuariore=$d_usu['usuariore'];
		}
		 ?></td>
    <td><?php
	$sql_status="SELECT descripcion FROM general.estatus  where id=$esta_isn";
$data_estado=$conex->sentencia($sql_status);
while($d_esta=$conex->filas($data_estado))
        {
		echo $descripcion_est=$d_esta['descripcion'];
		}
	?></td>
  </tr>
    <?Php } ?>
</table>
		
		
      </div>
    </div>
  </div>
</div>
<!-- fin  Modal inscripcion -->



<!-- Modal inscripcion -->
<div class="modal fade" id="myModalnotas<?Php echo $CODIGO; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="width:100%">
  <div class="modal-dialog" role="document" style="width:90%">
    <div class="modal-content" style="width:100%">
      <div class="modal-header" style="width:95%">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Inscripcion</h4>
      </div>
      <div class="modal-body" style="width:95%">
     <?Php
	 $sql_inscr="SELECT 
iscr_id, des_inscrp, esta_isn, usu_ins, fecha_ins,id_sm, id_sa, nombre_seccion, id_m,
descri_m, uc,id_pers_estu, horas, id_d, id_e, id_o, des_o,id_periodo,id_sede, descri_scm,numero,  
carrera, id_ee, descrp_ee, aprobado_mayora, id_pers_estu, pre_ce_est, ce_est, nomnres_estu, 
apellidos_este, id_sede,carrera,id_doce, pre_ce_doce, ce_doce, nombre_doce, apellidos_doce, descripciopn_eest,estatus_o
  FROM inscripcion.vista_inscrpcion
  where id_pers_estu=$CODIGO and estatus_o=1 order by id_m";
$data_ins=$conex->sentencia($sql_inscr);
while($d_ins=$conex->filas($data_ins))
        {
		$id_est=$d_ins['id_e'];
		$id_pers_estu=$d_ins['id_pers_estu'];
		$nomnres_estu=$d_ins['nomnres_estu'];
		$ce_est=$d_ins['ce_est'];
		$apellidos_este=$d_ins['apellidos_este'];
		$id_sede=$d_ins['id_sede'];
		$carrera=$d_ins['carrera'];
		$id_periodo=$d_ins['id_periodo'];
		}
	  $generadopor=substr($cedu_usu,2,2).substr($nomb_usu,0,4).substr($ape_usu,0,3);
	  $fechaactua=date("d/m/Y h:i:s a");
$sql_periodo="SELECT nombre_periodo FROM inscripcion.periodo  where id=$id_periodo";
$data_periood=$conex->sentencia($sql_periodo);
while($d_p=$conex->filas($data_periood))
        {
		$nombre_periodo=$d_p['nombre_periodo'];
		}
		
$sql_sede="SELECT nombre_sede FROM universidad.sedes  where id=$id_sede";
$data_sede=$conex->sentencia($sql_sede);
while($d_s=$conex->filas($data_sede))
        {
		$nombre_sede=$d_s['nombre_sede'];
		}
		
		$sql_carrera="SELECT nombre_carrera FROM universidad.carreras  where id=$id_periodo";
$data_carrera=$conex->sentencia($sql_carrera);
while($d_c=$conex->filas($data_carrera))
        {
		$carrera=$d_c['nombre_carrera'];
		}
$sql_mat_otroi="SELECT id_sm,  descri_m
  FROM inscripcion.vista_inscrpcion
  where 
id_pers_estu=$CODIGO and   esta_isn=1";
$data_mato=$conex->sentencia($sql_mat_otroi);

			 ?>   
		<table   class="table table-bordered">
    <tr >
    <td colspan="11"><div align="center"><strong>DATOS ACADEMICOS - HISTORIAL DE INSCRIPCION</strong></div></td>
  </tr>
  <tr >
    <td><strong>ID</strong></td>
    <td><?php echo $id_est;?></td>
    <td><strong>CEDULA</strong></td>
    <td><?php echo $ce_est;?></td>
	<td><strong>NOMBRE</strong></td>
	<td colspan="3"><?php echo $nomnres_estu;?></td>
    <td><strong>APELLIDOS</strong></td>
	<td colspan="2"><?php echo $apellidos_este;?></td>
	</tr>
    <tr >
    <td><strong>PERIODO</strong></td>
    <td><?php echo $nombre_periodo;?></td>
    <td><strong>FECHA ACTUAL </strong></td>
    <td><?php echo $fechaactua;?></td>
	<td><strong>CARRERA</strong></td>
	<td colspan="3"><?php echo $carrera;?></td>
	<td><strong>SEDE</strong></td>
	<td colspan="2"><?php echo $nombre_sede;?></td>
	</tr>
     <tr>
    <td colspan="11"> <div align="center">
	

      <form name="form1re1"  id="form1re1" method="get">
        <input name="id_per_estum" id="id_per_estum" type="hidden" value="<?Php echo $id_pers_estu; ?>" />
        <select name="materias" id="materias" class="form-control1" onchange="cargarsecmat();" required="">
						<option value="">Seleccione</option>
						<?Php
						while($datpaisana=$conex->filas($data_mato))
						{ 
						 $id_sm=$datpaisana["id_sm"];
						 $descri_m=$datpaisana["descri_m"];
						echo "<option value='$id_sm' > $descri_m</option>";
						}
						?>
						</select>
	</form>
	  </div></td>
    </tr>

    
   
	
 
</table>
		 <div  id="detasecmat">
      
	  </div>
		
      </div>
    </div>
  </div>
</div>
<!-- fin  Modal notas -->