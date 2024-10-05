<!--
Este arquivo é a tela para atualizar/editar algum registro desejado. Para evitar preencher todo o formulário novamente, o código já manda os campos preenchidos com as informações antigas. 
-->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <title>Alteração de Registro de Imóveis</title>
</head>

<body>

    <?php
    include_once "../conexao.php";
    include "template_header_imoveis.php";

    if (isset($_GET['inscricao_municipal'])) {
        $inscricao_municipal = $_GET['inscricao_municipal'];

        $sql = "SELECT * FROM imoveis WHERE inscricao_municipal = $inscricao_municipal";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $imovel = mysqli_fetch_assoc($result);
        } else {
            echo "Imóvel não encontrado.";
            exit;
        }
    } else {
        echo "ID do imóvel não foi fornecido.";
        exit;
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Alteração de Imóveis</h1><br>
                <h3>Edite os campos abaixo:</h3>

                <form action="edicao_cadastro_imoveis.php" method="POST">
                    <input type="hidden" name="inscricao_municipal" value="<?php echo $imovel['inscricao_municipal']; ?>">

                    <div class="mb-3">
                        <label for="logradouro">Logradouro:</label>
                        <input type="text" class="form-control" name="logradouro" value="<?php echo htmlspecialchars($imovel['logradouro']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="numero">Número:</label>
                        <input type="text" class="form-control" name="numero" value="<?php echo htmlspecialchars($imovel['numero']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="bairro">Bairro:</label>
                        <input type="text" class="form-control" name="bairro" value="<?php echo htmlspecialchars($imovel['bairro']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="complemento">Complemento:</label>
                        <input type="text" class="form-control" name="complemento" value="<?php echo htmlspecialchars($imovel['complemento']); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="contribuinte">Contribuinte</label>
                        <select name="contribuinte" id="contribuinte" class="form-select">
                            <option value="">Selecione um contribuinte</option>
                            <?php
                            $sql_pessoas = "SELECT id, nome FROM pessoas";
                            $result_pessoas = mysqli_query($conn, $sql_pessoas);

                            if ($result_pessoas && mysqli_num_rows($result_pessoas) > 0) {
                                while ($pessoa = mysqli_fetch_assoc($result_pessoas)) {
                                    $selected = ($pessoa['id'] == $imovel['contribuinte']) ? 'selected' : '';
                                    echo "<option value='{$pessoa['id']}' $selected>{$pessoa['nome']}</option>";
                                }
                            } else {
                                echo "<option value=''>Nenhum contribuinte encontrado</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="imoveis.php" class="btn btn-primary">Voltar</a>
                </form>


            </div>
        </div>
    </div>

    <?php include "template_footer_imoveis.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>