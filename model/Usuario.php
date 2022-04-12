<?php

require_once 'Banco.php';
require_once '../Conexao.php';

class Usuario extends Banco{

    private $id;
    private $login;
    private $senha;
    private $permissao;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;

    }
    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getPermissao()
    {
        return $this->permissao;
    }

    public function setPermissao($permissao)
    {
        $this->permissao = $permissao;
    }

    public function save(){

        $result = false;
        $conexao = new Conexao();

        $sql = "insert into usuario values (null, :login, :senha, :permissao)";
        if($conn = $conexao->getConection()){
            $stmt = $conn->prepare($sql);
            if($stmt->execute(array(':login'=> $this->login, 
                                    ':senha'=> $this->senha, 
                                    ':permissao'=> $this->permissao 
                                     ))){
                                         $result = $stmt->rowCount();
                                     }
        }
        return $result;
    }

    public function remove($id){

    }

    public function find($id){

    }

    public function count(){

    }

    public function listAll(){

    }



}

?>