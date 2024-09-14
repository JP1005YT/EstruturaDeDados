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
    </head>
    <body>
        <?php
            PageController::Cabecalho();
        ?>
        <?php
        $tema = $_GET['tema'];
        $diretorio = "./../../backend/temas/" . urlencode($tema) . "/index.html";
        $diretorio = str_replace('+', '%20', $diretorio);
        echo "<iframe src=".$diretorio.">";
        ?>
        <?php
            PageController::Rodape();
        ?>
    </body>
</html>