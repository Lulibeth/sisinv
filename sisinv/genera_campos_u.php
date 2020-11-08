<style>
.error{
border:1px solid #F30;
}

.normal{
}
</style>
<script language="javascript" type="text/javascript">

//validaciones

// verificar que no se seleccione una semana 2 veces
function verificar(elem){
var dato=parseInt(elem.value);
var cant1=document.getElementById("cantidad").value;
var anterior=cant1-1;
var el=parseInt(document.getElementById("fech"+anterior).options[document.getElementById("fech"+anterior).selectedIndex].value);
 if((dato>el)&&(dato!=el)){
   return false;
   }else{
  alert("Usted no puede realizar la evaluacion en esta fecha");
}


}

// verificar que no se seleccione una semana 2 veces
function verificar2(elem2){
var dato2=parseInt(elem2.value);
 var cant2=document.getElementById("cantidad").value;
 var anterior2=cant2-1;
 var el2=parseInt(document.getElementById("recu"+anterior2).options[document.getElementById("recu"+anterior2).selectedIndex].value);
 if(dato2<=el2){
  alert("Usted no puede realizar el recuperativo esa semana");
  }

}


// valida rango
var total=0;
function porcentaje(ponderacion){
    var elemento=ponderacion.value;
    if ((ponderacion.value!=100)) {
    alert("El porcertaje debe ser del 100 %");
     ponderacion.value=0;
    return false;
       }
}

 function Solo_Numerico(variable){ 
      // Numer=parseInt(variable,10);
	   //alert("numero"+Numer);
	   if(/^(\d|-)?(\d|,)*\.?\d*$/.test(variable)){
       //if (isNaN(Numer)){
           return variable; 
        }
       return "";
    } 
	
    function ValNumero(Control){
        Control.value=Solo_Numerico(Control.value);
   }

// validamos que ponderacion sea numerico

// validamos formulario antes de enviar

   function validar(formulario) {
	   
	  	    

    var i; 
    var n = parseInt(document.formulario.cantidad.value); 
	
    var bError = false; 
	
    for (i = 1; i < n+1; i++){ 
	    bError = bError || (eval("document.formulario.eva" + i + ".value == ''"));
	
	
    if (bError){ 
     alert("Ingrese Evaluacion"+i +""); 
      eval("document.formulario.eva" + i + ".focus()");
	  //eval("document.getElementsByName('nom'+i).style.border = '1px solid #000'");
	 document.getElementById('eva'+i).style.border = "1px solid #BF0000";
     return (false); 
     } else{
		 document.getElementById('eva'+i).style.border = "1px solid #d1d1d1";
		 
		 }
	}
	
 // validar fechas 

 //validar fechas
	 
	  var u; 
    var p = parseInt(document.formulario.cantidad.value); 
    var bError = false; 
	
    for (u = 1; u< p+1; u++){
		
	 bError = bError || (eval("document.formulario.fech"+u+".options[document.formulario.fech"+ u+ ".selectedIndex].value=='0'"));
					  
	
     if (bError){ 
      alert("Seleccione la Semana de Evaluacion"+u +""); 
	  eval("document.formulario.fech" + u + ".focus()");
  
	 document.getElementById('fech'+u).style.border = "1px solid #BF0000";
	   
	        return (false); 
     } else{
		 document.getElementById('fech'+u).style.border = "1px solid #d1d1d1";
		 
		 }
	 
    } 

 // ponderacion

    var j; 
    var m = parseInt(document.formulario.cantidad.value); 
	
    var bError = false; 
    var bError2 = false; 
	
    for (j = 1; j < m+1; j++){ 
	    bError = bError || (eval("document.formulario.ponde" + j + ".value == ''"));
            bError2 = bError2 || (eval("document.formulario.ponde" + j + ".value == '0'"));
	
	
    if (bError){ 
     alert("Ingrese Ponderacion"); 
      eval("document.formulario.ponde" +j + ".focus()");
	  //eval("document.getElementsByName('nom'+i).style.border = '1px solid #000'");
	 document.getElementById('ponde'+j).style.border = "1px solid #BF0000";
     return (false); 
     } else{
		 document.getElementById('ponde'+j).style.border = "1px solid #d1d1d1";
		 
		 }

if (bError2){ 
     alert("La ponderacion debe estar entre 5 -25"); 
      eval("document.formulario.ponde" +j + ".focus()");
	  //eval("document.getElementsByName('nom'+i).style.border = '1px solid #000'");
	 document.getElementById('ponde'+j).style.border = "1px solid #BF0000";
     return (false); 
     } else{
		 document.getElementById('ponde'+j).style.border = "1px solid #d1d1d1";
		 
		 }
	}



    var tt; 
    var bb = parseInt(document.formulario.cantidad.value); 
    var bError = false; 
	
    for (tt = 1; tt< bb+1; tt++){
		
	 bError = bError || (eval("document.formulario.recu"+tt+".options[document.formulario.recu"+ tt+ ".selectedIndex].value=='0'"));
					  
	
     if (bError){ 
      alert("Seleccione la semana de recuperacion"+tt+""); 
	  eval("document.formulario.recu" + tt + ".focus()");
      
	 document.getElementById('recu'+tt).style.border = "1px solid #BF0000";
	   
	        return (false); 
     } else{
		 document.getElementById('recu'+tt).style.border = "1px solid #d1d1d1";
		 
		 }
	 
    } 


 if (document.formulario.total.value<100){ 
       alert("Las evaluaciones ingresadas no cumplen en 100%"); 
       return false;
       } 


} // fin validar formulario 

//sumar campos
function sumar(){

total=0;total2=0;
// cantidad de elementos generados
var cant=document.getElementById("cantidad").value;
//recorremos los elementos a sumar
for(y=1;y<=cant;y++){
 var el=parseInt(document.getElementById("ponde"+y).value);
 total= parseInt(total)+el; 
// sumanos los valores
  }
 
document.getElementById("total").value= parseInt(total); // asignamos al campo de texto total 

// verificamos que la suma no sea mas de 100  
 var b=parseInt(document.getElementById("total").value);

 if(b<100){
 document.getElementById('mas').disabled = false;
 document.getElementById('enviar').disabled = true; 
 }

 if (b>=100){
 // si es mayor a 100 le asignamos el valor restante al ultimo campo generado;
 
   for(z=1;z<=cant-1;z++){
   
   var el2=parseInt(document.getElementById("ponde"+z).value);
   total2=total2+el2;
   }
   var resto=100-total2;
   document.getElementById("ponde"+cant).value=resto;
   document.getElementById('mas').disabled = true;
   document.getElementById('enviar').disabled = false;
   document.getElementById("total").value=100;
document.getElementById("agamas").innerHTML='<div ><a onClick="agregarUsuario()"  name="Agregar" id="mas" class="btn blue one" disabled="disabled">Agregar +</a></div>';
 }
    }
	
// fin funcion sumar

function restar(){
total=0;total2=0;
// cantidad de elementos generados30
var cant=document.getElementById("cantidad").value;
//recorremos los elementos a sumar
for(y=1;y<=cant;y++){
 var el=parseInt(document.getElementById("pon"+y).value);
 total= parseInt(total)+el; // sumanos los valores
  }
  document.getElementById("total").value=total; // asignamos al campo de texto total 
  
// verificamos que la suma no sea mas de 100  
 var b=document.getElementById("total").value;
 
if(b<100){
 document.getElementById('mas').disabled = false;
 }
    }    

// crear campos   
     
       var posicionCampo=2;
       var bandera=0;
         function agregarUsuario(){
		  /*  var cantt=parseInt(document.getElementById("cantidad").value);
          if(cantt=1){
		   alert("entra la primera vez"+cantt);
		   var x=1;}
		    if(cantt>2){*/
			 var x=posicionCampo-1;
			/* alert ("entra" +x);
		  }*/
	      var n=document.getElementById("eva"+x).value;
          var p=document.getElementById("ponde"+x).value;
          var fe=parseInt(document.getElementById("fech"+x).options[document.getElementById("fech"+x).selectedIndex].value);
          var re=parseInt(document.getElementById("recu"+x).options[document.getElementById("recu"+x).selectedIndex].value);
		

                      
            if((n!="")&&(p!="")&&(fe!="0")&&(re!="0")&&(fe<=re)){
             document.getElementById('recu'+x).style.border = "1px solid #e1e1e1";
             document.getElementById('fech'+x).style.border = "1px solid #e1e1e1";
             document.getElementById('eva'+x).style.border = "1px solid #e1e1e1";
             document.getElementById('ponde'+x).style.border = "1px solid #e1e1e1";
              
             // colocamos de solo lectura los campos
              //document.getElementById('recu'+x).readOnly=true; 
          //   document.getElementById('fech'+x).readOnly=true; 
          //  document.getElementById('eva'+x).readOnly=true; 
           // document.getElementById('ponde'+x).readOnly=true; 

            nuevaFila = document.getElementById("tablaUsuarios").insertRow(-1)
            nuevaFila.id=posicionCampo;
            nuevaCelda=nuevaFila.insertCell(-1);
            nuevaCelda.innerHTML="<td class='bordes'><div class='col-sm-12'><input class='form-control1' type='text'  title='EJEMPLO:  PRUEBA ESCRITA, TALLER, EXPOSICION , TRABAJO GRUPAL ETC..' name='eva"+posicionCampo+"' id='eva"+posicionCampo+"' ></div></td>";
            
           nuevaCelda=nuevaFila.insertCell(-1);
         nuevaCelda.innerHTML="<td class='bordes'><div class='col-sm-12'><input 'type='text'  title='FECHA EN LA QUE SE APLICARA LA EVALUACION' class='form-control1' size='10'  name='fech"+posicionCampo+"' id='fech"+posicionCampo+"'></div></td>";
	   var nuevoSelect2="";
            nuevoSelect2+="<td class='bordes'><div class='col-sm-12'><select name='fech"+posicionCampo+"'  title='FECHA EN LA QUE SE APLICARA LA EVALUACION' class='form-control1' onchange='verificar(this);' id='fech"+posicionCampo+"'>";
            nuevoSelect2+="<option value='0'>Seleccione</option> ";
           <?php for($t3=$inicia_en;$t3<=$semanas_totales;$t3++){?>
		    nuevoSelect2+="<option value='<?php echo $t3; ?>'>Semana <?php echo $t3; ?></option> ";
            <?php }?>
            nuevoSelect2+="</select></div></td>";
            nuevaCelda.innerHTML=nuevoSelect2;
                  
          
			
	    nuevaCelda=nuevaFila.insertCell(-1);
            nuevaCelda.innerHTML="<td class='bordes'>%<div class='col-sm-11'><input  onblur='porcentaje(this); sumar();' type='text' onkeyup='return ValNumero(this);'  class='form-control1' size='10' name='ponde"+posicionCampo+"' id='ponde"+posicionCampo+"' title='PORCENTAJE QUE TENDRA DICHA EVALUACION ENTRE EL 1 Y 25 %'></div></td>";
			
			
	 nuevaCelda=nuevaFila.insertCell(-1);
	    var nuevoSelect2="";
            nuevoSelect2+="<td  class='bordes'><div class='col-sm-12'> <select name='recu"+posicionCampo+"'  title='FECHA EN LA QUE SE APLICARA EL RECUPERATIVO DE LA  EVALUACION' class='form-control1' onchange='verificar2(this);' id='recu"+posicionCampo+"'>";
            nuevoSelect2+="<option value='0'>Seleccione</option> ";
			    <?php for($t4=$inicia_en;$t4<=$semanas_totales;$t4++){?>
            nuevoSelect2+="<option value='<?php echo $t4;?>'>Semana <?php echo $t4;?></option> ";
            <?php }?>
            nuevoSelect2+="</select></div></td>";
            nuevaCelda.innerHTML=nuevoSelect2;
			
  
           document.getElementById("cantidad").value = posicionCampo;   
           posicionCampo++;


          nuevaCelda=nuevaFila.insertCell(-1);
          nuevaCelda.innerHTML="<td><img width='24' height='24'  src='Imagenes/menos.png' title='Eliminar Evaluacion' onclick='eliminarUsuario(this);'/></td>";
          
	}else{

           if (n=="") {
        
             alert('Ingrese Evaluacion');
             document.getElementById('eva'+x).style.border = "1px solid #BF0000";
             }
            else if (fe=='0') {
              alert('Selecione Fecha');
             document.getElementById('eva'+x).style.border = "1px solid #e1e1e1"; 
             document.getElementById('fech'+x).style.border = "1px solid #BF0000";
             } else if (p=="") {
              alert('Ingrese Ponderacion');
             document.getElementById('fech'+x).style.border = "1px solid #e1e1e1"; 
             document.getElementById('ponde'+x).style.border = "1px solid #BF0000";
             } 
            else if (re=='0') {
            alert('Selecione Recuperativo');
            document.getElementById('ponde'+x).style.border = "1px solid #e1e1e1"; 
            document.getElementById('recu'+x).style.border = "1px solid #BF0000";
            }else if (re < fe){
            alert('El recuperativo no puede realizarse antes de la evaluacion');
            document.getElementById('recu'+x).style.border = "1px solid #BF0000";
            
                  }    
                
   
}	// fin else principal	
	
        }// fin funcion agregar	

            function eliminarUsuario(obj){
                var oTr = obj;
                while(oTr.nodeName.toLowerCase()!='tr'){
                oTr=oTr.parentNode;
                }
		var cc =document.getElementById("cantidad").value;
		document.getElementById("cantidad").value=cc-1;
		 posicionCampo=posicionCampo-1;
		  
		       var root = oTr.parentNode;
                root.removeChild(oTr);
                sumar();
				
								             
        }
        </script>
