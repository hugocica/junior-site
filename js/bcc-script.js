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

	$('#fullname').blur(function() {
		validate($(this).val(), '#fullname');	
	});

	$('#email').blur(function() {
		validate($(this).val(), '#email');
	});

	$('#mensagem').blur(function() {
		validate($(this).val(), '#mensagem');
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

			},
			success: function(data) {
				console.log(data);
			},
			complete: function() {

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
			},
			success: function(data) {
				if (data.type == 'invalid') {
					$(id_value).after('<div class="form-error">Campo inválido</div>');
					$(id_value).css('outline', '1px solid #cc0000');
					$('#send-form').attr('disabled', 'disabled');
				} else if (data.type == 'blank') {
					$(id_value).after('<div class="form-error">Campo em branco</div>');
					$(id_value).css('outline', '1px solid #cc0000');
					$('#send-form').attr('disabled', 'disabled');
				}
			},
			complete: function() {
				$(id_value).css('background', '#ccc');
				if ($('.form-error').length == 0)
					$('#send-form').removeAttr('disabled');
			}
		});		
}