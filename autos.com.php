<?php
 session_start();
    echo "<h1>TABLA DE AUTOS</H1>";

 if (isset($_SESSION['valid_user']))
 {  echo "<p> Esta loguado como ".$_SESSION['valid_user']."</p>";
 ?>

<FORM METHOD="post" ACTION="nuevoautos.php">
    <input type="submit" value="NUEVO" name="nuevoa">
</FORM>

<Form method="post" ACTION="autos.com.php">
    <input type="text" name="bus1" size="21">
    <input type="submit" value="Buscar" name="busqueda">
    <input type="radio" name="radio" value="1">PATENTE</input>
    <input type="radio" name="radio" value="2">MARCA</input>
    <input type="radio" name="radio" value="3">CILINDRADA</input>
    <a href='autos.com.php'>Mostrar Todo</a>

</form>
<table border=1 cellpadding=3>
    <tr>
        <td bgcolor='#CCC' align=center>PATENTE</td>
        <td bgcolor='#CCC' align=center>MARCA</td>
        <td bgcolor='#CCC' align=center>CILINDRADA</td>
        <td bgcolor='#CCC' align=center>COLOR</td>
        <td bgcolor='#CCC' align=center>PUERTAS</td>
        <td bgcolor='#CCC' align=center>ACCION</td>
    </tr>
    <?php

    if (isset($_POST['radio']))
    {
        if ($_POST['radio']==1)
        {
            $field="Patente";
        }
        else if ($_POST['radio']==2)
        {
            $field="descripcion";//marca descripcion
        }
        else
        {
            $field="Cilindrada";
        }
    }
    else

    {
        echo "Debe elegir un criterio de busqueda";
    }

    $db=mysql_pconnect("localhost","root","");

    if (!$db)
    {
        echo "Error: No se puede conectar a la base de datos";
        exit;
    }

    mysql_select_db("autos.com");
    if(isset($_POST['radio'])){
    if(isset($_POST['busqueda'])){

        $busqueda=$_POST['bus1'];
        If ($busqueda==""){

        $sql="SELECT marcas.id_marca as id ,marcas.descripcion as descripcion ,
                        auto.patente as patente , auto.Cilindrada as acil , auto.Color as col ,
                        auto.n_Puertas as puertas
                FROM marcas,auto
                WHERE marcas.id_marca=auto.id_marca and marcas.id_marca";
   //nunca me entra a este sql ^ y lo borro y no afecta nada
                        }
    else{
        $sql="SELECT marcas.id_marca as id ,marcas.descripcion as descripcion ,
                        auto.patente as patente , auto.Cilindrada as acil , auto.Color as col ,
                        auto.n_Puertas as puertas
                          FROM marcas,auto
                          WHERE marcas.id_marca=auto.id_marca
                          and $field like '%$busqueda%'";
             }
    }
    }else{
        $sql="SELECT marcas.id_marca as id ,marcas.descripcion as descripcion ,
                        auto.patente as patente , auto.Cilindrada as acil , auto.Color as col ,
                        auto.n_Puertas as puertas
                FROM marcas,auto
                WHERE marcas.id_marca=auto.id_marca ";
    }

   $result=mysql_query($sql);
    $num_result=mysql_num_rows($result);
    for ($i=0;$i<$num_result;$i++)
                 {
        $fila=mysql_fetch_array($result);
        $r1=stripslashes($fila["id"]);
        $r2=stripslashes($fila["descripcion"]);
        $r3=stripslashes($fila["patente"]);
        $r4=stripslashes($fila["col"]);
        $r5=stripslashes($fila["acil"]);
        $r6=stripslashes($fila["puertas"]);

        echo "<tr>";
        echo "<td>$r3</td>";
        echo "<td>$r2</td>";
        echo "<td>$r5</td>";
        echo  "<td>$r4</td>";
        echo "<td>$r6</td>";
       echo "<td><a href='editarauto.php?id=$r3&idm=$r5&puertas=$r6&color=$r4&id_marca=$r1&descripcion=$r2'>Editar</a>
                        <a href='seguroauto.php?id=$r3'>Borrar</a></td>";//borrar  seguro.
        echo "</tr>";
                 }

    }
    else
   {
        echo "<p> Ud no esta logueado</p>";
        echo "<p> Solo los autorizados pueden ver esta pagina</p>";

    }
    echo "</t>";
    echo "<br>";
    echo "<a href=\"ingresoa.php\"> Volver a la pagina de Logeo</a>";
    ?>
