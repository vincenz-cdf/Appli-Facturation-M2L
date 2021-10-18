<?php

include("bootstrap.php"); 
include("base.php"); 

// AFFICHER L'ENSEMBLE DES ÉTABLISSEMENTS
// CETTE PAGE CONTIENT UN TABLEAU CONSTITUÉ D'1 LIGNE D'EN-TÊTE ET D'1 LIGNE PAR
// ÉTABLISSEMENT

echo "
<table width='70%' cellspacing='0' cellpadding='0' align='center' 
class='table' data-toggle='table'>
   <tr>
      <td colspan='4' align='center'>Prestations</td>
   </tr>";
     
   $req=obtenirPrestation();
   $rsPres=$connexion->query($req);
   $lgPres=$rsPres->fetchAll();

      foreach ($lgPres as $row){
      $code=$row['Code'];
      $libelle=$row['Libelle'];
      echo "
		<tr>
         <td width='52%'>$libelle</td>
         
         <td width='16%' align='center'> 
         <a href='prestationvoir.php?Code=$code'>
         Voir détail</a></td>
         
         <td width='16%' align='center'> 
         <a href='prestationmodifier.php?action=demanderModifPres&amp;Code=$code'>
         Modifier</a></td>";
      	
        echo "
        <td width='16%' align='center'> 
        <a href='prestationsupprimer.php?action=demanderSupprPres&amp;Code=$code'>
        Supprimer</a></td>";
      }
   echo "
   <tr>
      <td colspan='4'><a href='prestationajouter.php?action=demanderCrePres'>
      Créer une nouvelle prestation</a ></td>
  </tr>
</table>";

?>