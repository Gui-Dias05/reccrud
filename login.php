<!DOCTYPE html>
<?php
    require_once "classe/ClassUsuario.php";

    $command = isset($_GET['command']) ? $_GET['command'] : "";
    $user = isset($_POST['user']) ? $_POST['user'] : "";
    $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>user</title>
</head>
<body>
    <header>
        <?php include_once "menu.php"; ?>
    </header>
    <content>
        <a href='listar2.php'></a><br><hr>
        <form action="listar2.php?command=user" method="post" id="form" style="padding-left: 5vw; padding-right: 5vw;">
            <h1>user</h1>
            <div class="form-group">
                <label for="">Usuário:</label>
                <input required type="text" class="form-control" name="user" id="user" placeholder="Digite o user" value="<?php if (isset($_POST['user'])){echo $_POST['user'];}?>">
            </div>
            <div class="form-group">
                <label for="">Senha:</label>
                <input required type="password" class="form-control" name="senha" id="senha" placeholder="Digite o senha" value="<?php if (isset($_POST['senha'])){echo $_POST['senha'];}?>">
            </div>
            <br>
            <button type="submit" class="btn btn-dark" name="submit" id="submit" value="true">Enviar</button>
        </form>
        <hr>
        <h1>
        <?php
            if(isset($_SESSION['nome'])) {
                echo "Logado no sistema!";
            } else if(isset($_GET['user']) && !isset($_SESSION['nome'])) {
                echo "Informações incorretas!";
            }
        ?>
        </h1>
    </content>
</body>
</html>
<?php 
    if($command == "user") {
        try{
            $usua = new Usuario('', '', '', '');
            $usua->efetuarlogin("$user", "$senha");
            header("location:listar2.php?user=true");
        } catch(Exception $e) {
            echo "<h1>Erro ao logar as informações.</h1><br> Erro:".$e->getMessage();
        }
    } else if($command == "logout") {
        $_SESSION["nome"] = null;
        header("location:user.php");
    }
?>