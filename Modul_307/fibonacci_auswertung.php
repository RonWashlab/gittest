<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Ausgabe der Fibonacci-Zahlen</title>
	</head>
	<body>
        <h1>Ausgabe der Fibonacci-Zahlen</h1>
        <?php
            if(isset($_POST["send"]))
            {
                $start = $_POST["start"];
                $end = $_POST["end"];
                $i1 = 0;
                $i2 = 1;
                $i = 0;
                
                if($start == 0)
                {
                    echo "0<br>";
                    echo "1<br>";
                }

                if($start == 1)
                {
                    echo "1<br>";
                }
                
                do
                {
                    $i = $i1 + $i2;
                    $i1 = $i2;
                    $i2 = $i;

                    if($i >= $start and $i <= $end)
                    {
                        echo $i;
                        echo "<br>";
                    } 
                }while($i <= $end);
            }
        ?>
	</body>
</html>