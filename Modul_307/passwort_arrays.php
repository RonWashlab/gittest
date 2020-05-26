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
                $n = $_POST["count"];
                $length = $_POST["length"];
                
                if(isset($_POST["numbers"]))
                {
                    $zahlen =  range(0, 9);   
                }
                else
                {
                    $zahlen = null;
                }

                if(isset($_POST["calpha"]))
                {
                    $grossbuchstaben = range('A', 'Z');   
                }
                else
                {
                    $grossbuchstaben = null;
                }

                if(isset($_POST["salpha"]))
                {
                    $kleinbuchstaben = range('a', 'z');   
                }
                else
                {
                    $kleinbuchstaben = null;
                }

                if(isset($_POST["soze"]))
                {
                    $sonderzeichen = array('+', '*', 'ç', '%', '&', '$', '!', '?', '=', '@', '#', '(', ')', '[', ']', '{', '}', '-', '/', '~', '^');
                }
                else
                {
                    $sonderzeichen = null;
                }

                //Verknüpft die Arrays miteinander

                $ausgabe = array_merge($zahlen, $grossbuchstaben, $kleinbuchstaben, $sonderzeichen);


                
                for($zaehler = 1; $zaehler <= $n; $zaehler++)
                {
                    shuffle ($ausgabe);
                    $string = implode("", $ausgabe);
                    $pass = substr($string, 0, $length);
                    echo "<h4><b>" . $pass . '</b></h4>';
                }
            }
        ?>
	</body>
</html>