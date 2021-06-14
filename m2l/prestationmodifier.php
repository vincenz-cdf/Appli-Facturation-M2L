<?php

include("bootstrap.php"); 
include("base.php"); 

$action=$_REQUEST['action'];
$code=$_REQUEST['Code'];

if ($action=='demanderModifPres')
{
   $lgPres=obtenirDetailPrestation($connexion, $code);
   foreach ($lgPres as $row) {
      $libelle=$row['Libelle'];
      $pu=$row['PU'];
    $totalttc=$row['totalTTC'];
   }
}
else
{
   $libelle=$_REQUEST['Libelle']; 
   $pu=$_REQUEST['PU'];
      modifierPrestation($connexion, $code, $libelle, $pu);
}

echo "
<form method='POST' action='prestationmodifier.php?'>
   <input type='hidden' value='validerModifPres' name='action'>
   <table width='85%' cellspacing='0' cellpadding='0' align='center' 
   class='table' data-toggle='table'>
   
      <tr>
         <td colspan='3'>$libelle ($code)</td>
      </tr>
      <tr>
         <td><input type='hidden' value='$code' name='Code'></td>
      </tr>";
     
      echo '
      <tr>
         <td> Libelle: </td>
         <td><input type="text" value="'.$libelle.'" name="Libelle" size="50" 
         maxlength="45"></td>
      </tr>
      <tr>
         <td> Prix Unitaire: </td>
         <td><input type="number" value="'.$pu.'" name="PU" size="50" 
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

if ($action=='validerModifPres')
{
      echo "
      <h5><center>La prestation a bien été modifiée</center></h5>";
}

?>
