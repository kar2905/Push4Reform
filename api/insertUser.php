<?php

require("../dbinfo.php");

$uid = mysql_real_escape_string($_GET['uid']);

$sql = "INSERT INTO users(id) VALUES($uid)";
$res = mysql_query($sql);

echo "1";
?>