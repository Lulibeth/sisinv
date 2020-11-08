<?php 
class BaseDatos{
  var $servidor="127.0.0.1";
  var $usuario="sisinv";
  var $password="1234";  
  var $BD="sisinv"; 
 
 function conectar($servidor,$usuario,$password,$BD){
 $cnx=pg_connect("host=$servidor dbname=$BD user=$usuario password=$password");

 if(!$cnx){ echo "<script> document.location.href='http://".$_SERVER['SERVER_NAME']."/503.php'</script>"; }
	return $cnx;
	}

	
//---------------------------------------------------------------------------------------------		
	function sentencia($query)
	{
		$resultado=pg_query($query);
		return $resultado;
		cerrar();
	}
//---------------------------------------------------------------------------------------------	
          function numfilas($resultado)
	{
		$n=pg_num_rows($resultado);
		return $n;
		cerrar();
	}
//---------------------------------------------------------------------------------------------	
	function filas($resultado)
	{
	   $campo=pg_fetch_array($resultado);
	   return $campo;
	   cerrar();
	}
//---------------------------------------------------------------------------------------------	
	function cerrar()
	{
     	unset($_SESSION['v_cedula']);
		unset($_SESSION['clave']);
                
				 echo "estamos saliendo";
				 
	    pg_close();
		session_destroy(); // new in version 1.92
		header("Location: ../index.php");
	}
//-------------------------PARA CERRAR SESSION--------------------------------------------------------	
	function salir_sesion() {
		unset($_SESSION['v_cedula']);
		unset($_SESSION['clave']);
                echo "estamos saliendo";
		//unset($_SESSION['logged_in']);
		session_destroy(); // new in version 1.92
		header("Location: Constancias/salir.php");
		exit;
	}
//----------------------------------------------------------------------------

}//clase base

?>
