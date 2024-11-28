<?php
include_once __DIR__ . '/../../../backend/classes/Usuario.php';
include_once __DIR__ . '/../../../backend/controllers/page_controller.php';
include_once __DIR__ . '/../../../backend/controllers/controller.php';
session_start();

$controlador = new Controller();

// Se o formulário de nível de dificuldade for enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nivel'])) {
    $nivel = $_POST['nivel'];
    $_SESSION['nivel'] = $nivel;

    // Selecionar perguntas com base no nível de dificuldade
    $perguntas = $controlador->QuizPush($nivel);
    $perguntasArray = [];

    while ($pergunta = $perguntas->fetch_assoc()) {
        $perguntasArray[] = $pergunta;
    }

    // Embaralha as perguntas
    shuffle($perguntasArray);

    // Seleciona as primeiras 10 perguntas
    $_SESSION['perguntasSelecionadas'] = array_slice($perguntasArray, 0, 10);
}

// Exibir o formulário de nível de dificuldade se não houver perguntas selecionadas
if (!isset($_SESSION['perguntasSelecionadas'])) {
    ?>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>DataStruct School | Quiz</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css">
        <link rel="shortcut icon" href="../../logo.png" />
    </head>
    <body>
        <?php PageController::Cabecalho(); ?>
        <main>
            <h1>Escolha o Nível de Dificuldade</h1>
            <form method="POST" action="">
                <label for="nivel">Escolha o nível de dificuldade:</label>
                <select name="nivel" id="nivel" required>
                    <option value="0">Fácil</option>
                    <option value="1">Médio</option>
                    <option value="2">Difícil</option>
                </select>
                <button type="submit">Iniciar Quiz</button>
            </form>
        </main>
        <?php PageController::Rodape(); ?>
    </body>
    </html>
    <?php
    exit; // Interrompe o script após o formulário
}

// Continuar com o quiz se as perguntas estiverem selecionadas
$perguntasSelecionadas = $_SESSION['perguntasSelecionadas'];
$respostasUsuario = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitted'])) {
    $acertos = 0;

    foreach ($_POST as $key => $value) {
        if (strpos($key, 'resposta_') === 0) {
            $index = str_replace('resposta_', '', $key);
            $respostaUsuario = $value;
            $idresposta = $_POST["idresposta_$index"];
            $respostas = $controlador->QuizRespostaPush($idresposta)->fetch_assoc();
            $respostaCorreta = $respostas['resposta_quiz'];
            $respostasUsuario[$index] = [
                'respostaUsuario' => $respostaUsuario,
                'respostaCorreta' => $respostaCorreta
            ];
            if ($respostaUsuario == $respostaCorreta) {
                $acertos++;
            }
        }
    }
    $dinheiro = $acertos * (100 * (intval($_SESSION['nivel']) + 1));
    $controlador->UsuarioAdicionarDinheiro($dinheiro);
    echo "<script>
    setInterval(() => {
        document.querySelector('#sendButton').style.display = 'none'
        document.querySelector('#resetButton').style.display = 'flex'
        document.querySelector('#resetButton').innerHTML = 'Você acertou $acertos perguntas e ganhou $dinheiro moedas! <a href=\"index.php\">Responder novamente</a>'
    },1000)
    </script>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DataStruct School | Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="shortcut icon" href="../../logo.png" />
</head>
<body>
    <?php PageController::Cabecalho(); ?>
    <main>
        <h1>Responda ao Quiz!</h1>
        <p id="resetButton" style="display: none;"></p>
        <form method="POST" action="">
            <input type="hidden" name="submitted" value="true">
            <?php
            foreach ($perguntasSelecionadas as $index => $pergunta) {
                echo "<section class='question-container'>";
                echo "<h3 class='question'>" . ($index + 1) . ". " . $pergunta['pergunta_quiz'] . "</h3>";
                $idresposta = $pergunta['idresposta'];
                $respostas = $controlador->QuizRespostaPush($idresposta)->fetch_assoc();

                $alternativas = [
                    'A' => $respostas['alternativa_a'],
                    'B' => $respostas['alternativa_b'],
                    'C' => $respostas['alternativa_c'],
                    'D' => $respostas['alternativa_d']
                ];

                foreach ($alternativas as $letra => $alternativa) {
                    $inputId = "resposta_{$index}_{$letra}";
                    $checked = isset($respostasUsuario[$index]) && $respostasUsuario[$index]['respostaUsuario'] == $letra ? 'checked' : '';
                    $cor = '';
                    $icone = '';

                    if (isset($respostasUsuario[$index])) {
                        if ($letra == $respostasUsuario[$index]['respostaCorreta']) {
                            $cor = 'class="correct"';
                            if ($letra == $respostasUsuario[$index]['respostaUsuario']) {
                                $icone = '✔️';
                            }
                        } elseif ($letra == $respostasUsuario[$index]['respostaUsuario']) {
                            $cor = 'class="incorrect"';
                            $icone = '❌';
                        }
                    }

                    echo "<label for='$inputId' $cor>";
                    echo "<input type='radio' id='$inputId' name='resposta_$index' value='$letra' $checked> $letra) $alternativa $icone";
                    echo "</label><br>";
                }
                echo "<input type='hidden' name='idresposta_$index' value='$idresposta'>";
                echo "</section>";
            }
            ?>
            <button type="submit" id="sendButton">Enviar Respostas</button>
        </form>
    </main>
    <?php PageController::Rodape(); ?>
</body>
</html>