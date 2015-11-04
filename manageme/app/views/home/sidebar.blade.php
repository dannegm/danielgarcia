
	<aside class="sidebar">
		<article>
			<h1>@ernestorios786</h1>
			<div class="widget">
				<a class="twitter-timeline" href="https://twitter.com/ernestorios786" data-widget-id="653362959943495680">Tweets por el @ernestorios786.</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
		</article>
		<article>
			<h1>Weather Report</h1>
			<div class="widget">
				<span style='
					display:block !important;
					width: 100%;
					font-family: sans-serif;
					font-size: 12px;'>
					<a href='http://www.wunderground.com/cgi-bin/findweather/getForecast?query=San Francisco, CA' title='San Francisco, CA Weather Forecast'>
						<img src='http://weathersticker.wunderground.com/weathersticker/sunandmoon_metric/language/espanol/US/CA/San_Francisco.gif' alt='Find more about Weather in San Francisco, CA'
							style="width: 100%" /></a>
					</a></span>
			</div>
		</article>
		<article>
			<h1>Advertisement</h1>
			<div class="widget">

				<?php $space_5 = Space::get('sidebar.right.square'); ?>
				@if($space_5->taken())
				<?php $ads = $space_5->advertise; ?>
					<style>
						{{$ads->css}}
					</style>
					<script>
						{{$ads->js}}
					</script>
					<div class="ad-square">
						{{$ads->html}}
					</div>
				@endif

			</div>
		</article>
	</aside>
