$(document).ready(function() {
	$('li.menu-itens > a').click(function(){
		$('html, body').animate({
		    scrollTop: $( $.attr(this, 'href') ).offset().top - 110
		}, 500);
		return false;
	});

	$('.logo-img > a').click(function() {
		$('html, body').animate({
		    scrollTop: 0
		}, 500);
		return false;
	});	

	$('#email').blur(function() {
		$.ajax({
			url: 'function.php',
			type: 'POST',
			dataType: 'json',
			data: {
				action: 'validateEmail',
				email: $(this).val()
			},
			beforeSend: function() {
				$('#email').css('background', 'url("img/ajax-loader.gif") #ccc no-repeat 98% 50%');
				$('#email').css('outline', 'none');
				$('.form-error').remove();
			},
			success: function(data) {
				if (data.type == 'invalid') {
					$('#email').after('<div class="form-error">E-mail inválido</div>');
					$('#email').css('outline', '1px solid #cc0000');
				} else if (data.type == 'blank') {
					$('#email').after('<div class="form-error">E-mail em branco</div>');
					$('#email').css('outline', '1px solid #cc0000');
				}
			},
			complete: function() {
				$('#email').css('background', '#ccc');
			}
		});		
	});

	$('#tel').mask('(99) 9999-9999?9', {placeholder: ' '});
	$('#tel').blur(function() {
		if ($('#tel').val().length > 14) {
			$('#tel').mask('(99) 99999-999?9', {placeholder: ' '});
		}
	});
}); 

$(document).scroll(function() {
	if ($(document).scrollTop() > 90) {
		$('.jr-navbar').addClass('navbar-large');
		$('.logo-img').addClass('logo-large');
	} else {
		$('.jr-navbar').removeClass('navbar-large');
		$('.logo-img').removeClass('logo-large');
	}
});