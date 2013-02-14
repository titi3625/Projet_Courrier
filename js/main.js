jQuery(function($) {

	// vérifier que les dates sont correctements saisie
	$('.formRecherche').on("submit", function(event){

		d1 = new Date($('#rechercheDate').val());
		d2 = new Date($('#rechercheDate2').val());

		if(d1 > d2) {
			alert('Erreur dans la saisie des dates');
		}
	});

	// jqueryUI pour le bouton submit
	$("input[type=submit]").button().click(function(event) {
		event.preventDefault();
	});

	//jqueryUI pour les checkbox
	$('#checkboxCourrier').buttonset();

	// jqueryUI pour le plugin datepicker
	$('#rechercheDate, #rechercheDate2').datepicker({
		dateFormat: "yy-mm-dd",
		dayNamesMin: [ "Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa" ],
		monthNames: [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre" ]
	
	});
});
