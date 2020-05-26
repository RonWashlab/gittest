<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Übung 2 Kapitel 5</title>
	</head>
	<body>

        <h1>Bewertung mit Switch und For-Schleife</h1>
        
		<?php
            for ($punktzahl = 10; $punktzahl >= 0; $punktzahl--)
            {
                switch ($punktzahl)
                {
                    case 10:
                        $bewertung = "Sehr gut!!";
                    break;
                    case 9:
                        $bewertung = "Gut!";
                    break;
                    case 8:
                        $bewertung = "Befriedigend";
                    break;
                    case 7:
                        $bewertung = "Ausreichend";
                    break;
                    case 6:
                    case 5:
                    case 4:
                    case 3:
                    case 2:
                    case 1:
                    case 0:
                        $bewertung = "Leider zu wenige Punkte erreicht.";
                    break;
                    default:
                        $bewertung = "Leider zu wenige Punkte errreicht.";
                }
                
                echo $punktzahl . " Punkte ergeben folgende Bewertung: " . $bewertung ."<br><br>";
            }
		?>
	</body>
</html>