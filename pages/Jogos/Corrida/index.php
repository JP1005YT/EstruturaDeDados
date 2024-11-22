<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DataStruct School | Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="shortcut icon" href="../../../logo.png" />
</head>
<body>
    <img src="src/BACKgroud.png">
    <section class="mainMenu">
        <h2>Selecione a Fase</h2>
        <ul>
            <li onclick="iniciar(1)">1</li>
            <li onclick="iniciar(2)">2</li>
            <li onclick="iniciar(3)">3</li>
        </ul>
    </section>
    <section class="dialogos">
        <p id="writeTexteHere">teste</p>
    </section>
    <section class="instrucoes">
        <h2>Instruções</h2>
        <p>Para jogar, basta clicar no espaço. <br> Para ganhar basta chegar na porta , Não deixe o Bruno chegar em você Boa sorte!</p>
        <button onclick="iniciarJogo()">Começar</button>
    </section>
    <section class="jogo">
        <div class="enemy"></div>
        <div class="player"></div>
    </section>
    <script>
       let nivel
let fimdejogo = false
let jogoganho = false
const texto = {
    1: [
        'O Professor Bruno é um dos mestres mais respeitados (e temidos) da faculdade...',
        'Certo dia, durante uma aula, o professor Bruno avisa que está preparando uma matéria nova...',
        'O problema? Professor Bruno não vai deixar isso barato...'
    ],
    2: [
        'Joãozinho corre desesperado pelos corredores da faculdade, mas o professor Bruno está sempre um passo atrás...'
    ],
    3: [
        'Joãozinho está cansado, e o Bruno está despertando o Usain Bolt, será que você consegue fugir?'
    ]
}

function iniciar(fase) {
    nivel = fase;
    document.querySelector('.mainMenu').style.display = 'none';
    document.querySelector('.dialogos').classList.add('active');
    carregarDialogo(fase);
    mostrarInstrucoes();
}

function carregarDialogo(fase) {
    let frases = texto[fase];
    let elemento = document.getElementById('writeTexteHere');
    let fraseIndex = 0;
    let i = 0;
    elemento.innerText = '';

    function escreverLetraPorLetra() {
        if (i < frases[fraseIndex].length) {
            elemento.innerHTML += frases[fraseIndex].charAt(i) === ' ' ? '&nbsp;' : frases[fraseIndex].charAt(i);
            i++;
            setTimeout(escreverLetraPorLetra, 40);
        } else {
            fraseIndex++;
            if (fraseIndex < frases.length) {
                setTimeout(() => {
                    elemento.innerText = '';
                    i = 0;
                    escreverLetraPorLetra();
                }, 3000); // Aguarda 1 segundo antes de começar a próxima frase
            }
        }
    }
    escreverLetraPorLetra();
}

function mostrarInstrucoes() {
    document.querySelector('.instrucoes').classList.add('active');
}

function iniciarJogo() {
    document.querySelector('.dialogos').classList.remove('active');
    document.querySelector('.instrucoes').classList.remove('active');
    document.querySelector('.jogo').classList.add('active');

    setInterval(() => {
        if (!fimdejogo) {
            enemypos += Math.floor((5 * nivel) + (Math.random() * (40 * nivel)));
            document.querySelector('.enemy').style.left = enemypos + 'px';

            createTrail(document.querySelector('.enemy')); // Criar rastro para o inimigo

            if ((enemypos + 100) >= playerpos) {
                fimdejogo = true;
                alert("Você foi pego pelo professor Bruno! Tente novamente.");
                window.location.reload();
            }
        }
    }, 1000);
}

let enemypos = 0;
let playerpos = 150;
let playerWalking = false;
let block = false;

document.addEventListener('keydown', (event) => {
    if (event.keyCode === 32) {
        playerWalking = true;
        block = true;
    }
})

document.addEventListener('keyup', (event) => {
    if (event.keyCode === 32) {
        block = false;
    }
})

setInterval(() => {
    if (playerWalking && !block) {
        playerpos += 10;
        document.querySelector('.player').style.left = playerpos + 'px';
        createTrail(document.querySelector('.player')); // Criar rastro para o jogador

        playerWalking = false;
        if (playerpos >= window.innerWidth - 100) {
            jogoganho = true;
            alert("Parabéns! Você conseguiu fugir do professor Bruno!");
            switch (nivel) {
                case 1:
                    trocarPagina(50);
                    break;
                case 2:
                    trocarPagina(100);
                    break;
                case 3:
                    trocarPagina(300);
                    break;
            }
        }
    }
}, 100);

function createTrail(character) {
    const trail = document.createElement('div');
    trail.className = 'trail';

    // Posição do rastro baseada na posição do personagem
    const rect = character.getBoundingClientRect();
    trail.style.left = `${character.offsetLeft + 20}px`;  // Ajuste fino na posição do rastro
    trail.style.top = `${character.offsetTop + 20}px`;    // Ajuste para a altura do personagem

    // Adiciona o rastro ao jogo
    document.querySelector('.jogo').appendChild(trail);

    // Remove o rastro após a animação (1 segundo)
    setTimeout(() => {
        trail.remove();
    }, 1000);
}



function trocarPagina(money) {
    window.location.href = `./ganhar.php?money=${money}`;
}

    </script>
</body>
</html>