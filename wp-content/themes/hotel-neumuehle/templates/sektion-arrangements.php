<section id="arrangements" class="outer">
	<div class="arrangements-hide-space">
	<div class="arrangements-wrap">
	<?php
	$arrangements = new WP_Query(array(
		'post_type' => 'arrangements',
		'posts_per_page' => 3
	));
	
	$count = 1;
	
	if($arrangements->have_posts()) : while($arrangements->have_posts()) : $arrangements->the_post();
		$thumbnail = (has_post_thumbnail()) ? ' style="background-image:url('.wp_get_attachment_url(get_post_thumbnail_id()).');"' : '';
		?>
		<div class="arrangement"<?php echo $thumbnail; ?>>
			<p>Arrangement</p>
			<h3><?php the_title(); ?></h3>
			<hr>
			<div class="excerpt">
				<?php the_excerpt(); ?>
			</div>
			<div class="buttons">
				<a href="<?php the_permalink(); ?>" class="button ghost">
					<div>Mehr Details</div>
				</a>
			</div>
		</div>
		<?php 
		if($count % 3 == 0)
			echo '</div><div>';
		
		$count++;
		
	endwhile;
	wp_reset_postdata();
		
	else:
		echo '<h1>Keine Einträge in dieser Kategorie</h1>';
	endif;
	?>
	</div>
	</div>
</section>