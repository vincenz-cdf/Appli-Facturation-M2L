<?php

   $hote="localhost";
   $login="m3l";
   $mdp="secret";

   try{
      $connexion = new PDO("mysql:host=$hote;dbname=m3l", $login, $mdp);
      $connexion->exec("set names utf8");
      return $connexion;
   }
   catch(PDOException $e){
      echo "Erreur :" . $e->getMessage();
      die();
   }

function obtenirLigue()
{
   $req="SELECT Compte, Intitule from Ligue order by Compte";
   return $req;
}   

function obtenirPrestation()
{
   $req="SELECT Code, Libelle from Prestation order by Code";
   return $req;
}   

function obtenirNFacture()
{
   $req="SELECT DISTINCT Num_Facture from Ligne_Facture";
   return $req;
}   

function obtenirCFacture()
{
   $req="SELECT Compte_ligue from Facture";
   return $req;
}   

function obtenirDetailLigue($connexion, $compte)
{
   $req="SELECT * from Ligue where Compte='$compte'";
   $rsLig=$connexion->query($req);
   return $rsLig->fetchAll();
}

function obtenirDetailPrestation($connexion, $code)
{
   $req="SELECT * from Prestation where Code='$code'";
   $rsPres=$connexion->query($req);
   return $rsPres->fetchAll();
}

function obtenirDetailFacture($connexion, $num_facture)
{
   $req="SELECT * from Ligne_Facture F,Prestation P where F.Code_Prestation=P.Code AND Num_Facture='$num_facture' order by Code_Prestation";
   $rsFac=$connexion->query($req);
   return $rsFac->fetchAll();
}

function obtenirDetailFLigue($connexion, $num_facture)
{
   $req="SELECT * from Ligue L,Facture F where L.Compte=F.Compte_Ligue AND Num_Facture='$num_facture'";
   $rsFac=$connexion->query($req);
   return $rsFac->fetchAll();
}

function obtenirtoutpres($connexion)
{
          $req="SELECT Code from Prestation P";
          $rsfac =$connexion->query($req);
          return $rsfac->fetchall();
}

function obtenirCompteLigue($connexion)
{
    $req ='SELECT LAST_INSERT_ID(Compte) as "dernierCompte" from ligue order by compte desc limit 1';
    $obtenirCompte=$connexion->query($req);
    $sth = $connexion->query($req);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function obtenirNumFac($connexion)
{
    $req ='SELECT LAST_INSERT_ID(Num_Facture) as "dernierFacture" from Ligne_Facture order by Num_Facture desc limit 1';
    $obtenirCompte=$connexion->query($req);
    $sth = $connexion->query($req);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function creerLigue($connexion,$compte,$intitule,$tresorier, $adresseboo, $adresseecr)
{ 
   $compte=str_replace("'","''", $compte);
   $intitule=str_replace("'","''", $intitule);
   $tresorier=str_replace("'","''", $tresorier);
   $adresseboo=str_replace("'","''", $adresseboo); 
   $adresseecr=str_replace("'","''", $adresseecr);       
   $req="INSERT into Ligue values ('$compte','$intitule', '$tresorier', '$adresseboo', '$adresseecr')";
   
   $connexion->query($req);
}

function creerPrestation($connexion, $libelle,$pu)
{ 
   $code=CodePrestation($libelle);
   $libelle=str_replace("'","''", $libelle);
   $pu=str_replace("'","''", $pu);
   $req="INSERT into Prestation values ('$code','$libelle', '$pu', '$pu'*1.2)";
   
   $connexion->query($req);
}

function CodePrestation ($libelle)
{
   $codePrestation=str_split($libelle, 6);
   return $codePrestation[0]; 
}

function creerFacture($connexion,$num_facture, $compte_ligue, $intitule, $ndate, $codepres, $qty)
{ 
   $num_facture=str_replace("'","''", $num_facture);
   $compte_ligue=str_replace("'","''", $compte_ligue);
   $intitule=str_replace("'","''", $intitule);   
   $ndate=str_replace("'","''", $ndate);  
   $echeance=str_replace("'","''", $echeance);    
   $codepres=str_replace("'","''", $codepres);
   $qty=str_replace("'","''", $qty);
   $req="INSERT into Ligue values ('$num_facture','$compte_ligue', '$intitule', '$ndate', '$echeance', '$codepres', '$qty')";
   
   $connexion->query($req);
}

function selectPrestation($connexion)
{
  $req="SELECT Code FROM Prestation";
  $rsFac=$connexion->query($req);
  return $rsFac->fetchAll();
}

function supprimerLigue($connexion, $compte)
{
   $req="DELETE from Ligue where Compte='$compte'";
   $connexion->exec($req);
}

function supprimerPrestation($connexion, $code)
{
   $req="DELETE from Prestation where Code='$code'";
   $connexion->exec($req);
}

function supprimerFacture($connexion, $code)
{
   $req="DELETE from Ligne_Facture where Num_Facture='$num_facture'";
   $connexion->exec($req);
}

function modifierLigue($connexion,$compte,$intitule,$tresorier, $adresseboo, $adresseecr)
{  
   $intitule=str_replace("'","''", $intitule);
   $tresorier=str_replace("'","''", $tresorier);
   $adresseboo=str_replace("'","''", $adresseboo); 
   $adresseecr=str_replace("'","''", $adresseecr);       
  
   $req="UPDATE Ligue set Intitule='$intitule',Tresorier='$tresorier',
         adresseboo='$adresseboo',adresseecr='$adresseecr' where Compte='$compte'";
   
   $connexion->exec($req);
}

function modifierPrestation($connexion,$code,$libelle,$pu)
{  
   $libelle=str_replace("'","''", $libelle);
   $pu=str_replace("'","''", $pu);
   $req="UPDATE Prestation set Libelle='$libelle', PU='$pu', TotalTTC='$pu'*1.2 where Code='$code'";
   
   $connexion->exec($req);
}

function obtenirHistorique($connexion)
{
   $req = "SELECT * from Historique_des_prix_unitaires";
   $rsHist = $connexion->query($req);
   return $rsHist->fetchAll();
}
function obtenirNomLigue($connexion)
{
   $req = "SELECT Intitule FROM Ligue";
   $rslg = $connexion->query($req);
   return $rslg->fetchAll();
}

function obtenirTotal($connexion, $num_facture)
{
   $req="SELECT SUM(PU*Quantite) from Ligne_Facture F,Prestation P where F.Code_Prestation=P.Code AND Num_Facture='$num_facture'";
   $rsFac=$connexion->query($req);
   return $rsFac->fetchColumn();
}
?>
