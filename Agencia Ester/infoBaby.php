<?php
    require('Backend/conexao.php');
    session_start();

    if(!isset($_SESSION['id_cliente'])){

        header("location:entrar.php");
        exit;
    }
    else{

        $idCliente = $_SESSION['id_cliente'];
        $Nome = $_SESSION['nome_cliente'];
        
        $_SESSION['id'] = $_GET['id'];
        $id = $_SESSION['id'];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>   
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="IMG/ico.png" type="image/x-icon">
        <link rel="stylesheet" href="CSS/style.css">
        <title>Info Babysitter</title>
    </head>

    <body>
        <div class="header">
            <header>
                <nav>
                    <ul>
                        <li><a href="dashboard.php">Home</a></li>
                        <li><a href="contratoCliente.php">Contratos</a></li>
                        <li><a href="dashboard.php#trabalho">Serviços</a></li>
                        <li><a href="dashboard.php#contacto">Contacto</a></li>
                        <li><a href="Backend/sair.php">X</a></li>
                    </ul>
                </nav>
            </header>
        </div>
        <br>
        <div class="BabyInfoContainer">
            <br><br><br>
            <?php
                $baby = $conn->prepare("SELECT * FROM babysitter where id_baby=$id");
            
                $baby->execute();
                $res=$baby->fetchAll();

                for($i=0; $i<sizeof($res); $i++){
                    $values = $res[$i];
                }
            ?>
            <div class="InfoContainer">
                <div class="img">
                    <img src="IMG/b.jpg" alt="">
                </div>
                <div class="infotexto">
                    <p>Nome: <?php echo $values['nome_baby'];?></p>
                    <p>Idade: <?php echo $values['idade'];?></p>
                    <p>Morada: <?php echo $values['endereco_baby'];?>, Luanda</p>
                    <p>Experiencia: 7 anos</p>
                </div>

                <div class="infotexto">
                    <p>Biografia</p>
                    <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit</p>
                    <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                </div>

                <div class="final">
                    <button><a href="contrato.php?id=<?php echo $id;?>">Contratar</a></button>
                </div>
            </div>
        </div>
        <div class="rodape">
            <p id="p1"><a href="index.html">&copy;A.B. Ester</a>. All Rights Reserved.</p>
            <p id="p2">Designed by <a href="index.html">TMO: Studio</a></p> 
        </div>
    </body>
</html>