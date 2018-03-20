<?php
/*
* Template Name: Imagefilm
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
				<h2><?php the_title(); ?></h2>
				<hr>
			</div>
			
		</div>
	</section>

	<section id="imagefilm" class="outer">
		<div class="inner">
			
			<div class="imagefilm-wrapper">
				<iframe width="1600" height="500" src="https://www.youtube.com/embed/QieblQCYW_U" frameborder="0" allowfullscreen></iframe>
			</div>
			
		</div>
	</section>

</main>

<?php get_footer(); ?>