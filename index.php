<?php 
	include_once 'header.php'; 
?>
	<script>
		processoSeletivo = false;
	</script>
	
	<section id="inicio">
		<div class="description-txt">
			<br /><br />
			<div align='center'><a href='processo-seletivo.php'><img src='img/processo_seletivo_alpha.png' width='900' height='180' border='0' onmouseover="this.src='img/processo_seletivo.png';" onmouseout="this.src='img/processo_seletivo_alpha.png';"/></a></div>
		</div>
		<div class="slider"></div>
	</section>

	<section id="empresa">
		<h2>A Empresa</h2>
		<div class="description-txt">
			<p>Well, the way they make shows is, they make one show. That show's called a pilot. Then they show that show to the people who make shows, and on the strength of that one show they decide if they're going to make more shows. Some pilots get picked and become television programs. Some don't, become nothing. She starred in one of the ones that became nothing.</p>
			<p>The path of the righteous man is beset on all sides by the iniquities of the selfish and the tyranny of evil men. Blessed is he who, in the name of charity and good will, shepherds the weak through the valley of darkness, for he is truly his brother's keeper and the finder of lost children. And I will strike down upon thee with great vengeance and furious anger those who would attempt to poison and destroy My brothers. And you will know My name is the Lord when I lay My vengeance upon thee.</p>
			<p>Now that there is the Tec-9, a crappy spray gun from South Miami. This gun is advertised as the most popular gun in American crime. Do you believe that shit? It actually says that in the little book that comes with it: the most popular gun in American crime. Like they're actually proud of that shit.  </p>
			<p>The path of the righteous man is beset on all sides by the iniquities of the selfish and the tyranny of evil men. Blessed is he who, in the name of charity and good will, shepherds the weak through the valley of darkness, for he is truly his brother's keeper and the finder of lost children. And I will strike down upon thee with great vengeance and furious anger those who would attempt to poison and destroy My brothers. And you will know My name is the Lord when I lay My vengeance upon thee. </p>
			<p>Look, just because I don't be givin' no man a foot massage don't make it right for Marsellus to throw Antwone into a glass motherfuckin' house, fuckin' up the way the nigger talks. Motherfucker do that shit to me, he better paralyze my ass, 'cause I'll kill the motherfucker, know what I'm sayin'? </p>
			<p>Your bones don't break, mine do. That's clear. Your cells react to bacteria and viruses differently than mine. You don't get sick, I do. That's also clear. But for some reason, you and I react the exact same way to water. We swallow it too fast, we choke. We get some in our lungs, we drown. However unreal it may seem, we are connected, you and I. We're on the same curve, just on opposite ends. </p>
			<p>The path of the righteous man is beset on all sides by the iniquities of the selfish and the tyranny of evil men. Blessed is he who, in the name of charity and good will, shepherds the weak through the valley of darkness, for he is truly his brother's keeper and the finder of lost children. And I will strike down upon thee with great vengeance and furious anger those who would attempt to poison and destroy My brothers. And you will know My name is the Lord when I lay My vengeance upon thee. </p>
		</div>
	</section>

	<section id="servicos">
		<h2>Serviços</h2>
		<div class="description-txt">
			<p>A Jr.COM está preparada para fornecer diversos tipos de tecnologias e encontrar a solução perfeita para o seu problema. Dispomos de diferentes serviços nas mais variadas áreas da computação, os quais estão enumerados a seguir:</p>
			<ul>
				<br>
				<li>
					<p><b>Websites: </b>Desenvolvimento de sites ou hotsites de acordo com as características desejadas. Estáticos ou dinâmicos, fornecemos o uso de ferramentas como HTML5, CSS, JavaScript, entre outras, a fim de representar melhor a ideia do cliente.</p>
				</li>
				<br>
				<li><b>Sistemas Web e Aplicações: </b>Aplicações comerciais, desde sistemas simples de cadastro à projecções de bancos de dados, a Jr.COM está capacitada para trabalhar com as mais diversas linguagens e teorias disponíveis na computação. Nosso desenvolvimento segue fielmente o verdadeiro ideal do projeto idealizado pelo cliente, linguagens como PHP, C, C#, Java, entre outras, são partes de nossas metodologias. Utilizamos um conjunto de ferramentas a fim de estruturar e modelar uma forma mais eficiente e menos complexa para o problema.</li>
			</ul>
		</div>
	</section>

	<section id="portifolio">
		<h2>Portifólio</h2>
		<div class="description-txt">
			<br>
			<a href='http://bibliotecafalada.com'><img src='img/bibli_port_alpha.png' width='200' height='200' border='0' onmouseover="this.src='img/bibli_port.png';" onmouseout="this.src='img/bibli_port_alpha.png';"/></a>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Biblioteca Falada</p>
		</div>
	</section>

	<section id="parceiros">
		<h2>Parceiros</h2>
		<div class="info-partners">
			<div class="info-container">
				<p style="position: relative;top: 20px;">Passe o mouse em cima do logo para descobrir mais sobre nossos parceiros.</p>
			</div>
		</div>
		<div class="listing-partners">
			<div id="dockContainer">
				<div id="dockWrapper">
					<ul class="osx-dock">
						<li data-partner="dijr" class="active">
							<a href="#"><img src="img/parceiros/dijr-logo-small.png" alt="designjuniot" /></a>
						</li>
						<li data-partner="loco">
							<a href="#"><img src="img/parceiros/locomotiva-logo-small.png" alt="locomotiva" /></a>
						</li>
						<li data-partner="interage">
							<a href="#"><img src="img/parceiros/interage-logo-small.png" alt="interage" /></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section id="contato">
		<h2>Contato</h2>
        <form name="contato" id="contato_form" class="inner_formulario" action="" method="post">
            <label class="lbl_formulario" for="fullname">Nome Completo*</label> 
            <input type="text" name="fullname" id="fullname" /> <br>
            <label class="lbl_formulario" for="email">E-mail*</label> 
            <input type="email" name="email" id="email" /> <br>
            <label class="lbl_formulario" for="telefone">Telefone</label> 
            <input type="text" name="tel" id="tel" maxlength="15" /> <br>
            <label class="lbl_formulario" for="empresa">Empresa/Instituição</label> 
            <input type="text" name="empresa" id="empresa" /> <br>
            <label class="lbl_formulario" for="mensagem" style="vertical-align:top">Mensagem*</label> 
            <textarea name="mensagem" id="mensagem" style="height: 100px;"></textarea> <br>
             
            <input type="submit" name="send" id="send-form" value="Enviar" class="botao" />
        </form>   
        <div id="message-placeholder"></div>
	</section>	

<?php include_once 'footer.php'; ?>