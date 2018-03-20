<?php get_header(); ?>

<div class='outerWrap'>
    <div class='innerWrap clearfix'>

        <?php if(function_exists('yoast_breadcrumb')) { yoast_breadcrumb('<div class="breadcrumbs">','</div>'); } ?>

        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

        <div class='sidebar'>


            <div class='content'>



                <div class='text'>
                    <?php the_content(); ?>
                </div>

                <?php endwhile; endif; ?>

            </div>

        </div>
    </div>

    <?php get_footer(); ?>
