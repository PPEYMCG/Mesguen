<html>

	<?php include 'connectAD.php' //Connexion a la database ?>
	
	<!-- Je créer un tableau appelé affichetableau ayant comme en-tete les differents infos qu'il me faut -->
	<table id="affichetableau" border="1">
		<thead>
			<!-- La taille de mon tableau en hauteur -->
			<tr height="10">
				<!-- Les information contenu en tete de mon tableau -->
				<th width="90">Tournée</th>
				<th width="90">Date</th>
				<th width="90">Chauffeur</th>
				<th width="90">Véhicule</th>
				<th width="90">Départ</th>
				<th width="90">Arrivée</th>
				<th width="90">Modifier</th>
				<th width="90">Supprimer</th>
			</tr>
		</thead>

	<?php
		/* Cette requete SQL fournit des éléments pour mon tableau, il rassemble la majeure partie des éléments nécessaires
		 * Elle me permet donc de chercher dans ma Database :
		 * Le numero de la tournee
		 * La date exacte de la tournee
		 * Le nom du chauffeur
		 * Numero d'immatriculation du véhicule utilisé 
		 */
			$sqlcorps  =   "SELECT `TRNNUM`, `TRNDTE`, `CHFNOM`, `VEHIMMAT` 
							FROM `tournee`, `chauffeur` 
							WHERE tournee.CHFID = chauffeur.CHFID;";
		

		// On affiche le resultat de la requete SQL ($sqlcorps) ou on indique l'erreur de cette requête
			$result = mysql_query ($sqlcorps) or die ( "Impossible d'executer la requete sql : " . mysql_error () );
			
		// On fait une boucle pour lister les résultats
			while ( $donnees = mysql_fetch_array ( $result ) ) {
			?>
				<tr>
					<!-- Ce tableau recupere les données de la database pour les afficher a la suite -->
					<td><?php echo $donnees['TRNNUM']; ?></td>
					<td><?php echo $donnees['1']; ?></td>
					<td><?php echo $donnees['2']; ?></td>
					<td><?php echo $donnees['3']; ?></td>
					<td><?php 
								$tourneeNum = $donnees['0'];
					
								$depart_sql =  "SELECT LIEUNOM
												FROM lieu,etape,tournee
												WHERE etape.LIEUID = lieu.LIEUID
												AND etape.TRNNUM = ".$tourneeNum."
												ORDER BY ETPID ASC;";
								//on affiche le resultat de la requete depart_sql ou on indique l'erreur de la requete
								$depart = mysql_query($depart_sql) or die ( "Impossible d'executer la requete sql : " . mysql_error () );
								$rowdepart = mysql_fetch_array ( $depart);						
								echo $rowdepart['0'];
										
					?></td>
					
					
					<td><?php
								$tourneeNum = $donnees['0'];
							
								$arrivee_sql =  "SELECT LIEUNOM
												 FROM lieu,etape,tournee
												 WHERE etape.LIEUID = lieu.LIEUID
												 AND etape.TRNNUM = ".$tourneeNum."
												 ORDER BY ETPID DESC;";
								// on affiche le resultat de la requete arrivee_sql ou on indique l'erreur de la requete
								$arrivee = mysql_query($arrivee_sql) or die ( "Impossible d'executer la requete sql : " . mysql_error () );
								$rowarrivee =  mysql_fetch_array ( $arrivee);
								echo $rowarrivee['0'];
								
								
				echo "</td>";					
		
	
				//La premiere ligne permet la modification d'une ligne et la seconde ligne permet, quand à elle, d'en supprimer une
				echo "<td width='90'><a href='AC12_ModifTournee.php?TRNNUM=".$donnees['TRNNUM']."'><img src='css/edittitre16.png' title='Modifier' /></a></td>";

				echo "<td width='90'><a href='AC12_SupprimerTournee.php?TRNNUM=".$donnees['TRNNUM']."'><img src='css/deletetitre16.png' title='Delete' /></a></td>
				
				</tr>";
		
		} // Fin de la boucle
		?>

	</table>
		<a href='AC12_Tournee.php'><input type="button" name="Ajouter" value="Ajouter" style="background-color:#FFFFFF" style="color:white; font-weight:bold"> </a>
		
		
		<input type="button" name="Retour" value="Retour" onclick="href='AC11_OrganiserUneTourneeListe.php'" style="background-color:#FFFFFF" style="color:white; font-weight:bold">
</html>