<?php

include("base.php");

$num_facture=$_REQUEST['Num_Facture'];  

$lgLig=obtenirDetailFLigue($connexion, $num_facture);

foreach ($lgLig as $row) {
   $compte=$row['Compte'];
   $intitule=$row['Intitule'];
   $tresorier=$row['Tresorier'];  
   $adresseecr=$row['adresseecr'];
   $ndate=$row['Ndate'];
   $echeance=$row['Echeance'];
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo "FC".$num_facture."" ?></title>
    <link rel="stylesheet" href="css/stylefac.css" media="all" />
    <script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
    <script type='text/javascript' src='js/example.js'></script>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="images/logo.png">
      </div>
      <h1>Facture</h1>
      <div id="company" class="clearfix">
        <div>M2L</div>
        <div>Maison Régional des Sports de Lorraine<br /> 2 Rue Jean Moulin</div>
        <div>54000</div> </br>
        <div>Siret : 3459450294529321 </div>
        <div>Tel : 01.53.21.24.21</div>
        <div>Fax : 01.53.44.44.21</div>
      </div>
      <div id="project">
        <div><span>Compte</span><?php echo "".$compte."" ?></div>
        <div><span>Maison</span><?php echo "".$intitule."" ?></div>
        <div><span>Trésorier</span><?php echo "".$tresorier."" ?></div>
        <div><span>Adresse</span><?php echo "".$adresseecr.""?></div>
        <div><span>CP</span>54000</div>
        <div><span>Date</span><?php echo "".$ndate.""?></div>
        <div><span>Echeance</span><?php echo "".$echeance.""?></div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class='service'>Code</th>
            <th class='desc'>Intitule</th>
            <th>P.U</th>
            <th>Qté</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
<?php
$lgFac=obtenirDetailFacture($connexion, $num_facture);

foreach ($lgFac as $row) {
   $num_facture=$row['Num_Facture'];
   $codepres=$row['Code_Prestation'];
   $qty=$row['Quantite'];
   $libelle=$row['Libelle'];
   $pu=$row['PU'];

echo"
          <tr>
            <td class='service'>".$codepres."</td>
            <td class='desc'>".$libelle."</td>
            <td class='unit'>".$pu."</td>
            <td class='qty'>".$qty."</td>
            <td class='total' class='price'>".$total=$pu*$qty."</td>
          </tr>";}
echo"
          <tr>
            <td colspan='4'>TotalHT</td>
            <td class='total' id='subtotal'></td>
          </tr>
          <tr>
            <td colspan='4'>TVA 20%</td>
            <td class='total'></td>
          </tr>
          <tr>
            <td colspan='4' class='grand total'>TotalTTC</td>
            <td class='grand total'></td>
          </tr>
        </tbody>
      </table>"

      ?>
      <div id="notices">
        <div>Signature et sceau:</div>
        <div class="grand total"></div>
      </div>
    </main>
  </body>
</html>