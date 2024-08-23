<?php
function cabecalho() {
    echo '
    <header class="mainHeader">
        <section class="logo">
            <img src="logo.png" height="70px">
            <h1>DataStruct School</h1>
        </section>
        <nav>
            <ul>
                <li><a href="./index.php">Página Principal</a></li>
                <li><a href="./pages/Temas/">Aulas</a></li>
                <li><a href="./pages/Jogos/Quiz/index.php">Quiz</a></li>
            </ul>
        </nav>';

    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        echo '<section class="logged" onclick="dropdown()">
                <section class="content">
                    ' . htmlspecialchars($user->getUsername()) . '
                    <i class="bx bxs-chevron-down" id="icon"></i>
                </section>
                <div class="dropdown">
                    <ul>
                        <li><a href="./pages/Perfil/index.php">Perfil</a></li>
                        <li><a href="./backend/functions/sair.php">Sair</a></li>
                    </ul>
                </div>
            </section>';
    } else {
        echo '<section>
                <button class="cadastrar" onclick="switchPages(\'./pages/Cadastrar/\')">Cadastrar-se</button>
                <button class="entrar" onclick="switchPages(\'./pages/Entrar/\')">Entrar</button>
            </section>';
    }
    echo '</header>';
}
?>