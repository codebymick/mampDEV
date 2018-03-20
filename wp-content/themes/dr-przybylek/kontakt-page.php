<?php
/*
* Template Name: Kontakte-Template
*/
get_header();

the_page_header();

$content = get_extended($post->post_content);
?>

    <div class="section-content" role="main">
        <div id="contact-page" class="container">

            <?php if(function_exists('yoast_breadcrumb')) { yoast_breadcrumb('<div class="breadcrumbs">','</div>'); } ?>

            <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2535.4667220986785!2d9.681596999999988!3d50.54409!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a336a30730275b%3A0x62904948df020633!2sEdelzeller+Str.+44%2C+36043+Fulda!5e0!3m2!1sde!2sde!4v1429779721364" width="100%" height="480" frameborder="0" style="border:0"></iframe>
            </div>

            <div id="contact-page-form">
                <div class="content">
                    <h1>
                        <?php the_title(); ?>
                        </h2>
                        <?php echo apply_filters('the_content', $content['main']); ?>
                </div>
            </div>

            <div class="clearfix"></div>

            <?php if(!empty($content['extended'])): ?>
            <section class="page-entry container">
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
