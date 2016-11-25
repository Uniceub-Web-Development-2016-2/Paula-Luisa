   <?php

if(isset($_POST['enviar'])){
  unset($_POST['enviar']);
  $_POST['user_idUser'] = $_SESSION['idUser'];
  if ($_POST['attackIv'] > 15 || $_POST['defenseIv'] > 15 || $_POST['staminaIv'] > 15) {
      echo '<div class="jumbotron">
      <div class="container">
        <h1>Erro</h1>
        <p>O IV do Pokémon é inválido.</p>
        <p><a class="btn btn-primary btn-lg" href="./addpkmn" role="button">Voltar &raquo;</a></p>
      </div>
    </div>';

   
  } else {
    $response = request("user_has_pokemon", "create", "post");
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

                <!-- Isso aqui adiciona o tipo do fdp eu acho -->
                <label>Species:</label>
                <select name="pokemon_idPokemon" class="form-control">
                    <?php

                    $requestPokemon = request('pokemon', 'search', 'get');
                    $species = json_decode($requestPokemon, true);
                    $tipo = "";

                    foreach ($species as $value) {
                      $tipo .= "<option value='{$value['idPokemon']}'>{$value['species']}</option>";
                    }
                    echo $tipo;

                    ?>
                </select> 




                <label>Nickname:</label>
                <input type="text" class="form-control" placeholder="Escolha um nome para o seu Pokémon" name="nickname" required autocomplete="off"/>
                <label>Combat Power:</label>
                <input type="text" class="form-control" placeholder="Insira o CP do seu Pokémon" name="combatPower" required autocomplete="off"/>
                <label>Attack IV:</label>
                <input type="text" class="form-control" placeholder="Insira o valor de 1 a 15 do IV do seu Pokémon" name="attackIv" required autocomplete="off"/>
                <label>Defense IV:</label>
                <input type="text" class="form-control" placeholder="Insira o valor de 1 a 15 do IV do seu Pokémon" name="defenseIv" required autocomplete="off"/>
                <label>Stamina IV:</label>
                <input type="text" class="form-control" placeholder="Insira o valor de 1 a 15 do IV do seu Pokémon" name="staminaIv" required autocomplete="off"/>

                <!-- Isso aqui adiciona o quick attack se deus quiser -->
                <label>Quick Attack:</label>
                <select name="quickmove_idquickmove" class="form-control">
                    <?php

                    $requestQuickmove = request('quickmove', 'search', 'get');
                    $name = json_decode($requestQuickmove, true);
                    $quickatt = "";

                    foreach ($name as $value) {
                      $quickatt .= "<option value='{$value['idquickmove']}'>{$value['name']}</option>";
                    }
                    echo $quickatt;

                    ?>
                </select> 


                <!-- Isso aqui adiciona o charge attack se deus quiser -->
                <label>Charge Attack:</label>
                <select name="chargemove_idchargemove" class="form-control">
                    <?php

                    $requestChargemove = request('chargemove', 'search', 'get');
                    $nominho = json_decode($requestChargemove, true);
                    $chargeatt = "";

                    foreach ($nominho as $value) {
                      $chargeatt .= "<option value='{$value['idchargemove']}'>{$value['name']}</option>";
                    }
                    echo $chargeatt;

                    ?>
                </select> 

                

                                
                <input class="btn btn-success botao" type="submit" name="enviar" value="Adicionar">
            </form>

</section> 
      </div>
      <?php } ?>