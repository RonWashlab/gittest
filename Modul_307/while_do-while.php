<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Übung 3 Kapitel 5</title>
	</head>
	<body>

        <h1>while- und do-while-Schleife</h1>

		<?php
            $zahl = 20;
            
            echo "while-Schleife mit dem Startwert 1 und dem Endwert 5 <br><br>";
            
            while ($zahl <= 5)
            {
                echo $zahl . "<br>";

                $zahl++;
            }

            echo "___________________________________________________________________________________";

            $zahl1 = 20;
            
            echo "<br><br>do-while-Schleife mit dem Startwert 1 und dem Endwert 5 <br><br>";
            
            do
            {
                echo $zahl1 . "<br>";

                $zahl1++;
            }
            while ($zahl1 <= 5)
		?>
	</body>
</html>