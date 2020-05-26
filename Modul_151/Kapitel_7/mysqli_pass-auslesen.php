<html>
<head><title>Kapitel 7: &Uuml;bung 1</title></head>
<body>
	<?php
		$db = new mysqli("localhost", "root", "", "bankleitzahlen");
		if ($db->connect_error) 
		{
			die("<p>MySQLi-Verbindungsaufnahme gescheitert: " .$db->connect_error ."</p>");
		}
		$sql = "SELECT * FROM pass";
		$ergebnis = $db->query($sql); 
		$anzahl = $db->affected_rows;
		echo "<p>Die Abfrage hat $anzahl Datens&auml;tze gefunden:</p>";
		echo "<table width='100%' border='1'>
			  <tr><th>ID</th><th>Name</th><th>Kennwort-Hash</th></tr>";
		while ($zeile = $ergebnis->fetch_object()) 
		{
			echo "<tr><td>" .$zeile->id ."</td><td>"
					.$zeile->name ."</td><td>"
					.$zeile->kennwort ."</td></tr>";
		}
		$db->close();
	?>
</body>
</html>