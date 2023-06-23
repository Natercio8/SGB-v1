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
        <title>Dashboard - <?php echo  $Nome;?></title>
    </head>

    <body>
        <div class="imagem">
            <div class="header">
                <header>
                    <nav>
                        <ul>
                            <li><a href="dashboard.php">Home</a></li>
                            <li><a href="contratoCliente.php">Contratos</a></li>
                            <li><a href="#trabalho">Serviços</a></li>
                            <li><a href="#contacto">Contacto</a></li>
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
        <div class="container">
            <div class="trabalho" id="trabalho">
                <ul>
                    <li><a href="allbabys.php">Encontrar uma Babysitter</a></li>
                </ul>
            </div>
            <br>
            <div class="babyContainter">
                <div class="babys">
                    <br>
                    <div class="img">
                        <img src="IMG/b.jpg" alt="">
                    </div>
                    <br>
                    <p>Esmeralda (29)</p>
                    <br>
                    <p>Luanda</p>
                </div>
                <div class="babys">
                    <br>
                    <div class="img">
                        <img src="IMG/b2.jpg" alt="">
                    </div>
                    <br>
                    <p>Paula (27)</p>
                    <br>
                    <p>Luanda</p>
                </div>
                <div class="babys">
                    <br>
                    <div class="img">
                        <img src="IMG/b.jpg" alt="">
                    </div>
                    <br>
                    <p>Samantha (26)</p>
                    <br>
                    <p>Malanje</p>
                </div>
                <div class="babys">
                    <br>
                    <div class="img">
                        <img src="IMG/b3.jpg" alt="">
                    </div>
                    <br>
                    <p>Esther (23)</p>
                    <br>
                    <p>Benguela</p>
                </div>
            </div>
            <br>
            <div class="btnVer">
                <button><a href="allbabys.php">Ver todas as Babysitters...</a></button>
            </div>
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
