<!DOCTYPE html>
<?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    include_once "processa.php";
    $lado = isset($_POST['lado']) ? $_POST['lado'] : 0;
    $cor = isset($_POST['cor']) ? $_POST['cor'] : "";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    
    $dados;
    if ($acao == 'editar'){
        $id = isset($_GET['id']) ? $_GET['id'] : "";
    if ($id > 0)
        $dados = buscarDados($id);
    }

    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $buscar = isset($_POST['buscar']) ? $_POST['buscar'] : 0;
?>
<html>
<head>
    <meta charset="UTF-8">
    <script>
        function excluirRegistro(url){
            if (confirm("Confirma Exclusão?"))
                location.href = url;
        }
    </script>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    </style>
</head>
<body class="">

<form method="post">
        <input type="radio" name="buscar" value="1" <?php if ($buscar == "1") echo "checked" ?>> Id<br>
        <input type="radio" name="buscar" value="2" <?php if ($buscar == "2") echo "checked" ?>> lado<br>
        <input type="radio" name="buscar" value="3" <?php if ($buscar == "3") echo "checked" ?>> Cor<br>
            <h3>Procurar Quadrado:</h3>
        <input type="text" name="procurar" id="procurar"  value="<?php echo $procurar;?>">
                <br><br>
        <button name="acao" id="acao" type="submit">Procurar</button>
        <br><br>
    </form>
        <div>
            <table>
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Lado</th>
                        <th scope="col">Cor</th>
                        <th scope="col">Mostrar</th>
                        <th scope="col">Alterar</th>
                        <th scope="col">Deletar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $quad = new quadrado("","", "");
                    $lista = $quad->listar($buscar, $procurar);
                    foreach ($lista as $linha) { 
                ?>
                    <tr>
                        <th scope="row"><?php echo $linha['id'];?></th>
                        <th scope="row"><?php echo $linha['lado'];?></th>
                        <td scope="row"><?php echo $linha['cor'];?></td>
                        <td scope="row"><a href="mostrar.php?id=<?php echo $linha['id']; ?>&lado=<?php echo $linha['lado'];?>&cor=<?php echo str_replace('#', '%23', $linha['cor']);?>">Quadrado</a></td>
                        <td scope="row"><a href="index.php?acao=editar&id=<?php echo $linha['id'];?>">Alterar</a></td>
                        <td><?php echo " <a href=javascript:excluirRegistro('processa.php?acao=excluir&id={$linha['id']}')>Excluir</a><br>";?></td>
                    </tr>
                <?php } ?> 
                </tbody>
            </table>
        </div>
    <button><a href='index.php'>Voltar</a> </button>

</body>
</html>