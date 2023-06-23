<?php
    require('Backend/conexao.php');
    session_start();

    $numeroBalcao = $_SESSION['num_balcao'];

    if(!isset($_SESSION["id"])){

        header("location:login.php");
        exit;
    }
    else{

        $id = $_SESSION["id"];

        $codigo = $_SESSION['codigo'];
        $nomeFuncionario = $_SESSION['nome'];
    }
?>
<!DOCTYPE html>
<html lang="pt">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/Dstyle.css">
        <link rel="shortcut icon" href="IMG/isia1.png" type="image/x-icon">
        <title>Tesouraria -  <?php echo(" ".$nomeFuncionario); ?></title>
    </head>

    <body>
        <header>
            <nav>
                <h2>Balcão <?php echo ($numeroBalcao); ?></h2>
                <p class="sair"><a href="Backend/Sair.php"> Sair </a></p>
            </nav>
        </header>
        <br><br><br><br><br><br>
        <div class="container">

        <?php
        
            $servico = $conn->prepare("SELECT * from servico where tipo_servico ='A'");
            $servico->execute();

            $resultado = $servico->fetchAll();
          
            for($i=0; $i<sizeof($resultado); $i++){
                
                $values = $resultado[$i];
                $senhasEmitidasA = $values['senhas_emitidas'];
                $senhaAtual = $values['senha_actual'];
        ?>

            <div class="servico">
                <button type="submit" onclick="A()">ASSEGUIR</button>

                <p>Serviço: <?php echo (" ".$values['tipo_servico']);?></p>
                <p><?php echo $values['nome_servico'];?></p>

                <p>Senhas emitidas: <?php echo $values['senhas_emitidas'];?></p>
                <p id="sa">Senha actual:</p>
                <p id="sa" class="N"><?php echo($senhaAtual); ?></p>
            </div>

        <?php }?>
        
    <!---/////////////////////////////////////////////////////////////////////////////////////--->
        <?php
            
            $servicoB = $conn->prepare("SELECT * from servico where tipo_servico ='B'");
            $servicoB->execute();

            $resultadoB = $servicoB->fetchAll();
        
            for($iB=0; $iB<sizeof($resultadoB); $iB++){
                
                $valuesB = $resultadoB[$iB];
                $senhasEmitidasB = $valuesB['senhas_emitidas'];
                $senhaAtualB = $valuesB['senha_actual'];
        ?>

            <div class="servico">
                <button onclick="B()">ASSEGUIR</button>

                <p>Serviço: <?php echo (" ".$valuesB['tipo_servico']);?></p>
                <p><?php echo $valuesB['nome_servico'];?></p>

                <p>Senhas emitidas: <?php echo $valuesB['senhas_emitidas'];?></p>
                <p id="sa">Senha actual:</p> <p id="sa" class="NB"><?php echo($senhaAtualB); ?></p>
            </div>

        <?php }?>

        <!---/////////////////////////////////////////////////////////////////////////////////////--->
        <?php
            
            $servicoC = $conn->prepare("SELECT * from servico where tipo_servico ='C'");
            $servicoC->execute();

            $resultadoC = $servicoC->fetchAll();
        
            for($iC=0; $iC<sizeof($resultadoC); $iC++){
                
                $valuesC = $resultadoC[$iC];
                $senhasEmitidasC = $valuesC['senhas_emitidas'];
                $senhaAtualC = $valuesC['senha_actual'];
        ?>

            <div class="servico">
                <button onclick="C()">ASSEGUIR</button>

                <p>Serviço: <?php echo (" ".$valuesC['tipo_servico']);?></p>
                <p><?php echo $valuesC['nome_servico'];?></p>

                <p>Senhas emitidas: <?php echo $valuesC['senhas_emitidas'];?></p>
                <p id="sa">Senha actual:</p> <p id="sa" class="NC"><?php echo($senhaAtualC); ?></p>
            </div>

        <?php }?>

        <!---/////////////////////////////////////////////////////////////////////////////////////--->
        <?php
            
            $servicoD = $conn->prepare("SELECT * from servico where tipo_servico ='D'");
            $servicoD->execute();

            $resultadoD = $servicoD->fetchAll();
        
            for($iD=0; $iD<sizeof($resultadoD); $iD++){
                
                $valuesD = $resultadoD[$iD];
                $senhasEmitidasD = $valuesD['senhas_emitidas'];
                $senhaAtualD = $valuesD['senha_actual'];
        ?>

            <div class="servico">
                <button onclick="D()">ASSEGUIR</button>

                <p>Serviço: <?php echo (" ".$valuesD['tipo_servico']);?></p>
                <p><?php echo $valuesD['nome_servico'];?></p>

                <p>Senhas emitidas: <?php echo $valuesD['senhas_emitidas'];?></p>
                <p id="sa">Senha actual:</p> <p id="sa" class="ND"><?php echo($senhaAtualD); ?></p>
            </div>

        <?php }?>

        <!---/////////////////////////////////////////////////////////////////////////////////////--->
        <?php
            
            $servicoE = $conn->prepare("SELECT * from servico where tipo_servico ='E'");
            $servicoE->execute();

            $resultadoE = $servicoE->fetchAll();
        
            for($iE=0; $iE<sizeof($resultadoE); $iE++){
                
                $valuesE = $resultadoE[$iE];

                $senhasEmitidasE = $valuesE['senhas_emitidas'];
                $senhaAtualE = $valuesE['senha_actual'];

        ?>

            <div class="servico">
                <button onclick="E()">ASSEGUIR</button>

                <p>Serviço: <?php echo (" ".$valuesE['tipo_servico']);?></p>
                <p><?php echo $valuesE['nome_servico'];?></p>

                <p>Senhas emitidas: <?php echo $valuesE['senhas_emitidas'];?></p>
                <p id="sa">Senha actual:</p> <p id="sa" class="NE"><?php echo($senhaAtualE); ?></p>
            </div>

        <?php }?>


        <script>
            let _tipo = "", _servico = "", _Balcao = ""

            let Balcao = <?php echo json_encode($numeroBalcao);?>;
            let senhaAC = "Senha"

            let senhasEmitidasA = <?php echo json_encode($senhasEmitidasA);?>;
            let senhaAtual = <?php echo json_encode($senhaAtual); ?>;

            let senhasEmitidasB = <?php echo json_encode($senhasEmitidasB); ?>;
            let senhaAtualB = <?php echo json_encode($senhaAtualB); ?>;

            let senhasEmitidasC = <?php echo json_encode($senhasEmitidasC); ?>;
            let senhaAtualC = <?php echo json_encode($senhaAtualC); ?>;
           
            let senhasEmitidasD = <?php echo json_encode($senhasEmitidasD); ?>;
            let senhaAtualD = <?php echo json_encode($senhaAtualD); ?>;

            let senhasEmitidasE = <?php echo json_encode($senhasEmitidasE); ?>;
            let senhaAtualE = <?php echo json_encode($senhaAtualE); ?>;
           

            ///////////////////////////////////////////////////////////////////
            function A() {

                _tipo = "A"
                
                _servico = "Serviço A"
                _Balcao = "Balcão " + Balcao

                senhaAtual++
                document.querySelector('.N').innerHTML = senhaAtual;

                if (senhaAtual >= senhasEmitidasA) {

                    senhaAtual = senhasEmitidasA
                    document.querySelector('.N').innerHTML = senhaAtual; 
                }            
                enviar(_tipo, senhaAtual)
                Speak(_servico,senhaAC ,senhaAtual, _Balcao)
            }
            ///////////////////////////////////////////////////////////////////
            function B() {

               _tipo = "B"
                
                _servico = "Serviço B"
                _Balcao = "Balcão " + Balcao

                senhaAtualB++
                document.querySelector('.NB').innerHTML = senhaAtualB;

                if (senhaAtualB >= senhasEmitidasB) {

                    senhaAtualB = senhasEmitidasB
                    document.querySelector('.NB').innerHTML = senhaAtualB; 
                }            
                enviar(_tipo, senhaAtualB)
                Speak(_servico,senhaAC ,senhaAtualB, _Balcao)
            }
            ///////////////////////////////////////////////////////////////////
            function C() {

                _tipo = "C"
                
                _servico = "Serviço C"
                _Balcao = "Balcão " + Balcao

                senhaAtualC++
                document.querySelector('.NC').innerHTML = senhaAtualC;

                if (senhaAtualC >= senhasEmitidasC) {

                    senhaAtualC = senhasEmitidasC
                    document.querySelector('.NC').innerHTML = senhaAtualC;
                }
                enviar(_tipo, senhaAtualC)
                Speak(_servico,senhaAC ,senhaAtualC, _Balcao) 

            }
            ///////////////////////////////////////////////////////////////////
            function D() {

                _tipo = "D"
                
                _servico = "Serviço D"
                _Balcao = "Balcão " + Balcao

                senhaAtualD++
                document.querySelector('.ND').innerHTML = senhaAtualD;
                if (senhaAtualD >= senhasEmitidasD) {

                    senhaAtualD = senhasEmitidasD
                    document.querySelector('.ND').innerHTML = senhaAtualD;
                }

                enviar(_tipo, senhaAtualD)
                Speak(_servico,senhaAC ,senhaAtualD, _Balcao)   
            }
            ///////////////////////////////////////////////////////////////////
            function E() {

                _tipo = "E"

                _servico = "Serviço É"
                _Balcao = "Balcão " + Balcao

                senhaAtualE++
                document.querySelector('.NE').innerHTML = senhaAtualE
                if (senhaAtualE >= senhasEmitidasE) {

                    senhaAtualE = senhasEmitidasE
                    document.querySelector('.NE').innerHTML = senhaAtualE
                }
                enviar(_tipo, senhaAtualE, Balcao)
                Speak(_servico,senhaAC ,senhaAtualE, _Balcao)
   
            }
            ///////////////////////////////////////////////////////////////////

            function enviar(tipo, total, _balcao_) {
                $.ajax({
                    
                    url: "Backend/se.php",
                    type: "POST",

                    data:{
                        Tipo: tipo,
                        Total: total,
                        num_balcao: _balcao_
                    }
                }) 
            }
            function Speak(servico, es, senha, balcao) {

                var Servico = new SpeechSynthesisUtterance(servico)
                var Senha = new SpeechSynthesisUtterance(senha)

                var es = new SpeechSynthesisUtterance(es)
                var Balcao = new SpeechSynthesisUtterance(balcao)
                
                for (let i = 0; i < 2; i++) {

                    window.speechSynthesis.speak(Servico)
                    window.speechSynthesis.speak(es)

                    window.speechSynthesis.speak(Senha)
                    window.speechSynthesis.speak(Balcao)
                }
            }
        </script>
        
        </div>
        <br><br><br><br><br><br><br><br><br>
        <div class="rodape">
            <footer>
                <span>
                <h4>DM & TMO : Systems &copy; Copyright 2023</h4>
                </span>
            </footer>
        </div>
        <script src="Scripts/Jquery.js"></script>
    </body>

</html>
<!--
    TMO: Studio; copyright 2023
            The Mark Of
        neo.jorge@live.com
    ...............................
    ...............................
                ......
                ......
                ......
                ......
                ......
                ......
                ......
                ......
                ......
                ......
                ......
            ....      ....
        ........      ........
    ............      ............
     ..                        ..
                ......
                 ....
                  ..


-->