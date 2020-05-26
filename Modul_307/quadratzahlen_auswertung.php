<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Quadratzahlen Resultate</title>
	</head>
	<body>
        <h1>Resultatausgabe</h1>
            <p>Hier sehen Sie alle Quadratzahlen bis zu dem von Ihnen eingegebenen Wert<br></p>
            <?php
             $zaehler = 1;
             $quad;
             for ($zaehler = 1; $zaehler <= $_POST["Endzahl"]; $zaehler++)
             {
                $quad = $zaehler * $zaehler;
                echo $quad . " ist die Quadratzahl von " . $zaehler . "<br><br>"; 
             }
            ?>
	</body>
</html>