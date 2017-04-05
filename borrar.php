<?php
session_start();
if (isset($_SESSION['valid_user']))
{
    echo "<h1>Eliminado__".$_GET['id']."__</H1>";
 echo "<p> Usted  ".$_SESSION['valid_user']." a borrado este elemento</p>";

    $db=mysql_pconnect("localhost","root","");
    if (!$db)
    {
        echo "Error: No se puede conectar a la base de datos";
        exit;
    }
    mysql_select_db("autos.com");
    $sql="DELETE from auto WHERE Patente='".$_GET['id']."'";
    $result=mysql_query($sql);
    ?>
    <Form method="post" ACTION="autos.com.php">
        <p>Se Borro con exito <input type="submit" value="Regresar a Pag.Principal" name="borrado" size="15"></p>
    </Form>
<?php

}
else
{
    echo "<p> Ud no esta logueado</p>";
    echo "<p> Solo los autorizados pueden ver esta pagina</p>";
    echo "<a href=\"ingresom.php\"> Logeese porfavor</a>";
}
?>
