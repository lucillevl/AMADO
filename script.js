$(document).ready(function(){
    $('.collapsible').collapsible();
});


$(".button-collapse").sideNav();


$(document).ready(function() {
    $('select').material_select();
});



$('#contenu_article').trigger('autoresize');



$('.carousel.carousel-slider').carousel({fullWidth: true});


$('#ancre').click(function(){
	var the_id = $(this).attr("href");
	if (the_id === '#') {
		return;
	}
	$('html, body').animate({
		scrollTop:$(the_id).offset().top
	}, 'slow');
	return false;
});

tarteaucitron.init({
            "hashtag": "#tarteaucitron", /* Ouverture automatique du panel avec le hashtag */
            "highPrivacy": false, /* désactiver le consentement implicite (en naviguant) ? */
            "orientation": "top", /* le bandeau doit être en haut (top) ou en bas (bottom) ? */
            "adblocker": false, /* Afficher un message si un adblocker est détecté */
            "showAlertSmall": true, /* afficher le petit bandeau en bas à droite ? */
            "cookieslist": true, /* Afficher la liste des cookies installés ? */
            "removeCredit": false /* supprimer le lien vers la source ? */
        });