<?php include("zugang.php"); ?>
<?php
   if($_SESSION["uname"] != 'admin')
   {
        echo '<html>
                    <head>
                        <meta charset="utf-8">
                        <title>Projektdaten</title>
                        <link rel="stylesheet" type="text/css" href="phpdesign.css">
                    </head>
                        <body>
                            <h1>Projekte</h1>';
                            
                                    header('Content-Type: text/html; charset=iso-8859-1');
                                    require_once("db.inc.firma.php");
                                    $sql ="SELECT *
                                            FROM  projekt";

                                    if(isset($_GET['sort']) == FALSE)
                                    {
                                        $sql .= " ORDER BY projekt_id";
                                    }
                                    elseif ($_GET['sort'] == 'projektidasc')
                                    {
                                        $sql .= " ORDER BY projekt_id asc";
                                    }
                                    elseif ($_GET['sort'] == 'projektiddesc')
                                    {
                                        $sql .= " ORDER BY projekt_id desc";
                                    }
                                    elseif ($_GET['sort'] == 'bezeichnungasc')
                                    {
                                        $sql .= " ORDER BY bezeichnung asc";
                                    }
                                    elseif ($_GET['sort'] == 'bezeichnungdesc')
                                    {
                                        $sql .= " ORDER BY bezeichnung desc";
                                    }
                                    elseif ($_GET['sort'] == 'beschreibungasc')
                                    {
                                        $sql .= " ORDER BY beschreibung asc";
                                    }
                                    elseif ($_GET['sort'] == 'beschreibungdesc')
                                    {
                                        $sql .= " ORDER BY beschreibung desc";
                                    }
                                    elseif($_GET['sort'] == 'beginnasc')
                                    {
                                        $sql .= " ORDER BY beginn asc";
                                    }
                                    elseif($_GET['sort'] == 'beginndesc')
                                    {
                                        $sql .= " ORDER BY beginn desc";
                                    }
                                    elseif($_GET['sort'] == 'endeasc')
                                    {
                                        $sql .= " ORDER BY ende asc";
                                    }
                                    elseif($_GET['sort'] == 'endedesc')
                                    {
                                        $sql .= " ORDER BY ende desc";
                                    }
                                    elseif($_GET['sort'] == 'auftragasc')
                                    {
                                        $sql .= " ORDER BY auftragsvolumen asc";
                                    }
                                    elseif($_GET['sort'] == 'auftragdesc')
                                    {
                                        $sql .= " ORDER BY auftragsvolumen desc";
                                    }
                                    elseif($_GET['sort'] == 'auftragidasc')
                                    {
                                        $sql .= " ORDER BY fk_auftraggeber_id asc";
                                    }
                                    elseif($_GET['sort'] == 'auftragiddesc')
                                    {
                                        $sql .= " ORDER BY fk_auftraggeber_id desc";
                                    }
                                    elseif($_GET['sort'] == 'plasc')
                                    {
                                        $sql .= " ORDER BY fk_projektleiter_id asc";
                                    }
                                    elseif($_GET['sort'] == 'pldesc')
                                    {
                                        $sql .= " ORDER BY fk_projektleiter_id desc";
                                    }

                                    $abfrage = mysqli_query($verbindung, $sql);
                                
                        echo   "<table>
                                    <tr><th>Projekt ID<br><a href='projekte.php?sort=projektidasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                                            <a href='projekte.php?sort=projektiddesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>

                                        <th>Bezeichnung<br><a href='projekte.php?sort=bezeichnungasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                                            <a href='projekte.php?sort=bezeichnungdesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>
                                                            
                                        <th>Beschreibung<br><a href='projekte.php?sort=beschreibungasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                                            <a href='projekte.php?sort=beschreibungdesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>
                                                            
                                        <th>Beginn<br><a href='projekte.php?sort=beginnasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                                        <a href='projekte.php?sort=beginndesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>

                                        <th>Ende<br><a href='projekte.php?sort=endeasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                                    <a href='projekte.php?sort=endedesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>

                                        <th>Auftragsvolumen<br><a href='projekte.php?sort=auftragasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                                                <a href='projekte.php?sort=auftragdesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>

                                        <th>Auftraggeber ID<br><a href='projekte.php?sort=auftragidasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                                                <a href='projekte.php?sort=auftragiddesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>

                                        <th>Projektleiter ID<br><a href='projekte.php?sort=plasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                                                <a href='projekte.php?sort=pldesc'><button class='button button1' title='absteigend'>&darr;</button></a></th></tr>";

                                    
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
                                                echo "<tr><td>" .$zeile["projekt_id"] ."</td><td>"
                                                                .$zeile["bezeichnung"] ."</td><td>"
                                                                .$zeile["beschreibung"] ."</td><td>"
                                                                .$zeile["beginn"] ."</td><td>"
                                                                .$zeile["ende"] ."</td><td>"
                                                                .$zeile["auftragsvolumen"] ."</td><td>"
                                                                .$zeile["fk_auftraggeber_id"] ."</td><td>"
                                                                .$zeile["fk_projektleiter_id"] ."</td></tr>";
                                            }
                                            echo "</table>";
                                        }
                                        mysqli_close($verbindung);
                                    
                                    
                        echo       '<br>';

                        echo   "<a href='projektverwaltung.php'><button class='button button2'>zur&uuml;ck</button></a>
                                
                                

                    </body>
                </html>";
    }

    else
    {
        {
            echo '<html>
                        <head>
                            <meta charset="utf-8">
                            <title>Projektdaten</title>
                            <link rel="stylesheet" type="text/css" href="phpdesign.css">
                        </head>
                            <body>
                                <h1>Projekte</h1>';
                                
                                        header('Content-Type: text/html; charset=iso-8859-1');
                                        require_once("db.inc.firma.php");
                                        $sql ="SELECT *
                                                FROM  projekt";
    
                                        if(isset($_GET['sort']) == FALSE)
                                        {
                                            $sql .= " ORDER BY projekt_id";
                                        }
                                        elseif ($_GET['sort'] == 'projektidasc')
                                        {
                                            $sql .= " ORDER BY projekt_id asc";
                                        }
                                        elseif ($_GET['sort'] == 'projektiddesc')
                                        {
                                            $sql .= " ORDER BY projekt_id desc";
                                        }
                                        elseif ($_GET['sort'] == 'bezeichnungasc')
                                        {
                                            $sql .= " ORDER BY bezeichnung asc";
                                        }
                                        elseif ($_GET['sort'] == 'bezeichnungdesc')
                                        {
                                            $sql .= " ORDER BY bezeichnung desc";
                                        }
                                        elseif ($_GET['sort'] == 'beschreibungasc')
                                        {
                                            $sql .= " ORDER BY beschreibung asc";
                                        }
                                        elseif ($_GET['sort'] == 'beschreibungdesc')
                                        {
                                            $sql .= " ORDER BY beschreibung desc";
                                        }
                                        elseif($_GET['sort'] == 'beginnasc')
                                        {
                                            $sql .= " ORDER BY beginn asc";
                                        }
                                        elseif($_GET['sort'] == 'beginndesc')
                                        {
                                            $sql .= " ORDER BY beginn desc";
                                        }
                                        elseif($_GET['sort'] == 'endeasc')
                                        {
                                            $sql .= " ORDER BY ende asc";
                                        }
                                        elseif($_GET['sort'] == 'endedesc')
                                        {
                                            $sql .= " ORDER BY ende desc";
                                        }
                                        elseif($_GET['sort'] == 'auftragasc')
                                        {
                                            $sql .= " ORDER BY auftragsvolumen asc";
                                        }
                                        elseif($_GET['sort'] == 'auftragdesc')
                                        {
                                            $sql .= " ORDER BY auftragsvolumen desc";
                                        }
                                        elseif($_GET['sort'] == 'auftragidasc')
                                        {
                                            $sql .= " ORDER BY fk_auftraggeber_id asc";
                                        }
                                        elseif($_GET['sort'] == 'auftragiddesc')
                                        {
                                            $sql .= " ORDER BY fk_auftraggeber_id desc";
                                        }
                                        elseif($_GET['sort'] == 'plasc')
                                        {
                                            $sql .= " ORDER BY fk_projektleiter_id asc";
                                        }
                                        elseif($_GET['sort'] == 'pldesc')
                                        {
                                            $sql .= " ORDER BY fk_projektleiter_id desc";
                                        }
    
                                        $abfrage = mysqli_query($verbindung, $sql);
                                    
                            echo   "<form action='projekte.php' method='post'>
                                        <table>
                                            <tr><th>&Auml;ndern</th>
                                                <th>L&ouml;schen</th>
                                                <th>Projekt ID</th>
                                                <th>Bezeichnung</th>
                                                <th>Beschreibung</th>
                                                <th>Beginn</th>
                                                <th>Ende</th>
                                                <th>Auftragsvolumen</th>
                                                <th>Auftraggeber ID</th>
                                                <th>Projektleiter ID</th></tr>";
    
                                        
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
                                                    echo "<tr><td><input type='radio' name='record' value=" . $zeile["projekt_id"] ."></td>
                                                            <td><input type='checkbox' name='auswahl" . $zeile["projekt_id"] ."' value=" . $zeile["projekt_id"] ."></td><td>"
                                                                    .$zeile["projekt_id"] ."</td><td>"
                                                                    .$zeile["bezeichnung"] ."</td><td>"
                                                                    .$zeile["beschreibung"] ."</td><td>"
                                                                    .$zeile["beginn"] ."</td><td>"
                                                                    .$zeile["ende"] ."</td><td>"
                                                                    .$zeile["auftragsvolumen"] ."</td><td>"
                                                                    .$zeile["fk_auftraggeber_id"] ."</td><td>"
                                                                    .$zeile["fk_projektleiter_id"] ."</td></tr>";
                                                }
                                                echo "</table>";
                                            }
                                            mysqli_close($verbindung);
                                        
                                        
                            echo       '<br>
                                        <p><input type="submit" class="button button2" name="alter" formaction="alterproject.php" value="Anpassen">
                                        <input type="submit" class="button button2" name="delete" formaction="deleteproject.php" value="L&ouml;schen"></p>
                                    </form>';
    
                            echo   "<a href='addproject.php'><button class='button button2'>Projekt hinzuf&uuml;gen</button></a><br><br>
                                    <a href='projektverwaltung.php'><button class='button button2'>zur&uuml;ck</button></a>
                                    
                                    
    
                        </body>
                    </html>";
        }
    }
?>