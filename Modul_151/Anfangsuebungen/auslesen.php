<html>
<head><title>Daten auslesen</title></head>
<body>
    <?php
        header('Content-Type: text/html; charset=iso-8859-1');
        require_once("db.inc.php");
        $sql ="SELECT *
                FROM  fi
                WHERE city = 'Helsinki'
                ORDER BY zipcode";
        $abfrage = mysqli_query($verbindung, $sql);

        if(!$abfrage)
        {
            echo "<P>Die SQL-Anweisung ist fehlgeschlagen...</P>";
        }
        else
        {
            $anzahl = mysqli_num_rows($abfrage);
            echo "<p>Die Abfrage hat $anzahl Datensaetze gefunden:</p>";
            echo "<table width = '100%' border = '1'>
                    <tr><th>ID</th>
                    <th>Countrycode</th>
                    <th>Zipcode</th>
                    <th>City</th></tr>";
            while ($zeile = mysqli_fetch_array($abfrage))
            {
                echo "<tr><td>" .$zeile["id"] ."</td><td>"
                                .$zeile["countrycode"] ."</td><td>"
                                .$zeile["zipcode"] ."</td><td>"
                                .$zeile["city"] ."</td></tr>";
            }
            echo "</table>";
        }
        mysqli_close($verbindung);
    ?>
</body>
</html>