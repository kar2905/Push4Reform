$ ->
  $("#add-photo").click ->
    FB.login( (response)->
      if (response.authResponse)
        console.log('Welcome!  Fetching your information.... ')
        FB.api('/me', (response)->
          $.get('/Push4Reform/api/insertUser.php', {
            uid: response.id
          }, ->
               $("#fb-images-container").prepend("<div class='clip'><div class='overlay'></div><img src='http://graph.facebook.com/"+response.id+"/picture?type=large'/></div>")
               count = parseInt($("#count").text(), 10)
               $("#count").text(count+1)
          )
        )
    )
