$(document).ready(function() {
	$('li.menu-itens > a').click(function(){
		$('html, body').animate({
		    scrollTop: $( $.attr(this, 'href') ).offset().top - 110
		}, 500);
		return false;
	});

	$('.logo-img > a').click(function() {
		if (processoSeletivo)
			// window.location.href = "/junior-site";
			window.location.href = "http://compjr.com.br";
		else {
			$('html, body').animate({
			    scrollTop: 0
			}, 500);
			return false;
		}
	});	

	// parceiros dock
	$("ul.osx-dock li").each(function (type) {
     	$(this).hover(function () {
      		$(this).prev("li").addClass("nearby");
      		$(this).next("li").addClass("nearby");
      		if ($(this).data('partner') == 'dijr')
      			$('.info-container').hide().html('<img style="margin-right:15px;float:none;" src="img/parceiros/dijr-logo.png"><p style="margin: 45px 0;float:right;">Para conferir mais sobre acesse<br><a href="http://designjunior.com.br" target="_blank">designjunior.com.br</a></p>').fadeIn('fast');
      		else if ($(this).data('partner') == 'loco')
      			$('.info-container').hide().html('<img style="margin-right:15px;float:none;" src="img/parceiros/locomotiva-logo.png"><p style="margin: 45px 0;float:right;">Para conferir mais sobre acesse<br><a href="#">Locomotiva Site</a></p>').fadeIn('fast');
      		else if ($(this).data('partner') == 'interage')
      			$('.info-container').hide().html('<img style="margin-right:15px;float:none;" src="img/parceiros/interage-logo.png"><p style="margin: 45px 0;float:right;">Para conferir mais sobre acesse<br><a href="#">Interage Site</a></p>').fadeIn('fast');
     	},
     	function () {
      		$(this).prev("li").removeClass("nearby");
      		$(this).next("li").removeClass("nearby");
     	});
    });

	// valida entradas do formulario
	var check_name = false;
	$('#fullname, #nome-candidato').blur(function() {
		if ($(this).val().length == 0 || check_name) {
			check_name = true;
			validate($(this).val(), '#'+$(this).attr('id'));
		}
	});

	$('#email, #email-candidato').blur(function() {
		validate($(this).val(), '#'+$(this).attr('id'));
	});

	var check_msg = false
	$('#mensagem').blur(function() {
		if ($(this).val().length == 0 || check_msg) {
			check_msg = true;
			validate($(this).val(), '#mensagem');
		}
	});

	$('#tel, #telefone-candidato').mask('(99) 9999-9999?9', {placeholder: ' '});
	$('#tel, #telefone-candidato').blur(function() {
		if ($('#'+$(this).attr('id')).val().length > 14) {
			$('#'+$(this).attr('id')).mask('(99) 99999-999?9', {placeholder: ' '});
		}
	});

	// envia dados do formulário de contato para o email da Jr
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

	// envia dados do formulário do Processo Seletivo para o email da Jr, além de enviar para o bd
	$('#processo-form').click(function(e) {
		e.preventDefault();
		$.ajax({
			url: 'function.php',
			type: 'POST',
			dataType: 'json',
			data: {
				action: 'processoSeletivo',
				nome: $('#nome-candidato').val(),
				email: $('#email-candidato').val(),
				telefone: $('#telefone-candidato').val(),
				curso: $('#curso-candidato').val(),
				ano: $('#ano-candidato').val(),
				sexo: $('#sexo-candidato').val(),
				resumo: $('#resumo-candidato').val()
			},
			beforeSend: function() {
				$('#processo-form').val('');
				$('#processo-form').css('background', 'url("img/ajax-loader.gif") transparent no-repeat 55% 50%');
				$('#processo-form').css('box-shadow', 'none');
				$('#processo-form').css('outline', 'none');
				$('#processo-form + .form-error').remove();
				$('#processo-form').attr('disabled', 'disabled');
			},
			success: function(data) {
				if (data.type == 'success') {
					console.log('send successfully');
				} else if(data.type == 'error') {
					$('#processo-form').after('<div class="form-error">Houve um erro no envio deste formulário. Por favor, tente novamente mais tarde.</div>');
				} else if(data.type == 'blank') {
					validate($('#nome-candidato').val(), '#nome-candidato');
					validate($('#email-candidato').val(), '#email-candidato');
				}
				console.log('success');
			},
			error: function(request, status, error) {
				$('#processo-form').after('<div class="form-error">Houve um erro no envio deste formulário. Por favor, tente novamente mais tarde.</div>');
			},
			complete: function() {
				console.log('complete');
				$('#processo_form').remove();
				$('#message-placeholder').hide().append('<div id="thanks"><img src="img/laptop.png"><div id="thank-txt"><p>Obrigado por participar do nosso<br>Processo Seletivo 2015!</p><p>A Jr.COM agradece.</p></div></div>').slideDown('slow');
			}
		});
	});
}); 

// função que muda o menu, de acordo com a posição y da página
$(document).scroll(function() {
	if ($(document).scrollTop() > 90) {
		$('.jr-navbar').addClass('navbar-large');
		$('.logo-img').addClass('logo-large');
	} else {
		$('.jr-navbar').removeClass('navbar-large');
		$('.logo-img').removeClass('logo-large');
	}
});

// função que faz validação
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
			$('#send-form, #processo-form').attr('disabled', 'disabled');
			$('#send-form, #processo-form').css('background-color', '#d2d2d2');
			$('#send-form, #processo-form').css('cursor', 'not-allowed');
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
				$('#send-form, #processo-form').removeAttr('disabled');
				$('#send-form, #processo-form').css('background-color', '');
				$('#send-form, #processo-form').css('cursor', '');
			}
		}
	});
}