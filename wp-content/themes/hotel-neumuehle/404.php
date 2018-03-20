<?php get_header(); ?>

<main id="subpage">

	<section id="subpage-slider">
		<?php masterslider(1); ?>
		<?php get_template_part('templates/sektion', 'selektor'); ?>
	</section>

	<section id="intro" class="outer">
		<div class="inner">
		
			<div class="deco"></div>
			<div class="text">
				<h2>404 - Seite nicht gefunden</h2>
				<hr>
				<p>Die Seite nach der du suchst, existiert leider nicht</p>
			</div>
			
		</div>
	</section>

	<?php 
	get_template_part('templates/sektion', 'galleryFull');
	get_template_part('templates/sektion', 'cta');
	?>
	
</main>

<?php get_footer(); ?>