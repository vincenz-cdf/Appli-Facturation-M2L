<?php
include("base.php");
include("bootstrap.php"); 

echo "
<table width='70%' cellspacing='0' cellpadding='0' align='center' 
class='table' data-toggle='table'>
   <tr>
      <td colspan='4' align='center'>Historique des prix</td>
   </tr>";
 echo "<tr>
 			<td>code</td>
 			<td align = 'center'>prix unitaire</td>
 			<td align = 'center'>totalTTC</td>
 			<td align= 'center'>date de modifiction</td>
 		</tr>";
     
   $lgHist=obtenirHistorique($connexion);
   // BOUCLE SUR LES HISTORIQUES DES PRIX
      foreach ($lgHist as $row)
      {
      $code = $row['code_his'];
      $PU=$row['PUhis'];
      $totalTTC=$row['totalTTChis'];
      $dateHistorique = $row['datutilisationprix'];
      echo "
		<tr>
         <td width='25%'>$code</td>
         
         <td width='25%' align='center'>$PU </td>
         
         <td width='25%' align='center'>$totalTTC</td>
         <td width = '25%' align = 'center'>$dateHistorique</td>
        </tr>";
	 }
	 echo "</table>";
?>