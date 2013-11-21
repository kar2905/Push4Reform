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
        <a class="twitter btn btn-lg btn-block" href="http://twitter.com/<?=$row['twitter_id']?>"><i class="fa fa-twitter"></i>@<?= $row['twitter_id'] ?></button>
        <a class="fb btn btn-lg btn-block" href="http://facebook.com/<?=$row['facebook_id'] ?>"><i class="fa fa-facebook-square"></i>Facebook</a>
      </div>
      <div class="col-md-8">
        <h1><?= $row['firstname'] ?> <?=$row['lastname'] ?></h1>
        <h2><?= $row['party'] ?> <?= $row['title'] ?></h2>
        <h3><?= $row['state'] ?></h3>
        <div class="grade-section first row">
          <h2 class="col-md-7"><?= $row['firstname'] . ' ' . $row['lastname'] ?>'s Grade on Comprehensive Immigration Reform</h2>
          <div class="social col-md-2 col-md-offset-1">
            <a class="twitter" href="http://twitter.com">
              <i class="fa fa-twitter"></i>
            </a>
            <a class="facebook" href="http://facebook.com">
              <i class="fa fa-facebook"></i>
            </a>
          </div>
          <div class="col-md-2">
          <span class="grade <?= strtolower(substr($row['rating'], 0, 1))?>"><?=$row['rating']?></span>
          </div>
        </div>
        <div class="grade-section row">
          <h2 class="col-md-7">Supports DREAM Act</h2>
          <div class="social col-md-2 col-md-offset-1">
            <a class="twitter" href="http://twitter.com">
              <i class="fa fa-twitter"></i>
            </a>
            <a class="facebook" href="http://facebook.com">
              <i class="fa fa-facebook"></i>
            </a>
          </div>
          <div class="col-md-2">
            <span class="no">No</span>
          </div>
        </div>
        <div class="grade-section row">
          <h2 class="col-md-7">Supports Pathway to Citizenship</h2>
          <div class="social col-md-2 col-md-offset-1">
            <a class="twitter" href="http://twitter.com">
              <i class="fa fa-twitter"></i>
            </a>
            <a class="facebook" href="http://facebook.com">
              <i class="fa fa-facebook"></i>
            </a>
          </div>
          <div class="col-md-2">
            <span class="yes">Yes</span>
          </div>
        </div>
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

