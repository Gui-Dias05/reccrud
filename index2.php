
<!DOCTYPE html>
<?php
    $title = "Usuário";
    $nome = isset($_POST['nome']) ? $_POST['nome'] : 0;
    $user = isset($_POST['user']) ? $_POST['user'] : "";
    $senha = isset($_POST['senha']) ? $_POST['senha'] : 0;

    include_once "processa2.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $dados;
    if ($acao == 'editar'){
        $idusuario = isset($_GET['idusuario']) ? $_GET['idusuario'] : "";
    if ($idusuario > 0)
        $dados = buscarDados($idusuario);
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
        <h3>Insira seus dados</h3><hr>
            <form method="post" action="processa2.php">

            <input readonly type="hidden" name="idusuario" idusuario="idusuario" value="<?php if ($acao == "editar") echo $dados['idusuario']; 
            else echo 0; ?>">
                
            <p>Nome:</p>
                <input require="true" type="text" name="nome" idusuario="nome" placeholder="Insira seu nome" 
                value="<?php if ($acao == "editar") echo $dados['nome'];?>"><br>

            <p>Login:</p>
                <input required="true" name="user" id="user" type="text" required="true" placeholder="Digite o login" 
                value="<?php if ($acao == "editar") echo $dados['user'];?>" ><br>    
            
            <p>Senha:</p>
                <input required="true" name="senha" id="senha" type="text" required="true" placeholder="Digite a senha" 
                value="<?php if ($acao == "editar") echo $dados['senha'];?>" ><br>    
            <br>
            <hr>
            <br>
                <button name="acao" value="salvar" id="acao" type="submit">Salvar</button>
            </form>
            <br> 
</body>
</html>