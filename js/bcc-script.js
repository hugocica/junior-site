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

	var check_name = false;
	$('#fullname').blur(function() {
		if ($(this).val().length == 0 || check_name) {
			check_name = true;
			validate($(this).val(), '#fullname');	
		}
	});

	$('#email').blur(function() {
		validate($(this).val(), '#email');
	});

	var check_msg = false
	$('#mensagem').blur(function() {
		if ($(this).val().length == 0 || check_msg) {
			check_msg = true;
			validate($(this).val(), '#mensagem');
		}
	});

	$('#tel').mask('(99) 9999-9999?9', {placeholder: ' '});
	$('#tel').blur(function() {
		if ($('#tel').val().length > 14) {
			$('#tel').mask('(99) 99999-999?9', {placeholder: ' '});
		}
	});

	$('#send-form').click(function(e) {
		e.preventDefault();
		$.ajax({
			url: 'function.php',
			type: 'POST',
			dataType: 'json',
			data: {
				action: 'sendEmail',
				nome: $('#fullname').val(),
				email: $('#email').val(),
				telefone: $('#tel').val(),
				empresa: $('#empresa').val(),
				mensagem: $('#mensagem').val()
			},
			beforeSend: function() {
				$('#send-form').val('');
				$('#send-form').css('background', 'url("img/ajax-loader.gif") transparent no-repeat 55% 50%');
				$('#send-form').css('box-shadow', 'none');
				$('#send-form').css('outline', 'none');
				$('#send-form + .form-error').remove();
				$('#send-form').attr('disabled', 'disabled');
			},
			success: function(data) {
				if (data.type == 'success') {
					console.log('send successfully');
				} else if(data.type == 'error') {
					$('#send-form').after('<div class="form-error">Houve um erro no envio deste formulário. Por favor, tente novamente mais tarde.</div>');
				} else if(data.type == 'blank') {
					validate($('#fullname').val(), '#fullname');
					validate($('#email').val(), '#email');
					validate($('#mensagem').val(), '#mensagem');
				}
			},
			error: function(request, status, error) {
				$('#send-form').after('<div class="form-error">Houve um erro no envio deste formulário. Por favor, tente novamente mais tarde.</div>');
			},
			complete: function() {
				$('#contato_form').remove();
				$('#message-placeholder').hide().append('<div id="thanks"><img src="img/laptop.png"><div id="thank-txt"><p>Obrigado por entrar em contato conosco!</p><p>A Jr.COM agradece.</p></div></div>').slideDown('slow');
			}
		});
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

function validate(field_value, id_value) {
	$.ajax({
		url: 'function.php',
		type: 'POST',
		dataType: 'json',
		data: {
			action: 'validateForm',
			field: field_value,
			fieldType: id_value
		},
		beforeSend: function() {
			$(id_value).css('background', 'url("img/ajax-loader.gif") #ccc no-repeat 98% 50%');
			$(id_value).css('outline', 'none');
			$(id_value + '+ .form-error').remove();
			$('#send-form').attr('disabled', 'disabled');
			$('#send-form').css('background-color', '#d2d2d2');
			$('#send-form').css('cursor', 'not-allowed');
		},
		success: function(data) {
			if (data.type == 'invalid') {
				$(id_value).after('<div class="form-error">Campo inválido</div>');
				$(id_value).css('outline', '1px solid #cc0000');
			} else if (data.type == 'blank') {
				$(id_value).after('<div class="form-error">Campo em branco</div>');
				$(id_value).css('outline', '1px solid #cc0000');
			}
		},
		complete: function() {
			$(id_value).css('background', '#ccc');
			if ($('.form-error').length == 0) {
				$('#send-form').removeAttr('disabled');
				$('#send-form').css('background-color', '');
				$('#send-form').css('cursor', '');
			}
		}
	});
}