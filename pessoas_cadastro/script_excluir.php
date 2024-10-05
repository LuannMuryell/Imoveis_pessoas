<!--
Este arquivo executa a exclusão do cadastro desejado no banco de dados.  
-->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <title>Remoção de Cadastro</title>
</head>

<body>

    <?php include "template_header.php"; ?>

    <div class="container">
        <div class="row">

            <?php
            include_once "../conexao.php";

            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $sql = "DELETE from `pessoas` WHERE id = $id";

            if (mysqli_query($conn, $sql)) {
                confirmacao("$nome foi excluído com sucesso!", 'success');
            } else {
                confirmacao("Não foi possível remover.", 'danger');
            }
            ?>

            <a href="pessoas.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>

    <?php include "template_footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>