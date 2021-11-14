<?php
  include "env.php";

  $server = $ENV_SERVER;
  $user = $ENV_USER;
  $pass = $ENV_PASSWORD;
  $bd = $ENV_BD;

  if ($conn = mysqli_connect($server, $user, $pass, $bd)) {
    // echo "Conectado!";
  } else {
    echo "Erro";
  }

  function mensagem($texto, $tipo) {
    echo "<div class='alert alert-$tipo' role='alert'>
            $texto
          </div>";
  }

  function mostra_data($data) {
    $d = explode('-', $data);
    $escreve = $d[2] ."/" .$d[1] ."/" .$d[0];

    return $escreve;
  }
  
?>