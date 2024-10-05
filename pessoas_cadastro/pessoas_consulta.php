<!--
Este arquivo contém o código para a página de consulta da tabela de pessoas. Mostra todas as informações referentes a quem quer consultar.
-->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <title>Consulta</title>
</head>

<body>
    <?php include "template_header.php"; ?>

    <div class="container">
        <div class="row">

            <?php
            include_once "../conexao.php";

            $id = $_GET['id'];
            $sql = "SELECT id, nome, data_nascimento, cpf, genero, telefone, email FROM pessoas WHERE id = $id";
            $result = mysqli_query($conn, $sql);

            if ($pessoa = mysqli_fetch_assoc($result)) {
                echo "ID: " . $pessoa['id'] . "<br>";
                echo "Nome: " . $pessoa['nome'] . "<br>";
                echo "Data de Nascimento: " . $pessoa['data_nascimento'] . "<br>";
                echo "CPF: " . $pessoa['cpf'] . "<br>";
                echo "Gênero: " . $pessoa['genero'] . "<br>";
                echo "Telefone: " . $pessoa['telefone'] . "<br>";
                echo "Email: " . $pessoa['email'] . "<br><br>";
            } else {
                echo "Nenhuma pessoa encontrada.";
            }
            ?>

            <a href="pessoas.php" class="btn btn-primary">Sair</a>
        </div>
    </div>

    <?php include "template_footer.php"; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>