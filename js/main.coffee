Representative = Backbone.Model.extend({
})

RepList = Backbone.Collection.extend({
  model: Representative
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
    @collection = new RepList(reps)

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
