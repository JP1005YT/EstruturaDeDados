<?php
    include_once './../../backend/classes/Usuario.php';
    include_once './../../backend/controllers/page_controller.php';
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
    <link rel="shortcut icon" href="../../logo.png" />
</head>
    <body>
        <?php
            PageController::Cabecalho();
        ?>
            <main>
                <section class="profile-container">
                    <!-- <?php echo "<h2> ". $_SESSION['user']->GetName() ."</h2>" ;?>
                    <?php echo "<p> Cargo: ". $_SESSION['user']->GetCargo() ."</p>" ;?>
                    <?php echo "<p> E-mail: ". $_SESSION['user']->GetEmail() ."</p>" ;?>
                    <?php echo "<p> UserName: ". $_SESSION['user']->GetUsername() ."</p>" ;?> -->
                    <section class="profile-options">
                    <img src="../../src/carla.jpg" alt="Foto de Perfil">
                    <div class="theme-toggle">
                        <button id="theme-switch-btn">Modo Claro</button>
                        <!-- a continuar... -->
                    </div>
                    </section>
                </section>
            </main>
            <script>
                function dropdown(){
                    document.querySelector(".logged").classList.toggle("active")
                    document.querySelector("#icon").classList.toggle("active")
                }
                function switchPages(url){
                    window.location.href = url
                }
            </script>
            <?php
                PageController::Rodape();
            ?>
</body>
</html>