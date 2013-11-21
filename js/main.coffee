Representative = Backbone.Model.extend({
})

window.RepList = Backbone.Collection.extend({
  model: Representative
  
  url: 'api/reps.php'

  initialize: (state)->
    if(state)
      @url = @url + "?state=" + state

})

RepView = Backbone.View.extend(

  template: _.template($("#rep-template").html().trim())

  render: ->
    @$el.html(@template(@model.attributes))

    return this

)

window.RepListView = Backbone.View.extend(

  el: "#reps-list"

  initialize: (reps) ->
    @collection = reps

    @render()

  render: ->
    @collection.each((rep)->
      this.renderRep(rep)
    , this)

    return this

  renderRep: (rep) ->
    repView = new RepView(
      model: rep
    )
    @.$el.append(repView.render().el)

)


