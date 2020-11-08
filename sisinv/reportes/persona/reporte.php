<?php

require_once('../../conectarpg.php');
$conex=new BaseDatos();
$conex->conectar($conex->servidor,$conex->usuario,$conex->password,$conex->BD);

$id_=$_REQUEST['nest'];
 $sql="SELECT id, cedula, nombre, apellido, direccion, telefono, estatus, precedu
  FROM persona.persona
  where
 id=".$id_.";";
$data_estu=$conex->sentencia($sql);
$data=$conex->filas($data_estu);
        
    $codigo=$data['id'];
      $ced=$data['cedula'];
    $nombre=$data['nombre'];
    $apellido=$data['apellido'];
    $direccion=$data['direccion'];
    $telefono=$data['telefono'];
    $estatus=$data['estatus'];
    $precedu=$data['precedu'];
    
    
    
    $sql_U="SELECT (SELECT  nombre  FROM empresa.cargo where id=cargo) as cargop
  FROM persona.carg_pers
  where persona=$id_ and estatus=1";
$data_estu_u=$conex->sentencia($sql_U);
$numdataus=$conex->numfilas($data_estu_u);
if($numdataus!=''){
$dataus=$conex->filas($data_estu_u);

     $cargop=$dataus['cargop'];
    
  }else{$cargop="No Posee";}
    
    
    
$sql_Usu="SELECT usuario, clave  FROM persona.usuario where idpersona=$id_ and estatus=1";
$data_estu_usu=$conex->sentencia($sql_Usu);
$numdatausua=$conex->numfilas($data_estu_usu);
if($numdatausua){
$datausua=$conex->filas($data_estu_usu);
    $usuario=$datausua['usuario'];
    $clave=$datausua['clave'];
    
  }else{$clave="No Posee";  $usuario="No Posee";}

echo "

  <html>

      <head>

        <meta charset='UTF-8'>
        <title>Reporte del Empleado N° $codigo</title>
<style>
.head {
  background-color: #ffffff;
  color: #000000;
  border: none;
}

.footer {
  font-size: 15px;
  background-color: #ffffff;
  color: #000000;
  border: none;
}

table {
  width:100%;
  text-align: center;
  border-collapse: collapse;
}

th {
  font-size: 20px;
}

td {
  font-size: 15px;
}

th, td {
  border: 1px solid black;
  padding: 7px;
}

.nada {
  border: none;
  padding: 15px;
}

.espacio {
  border: none;
  padding: 7px;
}</style>
      </head>

      <body>
        <table>
          <tr class='head'>
            <th class='head' colspan='1' style='text-align: center;'><img src='../../logo/MARYHOR(2).png' width='250px'></th>
            <th class='head' colspan='3' style='text-align: center;'><h3>Reporte del Empleado <br> N° $codigo</h3></th>
            <th class='head' colspan='2'></th>
          </tr>
          <tr class='nada'>
            <th class='nada' colspan='6'></th>
          </tr>
          <tr class='tr'>
            <th class='th' colspan='1'>Código</th>
            <th class='th' colspan='2'>Nombre</th>
            <th class='th' colspan='2'>Apellido</th>
            <th class='th' colspan='1'>Teléfono</th>
          </tr>
          <tr class='tr'>
            <td class='td' colspan='1'>$codigo</td>
            <td class='td' colspan='2'>$nombre</td>
            <td class='td' colspan='2'>$apellido</td>
            <td class='td' colspan='1'>$telefono</td>
          </tr>
          <tr class='espacio'>
            <th class='espacio' colspan='6'></th>
          </tr>
          <tr class='tr'>
            <th class='th'colspan='1'>Cedula</th>
            <th class='th'colspan='5'>Dirección</th>
          </tr>
          <tr class='tr'>
            <td class='td'colspan='1'>$precedu$ced</td>
            <td class='td'colspan='5'>$direccion</td>
          </tr>
          <tr class='espacio'>
            <th class='espacio' colspan='6'></th>
          </tr>
          <tr class='tr'>
            <th class='th' colspan='2'>Cargo</th>
            <th class='th' colspan='2'>Usuario</th>
            <th class='th' colspan='2'>Clave</th>
          </tr>
          <tr class='tr'>
            <td class='td' colspan='2'>$cargop</td>
            <td class='td' colspan='2'>$usuario</td>
            <td class='td' colspan='2'>$clave</td>
          </tr>
          <tr class='nada'>
            <th class='nada' colspan='6'></th>
          </tr>
          <tr class='footer'>
              <td class='footer' colspan='1' style='text-align: left;'>
                <p><b>Dirección: </b>$empresa[dir_emp]<br>
                <b>E-mail: </b>$empresa[cor_emp]<br>
                <b>Teléfono: </b>$empresa[tel_emp]</p>
              </td>
              <td class='footer' colspan='3' style='text-align: center;'>
                <p>
                  $empresa[nom_emp]<br>
                  $empresa[rif_emp]<br>
                </p>
              </td>
              <td class='footer' colspan='2' style='text-align: right;'>
                <p>
                  <b>Horario:</b><br>
                  $empresa[hou_emp]<br>
                  $empresa[hod_emp]<br>
                </p>
              </td>
            </tr>
        </table>
      </body>

    </html>

";

  ?>