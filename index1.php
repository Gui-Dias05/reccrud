<!DOCTYPE html>
<?php
    $title = "Tabuleiro";
    $lado = isset($_POST['lado']) ? $_POST['lado'] : 0;
    $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
    //var_dump($dados);
    include_once "processa1.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $dados;
    if ($acao == 'editar'){
        $idtabuleiro = isset($_GET['idtabuleiro']) ? $_GET['idtabuleiro'] : "";
    if ($idtabuleiro > 0)
        $dados = buscarDados($idtabuleiro);
        //var_dump($dados);
    }
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    </style>
</head>
<body>
    <br>
        <h3>Insira os dados do Tabuleiro</h3><hr>
            <form method="post" action="processa1.php">

            <input readonly type="hidden" name="idtabuleiro" id="idtabuleiro" value="<?php if ($acao == "editar") echo $dados['idtabuleiro']; 
            else echo 0; ?>">
                
            <p>Lado:</p>
                <input require="true" type="text" name="lado" id="lado" placeholder="Digite o tamanho do lado" 
                value="<?php if ($acao == "editar") echo $dados['lado'];?>"><br>

            <br>
            <hr>
            <br>
                <button name="acao" value="salvar" id="acao" type="submit">Salvar</button>
            </form>
            <br> 
</body>
</html>