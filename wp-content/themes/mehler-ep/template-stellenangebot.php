<?php
/*
* Template Name: Stellenangebot
*/

get_header();

the_page_header();
?>

<div class="section-content white" role="main">

	<section class="page-entry container clearfix">
	
		<?php if(function_exists('yoast_breadcrumb')) { yoast_breadcrumb('<div class="breadcrumbs">','</div>'); } ?>
	
		<div class="left-side twothirds">
			<div class="content">
				<?php the_content(); ?>
			</div>
		</div>
	
		<div class="right-side onethird">
		
			<div class="box-insert">
				<div class="content">
					<h2><?php _e('Ihre Vorteile als Mitarbeiter', 'mehler-ep'); ?></h2>
					<?php the_field('vorteile'); ?>
				</div>
			</div>
		
			<div class="box-ansprechpartner job-detail">
				<h2><?php _e('Ihre Ansprechpartner', 'mehler-ep'); ?></h2>
				<div class="kontakt-person">
					<p class="name"><strong><?php the_field('sa_name'); ?></strong></p>
					<p class="title"><em><?php the_field('sa_titel'); ?></em></p>
				</div>
				<?php
				$anschrift = (!get_field('sa_anschrift')) ? 'Edelzeller Str. 44, 36043 Fulda, Deutschland' : get_field('sa_anschrift');
				$telefon = (!get_field('sa_telefon')) ? '+49 (661) 103 - 0' : get_field('sa_telefon');
				$email = (!get_field('sa_email')) ? 'sales@mehler-ep.com' : get_field('sa_email');
				?>
				<ul>
					<li class="loc"><?php echo $anschrift ?></li>
					<li class="tel"><a href="tel:<?php echo $telefon; ?>"><?php echo $telefon; ?></a></li>
					<li class="mail"><a href="mailto:<?php echo antispambot($email); ?>"><?php echo antispambot($email); ?></a></li>
				</ul>
				<?php if(get_field('sa_lat') && get_field('sa_lng')) : ?>
				<div id="contact-map"></div>
				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkgv6OrevEqtnncPywkmhOCBbadaKF1Oc&callback=initMap" async defer></script>
				<script type="text/javascript">
					function initMap() {
						var myLatLng = {
							lat: <?php the_field('sa_lat'); ?>,
							lng: <?php the_field('sa_lng'); ?>
						}
						var myOptions = {
							zoom: 11,
							center: myLatLng,
							mapTypeId: google.maps.MapTypeId.ROADMAP
						};
						map = new google.maps.Map(document.getElementById('contact-map'), myOptions);
						marker = new google.maps.Marker({
							map: map,
							position: myLatLng
						});
					}
				</script>
				<?php endif; ?>
			</div>

		</div>
	</section>

</div>

<div id="application-form-wrap">
	<section id="application-form" class="container clearfix">
		<?php if(ICL_LANGUAGE_CODE == 'de'):?>
			<?php echo do_shortcode('[contact-form-7 id="3773" title="Bewerbungsformular"]'); ?>
		<?php elseif(ICL_LANGUAGE_CODE == 'en'):?>
			<?php echo do_shortcode('[contact-form-7 id="5003" title="Bewerbungsformular_EN"]'); ?>
		<?php endif; ?>
	
	</section>
</div>

<?php get_footer(); ?>