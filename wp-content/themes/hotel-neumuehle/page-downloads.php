<?php
/*
* Template Name: Downloads
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
	
	<?php if(have_rows('kategorien')) : ?>
	<section id="downloads-kategorien" class="outer">
		<div class="inner">
	
			<?php while(have_rows('kategorien')) : the_row(); ?>
			<div class="kategorie">
				<h2><?php the_sub_field('ueberschrift'); ?></h2>
				<?php if(have_rows('downloads')) : ?>
				<div class="downloads">
					<?php
					while(have_rows('downloads')) : the_row();
						$datei = get_sub_field('datei');
					?>
					<div class="download">
						<a href="<?php echo $datei['url']; ?>" target="_blank" rel="noopener"></a>
						<img src="<?php echo $datei['icon']; ?>">
						<p><?php echo $datei['title']; ?></p>
						<div class="type">
							[<?php $filetype = wp_check_filetype($datei['url']); echo $filetype['ext']; ?>]
						</div>
					</div>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
			</div>
			<?php endwhile; ?>
		
		</div>
	</section>
	<?php endif; ?>
	
	<?php get_template_part('templates/sektion', 'cta'); ?>

</main>

<?php get_footer(); ?>