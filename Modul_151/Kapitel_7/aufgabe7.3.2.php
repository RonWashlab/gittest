
<?php
    $db = new mysqli("localhost", "root", "", "bankleitzahlen");
    if ($db->connect_error)
    {
        die("<p>MySQLi-Verbindungsaufnahme gescheitert: " .$db->connect_error ."</p>");
    }
    $count = 0;
    $db->query("CREATE TABLE IF NOT EXISTS pass(id int(11) auto_increment
                                                ,name varchar(50)
                                                ,kennwort varchar(32)
                                                ,PRIMARY KEY (id))");
    $sql = "INSERT INTO pass(name, kennwort)
            VALUES (?,?)";
     $prep_state = $db->prepare($sql);
     $prep_state->bind_param('ss', $name, $kennwort);
        
    $name = $db->real_escape_string("Andreas");
    $kennwort = $db->real_escape_string(md5("gphp52f"));
    $count++;
    $prep_state->execute();

    $name = $db->real_escape_string("Nora");
    $kennwort = $db->real_escape_string(md5("zuwtr634"));
    $count++;
    $prep_state->execute();

    $name = $db->real_escape_string("Corinna");
    $kennwort = $db->real_escape_string(md5("89896969"));
    $count++;
    $prep_state->execute();

    $name = $db->real_escape_string("Otto");
    $kennwort = $db->real_escape_string(md5("dfjkh783"));
    $count++;
    $prep_state->execute();

    $name = $db->real_escape_string("Houdini");
    $kennwort = $db->real_escape_string(md5("326wrw783"));
    $count++;
    $prep_state->execute();

    $prep_state->close();

    echo "<p>Prepared statement ausgeführt.</p>";
    echo "<p>$count Datensätze hinzugefügt.</p>";

    $db->close();
?> 
