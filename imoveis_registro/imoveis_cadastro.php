<!--
Este arquivo contém o formulário para cadastrar novos registros de imóveis, assim como seus respectivos campos obrigatórios e opcionais. Além disso, permite que insira o contribuinte do imóvel.
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
            <div class="col">
                <h1>Registro de Imóveis</h1><br>
                <h3>Preencha os campos abaixo:</h3>

                <form action="script_cadastro_imoveis.php" method="POST">
                    <div class="mb-3">
                        <label for="logradouro">Logradouro: <span style="color: red; font-size:18px">*</span></label>
                        <input type="text" class="form-control" name="logradouro" required>
                    </div>

                    <div class="mb-3">
                        <label for="numero">Número: <span style="color: red; font-size:18px">*</span></label>
                        <input type="text" class="form-control" name="numero" required>
                    </div>

                    <div class="mb-3">
                        <label for="bairro">Bairro: <span style="color: red; font-size:18px">*</span></label>
                        <input type="text" class="form-control" name="bairro" required>
                    </div>

                    <div class="mb-3">
                        <label for="complemento">Complemento:</label>
                        <input type="text" class="form-control" name="complemento">
                    </div>

                    <div class="mb-3">
                        <label for="contribuinte">Contribuinte: <span style="color: red; font-size:18px">*</span></label>
                        <select name="contribuinte" id="contribuinte" class="form-select" required>
                            <option value="">Selecione um contribuinte</option>

                            <?php
                            include_once "../conexao.php";

                            $sql_pessoas = "SELECT id, nome FROM pessoas";
                            $result_pessoas = mysqli_query($conn, $sql_pessoas);

                            if ($result_pessoas && mysqli_num_rows($result_pessoas) > 0) {
                                while ($pessoa = mysqli_fetch_assoc($result_pessoas)) {
                                    echo "<option value='{$pessoa['id']}'>{$pessoa['nome']}</option>";
                                }
                            } else {
                                echo "<option value=''>Nenhum contribuinte encontrado</option>"; // Mensagem caso não haja pessoas
                            }
                            ?>
                        </select>

                        <p style="color: red; font-size:16px">* Campos obrigatórios</p>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <a href="imoveis.php" class="btn btn-primary">Voltar</a>

                </form>
            </div>
        </div>
    </div>
    </div>

    <?php include "template_footer_imoveis.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>