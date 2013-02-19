$(function() {
	
	// modification du formulaire selon le sens du courrier
	$('#sortant, #sortant2, #sortant3').hide();

	$('#radioEntrant').on("click", function() {
		$('#entrant, #entrant2').show();
		$('#sortant, #sortant2, #sortant3').hide();
	});
	$('#radioSortant').on("click", function() {
		$('#entrant, #entrant2').hide();
		$('#sortant, #sortant2, #sortant3').show();
	});
		
	// validation du formulaire 
	$('button#valider').on('click', function() {
		date = $('#insertDate').val();
		destinataire = $('#destinataire').val();
		objet = $('#objet').val();
		service = $('#service').val();
		observation = $('observation').val();
		type= $('type').val();

		if($('#radioEntrant').is(':checked')) {
			
		}
		if($('#radioSortant').is(':checked')) {

		}

		
		// envoi des données à la bdd
		$.post('ajouter_utilisateur.php', {
			
		}, function() {
			print("Insertion réussi");
		})
	});


	// fonction de reset du formulaire
	$('#reset').on("click", function() {
		$(':input', '.inserer')
		.not(':button, :submit, :reset, :hidden')
		.val('')
		.removeAttr('checked')
		.removeAttr('selected')
		.removeClass('ui-state-active');
		// efface les resultats de recherche
		$('.resultat').hide();
	});
});