<?php
 require("../dbinfo.php");
    // make an associative array of callers we know, indexed by phone number

    // if the caller is known, then greet them by name
    // otherwise, consider them just another monkey
$_REQUEST['From'] = mysql_real_escape_string($_REQUEST['From']);
$_REQUEST['Phone'] = mysql_real_escape_string($_REQUEST['Phone']);
mysql_query("insert into calls(number,congressPhone,time) values ('".$_REQUEST['From']."','".$_REQUEST['Phone']."',NOW())");
