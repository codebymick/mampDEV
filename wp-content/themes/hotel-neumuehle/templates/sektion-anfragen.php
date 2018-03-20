<div id="anfragen-buchen" class="sektion-anfragen">
	<h2>Anfragen &amp; Buchen</h2>
	<hr>

	<div class="date-picker clearfix">

		<?php $today = new DateTime(); ?>
		<?php $tomorrow = new DateTime('tomorrow'); ?>
		
		<div class="kalfield-box anreise">
			<div class="title">Anreise</div>
			<div class="kalfield-pick" id="picky1">
				<input type="text" id="anreise" data-toggle="datepicker">
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
			<a href="https://www.cbooking.de/v4/booking.aspx?id=neumuehle&module=public&ratetype=bar&lang=de&rooms=1&children=0&adults=0&arrival=<?php echo $today->format('d.m.Y'); ?>&departure=<?php echo $tomorrow->format('d.m.Y'); ?>" class="button" target="_blank" rel="noopener">
				<div>Anfragen</div>
			</a>
		</div>

		<div class="kalfield-box abreise">
			<div class="title">Abreise</div>
			<div class="kalfield-pick" id="picky2">
				<input type="text" id="abreise" data-toggle="datepicker">
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
			<a href="https://www.cbooking.de/v4/booking.aspx?id=neumuehle&module=public&ratetype=bar&lang=de&rooms=1&children=0&adults=0&arrival=<?php echo $today->format('d.m.Y'); ?>&departure=<?php echo $tomorrow->format('d.m.Y'); ?>" class="button" target="_blank" rel="noopener">
				<div>Buchen</div>
			</a>
		</div>
	</div>
</div>

<script>
	jQuery(document).ready(function($) {
		
		var now = Date.now();

		$('#picky1 input').datepicker({
			language: 'de-DE',
			date: now,
			startDate: now,
			trigger: '#picky1'
		}).on('pick.datepicker', function (e) {
			var day = e.date.getDate();
			var month = $('#picky1 input').datepicker('getMonthName', true);
			
			if(day < 10)
				day = '0' + day;
			
			$('#picky1 .day .value').html(day);
			$('#picky1 .month .value').html(month);
			
			// SET ABREISE
			var newDate = new Date(e.date.getFullYear() + '-' + (e.date.getMonth() + 1) + '-' + e.date.getDate());
			newDate.setDate(newDate.getDate() + 1);
			
			$('#picky2 input').datepicker('setDate', newDate);
			$('#picky2 input').datepicker('setStartDate', newDate);
			
			// CHANGE URL
			var urlDay = day;
			var urlMonth = parseInt(e.date.getMonth()) + 1;
			var urlYear = e.date.getFullYear();
			
			var url2Day = newDate.getDate();
			var url2Month = parseInt(newDate.getMonth()) + 1;
			var url2Year = newDate.getFullYear();
			
			var src = $('.sektion-anfragen .kalfield-box.anreise a.button').attr('href');
			src = src.replace(/(arrival=).*?(&|$)/,'$1' + urlDay + '.' + urlMonth + '.' + urlYear + '$2');
			src = src.replace(/(departure=).*?(&|$)/,'$1' + url2Day + '.' + url2Month + '.' + url2Year + '$2');
			
			$('.sektion-anfragen .kalfield-box.anreise a.button').attr('href', src);
			$('.sektion-anfragen .kalfield-box.abreise a.button').attr('href', src);
		});
		
		var tomorrow = new Date();
		tomorrow.setDate(tomorrow.getDate() + 1);
		
		$('#picky2 input').datepicker({
			language: 'de-DE',
			date: tomorrow,
			startDate: tomorrow,
			trigger: '#picky2'
		}).on('pick.datepicker', function (e) {
			var day = e.date.getDate();
			var month = $('#picky2 input').datepicker('getMonthName', true);
			
			if(day < 10)
				day = '0' + day;
			
			$('#picky2 .day .value').html(day);
			$('#picky2 .month .value').html(month);
			
			// CHANGE URL
			var urlDay = day;
			var urlMonth = parseInt(e.date.getMonth()) + 1;
			var urlYear = e.date.getFullYear();
			
			var src = $('.sektion-anfragen .kalfield-box.anreise a.button').attr('href');
			src = src.replace(/(departure=).*?(&|$)/,'$1' + urlDay + '.' + urlMonth + '.' + urlYear + '$2');
			
			$('.sektion-anfragen .kalfield-box.anreise a.button').attr('href', src);
			$('.sektion-anfragen .kalfield-box.abreise a.button').attr('href', src);
		});
		
	});
</script>