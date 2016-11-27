<div class="container">
      <!-- Example row of columns -->
      <div class="row"  style="margin: 150px 0">
        <p><a class="btn btn-info" href="./addpkmn" role="button">Adicionar Novo &raquo;</a></p>
      </div>


      <!-- fuck trevor
<div class="container">
<table class="table" style="margin: 80px 0;">
  <tr>
  <thead>
  	<th>#</th>
  	<th>Species</th>
  	<th>Nickname</th>
  	<th>Attack IV</th>
  	<th>Defense IV</th>
  	<th>Stamina IV</th>
  	<th>Combat Power</th>
  	<th>Quick Attack</th>
  	<th>Charge Attack</th>
  	<th style="text-align: center;">Actions</th>
  </thead>
  </tr>
  <?php
  //Usuários
  $allUsers = request('pokemon', 'search', 'get');
  $allUsers = json_decode($allUsers, true);

  foreach ($allUsers as $value) {
  	$type = "User";

  	//Location
  	$locationParams = array("idLocation" => $value['location_idlocation']);
  	$location = request('location', 'search', 'get', $locationParams);
  	$location = json_decode($location, true)[0];

  	if($value['type'] == 2){
  		$type = "Admin";
  	}

   ?>
  <tr>
  	<td><?php echo $value['idUser'] ?></td>
  	<td><?php echo $value['name'] ?></td>
  	<td><?php echo $value['username'] ?></td>
  	<td><?php echo $value['email'] ?></td>
  	<td><?php echo $type; ?></td>
  	<td><?php echo $location['namecountry'] ?></td>
  	<td style="text-align: center;"><a href="./editar-user?id=<?php echo $value['idUser'] ?>" title="Editar usuário"><span class="ion ion-ios-color-wand" style="font-size: 22px;"></span></a>
  	<a href="./deleta-user?id=<?php echo $value['idUser']  ?>" title="Editar usuário"><span class="ion ion-ios-close" style="font-size: 22px;"></span></a></td>
  </tr>
  <?php } ?>
</table>
-->