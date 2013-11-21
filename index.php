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
  <p> “I support a pathway to citizenship because I don't believe we should have a second class of citizens.”  - Don Younge Texas Representative Wall Street Journal</p>
  <h1>Where does your representative stand on immigration reform?</h1>
  <form class="form-inline">
    <div class="form-group">
      <input type="text" class="input-lg form-control" placeholder="Enter your zip code"/>
    </div>
    <button type="button" class="btn btn-primary btn-lg">Submit</button>
  </form>
</div>
<div class="container reps-list" >
  <div class="row" id="reps-list">
  </div>
</div>

<script type="text/template" id="rep-template">
      <div class="thumbnail">
        <div class="clip">
          <img src="https://s3.amazonaws.com/push4reform/<%- bioguide_id  %>.jpg" />
        </div>
        <div class="caption">
          <div class="img-circle <%- rating.substr(0, 1).toLowerCase() %> grade"><span><%- rating %></span></div>
          <h1><%- firstname + ' ' + lastname %></h1>
          <h2><%- party + ' ' + title %></h2>
          <h3><%- state %></h3>
          <a href="member/<%- firstname + '-' + lastname%>" class="btn btn-primary btn-lg btn-block">Contact</a>
        </div>
      </div>
</script>
<?php
  include 'includes/footer.php';
?>
<script src="js/main.js"></script>
<script>
var reps = new RepList("<?=$state?>");

var p = reps.fetch();

p.done(function(){
  new window.RepListView(reps)
});
</script>
</body>
</html>
