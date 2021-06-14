<?php

include("bootstrap.php"); 
include("base.php"); 

$num_facture=$_REQUEST['Num_Facture'];

$lgFac=obtenirDetailFacture($connexion, $num_facture);

if ($_REQUEST['action']=='demanderSupprFac')    
{
   echo "
   <br><center><h5>Souhaitez-vous vraiment supprimer cette facture ? 
   <br><br>
   <a href='facturesupprimer.php?action=validerSupprFac&amp;Num_Facture=$num_facture'>
   Oui</a>&nbsp; &nbsp; &nbsp; &nbsp;
   <a href='facture.php?'>Non</a></h5></center>";
}
else
{
   supprimerFacture($connexion, $$num_facture);
   echo "
   <br><br><center><h5>La facture a été supprimée</h5>
   <a href='facture.php?'>Retour</a></center>";
}

?>
