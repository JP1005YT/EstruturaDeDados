<?php
include_once __DIR__ . '/../classes/Usuario.php';

define('BASE_URL', '/EstruturaDeDados'); // Ajuste de acordo com a estrutura do seu projeto

 class PageController {
    public static function Cabecalho() {
        echo '
        <header class="mainHeader">
            <section class="logo">
                <img src="' . BASE_URL . '/logo.png" height="70px">
                <h1>DataStruct School</h1>
            </section>
            <nav>
                <ul class="nav-list">
                    <li><a href="' . BASE_URL . '/index.php">Página Principal</a></li>
                    <div class="dropdown">
                        <li onclick="dropdownAulas()">Aulas</li>
                        <div class="dropdown-content">';
                            $diretorio = __DIR__ . "/../../backend/temas/";

                            $itens = scandir($diretorio);

                            // Remove os itens '.' e '..' da lista
                            $itens = array_diff($itens, array('.', '..'));

                            // Se desejar, pode formatar a saída
                            echo "<ul>";
                            foreach ($itens as $item) {
                                $caminho = $diretorio . DIRECTORY_SEPARATOR . $item;
                                if (is_dir($caminho)) {
                                    echo "<a><li><a href='" . BASE_URL . "/pages/Aula/index.php?tema=" . $item . "'>" . $item . "</a></li>";
                                }
                            }
                            echo "</ul>";
                          echo '
                        </div>
                    </div>
                    <li><a href="' . BASE_URL . '/pages/Jogos/Quiz/index.php">Quiz</a></li> 
                    <li><a href="' . BASE_URL . '/pages/Jogos/Corrida/">Corrida</a></li> 
                    <li><a href="' . BASE_URL . '/pages/loja/index.php">Loja</a></li>                   
                    ';
    
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            echo '<li class="logged" onclick="dropdown()">
                    <section class="content">
                        ' . $user->getUsername() . '
                        <i class="bx bxs-chevron-down" id="icon"></i>
                    </section>
                    <div class="dropdown-logged">
                        <ul>
                            <li><a href="' . BASE_URL . '/pages/Perfil/index.php">Perfil</a></li>';
                            if($user->getEmail() == 'admin'){
                                echo '<li><a href="' . BASE_URL . '/pages/admin/index.php">Admin</a></li>';
                            }
                        echo '<li><a href="' . BASE_URL . '/pages/sair.php">Sair</a></li>
                        </ul>
                    </div>
                    </li>';
        } else {
            echo '<button class="btn cadastrar" onclick="switchPages(\'' . BASE_URL . '/pages/Cadastrar/\')">Cadastrar-se</button>
                    <button class="btn entrar" onclick="switchPages(\'' . BASE_URL . '/pages/Entrar/\')">Entrar</button>';
        }
        echo '</ul></nav></header>';
        echo ' <script defer>
            function dropdownAulas() {
                document.querySelector(".dropdown-content").classList.toggle("active")
            }
            function dropdown() {
                document.querySelector(".dropdown-logged").classList.toggle("active")
                document.querySelector("#icon").classList.toggle("active")
            }
            </script>';
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