<?php include("berechtigung.php"); ?>
<html>
    <head>
            <meta charset="utf-8">
            <title>Verleiher</title>
    </head>
        <body>
            <h1>Verleiher</h1>
                <?php
                    header('Content-Type: text/html; charset=iso-8859-1');
                    require_once("dbconlaki.php");

                    $sql ="SELECT *
                            FROM  verleiher";

                    if(isset($_GET['sort']) == FALSE)
                    {
                        $sql .= " ORDER BY id";
                    }
                    elseif ($_GET['sort'] == 'vidasc')
                    {
                        $sql .= " ORDER BY id asc";
                    }
                    elseif ($_GET['sort'] == 'viddesc')
                    {
                        $sql .= " ORDER BY id desc";
                    }
                    elseif ($_GET['sort'] == 'nameasc')
                    {
                        $sql .= " ORDER BY name asc";
                    }
                    elseif ($_GET['sort'] == 'namedesc')
                    {
                        $sql .= " ORDER BY name desc";
                    }
                    

                    $abfrage = mysqli_query($verbindung, $sql);
                ?>

                <table border = 2>
                    <tr><th>ID<br><a href='verleiher.php?sort=vidasc'>&uarr;</a>&emsp;
                                  <a href='verleiher.php?sort=viddesc'>&darr;</a></th>

                        <th>Name<br><a href='verleiher.php?sort=nameasc'>&uarr;</a>&emsp;
                                    <a href='verleiher.php?sort=namedesc'>&darr;</a></th></tr>

                <?php
                    if(!$abfrage)
                    {
                        echo "<P>Die SQL-Anweisung ist fehlgeschlagen...</P>";
                    }
                    else
                    {
                        $anzahl = mysqli_num_rows($abfrage);
                        echo "<p>Die Abfrage hat $anzahl Datens&auml;tze gefunden:</p>";

                        while ($zeile = mysqli_fetch_array($abfrage))
                        {
                            echo "<tr><td>" .$zeile["id"] ."</td><td>"
                                            .$zeile["name"] ."</td><td></tr>";
                        }
                        echo "</table>";
                    }
                    mysqli_close($verbindung);

                    echo "<br>";

                    echo "<a href='filmverwaltung.php'>zur&uuml;ck zur Verwaltung</a>";
                ?>
    </body>
</html>