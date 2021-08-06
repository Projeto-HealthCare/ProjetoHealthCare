<?php 
    session_start();
    if(!isset($_SESSION['logado'])){
        echo "<script language='javascript' type='text/javascript'>
              alert('É necessário realizar Login!');
              window.location.href='../DadosSite/Login.html';
             </script>";
    }
    require('../../php/connection.php');

    $id = $_SESSION['logado'];
    $correctResp = 0;
    $wrongResp = 0;
    $correctInf = 0;
    $wrongInf = 0;
    $correctMental = 0;
    $wrongMental = 0;
    $sql = "SELECT MAX(data_questionario),qtd_certa,qtd_errada FROM responder WHERE id_usuario = '$id' AND id_questionario = 1";
    foreach($bd->query($sql) as $row){
        $correctResp = $row['qtd_certa'];
        $wrongResp = $row['qtd_errada'];
    }
    $sql = "SELECT MAX(data_questionario),qtd_certa,qtd_errada FROM responder WHERE id_usuario = '$id' AND id_questionario = 2";
    foreach($bd->query($sql) as $row){
        $correctInf = $row['qtd_certa'];
        $wrongInf = $row['qtd_errada'];
    }
    $sql = "SELECT MAX(data_questionario),qtd_certa,qtd_errada FROM responder WHERE id_usuario = '$id' AND id_questionario = 3";
    foreach($bd->query($sql) as $row){
        $correctMental = $row['qtd_certa'];
        $wrongMental = $row['qtd_errada'];
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
    <title>HealthCare</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/perfil.css">
    <link rel="stylesheet" href="../../css/rodape.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" id="applicationStylesheet" href="../../css/Cadastro.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com/%22%3E">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="../../js/perfil.js"></script>
    <script src="https://kit.fontawesome.com/3eecc79a6a.js" crossorigin="anonymous"></script>
    <script src="../../node_modules/jquery/dist/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    

    
</head>
<body>
	<nav>
		<div onclick="application.goToTargetView(event)" class="Doenas_Infecciosas_cg_Class">
			<span><a href="../Doencas/DoencasInfecciosas/Slider.html">Doenças Infecciosas</a></span>
		</div>
		<div onclick="application.goToTargetView(event)" class="Doenas_Respiratrias_ch_Class">
			<span><a href="../Doencas/DoencasRespiratorias/Slider3.html">Doenças Respiratórias</a></span>
		</div>
		<div onclick="application.goToTargetView(event)" class="Transtornos_Mentais_ci_Class">
			<span><a href="../Doencas/TranstornosMentais/Slider2.html">Transtornos Mentais</a></span>
		</div>
			<svg class="Retngulo_27">
				<rect class="Retngulo_27_Class" rx="5" ry="5" x="3" y="0" width="103" height="11"></rect>
			</svg>
		<div class="Perfil_Class">
			<span><a href="../DadosSite/Perfil.php">Perfil</a></span>
		</div>
		<img class="Imagem_1_Class" src="../../img/Imagem_1.png">
		<div onclick="application.goToTargetView(event)" class="Questionrio_Class">
			<span><a href="../DadosSite/EscolhaQuestionario.php">Questionário</a></span>
		</div>
		<div onclick="application.goToTargetView(event)" class="Home_cn_Class">
			<span><a href="../../index.html">Home</a></span>
		</div>
    </nav>

    <?php 
        
        
        $id_usuario = $_SESSION['logado'];

        $sql = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario'";
        foreach($bd->query($sql) as $row) {

    ?>

    <div class="container6">
        <div class="profile-header">
            <div class="containerImg">
                <div class="imgFundoPerfil">
                    <img src="../../img/fundoperfil.jpg" class="contain">
                </div>
            </div>
            <div class="profile-img">
                <img src="../../img/user.svg" class="imgPerfil">
            </div>
            <div class="profile-option">
                <div class="notification">
                    <i class="fa fa-bell"></i>
                    <span class="alert-message">1</span>
                </div>
            </div>
        </div>
        <div class="main-bd">
            <div class="left-side">
                <div class="profile-side">
                    <h3 class="user-name"> <?php echo $row['nome_completo']; ?> </h3>
                    <p class="user-mail"><i class="fa fa-envelope"></i> <?php echo $row['email']; ?> </p>
                    <p class="user-phone"><i class="fas fa-phone"></i> <?php echo $row['telefone'] ?> </p>
                    <p class="user-aniversario"><i class="far fa-calendar-alt"></i> <?php echo ucfirst(utf8_encode(strftime("%d/%m/%Y", strtotime($row['data_nascimento'])))) ?> </p>
                    <div class="profile-btn">
                        <form action="../../php/logout.php">
                            <button type='submit' class="btn btn-exit">SAIR <i class="fas fa-sign-in-alt"></i></button>
                        </form>
                    </div>          
                </div>
            </div>

        <?php } ?>
            <div class="right-side">
                <div class="nav">
                    <ul>
                        <li onclick="tabs0()" class="user-post active">Progresso</li>
                        <li onclick="tabs1()"class="user-setting">Configurações</li>
                    </ul>
                </div>
                <div class="profile-body">
                    <div class="grafico">
                        <div class="profile-posts">
                            <h1>Progresso</h1> 
                            <p>Aqui está o seu progresso em cada questionário respondido.</p>
                            <div class="profile-grafico">
                                <div class="canvas-holder">
                                    <canvas id="respiratorias" class="doencas-respiratorias"></canvas>
                                </div>
                                <div class="canvas-holder">
                                    <canvas id="infecciosas" class="doencas-infecciosas"></canvas>
                                </div>
                                <div class="canvas-holder">
                                    <canvas id="mentais" class="doencas-transtornos"></canvas>
                                </div>

                                <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
                                <script>
                                    var ctx = document.getElementById('respiratorias').getContext('2d');
                                    var mixedChart = new Chart(ctx, {
                                        type: 'doughnut',
                                        data: {
                                            labels: ['Certas', 'Erradas'],
                                            datasets: [{
                                                label: 'Progresso Doenças Respiratórias',
                                                data: [<?php echo $correctResp.",".$wrongResp ?>],
                                                backgroundColor: [
                                                    'rgba(113, 153, 188, 1)',
                                                    'rgba(151, 180, 206, 0.2)',
                                                ],
                                                borderColor: [
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(54, 162, 235, 1)',
                                                ],
                                                borderWidth: 1
                                            }],
                                        },
                                        options: {
                                            title:{
                                                text: "Progresso Questionário Doenças Respiratórias",
                                                fontSize: 15,
                                                fontFamily: "'Montserrat', sans-serif",
                                                display:true
                                            }
                                        }
                                    });

                                    var ctx = document.getElementById('infecciosas').getContext('2d');
                                    var chartGraph = new Chart(ctx, { 
                                        type: 'doughnut',
                                        data: {
                                            labels: ['Certas', 'Erradas'],
                                            datasets: [{
                                                label: 'Progresso Doenças Infecciosas',
                                                data: [<?php echo $correctInf.",".$wrongInf ?>],
                                                backgroundColor: [
                                                    'rgba(111, 185, 184, 1)',
                                                    'rgba(157, 207, 206, 0.2)',
                                                ],
                                                borderColor: [
                                                    'rgba(56, 177, 175, 1)',
                                                    'rgba(56, 177, 175, 1)',
                                                ],
                                                borderWidth: 1
                                            }],
                                        },
                                        options: {
                                            title:{
                                                text: "Progresso Questionário Doenças Infecciosas",
                                                fontFamily: "'Montserrat', sans-serif",
                                                fontSize: 15,
                                                display:true
                                            }
                                        }
                                    });
                                    
                                    var ctx = document.getElementById('mentais').getContext('2d');
                                    var chartGraph = new Chart(ctx, {
                                        type: 'doughnut',
                                        data: {
                                            labels: ['Certas', 'Erradas'],
                                            datasets: [{
                                                label: 'Progresso Transtornos Mentais',
                                                data: [<?php echo $correctMental.",".$wrongMental ?>],
                                                backgroundColor: [
                                                    'rgba(214, 150, 185, 1)',
                                                    'rgba(219, 179, 201, 0.2)',
                                                ],
                                                borderColor: [
                                                    'rgba(224, 116, 176, 1)',
                                                    'rgba(224, 116, 176, 1)',
                                                ],
                                                borderWidth: 1
                                            }],
                                        },
                                        options: {
                                            title:{
                                                text: "Progresso Questionário Transtornos mentais",
                                                fontFamily: "'Montserrat', sans-serif",
                                                fontSize: 15,
                                                display:true
                                            }
                                        },
                                    
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="profile-setting">
                        <h1>Minha conta</h1> 
                        <div class="img-conf">
                            <img src="../../img/user.svg" class="imgConf">
                            <p><a href="#"><i class="fas fa-camera"></i>Mudar foto</a></p>
                        </div>
                        <div class="opcoes">
                            <div class="texto">
                                <h5>E-mail</h5>
                                <p>Deseja mudar o e-mail cadastrado?</p>
                                <span id="texto"></span>
                                <span id="mudarEmail">
                                    <form class="form" action="../../php/updateEmail.php" method="POST">
                                        <label class="label-input" for="">
                                            <i class="far fa-envelope icon-modify"></i>
                                            <input name="email" type = "email" placeholder="Novo E-mail">
                                        </label>
                                        <label class="label-input" for="">
                                            <i class="fas fa-lock icon-modify"></i>
                                            <input name="senha" type = "password" placeholder="Confirmação de senha">
                                        </label>
                                        <button type="submit" class="btn btn-salvar">Salvar</button>
                                    </form>
                                </span>
                                <button onclick="mudarEmail()" id="btnMudarEmail">Mudar E-mail</button>
                            </div>

                            <div class="texto">
                                <h5>Telefone</h5>
                                <p>Deseja mudar o telefone cadastrado?</p>
                                <span id="texto"></span>
                                <span id="mudarTel">
                                    <form class="form" action ="../../php/updateTel.php" method="POST">
                                        <label class="label-input" for="">
                                            <i class="fas fa-phone icon-modify"></i>
                                            <input type="text" name="telefone" placeholder="Telefone" class="form-control" onkeypress="$(this).mask('(00) 0 0000-0000')" required>                                        </label>
                                        <label class="label-input" for="">
                                            <i class="fas fa-lock icon-modify"></i>
                                            <input type="password" name="senha" placeholder="Confirmação de senha">
                                        </label>
                                        <button class="btn btn-salvar">Salvar</button>
                                    </form>
                                </span>
                                <button onclick="mudarTel()" id="btnMudarTel">Mudar Telefone</button>
                            </div>

                        </div>
                        <div class="excluir" >
                            <a href="../../php/delete.php">Excluir conta<i class="fas fa-trash-alt"></i></a> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
	</br> 
    <div id="linha"></div>
	<section class="footer">
		<div class="container5">
			<ul>
				<li class="grid-9"><img src="../../img/logo.png" class="imgLogo">
					<h6>©2021 HealthCare </h6>
					<h6>Todos os direitos reservados</h6>
				</li>
				<li class="grid-5"><h2>Home</h2>
					<p><a href="../Doencas/DoencasRespiratorias/Slider3.html">Doenças Respiratórias</a></p>
					<p><a href="../Doencas/DoencasInfecciosas/Slider.html">Doenças Infecciosas</a></p>
					<p><a href="../Doencas/TranstornosMentais/Slider2.html">Transtornos Mentais</a></p>
				</li>
				<li class="grid-5"><h2>Contato</h2>
					<p>healthcareequipe@gmail.com</p>
					<p>(11)2222-2222</p>
				</li>
				<li class="grid-5"><h2>Social</h2>
                    <p><a href="https://www.instagram.com/sitehealthcare/?hl=pt-br"><i class="fab fa-instagram fa-1x"></i>Instagram</a></p>
                    <p><a href="https://twitter.com/HealthCarEquipe"><i class="fab fa-twitter fa-1x"></i>Twitter</a></p>
                    <p><a href="https://www.facebook.com/HealthCare-107009071430155"><i class="fab fa-facebook fa-1x"></i>Facebook</a></p>
				</li>
				<li class="grid-4"><h2>Sobre</h2>
                    <p><a href="#" class="politica" data-toggle="modal" data-target="#siteModal">Política de Privacidade</a></p>
                    <div class="modal fade" id="siteModal" tabindex="-1" role="dialog">
                       <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Política de Privacidade</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        A sua privacidade é importante para nós. É política do HealthCare respeitar a sua privacidade em relação a qualquer informação sua que possamos coletar no site 
                                        <a href=https://healthcare.com.br>HealthCare</a>, e outros sites que possuímos e operamos.
                                    </p>                    
                                    <p>
                                        Solicitamos informações pessoais apenas quando realmente precisamos delas para lhe fornecer um serviço. Fazemo-lo por meios justos e legais, com o seu conhecimento e consentimento. 
                                        Também informamos por que estamos coletando e como será usado.
                                    </p>                    
                                    <p>
                                        Apenas retemos as informações coletadas pelo tempo necessário para fornecer o serviço solicitado. Quando armazenamos dados, protegemos dentro de meios comercialmente aceitáveis ​​para 
                                        evitar perdas e roubos, bem como acesso, divulgação, cópia, uso ou modificação não autorizados.
                                    </p>                  
                                    <p>
                                        Não compartilhamos informações de identificação pessoal publicamente ou com terceiros, exceto quando exigido por lei.
                                    </p>                    
                                    <p>
                                        O nosso site pode ter links para sites externos que não são operados por nós. Esteja ciente de que não temos controle sobre o conteúdo e práticas desses sites e não podemos aceitar 
                                        responsabilidade por suas respectivas 
                                        <a href='https://politicaprivacidade.com' target='_BLANK'>políticas de privacidade</a>.
                                    </p>                      
                                    <p>
                                        Você é livre para recusar a nossa solicitação de informações pessoais, entendendo que talvez não possamos fornecer alguns dos serviços desejados.
                                    </p>                    
                                    <p>
                                        O uso continuado de nosso site será considerado como aceitação de nossas práticas em torno de privacidade e informações pessoais. Se você tiver alguma dúvida sobre como lidamos com
                                        dados do usuário e informações pessoais, entre em contato conosco.
                                    </p>                  
                                    <h2>Política de Cookies HealthCare</h2>                    
                                    <h3>O que são cookies?</h3>                    
                                    <p>
                                        Como é prática comum em quase todos os sites profissionais, este site usa cookies, que são pequenos arquivos baixados no seu computador, para melhorar sua experiência. 
                                        Esta página descreve quais informações eles coletam, como as usamos e por que às vezes precisamos armazenar esses cookies. Também compartilharemos como você pode impedir 
                                        que esses cookies sejam armazenados, no entanto, isso pode fazer o downgrade ou 'quebrar' certos elementos da funcionalidade do site.
                                    </p>                    
                                    <h3>Como usamos os cookies?</h3>                    
                                    <p>
                                        Utilizamos cookies por vários motivos, detalhados abaixo. Infelizmente, na maioria dos casos, não existem opções padrão do setor para desativar os cookies sem 
                                        desativar completamente a funcionalidade e os recursos que eles adicionam a este site. É recomendável que você deixe todos os cookies se não tiver certeza se precisa ou 
                                        não deles, caso sejam usados ​​para fornecer um serviço que você usa.
                                    </p>                   
                                    <h3>Desativar cookies</h3>                    
                                    <p>
                                        Você pode impedir a configuração de cookies ajustando as configurações do seu navegador (consulte a Ajuda do navegador para saber como fazer isso). Esteja ciente de que a 
                                        desativação de cookies afetará a funcionalidade deste e de muitos outros sites que você visita. A desativação de cookies geralmente resultará na desativação de determinadas 
                                        funcionalidades e recursos deste site. Portanto, é recomendável que você não desative os cookies.
                                    </p>                    
                                    <h3>Cookies que definimos</h3>                    
                                    <ul>                        
                                        <li>
                                            Cookies relacionados à conta<br><br> 
                                            Se você criar uma conta connosco, usaremos cookies para o gerenciamento do processo de inscrição e administração geral.  Esses cookies geralmente serão excluídos quando 
                                            você sair do sistema, porém, em alguns  casos, eles poderão permanecer posteriormente para lembrar as preferências do seu site ao sair.<br><br>                        
                                        </li>                       
                                        <li>
                                            Cookies relacionados ao login<br><br> 
                                            Utilizamos cookies quando você está logado, para que possamos lembrar dessa ação. Isso evita que você precise fazer login sempre que visitar uma nova página. 
                                            Esses cookies são normalmente removidos ou limpos quando você efetua logout para garantir que você possa acessar apenas a recursos e áreas restritas ao efetuar login.<br><br>                        
                                        </li>                        
                                        <li> 
                                            Cookies relacionados a boletins por e-mail<br><br> 
                                            Este site oferece serviços de assinatura de boletim informativo ou e-mail e os cookies podem ser usados ​​para lembrar se você já está registrado e se deve mostrar 
                                            determinadas notificações válidas apenas para usuários inscritos / não inscritos.<br><br>                        
                                        </li>                        
                                        <li> 
                                            Pedidos processando cookies relacionados<br><br> 
                                            Este site oferece facilidades de comércio eletrônico ou pagamento e alguns cookies são essenciais para garantir que seu pedido seja lembrado entre as páginas, 
                                            para que possamos processá-lo adequadamente.<br><br>                        
                                        </li>                        
                                        <li>
                                            Cookies relacionados a pesquisas<br><br> 
                                            Periodicamente, oferecemos pesquisas e questionários para fornecer informações interessantes, ferramentas úteis ou para entender nossa base de usuários com mais precisão. 
                                            Essas pesquisas podem usar cookies para lembrar quem já participou numa pesquisa ou para fornecer resultados precisos após a alteração das páginas.<br><br>                        
                                        </li>                        
                                        <li>
                                            Cookies relacionados a formulários<br><br> 
                                            Quando você envia dados por meio de um formulário como os encontrados nas páginas de contacto ou nos formulários de comentários, os cookies podem ser configurados para 
                                            lembrar os detalhes do usuário para correspondência futura.<br><br>                        
                                        </li>                        
                                        <li>
                                            Cookies de preferências do site<br><br> 
                                            Para proporcionar uma ótima experiência neste site, fornecemos a funcionalidade para definir suas preferências de como esse site é executado quando você o usa. 
                                            Para lembrar suas preferências, precisamos definir cookies para que essas informações possam ser chamadas sempre que você interagir com uma página for afetada por suas 
                                            preferências.<br>                       
                                        </li>                    
                                    </ul>                   
                                    <h3>Cookies de Terceiros</h3>                    
                                    <p>
                                        Em alguns casos especiais, também usamos cookies fornecidos por terceiros confiáveis. A seção a seguir detalha quais cookies de terceiros você pode encontrar através deste site.
                                    </p>                    
                                    <ul>                        
                                        <li> 
                                            Este site usa o Google Analytics, que é uma das soluções de análise mais difundidas e confiáveis ​​da Web, para nos ajudar a entender como você usa o site e como podemos
                                            melhorar sua experiência. Esses cookies podem rastrear itens como quanto tempo você gasta no site e as páginas visitadas, para que possamos continuar produzindo conteúdo 
                                            atraente.                        
                                        </li>                    
                                    </ul>                    
                                    <p>
                                        Para mais informações sobre cookies do Google Analytics, consulte a página oficial do Google Analytics.
                                    </p>                    
                                    <ul>                        
                                        <li> 
                                            As análises de terceiros são usadas para rastrear e medir o uso deste site, para que possamos continuar produzindo conteúdo atrativo. Esses cookies podem rastrear 
                                            itens como o tempo que você passa no site ou as páginas visitadas, o que nos ajuda a entender como podemos melhorar o site para você.
                                        </li>                        
                                        <li>
                                            Periodicamente, testamos novos recursos e fazemos alterações subtis na maneira como o site se apresenta. Quando ainda estamos testando novos recursos, esses cookies podem 
                                            ser usados ​​para garantir que você receba uma experiência consistente enquanto estiver no site, enquanto entendemos quais otimizações os nossos usuários mais apreciam.          
                                        </li>                        
                                        <li>
                                            À medida que vendemos produtos, é importante entendermos as estatísticas sobre quantos visitantes de nosso site realmente compram e, portanto, esse é o tipo de dados 
                                            que esses cookies rastrearão. Isso é importante para você, pois significa que podemos fazer previsões de negócios com precisão que nos permitem analizar nossos custos 
                                            de publicidade e produtos para garantir o melhor preço possível.
                                        </li>                                           
                                    </ul>                    
                                    <h3>Compromisso do Usuário</h3>                                
                                    <p>
                                        O usuário se compromete a fazer uso adequado dos conteúdos e da informação que o HealthCare oferece no site e com caráter enunciativo, mas não limitativo:
                                    </p>                                        
                                    <ul>                        
                                        <li>
                                            A) Não se envolver em atividades que sejam ilegais ou contrárias à boa fé a à ordem pública;
                                        </li>                        
                                        <li>
                                            B) Não difundir propaganda ou conteúdo de natureza racista, xenofóbica, ou sobre cassinos, apostas online (ex.: ESC Online), jogos de sorte e azar, qualquer tipo 
                                            de pornografia ilegal, de apologia ao terrorismo ou contra os direitos humanos;
                                        </li>                        
                                        <li>
                                            C) Não causar danos aos sistemas físicos (hardwares) e lógicos (softwares) do HealthCare, de seus fornecedores ou terceiros, para introduzir ou disseminar vírus 
                                            informáticos ou quaisquer outros sistemas de hardware ou software que sejam capazes de causar danos anteriormente mencionados.
                                        </li>                    
                                    </ul>                                        
                                    <h3>Mais informações</h3>                    
                                    <p>
                                        Esperemos que esteja esclarecido e, como mencionado anteriormente, se houver algo que você não tem certeza se precisa ou não, geralmente é mais seguro deixar os 
                                        cookies ativados, caso interaja com um dos recursos que você usa em nosso site.
                                    </p>                    
                                    <p>
                                        Esta política é efetiva a partir de <strong>February</strong>/<strong>2021</strong>.
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button> 
                                </div>
                            </div>
                       </div>
                   </div>
                   <p><a href="../DadosSite/NossaEquipe.html">Nossa Equipe</a></p>  
				</li>
            </ul>
		</div>
	</section>
    
    

</body>
</html>