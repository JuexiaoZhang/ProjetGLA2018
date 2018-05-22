<?php
require_once("../model/bd.php");
$q=$_GET["q"];


$bd = new Bd();
$co= $bd->connexion();

//mysql_select_db("ajax_demo", $co);

$sql="SELECT * FROM article WHERE idArticle = '".$q."'";

$result = mysqli_query($co,$sql);

echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";

while($row = mysqli_fetch_row($result))
 {
 echo "<tr>";
 echo "<td>" . $row[0] . "</td>";
 echo "<td>" . $row[1] . "</td>";
 echo "<td>" . $row[2] . "</td>";
 echo "<td>" . $row[3] . "</td>";
 echo "<td>" . $row[4] . "</td>";
 echo "</tr>";
 }
echo "</table>";


mysqli_close($co);
?>