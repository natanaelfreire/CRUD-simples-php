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
        <div class="col-md-10">
          <h1>Cadastro</h1> 
        </div>
        <div class="col-md-2 d-flex justify-content-md-end align-items-md-center">
          <a href="index.php" class="btn btn-primary mt-2">Voltar ao Início</a>
        </div>
      </div>
               

        <form action="cadastro_script.php" method="POST">
          <div class="row">
            <div class="col-xs-12 col-md-12 form-group">
              <label for="nome" class="form-label">Nome Completo</label>
              <input type="text" class="form-control" name="nome" required>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-12 form-group">
              <label for="endereco" class="form-label">Endereço</label>
              <input type="text" class="form-control" name="endereco">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-6 form-group">
              <label for="telefone" class="form-label">Telefone</label>
              <input type="text" class="form-control" name="telefone">
            </div>
            <div class="col-xs-12 col-md-6 form-group">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-6 form-group">
              <label for="dt_nascimento" class="form-label">Data de Nascimento</label>
              <input type="date" class="form-control" name="data_nascimento">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-12 form-group mt-2">
              <input type="submit" class="btn btn-success">
            </div>
          </div>
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>