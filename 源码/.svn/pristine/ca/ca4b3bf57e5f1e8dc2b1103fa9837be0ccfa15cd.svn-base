<?php
$count = 'select count(*) from ownedthing';
$all = mysql_query($count,$conn);
//记录总数
$recordcount = mysql_result($all, 0,0);
//每页多条
$pagesize = 5;
//总页数
$pagecount = ceil($recordcount/$pagesize);
//当前页
$currpage = 1;
if($_GET){
	//$currpage = (int)$_GET['p'];
	$currpage = isset($_GET['p']) ? intval($_GET['p']) : 1;
	$id = $_GET['catalog'];
	if($id==1){
		$sql_ownedthing = "Select * from ownedthing";
	}
	else $sql_ownedthing = "Select * from ownedthing where catalogue_id = $id";
}
else $sql_ownedthing = "Select * from ownedthing";
$currpage = $currpage<1 ? 1 : $currpage;
$currpage = $currpage>$pagecount ? $pagecount : $currpage;

$result_ownedthing = mysql_query($sql_ownedthing,$conn);

echo("<table> <tr>");
$i=1;
while($row= mysql_fetch_array($result_ownedthing)){
	echo("<td> <table> <tr>");
	echo ("</tr> </table> </td>");
	echo("<td> <table> <tr>");
	$c_id = $row['ownthing_id'];
	echo "<a href=\"unuse/unuse.php?id=$c_id\"> <img alt=\"" . $row['ownthing_name'] . "\" title=\"" . $row['ownthing_name'] . " \" class=\"thumb\" src=" . $row['ownthing_pic'] . " onerror=\"this.src='static/images/no.png'\" width=\"250\" height=\"200\" border=\"3\"/></a>";
	echo("<li  class=\"label\"> ");
	echo("<a href=\"unuse/unuse.php?id=$c_id\">". $row["ownthing_name"]." </a>");
	echo("</li>");
	echo ("</tr> </table> </td>");
        if($i % 3 === 0) echo '</tr>';
        $i++;
        next($row);
}
echo("</table>");
