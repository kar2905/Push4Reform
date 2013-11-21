<?php
 require("../dbinfo.php");
$sql = "SELECT firstname,lastname, title, party, b.name_long as state, bioguide_id, rating, phone FROM sunlight a, state b, congressratings c, congresszip d WHERE a.district = c.district and a.state = c.state and a.state = b.name_short  and a.district = d.district and a.state = d.state and d.zip = '".$_REQUEST['Digits']."' LIMIT 1";
    // make an associative array of callers we know, indexed by phone number

    // if the caller is known, then greet them by name
    // otherwise, consider them just another monkey
$congressman = mysql_fetch_assoc(mysql_query($sql));
mysql_query("insert into calls(number,congressPhone,time) values ('".$_REQUEST['From']."','".$congressman['phone']."',NOW())");

    // now greet the caller
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Dial><?php echo $congressman['phone']?></Dial>
</Response>