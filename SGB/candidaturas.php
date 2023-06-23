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
                            <li><a href="#" style="color: rgb(0, 55, 235);">Candidaturas</a></li>
                            <li><a href="Babysitters.php">Babysitters</a></li>
                            <li><a href="Backend/sair.php">X</a></li>
    
                        </ul>
                    </nav>
                </header>
            </div>
            <br><br>
        <div class="fsobre">
            <br><br>
            <div class="centro">         
                <table border="0">
                    <tr>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Endereço</th>
                        <th>Província</th>
                        <th>Email</th>
                        <th>Telefone</th>
                    </tr>
                    
                    <?php
                        $baby = $conn->prepare("SELECT * FROM babysitter join provincia on babysitter.provincia = provincia.id_prov");
                        $baby->execute();
                        $res=$baby->fetchAll();
                           
                        for($i=0; $i<sizeof($res); $i++){
                            $values = $res[$i];
                        ?>
                    <tr>
                    
                        <td> <?php echo $values['nome_baby'];?> </td>
                        <td> <?php echo $values['idade'];?> </td>
                        <td> <?php echo $values['endereco_baby'];?> </td>
                        <td> <?php echo $values['nome_prov'];?> </td>
                        <td> <a href="mailto:<?php echo $values['email'];?>"><?php echo $values['email'];?></a> </td>
                        <td> <a href="tel:+<?php echo $values['telefone'];?>"><?php echo $values['telefone'];?></a> </td>
                        <td> <button><a href="perfil.php?id=<?php echo ($values['id_baby']);?>">Perfil</a></button> </td>
                        <?php
                        if ($id_cargo == 2) {
                            # code...
                        ?>
                        <td> <button onclick="show()" id="b"> <a href="?id=<?php echo ($values['id_baby']);?>">Agendar</a></button> </td>
                            <?php }?>
                        <?php }?>
                    </tr>
                </table>
            </div>
            <br><br>
            <div class="agendar">
                <form method="post">
                    <p>Data:</p>
                    <input type="date" name="Dia" id="dt">
                    <p>,Hora:</p>
                    <input type="time" name="Hora" id="dtt">
                    <br>
                    <button id="ae" >Agendar entrevista</button>
                </form>
            </div>
            <br><br><br>
            <script>
                function show() {
                    
                    var display = document.querySelector('.agendar').style.display;
                    if (display == "none") {
                        document.querySelector('.agendar').style.display = 'block';
                    } else {
                        document.querySelector('.agendar').style.display = 'none';
                    }
                }
            </script>
        </div>
        
        <div class="rodape">
            <p id="p1"><a href="index.html">&copy;A.B. Ester</a>. All Rights Reserved.</p>
            <p id="p2">Designed by <a href="index.html">TMO: Studio</a></p>
        </div>
    </body>
</html>
<?php
    if (isset($_POST['Dia'])) {
        # code...
        $id = $_GET['id'];
        $Dia = $_POST['Dia'];
        $Hora = $_POST['Hora'];
        

        $marcar = $conn->prepare("INSERT INTO entrevista(id_cand, data_ent, hora) values (:id, :Dia, :Hora)");
        $marcar->bindvalue(":id", $id);
        $marcar->bindvalue(":Dia", $Dia);
        $marcar->bindvalue(":Hora", $Hora);
        $marcar->execute();
    }
?>