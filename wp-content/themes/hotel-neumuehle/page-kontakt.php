<?php
get_header();
$content = explode("<!--more-->", $post->post_content);
?>

<main id="kontakt">

	<section id="subpage-slider">
		<?php
		if(get_field('slider-shortcode')) :
			echo do_shortcode(get_field('slider-shortcode', false, false));
		else :
			masterslider(1);
		endif;
		?>
		
		<?php get_template_part('templates/sektion', 'selektor'); ?>
	</section>
	
	<section id="intro" class="outer">
		<div class="inner">
		
			<div class="text">
				<div class="deco"></div>
				<h2>Haben Sie Fragen?</h2>
				<hr>
				<?php echo apply_filters('the_content', $content[0]); ?>
			</div>
			
		</div>
	</div>
	
	<?php get_template_part('templates/sektion', 'map'); ?>
	
	<?php get_template_part('templates/sektion', 'cta'); ?>

</main>

<?php get_footer(); ?>