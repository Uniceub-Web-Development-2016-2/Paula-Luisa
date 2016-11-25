<?php
if(!isset($_SESSION['username'])){
 ?>

<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Hey!</h1>
        <p>Para utilizar o site utilize a barra de menu para logar. Arigatou</p>
        <p><a class="btn btn-primary btn-lg" href="./cadastrar" role="button">Cadastro &raquo;</a></p>
      </div>
    </div>
  <?php }else{ ?>
  <div class="jumbotron">
      <div class="container">
        <h1>Hey <?php echo $_SESSION['name']; ?></h1>
        <p>Para utilizar o site utilize a barra de menu para logar. Arigatou</p>
      </div>
    </div>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Conta</h2>
          <p><a class="btn btn-success" href="./conta" role="button">Edit &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Pokémons</h2>
          <p><a class="btn btn-success" href="./pokemonlist" role="button">View list &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-success" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <hr>
      <?php } ?>
