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
                            <li><a href="candidaturas.php" >Candidaturas</a></li>
                            <li><a href="Babysitters.php">Babysitters</a></li>
                            <li><a href="Backend/sair.php">X</a></li>
    
                        </ul>
                    </nav>
                </header>
            </div>
            <br><br>
        <div class="sobre">
            <br><br>
            <div class="centro">         
                <table border="0">
                    <tr>
                        <th>Cliente</th>
                        <th>babysitter</th>
                        <th>Nº de crianças</th>
                        <th>Inicio do contrato</th>
                        <th>Fim do contrato</th>
                    </tr>
                    
                    <?php
                        

                        $cliente = $conn->prepare("SELECT * FROM contrato join cliente on contrato.id_cliente = cliente.id_cliente
                        join babysitter on contrato.id_baby =babysitter.id_baby");
                        
                        $cliente->execute();
                        $res=$cliente->fetchAll();
                           
                        for($i=0; $i<sizeof($res); $i++){
                            $values = $res[$i];
                        ?>            
                    <tr>
                        <td> <?php echo $values['nome_cliente'];?> </td>
                        <td> <?php echo $values['nome_baby'];?> </td>
                        <td> <?php echo $values['num_criancas'];?> </td>
                        <td> <?php echo $values['data_inicial'];?> </td>
                        <td> <?php echo $values['data_final'];?> </td>
                        <?php }?>
                    </tr>
            
                </table>
            </div>
        </div>
        <div class="rodape">
            <p id="p1"><a href="index.html">&copy;A.B. Ester</a>. All Rights Reserved.</p>
            <p id="p2">Designed by <a href="index.html">TMO: Studio</a></p>
        </div>
    </body>
</html>