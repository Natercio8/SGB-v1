<?php
    require('Backend/conexao.php');
    session_start();

    if(!isset($_SESSION['id_baby'])){

        header("location:loginbaby.php");
        exit;
    }
    else{

        $idBaby = $_SESSION['id_baby'];
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
        <title>Dashboard - <?php echo  $Nome;?></title>
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
            <div class="trabalho" id="trabalho">
                <ul>
                    <li><a href="meuPerfil.php">Perfil</a></li>
                </ul>
            </div>
        <div class="outros">
            <br><br>
            <h3>Oque os nossos clientes dizem acerca da nossa Agencia </h3>
            <br><br>
            <div class="sectionCliente">
                <div class="clientes">
                    <p>Sra. Marta (Luanda)</p>
                    <p>20 de Janeiro</p>
                    <br>
                    <div class="txt">
                        <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit, tempora quia nihil dolores. </p>
                    </div> 
                </div>
                <div class="clientes">
                    <p>Sra. Carla (Huambo)</p>
                    <p>08 de Março</p>
                    <br>
                    <div class="txt">
                        <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit, tempora quia nihil dolores. </p>
                    </div> 
                </div>
                <div class="clientes">
                    <p>Sra. Paula (Uíge)</p>
                    <p>10 de Janeiro</p>
                    <br>
                    <div class="txt">
                        <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit, tempora quia nihil dolores. </p>
                    </div> 
                </div>
                <div class="clientes">
                    <p>Sra. Maria (Benguela)</p>
                    <p>17 de Outubro</p>
                    <br>
                    <div class="txt">
                        <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit, tempora quia nihil dolores. </p>
                    </div> 
                </div>

            </div>
        </div>
        <div class="contacto" id="contacto">
            <br><br>
            <h1>Contacto</h1>
            <br><br>
            <div class="cnc">
                <div class="info1">
                    <img src="IMG/cnt.png" alt="">
                </div>
                <div class="info">
                    <form method = "post">
                        <input type="text" name="Assunto" placeholder="Assunto">
                        <textarea name="Mensagem" placeholder="Mensagem"></textarea>
                        <br>
                        <button type="submit" id="enviar">Enviar</button>
                    </form>
                </div>
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
