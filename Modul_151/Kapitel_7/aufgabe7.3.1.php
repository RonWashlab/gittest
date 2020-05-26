<?php
    $db = new mysqli("localhost", "root", "", "bankleitzahlen");
    if($db->connect_error)
    {
        die("<p>MySQLi-Verbindungsaufnahme gescheitert: "
             .$db->connect_error ."</p>");
    }
    $sql = "SELECT *
            FROM pass";
    $prep_state = $db->prepare($sql);
    $prep_state->execute();
    $prep_state->bind_result($id
                            ,$name
                            ,$kennwort);
    $prep_state->store_result();
    $anzahl = $prep_state->num_rows;

    echo "<p>Die Abfrage hat $anzahl Datensätze gefunden:</p>";
    echo "<table width='100%' border='1'>
            <tr><th>ID</th>
                <th>Name</th>
                <th>Kennwort-Hash</th></tr>";

    while($prep_state->fetch())
    {
        echo "<tr><td>" .$id ."</td><td>"
                        .$name ."</td><td>"
                        .$kennwort ."</td></tr>";
    }
    $prep_state->free_result();
    $prep_state->close();
    $db->close();
?>