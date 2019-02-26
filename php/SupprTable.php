<?php   

/*if(!empty($_POST["table"]) && !empty($_POST["elem"]) && !empty($_POST["indi"])){
	DeleteLine();
}*/
function DeleteLine($table,$champ,$id){
	/*$table=$_POST["table"];
	$id=$_POST["elem"];
	$champId=$_POST["indi"];
	*/
	try{
			 $bdd = new PDO('mysql:host=127.0.0.1;port=3306;dbname=chiesa_php_acounting;charset=utf8','root','1234');
			}

			catch(Exception $e){
				die('erreur:'.$e->getMessage());
			}

      $requete=$bdd->query('DELETE from '.$table.' where '.$champ.' = '.$id);

}


?>
