<!DOCTYPE html>
<?php
    include_once "processa1.php";
    require_once "classe/ClassTabuleiro.php";
    $idtabuleiro = isset($_GET['idtabuleiro']) ? $_GET['idtabuleiro'] : "";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    //var_dump($dados);
    if ($acao == 'editar'){
       $tab = new Tabuleiro($idtabuleiro, 1);
       $lista = $tab->listar("", $idtabuleiro);
       $tab->setLado($lista[0]['lado']);

}
    $title = "Cadastro de Tabuleiro";
    //var_dump($dados);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    </style>
</head>
<body class="">
<?php
    
    
    ?>

    <form action="processa1.php" method="post">
        <input readonly type="hidden" name="idtabuleiro" idtabuleiro="idtabuleiro" value="<?php if ($acao == "editar") echo $dados['idtabuleiro']; else echo 0; ?>">
       <p>Lado:</p>
                <input require="true" type="text" name="lado" idtabuleiro="lado" placeholder="Digite o tamanho do lado" 
                value="<?php if ($acao == "editar") echo $dados['lado'];?>"><br>

       <button type="submit" name="acao" id="acao" value="salvar">Salvar</button>
    </form><br>

    <button><a href='listar1.php'>Listar</a> </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    
</body>
</html>