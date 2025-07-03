<?php

require_once 'Conexao.php';

if (isset($_POST['nome_musica']) && isset($_POST['artista']) && isset($_POST['cifra'])) {

    $nome = $_POST['nome_musica'];
    $artista = $_POST['artista'];
    $cifra = $_POST['cifra'];

    if (!empty($nome) && !empty($artista) && !empty($cifra)) {

        $sql = "INSERT INTO musicas (nome_musica, artista, cifra, data_cadastro) 
                VALUES (:nome, :artista, :cifra, NOW())";

        $requisicao = $conexao->prepare($sql);
        $requisicao->bindParam(':nome', $nome);
        $requisicao->bindParam(':artista', $artista);
        $requisicao->bindParam(':cifra', $cifra);

        try {
            $requisicao->execute();
            echo '<p style="color: green; text-align:center; font-weight: bold;">Música cadastrada com sucesso!</p>';
        } catch (PDOException $e) {
            echo '<p style="color: red;">Erro ao cadastrar: ' . $e->getMessage() . '</p>';
        }

    } else {
        echo '<p style="color:red;">Preencha todos os campos.</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Cadastro de Música - PlayGuitar</title>
    <link rel="stylesheet" href="../css/cadastro-musica.css" />
</head>

<body>
    <header class="cabecalho">
        <img src="../img/logo.png" alt="Logo PlayGuitar" id="logo" />
        <h1>PlayGuitar - Cadastrar Música</h1>
    </header>

    <main>
        <form method="POST" action="">
            <label for="nome_musica">Nome da Música:</label>
            <input type="text" name="nome_musica" id="nome_musica" required>

            <label for="artista">Artista:</label>
            <input type="text" name="artista" id="artista" required>

            <label for="cifra">Cifra:</label>
            <textarea name="cifra" id="cifra" rows="10" required></textarea>

            <input type="submit" value="Cadastrar Música">
        </form>
    </main>

    <footer class="rodape">
        <p>2025 PlayGuitar - Todos os direitos reservados.</p>
    </footer>
</body>

</html>