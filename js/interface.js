$(function() {
	// appel des fonction necessaire au jqueryUI
	
	// jqueryUI pour le bouton et le submit
	$('input[type=button]').button();
	$('input[type=submit]').button();
	$('input[type=reset]').button();

	//jqueryUI pour les radios
	$('#radio').buttonset();

	// jqueryUI pour le plugin datepicker
	$('#rechercheDate, #rechercheDate2, #insertDate').datepicker({
		dateFormat: "yy-mm-dd",
		dayNamesMin: [ "Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa" ],
		monthNames: [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre" ]
	
	});
});
