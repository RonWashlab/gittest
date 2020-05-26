<html>
<head><title>Daten auslesen und zur Bearbeitung anbieten</title></head>
<body>
	<?php
		header('Content-Type: text/html; charset=iso-8859-1');
		require_once("db.inc.php");
		$sql = "SELECT *
                FROM fi
                WHERE city = 'Helsinki'";
        $abfrage = mysqli_query($verbindung, $sql);
        
		if(!$abfrage)
		{
			echo "\n<p>Die SQL-Anweisung ist fehlgeschlagen...</p>";
        }
        
		$anzahl = mysqli_num_rows($abfrage);
		echo "\n<p>Die Abfrage hat $anzahl Datensaetze gefunden:</p>";
		echo "\n<form><table width='100%' border='1'>
              <tr><th>Auswahl</th>
              <th>Land</th>
              <th>PLZ</th>
              <th>Ort</th></tr>";
		
		while ($zeile = mysqli_fetch_array($abfrage))
		{
            echo "\n<tr><td><input type='radio' name='auswahl' value='" 
                .$zeile["id"]."'></td><td>" 
                .$zeile["countrycode"] ."</td><td>"
				.$zeile["zipcode"] ."</td><td>"
				.$zeile["city"] ."</td>";
		}
		echo "\n</table></form>";
		mysqli_close($verbindung);
	?>
</body>
</html>