<!DOCTYPE html>
<?php
    $title = "Quadrado";
    $lado = isset($_POST['lado']) ? $_POST['lado'] : 0;
    $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
    $tabuleiro_idtabuleiro = isset($_POST['tabuleiro_idtabuleiro']) ? $_POST['tabuleiro_idtabuleiro'] : 0;

    include_once "processa.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $dados;
    if ($acao == 'editar'){
        $idquadrado = isset($_GET['idquadrado']) ? $_GET['idquadrado'] : "";
    if ($idquadrado > 0)
        $dados = buscarDados($idquadrado);
}
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
</head>

<body>
    <br>
        <h3>Insira os dados do Quadrado</h3><hr>
            <form method="post" action="processa.php">

            <input readonly type="hidden" name="idquadrado" idquadrado="idquadrado" value="<?php if ($acao == "editar") echo $dados['idquadrado']; 
            else echo 0; ?>">
                
            <p>Lado:</p>
                <input require="true" type="text" name="lado" id="lado" placeholder="Digite o tamanho do lado" 
                value="<?php if ($acao == "editar") echo $dados['lado'];?>"><br>

            <p>Cor:</p>
                <input required="true" name="cor" id="cor" type="color" required="true" placeholder="Digite a cor" 
                value="<?php if ($acao == "editar") echo $dados['cor'];?>" ><br>    
            
            <p>Tabuleiro: </p>
            <select name="tabuleiro_idtabuleiro"  id="tabuleiro_idtabuleiro">
                <?php
                require_once "select.php";
                echo lista_tabuleiro(0);
                ?>
            </select>
            <br>
            <hr>
            <br>
                <button name="acao" value="salvar" id="acao" type="submit">Salvar</button>
            </form>
            <br> 
</body>
</html>