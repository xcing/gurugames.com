jQuery(document).ready(function(){
													 
// ---------------------------------------------------------
// Tabs
// ---------------------------------------------------------
jQuery(".tabs").each(function(){

		jQuery(this).find(".tab").hide();
		jQuery(this).find(".tab-menu li:first a").addClass("active").show();
		jQuery(this).find(".tab:first").show();

});

jQuery(".tabs").each(function(){

		jQuery(this).find(".tab-menu a").click(function() {

				jQuery(this).parent().parent().find("a").removeClass("active");
				jQuery(this).addClass("active");
				jQuery(this).parent().parent().parent().parent().find(".tab").hide();
				var activeTab = jQuery(this).attr("href");
				jQuery(activeTab).fadeIn();
				return false;

		});

});


// ---------------------------------------------------------
// Toggle
// ---------------------------------------------------------

jQuery(".toggle").each(function(){

		jQuery(this).find(".box").hide();

});

jQuery(".toggle").each(function(){

		jQuery(this).find(".trigger").click(function() {

				jQuery(this).toggleClass("active").next().stop(true, true).slideToggle("normal");

				return false;

		});

});

jQuery(".toggle.active").each(function(){
                
                jQuery(this).find(".box").show();
                
                jQuery(this).find(".trigger").addClass("active"); 
                
});



jQuery(".recent-posts.team li:nth-child(4n), .recent-posts.releases li:nth-child(2n), .related-posts li:nth-child(4n)").addClass("nomargin");


$('h3, .header-title h1').each(function(index) {
    //get the first word
    var firstWord = $(this).text().split(' ')[0];

    //wrap it with span
    var replaceWord = "<span class='first-word'>" + firstWord + "</span>";

    //create new string with span included
    var newString = $(this).html().replace(firstWord, replaceWord);

    //apply to the divs
    $(this).html(newString);
   });



// prettyphoto init
jQuery("a[rel^='prettyPhoto']").prettyPhoto({
	animation_speed:'normal',
	slideshow:5000,
	autoplay_slideshow: false,
	overlay_gallery: true
});



// ---------------------------------------------------------
// Back to Top
// ---------------------------------------------------------

// fade in #back-top
jQuery(function () {
	jQuery(window).scroll(function () {
		if (jQuery(this).scrollTop() > 100) {
			jQuery('#back-top').fadeIn();
		} else {
			jQuery('#back-top').fadeOut();
		}
	});

	// scroll body to 0px on click
	jQuery('#back-top a').click(function () {
		jQuery('body,html').stop(false, false).animate({
			scrollTop: 0
		}, 800);
		return false;
	});
});


});