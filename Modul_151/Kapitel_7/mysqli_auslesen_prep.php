<?php
    $db = new mysqli("localhost", "root", "", "bankleitzahlen");
    if($db->connect_error)
    {
        die("<p>MySQLi-Verbindungsaufnahme gescheitert: "
             .$db->connect_error ."</p>");
    }
    $sql = "SELECT *
            FROM de
            WHERE ort = 'Berlin'";
    $prep_state = $db->prepare($sql);
    $prep_state->execute();
    $prep_state->bind_result($key
                            ,$bankleitzahl
                            ,$bezeichnung
                            ,$plz
                            ,$ort
                            ,$bic);
    $prep_state->store_result();
    $anzahl = $prep_state->num_rows;

    echo "<p>Die Abfrage hat $anzahl Datensätze gefunden:</p>";
    echo "<table width='100%' border='1'>
            <tr><th>BLZ</th>
                <th>Name</th>
                <th>PLZ</th>
                <th>Ort</th>
                <th>BIC</th></tr>";

    while($prep_state->fetch())
    {
        echo "<tr><td>" .$bankleitzahl ."</td><td>"
                        .$bezeichnung ."</td><td>"
                        .$plz ."</td><td>"
                        .$ort ."</td><td>"
                        .$bic ."</td></tr>";
    }
    $prep_state->free_result();
    $prep_state->close();
    $db->close();
?>