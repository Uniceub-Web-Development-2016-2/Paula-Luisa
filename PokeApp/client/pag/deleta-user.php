	<?php 
	if(!isset($_GET['id'])){
		header("Location: ./inicio");
	}else{

		if($_SESSION['type'] != 2){
			header("Location: ./inicio");
		}
		$params = array("idUser" => $_GET['id']);
		$onDbUser = request('user', 'search', 'get', $params);
		$onDbUser = json_decode($onDbUser, true)[0];
		if(count($onDbUser) == 0){
			header("Location: ./inicio");
		}else{

			if(isset($_POST['enviar'])){
				unset($_GET);
				unset($_POST);
				$_POST['id'] = $onDbUser['idUser'];
				$delete = request('user', 'remove', 'delete');
				header("Location: ./adm-users");
			}	

		}

	?>

	<div class="jumbotron">
      <div class="container">
        <h2>Tem certeza de quer fazer isso?</h2>
        <p>Sério mesmo? Depois não tem volta em.</p>

        <form name="form" action="" method="post">
        <input class="btn btn-danger" type="submit" name="enviar" value="Sim">
        </form>

      </div>
    </div>

    <?php } ?>