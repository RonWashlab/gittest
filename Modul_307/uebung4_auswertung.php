<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Ausgabe der Fakultät</title>
	</head>
	<body>
        <h1>Ausgabe der Fakultät</h1>
        <?php
            if(isset($_POST["send"]))
            {
                $wert = $_POST["zahl"];
                if(!ctype_digit($wert)) //Falls der Wert negativ oder ein String ist
                {
                    echo "<p>Die Fakultät ist nur für positive, ganze Zahlen definiert.";
                    echo "Bitte geben Sie eine <a href='uebung3.html'> andere Zahl </a>ein.</p>";
                }

                elseif($wert == 0) //Falls der Wert 0 ist.
                {
                    echo "<p>Die Fakultät von 0 ist 0!=1.</p>";
                    echo "<p>Eine <a href='uebung4.html'>neue Zahl</a> berechnen?</p>";
                }

                elseif($wert > 0)
                {
                    $fakultaet = 1;
                    for($zaehler = 1; $zaehler <= $wert; $zaehler++)
                    {
                        $fakultaet = $fakultaet * $zaehler;
                    }
                    echo "<p>Die Fakultät von " . $wert . " ist " . $wert . "! = " . $fakultaet . ".</p>";
                    echo "<p>Eine <a href='uebung4.html'>neue Zahl</a> berechnen?</p>";
                }
            }
        ?>
	</body>
</html>