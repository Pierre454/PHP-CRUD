<!--____________________________________________ Les include du php______________________________________________________ -->
<?php
include 'SaisieTable.php';    // formulaires d'ajout
include 'SupprTable.php';      // Supprime la ligne
include 'bdd_admin.php';
include 'UpdateTable.php'; 
?>

<!DOCTYPE html>
<html>
<head>
	<title>EspaceAdmin</title>
    <link rel="stylesheet" href="../css/ComptaCss.css"> 
    <link rel="stylesheet" href="../css/Onglet.css"> 
	   
     <script src="../js/jquery-3.2.1.min.js"></script>
     
</head>
<body>
<!--____________________________________________ Le script pour les onglets______________________________________________________ -->

<script src="../js/scriptAjax.js"></script>
<script src="../js/ActionTable.js"></script>
<script>
function suppr(tableau, element, Indid){
    console.log("Recu la table: "+tableau+" l'id est :"+Indid.textContent);

    // le ajax
    var table = tableau;
    var elem = element.parentNode.parentNode.firstChild.textContent;
    var indi = Indid.textContent;

    var request = new XMLHttpRequest();
    request.open('POST', 'SupprTable.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    request.send('table='+table+'&elem='+elem+'&indi='+indi);
  }

  function openTable(evt, tabname) {
    // Declare all variables
    var i, tabcontent, tablinks;

    

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
        tabcontent[i].className= "tabcontent close";

    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(tabname).style.display = "block";
    evt.currentTarget.className += " active";
    
    let y=document.getElementById(tabname).className;
    document.getElementById(tabname).className=y+" "+"defaultOpen";
}
</script>
</script>


<!--____________________________________________ Le html et php des onglets______________________________________________________ -->
	<div class="tab">
	  <button id="defaultOpen" class="tablinks" onclick="openTable(event, 'CLIENT')" >Client</button>
	  <button class="tablinks" onclick="openTable(event, 'FOURNISSEUR')">Fournisseur</button>
	</div>



<div id="CLIENT" class="tabcontent">
  <h3>Client</h3>

  <?php
    // Client
//Ajout
  if(!(empty($_POST['nomC'])) && !(empty($_POST['adresseC'])) && !(empty($_POST['telC'])) && !(empty($_POST['mailC']))){
    $tab="CLIENT";
    ajouterLigneClient($_POST['nomC'],$_POST['adresseC'],$_POST['telC'],$_POST['mailC']);
    unset($_POST['nomC'],$_POST['adresseC'],$_POST['telC'],$_POST['mailC']);
   
  }

// suppression 
  if (!(empty($_POST['supprCh'])) && !(empty($_POST['supprId'])) && !(empty($_POST['supprTab'])) && ($_POST['supprTab']==='CLIENT')){
    $tab="CLIENT";
      DeleteLine($_POST['supprTab'],$_POST['supprCh'],$_POST['supprId']);
      unset($_POST["supprTab"]);
    }

//modif:
    // demande
    if(!(empty($_POST['ModifCh'])) && !(empty($_POST['ModifId'])) && !(empty($_POST['ModifTab'])) && ($_POST['ModifTab']==='CLIENT')){
      $tab="CLIENT";
     DemandeUpdate($_POST['ModifCh'],$_POST['ModifId'],$_POST['ModifTab']);
  }
    // validation
  if(!(empty($_POST['ModifId'])) && !(empty($_POST['c_nom'])) && !(empty($_POST['c_adresse'])) && !(empty($_POST['c_telephone'])) && !(empty($_POST['c_mail']))){
    $tab="CLIENT";
    UpdateClient($_POST['ModifId'],$_POST['c_nom'],$_POST['c_adresse'],$_POST['c_telephone'],$_POST['c_mail']);
  }
  
   afficher("CLIENT");
       SaisirClient();
  ?>

</div>


<div id="FOURNISSEUR" class="tabcontent">
  <h3>Fournisseur</h3>
  <?php
    // Fournisseur

  if(!(empty($_POST['nomF'])) && !(empty($_POST['adresseF'])) && !(empty($_POST['telF'])) && !(empty($_POST['mailF']))){
    $tab="FOURNISSEUR";
    ajouterLigneFournisseur($_POST['nomF'],$_POST['adresseF'],$_POST['telF'],$_POST['mailF']);
    unset($_POST['nomF'],$_POST['adresseF'],$_POST['telF'],$_POST['mailF']);
    
  }
  if (!(empty($_POST['supprCh'])) && !(empty($_POST['supprId'])) && !(empty($_POST['supprTab'])) && ($_POST['supprTab']==='FOURNISSEUR')){
      $tab="FOURNISSEUR";
      DeleteLine($_POST['supprTab'],$_POST['supprCh'],$_POST['supprId']);
      unset($_POST["supprTab"]);
    }

  //modif:
    // demande
    if(!(empty($_POST['ModifCh'])) && !(empty($_POST['ModifId'])) && !(empty($_POST['ModifTab'])) && ($_POST['ModifTab']==='FOURNISSEUR')){
      $tab="FOURNISSEUR";
     DemandeUpdate($_POST['ModifCh'],$_POST['ModifId'],$_POST['ModifTab']);
  }
    // validation
  if(!(empty($_POST['ModifId'])) && !(empty($_POST['f_nom'])) && !(empty($_POST['f_adresse'])) && !(empty($_POST['f_telephone'])) && !(empty($_POST['f_mail']))){
    $tab="FOURNISSEUR";
    UpdateFournisseur($_POST['ModifId'],$_POST['f_nom'],$_POST['f_adresse'],$_POST['f_telephone'],$_POST['f_mail']);
  }

  afficher("FOURNISSEUR");
    SaisirFournisseur();
  ?>
</div>

<script type="text/javascript">
  tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      if(tablinks[i].value== <?php echo '"'.$tab.'"'; ?>){
        console.log(tablinks[i]);
        tablinks[i].click();
      }
    }
</script>
<script src="../js/Onglet.js"></script>
</body>
</html>