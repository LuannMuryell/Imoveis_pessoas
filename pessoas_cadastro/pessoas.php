<!--
Este arquivo é a interface central para visualizar o cadastro de pessoas. Contém funções para consultar, editar, excluir, pesquisar e criar um novo cadastro. Além disso, permite que acesse a interface de imóveis. 
-->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <title>Pessoas cadastradas</title>
</head>

<body>
    <?php
    include_once "../conexao.php";
    include "template_header.php";
    $pesquisa = $_POST['busca'] ?? '';
    $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";
    $dados = mysqli_query($conn, $sql);
    ?>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <h3>Cadastro de Pessoas</h3>
                <a href="pessoas_cadastro.php" class="btn btn-primary">Novo cadastro</a>
                <nav class="navbar bg-body-tertiary">
                    <div class="container-fluid">
                        <form class="d-flex" role="search" action="pessoas.php" method="POST">
                            <input class="form-control me-2" type="search" placeholder="Ex.: Luann" aria-label="search" name="busca" autofocus>
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>
                </nav>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Gênero</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Funções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($linha = mysqli_fetch_assoc($dados)) {
                            $id = $linha['id'];
                            $nome = $linha['nome'];
                            $data_nascimento = $linha['data_nascimento'];
                            $data_nascimento = data($data_nascimento);
                            $cpf = $linha['cpf'];
                            $genero = $linha['genero'];
                            $telefone = $linha['telefone'];
                            $email = $linha['email'];

                            echo "<tr>
                        <th scope='row'>$id</th>
                        <td>$nome</td>
                        <td>$data_nascimento</td>
                        <td>$cpf</td>
                        <td>$genero</td>
                        <td>$telefone</td>
                        <td>$email</td>
                        <td width=250px>
                        <a href='pessoas_consulta.php?id=$id' class='btn btn-primary btn-sm'>Consultar</a>
                        <a href='edicao.php?id=$id' class='btn btn-success btn-sm'>Editar</a>
                        <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirmacao' onclick=" . '"' . "excluir_dados($id, '$nome')" . '"' . ">Excluir</a>
                        </td>
                        </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php include "template_footer.php"; ?>

    </div>

    <!-- Caixa de texto para confirmar se quer realmente excluir ou não algum cadastro -->
    <div class="modal fade" id="confirmacao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="script_excluir.php" method="POST">
                        <p>Deseja realmente excluir <b id="nome_pessoa"></b>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input type="hidden" name="id" id="valordoid" value="">
                    <input type="hidden" name="nome" id="nome_remover" value="">
                    <input type="submit" class="btn btn-danger" value="Excluir">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function excluir_dados(id, nome) {
            document.getElementById('nome_pessoa').innerHTML = nome;
            document.getElementById('valordoid').value = id;
            document.getElementById('nome_remover').value = nome;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>