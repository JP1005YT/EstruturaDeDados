<?php

class Usuario {
    private $nickUser;
    private $nameUser;
    private $emailUser;
    private $senhaUser;
    private $adquiredItemsUser;
    private $equippedItemsUser;



    // Construtor
    public function __construct( $nickUser, $nameUser, $emailUser, $senhaUser) {
        $this->$emailUser = $emailUser;
        $this->$nameUser = $nameUser;
        $this->$nickUser = $nickUser;
        $this->$senhaUser = password_hash($senhaUser, PASSWORD_DEFAULT); // Hash da senha
    }

    // Métodos Getters
    public function getUsername() {
        return $this->nickUser;
    }

    public function getName() {
        return $this->nameUser;
    }

    public function getEmail() {
        return $this->emailUser;
    }

    // Método para verificar a senha
    public function verificarSenha($senha) {
        return password_verify($senha, $this->senhaUser);
    }
}

?>
