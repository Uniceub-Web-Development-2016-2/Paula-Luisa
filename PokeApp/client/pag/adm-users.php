<?php
if(!isset($_SESSION['username'])){
	header("Location: ./inicio");
}
if($_SESSION['type'] != 2){
	header("Location: ./inicio");
}

 ?>

<div class="container">
<table class="table" style="margin: 80px 0;">
  <tr>
  <thead>
  	<th>#</th>
  	<th>Name</th>
  	<th>Username</th>
  	<th>E-mail</th>
  	<th>Type</th>
  	<th>Location</th>
  	<th style="text-align: center;">Actions</th>
  </thead>
  </tr>
  <?php
  //Usuários
  $allUsers = request('user', 'search', 'get');
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
