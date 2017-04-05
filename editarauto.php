<?php
session_start();
echo "<h1>EDITAR</H1>";
if (isset($_SESSION['valid_user'])){

        echo "<p> Editando ".$_SESSION['valid_user']."</p>";
        $db=mysql_pconnect("localhost","root","");

        if (!$db)
        {
            echo "Error: No se puede conectar a la base de datos";
            exit;
        }

        mysql_select_db("autos.com");
    if(isset($_POST['editauto'])){
               $sql="UPDATE auto
               SET Patente='".$_POST['patente']."',n_Puertas='".$_POST['puertas']."',id_marca='".$_POST['idmarca']."',Cilindrada='".$_POST['cilindrada']."',Color='".$_POST['color']."'
               WHERE Patente='".$_POST['pat']."'";
               $result=mysql_query($sql);



}


    if(isset($_POST['editauto'])){
                echo 'se grabo con exito';
                echo " <a href='autos.com.php'> Volver a Pag.Principal</a></p>";
                } else{
         ?>



<Form method="post" ACTION="editarauto.php">
    <p>Patente___<input type="text" name="patente" size="15" value=<?php echo $_GET['id']?>></p>

    <input type="hidden" name="pat" value="<?php echo $_GET['id']?>" ></p>
       <p>idmarca_<select name="idmarca">

            <?php

            mysql_connect("localhost", "root", "");
            mysql_select_db("autos.com");
        $sql= "Select * from marcas";
        $result2=mysql_query($sql);

        $num_result2 = mysql_num_rows($result2);
        if ( $num_result2 == 0)
        {
            exit;
        }else
        {
            echo $num_result2;
        }

        for ($i=0;$i < $num_result2; $i++){
                $fila=mysql_fetch_array($result2);
                ?>

                <option
                    <?php
                    if($fila['id_marca'] == $_GET['id_marca'] ){
                        echo "selected";

                    }
                    ?>
                    value=<?php echo $fila['id_marca']?>><?php echo $fila['descripcion']?></option>

            <?php } ?>
        </select>


    <p>Cilindrada_<input type="text" name="cilindrada" size="15" value="<?php echo $_GET['idm']?>"></p>
    <p>Color_____<input type="text" name="color" size="15" value ="<?php echo $_GET['color']?>"></p>
    <p>Puertas____<input type="text" name="puertas" size="15" value="<?php echo $_GET['puertas']?>"></p>
    <p><input type="submit" value="Editar" name="editauto">
    <a href='autos.com.php'> Volver a Pag.Principal</a></p>
</Form>
<?php
    }

}else
{
    echo "<p> Ud no esta logueado</p>";
    echo "<p> Solo los autorizados pueden ver esta pagina</p>";
    echo "<a href=\"ingresoa.php\"> Logeese porfavor</a>";

}
?>

