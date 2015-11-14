<?php include_once 'header.php'; ?>

	<script>
		processoSeletivo = true;
	</script>

	<section id="processo-seletivo">
		<h2>Jr.COM - Processo Seletivo 2015</h2>
		<form name="processo" id="processo_form" class="inner_formulario" action="" method="post">
			<label for="nome-candidato">Nome</label>
			<input type="text" name="nome-candidato" id="nome-candidato" ><br>
			<label for="email-candidato">E-mail</label>
			<input type="email" name="email-candidato" id="email-candidato" ><br>
			<label for="telefone-candidato">Telefone</label>
			<input type="text" name="telefone-candidato" id="telefone-candidato" ><br>
			<label for="curso-candidato">Curso</label>
			<select name="curso-candidato" id="curso-candidato">
				<option value="BCC">Bacharelado em Ciência da Computação</option>
				<option value="BSI">Bacharelado em Sistema de Informação</option>
			</select>
			<br>
			<label for="ano-candidato">Ano o qual está cursando</label>
			<select name="ano-candidato" id="ano-candidato">
				<option value="Primeiro Ano">1º ano</option>
				<option value="Segundo Ano">2º ano</option>
				<option value="Terceiro Ano">3º ano</option>
				<option value="Quarto Ano">4º ano</option>
				<option value="other">Outro (É compreensível...)</option>
			</select>
			<br>
			<label for="resumo-candidato" style="vertical-align:top">Resumo de Atividades e Realizações</label>
			<textarea name="resumo-candidato" id="resumo-candidato" style="height: 100px;"></textarea><br>

			<input type="submit" name="send" id="processo-form" value="Enviar" class="botao" />
		</form>
		<div id="message-placeholder"></div>
	</section>

<?php include_once 'footer.php'; ?>