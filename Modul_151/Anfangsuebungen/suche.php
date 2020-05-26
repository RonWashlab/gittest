<html>
<head><title>Kapitel 3 Uebung 2</title></head>
<body>
	<?php
		require_once("db.inc.de.php");

		if(isset($_POST['ausfuehren']))
		{

			$sql = "SELECT *
					FROM de
					WHERE bic IS NOT NULL ";

			switch($_POST['plz-bereich'])
			{
				case 0:
					$sql .= " AND plz >=00000 AND plz <=09999 ";
					break;
				case 1:
					$sql .= " AND plz >=10000 AND plz <=19999 ";
					break;
				case 2:
					$sql .= " AND plz >=20000 AND plz <=29999 ";
					break;
				case 3:
					$sql .= " AND plz >=30000 AND plz <=39999 ";
					break;
				case 4:
					$sql .= " AND plz >=40000 AND plz <=49999 ";
					break;
				case 5:
					$sql .= " AND plz >=50000 AND plz <=59999 ";
					break;
				case 6:
					$sql .= " AND plz >=60000 AND plz <=69999 ";
					break;
				case 7:
					$sql .= "AND plz >=70000 AND plz <=79999 ";
					break;
				case 8:
					$sql .= " AND plz >=80000 AND plz <=89999 ";
					break;
				case 9:
					$sql .= " AND plz >=90000 AND plz <=99999 ";
					break;
			}

			if(trim($_POST['bankname'] <> '' ))
			{
				$sql .= " AND bezeichnung LIKE '%" .$_POST['bankname'] ."%'";
			}

			switch($_POST['sort'])
			{
				case "bank":
					$sql .= "ORDER BY bezeichnung";
					break;
				case "plz":
					$sql .= "ORDER BY plz";
					break;
			}

			$resultat = mysqli_query($verbindung1, $sql);
			if(!$resultat)
			{
				echo "<p>Die SQL-Anweisung ist fehlgeschlagen...</p>";
			}
			else
			{
				$anzahl = mysqli_num_rows($resultat);
				echo "<p>Es wurden $anzahl Datensaetze gefunden:</p>";
				echo "<table width='100%' border='1'>
						<tr><th>Bankleitzahl</th><th>Name</th><th>Postleitzahl</th><th>Ort</th><th>BIC</th></tr>";
				while ($row = mysqli_fetch_assoc($resultat))
				{
				echo "<tr><td>" .$row["bankleitzahl"] ."</td><td>"
					.$row["bezeichnung"] ."</td><td>"
					.$row["plz"] ."</td><td>"
					.$row["ort"] ."</td><td>"
					.$row["bic"] ."</td></tr>";
				}
				echo "</table>";
			}
		}
		else
		{
			$sql = "SELECT DISTINCT ort
					FROM de
					WHERE ort
					 LIKE 'A%'
					ORDER BY ort";
			$resultat = mysqli_query($verbindung1, $sql);

			echo "<h3>Formular zur Auswahl von Datens&auml;tzen aus der Tabelle 'de'</h3>";
			echo "<p>Geben Sie einen Teil des Namens der gesuchten Bank(en) ein:</p>";
			echo "<form action='" .$_SERVER['PHP_SELF'] ."' method='POST'>\n";
			echo "<p><input type='text' name='bankname'></p>";
			echo "<p>Waehlen Sie den gewuenschten PLZ-Bereich aus:</p>";
			echo "<p><select name = 'plz-bereich'></p>";
			echo "<option value = '0'>PLZ-Bereich 0</option>\n";
			echo "<option value = '1'>PLZ-Bereich 1</option>\n";
			echo "<option value = '2'>PLZ-Bereich 2</option>\n";
			echo "<option value = '3'>PLZ-Bereich 3</option>\n";
			echo "<option value = '4'>PLZ-Bereich 4</option>\n";
			echo "<option value = '5'>PLZ-Bereich 5</option>\n";
			echo "<option value = '6'>PLZ-Bereich 6</option>\n";
			echo "<option value = '7'>PLZ-Bereich 7</option>\n";
			echo "<option value = '8'>PLZ-Bereich 8</option>\n";
			echo "<option value = '9'>PLZ-Bereich 9</option>\n";
			echo "</select></p>";
			echo "<p>Nach was soll sortiert werden?</p>";
			echo "<p><input type='radio' name='sort' value='bank' checked> Bank<br>";
			echo "<input type='radio' name='sort' value='plz'> PLZ</p>";
			echo "<p><input type='submit' name='ausfuehren' value='Abfrage ausfuehren'></p>";
		}
		mysqli_close($verbindung1);
	?>
</body>
</html>
