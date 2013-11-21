$(".fb").click ->
  FB.login( (response)->
    if (response.authResponse)
      console.log('Welcome!  Fetching your information.... ')
      FB.api('/me', (response)->
        console.log('Good to see you, ' + response.name + '.')
      )
    else
  )
