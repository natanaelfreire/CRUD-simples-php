<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Esclusão de Cadastro</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
          <?php
            include "conexao.php";

            $id = $_POST['id'];
            $nome = $_POST['nome'];

            $sql = "DELETE FROM `pessoas` 
                    WHERE cod_pessoa = $id";

            if (mysqli_query($conn, $sql)) {
              mensagem("$nome excluído com sucesso!", 'success');
            } else {
              mensagem("$nome NÃO excluído.", 'danger');
            }
          ?>

          <a href="index.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>