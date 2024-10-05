<!--
Este arquivo contém o formulário para registrar novos cadastros de pessoas, assim como seus respectivos campos obrigatórios e opcionais.
-->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <title>Cadastro de Pessoa</title>
</head>

<body>
    <?php include "template_header.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Cadastro de Pessoas</h1><br>
                <h3>Preencha os campos abaixo:</h3>
                <form action="script_cadastro.php" method="POST">
                    <div class="mb-3">
                        <label for="nome">Nome completo: <span style="color: red; font-size:18px">*</span></label>
                        <input type="text" class="form-control" name="nome" required>
                    </div>

                    <div class="mb-3">
                        <label for="data_nascimento">Data de Nascimento: <span style="color: red; font-size:18px">*</span></label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                    </div>

                    <div class="mb-3">
                        <label for="cpf">CPF: <span style="color: red; font-size:18px">*</span></label>
                        <input type="text" class="form-control" id="cpf" name="cpf" required>
                    </div>

                    <div class="mb-3">
                        <label for="genero">Gênero: <span style="color: red; font-size:18px">*</span></label>
                        <select class="form-select" id="genero" name="genero" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Outro">Outro</option>
                        </select>

                    </div>

                    <div class="mb-3">
                        <label for="telefone">Telefone:</label>
                        <input type="text" class="form-control" id="telefone" name="telefone">
                    </div>

                    <div class="mb-3">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <p style="color: red; font-size:16px">* Campos obrigatórios</p>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    <a href="pessoas.php" class="btn btn-primary">Voltar</a>

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