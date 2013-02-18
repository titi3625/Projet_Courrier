jQuery(function($){

	// jqueryUI pour le plugin datepicker
	$('#rechercheDate, #rechercheDate2').datepicker({
		dateFormat: "yy-mm-dd",
		dayNamesMin: [ "Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa" ],
		monthNames: [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre" ]
	
	});
});