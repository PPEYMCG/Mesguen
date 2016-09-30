<html>

	<?php include 'connectAD.php' //Connexion a la database ?>
	
	<!-- Je cr�er un tableau appel� affichetableau ayant comme en-tete les differents infos qu'il me faut -->
	<table id="affichetableau" border="1">
		<thead>
			<!-- La taille de mon tableau en hauteur -->
			<tr height="10">
				<!-- Les information contenu en tete de mon tableau -->
				<th width="90">Tourn�e</th>
				<th width="90">Date</th>
				<th width="90">Chauffeur</th>
				<th width="90">V�hicule</th>
				<th width="90">D�part</th>
				<th width="90">Arriv�e</th>
				<th width="90">Modifier</th>
				<th width="90">Supprimer</th>
			</tr>
		</thead>

	<?php
		/* Cette requete SQL fournit des �l�ments pour mon tableau, il rassemble la majeure partie des �l�ments n�cessaires
		 * Elle me permet donc de chercher dans ma Database :
		 * Le numero de la tournee
		 * La date exacte de la tournee
		 * Le nom du chauffeur
		 * Numero d'immatriculation du v�hicule utilis� 
		 */
			$sqlcorps  =   "SELECT `TRNNUM`, `TRNDTE`, `CHFNOM`, `VEHIMMAT` 
							FROM `tournee`, `chauffeur` 
							WHERE tournee.CHFID = chauffeur.CHFID;";
		

		// On affiche le resultat de la requete SQL ($sqlcorps) ou on indique l'erreur de cette requ�te :
			$result = tableSQL($sqlcorps);
			$comptesql = compteSQL($sqlcorps);
			
		// On fait une boucle pour lister les r�sultats
			for ($i=0;$i<$comptesql;$i++) {
			?>
				<tr>
					<!-- Ce tableau recupere les donn�es de la database pour les afficher a la suite -->
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
		
	
				//La premiere ligne permet la modification d'une ligne et la seconde ligne permet, quand � elle, d'en supprimer une
				echo "<td width='90'><a href='AC12_ModifTournee.php?TRNNUM=".$result[$i][0]."'><img src='css/edittitre16.png' title='Modifier' /></a></td>";

				echo "<td width='90'><a href='AC12_SupprimerTournee.php?TRNNUM=".$result[$i][0]."'><img src='css/deletetitre16.png' title='Delete' /></a></td>
				
				</tr>";
		
		} // Fin de la boucle
		?>

	</table>
		<a href='AC12_Tournee.php'><input type="button" name="Ajouter" value="Ajouter" style="background-color:#FFFFFF" style="color:white; font-weight:bold"> </a>
		
		
		<input type="button" name="Retour" value="Retour" onclick="href='AC11_OrganiserUneTourneeListe.php'" style="background-color:#FFFFFF" style="color:white; font-weight:bold">
</html>