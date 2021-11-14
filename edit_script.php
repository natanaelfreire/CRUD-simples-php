<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Cadastro</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
          <?php
            include "conexao.php";

            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $data_nascimento = $_POST['data_nascimento'];
            $foto_base64 = $_POST['foto_base64'];

            $foto = $_FILES['foto'];
            $nome_foto = mover_foto($foto);
            if ($nome_foto == 0) {
              $nome_foto = 'erro_na_foto.jpg';
              $foto_base64 = 'error';
            }

            $sql = "UPDATE `pessoas` set 
                    `nome` = '$nome', `endereco` = '$endereco', `telefone` = '$telefone', `email` = '$email', `data_nascimento` = '$data_nascimento', `foto` = '$nome_foto', `foto_base64` = '$foto_base64' 
                    WHERE cod_pessoa = $id";

            if (mysqli_query($conn, $sql)) {
              mensagem("$nome alterado com sucesso!", 'success');
            } else {
              mensagem("$nome não foi alterado.", 'danger');
            }
          ?>

          <a href="pesquisa.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>