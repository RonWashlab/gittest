<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Potenzberechnung</title>
	</head>
	<body>
        <h1>Ausgabe des Resultats der Potenzrechnung</h1>
        <?php
            if(isset($_POST["send"]))
            {
                if(!ctype_digit($_POST["zahl"]) or !ctype_digit($_POST["potenz"]))
                {
                    echo "Die Eingabe war ungültig, bitte geben Sie nur positive Zahlen ein.";
                    echo "<p>Eine <a href='uebung3.html'>neue Zahl</a> berechnen?</p>";
                }
                else
                {
                    $resultat = pow($_POST["zahl"], $_POST["potenz"]);
                    echo "Die Potenzberechnung von " . $_POST["zahl"] . " mit dem Exponent " . $_POST["potenz"] . " ergibt <b><u>" . $resultat . "</u></b>.";
                }
            }
        ?>
	</body>
</html>