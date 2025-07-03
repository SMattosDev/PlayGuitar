<?php

require_once 'Conexao.php';

$email = $_POST['email'];
$nome = $_POST['usuario'];
$senha = $_POST['senha'];

if (!empty($email) && !empty($nome) && !empty($senha)) {

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (email, usuario, senha) VALUES (:email, :usuario, :senha)";

    $requisicao = $conexao->prepare($sql);

    $requisicao->bindParam(':email', $email);
    $requisicao->bindParam(':usuario', $nome);
    $requisicao->bindParam(':senha', $senhaHash);

    try {
        $requisicao->execute();
        echo 'Usuário cadastrado com sucesso!';
        header('Location: ../html/login.html');
        exit;
    } catch (PDOException $e) {
        echo 'Erro ao cadastrar: ' . $e->getMessage();
    }

} else {
    echo '<p style="color:red;">Preencha todos os campos. </p>';
}

?>