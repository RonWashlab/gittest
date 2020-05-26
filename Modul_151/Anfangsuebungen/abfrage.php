<html>
<head><title>MySQL: Abfrage mit mysql_query()</title></head>
<body>
    <?php
        header('Content-Type: text/html; charset=iso-8859-1');
        require_once("db.inc.php");
        $sql = "SELECT *
                From  fi
                where city = 'Helsinki'";
        $abfrage = mysqli_query($verbindung, $sql);
        if ($abfrage)
        {
            echo "<p>Erfolg! " . mysqli_num_rows($abfrage) ." Treffer.</p>";
        }
        else
        {
            echo "<p>Die SQL-Anweisung ist fehlgeschlagen...</p>";
        }
        mysqli_close($verbindung);
    ?>
</body>
</html>