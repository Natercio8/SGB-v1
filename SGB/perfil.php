<?php
    require('Backend/conexao.php');
    session_start();

    if(!isset($_SESSION['id_func'])){

        header("location:index.php");
        exit;
    }
    else{

        $cargo = "";
        $id_func = $_SESSION['id_func'];
        $_SESSION['id'] = $_GET['id'];
        $id = $_SESSION['id'];
        $id_cargo = $_SESSION['id_cargo'];
        $nome = $_SESSION['nome_func'];

        if ($id_cargo == 1) {
            # code...
            $cargo = "Gerente";
        } else {
            # code...
            $cargo = "Secretário(a)";
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>   
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="IMG/ico.png" type="image/x-icon">
        <link rel="stylesheet" href="CSS/adm.css">
        <title><?php echo "$cargo: "."$nome"; ?></title>
    </head>

    <body>
        <div class="header">
            <header>
                <nav>
                    <ul>
                        <?php if ($id_cargo == 1) { ?>
                        <li><a href="adm.php">Home</a></li>
                        <?php } else { ?>

                        <li><a href="home.php">Home</a></li>
                        <?php }?>
                        <li><a href="clientes.php">Clientes</a></li>
                        <li><a href="#" style="color: rgb(0, 55, 235);">Candidaturas</a></li>
                        <li><a href="Babysitters.php">Babysitters</a></li>
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
                    <button><a href="candidaturas.php">Voltar</a></button>
                </div>
                
            </div>
        </div>
        <div class="rodape">
            <p id="p1"><a href="index.html">&copy;A.B. Ester</a>. All Rights Reserved.</p>
            <p id="p2">Designed by <a href="index.html">TMO: Studio</a></p> 
        </div>
    </body>
</html>