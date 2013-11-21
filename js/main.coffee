Representative = Backbone.Model.extend({
})

RepList = Backbone.Collection.extend({
  model: Representative
  
  url: 'api/reps.php'

})

RepView = Backbone.View.extend(

  template: _.template($("#rep-template").html().trim())

  render: ->
    @$el.html(@template(@model.attributes))

    return this

)

RepListView = Backbone.View.extend(

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

reps = new RepList()

p = reps.fetch()

p.done( ->
  new RepListView(reps)
)

