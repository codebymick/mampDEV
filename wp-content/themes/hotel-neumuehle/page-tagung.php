<?php
get_header();
$content = explode("<!--more-->", $post->post_content);
?>

<main id="tagung">

	<section id="subpage-slider">
		<?php
		if(get_field('slider-shortcode')) :
			echo do_shortcode(get_field('slider-shortcode', false, false));
		else :
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
			
		</div>
	</section>
	
	<section id="tagungsrechner" class="outer">
		<div class="inner">
		
			<div id="tagung" class="outer">
            <form method="post" action="email.php">
			
				<!-- STEP ONE -->
                <div class="step" id="stepOne">
					<div class="step-header">Schritt 1: Teilnehmerzahl wählen</div>
					<div class="step-body">
						
						<div class="stepOne-sides-wrap">
							<div>
								<h3>Teilnehmerzahl Ganztags*</h3>
								<div class="teilnehmer-anzahl clearfix">
									<input type="number" name="anzahl_teilnehmer_eins" value="6" min="6" disabled>
									<div class="label">6</div>
									<div class="cntrls">
										<span data-math="plus"></span>
										<span data-math="minus"></span>
									</div>
								</div>
								<br>
								<br>
								<div class="text">
									<h5>*Mindestens 6 Personen</h5>
									<p>Tagungen können erst ab einer Teilnehmerzahl von 6 Personen durchgeführt werden.<br>Die ausgewählte Teilnehmerzahl ist für den ersten Tag der Tagung.</p>
								</div>
							</div>
							
							<div>
								<h3>Teilnehmerzahl Halbtags*</h3>
								<div class="teilnehmer-anzahl clearfix">
									<input type="number" name="anzahl_teilnehmer_zwei" value="0" min="0" disabled>
									<div class="label">0</div>
									<div class="cntrls">
										<span data-math="plus"></span>
										<span data-math="minus"></span>
									</div>
								</div>
								<br>
								<br>
								<div class="text">
									<h5>*Mindestens 6 Personen oder 0</h5>
									<p>wenn keine Halbtages Tagung am Folgetag erwünscht ist. Tagungen können erst ab einer Teilnehmerzahl von 6 Personen durchgeführt werden. Die ausgewählte Teilnehmerzahl ist für den zweiten Tag der Tagung und bezieht sich auf den halben Tag.</p>
								</div>
							</div>
						</div>

						<div class="buttons">
							<a href="#tagung" class="button" id="internal_redirection_one">
								<div>Weiter</div>
							</a>
						</div>
						
					</div>
                </div>
				<!-- END STEP ONE -->

                <!-- STEP TWO -->
				<div class="step" id="stepTwo">
					<div class="step-header">Schritt 2: Plan auswählen oder selbst zusammenstellen</div>
					<div class="step-body">
                    
						<!-- PLAN WÄHLEN -->
						<div class="waehle-plan">
							<p>Wählen Sie Ihren Plan aus:</p>
							<div class="options">
								<div class="option" id="superiorplan">
									TP Superior
								</div>
								<div class="option" id="halbtagesplan">
									Halbtag
								</div>
								<div class="option" id="selfmade">
									Selfmade
								</div>
							</div>
						</div>
					
						<!-- SEGMENT 1 -->
						<div class="segment">
						
							<div class="tbl-superheader">
								<table cellpadding="0" cellspacing="0" border="0">
									<thead>
										<tr>
											<th>Übernachtung/Frühstück</th>
											<th class="tphp tp">TP Superior inkl.</th>
											<th class="tphp hp">Halbtagespauschale</th>
											<th class="sm">Selfmade</th>
											<th class="sm">Ankreuzen (nur für Option "Selfmade") </th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Grundpreis:</td>
											<td class="tphp tp">180 € pro Person</td>
											<td class="tphp hp">60 € pro Person</td>
											<td class="sm">ab 105 € pro Person</td>
											<td class="sm"></td>
										</tr>
									</tbody>
								</table>
							</div>
						
						</div>
					
						<!-- SEGMENT 2 -->
						<div class="segment">

							<div class="tbl-header">
								<table cellpadding="0" cellspacing="0" border="0">
									<thead>
										<tr>
											<th>Kaffepause vormittags</th>
											<th class="tphp tp">inklusive</th>
											<th class="tphp hp">inklusive</th>
											<th class="sm"></th>
											<th class="fill sm"> <span id="summe_kaffe_vormittags"></span>€</th>
										</tr>
									</thead>
								</table>
							</div>

							<div class="tbl-content">
								<table cellpadding="0" cellspacing="0" border="0">
									<tbody>
										<tr>
											<td>Kaffe und Tee</td>
											<td class="tphp tp">inklusive</td>
											<td class="tphp hp">inklusive</td>
											<td class="sm">2,00 €</td>
											<td class="fill sm">
												<input onclick="return false;" type="checkbox" name="kaffeetee" value="1" checked/>
											</td>
										</tr>
										<tr>
											<td>Müsli und Joghurt</td>
											<td class="tphp tp"></td>
											<td class="tphp hp"></td>
											<td class="sm">2,00 €</td>
											<td class="fill sm">
												<input type="hidden" name="mueslijoghurt" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
											</td>
										</tr>
										<tr>
											<td>Nussmischung</td>
											<td class="tphp tp"></td>
											<td class="tphp hp"></td>
											<td class="sm">2,00 €</td>
											<td class="fill sm">
												<input type="hidden" name="nussmischung" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
											</td>
										</tr>
										<tr>
											<td>Plunderteilchen süß</td>
											<td class="tphp tp"></td>
											<td class="tphp hp">inklusive</td>
											<td class="sm">2,00 €</td>
											<td class="fill sm">
												<input type="hidden" name="plundersuess" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
											</td>
										</tr>
										<tr>
											<td>Plunderteilchen herzhaft und süß</td>
											<td class="tphp tp">inklusive</td>
											<td class="tphp hp">inklusive</td>
											<td class="sm">2,00 €</td>
											<td class="fill sm">
												<input onclick="return false;" type="checkbox" name="plundersuessuherz" value="1" checked/>

											</td>
										</tr>
										<tr>
											<td>Gemüsesticks mit Dipp</td>
											<td class="tphp tp"></td>
											<td class="tphp hp"></td>
											<td class="sm">2,50 €</td>
											<td class="fill sm">
												<input type="hidden" name="gemuesesticks" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
											</td>
										</tr>
										<tr>
											<td>Butterbrezel</td>
											<td class="tphp tp"></td>
											<td class="tphp hp"></td>
											<td class="sm">2,50 €</td>
											<td class="fill sm">
												<input type="hidden" name="butterbrezel" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
											</td>
										</tr>
									</tbody>
								</table>
							</div>

						</div>
					
						<!-- SEGMENT 3 -->
						<div class="segment">

							<div class="tbl-header">
								<table cellpadding="0" cellspacing="0" border="0">
									<thead>
										<tr>
											<th>Mittagessen</th>
											<th class="tphp tp"></th>
											<th class="tphp hp"></th>
											<th class="sm"></th>
											<th class="sm"><span id="summe_mittagessen"></span>€</th>
										</tr>
									</thead>
								</table>
							</div>
							
							<div class="tbl-content">
								<table cellpadding="0" cellspacing="0" border="0">
									<tbody>
										<tr>
											<td>Imbiss</td>
											<td class="tphp tp"></td>
											<td class="tphp hp"></td>
											<td class="sm">18,00 €</td>
											<td class="fill sm" id="imbiss">
												<input type="hidden" name="imbiss" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
											</td>
										</tr>
										<tr>
											<td>3 Tellergerichte zur Wahl</td>
											<td class="tphp tp">inklusive</td>
											<td class="tphp hp">inklusive</td>
											<td class="sm">22,00 €</td>
											<td class="fill sm" id="dreiteller"><input type="hidden" name="dreiteller" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"></td>
										</tr>
										<tr>
											<td>2 Gänge Menü mit 3 Tellergerichten zur Wahl</td>
											<td class="tphp tp"></td>
											<td class="tphp hp"></td>
											<td class="sm">30,00 €</td>
											<td class="fill sm" id="zweigaenge"><input type="hidden" name="zweigaenge" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"></td>
										</tr>
										<tr>
											<td>3 Gänge Menü</td>
											<td class="tphp tp"></td>
											<td class="tphp hp"></td>
											<td class="sm">35,00 €</td>
											<td class="fill sm" id="dreigaenge"><input type="hidden" name="dreigaenge" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"></td>
										</tr>
									</tbody>
								</table>
							</div>

						</div>
						
						<!-- SEGMENT 4 -->
						<div class="segment">

							<div class="tbl-header">
								<table cellpadding="0" cellspacing="0" border="0">
									<thead>
										<tr>
											<th>Kaffepause nachmittags</th>
											<th class="tphp tp">inklusive</th>
											<th class="tphp hp">inklusive</th>
											<th class="sm"></th>
											<th class="sm"> <span id="summe_kaffe_nachmittags"></span>€</th>
										</tr>
									</thead>
								</table>
							</div>

							<div class="tbl-content">
								<table cellpadding="0" cellspacing="0" border="0">
									<tbody>
										<tr>
											<td>Kaffe und Tee</td>
											<td class="tphp tp">inklusive</td>
											<td class="tphp hp"></td>
											<td class="sm">2,00 €</td>
											<td class="fill sm">
												<input type="checkbox" name="kaffeetee_nachm" onclick="return false;" value="1" checked/>
											</td>
										</tr>
										<tr>
											<td>Müsli und Joghurt</td>
											<td class="tphp tp"></td>
											<td class="tphp hp"></td>
											<td class="sm">2,00 €</td>
											<td class="fill sm"><input type="hidden" name="mueslijoghurt_nachm" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"></td>
										</tr>
										<tr>
											<td>Nussmischung</td>
											<td class="tphp tp"></td>
											<td class="tphp hp"></td>
											<td class="sm">2,00 €</td>
											<td class="fill sm"><input type="hidden" name="nussmischung_nachm" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"></td>
										</tr>
										<tr>
											<td>Kuchen</td>
											<td class="tphp tp">inklusive</td>
											<td class="tphp hp"></td>
											<td class="sm">2,30 €</td>
											<td class="fill sm">
												<input type="checkbox" name="kuchen_nachm" onclick="return false;" value="1" checked/>
											</td>
										</tr>
										<tr>
											<td>Plunderteilchen süß</td>
											<td class="tphp tp"></td>
											<td class="tphp hp"></td>
											<td class="sm">2,00 €</td>
											<td class="fill sm"><input type="hidden" name="plundersuess_nachm" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"></td>
										</tr>
										<tr>
											<td>Plunderteilchen herzhaft und süß</td>
											<td class="tphp tp">inklusive</td>
											<td class="tphp hp"></td>
											<td class="sm">2,00 €</td>
											<td class="fill sm"><input type="checkbox" name="plundersuessuherz_nachm" onclick="return false;" value="1" checked/>
										</tr>
										<tr>
											<td>Gemüsesticks mit Dipp</td>
											<td class="tphp tp"></td>
											<td class="tphp hp"></td>
											<td class="sm">2,50 €</td>
											<td class="fill sm"><input type="hidden" name="gemuesesticks_nachm" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"></td>
										</tr>
										<tr>
											<td>Butterbrezel</td>
											<td class="tphp tp"></td>
											<td class="tphp hp"></td>
											<td class="sm">2,50 €</td>
											<td class="fill sm"><input type="hidden" name="butterbrezel_nachm" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"></td>
										</tr>
									</tbody>
								</table>
							</div>

						</div>
						
						<!-- SEGMENT 5 -->
						<div class="segment">

							<div class="tbl-header">
								<table cellpadding="0" cellspacing="0" border="0">
									<thead>
										<tr>
											<th>Getränke</th>
											<th class="tphp tp"></th>
											<th class="tphp hp"></th>
											<th class="sm"></th>
											<th class="sm"> <span id="summe_getraenke"></span>€</th>
										</tr>
									</thead>
								</table>
							</div>

							<div class="tbl-content">
								<table cellpadding="0" cellspacing="0" border="0">
									<tbody>
										<tr>
											<td>Getränke ganztags im Raum</td>
											<td class="tphp tp">inklusive</td>
											<td class="tphp hp">inklusive</td>
											<td class="sm">10,00 €</td>
											<td class="fill sm"><input type="hidden" name="getr_gata_ra" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"></td>
										</tr>
										<tr>
											<td>Getränke zum Mittagessen</td>
											<td class="tphp tp">inklusive</td>
											<td class="tphp hp">inklusive</td>
											<td class="sm">10,00 €</td>
											<td class="fill sm"><input type="hidden" name="getr_zu_mi" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"></td>
										</tr>
										<tr>
											<td>Getränke zum Abendessen</td>
											<td class="tphp tp">inklusive</td>
											<td class="tphp hp"></td>
											<td class="sm">5,00 €</td>
											<td class="fill sm"><input type="hidden" name="getr_zu_ab" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"></td>
										</tr>
									</tbody>
								</table>
							</div>

						</div>
						
						<!-- SEGMENT 6 -->
						<div class="segment">
						
							<div class="tbl-header">
								<table cellpadding="0" cellspacing="0" border="0">
									<thead>
										<tr>
											<th>Im Raum</th>
											<th class="tphp tp"></th>
											<th class="tphp hp"></th>
											<th class="sm"></th>
											<th class="sm"> <span id="summe_im_raum"></span>€</th>
										</tr>
									</thead>
								</table>
							</div>

							<div class="tbl-content">
								<table cellpadding="0" cellspacing="0" border="0">
									<tbody>
										<tr>
											<td>Nespresso Maschine ganztags</td>
											<td class="tphp tp">inklusive</td>
											<td class="tphp hp"></td>
											<td class="sm">2,00 €</td>
											<td class="fill sm"><input type="hidden" name="nespr_gata" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"></td>
										</tr>
										<tr>
											<td>Mini-Schokoriegel</td>
											<td class="tphp tp">inklusive</td>
											<td class="tphp hp">inklusive</td>
											<td class="sm">2,00 €</td>
											<td class="fill sm"><input type="hidden" name="mini_schoko" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"></td>
										</tr>
										<tr>
											<td>Obstkorb</td>
											<td class="tphp tp">inklusive</td>
											<td class="tphp hp">inklusive</td>
											<td class="sm">2,50 €</td>
											<td class="fill sm"><input type="hidden" name="obstkorb_ra" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"></td>
										</tr>
										<tr>
											<td>Moderatorenkoffer</td>
											<td class="tphp tp">inklusive</td>
											<td class="tphp hp">inklusive</td>
											<td class="sm">2,00 €</td>
											<td class="fill sm"><input type="hidden" name="mod_koffer" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"></td>
										</tr>
										<tr>
											<td>2 FC</td>
											<td class="tphp tp">inklusive</td>
											<td class="tphp hp">inklusive</td>
											<td class="sm">inklusive</td>
											<td class="fill sm">-</td>
										</tr>
										<tr>
											<td>2 PW</td>
											<td class="tphp tp">inklusive</td>
											<td class="tphp hp">inklusive</td>
											<td class="sm">inklusive</td>
											<td class="fill sm">-</td>
										</tr>
									</tbody>
								</table>
							</div>

						</div>
						
						<!-- SEGMENT 7 -->
						<div class="segment">

							<div class="tbl-header">
								<table cellpadding="0" cellspacing="0" border="0">
									<thead>
										<tr>
											<th>Abendessen</th>
											<th class="tphp tp"></th>
											<th class="tphp hp"></th>
											<th class="sm"></th>
											<th class="sm"> <span id="summe_abendessen"></span>€</th>
										</tr>
									</thead>
								</table>
							</div>

							<div class="tbl-content">
								<table cellpadding="0" cellspacing="0" border="0">
									<tbody>
										<tr>
											<td>3 Gänge Menü</td>
											<td class="tphp tp">inklusive</td>
											<td class="tphp hp"></td>
											<td class="sm">40,00 €</td>
											<td id="dreigaenge_abend" class="fill sm"><input type="hidden" name="dreigaenge_abend" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"></td>
										</tr>
										<tr>
											<td>4 Gänge Menü</td>
											<td class="tphp tp"></td>
											<td class="tphp hp"></td>
											<td class="sm">52,00 €</td>
											<td id="viergaenge_abend" class="fill sm"><input type="hidden" name="viergaenge_abend" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"></td>
										</tr>
										<tr>
											<td>5 Gänge Menü</td>
											<td class="tphp tp"></td>
											<td class="tphp hp"></td>
											<td class="sm">55,00 €</td>
											<td id="fuenfgaenge_abend" class="fill sm"><input type="hidden" name="fuenfgaenge_abend" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"></td>
										</tr>
									</tbody>
								</table>
							</div>

						</div>
						
						<!-- SEGMENT 8 -->
						<div class="segment">

							<div class="tbl-header">
								<table cellpadding="0" cellspacing="0" border="0">
									<thead>
										<tr>
											<th>zuzüglich Pro Tag</th>
											<th class="tphp tp"></th>
											<th class="tphp hp"></th>
											<th class="sm"></th>
											<th class="sm"> <span id="summe_raummiete"></span>€*</th>
										</tr>
									</thead>
								</table>
							</div>

							<div class="tbl-content">
								<table cellpadding="0" cellspacing="0" border="0">
									<tbody>
										<tr>
											<td>Raummiete*</td>
											<td>200,00 €</td>
											<td>100,00 €</td>
											<td class="sm"></td>
											<td class="fill"><input onclick="return false;" type="checkbox" name="raummiete" value="200" checked>
										</tr>
										<tr>
											<td>Gruppenraummiete*</td>
											<td>100,00 €</td>
											<td>50,00 €</td>
											<td class="sm"></td>
											<td class="fill"><input type="hidden" name="gruppenraummiete" value="0"><input type="checkbox" onclick="this.previousSibling.value=100-this.previousSibling.value"></td>
										</tr>
									</tbody>
								</table>
							</div>

						</div>
						
						<!-- SEGMENT 9 -->
						<div class="segment">

							<div class="tbl-header sm">
								<table cellpadding="0" cellspacing="0" border="0">
									<thead>
										<tr>
											<th class="summen">Teilnehmerzahl Tag</th>
											<th>
												<span id="summe_teilnehmer_eins"></span>
											</th>
										</tr>
									</thead>
								</table>
							</div>

							<div class="tbl-header sm">
								<table cellpadding="0" cellspacing="0" border="0">
									<thead>
										<tr>
											<th class="summen">Ihre Tagespauschale pro Person</th>
											<th> <span id="summe_pauschale_eins"></span>€</th>
										</tr>
									</thead>
								</table>
							</div>

							<div class="tbl-header sm">
								<table cellpadding="0" cellspacing="0" border="0">
									<thead>
										<tr>
											<th class="summen">Teilnehmerzahl Halbtag</th>
											<th><span id="summe_teilnehmer_zwei"></span></th>
										</tr>
									</thead>
								</table>
							</div>

							<div class="tbl-header sm">
								<table cellpadding="0" cellspacing="0" border="0">
									<thead>
										<tr>
											<th class="summen">Ihre Halbtagespauschale pro Person</th>
											<th> <span id="summe_pauschale_zwei"></span>€</th>
										</tr>
									</thead>
								</table>
							</div>

							<div class="tbl-header sm">
								<table cellpadding="0" cellspacing="0" border="0">
									<thead>
										<tr>
											<th class="summen">Pauschale gesamt</th>
											<th> <span id="summe_pauschale_gesamt"></span>€</th>
										</tr>
									</thead>
								</table>
							</div>

							<div class="tbl-superheader sm">
								<table cellpadding="0" cellspacing="0" border="0">
									<thead>
										<tr>
											<th class="summen">Summe Veranstaltung</th>
											<th> <span id="summe_gesamt"></span>€</th>
										</tr>
									</thead>
								</table>
							</div>

							<div class="tbl-header sm">
								<table cellpadding="0" cellspacing="0" border="0">
									<thead>
										<tr>
											<th class="summen">davon entfallen auf Raummiete</th>
											<th> <span id="summe_raummiete_total"></span>€</th>
										</tr>
									</thead>
								</table>
							</div>
							
						</div>

						<div class="buttons">
							<a href="#tagung" class="button" id="internal_redirection_back">
								<div>Zurück</div>
							</a>
							<a href="#tagung" class="button" id="internal_redirection_two">
								<div>Weiter</div>
							</a>
						</div>
					
					</div>
                </div>
				<!-- END STEP TWO -->
				
				<!-- STEP THREE -->
				<div class="step" id="lastStep">
					<div class="step-header">Schritt 3: Kontaktdaten ausfüllen und absenden</div>
					<div class="step-body">
				
						<div>
							<label for="fname">Vorname</label>
							<input type="text" id="fname" name="firstname" placeholder="Max" required>

							<label for="lname">Nachname</label>
							<input type="text" id="lname" name="lastname" placeholder="Mustermann" required>
							
							<div>
								<label for="email">Email</label>
								<input type="email" id="email" name="email" placeholder="MaxMustermann@Musterfirma.de" required>
							</div>
							
							<div>
								<label for="organame">Name der Organisation</label>
								<input type="text" id="oname" name="organamename" placeholder="Musterfirma GmbH" required>
							</div>

							<label for="organame2">Vollständige Firmenadresse</label>
							<input type="text" id="oadresse" name="orgaadresse" placeholder="Musterstraße 1, 98989 Musterstadt">

							<div>
								<label for="anreise">Anreise</label>
								<input type="date" id="tagung-anreise" name="anreise" class="form-date" placeholder="anresie">
							</div>
							
							<div>
								<label for="abreise">Abreise</label>
								<input type="date" id="tagung-abreise" name="abreise" class="form-date" placeholder="abreise">
							</div>
							
							<br>

							<label for="organame3">Telefonnummer für Rückfragen</label>
							<input type="text" id="tel" name="tel" placeholder="+49 171 242424242">
							
							<label for="subject">Sonstige Anmerkungen</label>
							<textarea id="subject" name="subject" placeholder="Anmerkungen? Fragen? Stellen Sie sie hier ganz einfach hier." style="height:200px"></textarea>

						</div>
						
						<div class="buttons">
							<a href="#tagung" class="button" id="internal_redirection_three">
								<div>Zurück</div>
							</a>
							<div class="button">
								<input type="submit" value="Anfrage absenden" id="submitButton">
							</div>
						</div>
				
					</div>
				</div>
				<!-- END STEP THREE -->
				
            </form>
			</div>
		
		</div>
	</section>
	
	<?php get_template_part('templates/sektion', 'galleryFull'); ?>
	
	<?php get_template_part('templates/sektion', 'downloads'); ?>
	
	<?php if(isset($content[1])) : ?>
	<section id="subpage-text" class="outer">
		<div class="inner">
		
			<div class="text">
				<?php echo apply_filters('the_content', $content[1]); ?>
			</div>
			
		</div>
	</section>
	<?php endif; ?>
	
	<?php get_template_part('templates/sektion', 'cta'); ?>
	
</main>

<?php get_footer(); ?>