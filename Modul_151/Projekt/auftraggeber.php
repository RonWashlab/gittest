<?php include("zugang.php"); ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Auftraggeber</title>
        <link rel="stylesheet" type="text/css" href="phpdesign.css">
    </head>
        <body>
            <h1>Auftraggeber</h1>
                <?php
                    header('Content-Type: text/html; charset=iso-8859-1');
                    require_once("db.inc.firma.php");
                    $sql ="SELECT *
                            FROM  auftraggeber";

                    if(isset($_GET['sort']) == FALSE)
                    {
                        $sql .= " ORDER BY auftraggeber_id";
                    }
                    elseif ($_GET['sort'] == 'agidasc')
                    {
                        $sql .= " ORDER BY auftraggeber_id asc";
                    }
                    elseif ($_GET['sort'] == 'agiddesc')
                    {
                        $sql .= " ORDER BY auftraggeber_id desc";
                    }
                    elseif ($_GET['sort'] == 'bezeichnungasc')
                    {
                        $sql .= " ORDER BY bezeichnung asc";
                    }
                    elseif ($_GET['sort'] == 'bezeichnungdesc')
                    {
                        $sql .= " ORDER BY bezeichnung desc";
                    }
                    elseif ($_GET['sort'] == 'kurznameasc')
                    {
                        $sql .= " ORDER BY kurzname asc";
                    }
                    elseif ($_GET['sort'] == 'kurznamedesc')
                    {
                        $sql .= " ORDER BY kurzname desc";
                    }
                    elseif($_GET['sort'] == 'strasseasc')
                    {
                        $sql .= " ORDER BY adr_strasse asc";
                    }
                    elseif($_GET['sort'] == 'strassedesc')
                    {
                        $sql .= " ORDER BY adr_strasse desc";
                    }
                    elseif($_GET['sort'] == 'plzasc')
                    {
                        $sql .= " ORDER BY adr_plz asc";
                    }
                    elseif($_GET['sort'] == 'plzdesc')
                    {
                        $sql .= " ORDER BY adr_plz desc";
                    }
                    elseif($_GET['sort'] == 'ortasc')
                    {
                        $sql .= " ORDER BY adr_ort asc";
                    }
                    elseif($_GET['sort'] == 'ortdesc')
                    {
                        $sql .= " ORDER BY adr_ort desc";
                    }
                    elseif($_GET['sort'] == 'telasc')
                    {
                        $sql .= " ORDER BY tel asc";
                    }
                    elseif($_GET['sort'] == 'teldesc')
                    {
                        $sql .= " ORDER BY tel desc";
                    }
                    elseif($_GET['sort'] == 'faxasc')
                    {
                        $sql .= " ORDER BY fax asc";
                    }
                    elseif($_GET['sort'] == 'faxdesc')
                    {
                        $sql .= " ORDER BY fax desc";
                    }
                    elseif($_GET['sort'] == 'emailasc')
                    {
                        $sql .= " ORDER BY email asc";
                    }
                    elseif($_GET['sort'] == 'emaildesc')
                    {
                        $sql .= " ORDER BY email desc";
                    }
                    elseif($_GET['sort'] == 'skasc')
                    {
                        $sql .= " ORDER BY sonderkonditionen asc";
                    }
                    elseif($_GET['sort'] == 'skdesc')
                    {
                        $sql .= " ORDER BY sonderkonditionen desc";
                    }

                    $abfrage = mysqli_query($verbindung, $sql);
                ?>

                <table>
                    <tr><th>Auftraggeber ID<br><a href='auftraggeber.php?sort=agidasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                               <a href='auftraggeber.php?sort=agiddesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>

                        <th>Bezeichnung<br><a href='auftraggeber.php?sort=bezeichnungasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                           <a href='auftraggeber.php?sort=bezeichnungdesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>
                                             
                        <th>Kurzname<br><a href='auftraggeber.php?sort=kurznameasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                        <a href='auftraggeber.php?sort=kurznamedesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>
                                             
                        <th>Strasse<br><a href='auftraggeber.php?sort=strasseasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                       <a href='auftraggeber.php?sort=strassedesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>

                        <th>PLZ<br><a href='auftraggeber.php?sort=plzasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                   <a href='auftraggeber.php?sort=plzdesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>

                        <th>Ort<br><a href='auftraggeber.php?sort=ortasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                   <a href='auftraggeber.php?sort=ortdesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>

                        <th>Telefon<br><a href='auftraggeber.php?sort=telasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                       <a href='auftraggeber.php?sort=teldesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>

                        <th>Fax<br><a href='auftraggeber.php?sort=faxasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                   <a href='auftraggeber.php?sort=faxdesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>

                        <th>eMail<br><a href='auftraggeber.php?sort=emailasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                     <a href='auftraggeber.php?sort=emaildesc'><button class='button button1' title='absteigend'>&darr;</button></a></th>

                        <th>Sonderkonditionen<br><a href='auftraggeber.php?sort=skasc'><button class='button button1' title='aufsteigend'>&uarr;</button></a>&emsp;
                                                 <a href='auftraggeber.php?sort=skdesc'><button class='button button1' title='absteigend'>&darr;</button></a></th></tr>

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
                            echo "<tr><td>" .$zeile["auftraggeber_id"] ."</td><td>"
                                            .$zeile["bezeichnung"] ."</td><td>"
                                            .$zeile["kurzname"] ."</td><td>"
                                            .$zeile["adr_strasse"] ."</td><td>"
                                            .$zeile["adr_plz"] ."</td><td>"
                                            .$zeile["adr_ort"] ."</td><td>"
                                            .$zeile["tel"] ."</td><td>"
                                            .$zeile["fax"] ."</td><td>"
                                            .$zeile["email"] ."</td><td>"
                                            .$zeile["sonderkonditionen"] ."</td></tr>";
                        }
                        echo "</table>";
                    }
                    mysqli_close($verbindung);

                    echo "<br>";

                    echo "<a href='projektverwaltung.php'><button class='button button2'>zur&uuml;ck</button></a>";
                ?>
    </body>
</html>