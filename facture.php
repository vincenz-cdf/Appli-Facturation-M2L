<?php

include("bootstrap.php"); 
include("base.php"); 

echo "
<table width='70%' cellspacing='0' cellpadding='0' align='center' 
class='table' data-toggle='table'>
   <tr>
      <td colspan='4' align='center'>Factures</td>
   </tr>";
     
   $req=obtenirNFacture();
   $rsFac=$connexion->query($req);
   $lgFac=$rsFac->fetchAll();
      foreach ($lgFac as $row){
      $num_facture=$row['Num_Facture'];
      echo "
		<tr>
         <td width='52%'>FC".$num_facture."</td>
         
         <td align='left'> 
         <a href='facturevoir.php?Num_Facture=$num_facture'>
         Imprimer</a></td>
        <td width='16%' align='center'> 
        <a href='facturesupprimer.php?action=demanderSupprFac&amp;Num_Facture=$num_facture'>
        Supprimer</a></td>";}
        echo "
   <tr>
      <td colspan='4'><a href='factureajouter.php?action=demanderCreFac'>
      Créer une nouvelle facture</a></td>
  </tr>
</table>";

?>
