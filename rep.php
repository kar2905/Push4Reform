<?php

  require('dbinfo.php');
  if(isset($_GET['rep'])){
  	$firstname = explode("-", mysql_real_escape_string($_GET['rep']))[0];
  	$lastname = explode("-", mysql_real_escape_string($_GET['rep']))[1];
	$sql = "SELECT firstname,lastname, title, party, b.name_long as state, bioguide_id, rating, phone,twitter_id, facebook_id FROM sunlight a, state b, congressratings c WHERE a.district = c.district and a.state = c.state and a.state = b.name_short and a.firstname = '".$firstname."' and a.lastname = '".$lastname."'";
	$res = mysql_query($sql);
	$count = mysql_num_rows($res);
}else{
	header("Location: ../404.html");
	die();
}
if($count < 1){
	header("Location: ../404.html");
	die();
}
  include 'includes/header.php';
  $row = mysql_fetch_assoc($res);
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
?>
<div class="profile-page">
  <div class="profile-container container">
    <div class="row"> 
      <div class="col-md-4">
        <div class="clip">
          <img src="https://s3.amazonaws.com/push4reform/<?=$row['bioguide_id'] ?>.jpg">
        </div>
        <button type="button" class="phone btn btn-lg btn-block"><span class="glyphicon glyphicon-earphone"></span><?= $row['phone'] ?></button>
        <button type="button" class="twitter btn btn-lg btn-block">@<?= $row['twitter_id'] ?></button>
        <button type="button" class="fb btn btn-lg btn-block"><?= $row['facebook_id'] ?></button>
      </div>
      <?= $row['rating'] ?>
      <div class="col-md-8">
        <h1><?= $row['firstname'] ?> <?=$row['lastname'] ?></h1>
        <h2><?= $row['party'] ?> <?= $row['title'] ?></h2>
        <h3><?= $row['state'] ?></h3>
      </div>
      <div class="col-md-8">
      	<?php 
      		require("dbinfo.php");

$sql = "SELECT * FROM users";
$res = mysql_query($sql);

while($row = mysql_fetch_assoc($res)){
	echo "<img src='http://graph.facebook.com/".$row['id']."/picture?type=large' width='50px' height='50px'/>";

}
?>
     </div>
    </div>
  </div>
</div>
<?php
  include 'includes/footer.php';
?>
<script src="<?=$site_url?>js/profile.js"></script>
</body>
</html?>

