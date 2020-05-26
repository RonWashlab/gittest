<html>
<head><title>Kapitel 3: Uebungen 3, 4 & 5</title></head>
<body>
	<?php
		require_once("db.inc.php");

		if(isset($_POST['tabellen-zeigen']))
		{
			$tables = mysqli_query($verbindung, "SHOW TABLES FROM " .$_POST['db']);
			echo "<h3>Tabellen in der Datenbank <strong>" .$_POST['db'] ."</strong>:</h3>";
			echo "<p>Bitte waehlen Sie eine Tabelle aus:</p>";
			echo "<form action='" .$_SERVER['PHP_SELF'] ."' method='POST'>";
			while ($row = mysqli_fetch_array($tables))
			{
				echo "<input type='radio' name='tab' value='$row[0]' checked='checked'> " .$row[0] . "<br>";
			}
			echo "<input type='hidden' name='db' value='" .$_POST['db'] ."'>";
			echo "<input type='submit' name='details-zeigen' value='Tabelle auswaehlen'>";
			echo "<input type='submit' value='Abbrechen'>";
			echo "</form>";
		}

		elseif(isset($_POST['details-zeigen']))
		{
			$sql = "SELECT *
					FROM " .$_POST['db'] ."." .$_POST['tab'] ." LIMIT 0,1";
			$abfrage = mysqli_query($verbindung, $sql);
			$anzahl = mysqli_num_fields($abfrage);
			$tabelle = mysqli_fetch_field($abfrage);
			echo "<h3>Tabelle $tabelle->table: $anzahl Felder</h3>";
			echo "<table width='600'cellpadding='5' cellspacing='5'><tr align='center'><th>Name</th><th>Typ</th><th>Laenge</th><th>Flags</th></tr>";
			$x = 0;
			while($x < $anzahl)
			{
				$ffd = mysqli_fetch_field_direct($abfrage, $x);
				$feldname  = $ffd->name;
				$feldtyp   = $ffd->type;
				$feldlen   = $ffd->length;
				$feldflags = $ffd->flags;
				echo "<tr><td align='center'>$feldname</td>";
				echo "<td align='center'>$feldtyp</td>";
				echo "<td align='center'>$feldlen</td>";
				echo "<td align='center'>$feldflags</td></tr>";
				$x++;
			}
			echo "</table>";
		}
		else
		{
			$dbs = mysqli_query($verbindung, 'SHOW DATABASES');
			echo "<h3>Datenbanken auf dem lokalen Server</h3>";
			echo "<p>Bitte w&auml;hlen Sie eine Datenbank aus:</p>";
			echo "<form action='" .$_SERVER['PHP_SELF'] ."' method='POST'>";
			while ($row = mysqli_fetch_array($dbs))
			{
				echo "<input type='radio' name='db' value='$row[0]' checked='checked'> " .$row[0] . "<br>";
			}
			echo "<input type='submit' name='tabellen-zeigen' value='Datenbank auswaehlen'>";
			echo "</form>";
		}

		mysqli_close($verbindung);
	?>
</body>
</html>
