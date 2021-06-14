<?php

include("bootstrap.php"); 
include("base.php"); 

echo "
<table width='70%' cellspacing='0' cellpadding='0' align='center' 
class='table' data-toggle='table'>
   <tr>
      <td colspan='4' align='center'>Ligues</td>
   </tr>";
     
   $req=obtenirLigue();
   $rsLig=$connexion->query($req);
   $lgLig=$rsLig->fetchAll();
      foreach ($lgLig as $row){
      $compte=$row['Compte'];
      $intitule=$row['Intitule'];
      echo "
		<tr>
         <td width='52%'>$intitule</td>
         
         <td width='16%' align='center'> 
         <a href='liguevoir.php?Compte=$compte'>
         Voir détail</a></td>
         
         <td width='16%' align='center'> 
         <a href='liguemodifier.php?action=demanderModifLig&amp;Compte=$compte'>
         Modifier</a></td>";
      	
        echo "
        <td width='16%' align='center'> 
        <a href='liguesupprimer.php?action=demanderSupprLig&amp;Compte=$compte'>
        Supprimer</a></td>";
      }
   echo "
   <tr>
      <td colspan='4'><a href='ligueajouter.php?action=demanderCreLig'>
      Créer une nouvelle ligue</a ></td>
  </tr>
</table>";

?>
