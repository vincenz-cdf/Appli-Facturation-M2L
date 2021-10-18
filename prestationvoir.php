<?php

include("bootstrap.php"); 
include("base.php"); 

$code=$_REQUEST['Code'];  

$lgPres=obtenirDetailPrestation($connexion, $code);

foreach ($lgPres as $row) {
   $code=$row['Code'];
   $libelle=$row['Libelle'];
   $pu=$row['PU'];
   $totalttc=$row['totalTTC'];   

   echo "
   <table width='60%' cellspacing='0' cellpadding='0' align='center' 
   class='table' data-toggle='table'>
      
      <tr>
         <td  width='20%'> Numero de la prestation: </td>
         <td>$code</td>
      </tr>
      <tr >
         <td  width='20%'> Libelle: </td>
         <td>$libelle</td>
      </tr>
      <tr >
         <td> Prix Unitaire: </td>
         <td>$pu €</td>
      </tr>
      <tr >
         <td> Total TTC: </td>
         <td>$totalttc €</td>
      </tr>



   <table align='center'>
      <tr>
         <td align='center'><a href='prestation.php'>Retour</a>
         </td>
      </tr>
   </table>";
}
?>
