var winWidth = $(window).width();

$(document).ready(function(){

	// Get url params
	var params = {};window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(str,key,value){params[key] = value;}),
		currPage = location.href.split("/").slice(-1)[0],
		page = currPage.substring(0, currPage.indexOf('.'));

	// Droptab init
	$('#primary-nav ul').droptab({
		breakWidth : 768,
		targetWidth : $('header'),
		openMsg : 'Menu'
	});

	if (params.scrollto) {
		scrollTo(params.scrollto);
	}

	if ($('.datepicker').length) {
		$('.datepicker').pickadate({
			format: 'dddd, mmm dd, yyyy',
			formatSubmit: 'yyyy-mm-dd',
			hiddenName: true
		});
	}

	if ($('#label').length) {
		$('#label').spectrum({
			clickoutFiresChange: true,
			showInitial: true,
			showButtons: false,
			showPalette: true,
		    showSelectionPalette: true,
		    palette: [ ],
		    localStorageKey: "spectrum.beerlabels",
		    preferredFormat: "hex",
		    showInput: true
		});
	}

	if (page == 'edit-beer') {
		var $brand = $('#brand');

		$brand.on('change', function (e) {
			if ($brand.val() == 0) {
				$('.field-surf').removeClass('hidden');
				$('.field-sci').addClass('hidden');
			} else if ($brand.val() == 1) {
				$('.field-sci').removeClass('hidden');
				$('.field-surf').addClass('hidden');
			}
		}).trigger('change');
	}

	$('#delete-item').on('click', function (e) {
		e.preventDefault();
	});

	if ($('#delete-item').length) {
		$('#delete-item').confirm({
			text: "Are you sure you want to delete this record?",
		    title: "Confirmation required",
			confirm: function (button) {
				var id = button.data('id'),
					table = button.data('table'),
					goto = button.data('goto'),
					deleteData = {id: id, table: table, rm: true};

				$.ajax({
					type: 'POST',
					url: $('#update-form').attr('action'),
					data: deleteData,
					success: function(info){
						var formMsg = $('#form-msg');
						formMsg.html(info).show();
						if(formMsg.find('.alert-success').length){
							setTimeout(function(){
								formMsg.fadeOut('slow')
							},2000);
						}
						if(goto && formMsg.find('.alert-success').length){
							setTimeout(function(){
								window.location.href = goto;
							},2000);
						}
					}
				});
			},
			confirmButton: "Yes, Delete It",
		    cancelButton: "No",
		    confirmButtonClass: "btn-danger",
		    cancelButtonClass: "btn-primary"
		});
	}

	$('#update-form').submit(function (e) {
		e.preventDefault();

		$.ajax({
			type: 'POST',
			url: $('#update-form').attr('action'),
			data: $('#update-form').serialize(),
			success: function(info){
				var formMsg = $('#form-msg');
				formMsg.html(info).show();
				if(formMsg.find('.alert-success').length){
					setTimeout(function(){
						formMsg.fadeOut('slow')
					},2000);
				}
				if($('#goto').length && formMsg.find('.alert-success').length){
					setTimeout(function(){
						window.location.href = $('#goto').data('url');
					},2000);
				}
			}
		});

	});

}); // end doc ready

