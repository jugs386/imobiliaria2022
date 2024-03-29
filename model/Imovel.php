<?php

require_once 'Banco.php';
require_once 'Conexao.php';

class Imovel extends Banco{

    private $id;
    private $descricao;
    private $foto;
    private $valor;
    private $tipo;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function getDescricao()
    {
        return $this->descricao;
    }


    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function save(){


        $result = false;
        $conexao = new Conexao();
        if($conn = $conexao->getConection()){
            if($this->id > 0){
                //alteração
                $sql = "update imovel set descricao = :descricao, foto = :foto, valor = :valor, tipo = :tipo where id = :id";
                $stmt = $conn->prepare($sql);
                if($stmt->execute(array(':descricao' => $this->descricao, ':foto' => $this->foto, ':valor' => $this->valor, ':tipo' => $this->tipo, ':id'=> $this->id))){
                    $result = $stmt->rowCount();
                }

            }else{
                //inserção
                $sql = "insert into imovel values (null, :descricao, :foto, :valor, :tipo)";
                    $stmt = $conn->prepare($sql);
                    if($stmt->execute(array(':descricao'=> $this->descricao, 
                                    ':foto'=> $this->foto, 
                                    ':valor'=> $this->valor,
                                    ':tipo'=> $this->tipo
                                     ))){
                                         $result = $stmt->rowCount();
                                     }

        }
        return $result;
    }
}

    public function remove($id){
        $result = false;
        $conexao = new Conexao();
        $conn = $conexao->getConection();
        $query = "delete from imovel where id = :id";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id' => $id))){
            $result = true;
        }
        return $result;
    }

    public function find($id){
        $conexao = new Conexao();
        $conn = $conexao->getConection();
        $query = "select * from imovel where id = :id";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id'=> $id))){
            if($stmt->rowCount() > 0 ){
                $result = $stmt->fetchObject(Imovel::class);
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
        $query = "SELECT * FROM imovel";
        //Prepara a query para execução
        $stmt = $conn->prepare($query);
        //Cria um array para receber o resultado da seleção
        $result = array();
        //executa a query
        if ($stmt->execute()) {
            //o resultado da busca será retornado como um objeto da classe
            while ($rs = $stmt->fetchObject(Imovel::class)) {
                //armazena esse objeto em uma posição do vetor
                $result[] = $rs;
            }
        }else{
            $result = false;
        }

        return $result;
    }


}

?>