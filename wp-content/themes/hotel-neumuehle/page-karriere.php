<?php
/*
* Template Name: Karriere
*/
get_header();
$content = explode("<!--more-->", $post->post_content);
?>

<main id="subpage">

	<section id="subpage-slider">
		<?php
		if(get_field('slider-shortcode')) :
			echo do_shortcode(get_field('slider-shortcode', false, false));
		else :

			$slider = false;
			$parents = get_post_ancestors(get_the_ID());

			if(!empty($parents)) :
				foreach($parents as $parent) :
					$shortcode = trim(get_field('slider-shortcode', $parent));
					if($shortcode && !empty($shortcode)) :
						$slider = get_field('slider-shortcode', $parent, false);
						break;
					endif;
				endforeach;
			endif;

			if($slider)
				echo do_shortcode($slider);
			else
				masterslider(1);

		endif;
		?>
		
		<?php get_template_part('templates/sektion', 'selektor'); ?>
	</section>

	<section id="intro" class="outer">
		<div class="inner">
		
			<div class="deco"></div>
			<div class="text">
				<?php echo apply_filters('the_content', $content[0]); ?>
			</div>
			
			<div id="hc-joblisten" style="overflow:hidden;">
				<style>
				.hc-joblist-next-page {
				  background: url(https://www.hotelcareer.de/images/1/arr_right2.png) no-repeat scroll center center transparent;
				  height: 12px;
				  width: 12px;
				  display: inline-block;
				}
				.hc-joblist-prev-page {
				  background: url(https://www.hotelcareer.de/images/1/arr_left2.png) no-repeat scroll center center transparent;
				  height: 12px;
				  width: 12px;
				  display: inline-block;
				}
				</style>

				<div class="hc-joblist clearfix">
					
					<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
					<script type="text/javascript" src="https://www.hotelcareer.de/js/ajaxjobliste.js"></script>

					<input class="jl-hotid" type="hidden" value="41767"/>
					<input class="jl-sprid" type="hidden" value="1"/>
				</div>
				
				<div class="text">
					<p class="hc-joblisten-outro">
						Wir freuen uns auf Ihre Bewerbung!<br>
						Unsere <a href="https://www.hotelcareer.de/jobs/romantik-hotel-neumühle-11365"  target="_blank" rel="noopener nofollow" title="HOTELCAREER Romantik Hotel Neumühle">Jobs im Romantik Hotel Neumühle</a> finden Sie auch auf der Online Jobbörse HOTELCAREER.
					</p>
				</div>
				
				<p style="display:block; float: right; border: none;">
					<img alt="Jobs Hotel" title="Jobs Hotel" src="https://www.hotelcareer.de/images/1/hc_powered_farbig_transp.png"/>
				</p>
			</div>
			
		</div>
	</section>

</main>

<?php get_footer(); ?>