<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Übung 2 Kapitel 4</title>
	</head>
	<body>
        <h1>Mit Variablen, Operatoren und Konstanten arbeiten</h1>
            <?php
                $bezeichnung_tisch = "Schreibtisch";
                $bezeichnung_stuhl = "Bürostuhl";
                $bezeichnung_lampe = "Lampe";
                $bezeichnung_pctisch = "Computertisch";
                $preis_tisch = 1999.00;
                $preis_stuhl = 589.00;
                $preis_lampe = 29.00;
                $preis_pctisch = 999.00;
                define("MWST", 0.19);
                define("€", " Euro");
                
                //1. 
                $netto_gesamt = $preis_tisch + $preis_stuhl + $preis_lampe + $preis_pctisch; //3616 Euro

                //2.
                $brutto_gesamt = $netto_gesamt + $netto_gesamt * MWST . €; //4303.04 Euro

                //3.
                $brutto_tisch = $preis_tisch + $preis_tisch * MWST . €; //2378.81 Euro

                $brutto_stuhl = $preis_stuhl + $preis_stuhl * MWST . €; //700.91 Euro

                $brutto_lampe = $preis_lampe + $preis_lampe * MWST . €; //34.51 Euro

                $brutto_pctisch = $preis_pctisch + $preis_pctisch * MWST . €; //1188.81 Euro

                //4.
                echo "Netto-Gesamtpreis der eingekauften Artikel: " . $netto_gesamt . € . "<br>";
                echo "Brutto-Gesamtpreis der eingekauften Artikel: " . $brutto_gesamt . "<br><br>";
                echo "Brutto-Preis Schreibtisch: " . $brutto_tisch . "<br>";
                echo "Brutto-Preis Bürostuhl: " . $brutto_stuhl . "<br>";
                echo "Brutto-Preis Schreibtischlampe: " . $brutto_lampe . "<br>";
                echo "Brutto-Preis Computertisch: " . $brutto_pctisch
            ?>
	</body>
</html>