<?php
get_header();
$content = explode("<!--more-->", $post->post_content);
?>

<main id="subpage">

	<section id="subpage-slider">
		<?php
		if(get_field('slider-shortcode')) :
			echo do_shortcode(get_field('slider-shortcode', false, false));
		else :

			$slider = false;
			$parents = get_post_ancestors(get_the_ID());

			if(!empty($parents)) :
				foreach($parents as $parent) :
					$shortcode = trim(get_field('slider-shortcode', $parent));
					if($shortcode && !empty($shortcode)) :
						$slider = get_field('slider-shortcode', $parent, false);
						break;
					endif;
				endforeach;
			endif;

			if($slider)
				echo do_shortcode($slider);
			else
				masterslider(1);

		endif;
		?>
		
		<?php get_template_part('templates/sektion', 'selektor'); ?>
	</section>

	<section id="intro" class="outer">
		<div class="inner">
		
			<div class="deco"></div>
			<div class="text">
				<?php echo apply_filters('the_content', $content[0]); ?>
			</div>
			
		</div>
	</section>
	
	<!-- PDF INCLUDE -->
	<?php if($downloads = get_field('downloads')) : ?>
		<?php
		$first_download = $downloads[0];
		$pdf_url = $first_download['datei'];
		$pdf_url = $pdf_url['url'];
		?>
		<script>
			var dFlipLocation = "<?php bloginfo('template_url'); ?>/assets/plugins/dflip";
		</script>
	
		<link href="<?php bloginfo('template_url'); ?>/assets/plugins/dflip/css/dflip.css" rel="stylesheet" type="text/css">
		<link href="<?php bloginfo('template_url'); ?>/assets/plugins/dflip/css/themify-icons.css" rel="stylesheet" type="text/css">
		
		<section id="pdf-section" class="outer">
			<div id="pdf-container"></div>
		
			<div id="pdf-downloads">
				<a href="<?php echo $pdf_url; ?>" class="button" target="_blank" rel="noopener">
					<div>PDF herunterladen</div>
				</a>
			</div>
		</section>
	
		<script src="<?php bloginfo('template_url'); ?>/assets/plugins/dflip/js/dflip.min.js" type="text/javascript"></script>
		<script>
		jQuery(document).ready(function($) {
			
			var pdf_height = 750;
			if($(window).width() <= 1024) {
				pdf_height = 450;
				
				if($(window).width() <= 1024) {
					pdf_height = 350;
				}
			}
			
			var pdf = '<?php echo $pdf_url; ?>';
			var options = {
				height: pdf_height,
				duration: 800,
				scrollWheel: false
			};
			var flipBook = $("#pdf-container").flipBook(pdf, options);
			
		});
		</script>
	<?php endif; ?>
	<!-- END PDF INCLUDE -->
	
	<?php get_template_part('templates/sektion', 'downloads'); ?>
	
	<?php get_template_part('templates/sektion', 'cta'); ?>

</main>

<?php get_footer(); ?>