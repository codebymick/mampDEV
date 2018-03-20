//-----------TAGUNG CALUCULATIONS------------------------------------

jQuery(document).ready(function($) {
	
	
	/* STEP 1 */
		/* STEP 1 - UP AND DOWN */
		$('#tagungsrechner #stepOne .teilnehmer-anzahl .cntrls span').click(function() {
			
			var fakeInput = $(this).parents('.teilnehmer-anzahl').find('.label');
			var label = $(this).parents('.teilnehmer-anzahl').find('input');
			var labelValue = parseInt(label.val());
			var inputMin = parseInt(label.attr('min'));
			
			if($(this).attr('data-math') == 'plus') { // + 1
				if(labelValue >= 100)
					return false;
				
				label.val(labelValue + 1);
			}
			else { // - 1
				if(labelValue == inputMin)
					return false;
				
				label.val(labelValue - 1);
			}
			
			fakeInput.html(label.val());
			
		});
	
	
	/* STEP 2 */
	
		/* ---Preise--- */
		/* Kaffee vor-und nachmittags */
		var z = 2.00;
		var zf = 2.50;
		var zd = 2.30;

		/* Mittagessen */
		var az = 18.00;
		var zz = 22.00;
		var dr = 30.00;
		var fd = 35.00;

		/*Ausstattung im Raum - Getränke*/
		var zeh = 10.00;
		var fue = 5.00;

		/*Ausstattung im Raum - Sonstiges*/
		var vr = 4.00;

		/* Abendessen */
		var vz = 40.00;
		var zuf = 52.00;
		var ff = 55.00;

		/*ZZgl. Pro Tag*/
		var zh = 200.00;
		var eh = 100.00;
		var fz = 50.00

		/*Personenpauschalen*/
		var p1 = 180.00;
		var p2 = 60.00

		/*Clickevents*/
		$("#imbiss").click(function () {
			$("#dreiteller").toggleClass("hide");
			$("#zweigaenge").toggleClass("hide");
			$("#dreigaenge").toggleClass("hide");
		});

		$("#zweigaenge").click(function () {
			$("#dreiteller").toggleClass("hide");
			$("#imbiss").toggleClass("hide");
			$("#dreigaenge").toggleClass("hide");
		});

		$("#dreiteller").click(function () {
			$("#imbiss").toggleClass("hide");
			$("#zweigaenge").toggleClass("hide");
			$("#dreigaenge").toggleClass("hide");
		});

		$("#dreigaenge").click(function () {
			$("#dreiteller").toggleClass("hide");
			$("#zweigaenge").toggleClass("hide");
			$("#imbiss").toggleClass("hide");
		});

		$("#dreigaenge_abend").click(function () {
			$("#viergaenge_abend").toggleClass("hide");
			$("#fuenfgaenge_abend").toggleClass("hide");
		});

		$("#viergaenge_abend").click(function () {
			$("#dreigaenge_abend").toggleClass("hide");
			$("#fuenfgaenge_abend").toggleClass("hide");
		});

		$("#fuenfgaenge_abend").click(function () {
			$("#dreigaenge_abend").toggleClass("hide");
			$("#viergaenge_abend").toggleClass("hide");
		});

		$("#internal_redirection_one").click(function () {
			$("#stepOne").addClass("off");
			$("#stepOne").removeClass("on");
			$("#stepTwo").addClass("on");
		});

		$("#internal_redirection_back").click(function () {
			$("#stepOne").toggleClass("off on");
			$("#stepTwo").toggleClass("on off");
		});

		$("#internal_redirection_three").click(function () {
			$("#lastStep").addClass("off");
			$("#lastStep").removeClass("on");
			$("#stepTwo").addClass("on");
		});

		$("#superiorplan").click(function () {
			$("#superiorplan").toggleClass("button-on");
			$(".sm").addClass("fade_table");
			$("#selfmade").addClass("fade_table");
			$("#halbtagesplan").toggleClass("button-on")
		});

		$("#halbtagesplan").click(function () {
			$("#halbtagesplan").toggleClass("button-on");
			$(".sm").addClass("fade_table");
			$("#selfmade").addClass("fade_table");
			$("#superiorplan").toggleClass("button-on");
		});

		$("#selfmade").click(function () {
			$("#selfmade").toggleClass("button-on");
			$(".tphp").toggleClass("fade_table");
			$("#superiorplan").toggleClass("fade_table");
			$("#halbtagesplan").toggleClass("fade_table");
		});

		$(".hide_plan").click(function (e) {
			e.preventDefault();
			return false;
		});

		$("#internal_redirection_two").click(function () {
			if (!$("#superiorplan").is(".fade_table") && !$("#selfmade").is(".fade_table")) {
				alert("Bitte wählen Sie einen Plan aus")
			} else {
				$("#stepTwo").addClass("off");
				$("#stepTwo").removeClass("on");
				$("#lastStep").addClass("on");
			}
		});




	setInterval(function () {

		/*------ Kaffee vormittags ----*/
		var kaffeetee = $("input[name='kaffeetee']").val();
		var mueslijoghurt = $("input[name='mueslijoghurt']").val();
		var nussmischung = $("input[name='nussmischung']").val();
		var plundersuess = $("input[name='plundersuess']").val();
		var plundersuessuherz = $("input[name='plundersuessuherz']").val();
		var gemuesesticks = $("input[name='gemuesesticks']").val();
		var butterbrezel = $("input[name='butterbrezel']").val();
		/*Summe*/
		var sum1 = parseFloat(kaffeetee * z + mueslijoghurt * z + nussmischung * z + plundersuess * z + plundersuessuherz * z + gemuesesticks * zf + butterbrezel * zf)
		/*Insert Summe in HTML*/
		$("#summe_kaffe_vormittags").text(sum1.toFixed(2))
		/*-------------------- Ende Kaffee vormittags ----------------------------*/


		/*------- Mittagessen ------- */
		var imbiss = $("input[name='imbiss']").val();
		var dreiteller = $("input[name='dreiteller']").val();
		var zweigaenge = $("input[name='zweigaenge']").val();
		var dreigaenge = $("input[name='dreigaenge']").val();

		/*Summe*/
		var sum2 = parseFloat(imbiss * az + dreiteller * zz + zweigaenge * dr + dreigaenge * fd);

		/*Insert Summe in HTML*/
		$("#summe_mittagessen").text(sum2.toFixed(2))
		/*------------------------ Ende Mittagessen ---------------------------------*/


		/*------ Kaffee nachmittags --------*/
		var kaffeetee_nachm = $("input[name='kaffeetee_nachm']").val();
		var mueslijoghurt_nachm = $("input[name='mueslijoghurt_nachm']").val();
		var nussmischung_nachm = $("input[name='nussmischung_nachm']").val();
		var plundersuess_nachm = $("input[name='plundersuess_nachm']").val();
		var plundersuessuherz_nachm = $("input[name='plundersuessuherz_nachm']").val();
		var gemuesesticks_nachm = $("input[name='gemuesesticks_nachm']").val();
		var butterbrezel_nachm = $("input[name='butterbrezel_nachm']").val();
		var kuchen_nachm = $("input[name='kuchen_nachm']").val();
		/*Summe*/
		var sum3 = parseFloat(kaffeetee_nachm * z + mueslijoghurt_nachm * z + nussmischung_nachm * z + plundersuess_nachm * z + plundersuessuherz_nachm * z + gemuesesticks_nachm * zf + butterbrezel_nachm * zf + kuchen_nachm * zd)
		/*Insert Summe in HTML*/
		$("#summe_kaffe_nachmittags").text(sum3.toFixed(2))
		/*------------------------ Ende Kaffee nachmittags ---------------------------*/


		/*------- Ausstattung im Raum / Getränke --------*/
		var getr_gata_ra = $("input[name='getr_gata_ra']").val();
		var getr_zu_mi = $("input[name='getr_zu_mi']").val();
		var getr_zu_ab = $("input[name='getr_zu_ab']").val()
		/*Summe*/
		var sum4 = parseFloat(getr_gata_ra * zeh + getr_zu_mi * zeh + getr_zu_ab * fue)
		/*Insert Summe in HTML*/
		$("#summe_getraenke").text(sum4.toFixed(2))
		/*-------------------- Ende Ausstattung im Raum / Getränke  -----------------*/


		/*------- Ausstattung im Raum / Sonstiges --------*/
		var nespr_gata = $("input[name='nespr_gata']").val();
		var mini_schoko = $("input[name='mini_schoko']").val();
		var obstkorb_ra = $("input[name='obstkorb_ra']").val();
		var mod_koffer = $("input[name='mod_koffer']").val();
		/*Summe*/
		var sum5 = parseFloat(nespr_gata * z + mini_schoko * z + obstkorb_ra * zf + mod_koffer * z)
		/*Insert Summe in HTML*/
		$("#summe_im_raum").text(sum5.toFixed(2))
		/*------------------ Ende Ausstattung im Raum / Sonstiges -------------------*/


		/*---------------- Abendessen ---------------------*/
		var dreigaenge_abend = $("input[name='dreigaenge_abend']").val();
		var viergaenge_abend = $("input[name='viergaenge_abend']").val();
		var fuenfgaenge_abend = $("input[name='fuenfgaenge_abend']").val();
		/*Summe*/
		var sum6 = parseFloat(dreigaenge_abend * vz + viergaenge_abend * zuf + fuenfgaenge_abend * ff)

		/*Insert Summe in HTML*/
		$("#summe_abendessen").text(sum6.toFixed(2))

		/*------------------------------- Ende Abendessen ------------------------------*/


		/*----------------- Raummiete ---------------------*/

		/* Summe Raummiete */
		var raummiete = $("input[name='raummiete']").val();
		var gruppenraummiete = $("input[name='gruppenraummiete']").val();

		var parsedraummiete = parseFloat(raummiete);
		var parsedgruppenraummiete = parseFloat(gruppenraummiete)

		var sum7 = (parsedraummiete + parsedgruppenraummiete)

		/*Insert Summe in HTML*/
		$("#summe_raummiete").text(sum7.toFixed(2))

		/* Pauschalberechnungen */
		var anzahl_teilnehmer_eins = $("input[name='anzahl_teilnehmer_eins']").val();
		var anzahl_teilnehmer_zwei = $("input[name='anzahl_teilnehmer_zwei']").val();

		/*Insert Anzahl in Bottom Section*/
		$("#summe_teilnehmer_eins").text(anzahl_teilnehmer_eins);
		$("#summe_teilnehmer_zwei").text(anzahl_teilnehmer_zwei);

		/*Summe Raummmiete pro Person*/
		var tagesmiete_raum = parseFloat(raummiete / anzahl_teilnehmer_eins);
		var tagesmiete_gruppenraum = parseFloat(gruppenraummiete / anzahl_teilnehmer_eins);

		var halbtagesmiete_raum = parseFloat((raummiete / 2) / anzahl_teilnehmer_zwei);
		var halbtagesmiete_gruppenraum = parseFloat((gruppenraummiete / 2) / anzahl_teilnehmer_zwei);

		var sum10 = parseFloat(105 + sum1 + sum2 + sum3 + sum4 + sum5 + sum6);
		var sum11 = parseFloat(sum1 + sum2 + sum4 + sum5);

		var gesamt_raummiete = parseFloat(tagesmiete_raum + tagesmiete_gruppenraum)
		var gesamt_raummiete_mit_tag_2 = parseFloat(tagesmiete_raum + tagesmiete_gruppenraum + halbtagesmiete_raum + halbtagesmiete_gruppenraum)

		var halbtagesmiete_raum_total = parseFloat(raummiete / 2);
		var halbtagesmiete_gruppenraum_total = parseFloat(gruppenraummiete / 2)
		var tagesmiete_raum_total = parseFloat(raummiete);
		var tagesmiete_gruppenraum_total = parseFloat(gruppenraummiete);

		var total_raummiete = parseFloat(tagesmiete_raum_total + tagesmiete_gruppenraum_total);
		var total_raummiete_mit_tag_2 = parseFloat(halbtagesmiete_raum_total + halbtagesmiete_gruppenraum_total + tagesmiete_raum_total + tagesmiete_gruppenraum_total);

		var total_no_second_day = parseFloat((sum10 * anzahl_teilnehmer_eins))
		var total = parseFloat((sum10 * anzahl_teilnehmer_eins) + (sum11 * anzahl_teilnehmer_zwei))


		/*Insert Summen in HTML*/
		$("#summe_pauschale_eins").text(sum10.toFixed(2));
		if (anzahl_teilnehmer_zwei == 0 || anzahl_teilnehmer_zwei === NaN) {
			$("#summe_pauschale_zwei").text("0");
			$("#summe_pauschale_gesamt").text((sum10).toFixed(2));
			$("#summe_gesamt").text(total_no_second_day.toFixed(2));
			$("#summe_raummiete_gesamt").text(gesamt_raummiete.toFixed(2));
			$("#summe_raummiete_total").text(total_raummiete.toFixed(2))
		} else {
			$("#summe_pauschale_zwei").text(sum11.toFixed(2));
			$("#summe_pauschale_gesamt").text((sum10 + sum11).toFixed(2));
			$("#summe_gesamt").text(total.toFixed(2));
			$("#summe_raummiete_gesamt").text(gesamt_raummiete_mit_tag_2.toFixed(2));
			$("#summe_raummiete_total").text(total_raummiete_mit_tag_2.toFixed(2))
		}


		if (anzahl_teilnehmer_zwei == 0) {
			$("#halbtagesplan").addClass("hide_plan");
			$(".hp").addClass("hide_plan");
		} else {
			$("#halbtagesplan").removeClass("hide_plan");
			$(".hp").removeClass("hide_plan");
		}

		if (!$("#superiorplan").is(".button-on") && !$("#halbtagesplan").is(".button-on")) {
			$(".sm").removeClass("fade_table");
			$("#selfmade").removeClass("fade_table")
		}

	});


});