
function cadastrar(event) {
    event.preventDefault();

    var email = document.getElementById('email').value;
    var usuario = document.getElementById('usuario').value;
    var senha = document.getElementById('senha').value;

    if (email == 'samuelsantos@gmail.com' && usuario == 'Samuca' && senha == '123456') {

        Swal.fire({
            title: 'Cadastro realizado!',
            text: ' Bem vindo, ' + usuario + '!',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            setTimeout(() => {
                location.href = "../html/login.html";
            }, 100);
        });

    };



}