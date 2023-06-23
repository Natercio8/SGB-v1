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
        <link rel="stylesheet" href="CSS/home.css">
        <title><?php echo "$cargo: "."$nome"; ?></title>
    </head>

    <body>
            <div class="header">
                <header>
                    <nav>
                        <ul>
                            <li><a href="clientes.php">Clientes</a></li>
                            <li><a href="funcionarios.php">Funcionarios</a></li>
                            <li><a href="babysitters.php">Babysitters</a></li>
                            <li><a href="contratos.php">Contratos</a></li>
                            <li><a href="Backend/sair.php">X</a></li>
    
                        </ul>
                    </nav>
                </header>
            </div>
            <br>
            <div class="container">
                <br><br><br><br>

                <div class="menu">
                    <a href="funcionarios.php"> <div class="menus">
                        <div class="altimg">
                            <img src="IMG/lis.png" alt="">
                            <h3>Funcionários</h3>
                        </div>
                    </div> </a>
                    <a href="clientes.php"> <div class="menus1">
                        <div class="altimg">
                            <img src="IMG/lis.png" alt="">
                            <h3>Clientes</h3>
                        </div>
                    </div> </a>
                    <a href="Babysitters.php"> <div class="menus1">
                        <div class="altimg">
                            <img src="IMG/lis.png" alt="">
                            <h3>Babysitters</h3>
                        </div>
                    </div> </a>
                </div>
                <br>

                <div class="menu">
                    <a href="entrevistas.php"> <div class="menus2">
                        <div class="altimg">
                            <img src="IMG/lis.png" alt="">
                            <h3>Entrevistas</h3>
                        </div>
                    </div> </a>
                    <a href="candidaturas.php"> <div class="menus3">
                        <div class="altimg">
                            <img src="IMG/todo.png" alt="">
                            <h3>candidaturas</h3>
                        </div>  
                    </div> </a>
                    <a href="contratos.php"> <div class="menus3">
                        <div class="altimg">
                            <img src="IMG/todo.png" alt="">
                            <h3>Contratos</h3>
                        </div>  
                    </div> </a>
                </div>
            </div>
        
             
        <div class="rodape">
            <p id="p1"><a href="index.html">&copy;A.B. Ester</a>. All Rights Reserved.</p>
            <p id="p2">Designed by <a href="index.html">TMO: Studio</a></p>
            
        </div>
        
    
    </body>

</html>