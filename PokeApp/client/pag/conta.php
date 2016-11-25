<?php
if(isset($_POST['enviar'])){

    unset($_POST['enviar']);
    $_POST['id'] = $_SESSION['idUser'];


    $update = request('user', 'update', 'put');

}else{

 ?>


<div class="container">
      <!-- Example row of columns -->
      <div class="row"  style="margin: 150px 0">
        <section class="form">

            <form name="form" action="" method="post">
                <label>Nome:</label>
                <input type="text" class="form-control" value="<?php echo $_SESSION['name'] ?>" name="name" required autocomplete="off"/>
                <label>Username:</label>
                <input type="text" class="form-control" id="disabledInput" value="<?php echo $_SESSION['username'] ?>" name="username" disabled/>
                <label>Seu endereço de e-mail:</label>
                <input type="email" name="email" class="form-control" id="email" value="<?php echo $_SESSION['email'] ?>" required autocomplete="off" pattern="[^ @]+@[^ @]+.[a-z]+">
                <label>Status:</label>
                <input type="radio" name="status" value="0" <?php if($_SESSION['status'] == 0){echo "checked";} ?> /> Ainda jogo
                <input type="radio" name="status" value="1" <?php if($_SESSION['status'] == 1){echo "checked";} ?>/> Não jogo mais<br>
                <label>Localidade:</label>
                <select name="location_idlocation" class="form-control">
                    <?php

                    $requestLocation = request('location', 'search', 'get');
                    $locations = json_decode($requestLocation, true);
                    $local = "";

                    foreach ($locations as $value) {
                        $checked = "";
                        if($_SESSION['location_idlocation'] == $value['idlocation']){
                            $checked = "selected";
                        }
                      $local .= "<option value='{$value['idlocation']}' {$checked}>{$value['namecountry']}</option>";
                    }
                    echo $local;

                    ?>
                </select>                 
                <input class="btn btn-success botao" type="submit" name="enviar" value="Alterar">
            </form>

</section> 
      </div>
      <?php } ?>