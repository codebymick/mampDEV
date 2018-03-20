<?php
get_header();

the_page_header();

$content = get_extended($post->post_content);

$branchen = new WP_Query(array(
	'post_type' => 'mep_branchen',
	'post_parent' => get_the_ID(),
	'nopaging' => true,
	'orderby' => 'menu_order',
	'order' => 'ASC'
));
?>

    <div class="section-content white" role="main">

        <?php if($branchen->have_posts()) : ?>
		
		<section class="page-entry container clearfix" id="single-branche">
			<?php if(function_exists('yoast_breadcrumb')) { yoast_breadcrumb('<div class="breadcrumbs">','</div>'); } ?>
			
			<div class="left-side twothirds">
				<div class="content">
					<?php echo apply_filters('the_content', $content['main']); ?>
				</div>
			</div>
			
			<div class="right-side onethird">
				<div class="branche-animcon">
                    <?php if(get_field('br_animation')) : ?>
                    <div class="branche-animation">
                        <h2>Animation</h2>
                        <?php
							$video = get_field('br_animation');
							echo wp_video_shortcode(array(
								'src' => $video['url'],
								'loop' => 'on'
							));
						?>
                    </div>
                    <?php endif; ?>
                </div>
			</div>
		</section>

        <div class="showboxes">
            <div class="container">

				<div class="branchen-prod-table">
					<div class="branchen-prod-row">
						<?php
						$count = 1;
				
						while($branchen->have_posts()) : $branchen->the_post();
							$thumbnail = (has_post_thumbnail()) ? ' style="background-image:url('.wp_get_attachment_url(get_post_thumbnail_id()).');"' : '';
							?>
							<div class="branchen-prod-box">
								<div class="branchen-prod-box-inner">
									<div class="image" <?php echo $thumbnail; ?>></div>
									<h2><?php the_title(); ?></h2>
									<div class="content">
										<?php the_excerpt(); ?>
									</div>
									<a href="<?php echo apply_filters('wpml_permalink', get_bloginfo('url').'/kontakt/', ICL_LANGUAGE_CODE).'?subject='.get_the_title(); ?>" class="button cyn light"><?php _e('Infos anfordern über ', 'mehler-ep') . the_title(); ?></a>
									</div>
							</div>
							<?php
							if($count % 3 == 0)
								echo '</div></div><div class="branchen-prod-table"><div class="branchen-prod-row">';
				
							$count++;
				
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div>

            </div>
        </div>

        <?php if(!empty($content['extended'])) : ?>
        <section class="page-entry container">
            <div class="content">
                <?php echo apply_filters('the_content', $content['extended']); ?>
            </div>
        </section>
        <?php endif; ?>

        <?php get_template_part('templates/cta', 'contact'); ?>

        <?php else : ?>

        <section class="page-entry container">
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

        <?php endif; ?>

    </div>

    <?php get_footer(); ?>
