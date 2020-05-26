<html>
<head><title>Kapitel 7: &Uuml;bung 2</title></head>
<body>
	<?php
		$db = new mysqli("localhost", "root", "", "bankleitzahlen");
		if ($db->connect_error) 
		{
			die("<p>MySQLi-Verbindungsaufnahme gescheitert: " .$db->connect_error ."</p>");
		}
		$db->query("CREATE TABLE IF NOT EXISTS pass(id int(11) auto_increment, name varchar(50), kennwort varchar(32), PRIMARY KEY (id))");
		$sql = "INSERT into pass(name, kennwort) VALUES (?, ?)";
		$prep_state = $db->prepare($sql);
		$prep_state->bind_param('ss', $name, $kennwort);
		//1
		$name = $db->real_escape_string("Andreas");
		$kennwort = $db->real_escape_string(md5("gphp52f")); 
		$prep_state->execute();
		//2
		$name = $db->real_escape_string("Nora");
		$kennwort = $db->real_escape_string(md5("zuwtr634")); 
		$prep_state->execute();
		//3
		$name = $db->real_escape_string("Corinna");
		$kennwort = $db->real_escape_string(md5("89896969")); 
		$prep_state->execute();
		//4
		$name = $db->real_escape_string("Otto");
		$kennwort = $db->real_escape_string(md5("dfjkh783")); 
		$prep_state->execute();
		//5
		$name = $db->real_escape_string("Sandra");
		$kennwort = $db->real_escape_string(md5("326wrw783")); 
		$prep_state->execute();
		$prep_state->close();
		echo "<p>Prepared statement ausgef&uuml;hrt.</p>";
		$db->close();
	?>
</body>
</html>