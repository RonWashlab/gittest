<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Ausgabe der Passwörter</title>
	</head>
	<body>
        <h1>Ausgabe der Passwörter</h1>
        <?php
            if(isset($_POST["send"]))
            {
                $length = $_POST["length"];
                $n = $_POST["count"];
                
                function generatePassword ( $passwordlength = 8,
                                                $numNonAlpha = 0,
                                                $numNumberChars = 0,
                                                $useCapitalLetter = false )
                {

                    $numberChars = '123456789';
                    $specialChars = '!$%&=?*@#';
                    $secureChars = 'abcdefghjkmnpqrstuvwxyz';
                    $stack = '';

                    // Stack für Password-Erzeugung füllen
                    $stack = $secureChars;

                    if ( $useCapitalLetter == true )
                    $stack .= strtoupper ( $secureChars );

                    $count = $passwordlength - $numNonAlpha - $numNumberChars;
                    $temp = str_shuffle ( $stack );
                    $stack = substr ( $temp , 0 , $count );

                    if ( $numNonAlpha > 0 ) {
                    $temp = str_shuffle ( $specialChars );
                    $stack .= substr ( $temp , 0 , $numNonAlpha );
                    }

                    if ( $numNumberChars > 0 ) {
                    $temp = str_shuffle ( $numberChars );
                    $stack .= substr ( $temp , 0 , $numNumberChars );
                    }


                    // Stack durchwürfeln
                    $stack = str_shuffle ( $stack );

                    // Rückgabe des erzeugten Passwort
                    return $stack;

                }

                if(!ctype_digit($length) or $length < 6)
                {
                    echo "Die Eingabe war ungültig, die Mindestlänge der Passwörter ist 6 Zeichen.<br>";
                    echo "Bitte versuchen Sie es <a href='uebung5.html'>hier</a> erneut.";
                }

                else
                {
                    for($zaehler = 1; $zaehler <= $n; $zaehler++)
                    {
                        $passwd = generatePassword ( $length, random_int(1, 3), random_int(1, 3), true );
                        echo "<h4><b>" . $passwd . '</b></h4>';
                    }
                }

                
            }
        ?>
	</body>
</html>