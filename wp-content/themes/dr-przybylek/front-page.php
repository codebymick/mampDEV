<?php
get_header();
$content = explode("<!--more-->", $post->post_content);
?>

<div class="clearfix"></div>
<div id="intro-sektion" class="outer">
    <div class="inner">
        <h1><?php the_title(); ?></h1>
        <div class="text sixty alignleft">
            <?php echo apply_filters('the_content', $content[0]); ?>
        </div>
        <div class="zeiten forty alignright">
            <h3>Wir sind für Sie da:</h3>
            <div class="timetable">
                <div class="row">
                    <div class="header alignleft">Montag</div>
                    <p class="detail alignleft">08:00 - 12:00 Uhr, 14:00 - 18:00 Uhr</p>
                </div>
                <div class="row">
                    <div class="alignleft header">Dienstag</div>
                    <p class="alignleft detail">08:00 - 12:00 Uhr, 14:00 - 18:00 Uhr</p>
                </div>
                <div class="row">
                    <div class="alignleft header">Mittwoch</div>
                    <p class="alignleft detail">08:00 - 16:00 Uhr</p>
                </div>
                <div class="row">
                    <div class="alignleft header">Donnerstag</div>
                    <p class="alignleft detail">08:00 - 12:00 Uhr, 14:00 - 18:00 Uhr</p>
                </div>
                <div class="row">
                    <div class="alignleft header">freitag</div>
                    <p class="alignleft detail">08:00 - 16:00 Uhr</p>

                </div>
                <div class="clearfix"></div>
                <p><br>Außerhalb unserer Sprechzeiten wenden Sie sich bitte an den zahnärztlichen Notdienst unter 0234 – 77 00 55.</p>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div id="fourlinks" class="outer">
    <div class="layer2">
        <div class="inner">
            <div class="linkbtn">
                <a href="#">
					<div class="linklabel" style="background:url('<?php bloginfo('template_url'); ?>/images/parking.png') no-repeat center left;">
						<p>Ausreichende <br>Parkm&ouml;glichkeiten</p>
					</div>
				</a>
            </div>
            <div class="linkbtn">
                <a href="#">
					<div class="linklabel" style="background:url('<?php bloginfo('template_url'); ?>/images/barriere.png') no-repeat center left;">
						<p>Behandlung von Menschen <br>mit Behinderung</p>
					</div>
				</a>
            </div>
            <div class="linkbtn">
                <a href="#">
					<div class="linklabel" style="background:url('<?php bloginfo('template_url'); ?>/images/notdienst.png') no-repeat center left;">
						<p>Zahn&auml;rztlicher <br>Notdienst</p>
					</div>
				</a>
            </div>
            <div class="linkbtn">
                <a href="#">
					<div class="linklabel" style="background:url('<?php bloginfo('template_url'); ?>/images/repair.png') no-repeat center left;">
						<p>Schnelle <br>Reperaturen</p>
					</div>
				</a>
            </div>
            <div class="ltl-logo"></div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div id="anliegen" class="outer">
    <h2>IHR ANLIEGEN</h2>
    <div class="inner">
        <table>
            <td>
                <div>
                    <h3>Ruhestand? Bloß nicht. Meine Z&auml;hne sollen jetzt alles mitmachen.</h3>
                    <p>Alterszahnheilkunde</p>
                </div>
            </td>
            <td>
                <div>
                    <h3>Ein L&auml;cheln ohne L&uuml;cken – genau richtig f&uuml;r mich.</h3>
                    <p>Zahnimplantate</p>
                </div>
            </td>
            <td>
                <div>
                    <h3>Wir arbeiten kindgerecht. Und elterngerecht. </h3>
                    <p>Kinder- und Jugend- Zahnheilkunde</p>
                </div>
            </td>
            <td>
                <div>
                    <h3>Rund um saubere Z&auml;hne, rund um ein gutes Gef&uuml;hl. </h3>
                    <p>Prophylaxe </p>
                </div>
            </td>
        </table>
        <table>
            <td>
                <div>
                    <h3>Meine Z&auml;hne sollen ein Leben lang halten.</h3>
                    <p>Parodontologie</p>
                </div>
            </td>
            <td>
                <div>
                    <h3>Wir gehen unter die Haut. </h3>
                    <p>Oralchirurgie </p>
                </div>
            </td>
            <td>
                <div>
                    <h3>Viel Fingerspitzengefühl f&uuml;r Menschen mit besonderen Bedürfnissen.</h3>
                    <p>Zahnheilkunde f&uuml;r behinderte Menschen</p>
                </div>
            </td>
            <td>
                <div>
                    <h3>Der Kiefer macht Ger&auml;usche? </h3>
                    <p>Funktionsanalyse</p>
                </div>
            </td>
        </table>
    </div>

</div>
<div class="clearfix"></div>
<div id="cta" class="outer">
    <div class="inner">
        <h1>Sie haben fragen?</h1><br>
        <h3>Rufen Sie uns an oder nutzen sIe unser KontaktformulaR</h3>
        <div class="cta-btn">02 34 - 952 999 702</div>
        <div class="cta-btn">Zum Kontaktformular</div>
    </div>
</div>
<div class="clearfix"></div>
<div id="artikel" class="outer">
    <div class="inner">
	
		<div class="text">
			<?php echo apply_filters('the_content', $content[1]); ?>
		</div>
		
    </div>
</div>
<div class="clearfix"></div>

<div id="aktuelles" class="outer">
    <h2>Aktuelles</h2>
    <div class="inner">
		
		<?php
		$count = 1;
		
		$news = new WP_Query(array(
			'posts_per_page' => 3
		));
		if($news->have_posts()) : while($news->have_posts()) : $news->the_post();
			$box = 'box-'.$count;
		?>
		<div class="box third <?php echo $box; ?>">
            <div>
                <h3><?php the_title(); ?></h3>
            </div>
			<div class="image">
				<?php if(has_post_thumbnail()) the_post_thumbnail(); ?>
			</div>
            <div class="text">
                <?php the_excerpt(); ?>
                <div class="cta-btn">weiterlesen &#x2192;</div>
            </div>
        </div>
		<?php
		$count++;
		
		endwhile; endif;
		wp_reset_postdata();
		?>
		
    </div>
</div>
<div class="clearfix"></div>
<div id="artikel-mit" class="outer">
    <div class="inner">
	
        <div class="text">
            <?php echo apply_filters('the_content', $content[2]); ?>
        </div>
	
    </div>
</div>
<?php get_footer();
?>
