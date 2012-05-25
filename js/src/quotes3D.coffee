
root = exports ? this;

###
3D Carousel for blockquotes
###
root.Quotes3D = class Quotes3D
	constructor: (@DOMel) ->
		@$quotes = $(@DOMel).find('blockquote')
		@createPagination()
		@showQuote(0)
		@start()

	INTERVAL_MS = 5000

	createPagination: ->
		list = $('<ul>', {class: 'pagination'});
		list.append $('<li>') for $quote in @$quotes
		$(@DOMel).append( list )
		@$pagination = list.find('li')
		@$pagination.click @handleClick

	handleClick: (e) =>
		@showQuote $(e.target).index()
		@stop()

	next: =>
		@showQuote( (@index+1) % @$quotes.length )

	previous: ->
		@showQuote( Math.abs( (@index-1) % @$quotes.length ) )

	showQuote: (newIndex) ->
		if newIndex is @index then return

		# reset and roll new/current quote
		@$quotes.removeClass         'rolling'
		@$quotes.eq(@index).addClass   'rolling'
		@$quotes.eq(newIndex).addClass  'rolling'
		@index = newIndex

		# update before/after classes
		@$quotes.removeClass 'before'
		@$quotes.removeClass 'after'
		@$quotes.filter(":lt(#{newIndex})").addClass('before')
		@$quotes.filter(":gt(#{newIndex})").addClass('after')

		# update pagination
		@$pagination.removeClass           'selected'
		@$pagination.eq(newIndex).addClass 'selected'

	start: ->
		@interval = setInterval(@next, INTERVAL_MS)

	stop: ->
		clearInterval( @interval )