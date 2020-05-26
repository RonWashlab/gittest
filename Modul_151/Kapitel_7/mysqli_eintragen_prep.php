<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Einfaches Formular</title>
    </head>
    <body>
        <?php
            if(isset($_POST['abschicken']))
            {
                $db = new mysqli("localhost", "root", "", "bankleitzahlen");
                if ($db->connect_error)
                {
                    die("<p>MySQLi-Verbindungsaufnahme gescheitert: " .$db->connect_error ."</p>");
                }
                $db->query("CREATE TABLE IF NOT EXISTS
                            pass(id int(11) auto_increment, name varchar(50),
                            kennwort varchar(32),
                            PRIMARY KEY (id))");
                $name = $db->real_escape_string(trim($_POST['Name']));
                $kennwort = $db->real_escape_string(md5($_POST['Kennwort']));
                $sql = "INSERT into pass(name, kennwort)
                        VALUES ('$name', '$kennwort')";

                if($db->query($sql))
                {
                    echo "<p>Zeile eingefuegt: " . $db->affected_rows . "</p>";
                }
                $db->close();
            }
          
            else
            {
                echo "<p>Geben Sie Name und Kennwort ein:<br><br> </p>
                    <form action='mysqli_eintragen.php' method='POST'>
                        <p>Name: <input type='text' name='Name'></p>
                        <p>Kennwort: <input type='text' name='Kennwort'></p>
                        <p><input type='submit' name='abschicken' value='Abschicken'>
                            <input type='reset' name='zuruecksetzen' value='Zurücksetzen'></p>";
            }
        
        
        ?> 
        
        </form>
    </body>
</html>