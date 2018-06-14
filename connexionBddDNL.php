<html>
	<head>
		<meta charset="utf-8">	
		<title>ConnexionBdd</title>
	</head>
	<body>
		<?php
			// S'occupe de la connexion à la base de données			
			$server = "elstyxprofdnl.mysql.db";
			$user = "elstyxprofdnl";
			$passe = "DrKislin07";	
			$base = "elstyxprofdnl";
			
			// $con est la variable de connexion à la base de données
			$con = mysqli_connect($server, $user, $passe, $base);
			// On precise l'encodage de transmission des données
			mysqli_set_charset($con, "utf8");

			if (! $con)
				echo "Pas de connexion : " . mysqli_connect_error();
		?>
	</body>
</html>