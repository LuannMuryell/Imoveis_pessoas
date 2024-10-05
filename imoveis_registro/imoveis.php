<!--
Este arquivo é a interface central para visualizar o registro de imóveis. Contém funções para consultar, editar, excluir, pesquisar e criar um novo registro. Além disso, permite que acesse a interface de pessoas. 
-->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <title>Imóveis registrados</title>
</head>

<body>
    <?php
    include_once "../conexao.php";
    include "template_header_imoveis.php";

    $pesquisa = $_POST['busca'] ?? '';
    $sql = "SELECT imoveis.*, pessoas.nome AS contribuinte_nome 
            FROM imoveis 
            JOIN pessoas ON imoveis.contribuinte = pessoas.id 
            WHERE logradouro LIKE '%$pesquisa%'";

    $dados = mysqli_query($conn, $sql);
    ?>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <h3>Registro de Imóveis - São Leopoldo, RS</h3>

                <!-- Novo Cadastro -->
                <a href="imoveis_cadastro.php" class="btn btn-primary">Novo registro</a>

                <nav class="navbar bg-body-tertiary">
                    <div class="container-fluid">
                        <form class="d-flex" role="search" action="imoveis.php" method="POST">
                            <input class="form-control me-2" type="search" placeholder="Ex.: Dom João Becker" aria-label="search" name="busca" autofocus>
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>
                </nav>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Inscrição Municipal</th>
                            <th scope="col">Logradouro</th>
                            <th scope="col">Número</th>
                            <th scope="col">Bairro</th>
                            <th scope="col">Complemento</th>
                            <th scope="col">Contribuinte</th>
                            <th scope="col">Funções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($linha = mysqli_fetch_assoc($dados)) {
                            $inscricao_municipal = $linha['inscricao_municipal'];
                            $logradouro = $linha['logradouro'];
                            $numero = $linha['numero'];
                            $bairro = $linha['bairro'];
                            $complemento = $linha['complemento'];
                            $contribuinte = $linha['contribuinte_nome'];

                            echo "<tr>
                        <th scope='row'>$inscricao_municipal</th>
                        <td>$logradouro</td>
                        <td>$numero</td>
                        <td>$bairro</td>
                        <td>$complemento</td>
                        <td>$contribuinte</td>
                        <td width=250px>
                        <a href='imoveis_consulta.php?inscricao_municipal=$inscricao_municipal' class='btn btn-primary btn-sm'>Consultar</a>
                        <a href='confirmacao.php?inscricao_municipal=$inscricao_municipal' class='btn btn-success btn-sm'>Editar</a>
                        <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirmacao' onclick=" . '"' . "excluir_dados($inscricao_municipal, '$logradouro')" . '"' . ">Excluir</a>
                        </td>
                        </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php include "template_footer_imoveis.php"; ?>
    </div>

    <!-- Caixa de texto para confirmar se quer realmente excluir ou não -->
    <div class="modal fade" id="confirmacao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="script_excluir_imovel.php" method="POST">
                        <p>Deseja realmente excluir o imóvel localizado em <b id="nome_imovel"></b>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input type="hidden" name="inscricao_municipal" id="valordoid" value="">
                    <input type="hidden" name="logradouro" id="nome_remover" value="">
                    <input type="submit" class="btn btn-danger" value="Excluir">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function excluir_dados(inscricao_municipal, logradouro) {
            document.getElementById('nome_imovel').innerHTML = logradouro;
            document.getElementById('valordoid').value = inscricao_municipal;
            document.getElementById('nome_remover').value = logradouro;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>