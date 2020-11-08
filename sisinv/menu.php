<?Php
@session_start();
$nomusuario=$_SESSION["nombres"];
$alusuario=$_SESSION["apellidos"];
$fotouuario=$_SESSION['s_foto'];

	$cedula_usu=$_SESSION["cedula"];
		$nombre_usu=$_SESSION["nombres"];
		$apellido_usu=$_SESSION["apellidos"];
		$nivel_usu=$_SESSION["nivel_acceso"];
		$des_rol_usu=$_SESSION["descripcionrol"];
		$id_usuario=$_SESSION["id_usuario"];
		$fecha=date("d/m/Y");
?>
<!--/sidebar-menu-->

<div class="sidebar-menu">
	<header class="logo"> </header>
		            <span id="logo"><h1 align="center">MarYhor</h1></span> 
			              <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
			
				<div class="down">	
				     <a><img src="<?Php echo $fotouuario;?>" width="100" height="100"></a>
				     <a><span class=" name-caret"><?Php echo $nomusuario; echo " "; echo $alusuario; ?> </span></a>
					 <p>Sistema de Inventario MARYHOR </p>
	            </div>
							   <!--//down-->

<div class="menu">
	<ul id="menu" >
	<?Php
	if($nivel_usu==1){
	?>
		<li><a href="index.php"><i class="fa fa-home"></i> <span> Principal</span></a></li>
			<ul id="menu-academico-sub" >
			
<li id="menu-academico" ><a href="#"><i class="fa fa-group"></i> Persona<span class="fa fa-angle-right" style="float: right"></span></a>
		<ul id="menu-academico-sub" >
			<li id="menu-academico-avaliacoes" ><a href="index.php?s=basicoper">Ingresar</a></li>
			<li id="menu-academico-boletim" ><a href="index.php?s=coper">Consultar</a></li>
	    </ul>
</li>
				
<li id="menu-academico" ><a href="#"><i class="fa fa-shopping-cart"></i> <span> Producto</span><span class="fa fa-angle-right" style="float: right"></span></a>
	    <ul id="menu-academico-sub" ><!-- inpro-->
			<li id="menu-academico-avaliacoes" ><a href="index.php?s=basicopro">Ingresar</a></li>
			<li id="menu-academico-boletim" ><a href="index.php?s=basicoprocon">Consultar</a></li>
			<li id="menu-academico-boletim" ><a href="index.php?s=basicoprore">Reporte</a></li>
		</ul>
</li>
				

				
				
 <li id="menu-academico" ><a href="#"><i class="fa fa-dollar"></i> Caja<span class="fa fa-angle-right" style="float: right"></span></a>
		 <ul id="menu-academico-sub" >
			 <li id="menu-academico-boletim" ><a href="index.php?s=factura">Facturar </a></li>
			 <li id="menu-academico-boletim" ><a href="validation.html">Consultar</a></li>
			 <li id="menu-academico-boletim" ><a href="index.php?s=basicoprocon">Reporte</a></li>
		 </ul>
</li>
				
<li id="menu-academico" ><a href="#"><i class="fa fa-briefcase"></i> Empresa<span class="fa fa-angle-right" style="float: right"></span></a>
		<ul id="menu-academico-sub" >
			<li id="menu-academico-avaliacoes" ><a href="index.php?s=basicoempre">Ingresar</a></li>
			<li id="menu-academico-avaliacoes" ><a href="index.php?s=basicoemprecon">Consultar</a></li>
		</ul>
</li>						 
	<?Php
	}  // fin usuario administrador 
	?>

<?Php
	if($nivel_usu==2){
	?>
		<li><a href="index.php"><i class="fa fa-home"></i> <span> Principal</span></a></li>
			<ul id="menu-academico-sub" >
			
<li id="menu-academico" ><a href="#"><i class="fa fa-group"></i> Persona<span class="fa fa-angle-right" style="float: right"></span></a>
		<ul id="menu-academico-sub" >
			<li id="menu-academico-avaliacoes" ><a href="index.php?s=basicoper">Ingresar</a></li>
			<li id="menu-academico-boletim" ><a href="index.php?s=coper">Consultar</a></li>
	    </ul>
</li>
				
<li id="menu-academico" ><a href="#"><i class="fa fa-shopping-cart"></i> <span> Producto</span><span class="fa fa-angle-right" style="float: right"></span></a>
	    <ul id="menu-academico-sub" ><!-- inpro-->
			<li id="menu-academico-avaliacoes" ><a href="index.php?s=basicopro">Ingresar</a></li>
			<li id="menu-academico-boletim" ><a href="index.php?s=basicoprocon">Consultar</a></li>
			<li id="menu-academico-boletim" ><a href="index.php?s=basicoprore">Reporte</a></li>
		</ul>
</li>
				

				
				
 <li id="menu-academico" ><a href="#"><i class="fa fa-dollar"></i> Caja<span class="fa fa-angle-right" style="float: right"></span></a>
		 <ul id="menu-academico-sub" >
			 <li id="menu-academico-boletim" ><a href="index.php?s=factura">Facturar </a></li>
			 <li id="menu-academico-boletim" ><a href="validation.html">Consultar</a></li>
			 <li id="menu-academico-boletim" ><a href="index.php?s=basicoprocon">Reporte</a></li>
		 </ul>
</li>
				
<li id="menu-academico" ><a href="#"><i class="fa fa-briefcase"></i> Empresa<span class="fa fa-angle-right" style="float: right"></span></a>
		<ul id="menu-academico-sub" >
			<li id="menu-academico-avaliacoes" ><a href="index.php?s=basicoemprecon">Consultar</a></li>
		</ul>
</li>						 
	<?Php
	}  // fin usuario PROPIETARIO 
	?>
<?Php
	if($nivel_usu==3){
	?>
		<li><a href="index.php"><i class="fa fa-home"></i> <span> Principal</span></a></li>
			<ul id="menu-academico-sub" >
			
<li id="menu-academico" ><a href="#"><i class="fa fa-group"></i> Persona<span class="fa fa-angle-right" style="float: right"></span></a>
		<ul id="menu-academico-sub" >
			<li id="menu-academico-boletim" ><a href="index.php?s=coper">Consultar</a></li>
	    </ul>
</li>
				
<li id="menu-academico" ><a href="#"><i class="fa fa-shopping-cart"></i> <span> Producto</span><span class="fa fa-angle-right" style="float: right"></span></a>
	    <ul id="menu-academico-sub" ><!-- inpro-->
			<li id="menu-academico-boletim" ><a href="index.php?s=basicoprocon">Consultar</a></li>
			<li id="menu-academico-boletim" ><a href="index.php?s=basicoprore">Reporte</a></li>
		</ul>
</li>
							
<li id="menu-academico" ><a href="#"><i class="fa fa-briefcase"></i> Empresa<span class="fa fa-angle-right" style="float: right"></span></a>
		<ul id="menu-academico-sub" >
			<li id="menu-academico-avaliacoes" ><a href="index.php?s=basicoemprecon">Consultar</a></li>
		</ul>
</li>						 
	<?Php
	}  // fin usuario EMPLEADO 
	?>










			
	</ul>
		<li><a href="salir.php"><i class="fa fa-power-off"></i> <span> Salir</span></a></li>
	</ul>			
<div class="clearfix"></div>		
</div>	

