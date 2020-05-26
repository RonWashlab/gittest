<?php include("zugang.php"); ?>
<html>
    <head>
            <meta charset="utf-8">
            <title>Abteilungen</title>
            <link rel="stylesheet" type="text/css" href="phpdesign.css">
    </head>
        <body>
            <h1>Abteilungen</h1>
                <?php
                    header('Content-Type: text/html; charset=iso-8859-1');
                    require_once("db.inc.firma.php");
                    $sql ="SELECT *
                            FROM  abteilung";

                    if(isset($_GET['sort']) == FALSE)
                    {
                        $sql .= " ORDER BY abteilung_id";
                    }
                    elseif ($_GET['sort'] == 'abidasc')
                    {
                        $sql .= " ORDER BY abteilung_id asc";
                    }
                    elseif ($_GET['sort'] == 'abiddesc')
                    {
                        $sql .= " ORDER BY abteilung_id desc";
                    }
                    elseif ($_GET['sort'] == 'bezeichnungasc')
                    {
                        $sql .= " ORDER BY bezeichnung asc";
                    }
                    elseif ($_GET['sort'] == 'bezeichnungdesc')
                    {
                        $sql .= " ORDER BY bezeichnung desc";
                    }
                    elseif ($_GET['sort'] == 'aufgabenasc')
                    {
                        $sql .= " ORDER BY aufgaben asc";
                    }
                    elseif ($_GET['sort'] == 'aufgabendesc')
                    {
                        $sql .= " ORDER BY aufgaben desc";
                    }
                    

                    $abfrage = mysqli_query($verbindung, $sql);
                ?>

                <table>
                    <tr><th>Abteilung ID<br><a href='abteilungen.php?sort=abidasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                        <a href='abteilungen.php?sort=abiddesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>

                        <th>Bezeichnung<br><a href='abteilungen.php?sort=bezeichnungasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                       <a href='abteilungen.php?sort=bezeichnungdesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>

                        <th>Aufgaben<br><a href='abteilungen.php?sort=aufgabenasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                    <a href='abteilungen.php?sort=aufgabendesc'><button class='button button1' title='absteigend'>&darr;</button></a></th></tr>

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
                            echo "<tr><td>" .$zeile["abteilung_id"] ."</td><td>"
                                            .$zeile["bezeichnung"] ."</td><td>"
                                            .$zeile["aufgaben"] ."</td></tr>";
                        }
                        echo "</table>";
                    }
                    mysqli_close($verbindung);

                    echo "<br>";

                    echo "<a href='projektverwaltung.php'><button class='button button2'>zur&uuml;ck</button></a>";
                ?>
    </body>
</html>