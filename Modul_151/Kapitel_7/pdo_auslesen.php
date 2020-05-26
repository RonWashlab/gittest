<?php
    $db = new PDO("mysql:host=localhost;dbname=bankleitzahlen", "root", "");

    $sql = "SELECT *
            FROM de
            WHERE ort = 'Berlin'";
    $ergebnis = $db->query($sql);
    $anzahl = $ergebnis->rowCount();

    echo "<p>Die Abfrage hat $anzahl Datensätze gefunden:</p>";
    echo "<table width='100%' border='1'>
    <tr><th>BLZ</th>
        <th>Name</th>
        <th>PLZ</th>
        <th>Ort</th>
        <th>BIC</th></tr>";

    while ($zeile = $ergebnis->fetchObject())
    {
        echo "<tr><td>" . $zeile->bankleitzahl . "</td><td>"
                        . $zeile->bezeichnung . "</td><td>"
                        . $zeile->plz . "</td><td>"
                        . $zeile->ort . "</td><td>"
                        . $zeile->bic . "</td></tr>";
    }

    $db = NULL;
?>