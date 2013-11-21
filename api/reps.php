<?php

require("../dbinfo.php");

$sql = "SELECT firstname,lastname, title, party, state, bioguide_id FROM sunlight";
$result = mysql_query($sql); 
while($row = mysql_fetch_assoc($result)){
	$rows[] = $row;
}

echo json_encode($rows);

?>