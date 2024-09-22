<?php 
     include_once './../../../backend/controllers/page_controller.php';

     session_start();
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
        <?php
            PageController::Cabecalho();
        ?>   
    <main>
        <h2>Quiz</h2>
        <section class="quiz-container">
            <form id="quiz-form">
                <!-- Pergunta 1 -->
                <div class="question">
                    <p>Qual estrutura de dados é usada para implementar uma fila?</p>
                    <label><input type="radio" name="resp1" value="Stack"> Stack </label><br>
                    <label><input type="radio" name="resp2" value="Queue"> Queue </label><br>
                    <label><input type="radio" name="resp3" value="List"> List </label><br>
                    <label><input type="radio" name="resp4" value="Tree"> Tree </label>
                </div>
                
                <button type="submit">Enviar</button>
            </form>
        </section>
    </main>
        <?php
            PageController::Rodape();
        ?> 
    <script>
        function switchPages(url){
            window.location.href = url
        }
    </script>
</body>
</html>