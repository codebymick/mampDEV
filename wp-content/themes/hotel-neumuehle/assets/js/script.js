jQuery(document).ready(function ($) {

    // - display/hide tagung booking details
    $('#tagung .button').click(function () {
        $('#groupSize').toggleClass('hideGroup');
        console.log('is clicked')
    });

    // -topline search bar
    /*$('.search').hover(function () {
        $('#search-text').show();
    }, function () {
        $('#search-text').hide();
    });*/

    //$('#search-text').hide();


    // - burger menu
    $("#mobilemenu").mmenu();


    // SMOOTH SCROLL
    $("a[href='#top']").click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, "slow");
        return false;
    });


	// HEADER SCROLL
	$(window).scroll(function () {
		if ($(this).scrollTop() > 41) {
			$('header').addClass('scroll');
		} else {
			$('header').removeClass('scroll');
		}
	});

});