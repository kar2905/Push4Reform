<?php

require("../dbinfo.php");

$sql = "SELECT * FROM users";
$res = mysql_query($sql);

while($row = mysql_fetch_assoc($res)){
	$rows[] = $row['id'];	
}

echo json_encode($rows);
?>