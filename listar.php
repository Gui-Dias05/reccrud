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
    $buscar = isset($_POST['buscar']) ? $_POST['buscar'] : 1;
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
        <input type="text" name="procurar" id="procurar" size="25" value="<?php echo $procurar;?>">
        <br><br>
        <button name="acao" id="acao" type="submit">Procurar </button>
        <br><br>
</form>

<?php
 
    ?>

<div>
        <table>
            <thead>
                <tr>
                    <th scope="col"> | #ID | </th>
                    <th scope="col"> | Lado | </th>
                    <th scope="col"> | Cor | </th>
                    <th scope="col"> | Mostrar quadrado | </th>
                    <th scope="col"> | Editar | </th>
                    <th scope="col"> | Excluir | </th>

                </tr>
            </thead>
            <tbody>
            <?php
    
    $pdo = Conexao::getInstance(); 
    if($buscar == 1){
        $buscar = $pdo->query("SELECT * FROM quadrado
                                 WHERE id LIKE '$procurar%' 
                                 ORDER BY id");}

    else if($buscar == 2){
        $buscar = $pdo->query("SELECT * FROM quadrado
                                 WHERE lado LIKE '$procurar%' 
                                 ORDER BY lado");}

    else if($buscar == 3){
        $buscar = $pdo->query("SELECT * FROM quadrado
                                WHERE cor LIKE '$procurar%' 
                                ORDER BY id");}
    while ($linha = $buscar->fetch(PDO::FETCH_ASSOC)) { 

        $cor = str_replace("#","%23",$linha['cor']);

        ?>
                <tr>
                    <th scope="row"><?php echo $linha['id'];?></th>
                    <th scope="row"><?php echo $linha['lado'];?></th>
                    <td scope="row"><?php echo $linha['cor'];?></td>
                    <td scope="row"><a href="mostrar.php?lado=<?php echo $linha['lado'];?>&cor=<?php echo str_replace('#', '%23',  $linha['cor']);?>">Quadrado</a></td> 
                    <td><a href='index.php?acao=editar&id=<?php echo $linha['id'];?>'> <img src="img/editar.png" style="width: 1.8vw;"></a></td>
                    <td><?php echo " <a href=javascript:excluirRegistro('processa.php?acao=excluir&id={$linha['id']}')>";?><img src="img/excluir.png" style="width: 1.5vw;"></a></td>
                    
                </tr>
            <?php } ?> 
            
            </tbody>
        </table>
    </div>
    <button><a href='index.php'>Voltar</a> </button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    
</body>
</html>