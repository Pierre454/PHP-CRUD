
<?php
function DemandeUpdate($champ,$id,$table){
	$bdd=connexion('root','1234');
	$requete=$bdd->query('SELECT * FROM '.$table.' where '.$champ.' = '.$id)->fetchAll();
			if (empty($requete)) {
  				echo'<div id="tableVide">Accés à la table impossible</div>';
  				return;
			}
			// On fait un tour de table pour récupérer les noms de colonne
			echo('<form id="modif" method="post" action="handler.php"');
				foreach ($requete[0] as $colonne => $valeur) {
					if(!(is_numeric($colonne))){
						if($colonne===key($requete[0])){
							echo('<input type="hidden" name="'.$colonne.'" value="'.$valeur.'">');	
						}
						else{
						echo('<input type="text" name="'.$colonne.'" value="'.$valeur.'">');
						}	
					}
				}
				echo('<button type="submit" name="ModifId" value="'.$requete[0][0].'">modifier</button>');
				echo('</form>');

}
	
function UpdateClient($idC,$nomC,$adresseC,$telC,$mailC){
	$bdd=connexion('root','1234');

	$requete=$bdd->query('UPDATE CLIENT SET '.
							'c_nom = \''.$nomC.
							'\', c_adresse = \''.$adresseC.
							'\', c_telephone = \''.$telC.
							'\', c_mail = \''.$mailC.
							'\' WHERE c_id = '.$idC
							);

}
function UpdateFournisseur($idF,$nomF,$adresseF,$telF,$mailF){
	$bdd=connexion('root','1234');
	$requete=$bdd->query('UPDATE FOURNISSEUR SET '.
							'f_nom = \''.$nomF.
							'\', f_adresse = \''.$adresseF.
							'\', f_telephone = \''.$telF.
							'\', f_mail = \''.$mailF.
							'\' WHERE f_id = '.$idF
							);
}
?>