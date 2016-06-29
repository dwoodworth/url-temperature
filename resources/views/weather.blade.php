<script>
	(function($) {
		$(document).ready(function () {
			// Intial data load via AJAX
			AJAXCall ();
			
			//Refresh the AJAX data every 10 minutes
			setInterval(AJAXCall, 10*60*1000);
			
			//Function to load AJAX JSON data from the Laravel controller WeatherController using the 'weatherapi' route.
			function AJAXCall () {
			    $.getJSON('/weatherapi', function (data) {
			      //console.log(data);
			      
			      $('#city').html(data.city);
			      $('#temp_f').html(data.temp_f);
			      $('#icon').attr('src', 'http://icons.wxug.com/i/c/k/'+data.icon+'.gif');
			      $('#weather').html(data.weather);
			      date = new Date(data.cache_time);
			      $('#cache-time').html('Data current as of ' +date.toLocaleTimeString());
			      
			      $('#loader').hide();
			      $('#weather-data').fadeIn();
			      $('#weather-container').addClass(data.icon);
			    })
			    .fail(function (jqXHR, textStatus, errorThrown) {
				    $('#loader').hide();  
				    $('#errors').fadeIn();
			    });
		    }
		});
})(jQuery);
</script>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		{{-- PRELOADER --}}
		<img id="loader" src="images/ajax-loader.gif" style="position: absolute; top: 50%; left:50%;">
		{{-- ERRORS SECTION --}}
		<div id="errors" style="display: none;">
			<div class="alert alert-danger" role="alert">It looks like there was an error getting information for the zip code you entered. Maybe try a different one?</div>
			<div class="text-center">
				<a href="/settings" class="btn btn-default">Settings</a>
			</div>
		</div>
		{{-- END ERRORS SECTION --}}
		{{-- WEATHER CONTENT SECTION --}}
		<div id="weather-data" class="jumbotron" style="display: none;">
			<h2><span id="city"></span><sup><small> <a href="{{ url('settings') }}"><i class="fa fa-pencil" aria-hidden="true"></i></a></small></sup></h2>
			<h1><span id="temp_f"></span><sup><small id="degree-symbol">&#8457;</small></sup></h1>
			<img id="icon" src=''>
			<div id="weather"></div>
			<div id="cache-time"></div>
		</div>
		{{-- END WEATHER CONTENT SECTION --}}
	</div>
</div>