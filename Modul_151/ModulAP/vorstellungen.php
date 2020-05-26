<?php include("berechtigung.php"); ?>
<html>
    <head>
            <meta charset="utf-8">
            <title>Vorstellungen</title>
    </head>
        <body>
            <h1>Vorstellungen</h1>
                <?php
                    header('Content-Type: text/html; charset=iso-8859-1');
                    require_once("dbconlaki.php");

                    $sql ="SELECT *
                            FROM  vorstellung";

                    if(isset($_GET['sort']) == FALSE)
                    {
                        $sql .= " ORDER BY id";
                    }
                    elseif ($_GET['sort'] == 'voidasc')
                    {
                        $sql .= " ORDER BY id asc";
                    }
                    elseif ($_GET['sort'] == 'voiddesc')
                    {
                        $sql .= " ORDER BY id desc";
                    }
                    elseif ($_GET['sort'] == 'dateasc')
                    {
                        $sql .= " ORDER BY datum asc";
                    }
                    elseif ($_GET['sort'] == 'datedesc')
                    {
                        $sql .= " ORDER BY datum desc";
                    }
                    elseif ($_GET['sort'] == 'fidasc')
                    {
                        $sql .= " ORDER BY film_id asc";
                    }
                    elseif ($_GET['sort'] == 'fiddesc')
                    {
                        $sql .= " ORDER BY film_id desc";
                    }
                    elseif ($_GET['sort'] == 'priceasc')
                    {
                        $sql .= " ORDER BY preis asc";
                    }
                    elseif ($_GET['sort'] == 'pricedesc')
                    {
                        $sql .= " ORDER BY preis desc";
                    }
                    

                    $abfrage = mysqli_query($verbindung, $sql);
                ?>

                <table border = 2>
                    <tr><th>ID<br><a href='vorstellungen.php?sort=voidasc'>&uarr;</a>&emsp;
                                  <a href='vorstellungen.php?sort=voiddesc'>&darr;</a></th>

                        <th>Datum<br><a href='vorstellungen.php?sort=dateasc'>&uarr;</a>&emsp;
                                     <a href='vorstellungen.php?sort=datedesc'>&darr;</a></th>

                        <th>Film ID<br><a href='vorstellungen.php?sort=fidasc'>&uarr;</a>&emsp;
                                       <a href='vorstellungen.php?sort=fiddesc'>&darr;</a></th>

                        <th>Preis<br><a href='vorstellungen.php?sort=priceasc'>&uarr;</a>&emsp;
                                     <a href='vorstellungen.php?sort=pricedesc'>&darr;</a></th></tr>

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
                                            .$zeile["datum"] ."</td><td>"
                                            .$zeile["film_id"] ."</td><td>"
                                            .$zeile["preis"] ."</td></tr>";
                        }
                        echo "</table>";
                    }
                    mysqli_close($verbindung);

                    echo "<br>";

                    echo "<a href='filmverwaltung.php'>zur&uuml;ck zur Verwaltung</a>";
                ?>
    </body>
</html>