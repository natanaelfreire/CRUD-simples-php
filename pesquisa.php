<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Cadastro</title>
  </head>
  <body>
    
    <?php
      $pesquisa = $_POST['busca'] ?? '';

      include "conexao.php";

      $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";

      $dados = mysqli_query($conn, $sql);
    ?>

    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1>Pesquisar</h1> 
        </div>
        <div class="col-md-2 d-flex justify-content-md-end align-items-md-center">
          <a href="index.php" class="btn btn-primary mt-2">Voltar ao Início</a>
        </div>
      </div>    

        <div class="row">
          <div class="col-md-12">
            <nav class="navbar navbar-light bg-light">
              <form class="d-flex" action="pesquisa.php" method="POST">
                <input class="form-control mr-sm-2" type="search" placeholder="Nome" aria-label="Pesquisar" name="busca" autofocus>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
              </form>
            </nav>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <table class="table table-hover">
              <thead class="thead-dark">
                <tr>
                  <th scope="col" class="text-center">Foto</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Endereço</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">Email</th>
                  <th scope="col">Data de Nascimento</th>
                  <th scope="col" class="text-center">Funções</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  while ($linha = mysqli_fetch_assoc($dados)) {
                    $cod_pessoa = $linha['cod_pessoa'];
                    $nome = $linha['nome'];
                    $endereco = $linha['endereco'];
                    $telefone = $linha['telefone'];
                    $email = $linha['email'];
                    $data_nascimento = $linha['data_nascimento'];
                    $data_nascimento = mostra_data($data_nascimento);
                    $foto = $linha['foto']; 
                    if (!$foto) 
                      $foto = 'default-profile.png';

                    echo "<tr>
                            <td><img src='img/$foto' style='width: 70px; border-radius: 70px;'></td>
                            <th scope='row'>$nome</th>
                            <td>$endereco</td>
                            <td>$telefone</td>
                            <td>$email</td>
                            <td>$data_nascimento</td>
                            <td width='150px' class='text-center'>
                              <a href='cadastro_edit.php?id=$cod_pessoa' class='btn btn-success btn-sm'>Editar</a>
                              <a href='#' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#modal_confirma'
                              onclick=" .'"'."pegar_dados($cod_pessoa, '$nome')" .'"' .">Excluir</a>
                            </td>
                          </tr>";
                  }

                ?>
                
              </tbody>
            </table>
          </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal_confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="excluir_script.php" method="POST">
              <p>Deseja realmente excluir <b id="nome_pessoa">Nome da pessoa</b>?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
            <input type="hidden" name="nome" id="nome_pessoa_1" value="">
            <input type="hidden" name="id" id="cod_pessoa" value="">
            <input type="submit" class="btn btn-danger" value="Sim">
            </form>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      function pegar_dados(id, nome) {
        document.getElementById('nome_pessoa').innerHTML = nome;
        document.getElementById('nome_pessoa_1').value = nome;
        document.getElementById('cod_pessoa').value = id;
      }
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>