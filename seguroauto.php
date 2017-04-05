<?php
$borrarauto=$_GET['id'];
echo "ESTAS SEGURO DE BORRAR ESTE ELEMENTO?";
echo "<br></t>
<table border=1 cellpadding=10>
<td><a href='borrar.php?id=$borrarauto' >Yes</a></td>
<td><a href='autos.com.php'>Not</a></td>
</table>";
?>