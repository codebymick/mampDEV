<?php
get_header();

the_page_header();
?>

<div class="section-content" role="main">
	
	<section class="page-entry container">
		<div class="content">
			<h2><?php _e('Die Seite nach der Sie suchen existiert leider nicht!', 'mehler-ep'); ?></h2>
			<a href="<?php bloginfo('url'); ?>" class="button cyn"><?php _e('Zur Startseite', 'mehler-ep'); ?></a>
		</div>
	</section>

</div>

<?php get_footer(); ?>