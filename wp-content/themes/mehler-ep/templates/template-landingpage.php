<?php 
/*
* Template Name: Landingpage
*/
get_header();
the_page_header();

$content = get_extended($post->post_content);
?>

<div class="section-content white" role="main">

	<section class="page-entry container clearfix">
		<?php if(function_exists('yoast_breadcrumb')) { yoast_breadcrumb('<div class="breadcrumbs">','</div>'); } ?>
		
		<div class="left-side twothirds">
			<div class="content">
				<?php echo apply_filters('the_content', $content['main']); ?>
			</div>
		</div>
		
		<div class="right-side onethird">
			<div class="product-contact-map">
				<div class="box-ansprechpartner">
					<h2><?php echo (get_field('pk_ueberschrift')) ? get_field('pk_ueberschrift') : 'Ihr Ansprechpartner'; ?></h2>
					<div class="kontakt-person">
						<p class="name"><strong><?php the_field('pk_nameansprechpartner'); ?></strong></p>
						<p class="title"><em><?php the_field('pk_titelansprechpartner'); ?></em></p>
					</div>
					<?php
					$anschrift = (!get_field('pk_anschrift')) ? 'Edelzeller Str. 44, 36043 Fulda, Deutschland' : get_field('pk_anschrift');
					$telefon = (!get_field('pk_telefon')) ? '+49 (661) 103 - 0' : get_field('pk_telefon');
					$email = (!get_field('pk_email')) ? 'sales@mehler-ep.com' : get_field('pk_email');
					?>
					<ul>
						<li class="loc"><?php echo $anschrift ?></li>
						<li class="tel"><a href="tel:<?php echo $telefon; ?>"><?php echo $telefon; ?></a></li>
						<li class="mail"><a href="mailto:<?php echo antispambot($email); ?>"><?php echo antispambot($email); ?></a></li>
					</ul>
				</div>
				<div id="contact-map"></div>
			</div>
		</div>
	</section>
	
	<div class="showboxes structure slider">
		<div class="container clearfix">
			
				<div class="cntrl prev">
					<span></span>
				</div>
				
				<div class="slider-wrap">
			
					<?php
					if(have_rows('beispiele')) :
					
						$i = 0;
					
						while(have_rows('beispiele')) : the_row();
						
						$thumbnail = get_sub_field('bild');
						$thumbnail = ($thumbnail) ? ' style="background-image:url('.$thumbnail['url'].');"' : '';
						?>
						<div class="cate_box bsp_box">
							<div class="cate_box-inner">
								<div class="img_box"<?php echo $thumbnail; ?>></div>
								<div class="content">
									<h3><?php the_sub_field('titel'); ?></h3>
									<?php echo apply_filters('the_content', get_sub_field('beschreibung')); ?>
								</div>
							</div>
						</div>
						<?php
						$i++;
					
						endwhile;
					
					endif;
					?>
					
				</div>
				
				<div class="cntrl next">
					<span></span>
				</div>
		
		</div>
	</div>
	
	<section id="box-entry">
		<div class="container">
		
			<div class="content">
				
				<div class="matrix-table">
					<?php
					$table = get_field('pt_tabelle');
					if($table) :
					
						echo '<h2>';
						echo (get_field('pt_titel')) ? the_field('pt_titel') : 'Technolgie Standorte Matrix';
						echo '</h2>';
						echo '<table border="0">';

						if($table['header']) :
						
							echo '<thead>';
							echo '<tr>';

							foreach($table['header'] as $th) :

								echo '<th>';
								echo $th['c'];
								echo '</th>';
							
							endforeach;

							echo '</tr>';
							echo '</thead>';
						
						endif;

						echo '<tbody>';

						foreach($table['body'] as $tr) :

								echo '<tr>';

								foreach($tr as $td) :

									echo '<td>';
									echo $td['c'];
									echo '</td>';
								
								endforeach;

								echo '</tr>';
								
						endforeach;

						echo '</tbody>';

						echo '</table>';
					
					endif;
					?>
					
					<?php if(have_rows('weitere_produkte_u_technologien')) : ?>
					<div class="weiter-produkte">
						<h2><?php _e('Weitere Produkte und Technologien', 'mehler-ep'); ?></h2>
						<div class="p-beispiel">
							<?php while(have_rows('weitere_produkte_u_technologien')) : the_row(); ?>
							<a class="button cyn" href="<?php the_sub_field('link-ziel'); ?>"><?php the_sub_field('link-label'); ?></a>
							<?php endwhile; ?>
						</div>
					</div>
					<?php endif; ?>
				</div>
			
				<?php echo apply_filters('the_content', $content['extended']); ?>
			</div>
			
		</div>
	</section>
	
	<?php get_template_part('templates/cta', 'contact'); ?>
	
	<div class="product-location" data-lang="<?php echo ICL_LANGUAGE_CODE; ?>">
		<span></span>
	</div>

</div>
	
<?php
$lat = (get_field('pk_lat')) ? get_field('pk_lat') : 50.543990;
$lng = (get_field('pk_lng')) ? get_field('pk_lng') : 9.681270;
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkgv6OrevEqtnncPywkmhOCBbadaKF1Oc&callback=initMap" async defer></script>
<script type="text/javascript">
	function initMap() {
		var myLatLng = {
			lat: <?php echo $lat; ?>,
			lng: <?php echo $lng; ?>
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
	
	jQuery(document).ready(function($) {
		
		$('.showboxes.slider .slider-wrap').slick({
			slidesToShow: 4,
			prevArrow: $('.showboxes.slider').find('.cntrl.prev'),
			nextArrow: $('.showboxes.slider').find('.cntrl.next'),
		});
		
		if($('.showboxes.slider .cate_box').length <= 4) {
			$('.showboxes.slider').find('.cntrl.prev').hide();
			$('.showboxes.slider').find('.cntrl.next').hide();
		}
		
	});
</script>

<?php get_footer(); ?>