<?php get_header(); ?>

<?php the_page_header(); ?>

<div class="section-content" role="main">
    <div class="container">

        <?php if(function_exists('yoast_breadcrumb')) { yoast_breadcrumb('<div class="breadcrumbs">','</div>'); } ?>

        <article class="news-post">
            <div class="news-post-text">

                <div class="content">

                    <h2>
                        <?php the_title(); ?>
                    </h2>
                    <p class="news-date">Erstellt am:
                        <?php the_time('j. M Y'); ?>
                    </p>
                    <hr>
                    <?php the_content(); ?>

                </div>

            </div>
            <div class="clearfix"></div>
        </article>

    </div>
</div>

<?php get_footer(); ?>
