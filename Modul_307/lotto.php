<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Lottozahlen</title>
	</head>
	<body>
        <h1>Ausgabe der Lottozahlen</h1>
            <?php
                $wert = $_POST["Lotto"];
                if ($wert == "Swisslotto")
                {
                    $zahlen = range(1, 42);
                    shuffle($zahlen);

                    echo "<p>Die heutigen " . $wert . "-Gewinnzahlen sind:<br><br>";

                    echo "<b>" . $zahlen[1] . "</b>";
                    echo " | ";
                    echo "<b>" . $zahlen[2] . "</b>";
                    echo " | ";
                    echo "<b>" . $zahlen[3] . "</b>";
                    echo " | ";
                    echo "<b>" . $zahlen[4] . "</b>";
                    echo " | ";
                    echo "<b>" . $zahlen[5] . "</b>";
                    echo " | ";
                    echo "<b>" . $zahlen[6] . "</b>";

                    echo "<br><br>";

                    echo "Mit den Zusatzzahlen:<br><br>";

                    $glueckz = range(1, 6);
                    shuffle($glueckz);

                    echo "<b>" . $glueckz[1] . "</b>";
                    echo " | ";
                    echo "<b>" . $glueckz[2] . "</b></p";
                }

                else if ($wert == "Euromillions")
                {
                    $zahlen = range(1, 50);
                    shuffle($zahlen);

                    echo "<p>Die heutigen " . $wert . "-Gewinnzahlen sind:<br><br>";

                    echo "<b>" . $zahlen[1] . "</b>";
                    echo " | ";
                    echo "<b>" . $zahlen[2] . "</b>";
                    echo " | ";
                    echo "<b>" . $zahlen[3] . "</b>";
                    echo " | ";
                    echo "<b>" . $zahlen[4] . "</b>";
                    echo " | ";
                    echo "<b>" . $zahlen[5] . "</b>";
                    echo " | ";
                    echo "<b>" . $zahlen[6] . "</b>";

                    echo "<br><br>";

                    echo "Mit den Zusatzzahlen:<br><br>";

                    $glueckz = range(1, 12);
                    shuffle($glueckz);

                    echo "<b>" . $glueckz[1] . "</b>";
                    echo " | ";
                    echo "<b>" . $glueckz[2] . "</b></p>";
                }
            ?>
	</body>
</html>