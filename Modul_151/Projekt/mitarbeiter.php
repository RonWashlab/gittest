<html>
    <head>
        <meta charset="utf-8">
        <title>Mitarbeiter</title>
        <link rel="stylesheet" type="text/css" href="phpdesign.css">
    </head>
    <body>
        <h1>Mitarbeiter</h1>
        <?php                       
            header('Content-Type: text/html; charset=iso-8859-1');
            require_once("db.inc.firma.php");
            $sql ="SELECT *
                    FROM  mitarbeiter";

            if(isset($_GET['sort']) == FALSE)
            {
                $sql .= " ORDER BY person_id";
            }

            elseif ($_GET['sort'] == 'pidasc')
            {
                $sql .= " ORDER BY person_id asc";
            }
            elseif ($_GET['sort'] == 'piddesc')
            {
                $sql .= " ORDER BY person_id desc";
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

            elseif($_GET['sort'] == 'telasc')
            {
                $sql .= " ORDER BY tel asc";
            }
            elseif($_GET['sort'] == 'teldesc')
            {
                $sql .= " ORDER BY tel desc";
            }

            elseif($_GET['sort'] == 'mailasc')
            {
                $sql .= " ORDER BY email asc";
            }
            elseif($_GET['sort'] == 'maildesc')
            {
                $sql .= " ORDER BY email desc";
            }

            elseif($_GET['sort'] == 'salasc')
            {
                $sql .= " ORDER BY gehalt asc";
            }
            elseif($_GET['sort'] == 'saldesc')
            {
                $sql .= " ORDER BY gehalt desc";
            }

            elseif($_GET['sort'] == 'jobasc')
            {
                $sql .= " ORDER BY stellung asc";
            }
            elseif($_GET['sort'] == 'jobdesc')
            {
                $sql .= " ORDER BY stellung desc";
            }

            elseif($_GET['sort'] == 'abidasc')
            {
                $sql .= " ORDER BY fk_abteilung_id asc";
            }
            elseif($_GET['sort'] == 'abiddesc')
            {
                $sql .= " ORDER BY fk_abteilung_id desc";
            }

            $abfrage = mysqli_query($verbindung, $sql);
        ?>
                                    
        
            <table>
                <tr><th>Personal ID<br><a href='mitarbeiter.php?sort=pidasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                       <a href='mitarbeiter.php?sort=piddesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>

                    <th>Name<br><a href='mitarbeiter.php?sort=nameasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                <a href='mitarbeiter.php?sort=namedesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>
                                        
                    <th>Telefon<br><a href='mitarbeiter.php?sort=telasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                   <a href='mitarbeiter.php?sort=teldesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>

                    <th>eMail<br><a href='mitarbeiter.php?sort=mailasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                 <a href='mitarbeiter.php?sort=maildesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>

                    <th>Gehalt<br><a href='mitarbeiter.php?sort=salasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                  <a href='mitarbeiter.php?sort=saldesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>

                    <th>Stellung<br><a href='mitarbeiter.php?sort=jobasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                    <a href='mitarbeiter.php?sort=jobdesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>

                    <th>Abteilung ID<br><a href='mitarbeiter.php?sort=abidasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                        <a href='mitarbeiter.php?sort=abiddesc'><button class='button button1' title='absteigend'>&darr;</button></a></th></tr>

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
                                echo "<tr><td>" .$zeile["person_id"] ."</td><td>"
                                                .$zeile["name"] ." "
                                                .$zeile["vorname"] ."</td><td>"
                                                .$zeile["tel"] ."</td><td>"
                                                .$zeile["email"] ."</td><td>"
                                                .$zeile["gehalt"] ."</td><td>"
                                                .$zeile["stellung"] ."</td><td>"
                                                .$zeile["fk_abteilung_id"] ."</td></tr>";
                            }
                            echo "</table>";
                        }
                        mysqli_close($verbindung);
                    ?>
                                        
                    <br>
                    
                <a href='projektverwaltung.php'><button class='button button2'>zur&uuml;ck</button></a>
    </body>
</html>