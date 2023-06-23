<?php
    require('Backend/conexao.php');
    session_start();

    if(!isset($_SESSION['id_baby'])){

        header("location:loginbaby.php");
        exit;
    }
    else{

        $id_baby = $_SESSION['id_baby'];
        $Nome = $_SESSION['nome_baby'];

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
        <title>All Babysitter  - <?php echo($Nome);?></title>
    </head>

    <body>
        <div class="imagem">
            <div class="header">
                <header>
                    <nav>
                        <ul>
                        <li><a href="Bcontrato.php">Contratos</a></li>
                            <li><a href="candidatura.php">Candidatura</a></li>
                            <li><a href="Bdashboard.php#contacto">Contacto</a></li>
                            <li><a href="Backend/sair.php" title="Sair">X</a></li>
    
                        </ul>
                    </nav>
                </header>
            </div>
            <br><br><br><br><br><br>
            <div class="texto">
                <h1>A plataforma <br> de cuidados infantis <br> em que os pais confiam</h1>
            </div>
        </div>
            <div class="clienteCadastro" id="conta">
                <br>
                <div class="centrar">
                <?php

                    $situacao = "";
                    $baby = $conn->prepare("SELECT * FROM babysitter");

                    $baby->execute();
                    $res=$baby->fetchAll();
                       
                    for($i=0; $i<sizeof($res); $i++){
                        $values = $res[$i];
                        $estado = $values['estado'];
                    }
                    if ($estado) {
                        # code...
                   
                    if ($estado == 'S') {
                        # code...
                        $situacao = "Aprovada!";
                    } else {
                        # code...
                        if ($estado == 'N') {
                            $situacao = "Negada!";
                            
                        }
                    }   
                ?>
                    <h2>A sua candidatura foi <?php echo $situacao; ?></h2>
                    <?php }?>
                </div>
               
            </div>
        
            <div class="links">
                <br><br><br>
                <div class="seguir">
                    <div class="seguirSub">
                        <br>
                        <h2>Endereço</h2>
                        <br>
                        <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit, tempora quia nihil dolores. </p>
                        <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit, tempora quia nihil dolores. </p>
                    </div>
                    <div class="seguirSub">
                        <br>
                        <h2>Redes Sociais</h2>
                        <br>
                        <ul>
                            <li> <a href="#">Facebook</a> </li>
                            <li> <a href="#">Twitter</a> </li>
                            <li> <a href="#">Instagram</a> </li>

                        </ul>
                    </div>
                </div>
            </div>
        
        <div class="rodape">
            <p id="p1"><a href="dashboard.php">&copy;A.B. Ester</a>. All Rights Reserved.</p>
            <p id="p2">Designed by <a href="#">TMO: Studio</a></p>
        </div>
    </body>
</html>
<?php
    /*if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $baby = $conn->prepare("DELETE FROM babysitter where id_baby=$id");
        $baby->execute();
        if ($baby) {
            # code...
            header("location:allbabys.php");
            
            
        }
        else{
            echo("<script>alert('Nao Deletado')</script>");
        }
        # code...
    }
            #$baby = $conn->prepare("SELECT * FROM babysitter where id_baby=$id");
           /* <input type="text" readonly placeholder= "<?php echo($values['nome_baby']);?>"><br>
            <input type="text" readonly placeholder= "<?php echo($values['endereco_baby']);?>">
            #$baby->execute();
            #$res=$baby->fetchAll();

            #for($i=0; $i<sizeof($res); $i++){
             #   $values = $res[$i]; DELETE FROM `babysitter` WHERE 0
            #}*/


        ?>
