<?php
/*
* Template Name: Produkte-Template
*/
get_header();

the_page_header();

$content = get_extended($post->post_content);
?>
    <div class="section-content" role="main">

        <div class="showboxes">
            <div class="container">

                <?php if(function_exists('yoast_breadcrumb')) { yoast_breadcrumb('<div class="breadcrumbs">','</div>'); } ?>

                <div class="box-table">
                    <div class="box-row">

                        <?php
			$products = new WP_Query(array(
				'post_type' => 'mep_produkte',
				'post_parent' => 0,
				'nopaging' => true,
				'order' => 'ASC',
        'orderby' => '',
        'order' => 'DESC',
        
        
        
			));
			
			$count = 1;
			
			if($products->have_posts()) : while($products->have_posts()) : $products->the_post();
			
				$thumbnail = (has_post_thumbnail()) ? ' style="background-image:url('.wp_get_attachment_url(get_post_thumbnail_id()).');"' : '';
			?>
      <div class="box" <?php echo $thumbnail; ?>>
          <div class="box-inner">
              <div>
                  <h2>
                      <?php the_title(); ?>
                  </h2>
                  <div class="excerpt">
                      <?php the_excerpt(); ?>
                  </div>
              </div>
              <a href="<?php the_permalink(); ?>"><?php _e('Details', 'mehler-ep'); ?></a>
          </div>
      </div>
      <?php
			if($count % 3 == 0)
				echo '</div><div class="box-row">';
			
			$count++;
			
			endwhile;
			wp_reset_postdata();
			
			else:
					echo '<h1>'. _e('Keine Einträge in dieser Kategorie', 'mehler-ep') .'</h1>';
				
			endif;
			?>

                    </div>
                </div>

              </div>
          </div>  

        <section class="page-entry container">
            <div class="content">
                <?php echo apply_filters('the_content', $content['main']); ?>
            </div>
        </section>

        <?php get_template_part('templates/cta', 'contact'); ?>
        
        <?php if(!empty($content['extended'])): ?>
        <section class="page-entry container">
            <div class="content">
                <?php echo apply_filters('the_content', $content['extended']); ?>
            </div>
        </section>
        <?php endif; ?>

    </div>

    <?php get_footer(); ?>
