<?php if($galerie = get_field('galerie')) : ?>
<section id="gallery" class="outer">
	<div class="row-1 clearfix">
	<?php
	$count = 1;
	
	foreach($galerie as $image) :
	
		$thumbnail = ' style="background-image:url(\'' . $image['url'] . '\');"';
		?>
		<div class="item">
			<div class="item-inner" <?php echo $thumbnail; ?>>
				<a href="<?php bloginfo('url'); ?>/hotel/galerie/"></a>
			</div>
		</div>
		<?php 
		if($count % 3 == 0)
			echo '</div><div class="row-2 clearfix">';

		$count++;

	endforeach;
	?>
	</div>
</section>
<?php endif; ?>