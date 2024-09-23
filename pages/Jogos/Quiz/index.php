<?php 
error_reporting(E_ERROR | E_PARSE);

include_once './../../../backend/classes/Usuario.php';
include_once './../../../backend/controllers/page_controller.php';
include_once './../../../backend/controllers/controller.php';
session_start();

$controlador = new Controller();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quiz | DataStruct School</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <?php PageController::Cabecalho(); ?>
    
    <main>
        <h1>Responda ao Quiz!</h1>
        <form method="POST" action="process_quiz.php">
        <?php
            if (method_exists($controlador, 'QuizPush')) {
                $perguntas = $controlador->QuizPush();
                $perguntasArray = [];
                
                while ($pergunta = $perguntas->fetch_assoc()) {
                    $perguntasArray[] = $pergunta;
                }
                
                // Embaralha as perguntas
                shuffle($perguntasArray);
                
                // Seleciona as primeiras 10 perguntas
                $perguntasSelecionadas = array_slice($perguntasArray, 0, 10);
                
                foreach ($perguntasSelecionadas as $index => $pergunta) {
                    echo "<h3 class='question'>" . $pergunta['pergunta_quiz'] . "</h3>";
                    for ($i = 1; $i <= 4; $i++) {
                        $alternativa = $pergunta["alternativa$i"];
                        echo "<label>";
                        echo "<input type='radio' name='resposta_$index' value='$alternativa'> $alternativa";
                        echo "</label><br>";
                    }
                }
            } else {
                echo "<p>Erro: Método QuizPush não encontrado na classe Controller.</p>";
            }
        ?>
            <button type="submit">Enviar Respostas</button>
        </form>
    </main>

    <?php PageController::Rodape(); ?>
</body>
</html>
