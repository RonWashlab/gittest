<?php include("zugang.php"); ?>
<?php
    if($_SESSION["uname"] != 'admin')
    {
        header("Location: nedrein.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Projekt hinzufügen</title>
        <link rel="stylesheet" type="text/css" href="formulardesign.css">
    </head>
    <body>
        <?php
            if(isset($_POST['abschicken']))
            {
                $db = new mysqli("localhost", "root", "", "firma");
                if ($db->connect_error)
                {
                    die("<p>MySQLi-Verbindungsaufnahme gescheitert: " .$db->connect_error ."</p>");
                }
                $db->query("CREATE TABLE IF NOT EXISTS
                            projekt(projekt_id int(6) auto_increment
                                   ,bezeichnung varchar(100)
                                   ,beschreibung varchar(200)
                                   ,beginn date
                                   ,ende date
                                   ,auftragsvolumen float(15,2)
                                   ,fk_auftraggeber_id int(6)
                                   ,fk_projektleiter_id int(6)
                                   ,PRIMARY KEY (projekt_id))");

                $bezeichnung = $db->real_escape_string(trim($_POST['bezeichnung']));
                $beschreibung = $db->real_escape_string(trim($_POST['desc']));
                $beginn = $db->real_escape_string(trim($_POST['begin']));
                $ende = $db->real_escape_string(trim($_POST['end']));
                $auftragsvolumen = $db->real_escape_string(trim($_POST['avol']));
                $auftraggeber = $db->real_escape_string(trim($_POST['aid']));
                $projektleiter = $db->real_escape_string(trim($_POST['plid']));

                $sql = "INSERT into projekt(bezeichnung
                                           ,beschreibung
                                           ,beginn
                                           ,ende
                                           ,auftragsvolumen
                                           ,fk_auftraggeber_id
                                           ,fk_projektleiter_id)
                        VALUES ('$bezeichnung'
                               ,'$beschreibung'
                               ,'$beginn'
                               ,'$ende'
                               ,'$auftragsvolumen'
                               ,'$auftraggeber'
                               ,'$projektleiter')";

                if($db->query($sql))
                {
                    header("Location: projekte.php");
                    /*echo "<h3>" . $db->affected_rows . " neues Projekt erfasst</h3>";
                    echo "<a href='projekte.php'><button>Tabelle ansehen</button></a>";*/
                }
                $db->close();
            }
        ?>

            <h1><u>Neues Projekt</u></h1>
            <b>Hier können Sie ein neues Projekt erfassen:</b>
            <form action='addproject.php' method='POST'>

            <div class="flex-box">
                <div class="flex-box1">
                    <label for="Bezeichnung">Bezeichnung:</label>
                    <input class='eingabe' type='text' name='bezeichnung' id="Bezeichnung"><br><br>

                    <label for="Begin">Beginn:</label>
                    <input class='eingabe' type='date' name='begin' id="Begin"><br><br>

                    <label for="Avol">Auftragsvolumen:</label>
                    <input class='eingabe' type='number' name='avol' id="Avol"><br><br>

                    <label for="projektleiterid">Projektleiter:</label>
                    <?php
                        require_once("db.inc.firma.php");
            
                        echo '<select class="eingabe2" name="plid" id="projektleiterid">
                                <option>--Bitte ausw&auml;hlen--</option>';
            
                        $sqli = "SELECT * 
                                FROM mitarbeiter";
                        $result = mysqli_query($verbindung, $sqli);

                        while ($row = mysqli_fetch_array($result))
                        {
                            echo '<option value="' . $row['person_id'] . '">' . $row['vorname'] . ' ' . $row['name'] . '</option>';
                        }
        
                        echo '</select>';
                    ?>
                </div>

                <div class="flex-box1">
                    <label for="Desc">Beschreibung:</label>
                    <input class='eingabe' type='text' name='desc' id="Desc"><br><br>

                    <label for="End">Ende:</label>
                    <input class='eingabe' type='date' name='end' id="Ende"><br><br>

                    <label for="auftraggeberid">Auftraggeber:</label>
                    <?php
                        require_once("db.inc.firma.php");
    
                        echo '<select class="eingabe2" name="aid" id="auftraggeberid">
                            <option>--Bitte ausw&auml;hlen--</option>';
    
                        $sqli = "SELECT *
                                FROM auftraggeber";
                        $result = mysqli_query($verbindung, $sqli);
                        while ($row = mysqli_fetch_array($result))
                        {
                            echo '<option value="' . $row['auftraggeber_id'] . '">' . $row['kurzname'] . '</option>';
                        }
    
                        echo '</select>';
                    ?>
                </div>
            </div>

                <br>

                <input class='buttons' type='submit' name='abschicken' value='abschicken'>
                <input class='buttonr' type='reset' name='zur&uuml;cksetzen' value='zur&uuml;cksetzen'><br>
            </form>
            
            <a href='projekte.php'><button>zurück</button></a>
    </body>
</html>