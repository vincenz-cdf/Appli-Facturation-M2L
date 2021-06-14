<?php

include("bootstrap.php"); 
include("base.php"); 

$action=$_REQUEST['action'];
$compte=$_REQUEST['Compte'];

if ($action=='demanderModifLig')
{
   $lgLig=obtenirDetailLigue($connexion, $compte);
   foreach ($lgLig as $row) {
      $intitule=$row['Intitule'];
      $tresorier=$row['Tresorier'];
      $adresseboo=$row['adresseboo'];
      $adresseecr=$row['adresseecr'];
   }
}
else
{
   $intitule=$_REQUEST['Intitule']; 
   $tresorier=$_REQUEST['Tresorier'];
   $adresseboo=$_REQUEST['adresseboo'];
   $adresseecr=$_REQUEST['adresseecr'];

      modifierLigue($connexion, $compte, $intitule, $tresorier, $adresseboo, $adresseecr);
}

echo "
<form method='POST' action='liguemodifier.php?'>
   <input type='hidden' value='validerModifLig' name='action'>
   <table width='85%' cellspacing='0' cellpadding='0' align='center' 
   class='table' data-toggle='table'>
   
      <tr>
         <td colspan='3'>$intitule ($compte)</td>
      </tr>
      <tr>
         <td><input type='hidden' value='$compte' name='Compte'></td>
      </tr>";
     
      echo '
      <tr>
         <td> Intitule: </td>
         <td><input type="text" value="'.$intitule.'" name="Intitule" size="50" 
         maxlength="45"></td>
      </tr>
      <tr>
         <td> Nom et Prénom du Tresorier: </td>
         <td><input type="text" value="'.$tresorier.'" name="Tresorier" size="50" 
         maxlength="45"></td>
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
         size="50" maxlength="45"></td>
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

if ($action=='validerModifLig')
{
      echo "
      <h5><center>La ligue a bien été modifiée</center></h5>";
}

?>
