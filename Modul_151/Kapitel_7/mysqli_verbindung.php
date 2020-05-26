<?php
    $db = new mysqli("localhost", "root", "", "bankleitzahlen");
    if ($db->connect_error)
    {
        die("<p>MySQLi-Verbindungsaufnahme gescheitert: " .$db->connect_error ."</p>");
    }
    echo "<p>Verbindung OK.Verbunden mit " .$db->host_info .".</p>";

    $db->close();
?>