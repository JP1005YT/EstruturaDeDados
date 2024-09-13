<?php
    include_once './backend/classes/Usuario.php';
    include_once './backend/controllers/page_controller.php';
    session_start();

    spl_autoload_register(function ($class_name) {
        include './backend/classes/' . $class_name . '.php';
    });
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolha de Personagem</title>
    <link rel="stylesheet" href="persona.css">
</head>
<body>
    <div class="character-selector">
        <div class="character-display">
            <img id="persona-corpo" src="corpo/corpo1.png" alt="Corpo">
            <img id="persona-cabelo" src="cabelo/cabelo1.png" alt="Cabelo">
            <img id="persona-rosto" src="rosto/rosto1.png" alt="Rosto">
            <img id="persona-calca" src="calça/calca1.png" alt="Calça">
            <!-- <img id="persona-especial" src="especial.png" alt="Especial"> -->
        </div>
    </div>
</body>
