<?php
    include_once './../../backend/classes/Usuario.php';
    session_start();

    spl_autoload_register(function ($class_name) {
        include './../../backend/classes/' . $class_name . '.php';
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
        <link rel="shortcut icon" href="./../../logo.png" />
    </head>
    <body>
    <header class="mainHeader">
        <div class="logo">
            <img src="./../../logo.png" height="70px">
            <h1>DataStruct School</h1>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="./../../index.php">Página Principal</a>
                </li>
                <li>Temas</li>
            </ul>
            <?php
                if(isset($_SESSION['user'])){
                    $user = $_SESSION['user'];
                    echo '<section class="logged" onclick="dropdown()">
                            <div class="content">
                                '.$user->getUsername() .'
                                <i class="bx bxs-chevron-down" id="icon"></i>
                            </div>
                            <div class="dropdown">
                                <ul>
                                    <li>Perfil</li>
                                    
                                    <li>
                                        <a href="./backend/functions/sair.php">Sair</a>
                                    </li>
                                </ul>
                            </div>
                        </section>';
                }else{
                    echo '<section>
                            <button class="cadastrar" onclick="switchPages('."'../../pages/Cadastrar/'".')"">Cadastrar-se</button>
                            <button class="entrar" onclick="switchPages('."'../../pages/Entrar/'".')">Entrar</button>
                        </section>';
                }
            ?>
        </nav>
    </header>
    <main>
        <section class="card">
            Aula 1
        </section>
    </main>
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