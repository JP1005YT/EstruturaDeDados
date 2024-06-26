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
    <link rel='stylesheet' type='text/css' media='screen' href='perfil.css'>
    <link rel="shortcut icon" href="../../logo.png" />
</head>
<body>
    <header class="mainHeader">
        <section class="logo">
            <img src="../../logo.png" height="70px">
            <h1>DataStruct School</h1>
        </section>
        <nav>
            <ul>
                <li onclick="switchPages('./../../index.php')">
                    <a>Página Principal</a>
                </li>
                <li onclick="switchPages('./../../pages/Temas/')">
                    <a>Aulas</a>
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
                                        <a href="index.php"> Perfil </a>
                                    </li>
                                    <li>
                                        <a href="../../backend/functions/sair.php"> Sair </a>
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
                <section class="profile-container">
                    <?php echo "<h2> ". $_SESSION['user']->GetName() ."</h2>" ;?>
                    <?php echo "<p> Cargo: ". $_SESSION['user']->GetCargo() ."</p>" ;?>
                    <?php echo "<p> E-mail: ". $_SESSION['user']->GetEmail() ."</p>" ;?>
                    <?php echo "<p> UserName: ". $_SESSION['user']->GetUsername() ."</p>" ;?>
                    <section class="profile-options">
                    <img src="../../src/carla.jpg" alt="Foto de Perfil">
                    <div class="theme-toggle">
                        <button id="theme-switch-btn">Modo Claro</button>
                    </div>
                    </section>
                </section>
            </main>
            <script>
        const themeSwitchBtn = document.getElementById('theme-switch-btn');

        // Adicionando um ouvinte de evento para o botão
        themeSwitchBtn.addEventListener('click', function() {
            // Verificando o estado atual do tema
            const currentTheme = document.body.classList.contains('dark-mode') ? 'dark' : 'light';

            // Alterando o tema com base no estado atual
            switch (currentTheme) {
                case 'light':
                    enableDarkMode();
                    break;
                case 'dark':
                    enableLightMode();
                    break;
                default:
                    break;
            }
        });

        // Função para ativar o modo claro
        function enableLightMode() {
            document.body.classList.remove('dark-mode');
            themeSwitchBtn.textContent = 'Modo Escuro';
        }

        // Função para ativar o modo escuro
        function enableDarkMode() {
            document.body.classList.add('dark-mode');
            themeSwitchBtn.textContent = 'Modo Claro';
        }

        function dropdown(){
            document.querySelector(".logged").classList.toggle("active")
            document.querySelector("#icon").classList.toggle("active")
        }
        function switchPages(url){
            window.location.href = url
        }
    </script>
</body>
</html>