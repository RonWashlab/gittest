<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Übung 1 Kapitel 6</title>
	</head>
	<body>

        <h1>Autokennzeichen und dazugehörige Städte</h1>

		<?php
			$kennzeichen = ["HH" => "Hamburg"
						   ,"B" => "Berlin"
						   ,"S" => "Stuttgart"];
			
			$kennzeichen ["F"] = "Frankfurt";
			$kennzeichen ["HB"] = "Bremen";

			unset($kennzeichen["HB"]);
			$kennzeichen ["F"] = "Frankfurt am Main";

			echo "<table border = '1'>";
			echo "<tr><th>Kennzeichen</th><th>Stadt</th></tr>";

			foreach ($kennzeichen as $akz => $stadt)
			{
				echo "<tr><td>$akz</td><td>$stadt</td></tr>";
			}

			echo "</table>";
		?>
	</body>
</html>