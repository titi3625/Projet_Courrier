$(function() {
	$('.resultat').hide();

	// verification et envoie des variable en ajax
	$('#rechercher').on("click", function() {
		// on recupere les valeurs du formulaire dans des variables
		num = $('#rechercheNum').val();
		objet = $('#rechercheObjet').val();
		destinataire = $('#rechercheDestinataire').val();
		expediteur = $('#rechercheExpediteur').val();
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
				num:""+num+"",
				objet:""+objet+"",
				expediteur:""+expediteur+"",
				destinataire:""+destinataire+"",
				service:""+service+"",
				date_debut:""+d1+"",
				date_fin:""+d2+"",
				sens:""+sens+""
			}, function(data) {
				$('.resultat').html(data).show();
			});
		}
		
	});

	// fonction qui vide les champs et reinitialise le formulaire
	$('#reset').on("click", function() {
		// vide les champs
		$(':input', '.divRecherche').not(':button, :submit, :reset, :hidden').val('');

		// coche le premier bouton radio par defaut
		$('#lesdeux').attr('checked', true);

		// efface les resultats de recherche
		$('.resultat').hide();
	});
});
