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
        <title>All Babysitter  - <?php echo("Sr. ".$Nome);?></title>
    </head>

    <body>
            <div class="header">
                <header>
                    <nav>
                        <ul>
                            <li><a href="dashboard.php">Home</a></li>
                            <li><a href="contratoCliente.php">Contratos</a></li>
                            <li><a href="#trabalho">Serviços</a></li>
                            <li><a href="#contacto">Contacto</a></li>
                            <li><a href="Backend/sair.php">X</a></li>
    
                        </ul>
                    </nav>
                </header>
            </div>
            <div class="clienteCadastro" id="conta" style = "height:800px">
                <br><br><br><br>
                <div class="centrar">
                    <table border="0">
                        <tr>
                            <th>Nome</th>
                            <th>Idade</th>
                            <th>Endereço</th>
                            <th>Província</th>
    
                        </tr>
                        <?php
                            $baby = $conn->prepare("SELECT * FROM babysitter join provincia on babysitter.provincia = provincia.id_prov where estado='S'");
                            $baby->execute();
                            $res=$baby->fetchAll();
                           
                            for($i=0; $i<sizeof($res); $i++){
                                $values = $res[$i];
                        ?>
                        
                        <tr>
                            <td><?php echo $values['nome_baby'];?></td>
                            <td><?php echo $values['idade'];?></td>
                            <td><?php echo $values['endereco_baby'];?></td>
                            <td><?php echo $values['nome_prov'];?></td>
                            <td><button type="submit" id="btncontratar" title="<?php echo ($values['nome_baby']);?>"><a href="infoBaby.php?id=<?php echo ($values['id_baby']);?>">Perfil</a></button></td>
                            
                            
                            <?php }?>
                        </tr>
                 
                    </table>
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
