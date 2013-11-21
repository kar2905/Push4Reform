<?php
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
    <div class="col-md-4 representative-container">
      <div class="thumbnail">
        <div class="clip">
          <img src="https://s3.amazonaws.com/push4reform/<%- bioguide_id  %>.jpg" />
        </div>
        <div class="caption">
          <div class="img-circle a grade"><span>A</span></div>
          <h1><%- firstname + ' ' + lastname %></h1>
          <h2><%- party + ' ' + title %></h2>
          <h3><%- state %></h3>
          <a class="btn btn-primary btn-lg btn-block">Contact</a>
        </div>
      </div>
    </div>
</script>
<?php
  include 'includes/footer.php';
?>
<script src="js/main.js"></script>
</body>
</html>
