<?php
if(isset($_POST['enviar'])){
    unset($_GET);
    unset($_POST['enviar']);
    $_POST['id'] = $_POST['idUser'];
    unset($_POST['idUser']);


    $update = request('user', 'update', 'put');
    header("Location: ./adm-users");

}else{

    $requestedUserParam = array('idUser' => $_GET['id']);
    $requestedUser = request('user', 'search', 'get', $requestedUserParam);
    $requestedUser = json_decode($requestedUser, true)[0];

    if(count($requestedUser) == 0){
        header("Location: ./inicio");
    }

 ?>


<div class="container">
      <!-- Example row of columns -->
      <div class="row"  style="margin: 150px 0">
        <section class="form">

            <form name="form" action="" method="post">
            <input type="hidden" name="idUser" value="<?php echo $requestedUser['idUser'] ?>" />
                <label>Nome:</label>
                <input type="text" class="form-control" value="<?php echo $requestedUser['name'] ?>" name="name" required autocomplete="off"/>
                <label>Username:</label>
                <input type="text" class="form-control" id="disabledInput" value="<?php echo $requestedUser['username'] ?>" name="username" disabled/>
                <label>Seu endereço de e-mail:</label>
                <input type="email" name="email" class="form-control" id="email" value="<?php echo $requestedUser['email'] ?>" required autocomplete="off" pattern="[^ @]+@[^ @]+.[a-z]+">
                <label>Status:</label>
                <input type="radio" name="status" value="0" <?php if($requestedUser['status'] == 0){echo "checked";} ?> /> Ainda jogo
                <input type="radio" name="status" value="1" <?php if($requestedUser['status'] == 1){echo "checked";} ?>/> Não jogo mais<br>
                <label>Type</label>
                <select name="type" class="form-control">
                    <option value="1" <?php if($requestedUser['type'] == 1){echo "selected";} ?> >User</option>
                    <option value="2" <?php if($requestedUser['type'] == 2){echo "selected";} ?> >Admin</option>
                </select>
                <label>Localidade:</label>
                <select name="location_idlocation" class="form-control">
                    <?php

                    $requestLocation = request('location', 'search', 'get');
                    $locations = json_decode($requestLocation, true);
                    $local = "";

                    foreach ($locations as $value) {
                        $checked = "";
                        if($requestedUser['location_idlocation'] == $value['idlocation']){
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