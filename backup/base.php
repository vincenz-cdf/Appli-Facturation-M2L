<?php

   $hote="localhost";
   $login="m2l";
   $mdp="secret";

   try{
      $connexion = new PDO("mysql:host=$hote;dbname=m2l", $login, $mdp);
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

function creerPrestation($connexion,$code,$libelle,$pu)
{ 
   $code=str_replace("'","''", $code);
   $libelle=str_replace("'","''", $libelle);
   $pu=str_replace("'","''", $pu);
   $req="INSERT into Prestation values ('$code','$libelle', '$pu', '$pu'*1.2)";
   
   $connexion->query($req);
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
?>
