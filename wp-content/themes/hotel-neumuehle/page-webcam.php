<?php
/*
* Template Name: Webcam
*/
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
	
	<?php if(isset($content[1])) : ?>
	<section id="webcam" class="outer">
		<div class="inner">
		
			<div class="text">
				<?php echo apply_filters('the_content', $content[1]); ?>
			</div>
		
		</div>
	</section>
	<?php endif; ?>

</main>

<?php get_footer(); ?>