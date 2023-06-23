function cadastrar() {
    let nome = document.querySelector('#nome').value

    let endereco = document.querySelector('#endereco').value
    let email = document.querySelector('#email').value

    let telefone = document.querySelector('#telefone').value
    let pass = document.querySelector('#pass').value

    if (nome =='' || endereco == '' || email == '' || telefone == '' || pass == '') {
        alert("Preencha todos os campos!")
    }
    else {

        enviarPHP(nome, endereco, email, telefone, pass)
    }

}
function enviarPHP(nome_, endereco_, email_, telefone_, pass_) {

    $.ajax({
        
        url: "./Backend/cadastrar.php",
        type: "POST",

        data:{
            Nome: nome_,
            Endereco: endereco_,
            Email: email_,
            Telefone: telefone_,
            Pass: pass_
        },
        success: (resultado) => {
            $("#teste").html(resultado)
        }
    }) 
}