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
        <?php
            $acertos = 0;
            $perguntasSelecionadas = [];
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
            }
            
            if (isset($_POST['submitted'])) {
                foreach ($_POST as $key => $value) {
                    if (strpos($key, 'resposta_') === 0) {
                        $index = str_replace('resposta_', '', $key);
                        $respostaUsuario = $value;
                        $idresposta = $_POST["idresposta_$index"];
                        $respostas = $controlador->QuizRespostaPush($idresposta)->fetch_assoc();
                        $respostaCorreta = $respostas['resposta_quiz'];
                        if ($respostaUsuario == $respostaCorreta) {
                            $acertos++;
                        }
                    }
                }
                echo "<h2>Você acertou $acertos de 10 perguntas.</h2>";
            }
        ?>
        <form method="POST" action="">
            <input type="hidden" name="submitted" value="true">
        <?php
            foreach ($perguntasSelecionadas as $index => $pergunta) {
                echo "<section class='question-container'>";
                echo "<h3 class='question'>" . $pergunta['pergunta_quiz'] . "</h3>";
                
                // Buscar alternativas da tabela quiz_respostas
                $idresposta = $pergunta['idresposta'];
                $respostas = $controlador->QuizRespostaPush($idresposta)->fetch_assoc();
                
                $alternativas = [
                    'A' => $respostas['alternativa_a'],
                    'B' => $respostas['alternativa_b'],
                    'C' => $respostas['alternativa_c'],
                    'D' => $respostas['alternativa_d']
                ];
                
                $respostaCorreta = $respostas['resposta_quiz'];
                $respostaUsuario = $_POST["resposta_$index"] ?? null;
                $pontos = 0;
                
                if (isset($_POST['submitted']) && $respostaUsuario == $respostaCorreta) {
                    $pontos = 1;
                }
                
                echo "<section class='points'>Pontos: $pontos</section>";
                
                foreach ($alternativas as $letra => $alternativa) {
                    $inputId = "resposta_{$index}_{$letra}";
                    $cor = '';
                    $icone = '';
                    
                    if (isset($_POST['submitted'])) {
                        if ($letra == $respostaCorreta) {
                            $cor = 'class="correct"';
                            if ($letra == $respostaUsuario) {
                                $icone = '✔️';
                            }
                        } elseif ($letra == $respostaUsuario) {
                            $cor = 'class="incorrect"';
                            $icone = '❌';
                        }
                    }
                    
                    echo "<label for='$inputId' $cor>";
                    echo "<input type='radio' id='$inputId' name='resposta_$index' value='$letra' " . ($respostaUsuario == $letra ? 'checked' : '') . "> $alternativa $icone";
                    echo "</label><br>";
                }
                
                echo "<input type='hidden' name='idresposta_$index' value='$idresposta'>";
                echo "</section>";
            }
        ?>
            <button type="submit">Enviar Respostas</button>
        </form>
    </main>

    <?php PageController::Rodape(); ?>
</body>
</html>