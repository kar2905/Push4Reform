<?php
$ip = $_SERVER['REMOTE_ADDR'];
if(filter_var($ip,FILTER_VALIDATE_IP,FILTER_FLAG_IPV4)){
  $json = file_get_contents('http://ipinfo.io/'.$ip.'/region');
  $obj = json_decode($json);
  $state = $obj;
}
else{
  $state = "California";
}

  include 'includes/header.php';
?>

<div class="zip-container">
  <h1>Where does your representative stand on immigration reform?</h1>
  <h3>Click <a href="http://push.fwd.us">here</a> to see our updated version or visit http://push.fwd.us </h3> 
</div>


<?php
  include 'includes/footer.php';
?>
<script src="js/main.js"></script>

</body>
</html>
