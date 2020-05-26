<?php include("berechtigung.php"); ?>
<html>
    <head>
            <meta charset="utf-8">
            <title>Filme</title>
    </head>
        <body>
            <h1>Filme</h1>
                <?php
                    header('Content-Type: text/html; charset=iso-8859-1');
                    require_once("dbconlaki.php");

                    $sql ="SELECT *
                            FROM  film";

                    if(isset($_GET['sort']) == FALSE)
                    {
                        $sql .= " ORDER BY id";
                    }
                    elseif ($_GET['sort'] == 'fidasc')
                    {
                        $sql .= " ORDER BY id asc";
                    }
                    elseif ($_GET['sort'] == 'fiddesc')
                    {
                        $sql .= " ORDER BY id desc";
                    }
                    elseif ($_GET['sort'] == 'titelasc')
                    {
                        $sql .= " ORDER BY titel asc";
                    }
                    elseif ($_GET['sort'] == 'titeldesc')
                    {
                        $sql .= " ORDER BY titel desc";
                    }
                    elseif ($_GET['sort'] == 'veridasc')
                    {
                        $sql .= " ORDER BY verleiher_id asc";
                    }
                    elseif ($_GET['sort'] == 'veriddesc')
                    {
                        $sql .= " ORDER BY verleiher_id desc";
                    }
                    

                    $abfrage = mysqli_query($verbindung, $sql);
                ?>

                <form action = 'filme.php' method='post'>
                    <table border = 2>
                        <tr><th>&Auml;ndern</th>
                            <th>L&ouml;schen</th>
                            <th>ID</th>
                            <th>Titel</th>
                            <th>Verleiher</th></tr>

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
                                echo "<tr><td><input type='radio' name='mov' value=" . $zeile["id"] ."></td>
                                          <td><input type='checkbox' name='auswahl" . $zeile["id"] ."' value=" . $zeile["id"] ."></td><td>"
                                                
                                                .$zeile["id"] ."</td><td>"
                                                .$zeile["titel"] ."</td><td>"
                                                .$zeile["verleiher_id"] ."</td></tr>";
                            }
                            echo "</table>";
                        }
                        mysqli_close($verbindung);

                        echo       '<br>
                                        <p><input type="submit" name="alter" formaction="alterfilm.php" value="&Auml;ndern">
                                           <input type="submit" name="delete" formaction="deletefilm.php" value="L&ouml;schen"></p>
                                </form>';
                                    
                        echo "<a href='addfilm.php'><button>Film hinzuf&uuml;gen</button></a><br><br>
                              <a href='filmverwaltung.php'>zur&uuml;ck zur Verwaltung</a>";
                    ?>
                </form>
    </body>
</html>