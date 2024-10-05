<!--
Este arquivo executa a exclusão do registro desejado no banco de dados.  
-->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <title>Remoção de Registro</title>
</head>

<body>

    <?php include "template_header_imoveis.php"; ?>

    <div class="container">
        <div class="row">

            <?php
            include_once "../conexao.php";

            // Captura o ID do imóvel a ser excluído
            $inscricao_municipal = $_POST['inscricao_municipal'];
            $logradouro = $_POST['logradouro'];

            // Deleta o imóvel do banco de dados
            $sql = "DELETE FROM `imoveis` WHERE inscricao_municipal = $inscricao_municipal";

            if (mysqli_query($conn, $sql)) {
                confirmacao("O imóvel de logradouro $logradouro foi excluído com sucesso!", 'success');
            } else {
                confirmacao("Falha ao excluir o imóvel!", 'danger');
            }
            ?>

            <a href="imoveis.php" class="btn btn-primary">Voltar</a>

        </div>
    </div>

    <?php include "template_footer_imoveis.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>