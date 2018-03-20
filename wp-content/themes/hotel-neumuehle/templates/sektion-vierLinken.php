<?php if(have_rows('vier-links')) : ?>
	<div id="vier-links" class="outer">
		<?php while(have_rows('vier-links')) : the_row(); ?>
		<div class="box" style="background-image:url('<?php the_sub_field('hintergrundbild'); ?>');">
			<span><img src="<?php the_sub_field('icon'); ?>"></span>
			<a href="<?php the_sub_field('link'); ?>">
				<div class="mask">
					<img src="<?php the_sub_field('icon'); ?>">
					<hr>
					<p><?php the_sub_field('titel'); ?></p>
				</div>
			</a>
		</div>
		<?php endwhile; ?>
	</div>
	<?php endif; ?>