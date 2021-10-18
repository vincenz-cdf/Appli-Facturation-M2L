<?php

include("bootstrap.php"); 
include("base.php"); 

// CRÉER UN ÉTABLISSEMENT 

$action=$_REQUEST['action'];

// S'il s'agit d'une création et qu'on ne "vient" pas de ce formulaire (on 
// "vient" de ce formulaire uniquement s'il y avait une erreur), il faut définir 
// les champs à vide sinon on affichera les valeurs précédemment saisies
if ($action=='demanderCrePres') 
{  
   $code='';
   $libelle='';
   $pu='';
}
else
{
   $libelle=$_REQUEST['Libelle'];
   $pu=$_REQUEST['PU'];
 
   creerPrestation($connexion, $libelle, $pu);
}

echo "
<form method='POST' action='prestationajouter.php?'>
   <input type='hidden' value='validerCrePres' name='action'>
   <table width='85%' align='center' cellspacing='0' cellpadding='0' 
   class='table' data-toggle='table'>
   
      <tr>
         <td colspan='3' align='center'>Nouvelle Prestation</td>
      </tr>";
      
     
      echo '
      <tr>
         <td> Libelle: </td>
         <td><input type="text" value="'.$libelle.'" name="Libelle" size="50" 
         maxlength="45"></td>
      </tr>
      <tr>
         <td> Prix Unitaire: </td>
         <td><input type="float" value="'.$pu.'" name="PU" size="50" 
         maxlength="45">€</td>
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
         <td colspan='2' align='center'><a href='prestation.php'>Retour</a>
         </td>
      </tr>
   </table>
</form>";

// En cas de validation du formulaire : affichage des erreurs ou du message de 
// confirmation
if ($action=='validerCrePres')
{
      echo "
      <h5><center>Une nouvelle prestation a été ajoutée</center></h5>";
}

?>
