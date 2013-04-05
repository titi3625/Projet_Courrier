$(function() {

	// met le num d'envoi en required si le type de courrier en requiert un
	$('#choixNature').change(function() {
		value = $('input[name="nature"]:checked').attr('plop');
		if(value == '0') {
			$('#numNature').removeAttr("required");
		}
		else {
			$('#numNature').attr("required", "");
		}
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
