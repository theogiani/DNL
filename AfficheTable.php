<html>
	<head>
		<meta charset="utf-8">	
		<link rel="stylesheet" type="text/css" href="styles/styles.css">
	</head>
	<body>
		<?php
		// On se connecte à la table collegues.exp
		require_once('connexionBddDNL.php');

		// On choisit les éléments à afficher
		$commande = "SELECT duree, effectif, matiere, academie, corps, etablissement, niveau FROM elstyxprofdnl.exp";

		// et on interroge la table
		$reponse = mysqli_query($con, $commande);

		if($reponse){
			// Affichage de l'entête
			echo '<table>
				<tr>
					<td><b>Nombre </br>d\'années </br>d\'expérience</b></td>
					<td><b>Effectif</br>de la</br>classe</b></td>
					<td><b>Matière principale</b></td>
					<td><b>Académie</b></td>
					<td><b>Corps</b></td>
					<td><b>Type d\'établissement</b></td>
					<td><b>Niveau</br>en</br>anglais</b></td>
				</tr>';

			while($row = mysqli_fetch_array($reponse)){
				// Affichage des lignes du tableau
				echo '<tr>
					<td>' . $row['duree'] . '</td>
					<td>' . $row['effectif'] . '</td>
					<td>' . $row['matiere'] . '</td>
					<td>' . $row['academie'] . '</td>
					<td>' . $row['corps'] . '</td>
					<td>' . $row['etablissement'] . '</td>
					<td>' . $row['niveau'] . '</td>';	
				echo '</tr>';
			} 
			echo '</table>';

			// On ferme la connexion
			mysqli_close($con);
		}
		?>

		<!-- Un bouton pour revenir à la page principale. -->
		<form style="margin-left: 300px; margin-top: 20px;" action="index.html"> 
			<input type="submit" value="Retour à la page principale">
		</form>
	</body>
</html>