<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Übung 2 Kapitel 6</title>
	</head>
	<body>

        <h1>Sportfest: Startzeiten und Veranstaltungen</h1>

		<?php
            $sportfest = [array("09:30", "Diskuswurf", "Nebenplatz", "Jugendmeisterschaften")
                         ,array("10:00", "5-km-Lauf", "Stadion-Laufbahn", "Offener Lauf") 
                         ,array("11:00", "Halbmarathon", "Waldgebiet", "Teilnahme ab 18 Jahren") 
                         ,array("12:00", "Stabhochsprung", "Stadion-Stabhochsprunganlage", "Nur Frauen")];

			echo "<table border = '1'>";
			echo "<tr><th>Beginn</th><th>Disziplin</th><th>Ort</th><th>Bemerkung</th></tr>";

			foreach($sportfest as $stelle => $reihe)
			{
                list($beginn, $disziplin, $ort, $bemerkung) = $reihe;
				echo "<tr><td>$beginn Uhr</td><td>$disziplin</td><td>$ort</td><td>$bemerkung</td></tr>";
			}

			echo "</table>";
		?>
	</body>
</html>