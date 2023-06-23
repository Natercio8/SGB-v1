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
        <title>Contratos - <?php echo  $Nome;?></title>
    </head>

    <body>
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
            <br>


            <div class="sobre" id="sobre">
                <br><br>
                <h2>Meus Contratos</h2>
                <br>
                <div class="centrar">         
                    <table border="0">
                        <tr>
                            <th>Cliente</th>
                            <th>Endereco</th>
                            <th>Telefone</th>
                            <th>Qtd de crianças</th>
                            <th>Data do Inicio</th>
                            <th>Termina em...</th>

                        </tr>
                        <?php
                            $c = $conn->prepare("SELECT * FROM contrato join cliente on contrato.id_cliente = cliente.id_cliente where id_baby=$id_baby");
                            $c->execute();
                            $res=$c->fetchAll();

                            for($i=0; $i<sizeof($res); $i++){
                                $values = $res[$i];
                        ?>
                        
                        <tr>
                            <td><?php echo $values['nome_cliente'];?></td>
                            <td><?php echo $values['endereco_cliente'];?></td>
                            <td><?php echo $values['telefone_cliente'];?></td>
                            <td><?php echo $values['num_criancas'];?></td>
                            <td><?php echo $values['data_inicial'];?></td>
                            <td><?php echo $values['data_final'];?></td>

                        </tr>
                        <?php }?>
                
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