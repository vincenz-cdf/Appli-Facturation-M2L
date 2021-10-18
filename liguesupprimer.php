<?php

include("bootstrap.php"); 
include("base.php"); 

$compte=$_REQUEST['Compte'];  

$lgLig=obtenirDetailLigue($connexion, $compte);
foreach ($lgLig as $row) {
   $intitule=$row['Intitule'];
}

if ($_REQUEST['action']=='demanderSupprLig')    
{
   echo "
   <br><center><h5>Souhaitez-vous vraiment supprimer cette ligue ? 
   <br><br>
   <a href='liguesupprimer.php?action=validerSupprLig&amp;Compte=$compte'>
   Oui</a>&nbsp; &nbsp; &nbsp; &nbsp;
   <a href='ligue.php?'>Non</a></h5></center>";
}
else
{
   supprimerLigue($connexion, $compte);
   echo "
   <br><br><center><h5>La ligue a été supprimée</h5>
   <a href='ligue.php?'>Retour</a></center>";
}

?>
