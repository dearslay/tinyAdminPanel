<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="refresh" content="0; URL=index.php" />
  <title>Desinscription</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<style>body{background-color:black;}<style>
<?php
	if($_GET['name']){

		$name = $_GET['name'];

		$db = new PDO('mysql:host=;dbname=;charset=utf8','', '');

		$selectall = $db->query('SELECT * FROM t1 WHERE nom="'.$name.'"');

		$result = $selectall->fetch();

		$counttable = (count($result));

		if ($counttable >= 1){
			$delete = $db->prepare('DELETE FROM t1 WHERE nom="'.$name.'"');
			$delete->execute();
			echo('Message Supprimé');
		}
	
	}
?>
<p>Suppression du mail</p>
</body>
</html>