<?php
get_header();

$content = get_extended($post->post_content);
?>

    <div id="front-slider">
        <?php if(ICL_LANGUAGE_CODE == 'de'):?>
        <?php echo do_shortcode("[metaslider id=68]"); ?>
        <?php elseif(ICL_LANGUAGE_CODE == 'en'):?>
        <?php echo do_shortcode("[metaslider id=1525]"); ?>
        <?php endif;?>


        	<div class="down-arrow"><a id="section_scroll_toggle" href="#Produktinformation"> 
        	</a></div>

    </div>

    <?php wp_reset_postdata(); ?>

    <div class="section-content" role="main" id="Produktinformation">


		
		<div class="showboxes">
            <div class="container">

				<div class="branchen-prod-table-wrap">
			
				<div class="branchen-prod-table">
					<div class="branchen-prod-row">
						<?php
						$count = 1;
            
            if ($posts):
            
						foreach(get_field("produkt_teaser") as $post) :
						        setup_postdata($post);
							$thumbnail = (has_post_thumbnail()) ? ' style="background-image:url('.wp_get_attachment_url(get_post_thumbnail_id()).');"' : '';
							?>
							<div class="branchen-prod-box">
								<div class="branchen-prod-box-inner">
									<div class="image" <?php echo $thumbnail; ?>></div>
									<h2><?php the_title(); ?></h2>
									<div class="content">
                    <?php the_excerpt(); ?>
									</div>
									
									<a href="<?php the_permalink(); ?> " class="button cyn light"><?php _e('Zum Produkt', 'mehler-ep'); ?></a>
									
								</div>
							</div>
							<?php
							if($count % 4 == 0)
								echo '</div></div><div class="branchen-prod-table"><div class="branchen-prod-row">';
				
							$count++;
				
						endforeach;
            endif;
						wp_reset_postdata();
						?>
					</div>
				</div>
								
				<a class="btn-cyn" href="<?php echo apply_filters('wpml_permalink', get_bloginfo('url').'/produkte/', ICL_LANGUAGE_CODE); ?>"><?php _e('Zu allen Produkten', 'mehler-ep'); ?></a>
				
				</div>

            </div>
        </div>

        <section class="page-entry container">
            <div class="content">
                <?php echo '<h1>' . insertSpanInH ( get_the_title () ) . '</h1>'; ?>
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