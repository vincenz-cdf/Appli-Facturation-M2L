<?php

include("bootstrap.php"); 
include("base.php"); 

$action=$_REQUEST['action'];

if ($action=='demanderCreFac') 
{  
   $num_facture='';
   $ndate='';  
   $codepres='';
   $qty='';
}
else
{
   $obtenirnumfac=obtenirNumFac($connexion);
foreach ($obtenirnumfac as $row)
{
  $num_facture=$row['dernierFacture'];
  $num_facture=$num_facture+1;
}
   $ndate=$_REQUEST['Ndate']; 
   $codepres=$_REQUEST['Code_Prestation'];
   $qty=$_REQUEST['Quantite'];
   $intitule=$_REQUEST['compte_ligue'];

   creerFacture($connexion,$num_facture, $intitule, $ndate, $codepres, $qty);
}
  $obtenirnumfac=obtenirNumFac($connexion);
foreach ($obtenirnumfac as $row)
{
  $num_facture=$row['dernierFacture'];
  $num_facture=$num_facture+1;
}

echo "
<form method='POST' action='factureajouter.php?'>
   <input type='hidden' value='validerCreFac' name='action'>
   <table width='85%' align='center' cellspacing='0' cellpadding='0' 
   class='table' data-toggle='table'>
   
      <tr>
         <td colspan='3' align='center'>Nouvelle Facture</td>
      </tr>
      <tr>
         <td > Numéro de la facture: </td>
         <td align= 'left'>FC".$num_facture."</td>
      </tr>";
     
      echo'
      <tr>
         <td> Date de la facture: </td>
         <td><input type="date" value="'.$ndate.'" name="Ndate" 
         size="50" maxlength="45"></td>
      </tr>
      <tr>
         <td> Echéance: </td>
         <td>Fin du mois</td>
      </tr>';


          $lgfac=obtenirtoutpres($connexion);
          foreach ($lgfac as $row) {
            $montrepres=$row['Code'];
            echo"<tr><td>$montrepres</td>
             <td><input type='number' name='Quantite' value=0 value=".$qty."></td>";
          }
          echo "<tr><td></td></tr>
          <tr><td>";

          $obtenirNomLigue = obtenirNomLigue($connexion);
          echo "<label for='lig'>nom de la ligue:</label>
          
          <select id ='lig'>";
          foreach($obtenirNomLigue as $row)
          {
            $intitule = $row['Intitule'];
            echo "<option>$intitule</option>";
          }
          echo "</select></td></tr>";
          
        ?>
   </table>
   <table align='center' cellspacing='15' cellpadding='0'>
      <tr>
         <td align='right'><input type='submit' value='Valider' name='valider'>
         </td>
         <td align='left'><input type='reset' value='Annuler' name='annuler'>
         </td>
      </tr>
      <tr>
         <td colspan='2' align='center'><a href='facture.php'>Retour</a>
         </td>
      </tr>
   </table>
</form>

<?php
if ($action=='validerCreFac')
{
      echo "
      <h5><center>Une nouvelle facture a été ajoutée</center></h5>";
}     
?>
