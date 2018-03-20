<?php
get_header();

the_page_header();

$content = get_extended($post->post_content);
?>

<div class="section-content" role="main">

	<section class="page-entry container">

		<?php if(function_exists('yoast_breadcrumb')) { yoast_breadcrumb('<div class="breadcrumbs">','</div>'); } ?>

		<div class="content">
		<?php echo apply_filters('the_content', $content['main']); ?>
		</div>

	</section>

	<?php get_template_part('templates/cta', 'contact'); ?>

	<?php if(!empty($content['extended'])) : ?>
	<section class="page-entry container">

		<div class="content">
		<?php echo apply_filters('the_content', $content['extended']); ?>
		</div>

	</section>
	<?php endif; ?>

</div>

<?php get_footer(); ?>
