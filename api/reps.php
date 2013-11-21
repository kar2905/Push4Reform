<?php
header('Content-type: application/json');
require("../dbinfo.php");

$sql = "SELECT firstname,lastname, title, party, state, bioguide_id FROM sunlight LIMIT 20";
$result = mysql_query($sql); 
while($row = mysql_fetch_assoc($result)){
	if($row['party'] == 'R'){
		$row['party'] = "Republican";
	}else{
		$row['party'] = "Democrat";
	}
	
	$row['grade'] = "A+";
	$rows[] = $row;
}

echo json_encode($rows);

?>