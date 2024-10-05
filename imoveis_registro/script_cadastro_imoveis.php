<!--
Este arquivo insere no banco de dados novos registros de imóveis. Contém uma mensagem confirmando se o registro deu certo ou não.
-->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <title>Registro de Imóveis</title>
</head>

<body>

    <?php include "template_header_imoveis.php"; ?>

    <div class="container">
        <div class="row">
            <?php
            include_once "../conexao.php";

            // Captura os dados enviados do formulário de registro de imóveis
            $logradouro = $_POST['logradouro'];
            $numero = $_POST['numero'];
            $bairro = $_POST['bairro'];
            $complemento = $_POST['complemento'];
            $contribuinte = $_POST['contribuinte']; 

            // Insere os dados no banco de dados
            $sql = "INSERT INTO `imoveis`(`logradouro`, `numero`, `bairro`, `complemento`, `contribuinte`) 
VALUES ('$logradouro', '$numero', '$bairro', '$complemento', '$contribuinte')";

            if (mysqli_query($conn, $sql)) {
                confirmacao("Imóvel no logradouro $logradouro cadastrado com sucesso!", 'success');
            } else {
                confirmacao("Falha no cadastro do imóvel!", 'danger');
            }
            ?>
            <a href="imoveis.php" class="btn btn-primary">Sair</a>
        </div>
    </div>

    <?php include "template_footer_imoveis.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>