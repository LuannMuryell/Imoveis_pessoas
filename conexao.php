<!--
Este arquivo estabelece a conexão com o banco de dados MySQL utilizado para armazenar informações dos imóveis e pessoas cadastradas. Além disso, há funções como function data, por exemplo, que é para ajustar a escrita de datas utilizada no Brasil (mm/dd/aa).
-->

<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$bd = 'projeto_imoveis'; // Base de dados

if($conn = mysqli_connect($server, $user, $pass, $bd)){
      // echo "Conexão feita com sucesso"; está comentado para não ficar aparecendo a mensagem em todas as telas
}else{
    echo "Conexão não foi feita";
}

function confirmacao($texto, $alert){
    echo "<div class='alert alert-$alert' role='alert'>
        $texto
        </div>";
}

function data($data){
    $calendar = explode('-',$data);
    $escreve = $calendar[2] . "/" . $calendar[1] . "/" . $calendar [0];
    return $escreve;
}