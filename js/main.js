$(function() {
	$('.resultat').hide();

	// verification et envoie des variable en ajax
	$('#rechercher').on("click", function() {
		// on recupere les valeurs du formulaire dans des variables
		objet = $('#rechercheObjet').val();
		destinataire = $('#rechercheDestinataire').val();
		service = $('#rechercheService').val();
		d1 = $('#rechercheDate').val();
		d2 = $('#rechercheDate2').val();
		sens = null;

		// on recupere la valeur des case à cocher pour remplir la variable
		if($('#entrant').is(':checked') == true) {
			sens = "Entrant";
		}
		else if($('#sortant').is(':checked') == true) {
			sens = "Sortant";
		}
		else if($('#lesdeux').is(':checked') == true) {
			sens = "";
		}
		else {
			return false;
		}
		
		// on verifie de la date est correctement renseignée
		if(d1 > d2) {
			alert('Erreur dans la saisie des dates');
			return false;
		}
		else {
			// on envoie les variables au fichier php qui contient la requete
			$.post('recherche.method.php', {
				objet:""+objet+"",
				destinataire:""+destinataire+"",
				service:""+service+"",
				date_debut:""+d1+"",
				date_fin:""+d2+"",
				sens:""+sens+""
			}, function(data) {
				$('.resultat').html(data).show();
			});
			//$('.resultat').load('recherche.method.php', { objet:objet, destinataire:destinataire, service:service, date_debut:d1, date_fin:d2, sens:sens});
		}
		
	});

	// fonction qui vide les champs et reinitialise le formulaire
	$('#reset').on("click", function() {
		$(':input', '.divRecherche')
		.not(':button, :submit, :reset, :hidden')
		.val('')
		.removeAttr('checked')
		.removeAttr('selected')
		.removeClass('ui-state-active');
		// efface les resultats de recherche
		$('.resultat').hide();
	});
});
