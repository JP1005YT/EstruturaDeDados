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
    <script>
        function validateForm() {
            const questions = document.querySelectorAll('.question-container');
            let firstUnanswered = null;
            for (let i = 0; i < questions.length; i++) {
                const radios = questions[i].querySelectorAll('input[type="radio"]');
                let answered = false;
                for (let j = 0; j < radios.length; j++) {
                    if (radios[j].checked) {
                        answered = true;
                        break;
                    }
                }
                const alertMessage = questions[i].querySelector('.alert-message');
                if (!answered) {
                    if (!alertMessage) {
                        const alert = document.createElement('section');
                        alert.className = 'alert-message alert';
                        alert.textContent = 'Por favor, responda a pergunta abaixo.';
                        questions[i].insertBefore(alert, questions[i].firstChild);
                    }
                    if (!firstUnanswered) {
                        firstUnanswered = questions[i];
                    }
                } else if (alertMessage) {
                    alertMessage.remove();
                }
            }
            if (firstUnanswered) {
                firstUnanswered.scrollIntoView({ behavior: 'smooth' });
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <?php PageController::Cabecalho(); ?>
    <main>
        <h1>Responda ao Quiz!</h1>
        <?php
            $acertos = 0;
            $perguntasSelecionadas = [];
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (method_exists($controlador, 'QuizPush')) {
                    $perguntas = $controlador->QuizPush();
                    $perguntasArray = [];
                    
                    while ($pergunta = $perguntas->fetch_assoc()) {
                        $perguntasArray[] = $pergunta;
                    }
                    
                    // Embaralha as perguntas
                    shuffle($perguntasArray);
                    
                    // Seleciona as primeiras 10 perguntas únicas
                    $perguntasSelecionadas = array_slice(array_unique($perguntasArray, SORT_REGULAR), 0, 10);
                    
                    // Armazena as perguntas selecionadas na sessão
                    $_SESSION['perguntasSelecionadas'] = $perguntasSelecionadas;
                }
            } else {
                // Recupera as perguntas selecionadas da sessão
                $perguntasSelecionadas = $_SESSION['perguntasSelecionadas'] ?? [];
                
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
            }
        ?>
        <form method="POST" action="" onsubmit="return validateForm();">
            <input type="hidden" name="submitted" value="true">
        <?php
            foreach ($perguntasSelecionadas as $index => $pergunta) {
                $numeroQuestao = $index + 1;
                echo "<section class='question-container'>";
                echo "<h3 class='question'>$numeroQuestao. " . $pergunta['pergunta_quiz'] . "</h3>";
                
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
                    echo "<input type='radio' id='$inputId' name='resposta_$index' value='$letra' " . ($respostaUsuario == $letra ? 'checked' : '') . "> $letra) $alternativa $icone";
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