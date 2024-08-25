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
        <title>DataStruct School | Aula</title>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
        <link rel="shortcut icon" href="./../../logo.png" />
        <link rel="stylesheet" href="path/to/your/global.css">
    </head>
    <body>
        <?php
            PageController::Cabecalho();
        ?>
        <main>
            <iframe src=<?php echo '../../backend/temas/'.$_GET['class']?> class="card" width="100%">
            </iframe>
        </main>
        <script>
            function switchPages(url){
                window.location.href = url
            }
            function dropdown(){
                document.querySelector(".logged").classList.toggle("active")
                document.querySelector("#icon").classList.toggle("active")
            }
        </script>
        <?php
            PageController::Rodape();
        ?> 
    </body>
</html>