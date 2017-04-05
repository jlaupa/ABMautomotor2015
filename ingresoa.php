<?php
session_start();
if (isset($_POST['login'])){
    if ($_POST['user'] && $_POST['password']){

        $userid=$_POST['user'];
        $password=$_POST['password'];
        $db_conn=mysql_connect("localhost","root","");
        mysql_select_db("autos.com", $db_conn);
        $query = "Select * from usuarios where user='".$userid."' and pasw='". $password."'";
        $result =mysql_query($query, $db_conn);
        if (mysql_num_rows($result)>0)    {
            $_SESSION['valid_user']=$userid;
        }
    }
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Login</title>
</head>

<body>
<h1>Login</h1>
<?php
//if (session_is_registered("valid_user"))

if (isset($_SESSION['valid_user']))
{
    echo "Esta logueado como ".$_SESSION['valid_user']."<br>";
    echo "<br>
                      <br><br><br><br>
                     <a href='autos.com.php'>Tabla de Autos</a>
                        <br><br><br><br>
                     <a href=\"chau.php\">Log Out</a><br>";

}
else
{
    if (isset($userid))
    {
        echo "Intentelo de nuevo porfavor";
    }
    else
    {
        echo "Ud no se ha Logueado aun <br>"	;
    }

    echo "<form method=post action=\"ingresoa.php\">";
    echo "<table>";
    echo "<tr><td>User:</td>";
    echo "<td><input type=text name=user></td></tr>";//USERR
    echo "<tr><td>Password:</td>";
    echo "<td><input type=password name=password></td></tr>";//PASSWORD
    echo "<tr><td colspan=2 align=center>";
    echo "<input type=submit name='login' =\"Log in\"></td></tr>";
    echo "</table></form>";
}
?>
<br/>
</body>
</html>