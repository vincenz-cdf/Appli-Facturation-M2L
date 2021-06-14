<?php

include("bootstrap.php"); 
include("base.php"); 

$code=$_REQUEST['Code'];  

$lgPres=obtenirDetailPrestation($connexion, $code);
foreach ($lgPres as $row) {
   $libelle=$row['Libelle'];
}

if ($_REQUEST['action']=='demanderSupprPres')    
{
   echo "
   <br><center><h5>Souhaitez-vous vraiment supprimer cette prestation ? 
   <br><br>
   <a href='prestationsupprimer.php?action=validerSupprPres&amp;Code=$code'>
   Oui</a>&nbsp; &nbsp; &nbsp; &nbsp;
   <a href='prestation.php?'>Non</a></h5></center>";
}
else
{
   supprimerPrestation($connexion, $code);
   echo "
   <br><br><center><h5>La prestation a été supprimée</h5>
   <a href='prestation.php?'>Retour</a></center>";
}

?>
