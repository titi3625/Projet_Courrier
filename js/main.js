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
		if($('#check1').is(':checked') == true && $('#check2').is(':checked') == false) {
			sens = "Entrant";
		}
		else if($('#check1').is(':checked') == false && $('#check2').is(':checked') == true) {
			sens = "Sortant";
		}
		else if($('#check2').is(':checked') == true && $('#check1').is(':checked') == true) {
			sens = "";
		}
		else {
			alert('Vous devez choisir un type de courrier (entrant ou sortant)');
			return false;
		}
		
		// on verifie de la date est correctement renseignée
		if(d1 > d2) {
			alert('Erreur dans la saisie des dates');
			return false;
		}
		else {
			// on envoie les variables au fichier php qui contient la requete
			$.post('recherche.method.php', {objet:""+objet+"", destinataire:""+destinataire+"", service:""+service+"", date_debut:""+d1+"", date_fin:""+d2+"", sens:""+sens+""}, function(data) {
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
