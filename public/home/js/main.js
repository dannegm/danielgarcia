var $$ = function (e) { return document.querySelector(e); }
var $on = function (event, selector, callback) { return $(document).on(event, selector, callback); };

var extended = function (obj, functions) {
	obj = obj || this;
	for (var x in functions) obj[x] = functions[x];
	return obj;
};

var Appear = {
	items: [],
	itemsinit: [],
	itemswait: [],
	init: function () {
		var height = $('body').height();
		Appear.items = $('[data-appear]');
		Appear.itemsinit = $('[data-appear-on="init"]');
		Appear.itemswait = $('[data-appear-on="delay"]');

		$.each(Appear.items, function(i, e) {
			var $self = $(e);
			$self.addClass('animated');
		});
		$.each(Appear.itemsinit, function(i, e) {
			var $self = $(e);
			$self.hide();
		});
		$.each(Appear.itemswait, function(i, e) {
			var $self = $(e);
			$self.hide();
		});

		var oninit = setTimeout(function () {
			$.each(Appear.itemsinit, function(i, e) {
				var $self = $(e);
				var animation = $self.data('appear');
				$self.show();
				$self.addClass(animation);
			});
		}, 500);

		$.each(Appear.itemswait, function(i, e) {
			var $self = $(e);
			var delay = $self.data('appear-delay');
			var ondelay = setTimeout(function () {
				var animation = $self.data('appear');
				$self.show();
				$self.addClass(animation);
			}, delay);
		});

		$(document).scroll(function () {
			var wTop = $('body').scrollTop();
			var wBottom = wTop + $(window).height();
			$.each(Appear.items, function(i, e) {
				var $self = $(e);
				var top = $self.offset().top;
				if (top < wBottom && top > wTop) {
					var animation = $self.data('appear');
					$self.addClass(animation);
				}
			});
		});
	},
};

var Page = {
	events: function () {
		$(document).on('click', '.scrollTo', function () {
			var hash = $(this).attr('href');
			var ttop = $(hash).position().top - $('#menu').height();
	        $('html, body').animate({
	            scrollTop: ttop
	        }, 300);
		});
		$(document).scroll(function () {
			if ( $('body').scrollTop() > 200) {
				$('#menu').removeClass('transluced');
			} else {
				$('#menu').addClass('transluced');
			}
		});
	},
	init: function () {
		Page.events();
		Appear.init();
	}
};
$(document).ready(Page.init);