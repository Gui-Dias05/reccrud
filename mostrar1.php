<?php   
   require_once "classe/ClassTabuleiro.php";
   $title = "Recuperação";
   $lado = isset($_GET["lado"]) ? $_GET["lado"] : 10;
?>
<html>
<head>
    <style>
        div{
            background: white;
            width: <?php echo $lado;?>px;
            height: <?php echo $lado;?>px;
            border: 1px solid;
        }
    </style>
    <meta charset="UTF-8">
        <title> <?php echo $title; ?> </title>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
    <body class="">
    <button><a href="listar1.php">voltar</a></button><br>
<?php
    
    
    $quad = new tabuleiro("", $lado);
        echo $quad;
    ?>
        <br><br>

        <div></div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    
    </body>
</html>