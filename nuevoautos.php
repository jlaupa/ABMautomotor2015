
<?php
if (isset($_POST['envio'])){
    $db=mysql_pconnect("localhost","root","");
    if (!$db)
    {
        echo "Error: No se puede conectar a la base de datos";
        exit;
    }
    mysql_select_db("autos.com");
    $sql="INSERT INTO auto(Patente,n_Puertas,id_marca,Cilindrada,color)
            VALUES('".$_POST['patente']."','".$_POST['puertas']."','".$_POST['marca']."','".$_POST['cilindrada']."','".$_POST['color']."')";
    $result=mysql_query($sql);
}

?>

<table border=1 cellpadding=3>
    <tr>
        <td bgcolor='#CCC' align=center>ID_Marca </td>
        <td bgcolor='#CCC' align=center>Patente </td>
    </tr>
<?php
$db=mysql_pconnect("localhost","root","");

if (!$db)
{
    echo "Error: No se puede conectar a la base de datos";
    exit;
}

mysql_select_db("autos.com");

$sql="SELECT  marcas.id_marca as id ,marcas.descripcion as descripcion
      FROM marcas";

$result=mysql_query($sql);
$num_result=mysql_num_rows($result);
for ($i=0;$i<$num_result;$i++)
{
$fila=mysql_fetch_array($result);
$r1=stripslashes($fila["id"]);
$r2=stripslashes($fila["descripcion"]);

echo "<tr>";
echo "<td>$r1</td>";
echo "<td>$r2</td>";
echo "</tr>";
}
?>

<FORM METHOD="post" ACTION="nuevoautos.php">
    <p>Patente___:<input type="text" name="patente" size="30" ></p>
    <p>Cilindrada:<input type="text" name="cilindrada" size="30" ></p>
    <p>Color_____:<input type="text" name="color" size="30" ></p>
    <p>Puertas___:<input type="text" name="puertas" size="30" ></p>
    <p>id_marca__:<input type="text" name="marca" size="30" ></p>

    <input type="submit" value="Grabar" name="envio"></t>
    <a href="autos.com.php"> Volver a Pag.Principal</a><br>
    _______________________________________________________

</FORM>

