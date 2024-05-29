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
        <div class="logo">
            <img src="logo.png" height="70px">
            <h1>DataStruct School</h1>
        </div>
        <nav>
            <ul>
                <li>Página Principal</li>
                <li>Temas</li>
            </ul>
            <?php
                if(isset($_SESSION['user'])){
                    $user = $_SESSION['user'];
                    echo '<section class="logged" onclick="dropdown()">
                            <div>
                                '.$user->getUsername() .'
                                <i class="bx bxs-chevron-down"></i>
                            </div>
                            <div class="dropdown">
                                <ul>
                                    <li>Perfil</li>
                                    
                                    <li>Sair</li>
                                </ul>
                            </div>
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
            <div class="active">
                <img src="src/Slide1.png">
            </div>
            <div>
                <img src="src/Slide2.png">
            </div>
            <div>
                <img src="src/Slide3.png">
            </div>
            <section class="marker">
                <i class='bx bxs-circle' id="active"></i>
                <i class='bx bxs-circle'></i>
                <i class='bx bxs-circle'></i>
            </section>
        </section>
        <section class="about">
            <div class="top">
                <section class="info">
                    <i class='bx bxs-smile'></i>
                    <div>
                        <h3> Mente feliz com estruturas de dados </h3>
                        <p> Desbloqueie o poder dos dados estruturados para programação eficiente.</p>
                    </div>
                </section>
                <section class="info">
                    <i class='bx bxs-moon' ></i>
                    <div>
                    <h3> Profunda compreensão de dados </h3>
                        <p> Experiencie a beleza de dados organizados para programação eficaz. </p>
                    </div>
                </section>
                <section class="info">
                    <i class='bx bxs-hot' ></i>
                    <div>
                    <h3> Complexidade reduzida </h3>
                        <p> Simplifique a programação com dados estruturados para desempenho otimizado. </p>
                    </div>
                </section>
            </div>
            <h2>Entre na comunidade DataStruct e conecte-se a mais 1M de alunos</h2>
            <section class="opnioes">
                <div class="card">
                    <i class='bx bxs-quote-alt-right' ></i>
                    <p> Sinto-me mais confiante em codificação. </p>
                    <div>
                        <img>
                        <div class="text">
                            <h3>André D.</h3>
                            <span> Engenheiro de Software </span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <i class='bx bxs-quote-alt-right' ></i>
                    <p> Esta plataforma melhorou minhas habilidades de codificação. 10/10! </p>
                    <div>
                        <img>
                        <div class="text">
                            <h3> Mariana S.</h3>
                            <span> Especialista em Estruturas de Dados e Algoritmos </span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <i class='bx bxs-quote-alt-right' ></i>
                    <p> Estruturas de dados para uma mente estruturada </p>
                    <div>
                        <img>
                        <div class="text">
                            <h3> Rodrigo C. </h3>
                            <span> Professor de Ciência da Computação </span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <i class='bx bxs-quote-alt-right' ></i>
                    <p> Programação estruturada para maior tranquilidade </p>
                    <div>
                        <img>
                        <div class="text">
                            <h3> Carla M. </h3>
                            <span> Analista de Sistemas </span>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>
    <footer>
        Fatec &copy Todos Direitos Reservados 
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
        }
        setInterval(switchCarrossel,7000)
    </script>
</body>
</html>