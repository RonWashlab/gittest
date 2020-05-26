<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Kapitel 7 Übung 1</title>
	</head>
	<body>
        <h1>Auswertung des Formulars</h1>
            <p>Vielen Dank für die Teilnahme an unserer Umfrage. Sie haben folgende Daten übermittelt:<br><br></p>
            <?php
                    echo "<p>Vorname: " . $_POST["Vorname"] . "<br>";
                    echo "Nachname: " . $_POST["Nachname"] . "<br>";
                    echo "Ort: " . $_POST["Ort"] . "<br>";
                    echo "Wohnung: " . $_POST["Wohnen"] . "<br>";
                    echo "Beliebte TV-Sendungen: ";
                    echo implode(", ", $_POST["Tvshow"]) . "<br>";

                    if (empty($_POST["Memo"]))
                    {
                        echo "Nachricht: <i>keine</i></p>";
                    }

                    else
                    {
                        echo "Nachricht: " . $_POST["Memo"] . "</p>"; 
                    }
            ?>
	</body>
</html>