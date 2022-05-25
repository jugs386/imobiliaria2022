<?php

require_once 'Banco.php';
require_once './Conexao.php';

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
        $this->senha = md5($senha);
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
        if($conn = $conexao->getConection()){
            if($this->id > 0){
                //alteração
                $sql = "update usuario set login = :login, senha = :senha, permissao = :permissao where id = :id";
                $stmt = $conn->prepare($sql);
                if($stmt->execute(array(':login' => $this->login, ':senha'=> $this->senha, ':permissao'=> $this->permissao, ':id'=> $this->id))){
                    $result = $stmt->rowCount();
                }

            }else{
                //inserção
                $sql = "insert into usuario values (null, :login, :senha, :permissao)";
                $stmt = $conn->prepare($sql);
                if($stmt->execute(array(':login'=> $this->login, 
                                        ':senha'=> $this->senha, 
                                        ':permissao'=> $this->permissao 
                                        ))){
                                            $result = $stmt->rowCount();
                                        }
            }
        }
        return $result;
    }

    public function remove($id){
        $result = false;
        $conexao = new Conexao();
        $conn = $conexao->getConection();
        $query = "delete from usuario where id = :id";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id' => $id))){
            $result = true;
        }
        return $result;

    }

    public function find($id){
        $conexao = new Conexao();
        $conn = $conexao->getConection();
        $query = "select * from usuario where id = :id";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id'=> $id))){
            if($stmt->rowCount() > 0 ){
                $result = $stmt->fetchObject(Usuario::class);
            }else{
                $result = false;
            }
        }

        return $result;

    }

    public function count(){

    }

    public function listAll(){
         //cria um objeto do tipo conexao
         $conexao = new Conexao();
         //cria a conexao com o banco de dados
         $conn = $conexao->getConection();
         //cria query de seleção
         $query = "SELECT * FROM usuario";
         //Prepara a query para execução
         $stmt = $conn->prepare($query);
         //Cria um array para receber o resultado da seleção
         $result = array();
         //executa a query
         if ($stmt->execute()) {
             //o resultado da busca será retornado como um objeto da classe
             while ($rs = $stmt->fetchObject(Usuario::class)) {
                 //armazena esse objeto em uma posição do vetor
                 $result[] = $rs;
             }
         }else{
             $result = false;
         }
 
         return $result;
    }


    public function logar(){
        $result = false;
        $conexao = new Conexao();
        $conn = $conexao->getConection();

        $query = "select * from usuario where login = :login and senha = :senha";

        $stmt = $conn->prepare($query);

        if($stmt->execute(array(':login'=>$this->login,':senha'=>$this->senha))){
            if($stmt->rowCount() > 0){
                $result = true;
            }
        }

        return $result;
    }


}



?>