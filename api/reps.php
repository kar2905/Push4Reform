<?php
/*
API for reps
 */
header('Content-type: application/json');
require("../dbinfo.php");
if(isset($_GET['zip']))
	$zip = mysql_real_escape_string($_GET['zip']);
if(isset($_GET['state']))
	$state=mysql_real_escape_string($_GET['state']);
if(isset($zip)){
$sql = "SELECT firstname,lastname, title, party, b.name_long as state, bioguide_id, rating FROM sunlight a, state b, congressratings_new c, congresszip d WHERE a.district = c.district and a.state = c.state and a.state = b.name_short  and a.district = d.district and a.state = d.state and d.zip = '".$zip."' LIMIT 20";
}
else if(isset($state)){
$sql = "SELECT firstname,lastname, title, party, b.name_long as state, bioguide_id, rating FROM sunlight a, state b, congressratings_new c WHERE a.district = c.district and a.state = c.state and a.state = b.name_short  and b.name_long = '".$state."' LIMIT 20";

}
else{
	$sql = "SELECT firstname,lastname, title, party, b.name_long as state, bioguide_id, rating FROM sunlight a, state b, congressratings_new c WHERE a.district = c.district and a.state = c.state and a.state = b.name_short  LIMIT 20";
}
$result = mysql_query($sql); 
while($row = mysql_fetch_assoc($result)){
	if($row['party'] == 'R'){
		$row['party'] = "Republican";
	}else{
		$row['party'] = "Democrat";
	}
	if($row['title'] == "Rep"){
		$row['title'] = "Representative";
	}else{
		$row['title'] = 'Senator';
	}

	$rows[] = $row;
}

echo json_encode($rows);

?>