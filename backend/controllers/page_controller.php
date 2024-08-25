<?php
 class PageController {
    public static function Cabecalho() {
        echo '
        <header class="mainHeader">
            <section class="logo">
                <img src="logo.png" height="70px">
                <h1>DataStruct School</h1>
            </section>
            <nav>
                <ul class="nav-list">
                    <li><a href="./index.php">Página Principal</a></li>
                    <li><a href="./pages/Temas/">Aulas</a></li>
                    <li><a href="./pages/Jogos/Quiz/index.php">Quiz</a></li>';

        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            echo '<li class="logged" onclick="dropdown()">
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
                </li>';
        } else {
            echo '<button class="btn cadastrar" onclick="switchPages(\'./pages/Cadastrar/\')">Cadastrar-se</button>
                    <button class="btn entrar" onclick="switchPages(\'./pages/Entrar/\')">Entrar</button>';
        }
        echo '</ul></nav></header>';
    }

    public static function Rodape() {
        echo '<footer>
        <a href="#" class="title"><i class="bx bxs-smile"></i>DataStruct School</a>
        <section class="footer-content">
            <section class="footer-section">
                <h3>Descubra mais sobre nós</h3>
                <ul>
                    <li><a href="#sobre-nos">Sobre nós</a></li>
                    <li><a href="#">Oportunidades de carreira</a></li>
                    <li><a href="#">Materiais de imprensa</a></li>
                    <li><a href="#">Opções de assinatura</a></li>
                </ul>
            </section>
            <section class="footer-section">
                <h3>Obtenha suporte</h3>
                <ul>
                    <li><a href="#">Assistência para usuários</a></li>
                    <li><a href="#">Perguntas frequentes</a></li>
                    <li><a href="#">Precisa de ajuda?</a></li>
                </ul>
            </section>
            <section class="footer-section">
                <h3>Torne-se parte da nossa comunidade</h3>
                <ul>
                    <li><a href="#">Conecte-se conosco</a></li>
                    <li><a href="#">Siga-nos no Instagram</a></li>
                    <li><a href="#">Junte-se à conversa</a></li>
                    <li><a href="#">Entre no nosso servidor do Discord</a></li>
                </ul>
            </section>
        </section>
        <section class="footer-bottom">
            <p>&copy; 2024 DataStruct School. Todos os direitos reservados.</p>
        </section>
    </footer>';
    }
}
?>