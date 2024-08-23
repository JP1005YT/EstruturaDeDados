<?php
    include_once './backend/classes/Usuario.php';
    session_start();

    spl_autoload_register(function ($class_name) {
        include './backend/classes/' . $class_name . '.php';
    });
    
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> DataStruct School | Home</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="shortcut icon" href="logo.png" />
</head>
<body>
    <header class="mainHeader">
        <section class="logo">
            <img src="logo.png" height="70px">
            <h1>DataStruct School</h1>
        </section>
        <nav>
            <ul>
                <li onclick="switchPages('./index.php')">
                    <a href="./index.php">Página Principal</a>
                </li>
                <li onclick="switchPages('./pages/Temas/')">
                    <a href="./pages/Temas/">Aulas</a>
                </li>
                <li onclick="switchPages('./pages/Jogos/Quiz/index.php')">
                    <a href="./pages/Jogos/Quiz/index.php">Quiz</a>
                </li>
            </ul>
            <?php
                if(isset($_SESSION['user'])){
                    $user = $_SESSION['user'];
                    echo '<section class="logged" onclick="dropdown()">
                            <section class="content">
                                '.$user->getUsername() .'
                                <i class="bx bxs-chevron-down" id="icon"></i>
                            </section>
                            <div class="dropdown">
                                <ul>
                                    <li> 
                                        <a href="./pages/Perfil/index.php"> Perfil </a>
                                    </li>
                                    
                                    <li>
                                        <a href="./backend/functions/sair.php"> Sair </a>
                                    </li>
                                </ul>
                            </div>
                        </section>';
                }else{
                    echo '<section>
                            <button class="cadastrar" onclick="switchPages('."'./pages/Cadastrar/'".')">Cadastrar-se</button>
                            <button class="entrar" onclick="switchPages('."'./pages/Entrar/'".')">Entrar</button>
                        </section>';
                }
            ?>
        </nav>
    </header>
    <main>
        <section class="carrossel">
            <section class="active">
                <img src="src/Slide1.png">
            </section>
            <section>
                <img src="src/Slide2.png">
            </section>
            <section>
                <img src="src/Slide3.png">
            </section>
            <div class="marker">
                <i class='bx bxs-circle' id="active"></i>
                <i class='bx bxs-circle'></i>
                <i class='bx bxs-circle'></i>
            </div>
        </section>
        <section class="about">
            <section class="top">
                <section class="info">
                    <i class='bx bxs-smile'></i>
                    <section>
                        <h3> Mente feliz com estruturas de dados </h3>
                        <p> Desbloqueie o poder dos dados estruturados para programação eficiente.</p>
                    </section>
                </section>
                <section class="info">
                    <i class='bx bxs-moon' ></i>
                    <section>
                        <h3> Profunda compreensão de dados </h3>
                        <p> Experiencie a beleza de dados organizados para programação eficaz. </p>
                    </section>
                </section>
                <section class="info">
                    <i class='bx bxs-hot' ></i>
                    <section>
                        <h3> Complexidade reduzida </h3>
                        <p> Simplifique a programação com dados estruturados para desempenho otimizado. </p>
                    </section>
                </section>
            </section>
            <h2>Entre na comunidade DataStruct e conecte-se a mais 1M de alunos</h2>
            <section class="opinioes">
                <section class="card">
                    <i class='bx bxs-quote-alt-right' ></i>
                    <p> Sinto-me mais confiante quando vou codificar. </p>
                    <section>
                        <img src="src/andre.jpg">
                        <section class="text">
                            <h3>André D.</h3>
                            <span> Engenheiro de Software </span>
                        </section>
                    </section>
                </section>
                <section class="card">
                    <i class='bx bxs-quote-alt-right' ></i>
                    <p> Esta plataforma melhorou minhas habilidades de codificação. 10/10! </p>
                    <section>
                        <img src="src/mariana.jpg">
                        <section class="text">
                            <h3> Mariana S.</h3>
                            <span> Especialista em Estruturas de Dados</span>
                        </section>
                    </section>
                </section>
                <section class="card">
                    <i class='bx bxs-quote-alt-right' ></i>
                    <p> Estruturas de dados para uma mente estruturada! </p>
                    <section>
                        <img src="src/rodrigo.jpg">
                        <section class="text">
                            <h3> Rodrigo C. </h3>
                            <span> Professor de Ciência da Computação </span>
                        </section>
                    </section>
                </section>
                <section class="card">
                    <i class='bx bxs-quote-alt-right' ></i>
                    <p> Programação estruturada para maior tranquilidade. </p>
                    <section>
                        <img src="src/carla.jpg">
                        <section class="text">
                            <h3> Carla M. </h3>
                            <span> Analista de Sistemas </span>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </main>
    <footer>
        <a href="#" class="title"><i class='bx bxs-smile'></i>DataStructuresEdu</a>
        <section class="navbar">
            <nav>
                <h3>Descubra mais sobre nós</h3>
                <p>Saiba mais sobre nós</p>
                <p>Explore oportunidades de carreira</p>
                <p>Acesse nossos materiais de imprensa</p>
                <p>Opções de assinatura</p>
            </nav>
            <nav>
                <h3>Obtenha suporte</h3>
                <p>Assistência para usuários</p>
                <p>Perguntas frequentes</p>
                <p>Precisa de ajuda?</p>
            </nav>
            <nav>
                <h3>Torne-se parte da nossa comunidade</h3>
                <p>Conecte-se conosco em</p>
                <p>Siga-nos no Instagram</p>
                <p>Junte-se à conversa em</p>
                <p>Entre no nosso servidor do Discord</p>
            </nav>
        </section>
    </footer>
    <script>
        let i = 0
        function switchCarrossel(){
            const alldivs = document.querySelectorAll(".carrossel section")
            const makers = document.querySelectorAll(".marker i")
            makers.forEach(i => {
                i.id = ""
            })
            alldivs.forEach(div => {  
                div.classList.value = ""
            })
            alldivs[i].classList.add('active')
            makers[i].id = 'active'
            if(i < 2){
                i++
            }else{
                i = 0
            }
        }
        function switchPages(url){
            window.location.href = url
        }
        function dropdown(){
            document.querySelector(".logged").classList.toggle("active")
            document.querySelector("#icon").classList.toggle("active")
        }
        setInterval(switchCarrossel,7000)
    </script>
</body>
</html>