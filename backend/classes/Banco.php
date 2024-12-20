<?php

class Banco
{   
    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "datastruct");
        if (mysqli_connect_errno()) {
            echo "Falha na conexão com o MySQL: " . mysqli_connect_error();
            exit();
        }
    }

    public function getQuizPerguntasByNivel($nivel) {
        $stmt = $this->conn->prepare("SELECT * FROM quiz_perguntas WHERE nivel = ?");
        $stmt->bind_param("i", $nivel); // Alterado para "i" para inteiros
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getQuizRespostaById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM quiz_respostas WHERE idquiz = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Método genérico para executar queries SQL
    private function executeQuery($query)
    {
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            die("Erro na consulta: " . mysqli_error($this->conn));
        }
        return $result;
    }

    // Método para fechar a conexão
    public function close()
    {
        mysqli_close($this->conn);
    }

    // Métodos CRUD para a tabela `item`

    public function getItems()
    {
        $query = "SELECT * FROM item";
        return $this->executeQuery($query);
    }

    public function getItemById($id)
    {
        $id = mysqli_real_escape_string($this->conn, $id);
        $query = "SELECT * FROM item WHERE iditem = '$id'";
        return $this->executeQuery($query);
    }

    public function insertItem($src, $categoria, $valor, $nome)
    {
        $src = mysqli_real_escape_string($this->conn, $src);
        $categoria = mysqli_real_escape_string($this->conn, $categoria);
        $valor = mysqli_real_escape_string($this->conn, $valor);
        $nome = mysqli_real_escape_string($this->conn, $nome);
        $query = "INSERT INTO item (src_item, categoria_item, valor_item, nome_item) VALUES ('$src', '$categoria', $valor, '$nome')";
        return $this->executeQuery($query);
    }

    public function updateItem($id, $src, $categoria, $valor, $nome)
    {
        $id = mysqli_real_escape_string($this->conn, $id);
        $src = mysqli_real_escape_string($this->conn, $src);
        $categoria = mysqli_real_escape_string($this->conn, $categoria);
        $valor = mysqli_real_escape_string($this->conn, $valor);
        $nome = mysqli_real_escape_string($this->conn, $nome);
        $query = "UPDATE item SET src_item = '$src', categoria_item = '$categoria', valor_item = $valor, nome_item = '$nome' WHERE iditem = '$id'";
        return $this->executeQuery($query);
    }

    public function deleteItem($id)
    {
        $id = mysqli_real_escape_string($this->conn, $id);
        $query = "DELETE FROM item WHERE iditem = '$id'";
        return $this->executeQuery($query);
    }

    // Métodos CRUD para a tabela `quiz_perguntas`

    public function getQuizPerguntas()
    {
        $query = "SELECT * FROM quiz_perguntas";
        return $this->executeQuery($query);
    }

    public function getQuizPerguntaById($id)
    {
        $id = mysqli_real_escape_string($this->conn, $id);
        $query = "SELECT * FROM quiz_perguntas WHERE idpergunta = '$id'";
        return $this->executeQuery($query);
    }

    // Métodos CRUD para a tabela `quiz_respostas`

    public function getQuizRespostas()
    {
        $query = "SELECT * FROM quiz_respostas";
        return $this->executeQuery($query);
    }

    // Métodos CRUD para a tabela `usuario`

    public function getUsuarios()
    {
        $query = "SELECT * FROM usuario";
        return $this->executeQuery($query);
    }

    public function getUsuarioById($id)
    {
        $id = mysqli_real_escape_string($this->conn, $id);
        $query = "SELECT * FROM usuario WHERE idusuario = '$id'";
        return $this->executeQuery($query);
    }

    public function getUsuarioByEmail($email){
        $email = mysqli_real_escape_string($this->conn, $email);
        $query = "SELECT * FROM usuario WHERE email_usuario = '$email'";
        return $this->executeQuery($query)->fetch_assoc();
    }
    public function insertUsuario($nickname, $nome, $email, $senha){
        $nickname = mysqli_real_escape_string($this->conn, $nickname);
        $coins = mysqli_real_escape_string($this->conn, 0);
        $nome = mysqli_real_escape_string($this->conn, $nome);
        $email = mysqli_real_escape_string($this->conn, $email);
        $senha = mysqli_real_escape_string($this->conn, $senha);
        $query = "INSERT INTO usuario (nickname_usuario, coins_usuario, nome_usuario, email_usuario, senha_usuario) VALUES ('$nickname', $coins, '$nome', '$email', '$senha')";
        return $this->executeQuery($query);
    }

    public function updateUsuario($id, $nickname, $coins, $nome, $email, $senha)
    {
        $id = mysqli_real_escape_string($this->conn, $id);
        $nickname = mysqli_real_escape_string($this->conn, $nickname);
        $coins = mysqli_real_escape_string($this->conn, $coins);
        $nome = mysqli_real_escape_string($this->conn, $nome);
        $email = mysqli_real_escape_string($this->conn, $email);
        $senha = mysqli_real_escape_string($this->conn, $senha);
        $query = "UPDATE usuario SET nickname_usuario = '$nickname', coins_usuario = $coins, nome_usuario = '$nome', email_usuario = '$email', senha_usuario = '$senha' WHERE idusuario = '$id'";
        return $this->executeQuery($query);
    }
    public function updateUsuarioCoins($id, $coins)
    {
        $id = mysqli_real_escape_string($this->conn, $id);
        $coins = mysqli_real_escape_string($this->conn, $coins);
        $query = "UPDATE usuario SET coins_usuario = $coins WHERE idusuario = '$id'";
        return $this->executeQuery($query);
    }

    public function deleteUsuario($id)
    {
        $id = mysqli_real_escape_string($this->conn, $id);
        $query = "DELETE FROM usuario WHERE idusuario = '$id'";
        return $this->executeQuery($query);
    }

    public function updateSenhabyEmail($senha,$email){
        $senha = mysqli_real_escape_string($this->conn, $senha);
        $email = mysqli_real_escape_string($this->conn, $email);

        $query = "UPDATE usuario SET senha_usuario = '$senha' WHERE email_usuario = '$email'";
        return $this->executeQuery($query);
    }

    // Métodos CRUD para a tabela `usuario_has_item`

    public function getUsuarioHasItem()
    {
        $query = "SELECT * FROM usuario_has_item";
        return $this->executeQuery($query);
    }

    public function getUsuarioHasItemById($userId)
    {
        $userId = mysqli_real_escape_string($this->conn, $userId);
        $query = "SELECT * FROM usuario_has_item WHERE usuario_idusuario = '$userId'";
        return $this->executeQuery($query);
    }

    public function insertUsuarioHasItem($userId, $itemId, $ativo)
    {
        $userId = mysqli_real_escape_string($this->conn, $userId);
        $itemId = mysqli_real_escape_string($this->conn, $itemId);
        $ativo = mysqli_real_escape_string($this->conn, $ativo);
        $query = "INSERT INTO usuario_has_item (usuario_idusuario, item_iditem, ativo_item) VALUES ($userId, $itemId, $ativo)";
        return $this->executeQuery($query);
    }

    public function updateUsuarioHasItem($userId, $itemId, $ativo)
    {
        $userId = mysqli_real_escape_string($this->conn, $userId);
        $itemId = mysqli_real_escape_string($this->conn, $itemId);
        $ativo = mysqli_real_escape_string($this->conn, $ativo);
        $query = "UPDATE usuario_has_item SET ativo_item = $ativo WHERE usuario_idusuario = '$userId' AND item_iditem = '$itemId'";
        return $this->executeQuery($query);
    }

    public function deleteUsuarioHasItem($userId, $itemId)
    {
        $userId = mysqli_real_escape_string($this->conn, $userId);
        $itemId = mysqli_real_escape_string($this->conn, $itemId);
        $query = "DELETE FROM usuario_has_item WHERE usuario_idusuario = '$userId' AND item_iditem = '$itemId'";
        return $this->executeQuery($query);
    }
}

?>
