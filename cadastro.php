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

        <form action="cadastro_script.php" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-2">
              <div class="card border-0">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center"> 
                    <img src="img/default-profile.png" id="profilePicture" alt="Admin" class="rounded-circle" width="120">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-10">
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
            <div class="col-xs-12 col-md-6 form-group">
              <label for="foto" class="form-label">Foto</label>
              <input type="file" class="form-control" id="foto" name="foto" accept="image/jpg, image/jpeg, image/png">
              <input type="hidden" id="foto_base64" name="foto_base64">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-12 form-group mt-3">
              <input type="submit" class="btn btn-success">
            </div>
          </div>
        </form>
    </div>

    <script type="text/javascript">
      var foto = document.getElementById('foto');
      foto.addEventListener("change", function (thisFoto, ev) {
        
        var reader = new FileReader();
        var file = thisFoto.target.files[0];
        var preview = document.getElementById('profilePicture');

        reader.onloadend = function () {
          preview.setAttribute('src', reader.result);
          document.getElementById('foto_base64').value = reader.result;
        }

        if (file)
          reader.readAsDataURL(file);
        else
          preview.setAttribute('src', 'img/default-profile.png');
      });
    </script>

    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>