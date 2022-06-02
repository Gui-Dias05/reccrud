<?php   
 include_once "conf/default.inc.php";
 require_once "conf/Conexao.php";
 require_once "classe/ClassQuadrado.php"; 

 $acao = "";
 if(isset($_POST['acao'])){$acao = $_POST['acao'];}else if(isset($_GET['acao'])){$acao = $_GET['acao'];}   

   $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
   if ($acao == "excluir"){
       $idquadrado = isset($_GET['idquadrado']) ? $_GET['idquadrado'] : 0;
       $quad = new Quadrado("", "", "", "");
       $resultado = $quad->excluir($idquadrado);
       header("location:listar.php");
   }
   $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $idquadrado = isset($_POST['idquadrado']) ? $_POST['idquadrado'] : "";
        if ($idquadrado == 0){
            $quad = new Quadrado("", $_POST['lado'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);      
            $resultado = $quad->salvar();
            header("location:listar.php");
        }else {
            $quad = new Quadrado($_POST['idquadrado'], $_POST['lado'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);
            $resultado = $quad->editar();
            header("location:listar.php");    
        }    
    }     

    
    function buscarDados($idquadrado){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM quadrado WHERE idquadrado = $idquadrado");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['idquadrado'] = $linha['idquadrado'];
            $dados['lado'] = $linha['lado'];
            $dados['cor'] = $linha['cor'];
            $dados['tabuleiro_idtabuleiro'] = $linha['tabuleiro_idtabuleiro'];
        }   
        return $dados;
    }
?>
