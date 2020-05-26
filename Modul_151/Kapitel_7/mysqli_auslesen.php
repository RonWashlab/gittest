<?php
    $db = new mysqli("localhost", "root", "", "bankleitzahlen");
    if ($db->connect_error)
    {
        die("<p>MySQLi-Verbindungsaufnahme gescheitert: " .$db->connect_error ."</p>");
    }
    $sql = "SELECT *
            FROM de
            WHERE ort = 'Berlin'";
    
    $ergebnis = $db->query($sql);

    $anzahl = $db->affected_rows;

    echo "<p>Die Abfrage hat $anzahl Datensaetze gefunden: </p>";
    echo "<table width='100%' border='1'>
    <tr><th>BLZ</th>
        <th>Name</th>
        <th>PLZ</th>
        <th>Ort</th>
        <th>BIC</th></tr>";

    while ($zeile = $ergebnis->fetch_object())
    {
        echo "<tr><td>" . $zeile->bankleitzahl . "</td><td>"
                        . $zeile->bezeichnung . "</td><td>"
                        . $zeile->plz . "</td><td>"
                        . $zeile->ort . "</td><td>"
                        . $zeile->bic . "</td></tr>";
    }





    $db->close();
?> 