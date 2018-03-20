<?php
get_header();
$content = explode("<!--more-->", $post->post_content);
?>

<main id="urlaub-single">

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
				<h1><?php the_title(); ?></h1>
				<hr>
				<?php echo apply_filters('the_content', $content[0]); ?>
			</div>
			
		</div>
	</section>
	
	<section id="half-layers" class="outer">
		<?php $thumbnail = (has_post_thumbnail()) ? ' style="background-image:url('.wp_get_attachment_url(get_post_thumbnail_id()).');"' : ''; ?>
			
		<div class="entry clearfix">
		
			<div class="image-box"<?php echo $thumbnail; ?>></div>
	
			<div class="text">
				<h2>Details</h2>
				<hr>
				
				<?php echo apply_filters('the_content', $content[1]); ?>
				
				<div class="buttons">
					<?php if(get_field('anfrage')) : ?>
					<a href="mailto:<?php echo antispambot('info@romantikhotel-neumuehle.de'); ?>?subject=Anfrage: Arrangement - <?php the_title(); ?>&body=Ich interessiere mich für dieses Arrangement. Lassen Sie mir hierzu bitte weitere Informationen zukommen." class="button red">
						<div>Anfragen</div>
					</a>
					<?php endif; ?>
				
					<?php if($buchung = get_field('buchung-url')) : ?>
					<a href="<?php echo $buchung; ?>" class="button red" target="_blank" rel="noopener">
						<div>Zur Buchung</div>
					</a>
					<?php endif; ?>
					<?php if($gutschein = get_field('gutschein-url')) : ?>
					<a href="<?php echo $gutschein; ?>" class="button red" target="_blank" rel="noopener">
						<div>Zum Gutschein</div>
					</a>
					<?php endif; ?>
				</div>
			</div>
		
		</div>
	</section>
	
	<?php 
	get_template_part('templates/sektion', 'kontakt');
	get_template_part('templates/sektion', 'cta');
	?>
	
</main>

<?php get_footer(); ?>