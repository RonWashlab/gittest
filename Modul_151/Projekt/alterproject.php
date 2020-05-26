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
                    
                    echo "<b>Projekt anpassen:</b><br><br>";

                    if(isset($_POST["record"]))
                    {
                        require_once("db.inc.firma.php");
                        $id = $_POST["record"];

                        $sql = "SELECT   *
                                FROM     projekt
                                WHERE    projekt_id = $id";

                        $abfrage = mysqli_query($verbindung, $sql);

                        $record = mysqli_fetch_array($abfrage);
                        $id = $record["projekt_id"];
                        $bez = $record["bezeichnung"];
                        $bes = $record["beschreibung"];
                        $beginn = $record["beginn"];
                        $ende = $record["ende"];
                        $av = $record["auftragsvolumen"];
                        $agid = $record["fk_auftraggeber_id"];
                        $plid = $record["fk_projektleiter_id"];
                            

                        echo   "<form action='alterproject.php' method='POST'>

                                <label for='Pid'>Projekt-ID:</label>
                                <input class='eingabe1' type='number' name='pid' id='Pid' value=" . $id . " readonly='readonly'>

                                <div class='flex-box'>
                                    <div class='flex-box1'>
                                        <label for='Bezeichnung'>Bezeichnung:</label>
                                        <input class='eingabe' type='text' name='bezeichnung' id='Bezeichnung' value=" . $bez . "><br><br>

                                        <label for='Begin'>Beginn:</label>
                                        <input class='eingabe' type='date' name='begin' id='Begin' value=" . $beginn . "><br><br>

                                        <label for='Avol'>Auftragsvolumen:</label>
                                        <input class='eingabe' type='number' name='avol' id='Avol' value=" . $av . "><br><br>

                                        <label for='projektleiterid'>Projektleiter:</label>
                                        <input class='eingabe' type='number' name='plid' id='projektleiterid' value=" . $plid . "><br><br>
                                            
                                    </div>

                                    <div class='flex-box1'>
                                        <label for='Desc'>Beschreibung:</label>
                                        <input class='eingabe' type='text' name='desc' id='Desc' value=" . $bes . "><br><br>

                                        <label for='End'>Ende:</label>
                                        <input class='eingabe' type='date' name='end' id='Ende' value=" . $ende . "><br><br>

                                        <label for='auftraggeberid'>Auftraggeber:</label>
                                        <input class='eingabe' type='number' name='aid' id='auftraggeberid' value=" . $agid . "><br><br>
                                    </div>
                                </div>

                                <br>

                                <input class='buttons' type='submit' name='confirm' value='best&auml;tigen'>
                                <input class='buttonr' type='reset' name='zur&uuml;cksetzen' value='zur&uuml;cksetzen'><br>
                                </form>";
                    }

                    if(isset($_POST["confirm"]))
                    {
                        require_once("db.inc.firma.php");

                        $id = $_POST["pid"];
                        $bez = $_POST["bezeichnung"];
                        $bes = $_POST["desc"];
                        $begin = $_POST["begin"];
                        $end = $_POST["end"];
                        $av = $_POST["avol"];
                        $agid = $_POST["aid"];
                        $plid = $_POST["plid"];

                        $update = "UPDATE  projekt
                                   SET     bezeichnung = '$bez'
                                          ,beschreibung = '$bes'
                                          ,beginn = '$begin'
                                          ,ende = '$end'
                                          ,auftragsvolumen = $av
                                          ,fk_auftraggeber_id = $agid
                                          ,fk_projektleiter_id = $plid
                                   WHERE   projekt_id = $id";
                        $abfrage = mysqli_query($verbindung, $update);
                    
                        echo "Der Datensatz mit der Projekt-Nr. " . $id . " wurde angepasst.<br><br>";
                    }

                    if(!isset($_POST["record"]) && !isset($_POST["confirm"]))
                    {
                        echo "Es wurde kein Datensatz zur Bearbeitung ausgewählt.<br><br>";
                    }
                ?>

                <a href='projekte.php'><button class='button button2'>zur&uuml;ck</button></a>
    </body>
</html>