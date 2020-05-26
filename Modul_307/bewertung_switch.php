<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Übung 1 Kapitel 5</title>
	</head>
	<body>

        <h1>Bewertung mit Switch</h1>

		<?php
            $punktzahl = 7;
            switch ($punktzahl)
            {
                case 10:
                    echo "<p>Sie haben 10 Punkte erreicht, das ist sehr gut.</p>";
                break;
                case 9:
                    echo "<p>Sie haben 9 Punkte erreicht, das ist gut.</p>";
                break;
                case 8:
                    echo "<p>Sie haben 8 Punkte erreicht, das ist befriedigend.</p>";
                break;
                case 7:
                    echo "<p>Sie haben 7 Punkte erreicht, das ist ausreichend.</p>";
                break;
                case 6:
                case 5:
                case 4:
                case 3:
                case 2:
                case 1:
                case 0:
                    echo "<p>Leider zu wenige Punkte erreicht</p>";
                break;
                default:
                    echo "<p>Leider zu wenige Punkte errreicht</p>";
            }
		?>
	</body>
</html>