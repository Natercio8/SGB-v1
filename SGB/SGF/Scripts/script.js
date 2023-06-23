let empresa = "DM & TMO Systems"

let SA = 1, SB = 1, SC = 1, SD = 1, SE = 1
let Snome = "", Sletra = "",tipo_S = ""

let SENHA
let DataH = new Date()

let hoje = `${DataH.getDate()}/${DataH.getMonth() + 1}/${DataH.getFullYear()}`
let horaHoje = `${DataH.getHours()}h:${DataH.getMinutes()}`


function A() {
    SA++

    tipo_S = "A"
    SENHA = SA - 1

    Snome = "PAGAMENTO DE PROPINAS"
    Sletra = "A00"

    if (SENHA >= 10) {
        Sletra = "A0"
    }
    if (SENHA >= 100) {
        Sletra = "A"
    }
    
    Recibo(Snome, hoje, horaHoje, Sletra, SENHA)
    enviar(tipo_S, SENHA)
   // recibo(snome, datah, HoraHoje,sletra, senha)
}

function B() {
    SB++

    SENHA = SB - 1
    tipo_S = "B"

    Snome = "MATRÍCULA"
    Sletra = "B00"

    if (SENHA >= 10) {
        Sletra = "B0"
    }
    if (SENHA >= 100) {
        Sletra = "B"
    }

    Recibo(Snome, hoje, horaHoje,Sletra,SENHA)
    enviar(tipo_S, SENHA)
   // recibo(snome, datah, HoraHoje,sletra, senha)
}

function C() {
    SC++

    SENHA = SC - 1
    tipo_S = "C"

    Snome = "CONFIRMAÇÃO"
    Sletra = "C00"

    if (SENHA >= 10) {
        Sletra = "C0"
    }
    if (SENHA >= 100) {
        Sletra = "C"
    }
    Recibo(Snome, hoje, horaHoje,Sletra,SENHA)
    enviar(tipo_S, SENHA)
}

function D() {
    SD++

    SENHA = SD - 1
    tipo_S = "D"

    Snome = "DECLARAÇÃO"
    Sletra = "D00"

    if (SENHA >= 10) {
        Sletra = "D0"
    }
    if (SENHA >= 100) {
        Sletra = "D"
    }
    
    Recibo(Snome, hoje, horaHoje,Sletra,SENHA)
    enviar(tipo_S, SENHA)
}

function E() {
    SE++

    SENHA = SE - 1
    tipo_S = "E"

    Snome = "OUTROS SERVIÇOS"
    Sletra = "E00"

    if (SENHA >= 10) {
        Sletra = "E0"
    }
    if (SENHA >= 100) {
        Sletra = "E"
    }
    
    Recibo(Snome, hoje, horaHoje,Sletra,SENHA)
    enviar(tipo_S, SENHA)
}

function Recibo(snome, datah, HoraHoje,sletra, senha) {

    document.getElementById('Snome').innerHTML = snome
    document.getElementById('hoje').innerHTML = datah

    document.getElementById('horaHoje').innerHTML = HoraHoje
    document.getElementById('Sletra').innerHTML = sletra

    document.getElementById('Senha').innerHTML = senha
    window.print()
}

function enviar(tipo, total) {

    $.ajax({
        
        url: "./Backend/actualizar.php",
        type: "POST",

        data:{
            Tipo: tipo,
            Total: total
        },

        success: (resultado) => {
            $("#teste").html(resultado)
        }
    }) 
}






















/*
    TMO: Studio; copyright 2023
            The Mark Of
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
*/