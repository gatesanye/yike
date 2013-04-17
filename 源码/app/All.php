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
	$sql_ownedthing = "Select * from ownedthing";
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
	echo("<li  class=\"btn\"> ");
	echo("<a href=\"unuse/unuse.php?id=$c_id\">". $row["ownthing_name"]." </a>");
	echo("</li>");
	echo ("</tr> </table> </td>");
        if($i % 3 === 0) echo '</tr>';
        $i++;
        next($row);
}
echo("</table>");
