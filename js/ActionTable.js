function suppr(tableau,element, Indid){
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



function update(element, table){
    console.log(document.getElementById(table));
    // Je supprime l'ancien tableau 
    document.getElementById(table).removeChild(document.getElementById(table).children[2]);
    // J'envoi les paramétres en ajax et réaffiche
    var request2 = new XMLHttpRequest();
    request2.open('POST', '../php/handler.php', true);
    request2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    request2.send('tableAffiche='+table);

  }