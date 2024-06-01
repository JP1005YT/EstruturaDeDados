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
                <li>
                    <a href="./index.php">Página Principal</a>
                </li>
                <li>
                    <a href="./pages/Temas/">Temas</a>
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
                            <section class="dropdown">
                                <ul>
                                    <li>Perfil</li>
                                    
                                    <li>
                                        <a href="./backend/functions/sair.php">Sair</a>
                                    </li>
                                </ul>
                            </section>
                        </section>';
                }else{
                    echo '<section>
                            <button class="cadastrar">Cadastrar-se</button>
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
            <section class="marker">
                <i class='bx bxs-circle' id="active"></i>
                <i class='bx bxs-circle'></i>
                <i class='bx bxs-circle'></i>
            </section>
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
            <section class="opnioes">
                <section class="card">
                    <i class='bx bxs-quote-alt-right' ></i>
                    <p> Sinto-me mais confiante em codificação. </p>
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
                            <span> Especialista em Estruturas de Dados e Algoritmos </span>
                        </section>
                    </section>
                </section>
                <section class="card">
                    <i class='bx bxs-quote-alt-right' ></i>
                    <p> Estruturas de dados para uma mente estruturada </p>
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
                    <p> Programação estruturada para maior tranquilidade </p>
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
            <!-- <section class="navbar">
            <a href="#">DataStructuresEdu</a>
            <nav>
                <a href="#">Discover more about us</a>
                <a href="#">Get support</a>
                <a href="#">Become part of our community</a>
                <a href="#">Download our app</a>
            </nav>
            </section>
            <section>
            <h2>Discover more about us</h2>
            <p>Learn more about us and explore career opportunities.</p>
            <button>Learn More</button>
            </section> -->
    </main>
    <footer>
        <p>Your Ultimate Array Education Destination!</p> Fatec &copy Todos Direitos Reservados 
    </footer>
    <script>
        let i = 0
        function switchCarrossel(){
            const alldivs = document.querySelectorAll(".carrossel div")
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