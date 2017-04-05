<?php
session_start();

unset($_SESSION['valid_user']);
session_destroy();

?>
<html >
<head>
    <title>Log Out</title>
</head>
<body>
<h1> Log Out </h1>
<?php
if (!isset($_SESSION['valid_user']))
{

    echo "Logged Out.<br>";
}
else
{
    echo "No se pudo desloguear";
}

?>
</body>
</html>
<a href="ingresoa.php">Haga Clik aqui para volver a Pag.Principal</a>
