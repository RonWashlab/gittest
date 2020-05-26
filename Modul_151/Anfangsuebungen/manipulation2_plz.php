<html>
<head>
    <title>Daten auslesen und bearbeiten</title>
</head>
<body>
	<?php
		require_once("db.inc.php");
		$sql = "SELECT *
                FROM fi
                where city = 'Helsinki'";
		$abfrage = mysqli_query($verbindung, $sql);
		if(!$abfrage)
		{
			echo "\n<p>Die SQL-Anweisung ist fehlgeschlagen...</p>";
		}
        else
        {
		  $anzahl = mysqli_num_rows($abfrage);
		  echo "\n<p>Die Abfrage hat $anzahl Datensaetze gefunden:</p>";
            echo "\n<form action='auswertung_plz.php' method='POST'><table width='100%' border='1'>
              <tr><th>Auswahl</th>
              <th>Countrycode</th>
              <th>Zipcode</th>
              <th>City</th></tr>";
		  
		  while ($zeile = mysqli_fetch_array($abfrage))
		  {
            echo "\n<tr><td><input type='radio' name='auswahl' value='"
                .$zeile["id"]."'></td><td>" 
                .$zeile["countrycode"] ."</td><td>"
				.$zeile["zipcode"] ."</td><td>"
				.$zeile["city"] ."</td></tr>";
		  }
            echo "\n<tr><td colspan='6' align='center'>";
			echo "<input type='submit' name='edit' value='Bearbeiten'> ";
			echo "<input type='submit' name='delete' value='Loeschen' onClick=\"return confirm('Wirklich loeschen?')\"> ";
			echo "<input type='submit' name='add' value='Hinzufuegen'> ";
			echo "</td></tr>";
            echo "\n</table></form>";
        }
		mysqli_close($verbindung);
	?>
</body>
</html>