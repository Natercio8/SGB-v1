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
        <title>Concluir </title>
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
            <br><br>
            <?php
                $baby = $conn->prepare("SELECT * FROM babysitter where id_baby=$id");
                $baby->execute();
                $res=$baby->fetchAll();

                for($i=0; $i<sizeof($res); $i++){
                    $values = $res[$i];
                }
            ?>
        <div class="finalizarContrato">
        <?php
                $cliente = $conn->prepare("SELECT * FROM cliente where id_cliente=$idCliente");
            
                $cliente->execute();
                $resC=$cliente->fetchAll();

                for($ic=0; $ic<sizeof($resC); $ic++){
                    $valuesC = $resC[$ic];
                }
            ?>
            <br><br>

            <div class="assinar">
                <h2> Agencia de Babysitter Ester</h2>
                <br>
                <p>Babysitter:</p>
                <p id="p"><?php echo $values['nome_baby'];?></p>
                <p>Endereço:</p>
                <p id="p"><?php echo $values['endereco_baby'];?></p>
                <br><br>
                <p>Cliente:</p>
                <p id="p"><?php echo $valuesC['nome_cliente'];?>,</p>
                <p>Endereço:</p>
                <p id="p"><?php echo $valuesC['endereco_cliente'];?></p>
                <br><br>
                
                <form method="get">
                <p>Quantidade de Crianças:</p>
                    <input type="number" name="qtd" min="0">
                    <p>Fim do contrato:</p>
                    <input type="date" name="dataf">
                    <button type="submit">Concluir</button>
                </form>

                <br><br>
                <p>*O inicio do contrato começa apartir do momento que o cliente conclui o contrato</p>
                
            </div>

        </div>
        
             
        <div class="rodape">
            <p id="p1"><a href="index.html">&copy;A.B. Ester</a>. All Rights Reserved.</p>
            <p id="p2">Designed by <a href="index.html">TMO: Studio</a></p>
            
        </div>
    </body>
</html>
<?php
    if (isset($_GET['qtd'])) {
        # code...
        $id_empresa = 1;

        $qtd = $_GET['qtd'];
        $data = $_GET['dataf'];

        try {
            //code...
            $contrato = $conn->prepare("INSERT INTO contrato(id_cliente, id_baby, num_criancas, data_final) values (:idCliente, :id,:qtd,:dataf)");

            $contrato->bindValue(':id',$id);
            $contrato->bindValue(':idCliente',$idCliente);

            $contrato->bindValue(':qtd',$qtd);
            $contrato->bindValue(':dataf',$data);
    
            $contrato->execute();
            if ($contrato) {
                # code...
                header("location:dashboard.php");
            }
            
        } 
        catch (PDOException $warning) {
    
            echo ("Ocorreu um erro no: {$warning->getMessage()}");   
        }

    }
?>
