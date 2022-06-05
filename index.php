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
    <?php include_once "menu.php"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title><?php echo $title ?></title>
</head>

<body style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;" style="background-color: #f5f5dc; ">
        <h3>Insira os dados do Quadrado</h3><hr>
            <form method="post" action="processa.php">

            <input readonly type="hidden" name="idquadrado" idquadrado="idquadrado" value="<?php if ($acao == "editar") echo $dados['idquadrado']; 
            else echo 0; ?>">
                
            <h5>Lado:</h5>
                <input require="true" type="text" name="lado" id="lado" placeholder="Digite o tamanho do lado" 
                value="<?php if ($acao == "editar") echo $dados['lado'];?>"><br>

            <h5>Cor:</h5>
                <input required="true" name="cor" id="cor" type="color" required="true" placeholder="Digite a cor" 
                value="<?php if ($acao == "editar") echo $dados['cor'];?>" ><br>    
            
            <h5>Tabuleiro: </h5> 
            <select name="tabuleiro_idtabuleiro"  id="tabuleiro_idtabuleiro">
                <?php
                require_once "select.php";
                echo lista_tabuleiro(0);
                ?>
            </select>
            <br>
            <hr>
            <br>
                <button class="btn btn-dark" name="acao" value="salvar" id="acao" type="submit">Salvar</button>
            </form>
            <br> 
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        
        <style>
        a, a:hover {
            color: white;
            text-decoration: none;
        }
        body{
            background-color: #d3d3d3;
        }
        </style>

</body>
</html>