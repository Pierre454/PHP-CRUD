<?php 

		// Quelques variables
		$annee;
		$compteur;

		
		//$client=$bdd->query('SELECT * FROM CLIENT')->fetchAll();

		//$sql='select * from CLIENT';
		function connexion($id,$mdp){
			try{
				return $bdd = new PDO('mysql:host=127.0.0.1;port=3306;dbname=chiesa_php_acounting;charset=utf8', $id, $mdp);
			}

			catch(Exception $e){
				die('erreur:'.$e->getMessage());
			}
		}
		
		// Fonction effectuant la requete select * de la table en paramètre
		function requete($table){
			$bdd=connexion('root','1234');
			switch ($table){
				case'CLIENT':
					$requete=$bdd->query('SELECT * FROM CLIENT')->fetchAll();
					break;
				case'FOURNISSEUR':
					$requete=$bdd->query('SELECT * FROM FOURNISSEUR')->fetchAll();
					break;

			}
			return $requete;

		}
		// Fonction affichant les valeurs de la table donnée en paramètre
		function afficher($table){
					$requete=requete($table);
					if (empty($requete)) {
		  				echo'<div id="tableVide">La table est vide</div>';
		  				return;
					}
					echo('<table id="tableauSelect" class="table-fill" border="1"><tr class="text-left">');
					
					// On fait un tour de table pour récupérer les noms de colonne
					for($i=0;$i<1;$i++){
						foreach ($requete[$i] as $colonne => $valeur) {
							if(!(is_numeric($colonne)))
								echo('<th class="text-left">'.$colonne.'</th>');	
						}
					}
					echo('<th class="text-left"></th>');
					echo('<th class="text-left"></th>');

					echo("</tr>");
					
					// On remplit le tableau
					$ligne=0; 
					foreach ($requete as $key => $value) {
						
						echo('<tr class="text-left">');
						foreach ($value as $champ => $valeur) {
							if(!(is_numeric($champ)))
								echo('<td class="text-left">'.$valeur.'</td>');

						}
						echo ('<td class="text-left"><form id="suppr" method="post" action="handler.php">
		  <input type="hidden" name="supprCh" value="'.key($requete[0]).'" >
		  <input type="hidden" name="supprTab" value="'.$table.'" >
		  <button type="submit" class="s" name="supprId" value="'.$requete[$ligne][0].'">suppr</button>
		</td>');
						echo('<td><form id="modif" method="post" action="handler.php">
		  <input type="hidden" name="ModifCh" value="'.key($requete[0]).'" >
		  <input type="hidden" name="ModifTab" value="'.$table.'" >
		  <button class="m" type="submit" name="ModifId" value="'.$requete[$ligne][0].'">modif</button>
		  </form></td>');
						echo('</tr>');
						$ligne++;
					}
					echo("</table>");

				}

				// <input type="button" class="m" value="modif" onclick="modif(this,"'.$table.'")">

		function ajouterLigneClient($nom,$adresse,$telephone,$mail){
			$bdd=connexion('root','1234');
			$requete=$bdd->query('INSERT INTO CLIENT (c_nom,c_adresse,c_telephone,c_mail) VALUES ("'.$nom.'","'.$adresse.'","'.$telephone.'","'.$mail.'")');		
		}

		function ajouterLigneFournisseur($nomF,$adresseF,$telephoneF,$mailF){
			$bdd=connexion('root','1234');
			$requete=$bdd->query('INSERT INTO FOURNISSEUR (f_nom,f_adresse,f_telephone,f_mail) VALUES ("'.$nomF.'","'.$adresseF.'","'.$telephoneF.'","'.$mailF.'")');			
		}
		
				

 ?>

