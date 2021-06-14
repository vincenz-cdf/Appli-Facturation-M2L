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
   $codepres=$_REQUEST['fode_Prestation'];
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
?>
      <?php

          $lgfac=obtenirtoutpres($connexion);
          foreach ($lgfac as $row) {
            $montrepres=$row['Code'];
          echo"<tr><td><SELECT value='.$codepres.' name='fode_Prestation'>;

<OPTION>$montrepres</option>

</SELECT>           
          <td><input type='number' name='Quantite' value=".$qty."></td>";          }

          for ($i=1; $i < 6 ; $i++) { 
          if ($i==2) {
            echo"<td>Nom de la ligue</td>";
            }else if($i==3){
              try{
              $sql="SELECT * from Ligue";
                $result =$connexion->query($sql);
                $result = $result->fetchall();
              }catch(PDOEXEPTION $e){
              die($e);
              }
              echo "<td><SELECT name='compte_ligue'>";
              foreach ($result as $row) {
                echo "<OPTION>".$row['Intitule']."</option>";
              }
                echo "</SELECT></td>";
              }        
          }
          echo "</tr>";
        ?>
   </table>;
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
