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
                            <li><a href="funcionarios.php">Funcionarios</a></li>
                            <li><a href="babysitters.php">Babysitters</a></li>
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
                        <th>Nome</th>
                        <th>Data da entrevista</th>
                        <th>Hora</th>
                        <?php
                            if ($id_cargo == 1) {
                                # code...
                        ?>
                        <th colspan="3">Operações</th>
                        <?php }?>
                    </tr>
                    
                    <?php         
                        $ent = $conn->prepare("SELECT * FROM entrevista join babysitter on entrevista.id_cand = babysitter.id_baby");
                        $ent->execute();
                        $res=$ent->fetchAll();
                           
                        for($i=0; $i<sizeof($res); $i++){
                            $values = $res[$i];
                        ?>            
                    <tr>
                        <td> <?php echo $values['nome_baby'];?> </td>
                        <td> <?php echo $values['data_ent'];?> </td>
                        <td> <?php echo $values['hora'];?> </td>
                        <?php
                            if ($id_cargo == 1) {
                                # code...
                        ?>
                        <td> <button><a href="perfil.php?id=<?php echo ($values['id_baby']);?>">Perfil</a></button> </td>
                        <td> <button id="bc"><a  href="?contratar=<?php echo ($values['id_baby']);?>">Contratar</a></button> </td>
                        <td> <button id=""><a href="?Ncontratar=<?php echo ($values['id_baby']);?>">N/Contratar</a></button> </td>
                            <?php }?>
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
<?php

    if (isset($_GET['contratar'])){
        $cn = $_GET['contratar'];

        $cnn = $conn->prepare("UPDATE babysitter SET estado='S' where id_baby = $cn");
        $cnn->execute();
    }
    else {
        if(isset($_GET['Ncontratar'])){
            $Nc = $_GET['Ncontratar'];

            $cnn = $conn->prepare("UPDATE babysitter SET estado='N' where id_baby = $Nc");
            $cnn->execute();
        }
    }
?>