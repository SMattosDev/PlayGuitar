<?php
session_start();
require_once 'Conexao.php';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

if (!empty($usuario) && !empty($senha)) {
    try {
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
        $requisicao = $conexao->prepare($sql);
        $requisicao->bindParam(':usuario', $usuario);
        $requisicao->execute();

        if ($requisicao->rowCount() == 1) {
            $dados = $requisicao->fetch(PDO::FETCH_ASSOC);

            if (password_verify($senha, $dados['senha'])) {
                $_SESSION['usuario'] = $usuario;


                header('Location: ../html/index.html');
                exit;
            } else {
                echo '<p style="color:red;">Senha incorreta.</p>';
            }

        } else {
            echo '<p style="color:red;">Usuário não encontrado.</p>';
        }

    } catch (PDOException $e) {
        echo '<p style="color:red;">Erro no banco de dados: ' . $e->getMessage() . '</p>';
    }

} else {
    echo '<p style="color:red;">Preencha todos os campos.</p>';
}
?>