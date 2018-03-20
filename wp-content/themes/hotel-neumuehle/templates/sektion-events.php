<section id="events" class="outer">
    <div class="inner">
	
        <div class="events-header">
            <div class="deco white"></div>
            <h2>Aktuelle Arrangements</h2>
			<hr>
        </div>
		
        <div class="events-slider">
			<div class="cntrl prev">
				<span></span>
			</div>
			<div class="events-wrap">
				<div class="events-wrap-inner">
				<div class="event-wrap">
				<div class="event">
                <?php
					$events = new WP_Query(array(
						'post_type' => 'arrangements',
						'posts_per_page' => 3
					));
					
					$count = 1;
        
					if( $events->have_posts() ) : while( $events->have_posts() ) : $events->the_post();
						$thumbnail = (has_post_thumbnail()) ? ' style="background-image:url('.wp_get_attachment_url(get_post_thumbnail_id()).');"' : '';
						
						if($count > 1)
							echo '</div></div><div class="event-wrap"><div class="event">';
						?>
						<div class="image-box"<?php echo $thumbnail; ?>></div>
						<div class="text">
							<h2><?php the_title(); ?></h2>
							<hr>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>" class="button">
								<div>Zum Angebot</div>
							</a>
						</div>
						<?php 
						$count++;
			
					endwhile;
					wp_reset_postdata();
			
					else:
						echo '<h3>Keine Einträge in dieser Kategorie</h3>';
					endif;
				?>
				</div>
				</div>
				</div>
			</div>
			<div class="cntrl next">
				<span></span>
			</div>
        </div>
		
    </div>
</section>

<script>
jQuery(document).ready(function($) {
	
    $('#events .events-wrap-inner').slick({
		prevArrow: '#events .cntrl.prev span',
		nextArrow: '#events .cntrl.next span',
	});
	
});
</script>