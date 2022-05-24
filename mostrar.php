<?php   
   require_once "classe/ClassQuadrado.php";
   $title = "Recuperação";
   $lado = isset($_GET["lado"]) ? $_GET["lado"] : 10;
   $cor = isset($_GET["cor"]) ? $_GET["cor"] : "Verde";
?>
<html>
<head>
    <style>
        div{
            background: <?php echo $cor;?>;
            width: <?php echo $lado;?>px;
            height: <?php echo $lado;?>px;
            border: 1px solid;
        }
    </style>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    </style>
</head>
<body class="">
    <button><a href="listar.php">voltar</a></button><br>
<?php
    
    
    $quad = new Quadrado("", $lado, $cor);
        echo $quad;
    ?>



<br><br>


<div></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    
</body>
</html>