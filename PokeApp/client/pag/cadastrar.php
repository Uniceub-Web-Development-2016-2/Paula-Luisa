<?php

if(isset($_POST['enviar'])){
  unset($_POST['enviar']);
  $_POST['type'] = 1;
  $crypt = new Crypt();
  $_POST['password'] = $crypt->generateHash($_POST['password']);
  $_POST['username'] = strtolower($_POST['username']);
  $isCadUser = onDb("user", array("username" => $_POST['username']));
  $isCadEmail = onDb("user", array("email" => $_POST['email']));

  if($isCadUser || $isCadEmail){
    echo '<div class="jumbotron">
      <div class="container">
        <h1>Ooooops</h1>
        <p>Usuário não pode ser cadastrado.</p>
        <p><a class="btn btn-primary btn-lg" href="./" role="button">Inicio &raquo;</a></p>
      </div>
    </div>';
  }else{
    $response = request("user", "create", "post");
    var_dump($response);
    echo '<div class="jumbotron">
      <div class="container">
        <h1>Gotta catch em all</h1>
        <p>Bem-vindo!.</p>
        <p><a class="btn btn-primary btn-lg" href="./" role="button">Inicio &raquo;</a></p>
      </div>
    </div>';
  }

}else{

 ?>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row"  style="margin: 150px 0">
        <section class="form">

            <form name="form" action="" method="post">
                <label>Nome:</label>
                <input type="text" class="form-control" placeholder="Como gostaria de ser chamado?" name="name" required autocomplete="off"/>
                <label>Username:</label>
                <input type="text" class="form-control" placeholder="Gostaria de ser conhecido como?" name="username" required autocomplete="off"/>
                <label>Seu endereço de e-mail:</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Deixe um e-mail para contato! :P" required autocomplete="off" pattern="[^ @]+@[^ @]+.[a-z]+">
                <label>Senha:</label>
                <input type="password" class="form-control" placeholder="...sua senha (shh)" name="password" required autocomplete="off"/>
                <label>Status:</label>
                <input type="radio" name="status" value="0" checked/> Ainda jogo
                <input type="radio" name="status" value="1"/> Não jogo mais<br>
                <label>Localidade:</label>
                <select name="location_idlocation" class="form-control">
                    <?php

                    $requestLocation = request('location', 'search', 'get');
                    $locations = json_decode($requestLocation, true);
                    $local = "";

                    foreach ($locations as $value) {
                      $local .= "<option value='{$value['idlocation']}'>{$value['namecountry']}</option>";
                    }
                    echo $local;

                    ?>
                </select>                 
                <input class="btn btn-success botao" type="submit" name="enviar" value="Enviar">
            </form>

</section> 
      </div>
      <?php } ?>

      <hr>
