$(function(e) {
	$('textarea').each(function() {
		var clasEditor = $(this).attr('data-target');console.log(clasEditor);
		$('.'+ clasEditor).richText();
	});

	function initializeEditor() {
		$('textarea').each(function() {
			var clasEditor = $(this).attr('data-target');console.log(clasEditor);
			$('.'+ clasEditor).richText();
		});
	}
});