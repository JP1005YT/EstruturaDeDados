<?php
    include_once './backend/classes/Usuario.php';
    include_once './backend/controllers/page_controller.php';
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
    <?php
        PageController::Cabecalho();
    ?>
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
        <section id="sobre-nos" class="sobre-nos">
            <h2>Sobre a DataStruct School</h2>
            <section class="sobre-nos-content">
                <p>Na DataStruct School, somos apaixonados por educação em ciência da computação. Nossa missão é capacitar programadores e estudantes com o conhecimento necessário para dominar as estruturas de dados e técnicas de programação eficiente. Com mais de 1 milhão de alunos em nossa comunidade, nos esforçamos para oferecer conteúdo de alta qualidade que transforma a maneira como as pessoas aprendem e aplicam estruturas de dados.</p>
                <p>Com uma equipe dedicada de especialistas e educadores, criamos uma plataforma onde a complexidade da programação é simplificada. Queremos que nossos alunos sintam a confiança e a alegria de entender profundamente como as estruturas de dados funcionam, promovendo uma programação mais eficaz e eficiente.</p>
                <p>Junte-se a nós nessa jornada de aprendizado e descubra como a programação estruturada pode transformar sua maneira de pensar e codificar!</p>
            </section>
    </section>
    </main>
    <?php
        PageController::Rodape();
    ?>
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
        setInterval(switchCarrossel,7000)
    </script>
</body>
</html>