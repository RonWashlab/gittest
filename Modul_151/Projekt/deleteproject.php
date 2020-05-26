<?php include("zugang.php"); ?>
<?php
    if($_SESSION["uname"] != 'admin')
    {
        header("Location: nedrein.php");
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Projektdaten</title>
        <link rel="stylesheet" type="text/css" href="formulardesign.css">
    </head>
        <body>
            <h1>Projekte</h1>

                <?php

                    require_once("db.inc.firma.php");

                    for($i=1; $i<=999; $i++)
                    {
                        if(isset($_POST["auswahl$i"]))
                        {
                            $delete = "DELETE
                                       FROM projekt
                                       WHERE projekt_id = $i";
                            $result = mysqli_query($verbindung, $delete);
                            echo "<h3>Datensatz mit der Projekt-ID '$i' wurde gelöscht.</h3>";
                            echo "<br><br>";
                        }
                    }
                ?>

                <a href='projekte.php'><button class='button button2'>zur&uuml;ck</button></a>
    </body>
</html>