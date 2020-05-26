<?php include("berechtigung.php"); ?>
<html>
    <head>
            <meta charset="utf-8">
            <title>Bestellungen</title>
    </head>
        <body>
            <h1>Bestellungen</h1>
                <?php
                    header('Content-Type: text/html; charset=iso-8859-1');
                    require_once("dbconlaki.php");

                    $sql ="SELECT *
                            FROM  bestellung";

                    if(isset($_GET['sort']) == FALSE)
                    {
                        $sql .= " ORDER BY id";
                    }

                    elseif ($_GET['sort'] == 'bidasc')
                    {
                        $sql .= " ORDER BY id asc";
                    }
                    elseif ($_GET['sort'] == 'biddesc')
                    {
                        $sql .= " ORDER BY id desc";
                    }

                    elseif ($_GET['sort'] == 'kidasc')
                    {
                        $sql .= " ORDER BY kunde_id asc";
                    }
                    elseif ($_GET['sort'] == 'kiddesc')
                    {
                        $sql .= " ORDER BY kunde_id desc";
                    }

                    elseif ($_GET['sort'] == 'vidasc')
                    {
                        $sql .= " ORDER BY vorstellung_id asc";
                    }
                    elseif ($_GET['sort'] == 'viddesc')
                    {
                        $sql .= " ORDER BY vorstellung_id desc";
                    }

                    elseif ($_GET['sort'] == 'nasc')
                    {
                        $sql .= " ORDER BY anzahl asc";
                    }
                    elseif ($_GET['sort'] == 'ndesc')
                    {
                        $sql .= " ORDER BY anzahl desc";
                    }

                    elseif ($_GET['sort'] == 'kknrasc')
                    {
                        $sql .= " ORDER BY kreditkartenummer asc";
                    }
                    elseif ($_GET['sort'] == 'kknrdesc')
                    {
                        $sql .= " ORDER BY kreditkartenummer desc";
                    }

                    elseif ($_GET['sort'] == 'kkmasc')
                    {
                        $sql .= " ORDER BY kreditkartemonat asc";
                    }
                    elseif ($_GET['sort'] == 'kkmdesc')
                    {
                        $sql .= " ORDER BY kreditkartemonat desc";
                    }

                    elseif ($_GET['sort'] == 'kkjasc')
                    {
                        $sql .= " ORDER BY kreditkartejahr asc";
                    }
                    elseif ($_GET['sort'] == 'kkjdesc')
                    {
                        $sql .= " ORDER BY kreditkartejahr desc";
                    }

                    elseif ($_GET['sort'] == 'dateasc')
                    {
                        $sql .= " ORDER BY abholdatum asc";
                    }
                    elseif ($_GET['sort'] == 'datedesc')
                    {
                        $sql .= " ORDER BY abholdatum desc";
                    }
                    

                    $abfrage = mysqli_query($verbindung, $sql);
                ?>

                <table border = 2>
                    <tr><th>ID<br><a href='bestellungen.php?sort=bidasc'>&uarr;</a>&emsp;
                                  <a href='bestellungen.php?sort=biddesc'>&darr;</a></th>

                        <th>Kunde ID<br><a href='bestellungen.php?sort=kidasc'>&uarr;</a>&emsp;
                                        <a href='bestellungen.php?sort=kiddesc'>&darr;</a></th>

                        <th>Vorstellung ID<br><a href='bestellungen.php?sort=vidasc'>&uarr;</a>&emsp;
                                              <a href='bestellungen.php?sort=viddesc'>&darr;</a></th>

                        <th>Anzahl<br><a href='bestellungen.php?sort=nasc'>&uarr;</a>&emsp;
                                      <a href='bestellungen.php?sort=ndesc'>&darr;</a></th>
                                     
                        <th>Kreditkartennummer<br><a href='bestellungen.php?sort=kknrasc'>&uarr;</a>&emsp;
                                                  <a href='bestellungen.php?sort=kknrdesc'>&darr;</a></th>

                        <th>Kreditkartenmonat<br><a href='bestellungen.php?sort=kkmasc'>&uarr;</a>&emsp;
                                                 <a href='bestellungen.php?sort=kkmdesc'>&darr;</a></th>

                        <th>Kreditkartenjahr<br><a href='bestellungen.php?sort=kkjasc'>&uarr;</a>&emsp;
                                                <a href='bestellungen.php?sort=kkjdesc'>&darr;</a></th>

                        <th>Abholdatum<br><a href='bestellungen.php?sort=dateasc'>&uarr;</a>&emsp;
                                          <a href='bestellungen.php?sort=datedesc'>&darr;</a></th></tr>

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
                                            .$zeile["kunde_id"] ."</td><td>"
                                            .$zeile["vorstellung_id"] ."</td><td>"
                                            .$zeile["anzahl"] ."</td>td>"
                                            .$zeile["kreditkartenummer"] ."</td><td>"
                                            .$zeile["kreditkartemonat"] ."</td><td>"
                                            .$zeile["kreditkartejahr"] ."</td><td>"
                                            .$zeile["abholdatum"] ."</td></tr>";
                        }
                        echo "</table>";
                    }
                    mysqli_close($verbindung);

                    echo "<br>";

                    echo "<a href='filmverwaltung.php'>zur&uuml;ck zur Verwaltung</a>";
                ?>
    </body>
</html>