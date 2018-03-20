<?php if(have_rows('downloads')) : ?>
<section id="downloads" class="outer">
	<div class="inner">
		
		<h2>Downloads</h2>
		
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
		
	</div>
</section>
<?php endif; ?>