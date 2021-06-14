<?php

include("bootstrap.php"); 
include("base.php"); 

// CRÉER UN ÉTABLISSEMENT 

$action=$_REQUEST['action'];

// S'il s'agit d'une création et qu'on ne "vient" pas de ce formulaire (on 
// "vient" de ce formulaire uniquement s'il y avait une erreur), il faut définir 
// les champs à vide sinon on affichera les valeurs précédemment saisies
if ($action=='demanderCreLig') 
{  
   $compte='';
   $intitule='';
   $tresorier='';
   $adresseboo='';   
   $adresseecr='';
}
else
{
   $obtenirCompte=obtenirCompteLigue($connexion);
foreach ($obtenirCompte as $row)
{
  $compte=$row['dernierCompte'];
  $compte=$compte+1;
}
   $intitule=$_REQUEST['Intitule'];
   $tresorier=$_REQUEST['Tresorier'];
   $adresseboo=$_REQUEST['adresseboo'];   
   $adresseecr=$_REQUEST['adresseecr'];
 
   creerLigue($connexion,$compte, $intitule, $tresorier, $adresseboo, $adresseecr);

}
  $obtenirCompte=obtenirCompteLigue($connexion);
foreach ($obtenirCompte as $row)
{
  $compte=$row['dernierCompte'];
  $compte=$compte+1;
}

echo "
<form method='POST' action='ligueajouter.php?'>
   <input type='hidden' value='validerCreLig' name='action'>
   <table width='85%' align='center' cellspacing='0' cellpadding='0' 
   class='table' data-toggle='table'>
   
      <tr>
         <td colspan='3' align='center'>Nouvelle Ligue</td>
      </tr>;
      <tr>
         <td > Numéro de compte: </td>
         <td align= 'left'>$compte</td>
      </tr>";
     
      echo '
      <tr>
         <td> Intitule: </td>
         <td><input type="text" value="'.$intitule.'" name="Intitule" size="50" 
         maxlength="45" required></td>
      </tr>
      <tr>
         <td> Nom et Prénom du Tresorier: </td>
         <td><input type="text" value="'.$tresorier.'" name="Tresorier" size="50" 
         maxlength="45" required></td>
      </tr>
      <tr>
         <td> Envoyer la facture au trésorier: </td>
         <td>';
            if ($adresseboo==1)
            {
               echo " 
               <input type='radio' name='adresseboo' value='1' checked>  
               Oui
               <input type='radio' name='adresseboo' value='0'>  Non";
             }
             else
             {
                echo " 
                <input type='radio' name='adresseboo' value='1'> 
                Oui
                <input type='radio' name='adresseboo' value='0' checked> Non";
              }
           echo '
           </td>
         </tr>
      <tr>
         <td> Adresse du tresorier: </td>
         <td><input type="text" value="'.$adresseecr.'" name="adresseecr" 
         size="50" maxlength="45" ></td>
      </tr>
   </table>';
   
   echo "
   <table align='center' cellspacing='15' cellpadding='0'>
      <tr>
         <td align='right'><input type='submit' value='Valider' name='valider'>
         </td>
         <td align='left'><input type='reset' value='Annuler' name='annuler'>
         </td>
      </tr>
      <tr>
         <td colspan='2' align='center'><a href='ligue.php'>Retour</a>
         </td>
      </tr>
   </table>
</form>";

// En cas de validation du formulaire : affichage des erreurs ou du message de 
// confirmation
if ($action=='validerCreLig')
{
      echo "
      <h5><center>Une nouvelle ligue a été ajoutée</center></h5>";
}

?>
