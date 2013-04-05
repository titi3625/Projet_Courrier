$(function() {
	
	// fonction qui recupere les variables du formulaire et qui les transmet a include/historique/gestion_modif_method.php
	$('input#submit_modif').on('click', function() {
		date = $('#date_modif').val();
		auteur = $('#auteur_modif').val();
		$.post('include/historique/gestion_modif_method.php', {
			date_modif: ""+date+"",
			auteur_modif: ""+auteur+""
		}, function(data) {
			$('.resultat_modif').html(data).show();
		});
	});

	// fonction qui vide les champs et reinitialise le formulaire
	$('#reset').on("click", function() {
		// vide les champs
		$(':input', '.divRecherche').not(':button, :submit, :reset, :hidden').val('');

		// efface les resultats de recherche
		$('.resultat_modif').hide();
	});

	$('#printModif').on('click', function() {
		$('.footer').hide();
		$('.header').hide();
		window.print();
		$('.header').show();
		$('.footer').show();
	});
	
});