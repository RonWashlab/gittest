<?php include("berechtigung.php"); ?>
<html>
    <head>
            <meta charset="utf-8">
            <title>Kunden</title>
    </head>
        <body>
            <h1>Kunden</h1>
                <?php
                    header('Content-Type: text/html; charset=iso-8859-1');
                    require_once("dbconlaki.php");

                    $sql ="SELECT *
                            FROM  kunde";

                    if(isset($_GET['sort']) == FALSE)
                    {
                        $sql .= " ORDER BY id";
                    }

                    elseif ($_GET['sort'] == 'kidasc')
                    {
                        $sql .= " ORDER BY id asc";
                    }
                    elseif ($_GET['sort'] == 'kiddesc')
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

                    elseif ($_GET['sort'] == 'vnameasc')
                    {
                        $sql .= " ORDER BY vorname asc";
                    }
                    elseif ($_GET['sort'] == 'vnamedesc')
                    {
                        $sql .= " ORDER BY vorname desc";
                    }

                    elseif ($_GET['sort'] == 'streetasc')
                    {
                        $sql .= " ORDER BY strasse asc";
                    }
                    elseif ($_GET['sort'] == 'streetdesc')
                    {
                        $sql .= " ORDER BY strasse desc";
                    }

                    elseif ($_GET['sort'] == 'hnrasc')
                    {
                        $sql .= " ORDER BY hausnummer asc";
                    }
                    elseif ($_GET['sort'] == 'hnrdesc')
                    {
                        $sql .= " ORDER BY hausnummer desc";
                    }

                    elseif ($_GET['sort'] == 'plzasc')
                    {
                        $sql .= " ORDER BY plz asc";
                    }
                    elseif ($_GET['sort'] == 'plzdesc')
                    {
                        $sql .= " ORDER BY plz desc";
                    }

                    elseif ($_GET['sort'] == 'ortasc')
                    {
                        $sql .= " ORDER BY ort asc";
                    }
                    elseif ($_GET['sort'] == 'ortdesc')
                    {
                        $sql .= " ORDER BY ort desc";
                    }

                    elseif ($_GET['sort'] == 'lcodeasc')
                    {
                        $sql .= " ORDER BY landcode asc";
                    }
                    elseif ($_GET['sort'] == 'lcodedesc')
                    {
                        $sql .= " ORDER BY landcode desc";
                    }

                    elseif ($_GET['sort'] == 'telasc')
                    {
                        $sql .= " ORDER BY telefon asc";
                    }
                    elseif ($_GET['sort'] == 'teldesc')
                    {
                        $sql .= " ORDER BY telefon desc";
                    }

                    elseif ($_GET['sort'] == 'mailasc')
                    {
                        $sql .= " ORDER BY email asc";
                    }
                    elseif ($_GET['sort'] == 'maildesc')
                    {
                        $sql .= " ORDER BY email desc";
                    }
                    

                    $abfrage = mysqli_query($verbindung, $sql);
                ?>
                <table border = 2>
                    <tr><th>ID<br><a href='kunden.php?sort=kidasc'>&uarr;</a>&emsp;
                                  <a href='kunden.php?sort=kiddesc'>&darr;</a></th>

                        <th>Name<br><a href='kunden.php?sort=nameasc'>&uarr;</a>&emsp;
                                    <a href='kunden.php?sort=namedesc'>&darr;</a></th>

                        <th>Vorname<br><a href='kunden.php?sort=vnameasc'>&uarr;</a>&emsp;
                                       <a href='kunden.php?sort=vnamedesc'>&darr;</a></th>

                        <th>Strasse<br><a href='kunden.php?sort=streetasc'>&uarr;</a>&emsp;
                                       <a href='kunden.php?sort=streetdesc'>&darr;</a></th>
                                     
                        <th>Hausnummer<br><a href='kunden.php?sort=hnrasc'>&uarr;</a>&emsp;
                                          <a href='kunden.php?sort=hnrdesc'>&darr;</a></th>

                        <th>PLZ<br><a href='kunden.php?sort=plzasc'>&uarr;</a>&emsp;
                                   <a href='kunden.php?sort=plzdesc'>&darr;</a></th>

                        <th>Ort<br><a href='kunden.php?sort=ortasc'>&uarr;</a>&emsp;
                                   <a href='kunden.php?sort=ortdesc'>&darr;</a></th>

                        <th>Landcode<br><a href='kunden.php?sort=lcodeasc'>&uarr;</a>&emsp;
                                        <a href='kunden.php?sort=lcodedesc'>&darr;</a></th>

                        <th>Telefon<br><a href='kunden.php?sort=telasc'>&uarr;</a>&emsp;
                                       <a href='kunden.php?sort=teldesc'>&darr;</a></th>

                        <th>eMail<br><a href='kunden.php?sort=mailasc'>&uarr;</a>&emsp;
                                     <a href='kunden.php?sort=maildesc'>&darr;</a></th></tr>

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
                                            .$zeile["name"] ."</td><td>"
                                            .$zeile["vorname"] ."</td><td>"
                                            .$zeile["strasse"] ."</td><td>"
                                            .$zeile["hausnummer"] ."</td><td>"
                                            .$zeile["plz"] ."</td><td>"
                                            .$zeile["ort"] ."</td><td>"
                                            .$zeile["landcode"] ."</td><td>"
                                            .$zeile["telefon"] ."</td><td>"
                                            .$zeile["email"] ."</td></tr>";
                        }
                        echo "</table>";
                    }
                    mysqli_close($verbindung);

                    echo "<br>";

                    echo "<a href='filmverwaltung.php'>zur&uuml;ck zur Verwaltung</a>";
                ?>
    </body>
</html>