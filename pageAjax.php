<!-- oninput: au moment de l'ecriture ou la suppression  -->
<!-- onchange: Quand on change la valeur du select--> 
<!-- onclick: Quand on clic--> 
<!-- document.getElementById("").value: Pour recuperer la valeur--> 
<!-- onBlur: quand l'utilisateur quitte le champ de saisie ou utilise la touche "entrée" après avoir tapé un text--> 
 
<!DOCTYPE html>
<html>																												
<header>
<SCRIPT language="Javascript">
function fonction()
{
	<!--recuperation de la valeur du champ input --> 
	var val=document.getElementById("nom").value;
	
	<!--recuperation de l'identifiant du champ select--> 
	var select = document.getElementById('couleur');
	
	//vider le select a chaque execution de la fonction
	select.options.length=0;
	
	if(val!='')
    {
	<!--creation d'un  nouveau objet pour communiquer avec des serveurs--> 
	httpRequest = new XMLHttpRequest();	
	
	<!--onreadystatechange: difintion de la fonction JavaScript qui va s'executer lorsque la réponse est reçue-->  
	httpRequest.onreadystatechange = function() {
		
	<!--responseText: renvoie la réponse du serveur sous la forme d’une chaîne de texte--> 
    <!--split: decouper une chaine par raport d'un seperateur--> 
	var list= httpRequest.responseText.split("|");
	
    for(i=0;i<list.length-1;i++)
	 {
	<!--creation d'un champ option--> 	
    var option = document.createElement('option');
	<!--associer au champ option une valeur de la list--> 	
    option.innerHTML=list[i];
	
	<!--associer au champ select le champ option-->
    select.appendChild(option);	 
	 }
	};
    
    <!--Définit l'envoi GET ou POST, le mode asynchrone et l'url de l'appel AJAX-->	
    httpRequest.open("GET", " pagePhp.php?valeur= '"+ val +"' ", false);
	
	<!--Déclenche l'appel AJAX vers le serveur avec d'éventuels paramètres-->	
    httpRequest.send();
   }
}

function fonction2()
{
  var val=document.getElementById("nom").value;
  
  var Table = document.getElementById ("table");
  
  var tailleTable=Table.rows.length;
  
      //vider le tableau a chaque execution de la fonction  
      for(z=1;z< tailleTable;z++)
	  {
	  Table.deleteRow(1);
	  }
  
  httpRequest1 = new XMLHttpRequest();	
 
  if(val!='')
    {  
  httpRequest1.onreadystatechange = function() {
	 
    var list= httpRequest1.responseText.split("|");
    var j=0;	 
    	
	 for(i=0;i<list.length-1;i=i+2)
	 {	
    j=j+1; 
    // Insère une ligne dans la table à l'indice de ligne 0
    var Ligne = Table.insertRow(j);
    // Insère une cellule dans la ligne à l'indice 0
    var Cellule = Ligne.insertCell(0);
     // Ajoute un texte à la 1er cellule
    Cellule.innerHTML=list[i];
	
	var Cellule = Ligne.insertCell(1);
     // Ajoute un texte à la 2eme cellule
    Cellule.innerHTML=list[i+1];
	 }
  };  
  
  httpRequest1.open("GET", " pagePhp2.php?valeur= '"+ val +"' ", false);	 
  httpRequest1.send();
	}
}

</SCRIPT >


<title>Vendre article</title>
</header>

<body>
<p> <h1>Vendre article</h1> </p>

<form  method="GET">

<label for="f">Nom de produit</label>
<input type="nom" name="nom" id="nom"  oninput="fonction();fonction2()"/><br/><br/>

<label for="f">liste des produits</label>
<select id="couleur"  name="couleur"  size="1">  </select> <br/><br/>
   
<label for="f">tableau des produits</label>
<table id="table" border="1">
   <tr>
       <th>Nom d'article</th>
       <th>Qte</th>
   </tr>
</table><br/>
   


   
											 

</form> 


</body>
</html>
