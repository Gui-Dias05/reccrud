<?php
require_once "conf/Conexao.php";
class Quadrado{
    private $id;
    private $lado;
    private $cor; 
    public function __construct($id, $lado, $cor){ 
        $this->setId  ($id);
        $this->setLado  ($lado);
        $this->setCor ($cor);
    }
    public function getId(){ return $this->id; }
    public function setId($id){ $this->id = $id;}
    public function getLado() {return $this->lado;}
    public function getCor() {return $this->cor;}
    public function setLado($lado){if ($lado >  0)$this->lado = $lado;}
    public function setCor($cor){if (strlen($cor) > 0)$this->cor = $cor;}

    public function Area(){
        $area = $this->lado * $this->lado;
        return $area;

    }
    public function Perimetro(){
        $perimetro = $this->lado + $this->lado+ $this->lado + $this->lado;
        return $perimetro;
     
    }
    public function Diagonal(){
        $diagonal = $this->lado * 1.44;
        return $diagonal;
    }

    public function __toString(){
        return  "[Quadrado]<br>Lado: ".$this->getLado()."<br>".
        "Cor: ".$this->getCor()."<br>".
        "Area: ".$this->Area()."<br>".
        "Perimetro: ".$this->Perimetro()."<br>".
        "Diagonal: ".$this->Diagonal()."<br>";
    }

    public function salvar(){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('INSERT INTO quadrado (lado,cor) VALUES(:lado, :cor)');
        $stmt->bindValue(':lado', $this->getLado());
        $stmt->bindValue(':cor', $this->getCor());
        return $stmt->execute();

    }

    function excluir($id){
        $pdo = Conexao::getInstance();
        $stmt = $pdo ->prepare('DELETE FROM quadrado WHERE id = :id');
        $stmt->bindValue(':id', $id);
                
    return $stmt->execute();
    
    }

    public function editar(){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE quadrado SET lado = :lado, cor = :cor
        WHERE id = :id');
    
        $stmt->bindValue(':id', $this->getId());
        $stmt->bindValue(':lado', $this->getLado());
        $stmt->bindValue(':cor', $this->getCor());
    
        return $stmt->execute();
    }
        
        }



?>