<?php

include("bootstrap.php"); 
include("base.php"); 

$compte=$_REQUEST['Compte'];  

$lgLig=obtenirDetailLigue($connexion, $compte);

foreach ($lgLig as $row) {
   $compte=$row['Compte'];
   $intitule=$row['Intitule'];
   $tresorier=$row['Tresorier'];
   $adresseboo=$row['adresseboo'];   
   $adresseecr=$row['adresseecr'];

   echo "
   <table width='60%' cellspacing='0' cellpadding='0' align='center' 
   class='table' data-toggle='table'>
      
      <tr>
         <td  width='20%'> Numero de compte: </td>
         <td>$compte</td>
      </tr>
      <tr >
         <td  width='20%'> Intitule: </td>
         <td>$intitule</td>
      </tr>
      <tr >
         <td> Tresorier: </td>
         <td>$tresorier</td>
      </tr>
      <tr>
         <td> Envoyer à l'adresse </td>";
         if ($adresseboo==1)
         {
            echo "<td> Oui </td>";
         }
         else
         {
            echo "<td> Non </td>";
         }
      echo "
      </tr>
      <tr >
         <td> Adresse du trésorier: </td>
         <td>$adresseecr</td>
      </tr>



   <table align='center'>
      <tr>
         <td align='center'><a href='ligue.php'>Retour</a>
         </td>
      </tr>
   </table>";
}
?>
