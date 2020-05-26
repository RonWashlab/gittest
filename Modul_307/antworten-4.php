<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Übung 1 Kapitel 4</title>
	</head>
	<body>	
		<?php
        $a = 7;
        $b = "30 Euro";
        $c = "!";
        //a)
        echo $a . $b . $c; //730 Euro!
        
        //b)
        echo ""Text""; //Fehlermeldung, da die doppelten Anführungszeichen vor und nach 'Text' nicht mit der Escape-Sequenz ausgeklammert wurde
        
        //c)
        echo "Text" .$a; //Text 7
        
        //d)
        echo "Text" $a . $b //Fehlermeldung, da zwischen "Text" und der Variablen $a kein verbindender Punkt steht.
        
        //e)
        echo $a + $b + $c; //37, a hat den Wert 7, b hat den Wert 30, da dieser String mit der 30 beginnt und c hat den Wert 0, da der String mit keinem numerischen Wert beginnt(Der Browser gibt mir ebenfalls eine Notiz und eine Warnung aus)
        
        //f)
        echo $a * $b / $c; //undefiniert bzw. infinite, da c den Wert 0 hat und man nicht durch 0 teilen kann
        
        //g)
        echo ('<strong>\'Text\'</strong>' . $a . "Text" . $b); //'Text' hervorgehoben und dann anschliessend 7Text30 Euro
		?>
	</body>
</html>