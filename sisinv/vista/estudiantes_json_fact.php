﻿<?php
//	error_reporting(E_ALL);
//	ini_set("display_errors", 1);
@session_start();
	/*if((!array_key_exists('s_nivel_acceso',$_SESSION)) or (!array_key_exists('s_nivel',$_SESSION)))
	{
		exit;
	}*/
	require_once('../conectarpg.php'); 
	$conexHM=new BaseDatos();
	$conexHM->conectar($conexHM->servidor,$conexHM->usuario,$conexHM->password,$conexHM->BD);
	$nombre='';
	$capoOrdernar='descestatus';
	$orderBy='desc';
	$pagina=1;
	if(array_key_exists('nombre',$_REQUEST))
		$nombre=$_REQUEST['nombre'];
	if(array_key_exists('capoOrdernar',$_REQUEST))
		$capoOrdernar=$_REQUEST['capoOrdernar'];
	if(array_key_exists('orderBy',$_REQUEST))
		$orderBy=$_REQUEST['orderBy'];
	if(array_key_exists('page',$_REQUEST))
		$pagina=$_REQUEST['page'];	
	if($pagina==0)
		$pagina=1;
	$pagina--;
	$sql="SELECT (f.id_fact) as id_factura, p.id, ((SELECT  descripcion  FROM persona.prefijo_cedula WHERE id=p.pre_cedula)||p.cedula) as cedula, 
p.nombres, p.apellidos,case
when (f.status_fact) = 1 then 'PROCESADA'
when (f.status_fact) = 2 then 'ANULADA'
end as 	descestatus
FROM persona.persona as p, persona.estudiante as e, facturacion.factura as f 
				where
					concat((f.id_fact)||' '||((SELECT  descripcion  FROM persona.prefijo_cedula WHERE id=pre_cedula)||cedula),' ',apellidos,' ',nombres)
					ilike '%".$nombre."%'  and e.id_persona=p.id and f.id_per=p.id
				order by $capoOrdernar $orderBy	";
		$resHMN=$conexHM->sentencia($sql);
	$total= $conexHM->numfilas($resHMN);
	//Define el número 0 para empezar a paginar multiplicado por la cantidad de resultados por página
	$cantidad_resultados_por_pagina = 10;
	//$empezar_desde = ($pagina-1) * $cantidad_resultados_por_pagina;
	$final=$pagina* $cantidad_resultados_por_pagina;
	$total_registros = pg_num_rows($resHMN);
	$total_paginas = ceil($total_registros / $cantidad_resultados_por_pagina); 
	$sql.="
	LIMIT $cantidad_resultados_por_pagina offset $final
	";
	//echo $sql;
	$resHMN=$conexHM->sentencia($sql);
	 $porPagina = pg_num_rows($resHMN);
	 if(!$porPagina);
		$porPagina=1;
	$data=array();
	
	while($reg=pg_fetch_assoc($resHMN))
	{
		array_push($data, $reg);
	}
		$pagMostrar=$pagina+1;	
	$aux=array(
			'data'=>$data,
			'total'=>$total,
			'path'=>'/sisadmac/stssai/vista/estudiantes_json_fact.php',
			'pagination'=>array(
								'path'=>'/stssai/vista/estudiantes_json_fact.php',
								'current_page'=>$pagina++,
								'per_page'=>$porPagina,
								//ultima pagina
								'last_page'=>ceil($total / $cantidad_resultados_por_pagina),
								),
			//pagina actual
			'current_page'=>$pagina++,
			'per_page'=>$porPagina,
			//ultima pagina
			'last_page'=>ceil(($total / $cantidad_resultados_por_pagina)),
			//mostrando desde
			'from'=>($pagMostrar*$cantidad_resultados_por_pagina)-$cantidad_resultados_por_pagina,
			//mostrando hasta
			'to'=>(($pagMostrar*$cantidad_resultados_por_pagina)-$cantidad_resultados_por_pagina)+count($data)
		);
		//echo('<pre>');
	echo json_encode( $aux);
?>