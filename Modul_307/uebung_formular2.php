<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Kapitel 7 Übung 2</title>
    </head>
    <body>
        <h1>Bewerbung, Newsletter oder Infomaterial</h1>
        <p>Bitte nennen Sie uns Ihr Anliegen: </p>
        <form action=uebung_formular2.php method="POST">

            <p>Anrede:
                <?php
                    if (!empty($_POST))
                    {
                        $wert = $_POST["Anrede"];
                    }
                ?>
                    
                    <input type="radio" name="Anrede" value="Herr"
                    <?php
                        if (!empty($_POST))
                        {
                            if ($wert == "Herr")
                            {
                                echo "checked";
                            }
                        }
                    ?>> Herr
             
                    <input type="radio" name="Anrede" value="Frau"
                    <?php
                        if (!empty($_POST))
                        {
                            if ($wert == "Frau")
                            {
                                echo "checked";
                            }
                        }
                    ?>> Frau</p>

                
            <p>Vorname: 
                <input type="text" name="Vorname" value="<?php
                    if (!empty($_POST["Vorname"]))
                    {
                        echo $_POST["Vorname"];
                    }
                ?> "></p>

            <p>Nachname: 
                <input type="text" name="Nachname" value="<?php
                    if (!empty($_POST["Nachname"]))
                    {
                        echo $_POST["Nachname"];
                    }
                ?> "></p>

            <p>Mailadresse:  
                <input type="text" name="Mail" value="<?php
                    if (!empty($_POST["Mail"]))
                    {
                        echo $_POST["Mail"];
                    }
                ?> "></p>

            <p>
                <input type="submit" name="Bewerben" value="bei Ihnen bewerben">
                <input type="submit" name="Abo" value="Newsletter abonnieren">
                <input type="submit" name="Info" value="Infomaterial anfordern"></p>
        </form>
        <?php
        if (isset($_POST["Bewerben"]))
        {
            echo "<p><em>Herzlichen Dank, " . $_POST["Anrede"] . " " . $_POST["Nachname"] . ", für Ihre Bewerbungsanfrage. Unsere Personalabteilung wird per Mail - an Ihre Adresse " . $_POST["Mail"] . " - Kontakt zu Ihnen aufnehmen.</em></p>";
        }

        if (isset($_POST["Abo"]))
        {
            echo "<p><em>Herzlichen Dank, " . $_POST["Anrede"] . " " . $_POST["Nachname"] . ", dass Sie sich für unseren Newsletter angemolden haben. Dieser wird Ihnen von nun an, per Mail - an Ihre Adresse " . $_POST["Mail"] . " verschickt.</em></p>";
        }

        if (isset($_POST["Info"]))
        {
            echo "<p><em>Herzlichen Dank, " . $_POST["Anrede"] . " " . $_POST["Nachname"] . ", dass Sie sich für unsere Firma interessieren. Das Infomaterial werden wir Ihnen sobald als möglich per Mail - an Ihre Adresse " . $_POST["Mail"] . " zukommen lassen.</em></p>";
        }
        ?>
    </body>
</html>