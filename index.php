<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
  <title>Exercice</title>
</head>
<body>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poiret+One&display=swap');
*{font-family: 'Poiret One', cursive;}
body{background-color:black;font-size:3.3em;display:grid;justify-content:center;padding: 0 0;}
.block{color:red;}
.success{color:green;}
.msg{display:flex;align-items:center;justify-content:space-around;width: 90%;position:fixed;bottom:0.4em;}
.main{width:90vw;}
.refresh{width:90vw;display:flex;justify-content:right;}
.message{position:absolute;margin-left: 0.1em;overflow:auto;height:88vh;}
input[type=submit]{background: url('https://api.iconify.design/fluent:send-24-filled.svg?color=%23FFFFFF') no-repeat center center / contain;}
</style>

<div class="main">
<div class="refresh">
<a href="index.php" style="text-decoration:none;color:white;text-transform:uppercase;">refresh</a>
</div>
<?php
if( isset($_POST["envoie"])){
	if ($_POST["message"]=='' || !isset($_POST["message"])){
		echo "<div class=\"block\">Veuiller ajouter un message !</div>";
		break;
	}
	else{
		$nom = "Admin";
		$message = $_POST['message'];
		echo "<div class=\"success\">Success !</div>";
		$db = new PDO('mysql:host=;dbname=;charset=utf8','', '');
		$result = $db->prepare('INSERT INTO t1 (nom, message) VALUES (:nom, :message)');
		$result->execute(array('nom' => $nom, 'message' => $message));
	}
}
?>

<br>
<div class="message">
<?php
try
{
	$bdd = new PDO('mysql:host=;dbname=;charset=utf8','', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->query('SELECT * FROM t1');
?>

<?php
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
//foreach ($reponse as $donnees) 
:
?>
<p style="color:white;">
<strong><?php echo $donnees['nom']; ?></strong> : <?php echo $donnees['message']; ?>
<a href="delete.php?name=<?php echo $donnees['nom'];?>" style="margin-left:5px;text-decoration:none;color:red;opacity:90%;font-size:16px;font-weight:bold;">Supprimer</a>
</p>
<?php
endwhile;
$reponse->closeCursor(); // Termine le traitement de la requête
?>
</div>
</div>
<form method="post"  action="#" name="add" style="text-align:left;background-color:red;">
	<div class="msg">
		<textarea name="message" placeholder="Message" style="font-size:0.7em;width:95%;"></textarea><br>
		<input type="submit" value="" name="envoie" style="width:8em;height:8em;border:none;">
	</div>
</form>

</body>
</html>