<script type="text/javascript">
	// $.getJSON("https://query.yahooapis.com/v1/public/yql?q=select * from weather.forecast where woeid in (select woeid from geo.places(1) where text='dhaka')&format=json", function(data) {
	// 	console.log(data);
		
	// });
	$.ajax({
		url: "https://api.ipify.org?format=json",
		dataType: "json",
		timeout: 3000,
		success: function(data) {
			//console.log(data.ip);
			$.ajax({
				url: "http://api.ipinfodb.com/v3/ip-city/?key=3baf82848231a9122db12e125bcdd6afad0cff90dea80c2d24329daee1e1d613&ip="+data.ip+"&format=json",
				dataType: "json",
				timeout: 10000,
				success: function(rsp) {
					//console.log(rsp.cityName);

					getWeatherData(rsp.cityName);
					
				}
			});
		}
	});
	
	
	// $( window ).load(function() {
	// 	getWeatherData('dhaka');
	// });

	function getWeatherData(v){
		$.ajax({
			url: "https://query.yahooapis.com/v1/public/yql?q=select * from weather.forecast where woeid in (select woeid from geo.places(1) where text='"+v+"')&format=json",
			type: "GET",
			dataType: "json",
			timeout: 10000,
			beforeSend: function () {
				//console.log("Emptying");
			},
			success: function (data, textStatus) {
				var title = "Astronomy : Sunrise - "+data.query.results.channel.astronomy.sunrise+", Sunset - "+data.query.results.channel.astronomy.sunset+" || Humidity : "+ data.query.results.channel.atmosphere.humidity +" || Last Update : "+data.query.results.channel.lastBuildDate;
				
				jQuery("#valu").text(data.query.results.channel.item.condition.temp);
				jQuery("#cunit").html('<sup>C</sup>');
				jQuery("#forecastValue").val(data.query.results.channel.item.condition.temp);
				//jQuery("#forecastValue").css('display','none');
				jQuery("#city").html(data.query.results.channel.location.city);
				jQuery("#country").html(data.query.results.channel.location.country);
				jQuery("#degree").html('<sup>O</sup>');
				//jQuery("#cunit").html('C');
				
				dateSet();
				convert('C');
				
			},
			complete: function(data,textStatus){
				$("#pStyle").show('slow');
			},
			error: function (jqXHR, textStatus, errorThrown) {
				// Some code to debbug e.g.:               
				//console.log(jqXHR);
				if(textStatus == "timeout") {
					dateSet();
					$("#degree").hide();
					$("#cunit").html("");
				}

				console.log(textStatus);
				console.log(errorThrown);
			}
		});
	}
	
	function convert(degree) {
		var x;
		if (degree == "F") {
			
			var celcius = parseInt($("#valu").text());
			x = celcius * 9 / 5 + 32;
			//console.log("FROM F");
			$("#valu").text(Math.ceil(x));
			
			} else if (degree == "C")  {
			x = ($("#forecastValue").val() -32) * 5 / 9;
			//console.log("FROM C");
			$("#valu").text(Math.round(x));
		}
	}
	
	function dateSet(){
		var currentDate = new Date();
		var day = ("0" + currentDate.getDate()).slice(-2);
		var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
		var year = currentDate.getFullYear();
		
		var dayName =  '<?php echo date("l");?>';
		var MonthName =  '<?php echo date("F");?>';
		
		
		$("#givendateID").html('<span>'+dayName +'</span>, '+MonthName+" "+day);
		//$("#givendateID").html(' '+day+" "+MonthName+" "+year);
	}
</script>			