<!--
Este arquivo é a interface para atualizar/editar algum cadastro desejado. Para evitar preencher todo o formulário novamente, o código já manda os campos preenchidos com as informações antigas.
-->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <title>Alteração de Cadastro</title>
</head>

<body>
    <?php
    include_once "../conexao.php";
    include "template_header.php";

    $id = $_GET['id'] ?? '';
    $sql = "SELECT * FROM pessoas WHERE id = $id";
    $dados = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_assoc($dados);
    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Edite os campos abaixo:</h2>
                <form action="edicao_cadastro.php" method="POST">
                    <div class="mb-3">
                        <label for="nome">Nome completo:</label>
                        <input type="text" class="form-control" name="nome" required value="<?php echo $linha['nome'];?>">
                    </div>

                    <div class="mb-3">
                        <label for="data_nascimento">Data de Nascimento:</label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required value="<?php echo $linha['data_nascimento'];?>">
                    </div>

                    <div class="mb-3">
                        <label for="cpf">CPF:</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" required value="<?php echo $linha['cpf'];?>">
                    </div>

                    <div class="mb-3">
                        <label for="genero">Gênero:</label>
                        <select class="form-select" id="genero" name="genero" required value=" <?php echo $linha['gênero'];?>">
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Outro">Outro</option>
                        </select>
                        
                    </div>

                    <div class="mb-3">
                        <label for="telefone">Telefone:</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $linha['telefone'];?>">
                    </div>

                    <div class="mb-3">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $linha['email'];?>">
                    </div>

                    <button type="submit" class="btn btn-success">Salvar</button>
                    <input type="hidden" name="id" value="<?php echo $linha['id'];?>">

                </form>
            </div>
        </div>
    </div>

    <?php include "template_footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>