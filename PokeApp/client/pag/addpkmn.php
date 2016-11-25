   <div class="container">
      <!-- Example row of columns -->
      <div class="row"  style="margin: 150px 0">
        <section class="form">

            <form name="form" action="" method="post">

                <!-- Isso aqui adiciona o tipo do fdp eu acho -->
                <label>Species:</label>
                <select name="species_idPokemon" class="form-control">
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
                <input type="text" class="form-control" value="<?php echo $tipo ?>" name="name" required autocomplete="off"/>
                <label>Combat Power:</label>
                <input type="text" class="form-control" placeholder="Insira o CP do seu Pokémon" name="username" required autocomplete="off"/>
                <label>Attack IV:</label>
                <input type="text" class="form-control" placeholder="Insira o valor de 1 a 15 do IV do seu Pokémon" name="username" required autocomplete="off"/>
                <label>Defense IV:</label>
                <input type="text" class="form-control" placeholder="Insira o valor de 1 a 15 do IV do seu Pokémon" name="username" required autocomplete="off"/>
                <label>Stamina IV:</label>
                <input type="text" class="form-control" placeholder="Insira o valor de 1 a 15 do IV do seu Pokémon" name="username" required autocomplete="off"/>

                <!-- Isso aqui adiciona o quick attack se deus quiser -->
                <label>Quick Attack:</label>
                <select name="name_idquickmove" class="form-control">
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
                <select name="name_chargemove" class="form-control">
                    <?php

                    $requestChargemove = request('chargemove', 'search', 'get');
                    $nominho = json_decode($requestChargemove, true);
                    $chargeatt = "";

                    foreach ($nominho as $value) {
                      $chargeatt .= "<option value='{$value['idPokemon']}'>{$value['name']}</option>";
                    }
                    echo $chargeatt;

                    ?>
                </select> 

                

                                
                <input class="btn btn-success botao" type="submit" name="enviar" value="Adicionar">
            </form>

</section> 
      </div>