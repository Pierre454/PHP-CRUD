<?php

function SaisirClient(){
	echo'<form id="SaisieClient" class="formulaire" method="post" action="handler.php">
  <input class="saisie" type="text" name="nomC" placeholder="Nom du client" ><br>
  <input class="saisie" type="text" name="adresseC" placeholder="Adresse du client" ><br>
  <input class="saisie" type="text" name="telC" placeholder="Telephone du client" ><br>
  <input class="saisie" type="text" name="mailC" placeholder="Mail du client" ><br>
  <input class="btn" type="submit" value="Ajouter">
</form>';


}
function SaisirFournisseur(){
	echo'<form id="SaisieFournisseur" class="formulaire" method="post" action="handler.php">
  <input class="saisie" type="text" name="nomF" placeholder="Nom du fournisseur" ><br>
  <input class="saisie" type="text" name="adresseF" placeholder="Adresse du fournisseur" ><br>
  <input class="saisie" type="text" name="telF" placeholder="Telephone du fournisseur" ><br>
  <input class="saisie" type="text" name="mailF" placeholder="Mail du fournisseur" ><br>
  <input class="btn" type="submit" value="Ajouter">
</form>';
	
}
?>