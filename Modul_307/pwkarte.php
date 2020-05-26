<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Ihre Passwortkarte</title>
	</head>
	<body>
        <h1>Ihre Passwortkarte</h1>
        <?php
            if(isset($_POST["send"]))
            {
                $vert = $_POST["vert"];
                $hor = $_POST["hor"];
                $sbuchstaben = range('A', 'Z');

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

                shuffle ($ausgabe);

                echo "<table border>
                        <tr><th></th>";
                
                $sstart = 1;
                $zahleralpha = 0;
                
                while($sstart <= $hor)
                {
                    echo "<th>$sbuchstaben[$zahleralpha]</th>";
                    $sstart++;
                    $zahleralpha++;
                }

                echo "</tr>";

                $zstart = 1;

                while ($zstart <= $vert)
                {
                    shuffle ($ausgabe);
                    echo "<tr><th>$zstart</th>";
                    $sstart = 1;
                    $zahleralpha = 0;
                    while($sstart <= $hor)
                    {
                        echo "<td>$ausgabe[$zahleralpha]</td>";
                        $sstart++;
                        $zahleralpha++;
                    }
                    echo "<th>$zstart</th>";
                    echo "</tr>";
                    $zstart++;
                }

                echo "<tr><th></th>";
                
                $sstart = 1;
                $zahleralpha = 0;
                
                while($sstart <= $hor)
                {
                    echo "<th>$sbuchstaben[$zahleralpha]</th>";
                    $sstart++;
                    $zahleralpha++;
                }

                echo "</tr>";

                echo "</table>";
                 
            }
        ?>
	</body>
</html>