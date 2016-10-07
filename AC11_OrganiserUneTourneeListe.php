<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
 		<link rel="stylesheet" href="css1.css" />
        <title>AC11 - organiser une tournée</title>
    </head>

    <body>
		<?php include 'connectAD.php' //Connexion a la database       ?>
	
		<!-- Je créer un tableau appelé affichetableau ayant comme en-tete les differents infos qu'il me faut -->
		<div style="overflow-x:auto;">
		<table id="affichetableau" border="1">
			<thead>
				<!-- La taille de mon tableau en hauteur -->
				<tr height="10">
					<!-- Les information contenu en tete de mon tableau -->
					<th width="90">TOURNEE</th>
					<th width="90">DATE</th>
					<th width="90">CHAUFFEUR</th>
					<th width="90">VEHICULE</th>
					<th width="90">DEPART</th>
					<th width="90">ARRIVEE</th>
					<th width="90">MODIFIER</th>
					<th width="90">SUPPRIMER</th>
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
			

			// On affiche le resultat de la requete SQL ($sqlcorps) ou on indique l'erreur de cette requête :
				$result = tableSQL($sqlcorps);
				$comptesql = compteSQL($sqlcorps);
			
			// On fait une boucle pour lister les résultats
				for ($i=0;$i<$comptesql;$i++) {
				?>
					<tr>
						<!-- Ce tableau recupere les données de la database pour les afficher a la suite -->
						<td><?php echo $result[$i][0]; ?></td>
						<td><?php echo $result[$i][1]; ?></td>
						<td><?php echo $result[$i][2]; ?></td>
						<td><?php echo $result[$i][3]; ?></td>
						<td><?php 
									$tourneeNum = $result[$i][0];
									
									$depart_sql =  "SELECT LIEUNOM
													FROM lieu,etape,tournee
													WHERE etape.LIEUID = lieu.LIEUID
													AND etape.TRNNUM = ".$tourneeNum."
													ORDER BY ETPID ASC;";
									//on affiche le resultat de la requete depart_sql ou on indique l'erreur de la requete
									$depart = tableSQL($depart_sql);
									if ($depart) {
									echo $depart[0][0];
									//echo $lieu_depart;
									}
										
						?></td>
					
					
						<td><?php
									$tourneeNum = $result[$i][0];
							
									$arrivee_sql =  "SELECT LIEUNOM
													 FROM lieu,etape,tournee
													 WHERE etape.LIEUID = lieu.LIEUID
													 AND etape.TRNNUM = ".$tourneeNum."
													 ORDER BY ETPID DESC;";
									// on affiche le resultat de la requete arrivee_sql ou on indique l'erreur de la requete
									$arrivee = tableSQL($arrivee_sql);
									if ($arrivee) {
										echo $arrivee[0][0];
										//echo $lieu_arrivee;
									}
								
					echo "</td>";					
		
	
					//La premiere ligne permet la modification d'une ligne et la seconde ligne permet, quand à elle, d'en supprimer une
					echo "<td width='90'><a href='AC12_ModifTournee.php?TRNNUM=".$result[$i][0]."'><img src='css/edittitre16.png' title='Modifier' /></a></td>";

					echo "<td width='90'><a href='AC12_SupprimerTournee.php?TRNNUM=".$result[$i][0]."'><img src='css/deletetitre16.png' title='Delete' /></a></td>
				
					</tr>";
		
			} // Fin de la boucle
			?>

		</table>
		</div>
			<a href='AC12_Tournee.php'><input type="button" name="Ajouter" value="Ajouter" > </a>
		
			<input type="button" name="Retour" value="Retour" onclick="href='AC11_OrganiserUneTourneeListe.php'">
    </body>
</html>