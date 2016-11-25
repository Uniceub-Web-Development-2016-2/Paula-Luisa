<?php 
include("request.php");
if(isset($_GET['species'])){

$request = request('pokemon', 'search', 'get', $_GET);
$request = json_decode($request, true);

var_dump($request);

}else{

?>
<form action="" method="get">

<input type="text" name="species" placeholder="Digite a pesquisa filha da puta" />
<input type="submit" value="Envia ae teu escroto" />


</form>
<?php } ?>