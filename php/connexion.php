

<?php

	session_start();

	try
	{
		$bdd = new PDO('mysql:host=127.0.0.1;port=3306;dbname=chiesa_php_acounting;charset=utf8', 'root', '1234');
		$_SESSION['id'] = $_POST['id'];
  		$_SESSION['mdp'] = $_POST['mdp'];
  		$_SESSION['err'] = '';
	}
	catch(PDOException $e)
	{
		$_SESSION['err'] = 'Identifiant ou mot de passe incorrect';
	}
	/*finally
	{
		header('Location: bdd_admin.php');
		exit();
	}*/
	$id=$_POST['id'];
	$mdp=$_POST['mdp'];


	function verif($id,$mdp){
		if($id== 'root' && $mdp=='1234'){
			echo "ok";
			header('Location: handler.php');
		}
		else 
			echo "mauvaises valeurs";

	}
	verif($id,$mdp);

?>

