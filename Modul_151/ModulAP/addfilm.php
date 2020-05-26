<?php include("berechtigung.php"); ?>
<?php
    if($_SESSION["uname"] != 'admin')
    {
        header("Location: keinzutritt.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Film hinzufügen</title>
    </head>
    <body>
        <?php
            if(isset($_POST['abschicken']))
            {
                $db = new mysqli("localhost", "root", "", "landkino");
                if ($db->connect_error)
                {
                    die("<p>MySQLi-Verbindungsaufnahme gescheitert: " .$db->connect_error ."</p>");
                }
                $db->query("CREATE TABLE IF NOT EXISTS
                            film(id int(11) auto_increment
                                ,titel varchar(80)
                                ,verleiher_id int(11)
                                ,PRIMARY KEY (id))");

                $titel = $db->real_escape_string(trim($_POST['titel']));
                $vid = $db->real_escape_string(trim($_POST['vid']));

                $sql = "INSERT into film(titel
                                           ,verleiher_id)
                        VALUES ('$titel'
                               ,'$vid')";

                if($db->query($sql))
                {
                    header("Location: filme.php");
                    /*echo "<h3>" . $db->affected_rows . " neues Projekt erfasst</h3>";
                    echo "<a href='projekte.php'><button>Tabelle ansehen</button></a>";*/
                }
                $db->close();
            }
        ?>

            <h1><u>Neuer Film</u></h1>
            <b>Hier können Sie einen neuen Film erfassen:</b><br>
            <form action='addfilm.php' method='POST'>
                    <br>
                    <label for="Titel">Titel:</label>
                    <input type='text' name='titel' id="Titel"><br><br>

                    <label for="verleiherid">Verleiher:</label>
                    <?php
                        require_once("dbconlaki.php");
            
                        echo '<select name="vid" id="verleiherid">
                                <option>--Bitte ausw&auml;hlen--</option>';
            
                        $sqli = "SELECT * 
                                FROM verleiher";
                        $result = mysqli_query($verbindung, $sqli);

                        while ($row = mysqli_fetch_array($result))
                        {
                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
        
                        echo '</select>';
                    ?>

                <br><br>

                <input class='buttons' type='submit' name='abschicken' value='abschicken'>
                <input class='buttonr' type='reset' name='zur&uuml;cksetzen' value='zur&uuml;cksetzen'><br><br>
            </form>
            
            <a href='filme.php'><button>zurück</button></a>
    </body>
</html>