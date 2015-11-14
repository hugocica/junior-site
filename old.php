<?php 
	include_once 'header.php'; 
?>
	<script>
		processoSeletivo = false;
	</script>
	
	<section id="inicio">
		<div class="description-txt">
			<br /><br />
			<div id="processo-seletivo" align='center'><a href='processo-seletivo.php'><img src='img/processo_seletivo_alpha.png' style="width:100%;max-width:900px;"/></a></div>
		</div>
		<div class="slider"></div>
	</section>

	<section id="empresa">
		<h2>A Empresa</h2>
		<div class="description-txt">
			<p>A Jr.COM (Empresa Junior de Computação) é uma associação civil sem fins lucrativos, formada por alunos do curso de computação da UNESP (Universidade Estadual Paulista) - Campus de Bauru. Asseguramos e criamos novas competências aos alunos graduandos e aos mais variados propósitos da tecnologia, oferecendo cursos, oficinas e serviços que promovem o conhecimento e a interdisciplinaridade entre os mesmos.</p>
			<p>Podemos destacar algumas de nossas principais finalidades abaixo:
			<ul><br>
				<li>Levar a realização da seguinte missão: criar, modificar e promover competências (habilidades + conhecimentos + atitudes) aos seus membros;</li><br>
				<li>Proporcionar aos seus membros as condições necessárias à aplicação prática de seus conhecimentos teóricos relativos à sua área de formação profissional;</li><br>
				<li>Dar à sociedade um retorno dos investimentos que ela realiza na Universidade, através de serviços de alta qualidade, realizados por futuros profissionais da área de Computação da Universidade Estadual Paulista “Júlio de Mesquita Filho”, campus de Bauru;</li><br>
				<li>Incentivar a capacidade empreendedora do aluno, dando a ele uma visão profissional já no âmbito acadêmico;</li><br>
				<li>Realizar estudos e elaborar diagnósticos e relatórios sobre assuntos específicos inseridos em sua área de atuação;</li><br>
				<li>Assessorar a implantação de soluções indicadas para problemas diagnosticados;</li><br>
				<li>Valorizar alunos e professores da Universidade Estadual Paulista “Júlio de Mesquita Filho” no mercado de trabalho e no âmbito acadêmico, bem como a referida instituição.</li>
			</ul>
		</div>
	</section>

	<section id="servicos">
		<h2>Serviços</h2>
		<!-- Responsive slider - START -->
	  	<div id="sequence">
			<p class="sequence-prev"><i class="fa fa-chevron-left"></i></p>
			<p class="sequence-next"><i class="fa fa-chevron-right"></i></p>

			<ul class="sequence-canvas">
				<li class="animate-in">
					<div class="info">
						<h2>Desenvolvimento de Websites</h2>
						<p>Sites e hotsites responsivos, utilizando ferramentas como HTML5, CSS3 e Javascript no desenvolvimento, bem como práticas SEO para melhor ranking do seu site em sites de busca, como o Google.</p>
					</div>
					<!-- <img class="sky" src="images/bg-clouds.png" alt="Blue Sky" /> -->
					<img class="website" src="img/slider/web.png" alt="websites" />
				</li>
				<li>
					<div class="info">
						<h2>Aplicativos Mobile</h2>
						<p>Leve seu negócio para qualquer lugar!<br>Aplicativos para <em>smartphones</em> tanto para uso interno, como para seus clientes.</p>
					</div>
					<!-- <img class="sky" src="images/bg-clouds.png" alt="Blue Sky" /> -->
					<img class="mobileapp" src="img/slider/mobileapp.png" alt="mobileapp" />
				</li>
				<li>
					<div class="info">
						<h2>Sistemas</h2>
						<p>Aplicações perfeitas para o seu negócio desenvolvidas com as mais diversas linguagens e teorias disponíveis na computação, podendo ser Web, acessada de qualquer lugar, ou apenas dentro de sua empresa.</p>
					</div>
					<!-- <img class="sky" src="images/bg-clouds.png" alt="Blue Sky" /> -->
					<img class="programming" src="img/slider/linguagens.png" alt="linguagens" />
				</li>
			</ul>
		</div>
	    <!-- Responsive slider - END -->
	</section>

	<section id="projetos">
		<h2>Projetos</h2>
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
				<p style="position: relative;top: 20px;float:none;width:100%;">Passe o mouse em cima do logo para descobrir mais sobre nossos parceiros.</p>
			</div>
		</div>
		<div class="listing-partners">
			<div id="dockContainer">
				<div id="dockWrapper">
					<ul class="osx-dock">
						<li data-partner="dijr" class="active">
							<a><img src="img/parceiros/dijr-logo-small.png" alt="designjuniot" /></a>
						</li>
						<li data-partner="loco">
							<a><img src="img/parceiros/locomotiva-logo-small.png" alt="locomotiva" /></a>
						</li>
						<li data-partner="interage">
							<a><img src="img/parceiros/interage-logo-small.png" alt="interage" /></a>
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