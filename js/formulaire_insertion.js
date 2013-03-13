$(function() {
	var accuse;
	var observation;
	var type;
	var objet;
	var date;
	var service;
	var destinataire;
	var sens;


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
	
	// fonction qui affiche ou non le menu de choix d'AR selon le type
	$('select#type').change(function () {
		type = $(this).val();
		if (type == 2) { // on choisit ici les types qui pourront avoir un AR
			$('#divAR').empty();
		}
		else {
			$('div#divAR').html("<select name=\"AR\" id=\"AR\"><option value=\"!AR\">Sans AR</option><option value=\"AR\">Avec AR</option></select>");
			
		}
	});

	// fonction qui ajoute un destinataire sortant quand on clique sur le +
	var i = 2;
	$('#imgAjouter').on('click', function() {
		ligne = "<tr><td>Destinataire "+i+" :</td><td><input type=\"text\" id=\"destinataireSortant"+i+"\"></td></tr>";
		$('#sortant3').before(ligne);
		i++;
	});

	//========= validation du formulaire ============//
	$('#valider').on('click', function() {
		date = $('#insertDate').val();
		objet = $('#objet').val();
		observation = $('#observation').val();
		type = $('#type').val();

		// selon le type de courrier on peut ou non dire s'il possède un AR
		if($('#divAR').text() == "" || $('#AR').val() == "!AR") {
			accuse = 0;
		}
		else {
			accuse = null;
		}

		// si le radio courrier entrant est coché
		if($('#radioEntrant').is(':checked')) {
			// on definit la variable sens a "entrant"
			// on prend le destinataire et le service correspondant
			sens = "Entrant";
			destinataire = $('#destinataireEntrant').val();
			service = $('#serviceEntrant').val();
		}
		else if($('#radioSortant').is(':checked')) {
			// on definit la variable sens a "sortant"
			// on prend le destinataire et le service correspondant
			sens = "Sortant";
			service = $('#serviceSortant').val();

			// si le champs destinataire classique est coché
			if ($('#radioDestinataire1').is(':checked')) {
				destinataire = $('#destinataireSortant').val();
			}
			// sinon si le champs insertion d'une liste de destinataire est coché
			else if ($('#radioDestinataire2').is(':checked')) {
				destinataire = [];
			}
			else {
				destinataire = $('#destinataireSortant').val();
			}

		}

		// envoi des données à la bdd
		$.post('ajouter_utilisateur.php', {
			objet:""+objet+"",
			destinataire:""+destinataire+"",
			service:""+service+"",
			date:""+date+"",
			observation:""+observation+"",
			accuse:""+accuse+"",
			sens:""+sens+"",
			type:""+type+""
		}, function(data) {
			alert(data);
		});
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
