<?php
/*
* Template Name: Kontakte-Template
*/
get_header();

$content = get_extended($post->post_content);
?>

    <div class="section-content" role="main">
        <div id="contact-page" class="inner">

            <?php if(function_exists('yoast_breadcrumb')) { yoast_breadcrumb('<div class="breadcrumbs">','</div>'); } ?>

            <div id="map" class="sixty alignleft">
                <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d79582.15585626377!2d7.143237855673094!3d51.440852234247984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x47b8dfecca882a41%3A0x42a6d26ac30fe79!2sGemeinschaftspraxis+Dr.+Christoph+Przybylek+und+Dr.+Barbara+Przybylek!3m2!1d51.4408731!2d7.2132774!5e0!3m2!1sen!2sde!4v1498548036527" width="100%" height="480" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>

            <div id="contact-page-form">
                <div class="content forty alignright">
                    <h1>
                        <?php the_title(); ?>
                        </h2>
                        <?php echo apply_filters('the_content', $content['main']); ?>
                </div>
            </div>

            <div class="clearfix"></div>

            <?php if(!empty($content['extended'])): ?>
            <section class="page-entry inner">
                <div class="content">
                    <?php echo apply_filters('the_content', $content['extended']); ?>
                </div>
            </section>
            <?php endif; ?>

        </div>
    </div>

    <?php if(isset($_GET['subject'])): ?>
    <script type="text/javascript">
        var option = document.createElement("option");
        <?php if(ICL_LANGUAGE_CODE == 'de'): ?>
        var content = 'Infos über <?php echo $_GET['
        subject ']; ?>';
        <?php elseif(ICL_LANGUAGE_CODE == 'en'): ?>
        var content = 'Infos about <?php echo $_GET['
        subject ']; ?>';
        <?php endif; ?>
        option.text = content;
        option.value = content;
        var select = document.getElementById("subject");
        select.appendChild(option);
        for (var i = 0, j = select.options.length; i < j; ++i) {
            if (select.options[i].innerHTML === content) {
                select.selectedIndex = i;
                break;
            }
        }

    </script>
    <?php endif;?>

    <?php get_footer(); ?>
