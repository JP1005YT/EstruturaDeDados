<?php

class Usuario {
    // Propriedades
    private $username;
    private $name;
    private $cargo;
    private $email;
    private $senha;

    // Construtor
    public function __construct($username, $name, $cargo, $email, $senha) {
        $this->username = $username;
        $this->name = $name;
        $this->cargo = $cargo;
        $this->email = $email;
        $this->senha = password_hash($senha, PASSWORD_DEFAULT); // Hash da senha
    }

    // Métodos Getters
    public function getUsername() {
        return $this->username;
    }

    public function getName() {
        return $this->name;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function getEmail() {
        return $this->email;
    }

    // Método para verificar a senha
    public function verificarSenha($senha) {
        return password_verify($senha, $this->senha);
    }

    // Método para imprimir os detalhes do usuário
    public function imprimirDetalhes() {
        echo "Username: " . $this->username . "<br>";
        echo "Name: " . $this->name . "<br>";
        echo "Cargo: " . $this->cargo . "<br>";
        echo "Email: " . $this->email . "<br>";
    }
}

?>
