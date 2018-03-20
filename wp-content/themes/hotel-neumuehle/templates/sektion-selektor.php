<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/selectric.css">

<div class="quick-booking outer">
	<div class="inner">
	
		<div class="form-wrap">
		<form action="" method="get" name="">
			<div class="columns">
				<div class="column">
					<?php $today = new DateTime(); ?>
					<div class="kalfield-pick" id="picky3">
					<input type="text" name="arrival" id="anreise" data-toggle="datepicker" value="<?php echo $today->format('d.m.Y'); ?>">
					<div class="kalfield-pick-wrap">
						<div class="month">
							<span class="value"><?php echo $today->format('M'); ?></span>
						</div>
						<div class="day">
							<span class="value"><?php echo $today->format('d'); ?></span>
							<div class="cntrls">
								<span class="up"></span>
								<span class="down"></span>
							</div>
						</div>
					</div>
				</div>
				</div>
				<div class="column">
					<?php $tomorrow = new DateTime('tomorrow'); ?>
					<div class="kalfield-pick" id="picky4">
					<input type="text" name="departure" id="abreise" data-toggle="datepicker" value="<?php echo $tomorrow->format('d.m.Y'); ?>">
					<div class="kalfield-pick-wrap">
						<div class="month">
							<span class="value"><?php echo $tomorrow->format('M'); ?></span>
						</div>
						<div class="day">
							<span class="value"><?php echo $tomorrow->format('d'); ?></span>
							<div class="cntrls">
								<span class="up"></span>
								<span class="down"></span>
							</div>
						</div>
					</div>
				</div>
				</div>
				<!--<div class="column">
					<select name="zimmer">
						<option value="">Zimmer Typ</option>
						<option value="standard">Einzelzimmer</option>
						<option value="comfort">Doppelzimmer</option>
						<option value="comfort">Dreibettzimmer</option>
						<option value="deluxe">Familienapartement</option>
						<option value="superior">Suite</option>
					</select>
				</div>-->
				<div class="column">
					<select name="adults">
						<option value="0">Personen</option>
						<option value="1">1 Person</option>
						<?php
						for($i=2; $i<=20; $i++) {
							echo '<option value="'.$i.'">'.$i.' Personen</option>';
						}
						?>
					</select>
				</div>
				<div class="column submit">
					<input type="submit" value="Jetzt prüfen">
				</div>
			</div>
		</form>
		</div>
		
	</div>
</div>

<script src="<?php bloginfo('template_url'); ?>/assets/js/jquery.selectric.min.js"></script>
<script>
jQuery(document).ready(function($) {
	
	// SELECTRIC
	$('.quick-booking select').selectric();
	
	// DATEPICKER
	var now = Date.now();

	$('#picky3 input').datepicker({
		language: 'de-DE',
		date: now,
		startDate: now,
		trigger: '#picky3'
	}).on('pick.datepicker', function (e) {
		var day = e.date.getDate();
		var month = $('#picky3 input').datepicker('getMonthName', true);
		
		if(day < 10)
			day = '0' + day;
		
		$('#picky3 .day .value').html(day);
		$('#picky3 .month .value').html(month);
		
		// SET ABREISE
		var newDate = new Date(e.date.getFullYear() + '-' + (e.date.getMonth() + 1) + '-' + e.date.getDate());
		newDate.setDate(newDate.getDate() + 1);
		
		$('#picky4 input').datepicker('setDate', newDate);
		$('#picky4 input').datepicker('setStartDate', newDate);
	});
	
	var tomorrow = new Date();
	tomorrow.setDate(tomorrow.getDate() + 1);
	
	$('#picky4 input').datepicker({
		language: 'de-DE',
		date: tomorrow,
		startDate: tomorrow,
		trigger: '#picky4'
	}).on('pick.datepicker', function (e) {
		var day = e.date.getDate();
		var month = $('#picky4 input').datepicker('getMonthName', true);
		
		if(day < 10)
			day = '0' + day;
		
		$('#picky4 .day .value').html(day);
		$('#picky4 .month .value').html(month);
	});
	
	// BUILD URL
	var baseURL = "https://www.cbooking.de/v4/booking.aspx?id=neumuehle&module=public&ratetype=bar&lang=de&rooms=1&children=0";
	$('.form-wrap form').submit(function(e) {
		e.preventDefault();
		
		var arrival = $(this).find('input[name="arrival"]').val()
		var departure = $(this).find('input[name="departure"]').val();
		var adults = $(this).find('select[name="adults"]').val();
		
		var newURL = baseURL + "&arrival=" + arrival + "&departure=" + departure + "&adults=" + adults;
		
		var win = window.open(newURL, '_blank');
		win.focus();
	});
	
});
</script>