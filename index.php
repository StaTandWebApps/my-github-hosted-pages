<!DOCTYPE html>
<html><head>
<meta charset="ISO-8859-1" ><title>connexion_dbLifeNet</title></head><body style="background-color: rgb(255, 204, 204); color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">
  
<div style="text-align: center;">
<!--<div style="text-align: center;background:url("accueil3.jpg");"> essai de mised'image en fond d'écran -->
<form method="post" action="index.php" name="index.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
  <div style="text-align: center;"> <!-- div non nécessaire car élmt occupant tte la largeur-->



  <img style="width: 100%; height: 100px;" alt="connectez-vous" src="logo_CREC_IRD.JPEG">
  <img style="width: 100%; height: 300px;margin_right:1px" alt="" src="accueil3.jpg" title="Moustique" >
</div> <!--  fin de la div non nécessaire-->
  <table style="text-align: left; width: 285px; height: 39px; margin-left: auto; margin-right: auto;" border="1" cellpadding="2" cellspacing="2">
  
    <tbody>
      <tr>
        <td style="vertical-align: top;">&nbsp; Connexion à la Base de Données LifeNet<br>
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <table style="text-align: left; width: 454px; height: 67px; margin-left: auto; margin-right: auto;" border="1" cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td style="vertical-align: top;">Nom d'utilisateur(login)<br>
        </td>
        <td style="vertical-align: top;"><input size="40" name="login" onkeyup="this.value=this.value.toUpperCase();"><br>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">Mot de passe(password)<br>
        </td>
        <td style="vertical-align: top;"><input size="40" name="pword" type="password"><br>
        </td>
      </tr>
    </tbody>
  </table>
  <input value="EFFACER" type="reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input name="valider" type="submit"><br>

<?php if(isset($_POST["valider"])){
//On démarre la session
session_start();
//On définit les variables de la session
if(isset($_POST["login"])){$login=($_POST["login"]);}	
			if(isset($_POST["pword"])){$pword=$_POST["pword"];}
			
 $_SESSION['login']=$login;
 $_SESSION['pword']=$pword;

 
//Connexion  à la base lifenet1(base à laquelle st liées les pages du site) où doit etre créee la table user

########## Déclaration des élts de connexion
/*Insérer en faisant: require("elem_connex_pers_select.php");le fichier étant ailleurs ds le mm dossier  ou mettre le code coe ci-dessous:*/
$hostname="localhost";
$user="root";
$password="";/*le super utilisateur "root" n'a pas besoin de password à moins qu'il se soit imposé un*/
$nom_base_donnees="lifenet1";
########## Connexion à la base indiquée ci-dessus
$conn= mysql_connect($hostname,$user,$password)or die('Erreur de connexion:'.mysql_error());
mysql_select_db($nom_base_donnees,$conn)or die('Erreur de choix de la base:'.mysql_error());
            

 
  $sql = "SELECT * FROM user WHERE login ='$login' and pword='$pword'";
  $req = mysql_query($sql) or die('Erreur SQL : <br />'.$sql);
  
 if(mysql_num_rows($req)==0){echo "Désolé, vous n'êtes pas autorisé!<br>"; echo"<a href='index.php'>Veuillez réessayer</a>";}
 else{echo "Vous êtes le bienvenu!<br>"; echo "<a href='accueil_pro_dbase.php'><h2>Clicker ici pour aller à l'accueil</h2></a>";} 
  
  }

 ?>
</form>
</div>


</body></html>